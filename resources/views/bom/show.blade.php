<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Bill of Materials"
            subtitle="BOM Detail"
        />
    </x-slot>

    <div class="space-y-6">

        <x-card class="p-6">

            <div class="flex justify-between">

                <div>

                    <h2 class="text-xl font-semibold">

                        {{ $bomHeader->bom_code }}

                    </h2>

                    <div class="text-slate-500 mt-1">

                        {{ $bomHeader->finishedGood->item_code }}
                        -
                        {{ $bomHeader->finishedGood->item_name }}

                    </div>

                </div>

                <div class="text-right">

                    <div>

                        <strong>Revision</strong>

                    </div>

                    <div>

                        {{ $bomHeader->revision }}

                    </div>

                    <div class="mt-3">

                        <strong>Effective</strong>

                    </div>

                    <div>

                        {{ optional($bomHeader->effective_date)->format('d/m/Y') }}

                    </div>

                </div>

            </div>

            <div class="mt-6">

                <strong>Description</strong>

                <div class="mt-2 text-slate-600">

                    {{ $bomHeader->description ?: '-' }}

                </div>

            </div>

        </x-card>

        <x-card class="p-6">

            <h2 class="text-lg font-semibold mb-4">

                Materials

            </h2>

            <table class="min-w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="p-3 text-center">
                            Seq
                        </th>

                        <th class="p-3 text-left">
                            Item
                        </th>

                        <th class="p-3 text-center">
                            Usage
                        </th>

                        <th class="p-3 text-center">
                            Qty
                        </th>

                        <th class="p-3 text-center">
                            Yield
                        </th>

                    </tr>

                </thead>

                <tbody>

                @foreach($bomHeader->details as $detail)

                    <tr class="border-t">

                        <td class="p-3 text-center">

                            {{ $detail->sequence }}

                        </td>

                        <td class="p-3">

                            {{ $detail->item->item_code }}

                            -

                            {{ $detail->item->item_name }}

                        </td>

                        <td class="text-center">

                            {{ $detail->usage_type }}

                        </td>

                        <td class="text-center">

                            {{ number_format($detail->qty,4) }}

                        </td>

                        <td class="text-center">

                            {{ number_format($detail->yield_percent,2) }} %

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </x-card>

        <x-card class="p-6">

            <h2 class="text-lg font-semibold mb-4">

                Production Process

            </h2>

            <table class="min-w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="p-3 text-center">
                            Seq
                        </th>

                        <th class="p-3 text-left">
                            Process
                        </th>

                        <th class="p-3 text-center">
                            Parameter
                        </th>

                        <th class="p-3 text-center">
                            Unit
                        </th>

                    </tr>

                </thead>

                <tbody>

                @foreach($bomHeader->processes as $process)

                    <tr class="border-t">

                        <td class="text-center p-3">

                            {{ $process->sequence }}

                        </td>

                        <td class="p-3">

                            {{ $process->process->process_code }}

                            -

                            {{ $process->process->process_name }}

                        </td>

                        <td class="text-center">

                            {{ $process->parameter_value }}

                        </td>

                        <td class="text-center">

                            {{ $process->parameter_unit }}

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </x-card>

    </div>

</x-app-layout>