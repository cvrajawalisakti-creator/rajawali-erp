<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
       $company = Company::first();

       if (! $company) {
         $company = Company::create([
            'company_name' => '',
            'is_active' => true,
        ]);
       }

       return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       $validated = $request->validate([
        'company_name' => 'required|max:255',
        'company_short_name' => 'nullable|max:255',
        'address' => 'nullable',
        'phone' => 'nullable|max:100',
        'email' => 'nullable|email',
        'website' => 'nullable|max:255',
        'npwp' => 'nullable|max:100',
        'nib' => 'nullable|max:100',
        'director_name' => 'nullable|max:255',
        'tax_name' => 'nullable|max:255',
        'is_active' => 'nullable|boolean',
    ]);

       $company = Company::first();

       $company->update($validated);

       return back()->with('success', 'Company Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
