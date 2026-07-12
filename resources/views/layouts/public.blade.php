<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'AFRICOCO - African Coconut Heritage Initiative. Preserving Africa\'s Coconut Heritage. Growing Opportunities for Generations.')">
    <meta name="keywords" content="AFRICOCO, coconut, Africa, heritage, sustainability, agriculture, agro-tourism, Badagry">
    <meta property="og:title" content="@yield('title', config('app.name'))">
    <meta property="og:description" content="@yield('meta_description', 'Preserving Africa\'s Coconut Heritage. Growing Opportunities for Generations.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">

    <title>@yield('title', config('app.name')) | AFRICOCO</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('africoco-logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=poppins:600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans text-charcoal bg-cream antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50"
         x-data="{ mobileOpen: false, scrolled: false }"
         x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 20)"
         :class="scrolled ? 'bg-white shadow-dropdown border-b border-gray-100' : 'bg-white/95 backdrop-blur-md border-b border-gray-100/50'">
        <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group" aria-label="AFRICOCO - Go to homepage">
                    <img src="{{ asset('africoco-logo.png') }}" alt="AFRICOCO" class="h-12 w-auto transition-transform duration-300 group-hover:scale-105">
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}"
                       class="relative inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium transition-all duration-200 hover:text-primary group {{ request()->routeIs('home') ? 'text-primary' : 'text-charcoal' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Home
                        <span class="absolute -bottom-0.5 left-3 right-3 h-0.5 bg-primary rounded-full transition-all duration-300 ease-out {{ request()->routeIs('home') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}"></span>
                    </a>
                    <a href="{{ route('about') }}"
                       class="relative inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium transition-all duration-200 hover:text-primary group {{ request()->routeIs('about') ? 'text-primary' : 'text-charcoal' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        About Us
                        <span class="absolute -bottom-0.5 left-3 right-3 h-0.5 bg-primary rounded-full transition-all duration-300 ease-out {{ request()->routeIs('about') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}"></span>
                    </a>
                    <a href="{{ route('programs') }}"
                       class="relative inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium transition-all duration-200 hover:text-primary group {{ request()->routeIs('programs') ? 'text-primary' : 'text-charcoal' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        Programs
                        <span class="absolute -bottom-0.5 left-3 right-3 h-0.5 bg-primary rounded-full transition-all duration-300 ease-out {{ request()->routeIs('programs') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}"></span>
                    </a>
                    <a href="{{ route('impact') }}"
                       class="relative inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium transition-all duration-200 hover:text-primary group {{ request()->routeIs('impact') ? 'text-primary' : 'text-charcoal' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        Impact
                        <span class="absolute -bottom-0.5 left-3 right-3 h-0.5 bg-primary rounded-full transition-all duration-300 ease-out {{ request()->routeIs('impact') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}"></span>
                    </a>
                    <a href="{{ route('events') }}"
                       class="relative inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium transition-all duration-200 hover:text-primary group {{ request()->routeIs('events') ? 'text-primary' : 'text-charcoal' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Events
                        <span class="absolute -bottom-0.5 left-3 right-3 h-0.5 bg-primary rounded-full transition-all duration-300 ease-out {{ request()->routeIs('events') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}"></span>
                    </a>
                    <a href="{{ route('corporate-partnerships') }}"
                       class="relative inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium transition-all duration-200 hover:text-primary group {{ request()->routeIs('corporate-partnerships') ? 'text-primary' : 'text-charcoal' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Corporate
                        <span class="absolute -bottom-0.5 left-3 right-3 h-0.5 bg-primary rounded-full transition-all duration-300 ease-out {{ request()->routeIs('corporate-partnerships') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}"></span>
                    </a>
                    <a href="{{ route('contact') }}"
                       class="relative inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium transition-all duration-200 hover:text-primary group {{ request()->routeIs('contact') ? 'text-primary' : 'text-charcoal' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Contact
                        <span class="absolute -bottom-0.5 left-3 right-3 h-0.5 bg-primary rounded-full transition-all duration-300 ease-out {{ request()->routeIs('contact') ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-100 group-hover:scale-x-100' }}"></span>
                    </a>
                </div>

                <!-- CTA & Mobile Toggle -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('strategic-pillars') }}" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-btn hover:bg-forest transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        Our Pillars
                    </a>
                    <button class="lg:hidden relative w-10 h-10 rounded-btn hover:bg-cream transition-colors flex items-center justify-center"
                            @click="mobileOpen = !mobileOpen"
                            aria-label="Toggle navigation menu"
                            :aria-expanded="mobileOpen"
                            aria-controls="mobile-menu">
                        <div class="w-5 flex flex-col items-center justify-center gap-1">
                            <span class="block h-0.5 w-full bg-charcoal rounded-full transition-all duration-300"
                                  :class="{ 'rotate-45 translate-y-1.5': mobileOpen, '': !mobileOpen }"></span>
                            <span class="block h-0.5 w-full bg-charcoal rounded-full transition-all duration-300"
                                  :class="{ 'opacity-0': mobileOpen, '': !mobileOpen }"></span>
                            <span class="block h-0.5 w-full bg-charcoal rounded-full transition-all duration-300"
                                  :class="{ '-rotate-45 -translate-y-1.5': mobileOpen, '': !mobileOpen }"></span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" x-show="mobileOpen" x-cloak
                 class="lg:hidden"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4">
                <div class="pb-4 border-t border-gray-100">
                    <div class="flex flex-col pt-4 space-y-0.5">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-btn hover:bg-cream hover:text-primary transition-all duration-200 {{ request()->routeIs('home') ? 'text-primary bg-cream' : 'text-charcoal' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            Home
                        </a>
                        <a href="{{ route('about') }}" class="inline-flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-btn hover:bg-cream hover:text-primary transition-all duration-200 {{ request()->routeIs('about') ? 'text-primary bg-cream' : 'text-charcoal' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            About Us
                        </a>
                        <a href="{{ route('programs') }}" class="inline-flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-btn hover:bg-cream hover:text-primary transition-all duration-200 {{ request()->routeIs('programs') ? 'text-primary bg-cream' : 'text-charcoal' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                            Programs
                        </a>
                        <a href="{{ route('impact') }}" class="inline-flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-btn hover:bg-cream hover:text-primary transition-all duration-200 {{ request()->routeIs('impact') ? 'text-primary bg-cream' : 'text-charcoal' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                            Our Impact
                        </a>
                        <a href="{{ route('events') }}" class="inline-flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-btn hover:bg-cream hover:text-primary transition-all duration-200 {{ request()->routeIs('events') ? 'text-primary bg-cream' : 'text-charcoal' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Events & AgunkeFest
                        </a>
                    </div>
                    <div class="mx-4 my-2 border-t border-gray-100"></div>
                    <div class="flex flex-col space-y-0.5">
                        <a href="{{ route('gallery') }}" class="inline-flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-btn hover:bg-cream hover:text-primary transition-all duration-200 {{ request()->routeIs('gallery') ? 'text-primary bg-cream' : 'text-charcoal' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Gallery
                        </a>
                        <a href="{{ route('blog') }}" class="inline-flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-btn hover:bg-cream hover:text-primary transition-all duration-200 {{ request()->routeIs('blog') ? 'text-primary bg-cream' : 'text-charcoal' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            Blog
                        </a>
                        <a href="{{ route('partners') }}" class="inline-flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-btn hover:bg-cream hover:text-primary transition-all duration-200 {{ request()->routeIs('partners') ? 'text-primary bg-cream' : 'text-charcoal' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            Partners
                        </a>
                        <a href="{{ route('corporate-partnerships') }}" class="inline-flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-btn hover:bg-cream hover:text-primary transition-all duration-200 {{ request()->routeIs('corporate-partnerships') ? 'text-primary bg-cream' : 'text-charcoal' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Corporate Partnerships
                        </a>
                        <a href="{{ route('strategic-pillars') }}" class="inline-flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-btn hover:bg-cream hover:text-primary transition-all duration-200 {{ request()->routeIs('strategic-pillars') ? 'text-primary bg-cream' : 'text-charcoal' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            Strategic Pillars
                        </a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-btn hover:bg-cream hover:text-primary transition-all duration-200 {{ request()->routeIs('contact') ? 'text-primary bg-cream' : 'text-charcoal' }}">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Contact
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Skip to main content -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[100] focus:bg-primary focus:text-white focus:px-4 focus:py-2 focus:rounded-btn">
        Skip to main content
    </a>

    <!-- Main Content -->
    <main id="main-content" class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-forest-deeper text-white">
        <!-- Top Accent Bar -->
        <div class="h-1.5 bg-gradient-to-r from-primary via-palm to-primary"></div>

        <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- Brand -->
                <div>
                    <div class="mb-6 inline-flex rounded-card border border-white/20 bg-white px-4 py-3 shadow-card">
                        <img src="{{ asset('africoco-logo.png') }}" alt="AFRICOCO" class="h-16 w-auto max-w-[220px] object-contain">
                    </div>
                    <p class="text-white/60 text-sm leading-relaxed">
                        AFRICOCO is a non-governmental organization driving sustainable development across Africa through the coconut ecosystem — promoting enterprise, environmental sustainability, heritage tourism, education, innovation, strategic partnerships, and community empowerment.
                    </p>
                    <!-- Social Icons -->
                    <div class="flex items-center gap-3 mt-6">
                        <a href="https://www.facebook.com/AfricocoNg" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-btn bg-white/5 hover:bg-palm/20 border border-white/10 hover:border-palm/30 flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 group" aria-label="Facebook">
                            <svg class="w-4 h-4 text-white/50 group-hover:text-palm transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://x.com/africocoNg" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-btn bg-white/5 hover:bg-palm/20 border border-white/10 hover:border-palm/30 flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 group" aria-label="X">
                            <svg class="w-4 h-4 text-white/50 group-hover:text-palm transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="https://www.instagram.com/africocong/" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-btn bg-white/5 hover:bg-palm/20 border border-white/10 hover:border-palm/30 flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 group" aria-label="Instagram">
                            <svg class="w-4 h-4 text-white/50 group-hover:text-palm transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="https://www.youtube.com/@africoco_ng" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-btn bg-white/5 hover:bg-palm/20 border border-white/10 hover:border-palm/30 flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 group" aria-label="YouTube">
                            <svg class="w-4 h-4 text-white/50 group-hover:text-palm transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.016 3.016 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- About -->
                <div>
                    <h4 class="font-heading font-semibold text-lg mb-4 text-white flex items-center gap-2">
                        <span class="w-1 h-5 bg-palm rounded-full"></span>
                        About
                    </h4>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="{{ route('about') }}" class="group inline-flex items-center gap-2 text-white/60 hover:text-palm transition-all duration-300 text-sm">
                                <svg class="w-3.5 h-3.5 text-palm/0 group-hover:text-palm transition-all duration-300 -ml-5 group-hover:ml-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('strategic-pillars') }}" class="group inline-flex items-center gap-2 text-white/60 hover:text-palm transition-all duration-300 text-sm">
                                <svg class="w-3.5 h-3.5 text-palm/0 group-hover:text-palm transition-all duration-300 -ml-5 group-hover:ml-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Strategic Pillars
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('impact') }}" class="group inline-flex items-center gap-2 text-white/60 hover:text-palm transition-all duration-300 text-sm">
                                <svg class="w-3.5 h-3.5 text-palm/0 group-hover:text-palm transition-all duration-300 -ml-5 group-hover:ml-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Our Impact
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('programs') }}" class="group inline-flex items-center gap-2 text-white/60 hover:text-palm transition-all duration-300 text-sm">
                                <svg class="w-3.5 h-3.5 text-palm/0 group-hover:text-palm transition-all duration-300 -ml-5 group-hover:ml-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Programs
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('events') }}" class="group inline-flex items-center gap-2 text-white/60 hover:text-palm transition-all duration-300 text-sm">
                                <svg class="w-3.5 h-3.5 text-palm/0 group-hover:text-palm transition-all duration-300 -ml-5 group-hover:ml-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Events & AgunkeFest
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Connect -->
                <div>
                    <h4 class="font-heading font-semibold text-lg mb-4 text-white flex items-center gap-2">
                        <span class="w-1 h-5 bg-palm rounded-full"></span>
                        Connect
                    </h4>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="{{ route('corporate-partnerships') }}" class="group inline-flex items-center gap-2 text-white/60 hover:text-palm transition-all duration-300 text-sm">
                                <svg class="w-3.5 h-3.5 text-palm/0 group-hover:text-palm transition-all duration-300 -ml-5 group-hover:ml-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Corporate Partnerships
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('partners') }}" class="group inline-flex items-center gap-2 text-white/60 hover:text-palm transition-all duration-300 text-sm">
                                <svg class="w-3.5 h-3.5 text-palm/0 group-hover:text-palm transition-all duration-300 -ml-5 group-hover:ml-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Our Partners
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}" class="group inline-flex items-center gap-2 text-white/60 hover:text-palm transition-all duration-300 text-sm">
                                <svg class="w-3.5 h-3.5 text-palm/0 group-hover:text-palm transition-all duration-300 -ml-5 group-hover:ml-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                News & Blog
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gallery') }}" class="group inline-flex items-center gap-2 text-white/60 hover:text-palm transition-all duration-300 text-sm">
                                <svg class="w-3.5 h-3.5 text-palm/0 group-hover:text-palm transition-all duration-300 -ml-5 group-hover:ml-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Gallery
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="group inline-flex items-center gap-2 text-white/60 hover:text-palm transition-all duration-300 text-sm">
                                <svg class="w-3.5 h-3.5 text-palm/0 group-hover:text-palm transition-all duration-300 -ml-5 group-hover:ml-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact & Newsletter -->
                <div>
                    <h4 class="font-heading font-semibold text-lg mb-4 text-white flex items-center gap-2">
                        <span class="w-1 h-5 bg-palm rounded-full"></span>
                        Contact
                    </h4>
                    <ul class="space-y-3 text-sm text-white/60 mb-6">
                        <li class="flex items-start gap-3 group">
                            <span class="w-8 h-8 rounded-btn bg-white/5 flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:bg-palm/20">
                                <svg class="w-4 h-4 text-palm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </span>
                            <span class="pt-1.5">Badagry, Lagos State, Nigeria</span>
                        </li>
                        <li class="flex items-start gap-3 group">
                            <span class="w-8 h-8 rounded-btn bg-white/5 flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:bg-palm/20">
                                <svg class="w-4 h-4 text-palm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </span>
                            <a href="mailto:info@africoco.ng" class="pt-1.5 hover:text-palm transition-all duration-300">info@africoco.ng</a>
                        </li>
                        <li class="flex items-start gap-3 group">
                            <span class="w-8 h-8 rounded-btn bg-white/5 flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:bg-palm/20">
                                <svg class="w-4 h-4 text-palm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </span>
                            <a href="tel:+2348033669496" class="pt-1.5 hover:text-palm transition-all duration-300">+234 803 366 9496</a>
                        </li>
                    </ul>
                    <p class="text-white/60 text-sm mb-3">Stay updated with our newsletter.</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex gap-2 group">
                        @csrf
                        <input type="email" name="email" placeholder="Your email" required class="flex-1 min-w-0 px-3 py-2.5 bg-white/10 border border-white/20 rounded-input text-white placeholder-white/40 text-sm focus:outline-none focus:border-palm focus:ring-1 focus:ring-palm/30 transition-all duration-300">
                        <button type="submit" class="px-4 py-2.5 bg-palm text-forest font-heading font-semibold text-sm rounded-btn hover:bg-palm/90 transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 flex-shrink-0 shadow-lg shadow-palm/20">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-white/40 text-sm">&copy; {{ date('Y') }} AFRICOCO. All rights reserved.</p>
                <div class="flex items-center space-x-6">
                    <a href="#" class="text-white/40 hover:text-palm transition-all duration-300 text-sm relative group">
                        Privacy Policy
                        <span class="absolute -bottom-0.5 left-0 right-0 h-px bg-palm scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                    <a href="#" class="text-white/40 hover:text-palm transition-all duration-300 text-sm relative group">
                        Terms of Service
                        <span class="absolute -bottom-0.5 left-0 right-0 h-px bg-palm scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                    <a href="#" class="text-white/40 hover:text-palm transition-all duration-300 text-sm relative group">
                        Accessibility
                        <span class="absolute -bottom-0.5 left-0 right-0 h-px bg-palm scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <style>
        [x-cloak] { display: none !important; }
    </style>

    @stack('scripts')
</body>
</html>
