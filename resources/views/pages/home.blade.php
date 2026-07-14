@extends('layouts.public')

@section('title', 'Home')
@section('meta_description', 'AFRICOCO - Africa\'s leading organization advancing sustainable development through the coconut ecosystem. Preserving Africa\'s Coconut Heritage. Growing Opportunities for Generations.')

@section('content')
<!-- ===== 1. Hero Section ===== -->
<section class="relative min-h-screen flex items-center overflow-hidden"
         x-data="{ loaded: false }"
         x-init="setTimeout(() => loaded = true, 100)">
    <!-- Dark gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>

    <!-- Decorative blurred orbs for depth -->
    <div class="absolute top-1/4 -left-32 w-96 h-96 bg-palm/10 rounded-full blur-3xl opacity-40 z-10"></div>
    <div class="absolute bottom-1/4 -right-32 w-80 h-80 bg-primary/15 rounded-full blur-3xl opacity-30 z-10"></div>
    <div class="absolute top-1/3 right-1/4 w-48 h-48 bg-white/5 rounded-full blur-2xl z-10"></div>

    @php $hero = $sections->get('hero'); @endphp
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ $hero?->image_url ?? asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <!-- Subtle pattern overlay on background -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.02)_0%,transparent_70%)] z-10"></div>

    @php $videoId = 'IOpEYzViq10'; @endphp
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left Column: Text Content -->
            <div>
                <div :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                     class="transition-all duration-700 ease-out">
                    <h1 class="font-heading font-bold text-3xl md:text-4xl lg:text-5xl text-white leading-tight mb-4">
                        Preserving Africa's Coconut Heritage.<br>
                        <span class="text-palm">Growing Opportunities for Generations.</span>
                    </h1>
                </div>
                <div :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                     class="transition-all duration-700 delay-[200ms] ease-out">
                    <p class="text-lg md:text-xl text-cream/90 leading-relaxed mb-10 max-w-2xl">
                        Africa's leading organization driving sustainable development through the coconut ecosystem — promoting enterprise, environmental sustainability, heritage tourism, education, and community empowerment.
                    </p>
                </div>
                <div :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                     class="transition-all duration-700 delay-[400ms] ease-out">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('programs') }}" class="group inline-flex items-center justify-center px-8 py-4 bg-primary hover:bg-primary-light text-white font-heading font-semibold rounded-btn transition-all duration-300 shadow-hero hover:shadow-2xl hover:-translate-y-0.5 active:translate-y-0">
                            Explore Our Programmes
                            <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ route('contact') }}" class="group inline-flex items-center justify-center px-8 py-4 bg-white/15 backdrop-blur-sm hover:bg-white/25 text-white font-heading font-semibold rounded-btn transition-all duration-300 border border-white/30 hover:border-white/50 hover:-translate-y-0.5 active:translate-y-0">
                            Partner With AFRICOCO
                            <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Trust/Stats indicator -->
                <div :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                     class="transition-all duration-700 delay-[600ms] ease-out mt-12 flex items-center gap-8">
                    <div class="flex items-center gap-2">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full bg-palm/30 ring-2 ring-white/20 flex items-center justify-center text-xs font-bold text-palm">50K</div>
                            <div class="w-8 h-8 rounded-full bg-primary/30 ring-2 ring-white/20 flex items-center justify-center text-xs font-bold text-white">100+</div>
                            <div class="w-8 h-8 rounded-full bg-gold/30 ring-2 ring-white/20 flex items-center justify-center text-xs font-bold text-gold">2K</div>
                        </div>
                    </div>
                    <div class="text-white/60 text-xs md:text-sm leading-tight">
                        <span class="text-white font-semibold">50,000+</span> trees planted<br>
                        <span class="text-white font-semibold">100+</span> communities reached
                    </div>
                </div>
            </div>

            <!-- Right Column: YouTube Video -->
            <div :class="loaded ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                 class="transition-all duration-[800ms] delay-[300ms] ease-out">
                <div class="relative">
                    <div class="absolute -inset-4 bg-primary/20 rounded-2xl blur-2xl opacity-60"></div>
                    <div class="absolute -inset-2 bg-gradient-to-br from-palm/30 to-primary/30 rounded-2xl blur-xl opacity-40"></div>
                    <div class="group relative rounded-2xl overflow-hidden shadow-2xl ring-1 ring-white/20 bg-black/60 backdrop-blur-sm">
                        <div class="aspect-video">
                            <iframe src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=0&rel=0&modestbranding=1" title="AFRICOCO - African Coconut Heritage Initiative" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen class="w-full h-full object-cover"></iframe>
                        </div>
                        <!-- Animated play button overlay -->
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none transition-all duration-500 group-hover:opacity-0 group-hover:scale-110">
                            <div class="relative">
                                <div class="absolute inset-0 w-16 h-16 md:w-20 md:h-20 bg-palm/40 rounded-full blur-md animate-pulse"></div>
                                <div class="w-16 h-16 md:w-20 md:h-20 bg-palm/90 rounded-full flex items-center justify-center shadow-lg ring-4 ring-white/30 backdrop-blur-sm relative">
                                    <svg class="w-7 h-7 md:w-9 md:h-9 text-forest ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-black/50 to-transparent pointer-events-none"></div>
                    </div>
                    <p class="mt-3 text-center text-cream/60 text-xs md:text-sm font-medium tracking-wide">Watch: AFRICOCO — Preserving Africa's Coconut Heritage</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Animated scroll-down indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-2"
         x-show="loaded"
         x-transition:enter="transition ease-out duration-700 delay-[1000ms]"
         x-transition:enter-start="opacity-0 translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0">
        <span class="text-white/40 text-xs font-medium tracking-widest uppercase">Scroll</span>
        <div class="w-6 h-10 rounded-full border-2 border-white/20 flex items-start justify-center pt-2">
            <div class="w-1 h-2.5 bg-palm rounded-full animate-bounce"></div>
        </div>
    </div>
