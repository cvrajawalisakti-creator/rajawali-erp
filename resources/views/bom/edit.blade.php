<x-app-layout>

    <x-slot name="header">

        <x-page-header
            title="Edit Bill of Materials"
            subtitle="Update product BOM"
        />

    </x-slot>

    <form
        method="POST"
        action="{{ route('boms.update', $bomHeader) }}">

        @csrf
        @method('PUT')

        @include('bom._header')

        <div class="mt-6">

            @include('bom._materials')

        </div>

        <div class="mt-6">

            @include('bom._processes')

        </div>

        <div class="mt-8 flex gap-3">

            <x-primary-button>

                Update BOM

            </x-primary-button>

            <a
                href="{{ route('boms.index') }}"
                class="px-4 py-2 rounded-lg border">

                Cancel

            </a>

        </div>

    </form>

    @include('bom._scripts')
  
</x-app-layout>