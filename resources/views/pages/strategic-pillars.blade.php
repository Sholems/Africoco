@extends('layouts.public')

@section('title', 'Our Strategic Pillars')
@section('meta_description', 'Explore AFRICOCO\'s five strategic pillars: Coconut Economy, Sustainability, Heritage Tourism, Education & Empowerment, and Partnerships guiding our work across Africa.')

@section('content')
<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-cream text-sm font-medium mb-6">Our Framework</span>
        <h1 class="font-heading font-bold text-4xl md:text-5xl lg:text-6xl text-white mb-6 leading-tight">
            Our Strategic Pillars<br>
            <span class="text-palm">Driving Impact Across Africa</span>
        </h1>
        <p class="text-lg text-cream/90 max-w-3xl mx-auto">Our work is organized around five interconnected strategic pillars — each representing a critical dimension of sustainable coconut ecosystem development across Africa.</p>
    </div>
</section>

<!-- Quick Stats -->
<section class="py-10 bg-white border-b border-gray-100">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($stats as $stat)
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-heading font-bold text-primary">{{ $stat['value'] }}</div>
                <div class="text-sm text-slate mt-1">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Pillars Detail -->
@forelse($pillars as $pillar)
@php
    $accentColors = [
        'emerald' => ['hex' => '#059669', 'bg' => 'rgba(5,150,105,0.08)', 'light' => '#d1fae5', 'gradient' => 'from-emerald-500/10'],
        'teal' => ['hex' => '#0d9488', 'bg' => 'rgba(13,148,136,0.08)', 'light' => '#ccfbf1', 'gradient' => 'from-teal-500/10'],
        'amber' => ['hex' => '#d97706', 'bg' => 'rgba(217,119,6,0.08)', 'light' => '#fef3c7', 'gradient' => 'from-amber-500/10'],
        'blue' => ['hex' => '#2563eb', 'bg' => 'rgba(37,99,235,0.08)', 'light' => '#dbeafe', 'gradient' => 'from-blue-500/10'],
        'purple' => ['hex' => '#7c3aed', 'bg' => 'rgba(124,58,237,0.08)', 'light' => '#ede9fe', 'gradient' => 'from-purple-500/10'],
        'rose' => ['hex' => '#e11d48', 'bg' => 'rgba(225,29,72,0.08)', 'light' => '#ffe4e6', 'gradient' => 'from-rose-500/10'],
        'primary' => ['hex' => '#2d6a4f', 'bg' => 'rgba(45,106,79,0.08)', 'light' => '#d1fae5', 'gradient' => 'from-primary/10'],
        'palm' => ['hex' => '#d4a373', 'bg' => 'rgba(212,163,115,0.08)', 'light' => '#fef3c7', 'gradient' => 'from-palm/10'],
    ];
    $c = $accentColors[$pillar->color] ?? $accentColors['primary'];
