<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Edit Item"
            subtitle="Update item information"
        />
    </x-slot>

    <x-card class="p-6">

        <form method="POST" action="{{ route('items.update', $item) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">

            <div>
                    <label class="block text-sm font-medium mb-2">
                        Item Code
                    </label>

                    <input
                        type="text"
                        value="{{ $item->item_code }}"
                        disabled
                        class="w-full rounded-lg border-slate-300 bg-slate-100">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Item Name
                    </label>

                    <input
                        type="text"
                        name="item_name"
                        value="{{ old('item_name', $item->item_name) }}"
                        class="w-full rounded-lg border-slate-300">
                        
                    @error('item_name')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Alias
                    </label>

                    <input
                        type="text"
                        name="alias"
                        value="{{ old('alias', $item->alias) }}"
                        class="w-full rounded-lg border-slate-300">
                    @error('alias')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror    
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Category
                    </label>

                    <input
                        type="text"
                        name="category"
                        value="{{ old('category', $item->category) }}"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Material Type
                    </label>

                    <input
                        type="text"
                        name="material_type"
                        value="{{ old('material_type', $item->material_type) }}"
                        class="w-full rounded-lg border-slate-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Item Type
                    </label>

                    <select
                        name="item_type"
                        class="w-full rounded-lg border-slate-300">
                        <option value="">Select Item Type</option>
                        <option value="Finished Good"
                            {{ old('item_type', $item->item_type) == 'Finished Good' ? 'selected' : '' }}>
                            Finished Good
                        </option>
                        <option value="Semi Finished"
                            {{ old('item_type', $item->item_type) == 'Semi Finished' ? 'selected' : '' }}>
                            Semi Finished
                        </option>
                        <option value="Raw Material"
                            {{ old('item_type', $item->item_type) == 'Raw Material' ? 'selected' : '' }}>
                            Raw Material
                        </option>
                        <option value="Component"
                            {{ old('item_type', $item->item_type) == 'Component' ? 'selected' : '' }}>
                            Component
                        </option>
                        <option value="Purchased Part"
                            {{ old('item_type', $item->item_type) == 'Purchased Part' ? 'selected' : '' }}>
                            Purchased Part
                        </option>
                        <option value="Consumable"
                            {{ old('item_type', $item->item_type) == 'Consumable' ? 'selected' : '' }}>
                            Consumable
                        </option>
                        <option value="Tool"
                            {{ old('item_type', $item->item_type) == 'Tool' ? 'selected' : '' }}>
                            Tool
                        </option>
                        <option value="Service"
                            {{ old('item_type', $item->item_type) == 'Service' ? 'selected' : '' }}>
                            Service
                        </option>
                        <option value="Customer Material"
                            {{ old('item_type', $item->item_type) == 'Customer Material' ? 'selected' : '' }}>
                            Customer Material
                        </option>
                    </select>

                    @error('item_type')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Unit
                    </label>

                    <select
                        name="unit"
                        class="w-full rounded-lg border-slate-300">

                        <option value="">-- Select Unit --</option>

                        <option value="PCS"
                            {{ old('unit', $item->unit) == 'PCS' ? 'selected' : '' }}>
                            PCS
                        </option>
                        
                        <option value="SET"
                            {{ old('unit', $item->unit) == 'SET' ? 'selected' : '' }}>
                            SET
                        </option>

                        <option value="EA"
                            {{ old('unit', $item->unit) == 'EA' ? 'selected' : '' }}>
                            EA
                        </option>

                        <option value="KG"
                            {{ old('unit', $item->unit) == 'KG' ? 'selected' : '' }}>
                            KG
                        </option>

                        <option value="GRAM"
                            {{ old('unit', $item->unit) == 'GRAM' ? 'selected' : '' }}>
                            GRAM
                        </option>

                        <option value="LITER"
                            {{ old('unit', $item->unit) == 'LITER' ? 'selected' : '' }}>
                            LITER
                        </option>

                        <option value="ML"
                            {{ old('unit', $item->unit) == 'ML' ? 'selected' : '' }}>
                            ML
                        </option>

                        <option value="METER"
                            {{ old('unit', $item->unit) == 'METER' ? 'selected' : '' }}>
                            METER
                        </option>

                        <option value="MM"
                            {{ old('unit', $item->unit) == 'MM' ? 'selected' : '' }}>
                            MM
                        </option>

                        <option value="CM"
                            {{ old('unit', $item->unit) == 'CM' ? 'selected' : '' }}>
                            CM
                        </option>

                        <option value="BATANG"
                            {{ old('unit', $item->unit) == 'BATANG' ? 'selected' : '' }}>
                            BATANG
                        </option>

                        <option value="ROLL"
                            {{ old('unit', $item->unit) == 'ROLL' ? 'selected' : '' }}>
                            ROLL
                        </option>

                        <option value="SHEET"
                            {{ old('unit', $item->unit) == 'SHEET' ? 'selected' : '' }}>
                            SHEET
                        </option>

                        <option value="BOX"
                            {{ old('unit', $item->unit) == 'BOX' ? 'selected' : '' }}>
                            BOX
                        </option>

                        <option value="PACK"
                            {{ old('unit', $item->unit) == 'PACK' ? 'selected' : '' }}>
                            PACK
                        </option>

                        <option value="LOT"
                            {{ old('unit', $item->unit) == 'LOT' ? 'selected' : '' }}>
                            LOT
                        </option>

                    </select>

                    @error('unit')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex gap-3">

                <x-primary-button type="submit">
                    Update Item
                </x-primary-button>

                <a
                    href="{{ route('items.index') }}"
                    class="px-4 py-2 rounded-lg border">

                    Cancel

                </a>

            </div>

        </form>

    </x-card>

</x-app-layout>