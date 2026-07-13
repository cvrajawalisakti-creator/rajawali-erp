<x-card class="p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-lg font-semibold">
            Material & Consumable
        </h2>

        <button
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

            <tbody>

                <tr>

                    <td class="p-2">

                        <select
                            name="materials[0][component_item_id]"
                            class="w-full rounded-lg border-slate-300">

                            <option value="">
                            -- Select Item --
                            </option>

                            @foreach($components as $item)

                                <option value="{{ $item->id }}">

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
                            name="materials[0][usage_type]"
                            class="w-full rounded-lg border-slate-300">

                            <option value="Material" selected>
                                Material
                            </option>

                            <option value="Consumable">
                                Consumable
                            </option>

                        </select>

                    </td>

                    <td class="p-2">

                        <input
                            type="number"
                            name="materials[0][qty]"
                            step="0.0001"
                            value="1"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="p-2">

                        <input
                            type="number"
                            name="materials[0][yield_percent]"
                            step="0.01"
                            value="100"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="p-2">

                        <input
                            type="text"
                            name="materials[0][remarks]"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="text-center">

                        <button
                            type="button"
                            class="text-red-600">

                            🗑

                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</x-card>