<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Create Bill of Materials"
            subtitle="Create product BOM"
        />
    </x-slot>

    <form method="POST" action="{{ route('boms.store') }}">
        @csrf

        @include('bom._header')

        <div class="mt-6">
            @include('bom._materials')
        </div>

        <div class="mt-6">
            @include('bom._processes')
        </div>

        <div class="mt-8 flex gap-3">

            <x-primary-button>
                Save BOM
            </x-primary-button>

            <a
                href="{{ route('boms.index') }}"
                class="px-4 py-2 rounded-lg border">

                Cancel

            </a>

        </div>

    </form>

</x-app-layout>