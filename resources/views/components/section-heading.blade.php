@props([
    'eyebrow' => null,
    'title' => null,
    'description' => null,
    'align' => 'left',
    'theme' => 'light',
    'titleClass' => '',
])

@php
    $isCentered = $align === 'center';
    $isDark = $theme === 'dark';

    $wrapper = $isCentered ? 'items-center text-center' : 'items-start text-left';
    $descriptionClass = $isCentered ? 'mx-auto' : '';
    $titleColor = $isDark ? 'text-white' : 'text-brand-950';
    $descriptionColor = $isDark ? 'text-white/70' : 'text-ink/65';
    $eyebrowClass = $isDark ? 'eyebrow-light' : '';
@endphp

<div class="flex flex-col {{ $wrapper }}">
    @if ($eyebrow)
        <span class="eyebrow {{ $eyebrowClass }}">{{ $eyebrow }}</span>
    @endif

    @if ($title)
        <h2 class="mt-4 max-w-3xl font-display text-3xl leading-[1.1] font-semibold tracking-tight {{ $titleColor }} sm:text-4xl lg:text-[2.75rem] {{ $titleClass }}">
            {{ $title }}
        </h2>
    @endif

    @if ($description)
        <p class="mt-5 max-w-2xl text-base leading-relaxed {{ $descriptionColor }} {{ $descriptionClass }}">
            {{ $description }}
        </p>
    @endif

    {{ $slot }}
</div>
