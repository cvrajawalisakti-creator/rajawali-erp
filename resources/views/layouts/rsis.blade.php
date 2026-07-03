<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RSIS - Rajawali Sakti Information System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-800 text-white">

        <div class="p-5 text-2xl font-bold border-b border-slate-700">

            RSIS

        </div>

        <nav class="mt-5">

            <a href="{{ route('dashboard') }}"
               class="block px-5 py-3 hover:bg-slate-700">
                Dashboard
            </a>

            <a href="#"
               class="block px-5 py-3 hover:bg-slate-700">
                Company Profile
            </a>

            <a href="#"
               class="block px-5 py-3 hover:bg-slate-700">
                Customer
            </a>

            <a href="#"
               class="block px-5 py-3 hover:bg-slate-700">
                Supplier
            </a>

            <a href="#"
               class="block px-5 py-3 hover:bg-slate-700">
                Item Master
            </a>

        </nav>

    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col">

        <!-- Topbar -->
        <header class="bg-white shadow px-6 py-4 flex justify-between">

            <div class="font-semibold text-xl">

                Rajawali Sakti Information System

            </div>

            <div>

                {{ Auth::user()->name }}

            </div>

        </header>

        <!-- Content -->

        <main class="p-6">

            {{ $slot }}

        </main>

    </div>

</div>

</body>
</html>