</section>

@php $about = $sections->get('about_summary'); @endphp
<!-- ===== 2. About AFRICOCO Summary ===== -->
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                @if($about && $about->subtitle)
                <span class="text-primary font-semibold text-sm uppercase tracking-wider">{{ $about->subtitle }}</span>
                @endif
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mt-3 mb-6">
                    {{ $about->title ?? "Africa's Coconut Ecosystem Developer" }}
                </h2>
                <div class="text-slate leading-relaxed space-y-4">
                    {!! $about ? str($about->body)->markdown() : '<p>AFRICOCO is a non-governmental organization driving sustainable development across Africa through the coconut ecosystem by promoting enterprise development, environmental sustainability, heritage tourism, education, innovation, strategic partnerships, and community empowerment.</p>' !!}
                </div>
                @if($about && $about->button_text)
                <a href="{{ $about->button_link ?? route('about') }}" class="inline-flex items-center text-primary font-semibold hover:text-forest transition-colors mt-6">
                    {{ $about->button_text }}
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                @endif
            </div>
            <div class="relative">
                <div class="rounded-card overflow-hidden shadow-card">
                    <img src="{{ $about?->image_url ?? asset('images/homepage-hero-africoco-event.jpg') }}" alt="Coconut plantation" class="w-full h-96 object-cover">
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white rounded-card p-6 shadow-card hidden md:block">
                    <div class="text-3xl font-heading font-bold text-primary">{{ $stats[0]['value'] }}</div>
                    <p class="text-slate text-sm">{{ $stats[0]['label'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@php $mission = $sections->get('mission'); $vision = $sections->get('vision'); @endphp
<!-- ===== 3. Mission & Vision ===== -->
<section class="relative py-10 md:py-14 lg:py-20 overflow-hidden bg-forest-deeper text-white [&_.mission-vision-heading-copy>p]:!text-cream/75"
         x-data="{ loaded: false }"
         x-init="setTimeout(() => loaded = true, 200)">
    <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(255,255,255,0.08)_1px,transparent_1px)] bg-[length:42px_42px] opacity-20"></div>
    <div class="absolute -top-28 right-8 h-72 w-72 rounded-full bg-palm/15 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 h-64 w-64 -translate-x-1/3 translate-y-1/3 rounded-full bg-gold/20 blur-3xl"></div>

    <div class="relative z-10 max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[0.86fr_1.14fr] gap-10 lg:gap-14 items-start">
            <div :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                 class="mission-vision-heading-copy transition-all duration-700 ease-out lg:sticky lg:top-28">
            @if($mission || $vision)
            <span class="inline-flex items-center gap-3 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-palm font-semibold text-xs uppercase tracking-wider backdrop-blur-sm">
                <span class="h-2 w-2 rounded-full bg-palm"></span>
                {{ optional($mission)->subtitle ?? optional($vision)->subtitle ?? 'Our Purpose' }}
            </span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl lg:text-5xl leading-tight mt-5 text-white">The purpose behind every AFRICOCO action.</h2>
            <p class="text-slate mt-3 max-w-xl mx-auto text-sm md:text-base">Guided by purpose, driven by impact — our mission and vision define every step we take.</p>
            @endif
                <div class="mt-8 grid grid-cols-2 gap-3 max-w-md">
                    <div class="rounded-card border border-white/10 bg-white/10 p-4 backdrop-blur-sm">
                        <div class="font-heading text-2xl font-bold text-palm">01</div>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-cream/60">Mission</p>
                    </div>
                    <div class="rounded-card border border-white/10 bg-white/10 p-4 backdrop-blur-sm">
                        <div class="font-heading text-2xl font-bold text-gold">02</div>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-cream/60">Vision</p>
                    </div>
                </div>
            </div>

        <div class="relative">
            <div class="absolute left-6 top-8 bottom-8 hidden w-px bg-gradient-to-b from-palm via-white/20 to-gold md:block"></div>
            <div class="space-y-6">
            <!-- Mission Card -->
            <article :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                     class="transition-all duration-700 ease-out group relative overflow-hidden rounded-card border border-white/15 bg-white/[0.96] p-6 md:p-8 text-charcoal shadow-hero">
                <div class="absolute inset-y-0 left-0 w-1.5 bg-primary"></div>
                <div class="absolute -right-16 -top-16 h-40 w-40 rounded-full bg-primary/10 transition-transform duration-500 group-hover:scale-110"></div>

                <div class="relative flex flex-col gap-5 sm:flex-row sm:items-start">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-btn bg-primary text-white shadow-lg shadow-primary/20 ring-8 ring-primary/10">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <div class="mb-2 flex items-center gap-3">
                            <span class="font-heading text-sm font-bold text-primary">01</span>
                            <span class="h-px w-10 bg-primary/25"></span>
                        </div>
                        <h3 class="font-heading font-bold text-2xl md:text-3xl text-charcoal">{{ optional($mission)->title ?? 'Our Mission' }}</h3>
                        <p class="mt-4 text-slate leading-relaxed">{{ optional($mission)->body ?? 'To promote and preserve Africa\'s coconut heritage through advocacy, education, tourism, entrepreneurship, innovation, strategic partnerships, and sustainable value-chain development while empowering communities and future generations.' }}</p>
                    </div>
                </div>
            </article>

            <!-- Vision Card -->
            <article :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                     class="transition-all duration-700 delay-[160ms] ease-out group relative overflow-hidden rounded-card border border-white/15 bg-cream p-6 md:p-8 text-charcoal shadow-hero md:ml-12">
                <div class="absolute inset-y-0 left-0 w-1.5 bg-gold"></div>
                <div class="absolute -right-16 -bottom-16 h-40 w-40 rounded-full bg-gold/15 transition-transform duration-500 group-hover:scale-110"></div>

                <div class="relative flex flex-col gap-5 sm:flex-row sm:items-start">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-btn bg-gold text-white shadow-lg shadow-gold/20 ring-8 ring-gold/10">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <div class="mb-2 flex items-center gap-3">
                            <span class="font-heading text-sm font-bold text-gold">02</span>
                            <span class="h-px w-10 bg-gold/30"></span>
                        </div>
                        <h3 class="font-heading font-bold text-2xl md:text-3xl text-charcoal">{{ optional($vision)->title ?? 'Our Vision' }}</h3>
                        <p class="mt-4 text-slate leading-relaxed">{{ optional($vision)->body ?? 'To build a thriving and globally competitive coconut industry that drives economic prosperity, environmental sustainability, cultural preservation, and inclusive development across Africa.' }}</p>
                    </div>
                </div>
            </article>
            </div>
        </div>
        </div>
    </div>
</section>

<!-- ===== 4. Our Strategic Pillars ===== -->
<section class="relative py-8 md:py-12 lg:py-16 overflow-hidden"
         x-data="{ loaded: false }"
         x-init="setTimeout(() => loaded = true, 300)">
    <!-- Decorative blur orbs -->
    <div class="absolute top-40 -left-32 w-80 h-80 bg-palm/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 -right-32 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
             class="transition-all duration-700 ease-out text-center mb-10">
            <span class="inline-flex items-center gap-2 text-primary font-semibold text-sm uppercase tracking-wider">
                <span class="w-6 h-px bg-primary/40"></span>
                Our Framework
                <span class="w-6 h-px bg-primary/40"></span>
            </span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mt-3">Our Strategic Pillars</h2>
            <p class="text-slate mt-3 max-w-2xl mx-auto text-sm md:text-base">Guided by five strategic pillars, we are transforming the coconut landscape across Africa — driving economic growth, environmental sustainability, cultural preservation, and community empowerment.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($pillars as $pillarIndex => $pillar)
            @php
                $accentColor = match($pillar->color) {
                    'emerald' => '#059669', 'teal' => '#0d9488', 'amber' => '#d97706',
                    'blue' => '#2563eb', 'purple' => '#9333ea', 'rose' => '#e11d48',
                    default => '#059669'
                };
                $gradientFrom = match($pillar->color) {
                    'emerald' => '#047857', 'teal' => '#0f766e', 'amber' => '#b45309',
                    'blue' => '#1d4ed8', 'purple' => '#7e22ce', 'rose' => '#be123c',
                    default => '#047857'
                };
                $gradientTo = match($pillar->color) {
                    'emerald' => '#34d399', 'teal' => '#2dd4bf', 'amber' => '#fbbf24',
                    'blue' => '#60a5fa', 'purple' => '#a78bfa', 'rose' => '#fb7185',
                    default => '#34d399'
                };
                $delay = $pillarIndex * 100;
            @endphp
            <div :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                 class="transition-all duration-700 delay-[{{ $delay }}ms] ease-out group relative bg-white rounded-card p-8 shadow-card hover:shadow-xl border border-gray-200/50 hover:border-gray-300/80 overflow-hidden">
                <!-- Gradient accent bar top -->
                <div class="absolute top-0 left-0 right-0 h-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="background: linear-gradient(90deg, {{ $gradientFrom }}, {{ $gradientTo }}, {{ $gradientFrom }});"></div>
                <!-- Icon container with gradient -->
                <div class="w-14 h-14 rounded-btn flex items-center justify-center mb-5 shadow-md shadow-black/5 group-hover:-translate-y-0.5 transition-all duration-300" style="background: linear-gradient(135deg, {{ $gradientFrom }}15, {{ $gradientTo }}10);">
                    <svg class="w-7 h-7 transition-transform duration-300 group-hover:scale-110" style="color: {{ $accentColor }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @switch($pillar->icon)
                            @case('briefcase')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>@break
                            @case('leaf')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>@break
                            @case('globe')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>@break
                            @case('academic-cap')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>@break
                            @case('handshake')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>@break
                            @default<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>@break
                        @endswitch
                    </svg>
                </div>
                <h3 class="font-heading font-bold text-lg text-charcoal mb-3 transition-colors duration-300 group-hover:opacity-80" style="color: {{ $accentColor }};">{{ $pillar->name }}</h3>
                <p class="text-slate text-sm leading-relaxed mb-4">{{ $pillar->description }}</p>
                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                    <span class="text-xs text-slate/60">{{ $pillar->programs_count ?? 0 }} Programs</span>
                    <a href="{{ route('programs') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold transition-all duration-300 hover:gap-2" style="color: {{ $accentColor }};">
                        View Programs
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
                <!-- Bottom accent dot -->
                <div class="absolute bottom-3 right-3 w-1.5 h-1.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300" style="background-color: {{ $accentColor }};"></div>
            </div>
            @empty
            <!-- Static fallback pillars -->
            <div :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                 class="transition-all duration-700 delay-[0ms] ease-out group relative bg-white rounded-card p-8 shadow-card hover:shadow-xl border border-gray-200/50 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="background: linear-gradient(90deg, #047857, #34d399, #047857);"></div>
                <div class="w-14 h-14 rounded-btn flex items-center justify-center mb-5 shadow-md shadow-black/5 group-hover:-translate-y-0.5 transition-all duration-300" style="background: linear-gradient(135deg, rgba(4,120,87,0.08), rgba(52,211,153,0.06));">
                    <svg class="w-7 h-7 text-emerald-600 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-lg text-emerald-600 mb-3">Coconut Economy & Enterprise Development</h3>
                <p class="text-slate text-sm leading-relaxed mb-4">Driving entrepreneurship, value addition, investment, business development, processing, exports, and employment throughout the coconut value chain.</p>
                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                    <span class="text-xs text-slate/60">0 Programs</span>
                    <a href="{{ route('programs') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600 transition-all duration-300 hover:gap-2">View Programs <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
                </div>
            </div>
            <div :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                 class="transition-all duration-700 delay-[100ms] ease-out group relative bg-white rounded-card p-8 shadow-card hover:shadow-xl border border-gray-200/50 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="background: linear-gradient(90deg, #0f766e, #2dd4bf, #0f766e);"></div>
                <div class="w-14 h-14 rounded-btn flex items-center justify-center mb-5 shadow-md shadow-black/5 group-hover:-translate-y-0.5 transition-all duration-300" style="background: linear-gradient(135deg, rgba(15,118,110,0.08), rgba(45,212,191,0.06));">
                    <svg class="w-7 h-7 text-teal-600 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-lg text-teal-600 mb-3">Sustainability & Climate Resilience</h3>
                <p class="text-slate text-sm leading-relaxed mb-4">Promoting environmental conservation, coconut tree planting, coastal restoration, biodiversity, and sustainable agricultural practices.</p>
                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                    <span class="text-xs text-slate/60">0 Programs</span>
                    <a href="{{ route('programs') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-teal-600 transition-all duration-300 hover:gap-2">View Programs <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
                </div>
            </div>
            <div :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                 class="transition-all duration-700 delay-[200ms] ease-out group relative bg-white rounded-card p-8 shadow-card hover:shadow-xl border border-gray-200/50 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="background: linear-gradient(90deg, #b45309, #fbbf24, #b45309);"></div>
                <div class="w-14 h-14 rounded-btn flex items-center justify-center mb-5 shadow-md shadow-black/5 group-hover:-translate-y-0.5 transition-all duration-300" style="background: linear-gradient(135deg, rgba(180,83,9,0.08), rgba(251,191,36,0.06));">
                    <svg class="w-7 h-7 text-amber-600 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-lg text-amber-600 mb-3">Heritage, Tourism & Culture</h3>
                <p class="text-slate text-sm leading-relaxed mb-4">Celebrating Africa's coconut heritage through tourism, culture, AgunkeFest, heritage trails, and community experiences.</p>
                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                    <span class="text-xs text-slate/60">0 Programs</span>
                    <a href="{{ route('programs') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600 transition-all duration-300 hover:gap-2">View Programs <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
                </div>
            </div>
            @endforelse
        </div>
        @if($pillars->count() > 0)
        <div :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
             class="transition-all duration-700 delay-[500ms] ease-out text-center mt-10">
            <a href="{{ route('programs') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary text-white font-heading font-semibold rounded-btn hover:bg-forest transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0">
                Explore All Programmes
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- ===== 5. AgunkeFest Feature (Flagship Programme) ===== -->
@php $agunkefest = $sections->get('agunkefest'); @endphp
<section class="py-8 md:py-12 lg:py-16 bg-gradient-to-br from-forest to-primary text-white overflow-hidden">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <span class="inline-block px-4 py-2 bg-white/10 text-palm text-sm font-semibold rounded-full">Flagship Programme</span>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                @if($agunkefest && $agunkefest->subtitle)
                <span class="inline-block px-4 py-2 bg-white/10 text-palm text-sm font-semibold rounded-full mb-4">{{ $agunkefest->subtitle }}</span>
                @endif
                <h2 class="font-heading font-bold text-3xl md:text-4xl leading-tight mb-6">
                    {!! optional($agunkefest)->title ?? 'AgunkeFest — <span class="text-palm">Celebrating Africa\'s</span> Coconut Heritage' !!}
                </h2>
                @if($agunkefest && $agunkefest->body)
                <p class="text-cream/90 leading-relaxed mb-6">{{ $agunkefest->body }}</p>
                @else
                <p class="text-cream/90 leading-relaxed mb-6">The annual International Coconut Heritage Festival serves as a platform for bringing together farmers, researchers, investors, government agencies, development partners, cultural stakeholders, entrepreneurs, and the general public.</p>
                @endif
                <div class="flex flex-col sm:flex-row gap-4">
                    @if($agunkefest && $agunkefest->button_text && $agunkefest->button_link)
                    <a href="{{ $agunkefest->button_link }}" class="inline-flex items-center justify-center px-8 py-3 bg-palm text-forest font-heading font-semibold rounded-btn hover:bg-palm/90 transition-all">{{ $agunkefest->button_text }}</a>
                    @else
                    <a href="{{ route('events') }}" class="inline-flex items-center justify-center px-8 py-3 bg-palm text-forest font-heading font-semibold rounded-btn hover:bg-palm/90 transition-all">Learn About AgunkeFest</a>
                    @endif
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-3 border border-white/30 text-white font-heading font-semibold rounded-btn hover:bg-white/10 transition-all">Get Involved</a>
                </div>
            </div>
            <div class="relative">
                <div class="rounded-card overflow-hidden shadow-hero">
                    <img src="{{ $agunkefest?->image_url ?? asset('images/homepage-hero-africoco-event.jpg') }}" alt="Festival celebration" class="w-full h-96 object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== 6. AFRICOCO Impact 365 ===== -->
<section class="py-8 md:py-12 lg:py-16 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-primary font-semibold text-sm uppercase tracking-wider">Year-Round Impact</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mt-3">AFRICOCO Impact 365</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">Creating impact throughout the year — every month, a new initiative driving change across Africa's coconut ecosystem.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @php $months = [
                ['01', 'Jan', 'Coconut Tree Planting Month', 'leaf', '#059669'],
                ['02', 'Feb', 'Youth Agribusiness Bootcamp', 'academic-cap', '#2563eb'],
                ['03', 'Mar', 'Women in Coconut Enterprise', 'user-group', '#d97706'],
                ['04', 'Apr', 'Schools Coconut Awareness', 'book-open', '#9333ea'],
                ['05', 'May', 'Innovation Challenge', 'light-bulb', '#0d9488'],
                ['06', 'Jun', 'Community Outreach', 'heart', '#e11d48'],
                ['07', 'Jul', 'Tourism Promotion', 'globe', '#0891b2'],
                ['08', 'Aug', 'Research Summit', 'chart-bar', '#7c3aed'],
                ['09', 'Sep', 'Investment Forum', 'briefcase', '#059669'],
                ['10', 'Oct', 'Green Communities', 'sparkles', '#d97706'],
                ['11', 'Nov', 'AgunkeFest Countdown', 'calendar', '#2563eb'],
                ['12', 'Dec', 'AgunkeFest & Annual Impact Report', 'star', '#e11d48'],
            ]; @endphp
            @foreach($months as $month)
            <div class="group relative bg-cream rounded-card p-4 md:p-5 shadow-sm hover:shadow-md transition-all border border-beige/30 text-center cursor-default">
                <div class="text-xs font-bold text-primary/60 mb-1">{{ $month[0] }}</div>
                <div class="text-lg font-heading font-bold text-charcoal mb-1">{{ $month[1] }}</div>
                <p class="text-xs text-slate leading-tight">{{ $month[2] }}</p>
                <!-- Hover accent -->
                <div class="absolute bottom-0 left-0 right-0 h-0.5 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300" style="background-color: {{ $month[4] }}"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ===== 7. Impact Statistics ===== -->
<section class="py-8 md:py-12 lg:py-16 bg-gradient-to-br from-forest to-primary text-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-white/10 text-palm text-sm font-semibold rounded-full">Our Impact</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl mt-4 mb-4">Measuring What Matters</h2>
            <p class="text-cream/90 max-w-2xl mx-auto">Together with our partners, we are growing opportunities and creating lasting change across Africa.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($stats as $stat)
            <div class="text-center p-4 md:p-6 bg-white/5 backdrop-blur-sm rounded-card border border-white/10 hover:bg-white/10 transition-all">
                <div class="text-3xl md:text-4xl font-heading font-bold text-palm mb-2">{{ $stat['value'] }}</div>
                <div class="text-cream/80 text-sm font-medium">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ===== 8. Current Funding Opportunities ===== -->
@if($featuredProjects->count() > 0)
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-12">
            <div>
                <span class="text-primary font-semibold text-sm uppercase tracking-wider">Support Our Work</span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mt-3">Current Funding Opportunities</h2>
                <p class="text-slate mt-4 max-w-2xl">Projects seeking sponsors and partners to create impact.</p>
            </div>
            <a href="{{ route('projects') }}" class="mt-4 sm:mt-0 inline-flex items-center px-6 py-3 bg-primary text-white font-heading font-semibold rounded-btn hover:bg-forest transition-all shadow-md">
                View All Projects
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredProjects as $project)
            <div class="bg-white rounded-card overflow-hidden shadow-card hover:shadow-lg transition-all border border-gray-200/50">
                @if($project->featured_image_url)
                <div class="overflow-hidden">
                    <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}" class="w-full h-44 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                @else
                <div class="w-full h-44 bg-gradient-to-br from-primary/10 to-forest/10 flex items-center justify-center">
                    <svg class="w-12 h-12 text-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="font-heading font-bold text-lg text-charcoal mb-3">{{ $project->title }}</h3>
                    <p class="text-slate text-sm leading-relaxed mb-4">{{ $project->excerpt }}</p>
                    @if($project->budget && $project->budget > 0)
                    <div class="mb-4">
                        <div class="flex justify-between text-xs text-slate mb-1">
                            <span>Funding Progress</span>
                            <span class="font-semibold">{{ $project->funding_progress }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-primary rounded-full h-2 transition-all" style="width: {{ $project->funding_progress }}%"></div>
                        </div>
                        <div class="flex justify-between text-xs text-slate mt-1">
                            <span>₦{{ number_format($project->amount_raised) }} raised</span>
                            <span>Target: ₦{{ number_format($project->budget) }}</span>
                        </div>
                    </div>
                    @endif
                    <a href="{{ route('contact', ['subject' => 'Sponsor: ' . $project->title]) }}" class="inline-flex items-center px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-btn hover:bg-forest transition-all">
                        Sponsor This Project
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ===== 9. Featured Partners ===== -->
@if($partners->count() > 0)
<section class="py-8 md:py-12 lg:py-16 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary font-semibold text-sm uppercase tracking-wider">Our Partners</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mt-3">Trusted By</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">Government agencies, NGOs, corporations, international organizations, universities, and financial institutions committed to Africa's coconut ecosystem.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center">
            @foreach($partners as $partner)
            <div class="flex items-center justify-center p-6 grayscale hover:grayscale-0 transition-all">
                @if($partner->logo_url)
                <img src="{{ $partner->logo_url }}" alt="{{ $partner->organization_name }}" class="max-h-16">
                @else
                <span class="text-slate font-semibold text-sm text-center">{{ $partner->organization_name }}</span>
                @endif
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('partners') }}" class="text-primary font-semibold hover:text-forest transition-colors inline-flex items-center">
                View All Partners & Sponsors
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- ===== 10. Latest News ===== -->
@if($posts->count() > 0)
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-12">
            <div>
                <span class="text-primary font-semibold text-sm uppercase tracking-wider">News & Updates</span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mt-3">Latest From AFRICOCO</h2>
            </div>
            <a href="{{ route('blog') }}" class="mt-4 sm:mt-0 text-primary font-semibold hover:text-forest transition-colors inline-flex items-center">
                View All Posts
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article class="bg-white rounded-card overflow-hidden shadow-card hover:shadow-lg transition-all group">
                <div class="overflow-hidden">
                    <img src="{{ $post->featured_image_url ?? asset('images/homepage-hero-africoco-event.jpg') }}" alt="{{ $post->title }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    @if($post->category)
                    <span class="inline-block px-3 py-1 bg-primary/5 text-primary text-xs font-medium rounded-full mb-3">{{ $post->category->name }}</span>
                    @endif
                    <h3 class="font-heading font-bold text-lg text-charcoal mb-2 group-hover:text-primary transition-colors">
                        <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                    </h3>
                    <p class="text-slate text-sm leading-relaxed">{{ $post->excerpt }}</p>
                    <div class="mt-4 flex items-center text-xs text-slate">
                        <span>{{ $post->published_at?->format('M d, Y') }}</span>
                        @if($post->author)
                        <span class="mx-2">·</span>
                        <span>{{ $post->author }}</span>
                        @endif
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ===== 11. Gallery Preview ===== -->
@if($gallery->count() > 0)
<section class="py-8 md:py-12 lg:py-16 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-12">
            <div>
                <span class="text-primary font-semibold text-sm uppercase tracking-wider">Gallery</span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mt-3">Moments That Matter</h2>
            </div>
            <a href="{{ route('gallery') }}" class="mt-4 sm:mt-0 text-primary font-semibold hover:text-forest transition-colors inline-flex items-center">
                View Full Gallery
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($gallery as $item)
            <div class="group relative rounded-card overflow-hidden shadow-card {{ $loop->first ? 'col-span-2 row-span-2' : '' }}">
                <img src="{{ $item->image_url ?? asset('images/homepage-hero-africoco-event.jpg') }}" alt="{{ $item->title }}" class="w-full h-48 md:h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                    <span class="text-white text-sm font-medium">{{ $item->title }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@php $volunteer = $sections->get('volunteer_cta'); @endphp
