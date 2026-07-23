<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkOrderRequest;
use App\Models\Item;
use App\Models\WorkOrder;
use App\Services\WorkOrderService;
use DomainException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function __construct(
        protected WorkOrderService $workOrderService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workOrders = WorkOrder::with([
            'finishedGood',
            'bomHeader',
        ])
        ->latest('wo_date')
        ->paginate(10);

        return view(
            'work-order.index',
            compact('workOrders')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $finishedGoods = Item::where(
                'item_type',
                'Finished Good'
            )
            ->orderBy('item_code')
            ->get();

        return view('work-order.create', [

            'woNumber'
                => $this->workOrderService->generateNumber(),

            'finishedGoods'
                => $finishedGoods,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        WorkOrderRequest $request
    ) {
        try {

            $workOrder = $this->workOrderService->create(
                $request->validated()
            );

            return redirect()
                ->route('work-orders.show', $workOrder)
                ->with(
                    'success',
                    'Work Order created successfully.'
                );

        } catch (ModelNotFoundException $e) {

            return back()
                ->withInput()
                ->withErrors([
                    'finished_good_item_id' =>
                        'Active BOM for selected Finished Good was not found.',
                ]);

        } catch (\Throwable $e) {

            report($e);

            return back()
                ->withInput()
                ->withErrors([
                    'general' =>
                        'Failed to create Work Order.',
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(
        WorkOrder $workOrder
    ) {
        $workOrder->load([
            'finishedGood',
            'bomHeader',
            'materials.item',
            'processes.process',
            'releasedBy',
            'startedBy',
            'completedBy',
            'closedBy',
            'cancelledBy',
        ]);

        return view(
            'work-order.show',
            compact('workOrder')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        WorkOrder $workOrder
    ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        WorkOrder $workOrder
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        WorkOrder $workOrder
    ) {
        //
    }

    /**
     * Release Work Order.
     */
    public function release(
        WorkOrder $workOrder
    ) {
        try {

            $this->workOrderService->release(
                $workOrder
            );

            return redirect()
                ->route(
                    'work-orders.show',
                    $workOrder
                )
                ->with(
                    'success',
                    'Work Order released successfully.'
                );

        } catch (DomainException $e) {

            return back()
                ->with(
                    'error',
                    $e->getMessage()
                );

        } catch (\Throwable $e) {

            report($e);

            return back()
                ->with(
                    'error',
                    'Unexpected error occurred.'
                );
        }
    }

    public function start(WorkOrder $workOrder)
    {
        try {

            $this->workOrderService->start($workOrder);

            return redirect()
                ->route('work-orders.show', $workOrder)
                ->with(
                    'success',
                    'Work Order started successfully.'
                );

        } catch (DomainException $e) {

            return back()->with(
                'error',
                $e->getMessage()
            );

        } catch (\Throwable $e) {

            report($e);

            return back()->with(
                'error',
                'Unexpected error occurred.'
            );
        }
    }
}