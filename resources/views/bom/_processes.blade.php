<x-card class="p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-lg font-semibold">
            Production Process
        </h2>

        <button
            id="btn-add-process"
            type="button"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg">

            + Add Process

        </button>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-slate-200">

            <thead class="bg-slate-100">

                <tr>

                    <th class="px-4 py-3 text-left">
                        Process
                    </th>

                    <th class="px-4 py-3 text-center">
                        Parameter
                    </th>

                    <th class="px-4 py-3 text-center">
                        Unit
                    </th>

                    <th class="px-4 py-3 text-left">
                        Remark
                    </th>

                    <th class="px-4 py-3 text-center">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody id="processes-body">

            @php

                $processRows = old(
                    'processes',
                    isset($bomHeader)
                        ? $bomHeader->processes->toArray()
                        : [[
                            'process_id' => '',
                            'parameter_value' => '',
                            'parameter_unit' => '',
                            'remarks' => '',
                        ]]
                );

            @endphp

            @foreach($processRows as $index => $process)

                <tr>

                    <td class="p-2">

                        <select
                            name="processes[{{ $index }}][process_id]"
                            class="w-full rounded-lg border-slate-300">

                            <option value="">
                                -- Select Process --
                            </option>

                            @foreach($processes as $master)

                                <option
                                    value="{{ $master->id }}"
                                    {{
                                        ($process['process_id'] ?? '') == $master->id
                                            ? 'selected'
                                            : ''
                                    }}>

                                    {{ $master->process_code }}
                                    |
                                    {{ $master->process_name }}

                                </option>

                            @endforeach

                        </select>

                    </td>

                    <td class="p-2">

                        <input
                            type="number"
                            step="0.0001"
                            name="processes[{{ $index }}][parameter_value]"
                            value="{{ $process['parameter_value'] ?? '' }}"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="p-2">

                        <input
                            type="text"
                            name="processes[{{ $index }}][parameter_unit]"
                            value="{{ $process['parameter_unit'] ?? '' }}"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="p-2">

                        <input
                            type="text"
                            name="processes[{{ $index }}][remarks]"
                            value="{{ $process['remarks'] ?? '' }}"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="text-center">

                        <button
                            type="button"
                            class="btn-delete-process text-red-600">

                            🗑

                        </button>

                    </td>

                </tr>

            @endforeach
            </tbody>

        </table>

    </div>

</x-card>

@push('scripts')

<script>

let processIndex = document.querySelectorAll('#processes-body tr').length;

document
.getElementById('btn-add-process')
.addEventListener('click', function () {

    const tbody = document.getElementById('processes-body');

    const row = tbody.rows[0].cloneNode(true);

    row.querySelectorAll('select,input').forEach(function(el){

        if(el.name){

            el.name = el.name.replace(/\[\d+\]/, '[' + processIndex + ']');

        }

        if(el.tagName === 'INPUT'){

            el.value='';

        }

        if(el.tagName === 'SELECT'){

            el.selectedIndex=0;

        }

    });

    tbody.appendChild(row);

    processIndex++;

});

document.addEventListener('click',function(e){

    if(e.target.classList.contains('btn-delete-process')){

        const rows=document.querySelectorAll('#processes-body tr');

        if(rows.length>1){

            e.target.closest('tr').remove();

        }

    }

});

</script>

@endpush