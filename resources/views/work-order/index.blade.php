<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">

            <x-page-header
                title="Work Orders"
                subtitle="Manage production work orders"
            />

            <a
                href="{{ route('work-orders.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">

                New Work Order

            </a>

        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-xl overflow-hidden">

        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">

                <tr>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        WO Number
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        Date
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        Finished Good
                    </th>

                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                        Qty
                    </th>

                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                        Status
                    </th>

                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-200 bg-white">

                @forelse($workOrders as $workOrder)

                    <tr>

                        <td class="px-6 py-4">
                            {{ $workOrder->wo_number }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $workOrder->wo_date->format('d-m-Y') }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $workOrder->finishedGood->item_name }}
                        </td>

                        <td class="px-6 py-4 text-right">
                            {{ number_format($workOrder->planned_qty,4) }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            {{ $workOrder->status }}
                        </td>

                        <td class="px-6 py-4 text-center">

                            <a
                                href="{{ route('work-orders.show',$workOrder) }}"
                                class="text-indigo-600 hover:text-indigo-900">

                                View

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="px-6 py-8 text-center text-gray-500">

                            No Work Orders found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $workOrders->links() }}

    </div>

</x-app-layout>