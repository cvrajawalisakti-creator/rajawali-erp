<x-app-layout>

    <x-slot name="header">

        <x-page-header
            title="New BOM Revision"
            subtitle="Create new revision"
        />

    </x-slot>

    <x-card class="p-6">

        <h2 class="text-xl font-semibold mb-6">

            {{ $bomHeader->bom_code }}

        </h2>

        <p class="mb-3">

            Current Revision :
            <strong>{{ $bomHeader->revision }}</strong>

        </p>

        <form
            method="POST"
            action="{{ route('boms.revision.store', $bomHeader->id) }}">

            @csrf

            <button
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg">

                Create Revision

            </button>

        </form>

    </x-card>

</x-app-layout>