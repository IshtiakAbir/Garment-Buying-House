<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' — Ventera' : 'Ventera — Premier Garment Buying House & Sourcing Partner' }}</title>
    <meta name="description" content="{{ $description ?? 'Ventera is a Bangladesh-based garment buying house connecting international brands and retailers with certified factories, transparent pricing, and rigorous quality assurance.' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ isset($title) ? $title . ' — Ventera' : 'Ventera — Garment Buying House & Sourcing Partner' }}">
    <meta property="og:description" content="{{ $description ?? 'Premium apparel sourcing from Bangladesh for international fashion brands, retailers, and importers.' }}">
    <meta property="og:image" content="{{ asset('images/brand/logo.svg') }}">
    <meta property="og:site_name" content="Ventera">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ isset($title) ? $title . ' — Ventera' : 'Ventera — Garment Buying House & Sourcing Partner' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Premium apparel sourcing from Bangladesh for international fashion brands, retailers, and importers.' }}">
    <meta name="twitter:image" content="{{ asset('images/brand/logo.svg') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/brand/favicon.svg') }}">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="bg-white text-charcoal font-sans antialiased selection:bg-copper selection:text-white flex flex-col min-h-screen">
    <!-- Accessible Skip to Content Link -->
    <a href="#main-content" 
       class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2.5 focus:bg-copper focus:text-white focus:rounded focus:shadow-elevated focus:font-medium focus:text-sm transition-transform">
        Skip to main content
    </a>

    <!-- Header Navigation -->
    <x-header />

    <!-- Main Content Slot -->
    <main id="main-content" class="flex-grow focus:outline-none" tabindex="-1">
        {{ $slot }}
    </main>

    <!-- Global Footer -->
    <x-footer />

    @stack('scripts')
</body>
</html>
