<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Master Process"
            subtitle="Manage production process master data"
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
                Process List
            </h2>

            <a
                href="{{ route('master-processes.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

                + Add Process

            </a>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-50">

                    <tr>
                        <th class="px-4 py-3 text-left">Code</th>
                        <th class="px-4 py-3 text-left">Process Name</th>
                        <th class="px-4 py-3 text-left">Default Unit</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($processes as $process)

                        <tr class="border-b hover:bg-slate-50">

                            <td class="px-4 py-3">
                                {{ $process->process_code }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $process->process_name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $process->default_unit ?: '-' }}
                            </td>

                            <td class="px-4 py-3 text-center">

                                @if($process->is_active)

                                    <span class="rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="rounded-full bg-red-100 px-2 py-1 text-xs font-semibold text-red-700">
                                        Inactive
                                    </span>

                                @endif

                            </td>
                            
                            <td class="px-4 py-3 text-center">

                                <a
                                    href="{{ route('master-processes.edit', $process) }}"
                                    class="text-blue-600 hover:underline mr-3">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('master-processes.destroy', $process) }}"
                                    method="POST"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('Delete this process?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="px-4 py-12 text-center text-slate-400">

                                No process data.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </x-card>

</x-app-layout>