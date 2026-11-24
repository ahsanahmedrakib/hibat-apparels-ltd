@extends('layouts.app')

@section('title', 'Contact Us | Hibat Apparels Ltd.')
@section('meta_description', 'Contact Hibat Apparels Ltd. about product development, quotations or partnerships. Our team replies within one business day.')

@section('content')
    @php
        $locations = config('site.locations');
        $subjects = config('site.contact_subjects');
    @endphp

    <x-page-hero
        title="Contact us."
        eyebrow="Start a conversation"
        current="Contact"
        subtitle="Tell us about your next collection, your target price or the category you want to develop. We will get back to you with a clear answer."
        image="images/about/hero-2.jpg"
    />

    <section class="section relative overflow-hidden">
        <div class="absolute inset-y-0 right-0 w-1/2 pattern-dots opacity-40"></div>

        <div class="shell relative grid gap-12 lg:grid-cols-12 lg:gap-14">
            <div class="reveal reveal-left lg:col-span-5">
                <x-section-heading
                    eyebrow="Get in touch"
                    title="Do you have a question? Write us a message."
                    description="Whether you need a quotation, a sample or advice on materials, our team in Dhaka is ready to help."
                />

                <div class="mt-8 space-y-3">
                    <a href="mailto:{{ config('site.email') }}" class="group flex items-start gap-4 rounded-2xl border border-brand-900/10 bg-white p-4 shadow-sm transition hover:-translate-y-0.5 hover:border-brand-600/30 hover:shadow-soft">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white">
                            <x-icon name="mail" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="text-[0.6rem] font-semibold tracking-[0.18em] text-ink/40 uppercase">Email</p>
                            <p class="mt-1 text-sm font-semibold text-brand-950">{{ config('site.email') }}</p>
                            <p class="mt-0.5 text-xs text-ink/45">We reply within one business day.</p>
                        </div>
                    </a>

                    <div class="flex items-start gap-4 rounded-2xl border border-brand-900/10 bg-white p-4 shadow-sm">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600">
                            <x-icon name="clock" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="text-[0.6rem] font-semibold tracking-[0.18em] text-ink/40 uppercase">Opening hours</p>
                            <p class="mt-1 text-sm text-ink/65">{{ config('site.hours') }}</p>
                        </div>
                    </div>

                    @foreach ($locations as $location)
                        <div class="flex items-start gap-4 rounded-2xl border border-brand-900/10 bg-white p-4 shadow-sm">
                            <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600">
                                <x-icon :name="$location['icon']" class="h-5 w-5" />
                            </span>
                            <div>
                                <p class="text-[0.6rem] font-semibold tracking-[0.18em] text-ink/40 uppercase">{{ $location['label'] }}</p>
                                <p class="mt-1 text-sm font-semibold text-brand-950">{{ $location['city'] }}, {{ $location['country'] }}</p>
                                <p class="mt-1 text-xs leading-relaxed text-ink/50">{{ $location['address'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="reveal reveal-right lg:col-span-7">
                <div class="rounded-[2rem] border border-brand-900/10 bg-white p-6 shadow-card sm:p-8 lg:p-10">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-[0.62rem] font-semibold tracking-[0.2em] text-brand-500 uppercase">Send a message</p>
                            <h2 class="mt-2 font-display text-2xl font-semibold text-brand-950 sm:text-3xl">Tell us about your project.</h2>
                        </div>
                        <span class="hidden h-12 w-12 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-600 sm:grid">
                            <x-icon name="send" class="h-5 w-5" />
                        </span>
                    </div>

                    @if (session('success'))
                        <div role="status" data-success class="mt-6 flex items-start gap-3 rounded-2xl border border-brand-600/20 bg-brand-50 p-4 text-sm text-brand-800">
                            <x-icon name="check-circle" class="mt-0.5 h-5 w-5 shrink-0 text-brand-600" />
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div role="alert" data-form-errors class="mt-6 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                            <x-icon name="close" class="mt-0.5 h-5 w-5 shrink-0" />
                            Please check the highlighted fields and try again.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="mt-7" data-submit-form>
                        @csrf

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="name" class="text-xs font-semibold text-brand-950">
                                    Full name <span class="text-brand-500">*</span>
                                </label>
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name') }}"
                                    required
                                    autocomplete="name"
                                    placeholder="Your name"
                                    @class(['field mt-2', 'field-error' => $errors->has('name')])
                                >
                                @error('name')
                                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="text-xs font-semibold text-brand-950">
                                    Email address <span class="text-brand-500">*</span>
                                </label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    placeholder="you@company.com"
                                    @class(['field mt-2', 'field-error' => $errors->has('email')])
                                >
                                @error('email')
                                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="text-xs font-semibold text-brand-950">Phone <span class="font-normal text-ink/35">(optional)</span></label>
                                <input
                                    id="phone"
                                    name="phone"
                                    type="tel"
                                    value="{{ old('phone') }}"
                                    autocomplete="tel"
                                    placeholder="+880 ..."
                                    @class(['field mt-2', 'field-error' => $errors->has('phone')])
                                >
                                @error('phone')
                                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="subject" class="text-xs font-semibold text-brand-950">
                                    Subject <span class="text-brand-500">*</span>
                                </label>
                                <select
                                    id="subject"
                                    name="subject"
                                    required
                                    @class(['field mt-2 bg-white', 'field-error' => $errors->has('subject')])
                                >
                                    <option value="" disabled @selected(! old('subject'))>Select a subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject }}" @selected(old('subject') === $subject)>{{ $subject }}</option>
                                    @endforeach
                                </select>
                                @error('subject')
                                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-5">
                            <label for="message" class="text-xs font-semibold text-brand-950">
                                Message <span class="text-brand-500">*</span>
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                required
                                placeholder="Tell us about the product, quantities, target market and timeline..."
                                @class(['field mt-2 resize-y', 'field-error' => $errors->has('message')])
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-button type="submit" size="lg" class="mt-6 w-full">
                            <span data-submit-label>Send message</span>
                            <x-icon name="send" class="h-4 w-4" />
                        </x-button>

                        <p class="mt-4 flex items-start gap-2 text-[0.68rem] leading-relaxed text-ink/45">
                            <x-icon name="shield" class="mt-0.5 h-3.5 w-3.5 shrink-0 text-brand-500" />
                            We will only use your details to respond to this enquiry - never for unrelated marketing.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-16">
        <div class="shell">
            <div class="grid gap-4 md:grid-cols-3">
                @foreach ([
                    ['01', 'We read your message', 'A real person from our team reviews your enquiry and routes it to the right specialist.'],
                    ['02', 'We reply quickly', 'Expect a response within one business day with next steps, questions or a quotation.'],
                    ['03', 'We move to samples', 'Once the brief is clear, we arrange swatches, samples and a production timeline.'],
                ] as $step)
                    <div class="reveal reveal-up rounded-3xl border border-brand-900/10 bg-cream p-6" style="--reveal-delay: {{ $loop->index * 90 }}ms">
                        <span class="font-display text-sm font-bold text-brand-500">{{ $step[0] }}</span>
                        <h2 class="mt-3 font-display text-lg font-semibold text-brand-950">{{ $step[1] }}</h2>
                        <p class="mt-2 text-sm leading-relaxed text-ink/55">{{ $step[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
