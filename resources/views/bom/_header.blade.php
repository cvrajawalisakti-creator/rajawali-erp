

<x-card class="p-6">

    <h2 class="text-lg font-semibold mb-6">
        BOM Header
    </h2>

    <div class="grid grid-cols-2 gap-6">

        <div>
            <label class="block text-sm font-medium mb-2">
                Finished Good
            </label>

            <select
                name="finished_good_item_id"
                class="w-full rounded-lg border-slate-300">

                <option value="">-- Select Item --</option>

                @foreach($finishedGoods as $item)

                    <option
                        value="{{ $item->id }}"
                        {{ old('finished_good_item_id') == $item->id ? 'selected' : '' }}>

                        {{ $item->item_code }} - {{ $item->item_name }}

                    </option>

                @endforeach

            </select>

            @error('finished_good_item_id')
                <p class="text-red-600 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <div>
            <label class="block text-sm font-medium mb-2">
                BOM Code
            </label>

            <input
                type="text"
                value="Auto Generate"
                disabled
                class="w-full rounded-lg border-slate-300 bg-slate-100">
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">
                Revision
            </label>

            <input
                type="text"
                name="revision"
                value="{{ old('revision', 'R00') }}"
                class="w-full rounded-lg border-slate-300">
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">
                Effective Date
            </label>

            <input
                type="date"
                name="effective_date"
                value="{{ old('effective_date', date('Y-m-d')) }}"
                class="w-full rounded-lg border-slate-300">
        </div>

        <div class="col-span-2">

            <label class="block text-sm font-medium mb-2">
                Description
            </label>

            <textarea
                name="description"
                rows="3"
                class="w-full rounded-lg border-slate-300 px-3 py-2">{{ old('description') }}</textarea>

        </div>

    </div>

</x-card>