@props(['color' => 'blue', 'tag' => 'button'])

@php
    $colors = array("red", "blue", "green", "amber");

    if (! in_array($color, $colors)) {
        $color = "blue";
    }

    $colorClasses = [
        'red' => 'bg-red-600 hover:bg-red-700 focus:bg-red-700 active:bg-red-700',
        'blue' => 'bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-700',
        'green' => 'bg-green-600 hover:bg-green-700 focus:bg-green-700 active:bg-green-700',
        'amber' => 'bg-amber-600 hover:bg-amber-700 focus:bg-amber-700 active:bg-amber-700',
    ];

    $classes = "rounded-md cursor-pointer {$colorClasses[$color]} py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2 flex items-center gap-2";
@endphp

@if ($tag === 'a')
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@elseif ($tag === 'button')
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@elseif ($tag === 'input')
    <input {{ $attributes->merge(['class' => $classes]) }} value="{{ $slot }}" />
@endif