<!-- ===== 12. Partnership CTA ===== -->
<section class="py-8 md:py-12 lg:py-16 bg-gradient-to-br from-forest to-primary text-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl mb-6">Partner With AFRICOCO</h2>
        <p class="text-cream/90 text-lg max-w-2xl mx-auto mb-10 leading-relaxed">
            Work with us to preserve Africa's coconut heritage, empower communities, promote sustainable agriculture, and create opportunities for future generations.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('corporate-partnerships') }}" class="inline-flex items-center justify-center px-10 py-4 bg-palm text-forest font-heading font-semibold rounded-btn hover:bg-palm/90 transition-all shadow-lg text-lg">Become a Partner</a>
            @if($volunteer && $volunteer->button_text && $volunteer->button_link)
            <a href="{{ $volunteer->button_link }}" class="inline-flex items-center justify-center px-10 py-4 bg-white/10 text-white font-heading font-semibold rounded-btn hover:bg-white/20 transition-all border border-white/30 text-lg">{{ $volunteer->button_text }}</a>
            @else
            <a href="{{ route('volunteer') }}" class="inline-flex items-center justify-center px-10 py-4 bg-white/10 text-white font-heading font-semibold rounded-btn hover:bg-white/20 transition-all border border-white/30 text-lg">Become a Volunteer</a>
            @endif
        </div>
    </div>
</section>

@endsection
