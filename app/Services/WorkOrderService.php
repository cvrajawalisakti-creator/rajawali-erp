<?php

namespace App\Services;

use App\Models\BomHeader;
use App\Models\WorkOrder;
use App\Models\WorkOrderMaterial;
use App\Models\WorkOrderProcess;
use Carbon\Carbon;
use DomainException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkOrderService
{
    /**
     * Generate Work Order Number
     */
    public function generateNumber(): string
    {
        $prefix = 'WO' . Carbon::now()->format('ym');

        $lastWorkOrder = WorkOrder::where('wo_number', 'like', $prefix . '%')
            ->orderByDesc('wo_number')
            ->first();

        if (! $lastWorkOrder) {
            $running = 1;
        } else {
            $running = (int) substr($lastWorkOrder->wo_number, -4) + 1;
        }

        return sprintf('%s-%04d', $prefix, $running);
    }

    /**
     * Find Active BOM
     */
    public function findActiveBom(int $finishedGoodId): BomHeader
    {
        $bom = BomHeader::with([
            'details.item',
            'processes.process',
        ])
        ->where('finished_good_item_id', $finishedGoodId)
        ->where('is_active', true)
        ->first();

        if (! $bom) {
            throw new ModelNotFoundException(
                'Active BOM not found.'
            );
        }

        return $bom;
    }

    /**
     * Create Work Order Header
     */
    public function createHeader(
        array $data,
        BomHeader $bom
    ): WorkOrder {

        return WorkOrder::create([

            'wo_number' => $this->generateNumber(),

            'wo_date' => $data['wo_date'],

            'finished_good_item_id'
                => $data['finished_good_item_id'],

            'bom_header_id'
                => $bom->id,

            'planned_qty'
                => $data['planned_qty'],

            'completed_qty'
                => 0,

            'planned_start'
                => $data['planned_start'] ?? null,

            'planned_finish'
                => $data['planned_finish'] ?? null,

            'status'
                => WorkOrder::STATUS_DRAFT,

            'remarks'
                => $data['remarks'] ?? null,
        ]);
    }

    /**
     * Copy BOM Materials
     */
    public function copyMaterials(
        WorkOrder $workOrder,
        BomHeader $bom
    ): void {

        foreach ($bom->details as $detail) {

            WorkOrderMaterial::create([

                'work_order_id'
                    => $workOrder->id,

                'item_id'
                    => $detail->component_item_id,

                'sequence'
                    => $detail->sequence,

                'required_qty'
                    => $detail->qty * $workOrder->planned_qty,

                'issued_qty'
                    => 0,

                'unit'
                    => $detail->item->unit,

                'remarks'
                    => $detail->remarks,

            ]);
        }
    }

    /**
     * Copy BOM Processes
     */
    public function copyProcesses(
        WorkOrder $workOrder,
        BomHeader $bom
    ): void {

        foreach ($bom->processes as $process) {

            WorkOrderProcess::create([

                'work_order_id'
                    => $workOrder->id,

                'process_id'
                    => $process->process_id,

                'sequence'
                    => $process->sequence,

                'parameter_value'
                    => $process->parameter_value,

                'parameter_unit'
                    => $process->parameter_unit,

                'remarks'
                    => $process->remarks,

            ]);
        }
    }

    /**
     * Create Work Order
     */
    public function create(array $data): WorkOrder
    {
        return DB::transaction(function () use ($data) {

            $bom = $this->findActiveBom(
                $data['finished_good_item_id']
            );

            $workOrder = $this->createHeader(
                $data,
                $bom
            );

            $this->copyMaterials(
                $workOrder,
                $bom
            );

            $this->copyProcesses(
                $workOrder,
                $bom
            );

            return $workOrder->load([
                'finishedGood',
                'bomHeader',
                'materials.item',
                'processes.process',
            ]);
        });
    }

    /**
     * Release Work Order
     */
    public function release(
        WorkOrder $workOrder
    ): WorkOrder {

        if (! $workOrder->canBeReleased()) {

            throw new DomainException(
                'Work Order cannot be released.'
            );
        }

        return DB::transaction(function () use ($workOrder) {

            $workOrder->update([

                'status'
                    => WorkOrder::STATUS_RELEASED,

                'released_at'
                    => now(),

                'released_by'
                    => Auth::id(),

            ]);

            return $workOrder->fresh();
        });
    }

    public function start(WorkOrder $workOrder): WorkOrder
    {
        if (! $workOrder->canBeStarted()) {
            throw new \DomainException(
                'Work Order cannot be started.'
            );
        }

        return DB::transaction(function () use ($workOrder) {

            $workOrder->update([
                'status'      => WorkOrder::STATUS_IN_PROGRESS,
                'started_at'  => now(),
                'started_by'  => auth()->id(),
            ]);

            return $workOrder->fresh();

        });
    }
}