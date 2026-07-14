<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Item Master"
            subtitle="Manage item master data"
        />
    </x-slot>

    @if(session('success'))

        <div class="mb-6 rounded-lg border border-green-300 bg-green-100 p-4 text-green-700">

            ✅ {{ session('success') }}

        </div>

    @endif

    <x-card class="p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-lg font-semibold">
                Item List
            </h2>

            <a
                href="{{ route('items.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

                + Add Item

            </a>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Code
                        </th>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Item Name
                        </th>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Item Type
                        </th>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Category
                        </th>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Unit
                        </th>

                        <th class="px-4 py-3 text-center font-semibold text-slate-700">
                            Status
                        </th>

                        <th class="px-4 py-3 text-center font-semibold text-slate-700">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($finishedGoods as $item)

                        <tr class="border-b hover:bg-slate-50">

                            <td class="px-4 py-3">
                                {{ $item->item_code }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item->item_name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item->item_type }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item->category }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item->unit }}
                            </td>

                            <td class="px-4 py-3 text-center">

                                @if($item->is_active)

                                    <span class="text-green-600 font-medium">
                                        Active
                                    </span>

                                @else

                                    <span class="text-red-600 font-medium">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td class="px-4 py-3 text-center">

                                <a
                                    href="{{ route('items.edit', $item) }}"
                                    class="text-blue-600 hover:underline mr-3">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('items.destroy', $item) }}"
                                    method="POST"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('Delete this item?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="px-4 py-12 text-center text-slate-400">

                                No item data.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </x-card>

</x-app-layout>