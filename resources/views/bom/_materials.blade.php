<x-card class="p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-lg font-semibold">
            Material & Consumable
        </h2>

        <button
            id="btn-add-material"
            type="button"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg">

            + Add Material

        </button>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-slate-200">

            <thead class="bg-slate-100">

                <tr>

                    <th class="px-4 py-3 text-left">
                        Item
                    </th>

                    <th class="px-4 py-3 text-center">
                        Usage
                    </th>

                    <th class="px-4 py-3 text-center">
                        Qty
                    </th>

                    <th class="px-4 py-3 text-center">
                        Yield %
                    </th>

                    <th class="px-4 py-3 text-left">
                        Remark
                    </th>

                    <th class="px-4 py-3 text-center">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody id="materials-body">

            @php

                $materials = old(
                    'materials',
                    isset($bomHeader)
                        ? $bomHeader->details->toArray()
                        : [[
                            'component_item_id' => '',
                            'usage_type' => 'Material',
                            'qty' => 1,
                            'yield_percent' => 100,
                            'remarks' => '',
                        ]]
                );

            @endphp

            @foreach($materials as $index => $material)

                <tr>

                    <td class="p-2">

                        <select
                            name="materials[{{ $index }}][component_item_id]"
                            class="w-full rounded-lg border-slate-300">

                            <option value="">
                                -- Select Item --
                            </option>

                            @foreach($components as $item)

                                <option
                                    value="{{ $item->id }}"
                                    {{
                                        ($material['component_item_id'] ?? '') == $item->id
                                        ? 'selected'
                                        : ''
                                    }}>

                                    {{ $item->item_code }}
                                    |
                                    {{ $item->item_type }}
                                    |
                                    {{ $item->item_name }}

                                </option>

                            @endforeach

                        </select>

                    </td>

                    <td class="p-2">

                        <select
                            name="materials[{{ $index }}][usage_type]"
                            class="w-full rounded-lg border-slate-300">

                            <option
                                value="Material"
                                {{
                                    ($material['usage_type'] ?? '') == 'Material'
                                    ? 'selected'
                                    : ''
                                }}>

                                Material

                            </option>

                            <option
                                value="Consumable"
                                {{
                                    ($material['usage_type'] ?? '') == 'Consumable'
                                    ? 'selected'
                                    : ''
                                }}>

                                Consumable

                            </option>

                        </select>

                    </td>

                    <td class="p-2">

                        <input
                            type="number"
                            step="0.0001"
                            name="materials[{{ $index }}][qty]"
                            value="{{ $material['qty'] ?? 1 }}"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="p-2">

                        <input
                            type="number"
                            step="0.01"
                            name="materials[{{ $index }}][yield_percent]"
                            value="{{ $material['yield_percent'] ?? 100 }}"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="p-2">

                        <input
                            type="text"
                            name="materials[{{ $index }}][remarks]"
                            value="{{ $material['remarks'] ?? '' }}"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="text-center">

                        <button
                            type="button"
                            class="btn-delete-material text-red-600">

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

let materialIndex = document.querySelectorAll('#materials-body tr').length;

document
.getElementById('btn-add-material')
.addEventListener('click', function () {

    const tbody = document.getElementById('materials-body');

    const row = tbody.rows[0].cloneNode(true);

    row.querySelectorAll('select,input').forEach(function(el){

        if(el.name){

            el.name = el.name.replace(/\[\d+\]/, '[' + materialIndex + ']');

        }

        if(el.tagName === 'INPUT'){

            if(el.type === 'text'){

                el.value='';

            }

            if(el.type === 'number'){

                if(el.name.includes('yield_percent')){

                    el.value=100;

                }else{

                    el.value=1;

                }

            }

        }

        if(el.tagName==='SELECT'){

            el.selectedIndex=0;

        }

    });

    tbody.appendChild(row);

    materialIndex++;

});

document.addEventListener('click',function(e){

    if(e.target.classList.contains('btn-delete-material')){

        const rows=document.querySelectorAll('#materials-body tr');

        if(rows.length>1){

            e.target.closest('tr').remove();

        }

    }

});

</script>

@endpush