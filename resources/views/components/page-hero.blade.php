@props([
    'title',
    'subtitle' => null,
    'current' => null,
    'eyebrow' => null,
    'image' => 'images/about/factory.jpg',
])

<section class="relative isolate overflow-hidden bg-brand-950">
    <img
        src="{{ asset($image) }}"
        alt=""
        class="absolute inset-0 h-full w-full object-cover opacity-25"
        loading="eager"
        decoding="async"
    >
    <div class="absolute inset-0 bg-gradient-to-r from-brand-950 via-brand-950/92 to-brand-950/55"></div>
    <div class="absolute inset-0 pattern-grid opacity-25"></div>
    <div class="absolute -top-24 -right-16 h-72 w-72 rounded-full bg-brand-500/20 blur-3xl"></div>

    <span class="pointer-events-none absolute -right-4 -bottom-10 font-display text-[9rem] leading-none font-bold text-white/[0.035] select-none sm:text-[14rem]">
        HAL
    </span>

    <div class="shell relative pt-28 pb-14 sm:pt-32 sm:pb-16 lg:pt-36 lg:pb-20">
        <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-[0.7rem] font-medium tracking-[0.16em] uppercase">
            <a href="{{ route('home') }}" class="text-white/55 transition hover:text-white">Home</a>
            <x-icon name="chevron-right" class="h-3 w-3 text-white/30" />
            <span class="text-brand-200">{{ $current ?? $title }}</span>
        </nav>

        @if ($eyebrow)
            <span class="eyebrow eyebrow-light mt-7 flex">{{ $eyebrow }}</span>
        @endif

        <h1 class="mt-5 max-w-4xl font-display text-4xl leading-[1.05] font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
            {{ $title }}
        </h1>

        @if ($subtitle)
            <p class="mt-6 max-w-2xl text-base leading-relaxed text-white/65 sm:text-lg">
                {{ $subtitle }}
            </p>
        @endif
    </div>
</section>
