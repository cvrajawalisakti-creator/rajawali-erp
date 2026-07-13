<?php

namespace App\Http\Controllers;

use App\Models\BomHeader;
use App\Http\Requests\StoreBomRequest;
use App\Http\Requests\UpdateBomRequest;
use App\Models\Item;
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
        $items = Item::whereIn('item_type', [
            'Finished Good',
            'Semi Finished'
        ])
        ->where('is_active', true)
        ->orderBy('item_name')
        ->get();

        return view('bom.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BomHeader $bomHeader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BomHeader $bomHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBomRequest $request, BomHeader $bomHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BomHeader $bomHeader)
    {
        //
    }
}
