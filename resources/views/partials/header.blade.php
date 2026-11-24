@php
    $navLink = 'rounded-full px-4 py-2 text-[0.82rem] font-medium tracking-wide transition-colors';
    $navActive = 'text-brand-700';
    $navIdle = 'text-ink/70 hover:text-brand-700';
    $products = config('site.products');
@endphp

<div class="hidden bg-brand-950 text-brand-100 lg:block">
    <div class="shell flex h-10 items-center justify-between text-[0.72rem]">
        <div class="flex items-center gap-6">
            <a href="mailto:{{ config('site.email') }}" class="inline-flex items-center gap-2 transition hover:text-white">
                <x-icon name="mail" class="h-3.5 w-3.5 text-brand-300" />
                {{ config('site.email') }}
            </a>
            <span class="inline-flex items-center gap-2 text-brand-200/75">
                <x-icon name="clock" class="h-3.5 w-3.5 text-brand-300" />
                {{ config('site.hours') }}
            </span>
        </div>

        <div class="flex items-center gap-5">
            <span class="text-brand-200/60 italic">{{ config('site.tagline') }}</span>
            <div class="flex items-center gap-1">
                @foreach (config('site.socials') as $social)
                    <a
                        href="{{ $social['url'] }}"
                        aria-label="{{ $social['name'] }}"
                        class="grid h-7 w-7 place-items-center rounded-full text-brand-200 transition hover:bg-white/10 hover:text-white"
                    >
                        <x-icon :name="$social['icon']" class="h-3.5 w-3.5" />
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<header data-header class="site-header sticky top-0 z-50 border-b border-brand-900/10 bg-white">
    <div class="shell flex min-h-[4.75rem] items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="group flex shrink-0 items-center gap-2.5" aria-label="{{ config('site.name') }} home">
            <img
                src="{{ asset('images/hal-mark.png') }}"
                alt=""
                width="392"
                height="367"
                class="h-10 w-auto transition duration-500 group-hover:scale-105 sm:h-11"
            >
            <span class="leading-none">
                <span class="block font-display text-[1.02rem] font-extrabold tracking-tight text-brand-950 uppercase sm:text-[1.2rem]">
                    Hibat Apparels
                </span>
                <span class="mt-1.5 flex items-center gap-1.5 text-[0.5rem] font-semibold tracking-[0.22em] text-brand-600 uppercase sm:text-[0.56rem]">
                    <span class="h-px w-3 bg-brand-500"></span>
                    Ltd.
                    <span class="hidden text-[0.55rem] font-normal tracking-normal text-ink/40 normal-case italic sm:inline">
                        {{ config('site.tagline') }}
                    </span>
                </span>
            </span>
        </a>

        <nav class="hidden items-center gap-0.5 lg:flex" aria-label="Primary">
            <a href="{{ route('home') }}" class="{{ $navLink }} {{ request()->routeIs('home') ? $navActive : $navIdle }}">Home</a>
            <a href="{{ route('about') }}" class="{{ $navLink }} {{ request()->routeIs('about') ? $navActive : $navIdle }}">About</a>

            <div class="mega-menu-link relative">
                <a
                    href="{{ route('products') }}"
                    class="{{ $navLink }} inline-flex items-center gap-1 {{ request()->routeIs('products') ? $navActive : $navIdle }}"
                    aria-haspopup="true"
                >
                    Products
                    <x-icon name="chevron-down" class="h-3.5 w-3.5" />
                </a>

                <div class="mega-menu absolute top-full left-1/2 z-50 w-[660px] max-w-[calc(100vw-3rem)] pt-4">
                    <div class="rounded-3xl border border-brand-900/10 bg-white p-3 shadow-2xl">
                        <div class="grid grid-cols-2 gap-1">
                            @foreach ($products as $product)
                                <a
                                    href="{{ route('products') }}#{{ $product['slug'] }}"
                                    class="group flex items-center gap-3 rounded-2xl p-2.5 transition hover:bg-brand-50"
                                >
                                    <span class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white">
                                        <x-icon :name="$product['icon']" class="h-4 w-4" />
                                    </span>
                                    <span class="min-w-0">
                                        <span class="block truncate text-[0.8rem] font-semibold text-brand-950">{{ $product['name'] }}</span>
                                        <span class="block truncate text-[0.68rem] text-ink/50">
                                            {{ ! empty($product['children']) ? implode(', ', $product['children']) : 'View range' }}
                                        </span>
                                    </span>
                                </a>
                            @endforeach
                        </div>

                        <div class="mt-3 flex items-center justify-between gap-3 rounded-2xl bg-brand-950 px-4 py-3">
                            <div>
                                <p class="text-xs font-semibold text-white">Need a custom programme?</p>
                                <p class="text-[0.7rem] text-white/50">We develop products from scratch.</p>
                            </div>
                            <a href="{{ route('contact') }}" class="link-underline shrink-0 text-[0.72rem] font-semibold text-brand-200 hover:text-white">
                                Talk to us
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('locations') }}" class="{{ $navLink }} {{ request()->routeIs('locations') ? $navActive : $navIdle }}">Locations</a>
            <a href="{{ route('contact') }}" class="{{ $navLink }} {{ request()->routeIs('contact') ? $navActive : $navIdle }}">Contact</a>
        </nav>

        <div class="flex items-center gap-2.5">
            <div class="hidden sm:block">
                <x-button href="{{ route('contact') }}" size="md">
                    Get a quote
                    <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
                </x-button>
            </div>

            <button
                type="button"
                data-mobile-toggle
                aria-expanded="false"
                aria-controls="mobile-menu"
                aria-label="Toggle navigation menu"
                class="grid h-11 w-11 place-items-center rounded-full border border-brand-900/10 text-brand-950 transition hover:bg-brand-50 lg:hidden"
            >
                <span data-icon-open>
                    <x-icon name="menu" class="h-5 w-5" />
                </span>
                <span data-icon-close class="hidden">
                    <x-icon name="close" class="h-5 w-5" />
                </span>
            </button>
        </div>
    </div>

    <div id="mobile-menu" data-mobile-menu class="mobile-menu absolute inset-x-0 top-full z-40 border-t border-brand-900/10 bg-white shadow-2xl lg:hidden">
        <nav class="shell py-4" aria-label="Mobile">
            <div class="flex flex-col gap-1">
                <a href="{{ route('home') }}" class="rounded-2xl px-4 py-3 text-sm font-medium {{ request()->routeIs('home') ? 'bg-brand-50 text-brand-700' : 'text-ink/80' }}">Home</a>
                <a href="{{ route('about') }}" class="rounded-2xl px-4 py-3 text-sm font-medium {{ request()->routeIs('about') ? 'bg-brand-50 text-brand-700' : 'text-ink/80' }}">About</a>

                <details class="group mt-1 rounded-2xl bg-brand-50/70">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-4 py-3 text-sm font-semibold text-ink [&::-webkit-details-marker]:hidden">
                        <span>Products</span>
                        <x-icon name="chevron-down" class="h-4 w-4 text-brand-600 transition group-open:rotate-180" />
                    </summary>
                    <div class="flex flex-wrap gap-2 px-4 pb-4">
                        @foreach ($products as $product)
                            <a
                                href="{{ route('products') }}#{{ $product['slug'] }}"
                                class="rounded-full border border-brand-600/15 bg-white px-3 py-1.5 text-xs font-medium text-brand-700 transition hover:border-brand-600 hover:bg-brand-600 hover:text-white"
                            >
                                {{ $product['name'] }}
                            </a>
                        @endforeach
                    </div>
                </details>

                <a href="{{ route('locations') }}" class="mt-1 rounded-2xl px-4 py-3 text-sm font-medium {{ request()->routeIs('locations') ? 'bg-brand-50 text-brand-700' : 'text-ink/80' }}">Locations</a>
                <a href="{{ route('contact') }}" class="rounded-2xl px-4 py-3 text-sm font-medium {{ request()->routeIs('contact') ? 'bg-brand-50 text-brand-700' : 'text-ink/80' }}">Contact</a>
            </div>

            <div class="mt-4 flex flex-col gap-3 border-t border-brand-900/10 pt-5">
                <x-button href="{{ route('contact') }}" size="md" class="w-full">
                    Get a quote
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </x-button>

                <a href="mailto:{{ config('site.email') }}" class="flex items-center gap-2.5 text-xs text-ink/65">
                    <x-icon name="mail" class="h-4 w-4 text-brand-600" />
                    {{ config('site.email') }}
                </a>
                <span class="flex items-center gap-2.5 text-xs text-ink/65">
                    <x-icon name="clock" class="h-4 w-4 text-brand-600" />
                    {{ config('site.hours') }}
                </span>
            </div>
        </nav>
    </div>
</header>
