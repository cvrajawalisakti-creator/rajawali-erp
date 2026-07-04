<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Customer Master"
            subtitle="Manage customer master data"
        />
    </x-slot>

    <x-card class="p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-lg font-semibold">
                Customer List
            </h2>

            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + Add Customer
            </button>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Code
                        </th>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Customer Name
                        </th>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Contact Person
                        </th>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Phone
                        </th>

                        <th class="px-4 py-3 text-center font-semibold text-slate-700">
                            Status
                        </th>

                        <th class="px-4 py-3 text-center font-semibold text-slate-700">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td colspan="6"
                            class="px-4 py-12 text-center text-slate-400">

                            No customer data.

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </x-card>

</x-app-layout>