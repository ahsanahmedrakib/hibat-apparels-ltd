@extends('layouts.app')

@section('title', 'Our Products | Hibat Apparels Ltd.')
@section('meta_description', 'Explore the Hibat Apparels product portfolio: functional outerwear, workwear, uniforms, jackets, denim, twill, knitwear, socks, backpacks and accessories.')

@section('content')
    @php
        $products = config('site.products');
    @endphp

    <x-page-hero
        title="Our products."
        eyebrow="Product portfolio"
        current="Our products"
        subtitle="Ten product categories, one consistent quality standard. From technical outerwear to everyday essentials, we develop and manufacture what your brand needs."
        image="images/products/functional-outerwear.jpg"
    />

    <div class="sticky top-[4.75rem] z-30 border-b border-brand-900/10 bg-white/95 backdrop-blur-md">
        <div class="shell">
            <div class="no-scrollbar flex items-center gap-2 overflow-x-auto py-3">
                @foreach ($products as $product)
                    <a
                        href="#{{ $product['slug'] }}"
                        class="inline-flex shrink-0 items-center gap-1.5 rounded-full border border-brand-900/10 px-3.5 py-2 text-[0.7rem] font-medium whitespace-nowrap text-ink/65 transition hover:border-brand-600 hover:bg-brand-600 hover:text-white"
                    >
                        <x-icon :name="$product['icon']" class="h-3.5 w-3.5" />
                        {{ $product['name'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <section class="border-b border-brand-900/5 bg-white py-12 sm:py-14">
        <div class="shell grid gap-8 lg:grid-cols-12 lg:items-end">
            <div class="lg:col-span-7">
                <x-section-heading
                    eyebrow="What we make"
                    title="The first address for sport, outdoor and work clothing."
                    description="Our broad portfolio leaves hardly any wish unfulfilled, and our high quality standard distinguishes every product group. Depending on your taste and needs, we can supply almost anything from functional clothing to everyday essentials."
                />
            </div>
            <div class="lg:col-span-5 lg:pl-8">
                <p class="text-sm leading-relaxed text-ink/55">
                    We advise and accompany you from the initial idea to production and delivery of the finished product. Our team of sales staff, designers and product specialists finds optimal solutions for your specific requirements and implements them professionally and reliably.
                </p>
                <x-button :href="route('contact')" size="md" class="mt-5">
                    Request a quote
                    <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
                </x-button>
            </div>
        </div>
    </section>

    @foreach ($products as $index => $product)
        <section id="{{ $product['slug'] }}" class="section scroll-mt-32 {{ $loop->even ? 'bg-white' : '' }}">
            <div class="shell grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
                <div class="relative reveal {{ $loop->even ? 'reveal-right lg:order-2' : 'reveal-left' }}">
                    <div class="group overflow-hidden rounded-[2rem] shadow-card">
                        <img
                            src="{{ asset($product['image']) }}"
                            alt="{{ $product['name'] }} manufactured by {{ config('site.name') }}"
                            loading="lazy"
                            decoding="async"
                            class="aspect-[4/3] w-full object-cover transition duration-700 group-hover:scale-105"
                        >
                    </div>

                    <div class="absolute top-5 left-5 flex items-center gap-2 rounded-full bg-brand-950/70 px-4 py-2 text-white backdrop-blur-md">
                        <x-icon :name="$product['icon']" class="h-4 w-4 text-brand-200" />
                        <span class="text-[0.6rem] font-semibold tracking-[0.18em] uppercase">Category {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>

                    @if (! empty($product['children']))
                        <div class="absolute -right-3 -bottom-5 hidden rounded-2xl border border-brand-900/10 bg-white px-4 py-3 shadow-card sm:block">
                            <p class="font-display text-2xl font-bold text-brand-600">{{ str_pad(count($product['children']), 2, '0', STR_PAD_LEFT) }}</p>
                            <p class="text-[0.55rem] font-semibold tracking-[0.16em] text-ink/45 uppercase">Product lines</p>
                        </div>
                    @endif
                </div>

                <div class="reveal {{ $loop->even ? 'reveal-left' : 'reveal-right' }}">
                    <span class="eyebrow">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} - Our range</span>
                    <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-brand-950 sm:text-4xl">
                        {{ $product['name'] }}
                    </h2>
                    <p class="mt-4 max-w-xl text-sm leading-relaxed text-ink/60 sm:text-base">
                        {{ $product['summary'] }}
                    </p>

                    @if (! empty($product['children']))
                        <div class="mt-7">
                            <p class="text-[0.62rem] font-semibold tracking-[0.2em] text-ink/40 uppercase">Included products</p>
                            <div class="mt-3 flex flex-wrap gap-2">
                                @foreach ($product['children'] as $child)
                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-brand-600/15 bg-brand-50 px-3.5 py-1.5 text-xs font-medium text-brand-700">
                                        <x-icon name="check" class="h-3 w-3" />
                                        {{ $child }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <ul class="mt-6 grid gap-2.5 border-t border-brand-900/10 pt-6 sm:grid-cols-3">
                        @foreach ($product['highlights'] as $highlight)
                            <li class="flex items-start gap-2 text-[0.7rem] leading-snug text-ink/60">
                                <x-icon name="check-circle" class="mt-0.5 h-3.5 w-3.5 shrink-0 text-brand-500" />
                                {{ $highlight }}
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-7 flex flex-wrap gap-3">
                        <x-button :href="route('contact')" size="md">
                            Enquire now
                            <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
                        </x-button>
                        <x-button :href="route('about')" variant="outline" size="md">
                            How we work
                        </x-button>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <section class="section bg-white">
        <div class="shell">
            <div class="reveal reveal-zoom relative overflow-hidden rounded-[2rem] border border-brand-900/10 bg-cream p-7 sm:p-10 lg:p-14">
                <div class="absolute -top-20 -right-20 h-56 w-56 rounded-full bg-brand-100/70 blur-2xl"></div>

                <div class="relative grid gap-8 lg:grid-cols-12 lg:items-center">
                    <div class="lg:col-span-8">
                        <span class="eyebrow">Custom development</span>
                        <h2 class="mt-4 font-display text-2xl font-semibold text-brand-950 sm:text-3xl">
                            Do you have a product that is not on the list?
                        </h2>
                        <p class="mt-3 max-w-2xl text-sm leading-relaxed text-ink/60">
                            Our designers, merchandisers and sample room can develop products from scratch - tech packs, fabrics, fits, trims, prints and packaging. Bring us the idea and we will map the route to production.
                        </p>
                    </div>
                    <div class="lg:col-span-4 lg:text-right">
                        <x-button :href="route('contact')" variant="dark" size="lg">
                            Start a conversation
                            <x-icon name="arrow-up-right" class="h-4 w-4" />
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-cta
        title="One partner for the full collection."
        description="Tell us which categories you need and we will come back with options, timelines and a clear quotation."
    />
@endsection
