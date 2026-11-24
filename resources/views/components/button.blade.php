@props(['href' => null, 'variant' => 'primary', 'size' => 'md', 'type' => 'button'])

@php
    $base = 'group inline-flex items-center justify-center gap-2 rounded-full font-semibold transition duration-300 disabled:cursor-not-allowed';

    $sizes = [
        'sm' => 'px-4 py-2 text-xs',
        'md' => 'px-6 py-3 text-sm',
        'lg' => 'px-7 py-3.5 text-sm sm:text-base',
    ];

    $variants = [
        'primary' => 'bg-brand-600 text-white shadow-soft hover:-translate-y-0.5 hover:bg-brand-700',
        'light' => 'bg-white text-brand-700 shadow-soft hover:-translate-y-0.5 hover:bg-brand-50',
        'outline' => 'border border-brand-600/25 text-brand-700 hover:border-brand-600 hover:bg-brand-50',
        'ghost' => 'px-0 text-brand-700 hover:text-brand-900',
        'ghost-light' => 'border border-white/35 text-white hover:bg-white hover:text-brand-700',
        'dark' => 'bg-brand-950 text-white hover:-translate-y-0.5 hover:bg-brand-900',
    ];

    $classes = trim($base.' '.($sizes[$size] ?? $sizes['md']).' '.($variants[$variant] ?? $variants['primary']));
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
