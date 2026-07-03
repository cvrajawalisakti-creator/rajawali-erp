<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Company $company)
    {
        //
    }

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

        // Checkbox akan selalu menjadi true / false
        $validated['is_active'] = $request->boolean('is_active');

        $company = Company::first();

        $company->update($validated);

        return back()->with('success', 'Company Profile updated successfully.');
    }

    public function destroy(Company $company)
    {
        //
    }
}