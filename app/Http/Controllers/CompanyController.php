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
       $company = Company::first();

       $company->update($request->only([
        'company_name',
        'company_short_name',
        'address',
        'phone',
        'email',
        'website',
        'npwp',
        'nib',
        'director_name',
        'tax_name',
        'is_active',
       ]));

       return back()->with('success', 'Company profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
