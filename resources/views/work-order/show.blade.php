<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Work Order Detail"
            subtitle="View work order information"
        />
    </x-slot>

    <x-card class="p-6">

        <div class="grid grid-cols-2 gap-6">

            <div>
                <strong>WO Number</strong><br>
                {{ $workOrder->wo_number }}
            </div>

            <div>
                <strong>WO Date</strong><br>
                {{ $workOrder->wo_date->format('d-m-Y') }}
            </div>

            <div>
                <strong>Finished Good</strong><br>
                {{ $workOrder->finishedGood->item_code }}
                -
                {{ $workOrder->finishedGood->item_name }}
            </div>

            <div>
                <strong>Status</strong><br>
                {{ $workOrder->status }}
            </div>

            <div>
                <strong>Planned Qty</strong><br>
                {{ number_format($workOrder->planned_qty,4) }}
            </div>

            <div>
                <strong>Completed Qty</strong><br>
                {{ number_format($workOrder->completed_qty,4) }}
            </div>

            <div class="col-span-2">
                <strong>Remarks</strong><br>
                {{ $workOrder->remarks ?? '-' }}
            </div>

        </div>

    </x-card>

    <div class="mt-6">

        <x-card class="p-6">

            <h2 class="text-lg font-semibold mb-4">
                Materials
            </h2>

            <table class="min-w-full">

                <thead>

                    <tr>

                        <th>Seq</th>
                        <th>Item</th>
                        <th>Required Qty</th>
                        <th>Issued Qty</th>
                        <th>Unit</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($workOrder->materials as $material)

                        <tr>

                            <td>{{ $material->sequence }}</td>

                            <td>
                                {{ $material->item->item_code }}
                                -
                                {{ $material->item->item_name }}
                            </td>

                            <td>
                                {{ number_format($material->required_qty,4) }}
                            </td>

                            <td>
                                {{ number_format($material->issued_qty,4) }}
                            </td>

                            <td>{{ $material->unit }}</td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5">
                                No materials.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </x-card>

    </div>

    <div class="mt-6">

        <x-card class="p-6">

            <h2 class="text-lg font-semibold mb-4">
                Processes
            </h2>

            <table class="min-w-full">

                <thead>

                    <tr>

                        <th>Seq</th>
                        <th>Process</th>
                        <th>Parameter</th>
                        <th>Unit</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($workOrder->processes as $process)

                        <tr>

                            <td>{{ $process->sequence }}</td>

                            <td>
                                {{ $process->process->process_name }}
                            </td>

                            <td>
                                {{ $process->parameter_value }}
                            </td>

                            <td>
                                {{ $process->parameter_unit }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4">
                                No processes.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </x-card>

    </div>

    <div class="mt-6">

        <a
            href="{{ route('work-orders.index') }}"
            class="px-4 py-2 rounded-lg border">

            Back

        </a>

    </div>

</x-app-layout>