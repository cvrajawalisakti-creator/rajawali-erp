<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::orderBy('item_code')->get();

        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $lastItem = Item::orderBy('id', 'desc')->first();

        if ($lastItem) {
            $number = (int) substr($lastItem->item_code, 3) + 1;
        } else {
            $number = 1;
        }

        $itemCode = 'ITM' . str_pad($number, 5, '0', STR_PAD_LEFT);

        Item::create([
            'item_code'      => $itemCode,
            'item_name'      => $request->item_name,
            'alias'          => $request->alias,
            'item_type'      => $request->item_type,
            'category'       => $request->category,
            'material_type'  => $request->material_type,
            'unit'           => $request->unit,
            'is_active'      => true,
        ]);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update([
            'item_name'      => $request->item_name,
            'alias'          => $request->alias,
            'item_type'      => $request->item_type,
            'category'       => $request->category,
            'material_type'  => $request->material_type,
            'unit'           => $request->unit,
        ]);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }
}
