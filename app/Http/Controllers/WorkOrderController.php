<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WorkOrderService;
use App\Models\Item;
use App\Models\WorkOrder;
use App\Http\Requests\WorkOrderRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WorkOrderController extends Controller
{
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

        return view('work-order.index', compact('workOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(WorkOrderService $service)
    {
        $finishedGoods = Item::where('item_type', 'Finished Good')
            ->orderBy('item_code')
            ->get();

        return view('work-order.create', [
            'woNumber' => $service->generateNumber(),
            'finishedGoods' => $finishedGoods,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        WorkOrderRequest $request,
        WorkOrderService $service
    )
    {
        try {
            $service->create($request->validated());

            return redirect()
                ->route('work-orders.index')
                ->with('success', 'Work Order created successfully.');
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
                    'general' => 'Failed to create Work Order.',
                ]);
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
