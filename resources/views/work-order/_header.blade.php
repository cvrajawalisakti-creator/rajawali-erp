<div class="bg-white shadow rounded-xl p-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- WO Number --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Work Order Number
            </label>

            <input
                type="text"
                value="{{ $woNumber }}"
                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100"
                readonly
            >
        </div>

        {{-- WO Date --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Work Order Date <span class="text-red-500">*</span>
            </label>

            <input
                type="date"
                name="wo_date"
                value="{{ old('wo_date', now()->toDateString()) }}"
                class="mt-1 block w-full rounded-md border-gray-300"
            >

            @error('wo_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Finished Good --}}
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700">
                Finished Good <span class="text-red-500">*</span>
            </label>

            <select
                name="finished_good_item_id"
                class="mt-1 block w-full rounded-md border-gray-300"
            >
                <option value="">-- Select Finished Good --</option>

                @foreach($finishedGoods as $item)
                    <option
                        value="{{ $item->id }}"
                        @selected(old('finished_good_item_id') == $item->id)
                    >
                        {{ $item->item_code }} - {{ $item->item_name }}
                    </option>
                @endforeach
            </select>

            @error('finished_good_item_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Planned Qty --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Planned Quantity <span class="text-red-500">*</span>
            </label>

            <input
                type="number"
                name="planned_qty"
                step="0.0001"
                value="{{ old('planned_qty') }}"
                class="mt-1 block w-full rounded-md border-gray-300"
            >

            @error('planned_qty')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Planned Start --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Planned Start
            </label>

            <input
                type="date"
                name="planned_start"
                value="{{ old('planned_start') }}"
                class="mt-1 block w-full rounded-md border-gray-300"
            >

            @error('planned_start')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Planned Finish --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Planned Finish
            </label>

            <input
                type="date"
                name="planned_finish"
                value="{{ old('planned_finish') }}"
                class="mt-1 block w-full rounded-md border-gray-300"
            >

            @error('planned_finish')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Remarks --}}
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700">
                Remarks
            </label>

            <textarea
                name="remarks"
                rows="3"
                class="mt-1 block w-full rounded-md border-gray-300"
            >{{ old('remarks') }}</textarea>

            @error('remarks')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

    </div>

</div>