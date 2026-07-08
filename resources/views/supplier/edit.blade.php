<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Edit Supplier"
            subtitle="Update supplier information"
        />
    </x-slot>

    <x-card class="p-6">

        <form method="POST" action="{{ route('suppliers.update', $supplier) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Supplier Code
                    </label>

                    <input
                        type="text"
                        value="{{ $supplier->supplier_code }}"
                        disabled
                        class="w-full rounded-lg border-slate-300 bg-slate-100">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Supplier Name
                    </label>

                    <input
                        type="text"
                        name="supplier_name"
                        value="{{ old('supplier_name', $supplier->supplier_name) }}"
                        class="w-full rounded-lg border-slate-300">
                        
                    @error('supplier_name')
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
                        value="{{ old('contact_person', $supplier->contact_person) }}"
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
                        value="{{ old('phone', $supplier->phone) }}"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $supplier->email) }}"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div class="col-span-2">
                <label class="block text-sm font-medium mb-2">
                        NPWP
                    </label>

                    <input
                        type="text"
                        name="npwp"
                        value="{{ old('npwp', $supplier->npwp) }}"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div>
                <label class="block text-sm font-medium mb-2">
                        Bank Name
                    </label>

                    <input
                        type="text"
                        name="bank_name"
                        value="{{ old('bank_name', $supplier->bank_name) }}"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div>
                <label class="block text-sm font-medium mb-2">
                        Account Number
                    </label>

                    <input
                        type="text"
                        name="account_number"
                        value="{{ old('account_number', $supplier->account_number) }}"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div>
                <label class="block text-sm font-medium mb-2">
                        Account Holder
                    </label>

                    <input
                        type="text"
                        name="account_holder"
                        value="{{ old('account_holder', $supplier->account_holder) }}"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Payment Term
                    </label>

                    <select
                        name="payment_term"
                        class="w-full rounded-lg border-slate-300">

                        <option value="Cash" {{ old('payment_term', $supplier->payment_term) == 'Cash' ? 'selected' : '' }}>
                            Cash
                        </option>

                        <option value="7 Days" {{ old('payment_term', $supplier->payment_term) == '7 Days' ? 'selected' : '' }}>
                            7 Days
                        </option>

                        <option value="14 Days" {{ old('payment_term', $supplier->payment_term) == '14 Days' ? 'selected' : '' }}>
                            14 Days
                        </option>

                        <option value="30 Days" {{ old('payment_term', $supplier->payment_term) == '30 Days' ? 'selected' : '' }}>
                            30 Days
                        </option>

                    </select>
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium mb-2">
                        Address
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        class="w-full rounded-lg border-slate-300">{{ old('address', $supplier->address) }}</textarea>
                </div>

            </div>

            <div class="mt-8 flex gap-3">

                <x-primary-button type="submit">
                    Update Supplier
                </x-primary-button>

                <a
                    href="{{ route('suppliers.index') }}"
                    class="px-4 py-2 rounded-lg border">

                    Cancel

                </a>

            </div>

        </form>

    </x-card>

</x-app-layout>