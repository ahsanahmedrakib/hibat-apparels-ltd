<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('site.name').' | Apparel Manufacturing & Export')</title>
        <meta name="description" content="@yield('meta_description', config('site.description'))">
        <meta name="theme-color" content="#026126">

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{ config('site.name') }}">
        <meta property="og:title" content="@yield('title', config('site.name').' | Apparel Manufacturing & Export')">
        <meta property="og:description" content="@yield('meta_description', config('site.description'))">
        <meta property="og:image" content="{{ asset('images/hal-logo.png') }}">

        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
        <link rel="icon" type="image/png" href="{{ asset('images/hal-mark.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/hal-mark.png') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            document.documentElement.classList.add('js');
        </script>

        @stack('head')
    </head>
    <body class="bg-cream text-ink antialiased">
        <div id="scroll-progress" aria-hidden="true"></div>

        <a href="#main-content" class="skip-link rounded-full bg-brand-600 px-5 py-3 text-sm font-semibold text-white shadow-soft">
            Skip to content
        </a>

        @include('partials.header')

        <main id="main-content">
            @yield('content')
        </main>

        @include('partials.footer')

        <button
            id="back-to-top"
            type="button"
            aria-label="Back to top"
            class="fixed right-5 bottom-6 z-40 grid h-12 w-12 place-items-center rounded-full bg-brand-600 text-white shadow-soft transition hover:bg-brand-700 sm:right-8 sm:bottom-8"
        >
            <x-icon name="arrow-down" class="h-5 w-5 rotate-180" />
        </button>

        @stack('scripts')
    </body>
</html>
