<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Add Customer"
            subtitle="Create new customer"
        />
    </x-slot>

    <x-card class="p-6">

        <form>

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Customer Code
                    </label>

                    <input
                        type="text"
                        value="Auto Generate"
                        disabled
                        class="w-full rounded-lg border-slate-300 bg-slate-100">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Customer Name
                    </label>

                    <input
                        type="text"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Contact Person
                    </label>

                    <input
                        type="text"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Phone
                    </label>

                    <input
                        type="text"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium mb-2">
                        Address
                    </label>

                    <textarea
                        rows="4"
                        class="w-full rounded-lg border-slate-300"></textarea>
                </div>

            </div>

            <div class="mt-8 flex gap-3">

                <x-primary-button>

                    Save Customer

                </x-primary-button>

                <a
                    href="{{ route('customers.index') }}"
                    class="px-4 py-2 rounded-lg border">

                    Cancel

                </a>

            </div>

        </form>

    </x-card>

</x-app-layout>