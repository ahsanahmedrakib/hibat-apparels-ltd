@php
    $footerProducts = array_slice(config('site.products'), 0, 6);
    $locations = config('site.locations');
    $corporate = $locations[0];
    $usa = $locations[2];
@endphp

<footer class="relative overflow-hidden bg-brand-950 text-brand-100">
    <div class="absolute inset-0 pattern-grid opacity-20"></div>
    <div class="absolute -top-40 right-0 h-96 w-96 rounded-full bg-brand-500/15 blur-3xl"></div>

    <div class="shell relative">
        <div class="grid gap-8 py-6 sm:py-8 lg:grid-cols-12 lg:gap-8 lg:py-10">
            <div class="lg:col-span-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3"
                    aria-label="{{ config('site.name') }} home">
                    <img src="{{ asset('images/hal-mark.png') }}" alt="" width="392" height="367"
                        class="h-12 w-auto">
                    <span class="leading-none">
                        <span
                            class="block font-display text-lg font-extrabold tracking-tight text-white uppercase">Hibat
                            Apparels</span>
                        <span
                            class="mt-1.5 block text-[0.55rem] font-semibold tracking-[0.24em] text-brand-300 uppercase">Ltd.</span>
                    </span>
                </a>

                <p class="mt-5 max-w-sm text-sm leading-relaxed text-brand-100/60">
                    A Bangladesh-based apparel manufacturer and exporter of functional outerwear, workwear, uniforms,
                    denim, twill and knitwear for global brands.
                </p>

                <p class="mt-4 font-display text-sm font-medium text-brand-300 italic">“{{ config('site.tagline') }}”
                </p>

                <div class="mt-6 flex items-center gap-2">
                    @foreach (config('site.socials') as $social)
                        <a href="{{ $social['url'] }}" aria-label="{{ $social['name'] }}"
                            class="grid h-9 w-9 place-items-center rounded-full border border-white/15 text-brand-200 transition hover:border-brand-300 hover:bg-brand-300 hover:text-brand-950">
                            <x-icon :name="$social['icon']" class="h-4 w-4" />
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-2">
                <h3 class="text-[0.68rem] font-semibold tracking-[0.22em] text-white uppercase">Company</h3>
                <ul class="mt-5 space-y-3 text-sm">
                    <li><a href="{{ route('home') }}" class="text-brand-100/60 transition hover:text-white">Home</a>
                    </li>
                    <li><a href="{{ route('about') }}" class="text-brand-100/60 transition hover:text-white">About
                            us</a></li>
                    <li><a href="{{ route('products') }}" class="text-brand-100/60 transition hover:text-white">Our
                            products</a></li>
                    <li><a href="{{ route('locations') }}" class="text-brand-100/60 transition hover:text-white">Global
                            locations</a></li>
                    <li><a href="{{ route('contact') }}" class="text-brand-100/60 transition hover:text-white">Contact
                            us</a></li>
                </ul>
            </div>

            <div class="lg:col-span-3">
                <h3 class="text-[0.68rem] font-semibold tracking-[0.22em] text-white uppercase">Products</h3>
                <ul class="mt-5 space-y-3 text-sm">
                    @foreach ($footerProducts as $product)
                        <li>
                            <a href="{{ route('products') }}#{{ $product['slug'] }}"
                                class="text-brand-100/60 transition hover:text-white">
                                {{ $product['name'] }}
                            </a>
                        </li>
                    @endforeach
                    <li>
                        <a href="{{ route('products') }}"
                            class="inline-flex items-center gap-1.5 text-xs font-semibold text-brand-300 transition hover:text-white">
                            View all products
                            <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                        </a>
                    </li>
                </ul>
            </div>

            <div class="lg:col-span-3">
                <h3 class="text-[0.68rem] font-semibold tracking-[0.22em] text-white uppercase">Get in touch</h3>
                <ul class="mt-5 space-y-4 text-sm">
                    <li>
                        <a href="mailto:{{ config('site.email') }}"
                            class="flex items-start gap-2.5 text-brand-100/60 transition hover:text-white">
                            <x-icon name="mail" class="mt-0.5 h-4 w-4 shrink-0 text-brand-300" />
                            {{ config('site.email') }}
                        </a>
                    </li>
                    <li class="flex items-start gap-2.5 text-brand-100/60">
                        <x-icon name="map-pin" class="mt-0.5 h-4 w-4 shrink-0 text-brand-300" />
                        <span>
                            <span
                                class="block text-[0.65rem] font-semibold tracking-[0.16em] text-brand-300 uppercase">{{ $corporate['label'] }}</span>
                            {{ $corporate['address'] }}
                        </span>
                    </li>
                    <li class="flex items-start gap-2.5 text-brand-100/60">
                        <x-icon name="globe" class="mt-0.5 h-4 w-4 shrink-0 text-brand-300" />
                        <span>
                            <span
                                class="block text-[0.65rem] font-semibold tracking-[0.16em] text-brand-300 uppercase">{{ $usa['label'] }}</span>
                            {{ $usa['address'] }}
                        </span>
                    </li>
                    <li class="flex items-start gap-2.5 text-brand-100/60">
                        <x-icon name="clock" class="mt-0.5 h-4 w-4 shrink-0 text-brand-300" />
                        {{ config('site.hours') }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 py-4">
            <div class="flex flex-wrap items-center gap-x-6 gap-y-3">
                <span class="text-[0.6rem] font-semibold tracking-[0.22em] text-brand-300 uppercase">Compliance</span>
                @foreach (config('site.certifications') as $certification)
                    <span class="text-[0.7rem] font-medium text-brand-100/50">{{ $certification['name'] }}</span>
                @endforeach
            </div>
        </div>

        <div
            class="flex flex-col gap-3 border-t border-white/10 py-4 text-sm text-brand-100/45 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ date('Y') }} {{ rtrim(config('site.name'), '.') }}. All rights reserved.</p>
            <p>
                Design and Developed by <a href="https://bct.com.bd" target="_blank"
                    class="text-brand-300 hover:text-white">Bismisllah Computer & Technology</a>
            </p>
        </div>
    </div>
</footer>
