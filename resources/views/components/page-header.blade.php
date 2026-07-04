@props([
'title',
'subtitle'=>null
])

<div class="mb-6">

    <h1 class="text-2xl font-bold text-slate-800">
        {{ $title }}
    </h1>

    @if($subtitle)

        <p class="text-slate-500 mt-1">
            {{ $subtitle }}
        </p>

    @endif

</div>