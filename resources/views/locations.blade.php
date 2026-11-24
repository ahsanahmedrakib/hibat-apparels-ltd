@extends('layouts.app')

@section('title', 'Global Locations | Hibat Apparels Ltd.')
@section('meta_description', 'Find Hibat Apparels Ltd. at our corporate office in Uttara, Dhaka, our factory in Tongi, Gazipur, and our USA office in San Jose, California.')

@section('content')
    @php
        $locations = config('site.locations');
    @endphp

    <x-page-hero
        title="Global locations."
        eyebrow="Where to find us"
        current="Locations"
        subtitle="A corporate office in Dhaka, an owned factory in Gazipur and a USA office in California - one connected team across three locations."
        image="images/about/hero-1.jpg"
    />

    <section class="border-b border-brand-900/5 bg-white py-12 sm:py-14">
        <div class="shell grid gap-8 lg:grid-cols-12 lg:items-end">
            <div class="lg:col-span-7">
                <x-section-heading
                    eyebrow="Three offices. One team."
                    title="Close to production. Close to you."
                    description="We coordinate design, manufacturing and delivery across Bangladesh and the United States, so your programme always has a local point of contact."
                />
            </div>
            <div class="lg:col-span-5 lg:pl-8">
                <div class="flex flex-wrap gap-2">
                    @foreach ($locations as $location)
                        <a href="#{{ $location['slug'] }}" class="inline-flex items-center gap-2 rounded-full border border-brand-900/10 px-3.5 py-2 text-[0.7rem] font-medium text-ink/65 transition hover:border-brand-600 hover:bg-brand-600 hover:text-white">
                            <x-icon :name="$location['icon']" class="h-3.5 w-3.5" />
                            {{ $location['label'] }}
                        </a>
                    @endforeach
                </div>
                <a href="mailto:{{ config('site.email') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-brand-700 transition hover:text-brand-900">
                    <x-icon name="mail" class="h-4 w-4" />
                    {{ config('site.email') }}
                </a>
            </div>
        </div>
    </section>

    @foreach ($locations as $location)
        <section id="{{ $location['slug'] }}" class="section scroll-mt-28 {{ $loop->even ? 'bg-white' : '' }}">
            <div class="shell grid gap-10 lg:grid-cols-2 lg:items-stretch lg:gap-14">
                <div class="reveal reveal-left flex flex-col justify-center">
                    <span class="eyebrow">{{ $location['label'] }}</span>
                    <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-brand-950 sm:text-4xl">
                        {{ $location['city'] }}
                    </h2>
                    <p class="mt-1 text-sm font-medium text-brand-600">{{ $location['country'] }}</p>

                    <div class="mt-6 flex items-start gap-3 rounded-2xl border border-brand-900/10 bg-white p-4 shadow-sm">
                        <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600">
                            <x-icon name="map-pin" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="text-[0.6rem] font-semibold tracking-[0.18em] text-ink/40 uppercase">Address</p>
                            <p class="mt-1 text-sm leading-relaxed text-ink/70">{{ $location['address'] }}</p>
                        </div>
                    </div>

                    <p class="mt-5 max-w-xl text-sm leading-relaxed text-ink/60">{{ $location['note'] }}</p>

                    <div class="mt-5 flex flex-wrap gap-1.5">
                        @foreach ($location['roles'] as $role)
                            <span class="rounded-full bg-brand-50 px-3 py-1.5 text-[0.65rem] font-medium text-brand-700">{{ $role }}</span>
                        @endforeach
                    </div>

                    <div class="mt-7 flex flex-wrap gap-3">
                        <x-button :href="route('contact')" size="md">
                            Contact this office
                            <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
                        </x-button>
                        <a
                            href="https://www.google.com/maps/search/?api=1&query={{ urlencode($location['map']) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center gap-2 rounded-full border border-brand-600/25 px-6 py-3 text-sm font-semibold text-brand-700 transition hover:border-brand-600 hover:bg-brand-50"
                        >
                            Open in Google Maps
                            <x-icon name="external" class="h-4 w-4" />
                        </a>
                    </div>
                </div>

                <div class="reveal reveal-right overflow-hidden rounded-[2rem] border border-brand-900/10 bg-white shadow-card">
                    <iframe
                        title="Map of the Hibat Apparels {{ $location['label'] }} in {{ $location['city'] }}"
                        src="https://www.google.com/maps?q={{ urlencode($location['map']) }}&output=embed"
                        class="h-full min-h-[300px] w-full sm:min-h-[380px]"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </section>
    @endforeach

    <section class="relative overflow-hidden bg-brand-950">
        <div class="absolute inset-0 pattern-grid opacity-25"></div>
        <div class="absolute -top-24 right-1/4 h-64 w-64 rounded-full bg-brand-500/20 blur-3xl"></div>

        <div class="shell relative grid gap-8 py-14 sm:py-16 lg:grid-cols-3">
            <div class="reveal reveal-up">
                <span class="grid h-11 w-11 place-items-center rounded-2xl bg-brand-500/20 text-brand-200">
                    <x-icon name="clock" class="h-5 w-5" />
                </span>
                <h2 class="mt-4 font-display text-lg font-semibold text-white">Opening hours</h2>
                <p class="mt-2 text-sm leading-relaxed text-white/55">{{ config('site.hours') }}</p>
            </div>

            <div class="reveal reveal-up" style="--reveal-delay: 90ms">
                <span class="grid h-11 w-11 place-items-center rounded-2xl bg-brand-500/20 text-brand-200">
                    <x-icon name="mail" class="h-5 w-5" />
                </span>
                <h2 class="mt-4 font-display text-lg font-semibold text-white">Email us</h2>
                <a href="mailto:{{ config('site.email') }}" class="mt-2 inline-block text-sm text-white/55 transition hover:text-white">
                    {{ config('site.email') }}
                </a>
            </div>

            <div class="reveal reveal-up" style="--reveal-delay: 180ms">
                <span class="grid h-11 w-11 place-items-center rounded-2xl bg-brand-500/20 text-brand-200">
                    <x-icon name="users" class="h-5 w-5" />
                </span>
                <h2 class="mt-4 font-display text-lg font-semibold text-white">Planning a visit?</h2>
                <p class="mt-2 text-sm leading-relaxed text-white/55">Let us know in advance and we will arrange the right team for your meeting.</p>
            </div>
        </div>
    </section>

    <x-cta
        title="Let us meet, in person or online."
        description="Wherever you are, our team can join a call, share samples and walk you through production options."
        primaryLabel="Book a meeting"
        secondaryLabel="About us"
        :secondaryHref="route('about')"
    />
@endsection
