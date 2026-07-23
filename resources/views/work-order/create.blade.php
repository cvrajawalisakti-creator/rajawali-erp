<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Create Work Order"
            subtitle="Create new production work order"
        />
    </x-slot>

    <form method="POST" action="{{ route('work-orders.store') }}">
        @csrf

        @include('work-order._header')

        <div class="mt-8 flex gap-3">

            <x-primary-button>
                Save Work Order
            </x-primary-button>

            <a
                href="{{ route('work-orders.index') }}"
                class="px-4 py-2 rounded-lg border">

                Cancel

            </a>

        </div>

    </form>

</x-app-layout>