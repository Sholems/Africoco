@extends('layouts.public')

@section('title', 'Our Programmes & Initiatives')
@section('meta_description', 'Explore AFRICOCO\'s programmes and initiatives organized across five strategic pillars: Coconut Economy, Sustainability, Heritage Tourism, Education & Empowerment, and Partnerships.')

@section('content')
<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-cream text-sm font-medium mb-6">Our Programmes</span>
        <h1 class="font-heading font-bold text-4xl md:text-5xl lg:text-6xl text-white mb-6 leading-tight">
            Programmes & Initiatives<br>
            <span class="text-palm">Across Five Strategic Pillars</span>
        </h1>
        <p class="text-lg text-cream/90 max-w-3xl mx-auto">Through strategic initiatives across coconut economy, sustainability, heritage tourism, education, and partnerships — we are transforming Africa's coconut landscape year-round.</p>
    </div>
</section>

@forelse($pillars as $pillar)
@php
    $accentColors = [
        'emerald' => ['hex' => '#059669', 'bg' => 'rgba(5,150,105,0.08)', 'light' => '#d1fae5'],
        'teal' => ['hex' => '#0d9488', 'bg' => 'rgba(13,148,136,0.08)', 'light' => '#ccfbf1'],
        'amber' => ['hex' => '#d97706', 'bg' => 'rgba(217,119,6,0.08)', 'light' => '#fef3c7'],
        'blue' => ['hex' => '#2563eb', 'bg' => 'rgba(37,99,235,0.08)', 'light' => '#dbeafe'],
        'purple' => ['hex' => '#7c3aed', 'bg' => 'rgba(124,58,237,0.08)', 'light' => '#ede9fe'],
        'rose' => ['hex' => '#e11d48', 'bg' => 'rgba(225,29,72,0.08)', 'light' => '#ffe4e6'],
        'primary' => ['hex' => '#2d6a4f', 'bg' => 'rgba(45,106,79,0.08)', 'light' => '#d1fae5'],
        'palm' => ['hex' => '#d4a373', 'bg' => 'rgba(212,163,115,0.08)', 'light' => '#fef3c7'],
    ];
    $colors = $accentColors[$pillar->color] ?? ['hex' => '#2d6a4f', 'bg' => 'rgba(45,106,79,0.08)', 'light' => '#d1fae5'];
@endphp
<section class="py-8 md:py-12 {{ $loop->even ? 'bg-white' : '' }}">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Pillar Header -->
        <div class="flex items-center gap-4 mb-8 pb-6 border-b" style="border-color: {{ $colors['light'] }};">
            <div class="w-12 h-12 rounded-btn flex items-center justify-center flex-shrink-0" style="background-color: {{ $colors['bg'] }};">
                @if($pillar->icon)
                <img src="{{ $pillar->icon }}" alt="{{ $pillar->name }}" class="w-6 h-6">
                @else
                <svg class="w-6 h-6" style="color: {{ $colors['hex'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                @endif
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-3">
                    <h2 class="font-heading font-bold text-2xl md:text-3xl text-charcoal">{{ $pillar->name }}</h2>
                    @if($pillar->programs->count() > 0)
                    <span class="text-xs font-medium px-2.5 py-1 rounded-full" style="background-color: {{ $colors['bg'] }}; color: {{ $colors['hex'] }};">
                        {{ $pillar->programs->count() }} programme{{ $pillar->programs->count() != 1 ? 's' : '' }}
                    </span>
                    @endif
                </div>
                @if($pillar->description)
                <p class="text-slate text-sm mt-1">{{ $pillar->description }}</p>
                @endif
            </div>
        </div>

        <!-- Programs Grid -->
        @if($pillar->programs->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($pillar->programs as $program)
            <div class="group bg-white rounded-card overflow-hidden shadow-card hover:shadow-lg transition-all border border-gray-100">
                @if($program->featured_image)
                <div class="overflow-hidden">
                    <img src="{{ $program->featured_image }}" alt="{{ $program->title }}" class="w-full h-44 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                @else
                <div class="w-full h-32 flex items-center justify-center" style="background-color: {{ $colors['bg'] }};">
                    <svg class="w-10 h-10" style="color: {{ $colors['hex'] }}; opacity: 0.3;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                @endif
                <div class="p-6">
                    <span class="inline-block px-2.5 py-1 text-xs font-medium rounded-full" style="background-color: {{ $colors['bg'] }}; color: {{ $colors['hex'] }};">
                        {{ $pillar->name }}
                    </span>
                    <h3 class="font-heading font-bold text-lg mt-3 mb-2" style="color: {{ $colors['hex'] }};">{{ $program->title }}</h3>
                    <p class="text-slate text-sm leading-relaxed">{{ $program->short_description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12 bg-cream/50 rounded-card">
            <p class="text-slate">Programmes under this pillar are being developed. Check back soon.</p>
        </div>
        @endif
    </div>
</section>
@empty
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center py-16">
        <div class="w-20 h-20 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
        </div>
        <h3 class="text-xl font-heading font-bold text-charcoal mb-2">Programmes Coming Soon</h3>
        <p class="text-slate">Our strategic pillars and programmes are being developed. Check back soon for updates.</p>
    </div>
</section>
@endforelse

<!-- CTA -->
<section class="py-8 md:py-12 bg-gradient-to-br from-forest to-primary text-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl mb-6">Want to Get Involved?</h2>
        <p class="text-cream/90 text-lg max-w-2xl mx-auto mb-10">Partner with us to create meaningful impact in Africa's coconut industry.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center px-10 py-4 bg-palm text-forest font-heading font-semibold rounded-btn hover:bg-palm/90 transition-all shadow-lg">
            Partner With AFRICOCO
        </a>
    </div>
</section>
@endsection