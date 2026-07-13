<?php

namespace App\Http\Controllers;

use App\Models\MasterProcess;
use App\Http\Requests\StoreMasterProcessRequest;
use App\Http\Requests\UpdateMasterProcessRequest;

class MasterProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $processes = MasterProcess::orderBy('process_code')->get();

        return view('master_process.index', compact('processes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master_process.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMasterProcessRequest $request)
    {
        $last = MasterProcess::orderByDesc('id')->first();

        if ($last) {
            $number = (int) substr($last->process_code, 2) + 1;
        } else {
            $number = 1;
        }

        $processCode = 'PR' . str_pad($number, 5, '0', STR_PAD_LEFT);

        MasterProcess::create([
            'process_code' => $processCode,
            'process_name' => $request->process_name,
            'default_unit' => $request->default_unit,
            'description' => $request->description,
            'is_active' => true,
        ]);

        return redirect()
            ->route('master-processes.index')
            ->with('success', 'Master Process created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterProcess $masterProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterProcess $masterProcess)
    {
        return view('master_process.edit', compact('masterProcess'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMasterProcessRequest $request, MasterProcess $masterProcess)
    {
        $masterProcess->update([
            'process_name' => $request->process_name,
            'default_unit' => $request->default_unit,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('master-processes.index')
            ->with('success', 'Master Process updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterProcess $masterProcess)
    {
        $masterProcess->delete();

        return redirect()
            ->route('master-processes.index')
            ->with('success', 'Master Process deleted successfully.');
    }
}
