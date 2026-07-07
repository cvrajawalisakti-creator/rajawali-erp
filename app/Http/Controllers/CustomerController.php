<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('customer_code')->get();

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $lastCustomer = Customer::orderBy('id', 'desc')->first();

        if ($lastCustomer) {
            $number = (int) substr($lastCustomer->customer_code, 4) + 1;
        } else {
            $number = 1;
        }

        $customerCode = 'CUST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        Customer::create([
            'customer_code'  => $customerCode,
            'customer_name'  => $request->customer_name,
            'contact_person' => $request->contact_person,
            'phone'          => $request->phone,
            'email'          => $request->email,
            'address'        => $request->address,
            'npwp'           => $request->npwp,
            'is_active'      => true,
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer created successfully.');
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
