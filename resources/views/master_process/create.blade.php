<x-app-layout>

    <x-slot name="header">
        <x-page-header
            title="Add Master Process"
            subtitle="Create new production process"
        />
    </x-slot>

    <x-card class="p-6">

        <form method="POST" action="{{ route('master-processes.store') }}">
            @csrf

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Process Code
                    </label>

                    <input
                        type="text"
                        value="Auto Generate"
                        disabled
                        class="w-full rounded-lg border-slate-300 bg-slate-100">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Process Name
                    </label>

                    <input
                        type="text"
                        name="process_name"
                        autofocus
                        value="{{ old('process_name') }}"
                        class="w-full rounded-lg border-slate-300">

                    @error('process_name')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Default Unit
                    </label>

                    <select
                        name="default_unit"
                        class="w-full rounded-lg border-slate-300">

                        <option value="">-- Select Unit --</option>

                        <option value="PCS"
                            {{ old('default_unit') == 'PCS' ? 'selected' : '' }}>
                            PCS
                        </option>
                        <option value="MM"
                            {{ old('default_unit') == 'MM' ? 'selected' : '' }}>
                            MM
                        </option>
                        <option value="CM"
                            {{ old('default_unit') == 'CM' ? 'selected' : '' }}>
                            CM
                        </option>
                        <option value="M"
                            {{ old('default_unit') == 'M' ? 'selected' : '' }}>
                            M
                        </option>
                        <option value="KG"
                            {{ old('default_unit') == 'KG' ? 'selected' : '' }}>
                            KG
                        </option>
                        <option value="GRAM"
                            {{ old('default_unit') == 'GRAM' ? 'selected' : '' }}>
                            GRAM
                        </option>
                        <option value="LITER"
                            {{ old('default_unit') == 'LITER' ? 'selected' : '' }}>
                            LITER
                        </option>
                        <option value="ML"
                            {{ old('default_unit') == 'ML' ? 'selected' : '' }}>
                            ML
                        </option>
                        <option value="HOLE"
                            {{ old('default_unit') == 'HOLE' ? 'selected' : '' }}>
                            HOLE
                        </option>
                        <option value="POINT"
                            {{ old('default_unit') == 'POINT' ? 'selected' : '' }}>
                            POINT
                        </option>
                        <option value="SIDE"
                            {{ old('default_unit') == 'SIDE' ? 'selected' : '' }}>
                            SIDE
                        </option>
                        <option value="MINUTE"
                            {{ old('default_unit') == 'MINUTE' ? 'selected' : '' }}>
                            MINUTE
                        </option>
                        <option value="HOUR"
                            {{ old('default_unit') == 'HOUR' ? 'selected' : '' }}>
                            HOUR
                        </option>

                    </select>

                    @error('default_unit')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="col-span-2">

                    <label class="block text-sm font-medium mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        placeholder="Example: CO2 welding using ER70S-6 wire..."
                        class="w-full rounded-lg border-slate-300 px-3 py-2">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

            <div class="mt-8 flex gap-3">

                <x-primary-button type="submit">
                    Save Process
                </x-primary-button>

                <a
                    href="{{ route('master-processes.index') }}"
                    class="px-4 py-2 rounded-lg border">

                    Cancel

                </a>

            </div>

        </form>

    </x-card>

</x-app-layout>