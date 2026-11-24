@extends('layouts.app')

@section('title', 'Hibat Apparels Ltd. | Apparel Manufacturing & Export from Bangladesh')
@section('meta_description', 'Hibat Apparels Ltd. manufactures functional outerwear, workwear, uniforms, jackets, denim, twill, knitwear, socks, backpacks and accessories for global brands from Dhaka and Gazipur, Bangladesh.')

@section('content')
    @php
        $slides = config('site.hero_slides');
        $products = config('site.products');
        $process = config('site.process');
        $whyUs = config('site.why_us');
        $features = array_slice($whyUs, 0, 4);
        $locations = config('site.locations');
        $certifications = config('site.certifications');
    @endphp

    <section data-hero-slider class="hero-slider relative isolate min-h-[88vh] overflow-hidden bg-brand-950 sm:min-h-[92vh]">
        @foreach ($slides as $slide)
            <div
                data-slide
                @class(['hero-slide absolute inset-0', 'is-active' => $loop->first])
                aria-hidden="{{ $loop->first ? 'false' : 'true' }}"
                @if (! $loop->first) inert @endif
            >
                <div class="hero-bg absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset($slide['image']) }}')"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-brand-950/95 via-brand-950/85 to-brand-950/35"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-brand-950/85 via-transparent to-brand-950/30"></div>

                <div class="shell relative flex min-h-[88vh] flex-col justify-center pt-24 pb-36 sm:min-h-[92vh] sm:pb-32">
                    <div class="max-w-4xl">
                        <span class="hero-anim eyebrow eyebrow-light" style="--d: 0ms">{{ $slide['eyebrow'] }}</span>

                        <h1 class="hero-anim mt-6 font-display text-[2.35rem] leading-[0.97] font-bold tracking-tight text-white uppercase text-shadow-hero sm:text-6xl lg:text-7xl xl:text-[5.1rem]" style="--d: 120ms">
                            @foreach ($slide['title_lines'] as $line)
                                <span class="{{ $line['class'] }}">{{ $line['text'] }}</span>
                            @endforeach
                        </h1>

                        <p class="hero-anim mt-7 max-w-xl text-sm leading-relaxed text-white/70 sm:text-base lg:text-lg" style="--d: 240ms">
                            {{ $slide['description'] }}
                        </p>

                        <div class="hero-anim mt-9 flex flex-wrap items-center gap-3" style="--d: 360ms">
                            <x-button :href="route('products')" variant="light" size="lg">
                                Explore our products
                                <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
                            </x-button>
                            <x-button :href="route('contact')" variant="ghost-light" size="lg">
                                Get a quote
                            </x-button>
                        </div>

                        <div class="hero-anim mt-10 flex flex-wrap items-center gap-x-7 gap-y-3" style="--d: 480ms">
                            @foreach (['Owned factory', 'Verified compliance', 'Global delivery'] as $point)
                                <span class="inline-flex items-center gap-2 text-[0.68rem] font-semibold tracking-[0.16em] text-white/60 uppercase">
                                    <span class="grid h-5 w-5 place-items-center rounded-full bg-brand-500/25 text-brand-200">
                                        <x-icon name="check" class="h-3 w-3" />
                                    </span>
                                    {{ $point }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="absolute inset-x-0 bottom-0 z-20">
            <div class="shell flex items-end justify-between gap-4 pb-8 sm:pb-10">
                <div class="flex items-center gap-2">
                    @foreach ($slides as $slide)
                        <button
                            type="button"
                            data-dot
                            data-index="{{ $loop->index }}"
                            @class(['hero-dot', 'is-active' => $loop->first])
                            aria-label="Go to slide {{ $loop->iteration }}"
                            aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                        ></button>
                    @endforeach
                </div>

                <div class="flex items-center gap-2">
                    <button
                        type="button"
                        data-hero-prev
                        aria-label="Previous slide"
                        class="grid h-10 w-10 place-items-center rounded-full border border-white/25 text-white transition hover:border-white hover:bg-white hover:text-brand-700 sm:h-11 sm:w-11"
                    >
                        <x-icon name="arrow-left" class="h-4 w-4" />
                    </button>
                    <button
                        type="button"
                        data-hero-next
                        aria-label="Next slide"
                        class="grid h-10 w-10 place-items-center rounded-full border border-white/25 text-white transition hover:border-white hover:bg-white hover:text-brand-700 sm:h-11 sm:w-11"
                    >
                        <x-icon name="arrow-right" class="h-4 w-4" />
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="border-b border-brand-900/5 bg-white">
        <div class="shell">
            <div class="grid divide-y divide-black/5 sm:grid-cols-2 sm:divide-y-0 lg:grid-cols-4 lg:divide-x lg:divide-black/5">
                @foreach ($features as $feature)
                    <div class="reveal reveal-up flex items-start gap-4 px-1 py-7 sm:px-6" style="--reveal-delay: {{ $loop->index * 80 }}ms">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-2xl bg-brand-50 text-brand-600">
                            <x-icon :name="$feature['icon']" class="h-5 w-5" />
                        </span>
                        <div>
                            <h2 class="font-display text-sm font-semibold text-brand-950">{{ $feature['title'] }}</h2>
                            <p class="mt-1.5 text-xs leading-relaxed text-ink/55">{{ $feature['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-brand-950">
        <div class="absolute inset-0 pattern-grid opacity-25"></div>
        <div class="absolute -top-32 left-1/4 h-72 w-72 rounded-full bg-brand-500/20 blur-3xl"></div>

        <div class="shell relative grid grid-cols-2 gap-y-10 py-14 sm:py-16 lg:grid-cols-4 lg:py-20">
            @foreach (config('site.stats') as $stat)
                <div class="reveal reveal-up border-brand-100/10 px-2 text-center lg:border-l lg:first:border-l-0" style="--reveal-delay: {{ $loop->index * 90 }}ms">
                    <p
                        class="counter font-display text-4xl font-bold text-white sm:text-5xl"
                        data-counter="{{ $stat['value'] }}"
                        data-suffix="{{ $stat['suffix'] }}"
                    >{{ $stat['value'] }}{{ $stat['suffix'] }}</p>
                    <p class="mt-2 text-[0.62rem] font-semibold tracking-[0.2em] text-brand-200/60 uppercase sm:text-[0.7rem]">
                        {{ $stat['label'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="section relative overflow-hidden">
        <div class="absolute inset-y-0 right-0 w-1/2 pattern-dots opacity-50"></div>

        <div class="shell relative grid items-center gap-14 lg:grid-cols-2 lg:gap-20">
            <div class="reveal reveal-left relative">
                <div class="overflow-hidden rounded-[2rem] shadow-card">
                    <img
                        src="{{ asset('images/about/factory.jpg') }}"
                        alt="Hibat Apparels production floor in Gazipur"
                        loading="lazy"
                        class="aspect-[4/3] w-full object-cover"
                    >
                </div>

                <div class="absolute -right-3 -bottom-8 hidden w-44 overflow-hidden rounded-3xl border-4 border-cream shadow-card sm:block lg:w-52">
                    <img
                        src="{{ asset('images/about/team.jpg') }}"
                        alt="Hibat Apparels team"
                        loading="lazy"
                        class="aspect-square w-full object-cover"
                    >
                </div>

                <div class="absolute -top-6 -left-3 rounded-2xl bg-brand-600 px-5 py-4 text-white shadow-soft sm:-left-6">
                    <p class="font-display text-3xl leading-none font-bold">10+</p>
                    <p class="mt-1 text-[0.6rem] font-semibold tracking-[0.16em] text-brand-100 uppercase">Product categories</p>
                </div>
            </div>

            <div class="reveal reveal-right">
                <x-section-heading
                    eyebrow="Who we are"
                    title="An owner-managed apparel partner built on trust."
                    description="From our corporate office in Uttara to our owned factory in Gazipur, Hibat Apparels Ltd. brings design, development and production together under one roof. We work with global brands that value consistency, compliance and clear communication."
                />

                <ul class="mt-7 space-y-4">
                    @foreach ([
                        'In-house manufacturing with direct quality control',
                        'A compliance-first supply chain and audited partners',
                        'End-to-end service from sampling to shipment',
                    ] as $point)
                        <li class="flex items-start gap-3 text-sm text-ink/70">
                            <span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700">
                                <x-icon name="check" class="h-3 w-3" />
                            </span>
                            {{ $point }}
                        </li>
                    @endforeach
                </ul>

                <div class="mt-9 flex flex-wrap gap-3">
                    <x-button :href="route('about')" size="md">
                        More about us
                        <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
                    </x-button>
                    <x-button :href="route('locations')" variant="outline" size="md">
                        Our locations
                    </x-button>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="shell">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <x-section-heading
                    eyebrow="Product portfolio"
                    title="Ten categories. One reliable partner."
                    description="Our broad product portfolio leaves hardly any wish unfulfilled. From functional clothing to workwear and lifestyle essentials, we develop, manufacture and deliver with one consistent quality standard."
                />

                <x-button :href="route('products')" variant="outline" size="md" class="reveal reveal-right shrink-0">
                    View full portfolio
                    <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
                </x-button>
            </div>

            <div class="mt-12 grid gap-4 sm:gap-5 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($products as $index => $product)
                    <div class="reveal reveal-up" style="--reveal-delay: {{ ($index % 3) * 90 }}ms">
                        <x-product-card :product="$product" :index="$index" />
                    </div>
                @endforeach

                <div class="reveal reveal-up" style="--reveal-delay: 0ms">
                    <a
                        href="{{ route('contact') }}"
                        class="group flex h-full min-h-[280px] flex-col justify-between overflow-hidden rounded-3xl bg-brand-950 p-6 text-white shadow-card"
                    >
                        <div class="flex items-center justify-between">
                            <span class="grid h-11 w-11 place-items-center rounded-full glass-dark text-brand-200">
                                <x-icon name="sparkles" class="h-5 w-5" />
                            </span>
                            <x-icon name="arrow-up-right" class="h-5 w-5 text-white/30 transition group-hover:text-brand-300" />
                        </div>

                        <div class="mt-12">
                            <h3 class="font-display text-2xl font-semibold">Need something else?</h3>
                            <p class="mt-2 text-sm leading-relaxed text-white/60">
                                Custom development, private label and full-package programmes - built around your brief.
                            </p>
                            <span class="mt-5 inline-flex text-[0.62rem] font-semibold tracking-[0.2em] text-brand-300 uppercase">
                                Talk to our team
                            </span>
                        </div>
                    </a>
                </div>

                <div class="reveal reveal-up" style="--reveal-delay: 90ms">
                    <div class="flex h-full min-h-[280px] flex-col justify-between rounded-3xl border border-brand-900/10 bg-cream p-6 shadow-card">
                        <div class="flex items-center justify-between">
                            <span class="text-[0.62rem] font-semibold tracking-[0.2em] text-brand-600 uppercase">Our process</span>
                            <x-icon name="layers" class="h-5 w-5 text-brand-400" />
                        </div>

                        <div>
                            <h3 class="font-display text-2xl font-semibold text-brand-950">From brief to delivery.</h3>
                            <ol class="mt-4 space-y-2">
                                @foreach (array_slice($process, 0, 4) as $step)
                                    <li class="flex items-center gap-2 text-xs text-ink/55">
                                        <span class="font-display text-[0.65rem] font-bold text-brand-500">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                        {{ $step['title'] }}
                                    </li>
                                @endforeach
                            </ol>
                            <a href="{{ route('about') }}#process" class="link-underline mt-5 inline-flex text-[0.7rem] font-semibold text-brand-700">
                                How we work
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section relative overflow-hidden">
        <div class="shell">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <x-section-heading
                    eyebrow="How we work"
                    title="A clear path from idea to delivery."
                    description="No black boxes. Every programme follows a simple, transparent process with a named contact and clear milestones."
                />
                <p class="reveal reveal-right max-w-xs text-sm leading-relaxed text-ink/50">
                    Sampling in days, not weeks. Production updates you can count on. One partner for every step.
                </p>
            </div>

            <div class="relative mt-14">
                <div class="absolute top-6 right-0 left-0 hidden h-px bg-brand-900/10 lg:block"></div>

                <div class="grid gap-9 sm:grid-cols-2 lg:grid-cols-5">
                    @foreach ($process as $step)
                        <div class="reveal reveal-up relative" style="--reveal-delay: {{ $loop->index * 80 }}ms">
                            <div class="relative z-10 grid h-12 w-12 place-items-center rounded-full bg-brand-600 font-display text-sm font-bold text-white shadow-soft">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </div>
                            <h3 class="mt-5 font-display text-base font-semibold text-brand-950">{{ $step['title'] }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-ink/55">{{ $step['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="shell grid gap-12 lg:grid-cols-12 lg:gap-16">
            <div class="lg:col-span-5">
                <div class="lg:sticky lg:top-28">
                    <x-section-heading
                        eyebrow="Why Hibat"
                        title="Built for brands that cannot afford surprises."
                        description="We combine the flexibility of a focused manufacturer with the discipline of a certified, export-ready supply chain."
                    />

                    <div class="reveal reveal-up mt-8 rounded-2xl border border-brand-900/10 bg-cream p-5">
                        <div class="flex items-center gap-3">
                            <span class="grid h-10 w-10 place-items-center rounded-full bg-brand-600 text-white">
                                <x-icon name="users" class="h-5 w-5" />
                            </span>
                            <div>
                                <p class="text-sm font-semibold text-brand-950">Talk to a real person</p>
                                <p class="text-xs text-ink/50">Merchandising, design and QC in one team.</p>
                            </div>
                        </div>
                        <a href="mailto:{{ config('site.email') }}" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-brand-700 transition hover:text-brand-900">
                            <x-icon name="mail" class="h-4 w-4" />
                            {{ config('site.email') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:col-span-7">
                @foreach ($whyUs as $item)
                    <div class="reveal reveal-up group rounded-2xl border border-brand-900/10 bg-cream p-5 transition duration-300 hover:-translate-y-1 hover:border-brand-600/30 hover:bg-white hover:shadow-soft" style="--reveal-delay: {{ ($loop->index % 2) * 90 }}ms">
                        <span class="grid h-10 w-10 place-items-center rounded-xl bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white">
                            <x-icon :name="$item['icon']" class="h-5 w-5" />
                        </span>
                        <h3 class="mt-4 font-display text-base font-semibold text-brand-950">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink/55">{{ $item['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-brand-950 py-14 sm:py-16">
        <div class="absolute inset-0 pattern-grid opacity-20"></div>

        <div class="shell relative">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="eyebrow eyebrow-light">Certified supply chain</span>
                    <h2 class="mt-3 font-display text-2xl font-semibold text-white sm:text-3xl">
                        Standards we work with
                    </h2>
                </div>
                <p class="max-w-sm text-sm leading-relaxed text-white/50">
                    Our partner facilities are audited and aligned with globally recognised textile standards.
                </p>
            </div>

            <div class="marquee mt-8">
                <div class="marquee-track">
                    @foreach (array_merge($certifications, $certifications) as $certification)
                        <div class="mx-2 flex items-center gap-2.5 rounded-full border border-white/10 bg-white/5 px-5 py-2.5">
                            <x-icon name="shield" class="h-4 w-4 text-brand-300" />
                            <span class="text-[0.68rem] font-semibold tracking-[0.16em] whitespace-nowrap text-white/65 uppercase">
                                {{ $certification['name'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section relative overflow-hidden">
        <div class="absolute inset-0 pattern-dots opacity-40"></div>

        <div class="shell relative">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <x-section-heading
                    eyebrow="Global locations"
                    title="Close to production. Close to you."
                    description="Three offices, one team. We coordinate design, manufacturing and delivery across Bangladesh and the United States."
                />

                <x-button :href="route('locations')" variant="outline" size="md" class="reveal reveal-right shrink-0">
                    Explore locations
                    <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
                </x-button>
            </div>

            <div class="mt-12 grid gap-4 sm:gap-5 md:grid-cols-3">
                @foreach ($locations as $location)
                    <a
                        href="{{ route('locations') }}#{{ $location['slug'] }}"
                        class="reveal reveal-up group rounded-3xl border border-brand-900/10 bg-white p-6 shadow-card transition duration-300 hover:-translate-y-1.5 hover:border-brand-600/30"
                        style="--reveal-delay: {{ $loop->index * 90 }}ms"
                    >
                        <div class="flex items-center justify-between">
                            <span class="grid h-11 w-11 place-items-center rounded-2xl bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white">
                                <x-icon :name="$location['icon']" class="h-5 w-5" />
                            </span>
                            <span class="rounded-full bg-brand-50 px-3 py-1 text-[0.6rem] font-semibold tracking-[0.14em] text-brand-700 uppercase">
                                {{ $location['country'] }}
                            </span>
                        </div>

                        <p class="mt-6 text-[0.6rem] font-semibold tracking-[0.2em] text-brand-500 uppercase">{{ $location['label'] }}</p>
                        <h3 class="mt-1.5 font-display text-xl font-semibold text-brand-950">{{ $location['city'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink/55">{{ $location['address'] }}</p>

                        <div class="mt-5 flex flex-wrap gap-1.5">
                            @foreach (array_slice($location['roles'], 0, 3) as $role)
                                <span class="rounded-full border border-brand-900/10 px-2.5 py-1 text-[0.62rem] text-ink/55">{{ $role }}</span>
                            @endforeach
                        </div>

                        <span class="mt-5 inline-flex items-center gap-1.5 text-[0.68rem] font-semibold text-brand-700">
                            View office
                            <x-icon name="chevron-right" class="h-3.5 w-3.5 transition group-hover:translate-x-1" />
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <x-cta
        title="Work together, win together."
        description="Share your next collection with us. We will respond with product ideas, fabric options, timelines and a clear path to production."
    />
@endsection
