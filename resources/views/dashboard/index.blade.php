@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-slate-800">
    Dashboard
</h1>

<p class="text-slate-500 mt-2">
    Selamat datang di Rajawali Sakti Information System.
</p>

<div class="grid grid-cols-4 gap-6 mt-8">

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-slate-500 text-sm">Customer</h2>
        <p class="text-3xl font-bold mt-3">0</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-slate-500 text-sm">Item</h2>
        <p class="text-3xl font-bold mt-3">0</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-slate-500 text-sm">Quotation</h2>
        <p class="text-3xl font-bold mt-3">0</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-slate-500 text-sm">Invoice</h2>
        <p class="text-3xl font-bold mt-3">0</p>
    </div>

</div>

@endsection