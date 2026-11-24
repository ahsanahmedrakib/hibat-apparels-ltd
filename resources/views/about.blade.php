@extends('layouts.app')

@section('title', 'About Us | Hibat Apparels Ltd.')
@section('meta_description', 'Learn about Hibat Apparels Ltd., an owner-managed apparel manufacturer in Bangladesh with an owned factory, certified partners and end-to-end service.')

@section('content')
    @php
        $products = config('site.products');
        $services = config('site.services');
        $process = config('site.process');
        $certifications = config('site.certifications');
    @endphp

    <x-page-hero
        title="An owner-managed company with tradition."
        eyebrow="About Hibat"
        current="About us"
        subtitle="A Bangladesh-based apparel manufacturer and exporter, built on flexibility, compliance and long-term partnerships."
        image="images/about/factory.jpg"
    />

    <section class="section relative overflow-hidden">
        <div class="absolute inset-y-0 right-0 w-1/2 pattern-dots opacity-40"></div>

        <div class="shell relative grid items-center gap-14 lg:grid-cols-2 lg:gap-20">
            <div class="reveal reveal-left relative">
                <div class="overflow-hidden rounded-[2rem] shadow-card">
                    <img
                        src="{{ asset('images/about/factory.jpg') }}"
                        alt="Inside the Hibat Apparels factory in Gazipur"
                        loading="lazy"
                        class="aspect-[4/3] w-full object-cover"
                    >
                </div>

                <div class="absolute -right-4 -bottom-10 hidden w-48 overflow-hidden rounded-3xl border-4 border-cream shadow-card sm:block lg:w-56">
                    <img
                        src="{{ asset('images/about/team.jpg') }}"
                        alt="The Hibat Apparels team"
                        loading="lazy"
                        class="aspect-square w-full object-cover"
                    >
                </div>

                <div class="absolute -top-5 -left-4 flex items-center gap-2 rounded-2xl bg-brand-600 px-4 py-3 text-white shadow-soft sm:-left-6">
                    <x-icon name="check-circle" class="h-5 w-5 text-brand-200" />
                    <span class="text-[0.62rem] font-semibold tracking-[0.16em] uppercase">Export ready</span>
                </div>
            </div>

            <div class="reveal reveal-right">
                <x-section-heading
                    eyebrow="Our story"
                    title="Tradition, flexibility and a hands-on approach."
                    description="From a small production facility, our family business has grown into an innovative and export-ready apparel company. Our strength lies in developing tailor-made solutions for the needs of each customer - combining an owned factory with a trusted network of production partners, and decades of combined experience in manufacturing and logistics."
                />

                <p class="mt-5 max-w-xl text-sm leading-relaxed text-ink/60">
                    We see ourselves as an efficient, innovative and reliable partner at our customers' side. Every programme is treated as a long-term relationship: honest communication, consistent quality and a willingness to adapt quickly.
                </p>

                <blockquote class="mt-8 border-l-2 border-brand-500 pl-5">
                    <p class="font-display text-lg font-medium text-brand-950 italic">“{{ config('site.tagline') }}”</p>
                    <footer class="mt-2 text-xs font-semibold tracking-[0.18em] text-brand-500 uppercase">The Hibat Apparels team</footer>
                </blockquote>

                <div class="mt-9 flex flex-wrap gap-3">
                    <x-button :href="route('products')" size="md">
                        Explore our products
                        <x-icon name="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1" />
                    </x-button>
                    <x-button :href="route('contact')" variant="outline" size="md">
                        Talk to us
                    </x-button>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-16">
        <div class="shell grid gap-4 md:grid-cols-3">
            @foreach (config('site.values') as $value)
                <div class="reveal reveal-up group rounded-3xl border border-brand-900/10 bg-cream p-6 transition duration-300 hover:-translate-y-1 hover:border-brand-600/30 hover:bg-white hover:shadow-soft" style="--reveal-delay: {{ $loop->index * 90 }}ms">
                    <span class="grid h-11 w-11 place-items-center rounded-2xl bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white">
                        <x-icon :name="$value['icon']" class="h-5 w-5" />
                    </span>
                    <h2 class="mt-5 font-display text-lg font-semibold text-brand-950">{{ $value['title'] }}</h2>
                    <p class="mt-2 text-sm leading-relaxed text-ink/55">{{ $value['description'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="relative overflow-hidden bg-brand-950">
        <div class="absolute inset-0 pattern-grid opacity-25"></div>
        <div class="absolute -right-24 -bottom-24 h-80 w-80 rounded-full bg-brand-500/20 blur-3xl"></div>

        <div class="shell relative grid gap-12 py-16 sm:py-20 lg:grid-cols-2 lg:items-center lg:gap-20">
            <div class="reveal reveal-left">
                <span class="eyebrow eyebrow-light">Rapid project processing</span>
                <h2 class="mt-4 font-display text-3xl leading-tight font-semibold text-white sm:text-4xl">
                    Our own office and factory keep every project moving.
                </h2>
                <p class="mt-5 max-w-xl text-sm leading-relaxed text-white/60">
                    With our own branch office and production facility in Bangladesh, projects move faster and stay visible. Compliance, quality and product development are handled by one integrated team.
                </p>

                <ul class="mt-8 space-y-4">
                    @foreach ([
                        'Compliance and quality team to ensure the best product quality',
                        'Product development, cutting and printing technology from one source',
                        'Sample department with samples available within days',
                        'Merchandise team for sourcing and project management',
                    ] as $point)
                        <li class="flex items-start gap-3 text-sm text-white/70">
                            <span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-brand-500/25 text-brand-200">
                                <x-icon name="check" class="h-3 w-3" />
                            </span>
                            {{ $point }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="reveal reveal-right grid grid-cols-2 gap-3 sm:gap-4">
                <div class="col-span-2 overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/about/quality.jpg') }}" alt="Quality inspection at Hibat Apparels" loading="lazy" class="aspect-[16/9] w-full object-cover">
                </div>
                <div class="overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/about/sustainability.jpg') }}" alt="Sustainable production at Hibat Apparels" loading="lazy" class="aspect-square w-full object-cover">
                </div>
                <div class="flex flex-col justify-center rounded-2xl bg-brand-600 p-5 text-white">
                    <p class="font-display text-4xl font-bold">10</p>
                    <p class="mt-1 text-[0.6rem] font-semibold tracking-[0.16em] text-brand-100 uppercase">Product categories under one roof</p>
                    <a href="{{ route('products') }}" class="mt-4 inline-flex items-center gap-1.5 text-[0.68rem] font-semibold text-brand-100 hover:text-white">
                        View range
                        <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="shell">
            <x-section-heading
                align="center"
                eyebrow="What we do"
                title="Our services include"
                description="One partner for the details that make a programme work - from the first material conversation to the final delivery."
                titleClass="mx-auto"
            />

            <div class="mt-12 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($services as $service)
                    <div class="reveal reveal-up flex items-start gap-3 rounded-2xl border border-brand-900/10 bg-cream p-4 transition hover:border-brand-600/30 hover:bg-brand-50" style="--reveal-delay: {{ ($loop->index % 3) * 80 }}ms">
                        <span class="mt-0.5 grid h-6 w-6 shrink-0 place-items-center rounded-full bg-brand-600 text-white">
                            <x-icon name="check" class="h-3.5 w-3.5" />
                        </span>
                        <span class="text-sm leading-relaxed text-ink/70">{{ $service }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section relative overflow-hidden">
        <div class="absolute inset-0 pattern-dots opacity-40"></div>

        <div class="shell relative grid items-center gap-14 lg:grid-cols-2 lg:gap-20">
            <div class="reveal reveal-left">
                <x-section-heading
                    eyebrow="Quality & compliance"
                    title="Quality standards we take seriously."
                    description="We feel responsible for the environment, our partners and customers. That is why a certified production chain matters to us."
                />

                <p class="mt-5 max-w-xl text-sm leading-relaxed text-ink/60">
                    Working with external testing institutes and complying with their strict requirements helps us maintain and improve our standards. Our partner facilities work with independent certifiers, and we participate in social compliance initiatives to meet our responsibility to the people who make our products.
                </p>

                <div class="mt-8 grid gap-3 sm:grid-cols-2">
                    <div class="rounded-2xl border border-brand-900/10 bg-white p-5">
                        <x-icon name="shield" class="h-6 w-6 text-brand-600" />
                        <h3 class="mt-3 font-display text-sm font-semibold text-brand-950">OEKO-TEX Standard 100</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-ink/55">Tested materials and responsible chemical management.</p>
                    </div>
                    <div class="rounded-2xl border border-brand-900/10 bg-white p-5">
                        <x-icon name="users" class="h-6 w-6 text-brand-600" />
                        <h3 class="mt-3 font-display text-sm font-semibold text-brand-950">amfori BSCI</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-ink/55">Social compliance and ethical working conditions.</p>
                    </div>
                </div>
            </div>

            <div class="reveal reveal-right relative">
                <div class="overflow-hidden rounded-[2rem] shadow-card">
                    <img
                        src="{{ asset('images/about/quality.jpg') }}"
                        alt="Inspecting finished garments"
                        loading="lazy"
                        class="aspect-[4/3] w-full object-cover"
                    >
                </div>
                <div class="absolute -bottom-6 -left-4 rounded-2xl border border-brand-900/10 bg-white px-5 py-4 shadow-card sm:-left-6">
                    <div class="flex items-center gap-3">
                        <span class="grid h-10 w-10 place-items-center rounded-full bg-brand-600 text-white">
                            <x-icon name="check-circle" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="font-display text-sm font-semibold text-brand-950">100% inspected</p>
                            <p class="text-[0.65rem] text-ink/50">Inline and final quality control</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="process" class="section scroll-mt-28 bg-white">
        <div class="shell">
            <x-section-heading
                align="center"
                eyebrow="How we work"
                title="A clear path from idea to delivery."
                description="A simple, transparent process with clear milestones - and a named contact at every stage."
                titleClass="mx-auto"
            />

            <div class="relative mx-auto mt-14 max-w-3xl">
                <div class="absolute top-3 bottom-3 left-[calc(1.5rem-1px)] w-0.5 timeline-line"></div>

                @foreach ($process as $step)
                    <div class="reveal reveal-up relative flex gap-5 pb-10 last:pb-0" style="--reveal-delay: {{ $loop->index * 80 }}ms">
                        <div class="relative z-10 grid h-12 w-12 shrink-0 place-items-center rounded-full bg-brand-600 font-display text-sm font-bold text-white shadow-soft">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </div>
                        <div class="pt-1.5">
                            <h3 class="font-display text-lg font-semibold text-brand-950">{{ $step['title'] }}</h3>
                            <p class="mt-1.5 max-w-xl text-sm leading-relaxed text-ink/55">{{ $step['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="shell">
            <x-section-heading
                align="center"
                eyebrow="Certifications"
                title="Teaming up with trusted certifiers."
                description="The certifications we work towards for our supply base, products and practices give you confidence in the partners behind your brand."
                titleClass="mx-auto"
            />

            <div class="mt-12 grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-6">
                @foreach ($certifications as $certification)
                    <div class="reveal reveal-up flex flex-col items-center gap-3 rounded-2xl border border-brand-900/10 bg-white px-4 py-7 text-center transition hover:-translate-y-1 hover:border-brand-600/30 hover:shadow-soft" style="--reveal-delay: {{ $loop->index * 60 }}ms">
                        <span class="grid h-11 w-11 place-items-center rounded-full bg-brand-50 text-brand-600">
                            <x-icon name="shield" class="h-5 w-5" />
                        </span>
                        <span class="text-[0.66rem] font-semibold tracking-[0.1em] text-ink/65 uppercase">{{ $certification['name'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-cta
        title="Let us build your next collection."
        description="Whether you need a full programme or a single category, our team is ready to talk through options, timelines and pricing."
    />
@endsection
