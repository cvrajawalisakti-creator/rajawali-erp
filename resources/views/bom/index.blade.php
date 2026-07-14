<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Bill of Materials"
            subtitle="Engineering Bill of Materials"
        />
    </x-slot>

    <div class="p-6">

        @if(session('success'))

            <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">

                {{ session('success') }}

            </div>

        @endif

        <div class="flex items-center justify-between mb-6">

            <h2 class="text-xl font-semibold">

                BOM List

            </h2>

            <a
                href="{{ route('boms.create') }}"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

                + New BOM

            </a>

        </div>

        <div class="bg-white rounded-xl shadow overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="px-4 py-3 text-left">
                            BOM Code
                        </th>

                        <th class="px-4 py-3 text-left">
                            Finished Good
                        </th>

                        <th class="px-4 py-3 text-center">
                            Revision
                        </th>

                        <th class="px-4 py-3 text-center">
                            Effective Date
                        </th>

                        <th class="px-4 py-3 text-center">
                            Status
                        </th>

                        <th class="px-4 py-3 text-center">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($boms as $bom)

                    <tr class="border-t hover:bg-slate-50">

                        <td class="px-4 py-3 font-medium">

                            {{ $bom->bom_code }}

                        </td>

                        <td class="px-4 py-3">

                            {{ $bom->finishedGood?->item_code }}

                            -

                            {{ $bom->finishedGood?->item_name }}

                        </td>

                        <td class="px-4 py-3 text-center">

                            {{ $bom->revision }}

                        </td>

                        <td class="px-4 py-3 text-center">

                            {{ optional($bom->effective_date)->format('d/m/Y') }}

                        </td>

                        <td class="px-4 py-3 text-center">

                            @if($bom->is_active)

                                <span class="px-2 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">

                                    Active

                                </span>

                            @else

                                <span class="px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">

                                    Inactive

                                </span>

                            @endif

                        </td>

                        <td class="px-4 py-3">

                            <div class="flex justify-center gap-3">

                                <a
                                    href="{{ route('boms.show', $bom) }}"
                                    class="text-blue-600 hover:underline">

                                    View

                                </a>

                                <a
                                    href="{{ route('boms.edit', $bom) }}"
                                    class="text-amber-600 hover:underline">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('boms.destroy', $bom) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this BOM ?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-red-600 hover:underline">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="text-center py-10 text-slate-500">

                            No BOM Available

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>