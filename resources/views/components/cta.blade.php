@props([
    'title' => 'Work together, win together.',
    'description' => 'Tell us about your next collection and we will get back to you with ideas, timelines and a clear path to production.',
    'primaryLabel' => 'Start a project',
    'primaryHref' => null,
    'secondaryLabel' => 'Browse products',
    'secondaryHref' => null,
])

<section class="relative overflow-hidden cta-surface">
    <div class="absolute inset-0 pattern-grid opacity-30"></div>
    <div class="absolute -top-28 -right-20 h-80 w-80 rounded-full border border-white/10"></div>
    <div class="absolute -bottom-40 left-1/3 h-96 w-96 rounded-full bg-brand-400/20 blur-3xl"></div>
    <div class="absolute top-10 right-1/4 h-2 w-2 animate-pulse-ring rounded-full bg-brand-300"></div>

    <div class="shell relative flex flex-col items-start gap-8 py-10 sm:py-12 lg:flex-row lg:items-center lg:justify-between lg:gap-12 lg:py-14">
        <div class="max-w-2xl">
            <span class="eyebrow eyebrow-light reveal reveal-up">Let us work together</span>
            <h2 class="reveal reveal-up mt-4 font-display text-3xl leading-[1.08] font-semibold text-white sm:text-4xl lg:text-5xl" style="--reveal-delay: 80ms">
                {{ $title }}
            </h2>
            <p class="reveal reveal-up mt-5 max-w-xl text-base leading-relaxed text-white/70" style="--reveal-delay: 160ms">
                {{ $description }}
            </p>
        </div>

        <div class="reveal reveal-right flex flex-wrap gap-3" style="--reveal-delay: 220ms">
            <x-button :href="$primaryHref ?? route('contact')" variant="light" size="lg">
                {{ $primaryLabel }}
                <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
            </x-button>
            <x-button :href="$secondaryHref ?? route('products')" variant="ghost-light" size="lg">
                {{ $secondaryLabel }}
            </x-button>
        </div>
    </div>
</section>
