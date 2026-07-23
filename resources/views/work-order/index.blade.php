<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Work Orders"
            subtitle="Production Work Orders"
        />
    </x-slot>

    <div class="p-6">

        @if(session('success'))

            <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">

                {{ session('success') }}

            </div>

        @endif

        <div class="flex items-center justify-between mb-6">

            <h2 class="text-xl font-semibold">

                Work Order List

            </h2>

            <a
                href="{{ route('work-orders.create') }}"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

                + New Work Order

            </a>

        </div>

        <div class="bg-white rounded-xl shadow overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="px-4 py-3 text-left">
                            WO Number
                        </th>

                        <th class="px-4 py-3 text-left">
                            Finished Good
                        </th>

                        <th class="px-4 py-3 text-center">
                            Qty
                        </th>

                        <th class="px-4 py-3 text-center">
                            Status
                        </th>

                        <th class="px-4 py-3 text-center">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($workOrders as $workOrder)

                    <tr class="border-t hover:bg-slate-50">

                        <td class="px-4 py-3">

                            {{ $workOrder->wo_number }}

                        </td>

                        <td class="px-4 py-3">

                            {{ $workOrder->finishedGood?->item_code }}

                            -

                            {{ $workOrder->finishedGood?->item_name }}

                        </td>

                        <td class="px-4 py-3 text-center">

                            {{ number_format($workOrder->planned_qty, 2) }}

                        </td>

                        <td class="px-4 py-3 text-center">

                            <span class="px-2 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">

                                {{ $workOrder->status }}

                            </span>

                        </td>

                        <td class="px-4 py-3 text-center">

                            -

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="text-center py-10 text-slate-500">

                            No Work Orders Available

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-6">

            {{ $workOrders->links() }}

        </div>

    </div>

</x-app-layout>