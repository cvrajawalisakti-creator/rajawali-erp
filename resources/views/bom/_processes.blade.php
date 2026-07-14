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

                <tr>

                    <td class="p-2">

                        <select
                            name="processes[0][process_id]"
                            class="w-full rounded-lg border-slate-300">

                            <option value="">
                                -- Select Process --
                            </option>

                            @foreach($processes as $process)

                                <option value="{{ $process->id }}">

                                    {{ $process->process_code }}
                                    |
                                    {{ $process->process_name }}

                                </option>

                            @endforeach

                        </select>

                    </td>

                    <td class="p-2">

                        <input
                            type="number"
                            name="processes[0][parameter_value]"
                            step="0.0001"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="p-2">

                        <input
                            type="text"
                            name="processes[0][parameter_unit]"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="p-2">

                        <input
                            type="text"
                            name="processes[0][remarks]"
                            class="w-full rounded-lg border-slate-300">

                    </td>

                    <td class="text-center">

                        <button
                            type="button"
                            class="btn-delete-process text-red-600 font-bold">

                            🗑

                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</x-card>