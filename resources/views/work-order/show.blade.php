<x-app-layout>

    <x-slot name="header">

        <x-page-header
            title="Work Order Detail"
            subtitle="View work order information"
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

        <div class="flex items-center justify-between mb-6">

            <h2 class="text-lg font-semibold text-gray-800">
                Work Order Information
            </h2>

            <div class="flex gap-3">

                @if($workOrder->canBeReleased())

                    <form
                        action="{{ route('work-orders.release', $workOrder) }}"
                        method="POST">

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            onclick="return confirm('Release this Work Order?')"
                            class="rounded-lg bg-green-600 px-4 py-2 text-white hover:bg-green-700">

                            Release

                        </button>

                    </form>

                @endif

                @if($workOrder->canBeStarted())

                    <form
                        action="{{ route('work-orders.start', $workOrder) }}"
                        method="POST">

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            onclick="return confirm('Start this Work Order?')"
                            class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">

                            Start Production

                        </button>

                    </form>

                @endif

                <a
                    href="{{ route('work-orders.index') }}"
                    class="rounded-lg border px-4 py-2 hover:bg-gray-100">

                    Back

                </a>

            </div>

        </div>

                <div class="grid grid-cols-2 gap-6">

            <div>

                <div class="font-semibold text-gray-700">
                    WO Number
                </div>

                <div class="mt-1">
                    {{ $workOrder->wo_number }}
                </div>

            </div>

            <div>

                <div class="font-semibold text-gray-700">
                    WO Date
                </div>

                <div class="mt-1">
                    {{ $workOrder->wo_date->format('d-m-Y') }}
                </div>

            </div>

            <div>

                <div class="font-semibold text-gray-700">
                    Finished Good
                </div>

                <div class="mt-1">
                    {{ $workOrder->finishedGood->item_code }}
                    -
                    {{ $workOrder->finishedGood->item_name }}
                </div>

            </div>

            <div>

                <div class="font-semibold text-gray-700">
                    Status
                </div>

                <div class="mt-1">

                    @switch($workOrder->status)

                        @case('Draft')

                            <span class="rounded-full bg-gray-100 px-3 py-1 text-sm font-semibold text-gray-700">
                                Draft
                            </span>

                            @break

                        @case('Released')

                            <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-semibold text-blue-700">
                                Released
                            </span>

                            @break

                        @case('In Progress')

                            <span class="rounded-full bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-700">
                                In Progress
                            </span>

                            @break

                        @case('Completed')

                            <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700">
                                Completed
                            </span>

                            @break

                        @case('Closed')

                            <span class="rounded-full bg-slate-200 px-3 py-1 text-sm font-semibold text-slate-700">
                                Closed
                            </span>

                            @break

                        @case('Cancelled')

                            <span class="rounded-full bg-red-100 px-3 py-1 text-sm font-semibold text-red-700">
                                Cancelled
                            </span>

                            @break

                    @endswitch

                </div>

            </div>

                        <div>

                <div class="font-semibold text-gray-700">
                    Planned Qty
                </div>

                <div class="mt-1">
                    {{ number_format($workOrder->planned_qty,4) }}
                </div>

            </div>

            <div>

                <div class="font-semibold text-gray-700">
                    Completed Qty
                </div>

                <div class="mt-1">
                    {{ number_format($workOrder->completed_qty,4) }}
                </div>

            </div>

            <div class="col-span-2">

                <div class="font-semibold text-gray-700">
                    Remarks
                </div>

                <div class="mt-1">
                    {{ $workOrder->remarks ?: '-' }}
                </div>

            </div>

        </div>

    </x-card>

    <div class="mt-6">

        <x-card class="p-6">

            <h2 class="mb-4 text-lg font-semibold">
                Audit Information
            </h2>

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <div class="font-semibold text-gray-700">Released By</div>
                    <div>{{ $workOrder->releasedBy?->name ?? '-' }}</div>
                </div>

                <div>
                    <div class="font-semibold text-gray-700">Released At</div>
                    <div>{{ optional($workOrder->released_at)?->format('d-m-Y H:i') ?? '-' }}</div>
                </div>

                <div>
                    <div class="font-semibold text-gray-700">Started By</div>
                    <div>{{ $workOrder->startedBy?->name ?? '-' }}</div>
                </div>

                <div>
                    <div class="font-semibold text-gray-700">Started At</div>
                    <div>{{ optional($workOrder->started_at)?->format('d-m-Y H:i') ?? '-' }}</div>
                </div>

                <div>
                    <div class="font-semibold text-gray-700">Completed By</div>
                    <div>{{ $workOrder->completedBy?->name ?? '-' }}</div>
                </div>

                <div>
                    <div class="font-semibold text-gray-700">Completed At</div>
                    <div>{{ optional($workOrder->completed_at)?->format('d-m-Y H:i') ?? '-' }}</div>
                </div>

                <div>
                    <div class="font-semibold text-gray-700">Closed By</div>
                    <div>{{ $workOrder->closedBy?->name ?? '-' }}</div>
                </div>

                <div>
                    <div class="font-semibold text-gray-700">Closed At</div>
                    <div>{{ optional($workOrder->closed_at)?->format('d-m-Y H:i') ?? '-' }}</div>
                </div>

                <div>
                    <div class="font-semibold text-gray-700">Cancelled By</div>
                    <div>{{ $workOrder->cancelledBy?->name ?? '-' }}</div>
                </div>

                <div>
                    <div class="font-semibold text-gray-700">Cancelled At</div>
                    <div>{{ optional($workOrder->cancelled_at)?->format('d-m-Y H:i') ?? '-' }}</div>
                </div>

                <div class="col-span-2">
                    <div class="font-semibold text-gray-700">
                        Cancellation Reason
                    </div>
                    <div>{{ $workOrder->cancelled_reason ?? '-' }}</div>
                </div>

            </div>

        </x-card>

    </div>

        <div class="mt-6">

        <x-card class="p-6">

            <h2 class="mb-4 text-lg font-semibold">
                Materials
            </h2>

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Seq</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Item</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold uppercase">Required Qty</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold uppercase">Issued Qty</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold uppercase">Unit</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @forelse($workOrder->materials as $material)

                            <tr>

                                <td class="px-4 py-3">{{ $material->sequence }}</td>

                                <td class="px-4 py-3">
                                    {{ $material->item->item_code }}
                                    -
                                    {{ $material->item->item_name }}
                                </td>

                                <td class="px-4 py-3 text-right">
                                    {{ number_format($material->required_qty,4) }}
                                </td>

                                <td class="px-4 py-3 text-right">
                                    {{ number_format($material->issued_qty,4) }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    {{ $material->unit }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                    No materials found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </x-card>

    </div>

        <div class="mt-6">

        <x-card class="p-6">

            <h2 class="mb-4 text-lg font-semibold">
                Processes
            </h2>

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Seq</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase">Process</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold uppercase">Parameter</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold uppercase">Unit</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @forelse($workOrder->processes as $process)

                            <tr>

                                <td class="px-4 py-3">
                                    {{ $process->sequence }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $process->process->process_name }}
                                </td>

                                <td class="px-4 py-3 text-right">
                                    {{ $process->parameter_value }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    {{ $process->parameter_unit }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                    No processes found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </x-card>

    </div>

    </x-app-layout>

