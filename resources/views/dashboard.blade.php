<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">
                    Dashboard
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Welcome back, {{ Auth::user()->name }} 👋
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="text-sm text-slate-500">
                        Customers
                    </div>

                    <div class="text-3xl font-bold mt-3">
                        0
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="text-sm text-slate-500">
                        Suppliers
                    </div>

                    <div class="text-3xl font-bold mt-3">
                        0
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="text-sm text-slate-500">
                        Items
                    </div>

                    <div class="text-3xl font-bold mt-3">
                        0
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="text-sm text-slate-500">
                        Purchase Today
                    </div>

                    <div class="text-3xl font-bold mt-3">
                        0
                    </div>
                </div>

            </div>

            <div class="mt-8 bg-white rounded-xl shadow-sm p-6">

                <h3 class="text-lg font-semibold">
                    Company Information
                </h3>

                <div class="mt-4 space-y-2">

                    <div>
                        <span class="text-slate-500">
                            Company
                        </span>

                        <div class="font-semibold">
                            CV Rajawali Sakti
                        </div>
                    </div>

                    <div>
                        <span class="text-slate-500">
                            ERP Version
                        </span>

                        <div class="font-semibold">
                            v0.1.0
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>