<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBomRequest;
use App\Http\Requests\UpdateBomRequest;
use App\Models\BomDetail;
use App\Models\BomHeader;
use App\Models\BomProcess;
use App\Models\Item;
use App\Models\MasterProcess;
use Illuminate\Support\Facades\DB;

class BomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boms = BomHeader::with('finishedGood')
            ->orderBy('bom_code')
            ->get();

        return view('bom.index', compact('boms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $finishedGoods = Item::whereIn('item_type', [
                'Finished Good',
                'Semi Finished',
            ])
            ->where('is_active', true)
            ->orderBy('item_name')
            ->get();

        $components = Item::where('is_active', true)
            ->orderBy('item_name')
            ->get();

        $processes = MasterProcess::where('is_active', true)
            ->orderBy('process_name')
            ->get();

        return view('bom.create', [
            'finishedGoods' => $finishedGoods,
            'components'    => $components,
            'processes'     => $processes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBomRequest $request)
    {
        DB::transaction(function () use ($request) {

            // ===================================================
            // Generate BOM Code
            // ===================================================

            $nextNumber = BomHeader::count() + 1;

            $bomCode = 'BOM' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

            // ===================================================
            // Header
            // ===================================================

            $bom = BomHeader::create([

                'bom_code'               => $bomCode,
                'finished_good_item_id'  => $request->finished_good_item_id,
                'revision'               => $request->revision,
                'effective_date'         => $request->effective_date,
                'description'            => $request->description,
                'is_active'              => true,

            ]);

            // ===================================================
            // Materials
            // ===================================================

            $sequence = 10;

            foreach ($request->materials as $material) {

                BomDetail::create([

                    'bom_header_id'     => $bom->id,
                    'component_item_id' => $material['component_item_id'],
                    'usage_type'        => $material['usage_type'],
                    'qty'               => $material['qty'],
                    'yield_percent'     => $material['yield_percent'],
                    'sequence'          => $sequence,
                    'remarks'           => $material['remarks'] ?? null,

                ]);

                $sequence += 10;
            }

            // ===================================================
            // Processes
            // ===================================================

            $sequence = 10;

            foreach ($request->processes as $process) {

                BomProcess::create([

                    'bom_header_id'  => $bom->id,
                    'process_id'     => $process['process_id'],
                    'sequence'       => $sequence,
                    'parameter_value'=> $process['parameter_value'] ?? null,
                    'parameter_unit' => $process['parameter_unit'] ?? null,
                    'remarks'        => $process['remarks'] ?? null,

                ]);

                $sequence += 10;
            }

        });

        return redirect()
            ->route('boms.index')
            ->with('success', 'BOM created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bomHeader = BomHeader::with([
            'finishedGood',
            'details.item',
            'processes.process',
        ])->findOrFail($id);

        return view('bom.show', compact('bomHeader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BomHeader $bomHeader)
    {
        $bomHeader->load([
            'finishedGood',
            'details.item',
            'processes.process',
        ]);

        $finishedGoods = Item::whereIn('item_type', [
                'Finished Good',
                'Semi Finished',
            ])
            ->where('is_active', true)
            ->orderBy('item_name')
            ->get();

        $components = Item::where('is_active', true)
            ->orderBy('item_name')
            ->get();

        $processes = MasterProcess::where('is_active', true)
            ->orderBy('process_name')
            ->get();

        return view('bom.edit', [
            'bomHeader'      => $bomHeader,
            'finishedGoods'  => $finishedGoods,
            'components'     => $components,
            'processes'      => $processes,
        ]);
    }

    /**
     * Update the specified resource.
     */
    public function update(UpdateBomRequest $request, BomHeader $bomHeader)
    {
        DB::transaction(function () use ($request, $bomHeader) {

            // ==========================================
            // Update Header
            // ==========================================

            $bomHeader->update([

                'finished_good_item_id' => $request->finished_good_item_id,

                'revision' => $request->revision,

                'effective_date' => $request->effective_date,

                'description' => $request->description,

            ]);

            // ==========================================
            // Delete Detail Lama
            // ==========================================

            $bomHeader->details()->delete();

            // ==========================================
            // Insert Detail Baru
            // ==========================================

            $sequence = 10;

            foreach ($request->materials as $material) {

                BomDetail::create([

                    'bom_header_id'     => $bomHeader->id,

                    'component_item_id' => $material['component_item_id'],

                    'usage_type'        => $material['usage_type'],

                    'qty'               => $material['qty'],

                    'yield_percent'     => $material['yield_percent'],

                    'sequence'          => $sequence,

                    'remarks'           => $material['remarks'] ?? null,

                ]);

                $sequence += 10;

            }

            // ==========================================
            // Delete Process Lama
            // ==========================================

            $bomHeader->processes()->delete();

            // ==========================================
            // Insert Process Baru
            // ==========================================

            $sequence = 10;

            foreach ($request->processes as $process) {

                BomProcess::create([

                    'bom_header_id' => $bomHeader->id,

                    'process_id' => $process['process_id'],

                    'sequence' => $sequence,

                    'parameter_value' => $process['parameter_value'] ?? null,

                    'parameter_unit' => $process['parameter_unit'] ?? null,

                    'remarks' => $process['remarks'] ?? null,

                ]);

                $sequence += 10;

            }

        });

        return redirect()
            ->route('boms.show', $bomHeader)
            ->with('success', 'BOM updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(BomHeader $bomHeader)
    {
        //
    }
}