@endphp
<section class="py-8 md:py-12 {{ $loop->even ? 'bg-white' : '' }}">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-10">
            <!-- Sidebar -->
            <div class="lg:col-span-2">
                <div class="sticky top-28">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-5" style="background-color: {{ $c['bg'] }};">
                        @if($pillar->icon)
                        <img src="{{ $pillar->icon }}" alt="{{ $pillar->name }}" class="w-8 h-8">
                        @else
                        <svg class="w-8 h-8" style="color: {{ $c['hex'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        @endif
                    </div>
                    <h2 class="font-heading font-bold text-2xl md:text-3xl text-charcoal mb-3" style="color: {{ $c['hex'] }};">{{ $pillar->name }}</h2>
                    <p class="text-slate leading-relaxed">{{ $pillar->description }}</p>
                    
                    <!-- Pillar Quick Facts -->
                    <div class="mt-6 space-y-3">
                        <div class="flex items-center gap-3 text-sm">
                            <div class="w-8 h-8 rounded-btn flex items-center justify-center flex-shrink-0" style="background-color: {{ $c['bg'] }};">
                                <svg class="w-4 h-4" style="color: {{ $c['hex'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <span class="text-slate"><strong class="text-charcoal">{{ $pillar->programs_count }}</strong> programme{{ $pillar->programs_count != 1 ? 's' : '' }}</span>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="mt-8 space-y-3">
                        <a href="{{ route('programs') }}" class="inline-flex items-center px-6 py-3 rounded-btn text-white font-heading font-semibold text-sm transition-all hover:opacity-90" style="background-color: {{ $c['hex'] }};">
                            Explore Programmes
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <br>
                        <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 rounded-btn text-sm font-medium transition-all border" style="color: {{ $c['hex'] }}; border-color: {{ $c['hex'] }}20;" class="hover:bg-gray-50">
                            Partner With Us
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-3">
                <!-- Objectives -->
                @if($pillar->programs->count() > 0)
                <div class="mb-10">
                    <h3 class="font-heading font-bold text-xl text-charcoal mb-5 flex items-center gap-2">
                        <svg class="w-5 h-5" style="color: {{ $c['hex'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Programmes Under This Pillar
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($pillar->programs as $program)
                        <div class="bg-white rounded-card p-5 shadow-sm hover:shadow-md transition-all border border-gray-100">
                            <div class="flex items-start gap-3">
                                <div class="w-3 h-3 rounded-full mt-1.5 flex-shrink-0" style="background-color: {{ $c['hex'] }};"></div>
                                <div>
                                    <h4 class="font-heading font-semibold text-charcoal">{{ $program->title }}</h4>
                                    <p class="text-slate text-sm mt-1">{{ $program->short_description }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Impact & Goals -->
                <div class="mb-10">
                    <h3 class="font-heading font-bold text-xl text-charcoal mb-5 flex items-center gap-2">
                        <svg class="w-5 h-5" style="color: {{ $c['hex'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        Our Approach
                    </h3>
                    <div class="bg-cream/50 rounded-card p-6 border border-gray-100">
                        <p class="text-slate leading-relaxed">Under the <strong>{{ $pillar->name }}</strong> pillar, AFRICOCO implements targeted programmes and initiatives designed to create measurable, sustainable impact across Africa's coconut ecosystem. Each programme is developed in partnership with communities, government agencies, development organizations, and private sector stakeholders to ensure alignment with local needs and continental priorities.</p>
                    </div>
                </div>

                <!-- Key Focus Areas -->
                <div>
                    <h3 class="font-heading font-bold text-xl text-charcoal mb-5">Key Focus Areas</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @php $focusAreas = [
                            'Community Engagement', 'Capacity Building', 
                            'Policy Advocacy', 'Research & Innovation',
                            'Partnership Development', 'Knowledge Sharing'
                        ]; @endphp
                        @foreach($focusAreas as $area)
                        <div class="flex items-center gap-3 p-3 rounded-btn transition-colors" style="background-color: {{ $c['bg'] }};">
                            <svg class="w-4 h-4 flex-shrink-0" style="color: {{ $c['hex'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="text-sm text-slate">{{ $area }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@empty
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center py-16">
        <div class="w-20 h-20 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
            <h3 class="text-xl font-heading font-bold text-charcoal mb-2">Strategic Pillars Coming Soon</h3>
            <p class="text-slate">Our strategic framework is being developed. Check back soon.</p>
        </div>
    </div>
</section>
@endforelse

<!-- CTA -->
<section class="py-8 md:py-12 bg-gradient-to-br from-forest to-primary text-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl mb-6">Ready to Make an Impact?</h2>
        <p class="text-cream/90 text-lg max-w-2xl mx-auto mb-10">Whether you want to partner, invest, or learn more — there's a place for you in Africa's coconut ecosystem transformation.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('programs') }}" class="px-8 py-3 bg-palm text-forest font-heading font-semibold rounded-btn hover:bg-palm/90 transition-all shadow-lg">Explore Programmes</a>
            <a href="{{ route('corporate-partnerships') }}" class="px-8 py-3 border-2 border-white/30 text-white hover:bg-white/10 font-heading font-semibold rounded-btn transition-all">Become a Partner</a>
            <a href="{{ route('contact') }}" class="px-8 py-3 border-2 border-palm text-palm hover:bg-palm hover:text-forest font-heading font-semibold rounded-btn transition-all">Contact Us</a>
        </div>
    </div>
</section>
@endsection