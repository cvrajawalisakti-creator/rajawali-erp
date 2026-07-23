<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Bill of Materials"
            subtitle="BOM Detail"
        />
    </x-slot>

    @if(session('success'))

        <div
            class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700">

            {{ session('success') }}

        </div>

    @endif

    <div class="space-y-6">

        <x-card class="p-6">

            <div class="flex justify-between items-start">

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

                <div class="flex gap-2">

                <a
                    href="{{ route('boms.edit', $bomHeader->id) }}"
                    class="px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600">

                    Edit

                </a>

                <form action="{{ route('boms.revision.store', $bomHeader->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        New Revision
                    </button>
                </form>

                <a
                    href="{{ route('boms.index') }}"
                    class="px-4 py-2 border rounded-lg hover:bg-slate-100">

                    Back

                </a>

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

        <x-card class="p-6">

            <h2 class="text-lg font-semibold mb-4">
                Revision History
            </h2>

            <table class="min-w-full">

                <thead class="bg-slate-100">

                    <tr>
                        <th class="p-3 text-center">Revision</th>
                        <th class="p-3 text-center">Effective Date</th>
                        <th class="p-3 text-center">Status</th>
                        <th class="p-3 text-center">Action</th>
                    </tr>

                </thead>

                <tbody>

                @foreach($revisionHistory as $revision)

                    <tr class="border-t">

                        <td class="p-3 text-center">
                            {{ $revision->revision }}
                        </td>

                        <td class="p-3 text-center">
                            {{ optional($revision->effective_date)->format('d/m/Y') }}
                        </td>

                        <td class="p-3 text-center">

                            @if($revision->is_active)
                                <span class="px-2 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                    Active
                                </span>
                            @else
                                <span class="px-2 py-1 rounded-full bg-slate-200 text-slate-700 text-xs font-semibold">
                                    Inactive
                                </span>
                            @endif

                        </td>

                        <td class="p-3 text-center">

                            @if($revision->id != $bomHeader->id)

                                <a
                                    href="{{ route('boms.show', $revision->id) }}"
                                    class="text-blue-600 hover:underline">
                                    View
                                </a>

                            @else

                                <span class="text-green-600 font-semibold">
                                    Current
                                </span>

                            @endif

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </x-card>

        </div>

        </x-app-layout>