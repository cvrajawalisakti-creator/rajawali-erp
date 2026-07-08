<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RSIS ERP') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-100">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside class="w-64 bg-slate-900 text-white">

        <div class="h-16 flex items-center px-6 border-b border-slate-800">
            <h1 class="text-xl font-bold">
                RSIS ERP
            </h1>
        </div>

        <nav class="p-4 space-y-2">

            <a href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'block rounded-lg px-4 py-2 bg-slate-700 text-white font-medium' : 'block rounded-lg px-4 py-2 hover:bg-slate-800' }}">
                 Dashboard
            </a>

            <a href="{{ route('company.edit') }}"
                class="{{ request()->routeIs('company.*')
                    ? 'block rounded-lg px-4 py-2 bg-slate-700 text-white font-medium'
                    : 'block rounded-lg px-4 py-2 hover:bg-slate-800' }}">
                 Company Profile
            </a>

            <a href="{{ route('customers.index') }}"
                class="{{ request()->routeIs('customers.*')
                    ? 'block rounded-lg px-4 py-2 bg-slate-700 text-white font-medium'
                    : 'block rounded-lg px-4 py-2 hover:bg-slate-800' }}">
                 Customer Master
            </a>

            <a href="{{ route('suppliers.index') }}"
                class="{{ request()->routeIs('suppliers.*')
                    ? 'block rounded-lg px-4 py-2 bg-slate-700 text-white font-medium'
                    : 'block rounded-lg px-4 py-2 hover:bg-slate-800' }}">
                  Supplier Master
            </a>

            <a href="{{ route('items.index') }}"
                class="block px-5 py-3 rounded-lg
                {{ request()->routeIs('items.*') ? 'bg-slate-600 text-white' : 'hover:bg-slate-700' }}">
                Item Master
            </a>

        </nav>

    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">

        {{-- Topbar --}}
        <header class="bg-white border-b flex items-center justify-between px-8 py-5">

            <div>
                @isset($header)
                    {{ $header }}
                @endisset
            </div>

            <div class="flex items-center gap-4">

                <span class="text-slate-600">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="text-red-600 hover:text-red-800">
                        Logout
                    </button>
                </form>

            </div>

        </header>

        <main class="flex-1 p-8">

            {{ $slot }}

        </main>

    </div>

</div>

</body>
</html>