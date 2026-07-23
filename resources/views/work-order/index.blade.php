<x-app-layout>

    <x-slot name="header">

        <x-page-header
            title="Work Orders"
            subtitle="Manage production work orders"
        />

    </x-slot>

    @if(session('success'))

        <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-800">
            {{ session('success') }}
        </div>

    @endif

    @if(session('error'))

        <div class="mb-4 rounded-lg bg-red-100 p-4 text-red-800">
            {{ session('error') }}
        </div>

    @endif

    <x-card class="p-6">

        <div class="mb-6 flex items-center justify-between">

            <h2 class="text-2xl font-semibold text-slate-800">
                Work Order List
            </h2>

            <a
                href="{{ route('work-orders.create') }}"
                class="inline-flex items-center rounded-lg bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow hover:bg-indigo-700">

                + New Work Order

            </a>

        </div>

        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">

                <tr>

                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                        WO Number
                    </th>

                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                        Date
                    </th>

                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                        Finished Good
                    </th>

                    <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">
                        Qty
                    </th>

                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">
                        Status
                    </th>

                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-200">

                @forelse($workOrders as $workOrder)

                    <tr class="hover:bg-gray-50">

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

                            @switch($workOrder->status)

                                @case(\App\Models\WorkOrder::STATUS_DRAFT)

                                    <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">
                                        Draft
                                    </span>

                                    @break

                                @case(\App\Models\WorkOrder::STATUS_RELEASED)

                                    <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                                        Released
                                    </span>

                                    @break

                                @case(\App\Models\WorkOrder::STATUS_IN_PROGRESS)

                                    <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                        In Progress
                                    </span>

                                    @break

                                @case(\App\Models\WorkOrder::STATUS_COMPLETED)

                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Completed
                                    </span>

                                    @break

                                @case(\App\Models\WorkOrder::STATUS_CLOSED)

                                    <span class="inline-flex rounded-full bg-slate-200 px-3 py-1 text-xs font-semibold text-slate-700">
                                        Closed
                                    </span>

                                    @break

                                @case(\App\Models\WorkOrder::STATUS_CANCELLED)

                                    <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        Cancelled
                                    </span>

                                    @break

                            @endswitch

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <a
                                    href="{{ route('work-orders.show', $workOrder) }}"
                                    class="text-indigo-600 hover:text-indigo-900">

                                    View

                                </a>

                                @if($workOrder->canBeStarted())

                                    <span class="text-gray-300">|</span>

                                    <button
                                        type="button"
                                        class="font-medium text-green-600 hover:text-green-700">

                                        Start

                                    </button>

                                @endif

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-10 text-center text-gray-500">

                            No Work Orders found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </x-card>

    <div class="mt-6">

        {{ $workOrders->links() }}

    </div>

</x-app-layout>