<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Add Customer"
            subtitle="Create new customer"
        />
    </x-slot>

    <x-card class="p-6">

        <form method="POST" action="{{ route('customers.store') }}">
            @csrf

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
                        name="customer_name"
                        value="{{ old('customer_name') }}"
                        class="w-full rounded-lg border-slate-300">
                        
                    @error('customer_name')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Contact Person
                    </label>

                    <input
                        type="text"
                        name="contact_person"
                        value="{{ old('contact_person') }}"
                        class="w-full rounded-lg border-slate-300">
                    @error('contact_person')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror    
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div class="col-span-2">
                <label class="block text-sm font-medium mb-2">
                        NPWP
                    </label>

                    <input
                        type="text"
                        name="npwp"
                        value="{{ old('npwp') }}"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium mb-2">
                        Address
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        class="w-full rounded-lg border-slate-300">{{ old('address') }}</textarea>
                </div>

            </div>

            <div class="mt-8 flex gap-3">

                <x-primary-button type="submit">
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