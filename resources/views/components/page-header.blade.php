@props([
    'title',
    'subtitle' => null,
])

<div class="mb-6 flex items-start justify-between">

    <div>

        <h1 class="text-2xl font-bold text-slate-800">
            {{ $title }}
        </h1>

        @if($subtitle)

            <p class="mt-1 text-slate-500">
                {{ $subtitle }}
            </p>

        @endif

    </div>

    @if(isset($actions))

        <div class="shrink-0">

            {{ $actions }}

        </div>

    @endif

</div>