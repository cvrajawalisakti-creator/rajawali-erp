<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Supplier Master"
            subtitle="Manage supplier master data"
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
                Supplier List
            </h2>

            <a
                href="{{ route('suppliers.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

                + Add Supplier

            </a>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Supplier Code
                        </th>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Supplier Name
                        </th>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Contact Person
                        </th>

                        <th class="px-4 py-3 text-left font-semibold text-slate-700">
                            Phone
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

                    @forelse($suppliers as $supplier)

                        <tr class="border-b hover:bg-slate-50">

                            <td class="px-4 py-3">
                                {{ $supplier->supplier_code }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $supplier->supplier_name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $supplier->contact_person }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $supplier->phone }}
                            </td>

                            <td class="px-4 py-3 text-center">

                                @if($supplier->is_active)

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
                                    href="{{ route('suppliers.edit', $supplier) }}"
                                    class="text-blue-600 hover:underline mr-3">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('suppliers.destroy', $supplier) }}"
                                    method="POST"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('Delete this supplier?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="px-4 py-12 text-center text-slate-400">

                                No supplier data.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </x-card>

</x-app-layout>