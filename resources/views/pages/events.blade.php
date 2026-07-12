@extends('layouts.public')

@section('title', 'Events & Programmes')
@section('meta_description', 'Explore AFRICOCO events including the annual AgunkeFest International Coconut Heritage Festival in Badagry — our flagship programme celebrating Africa\'s coconut heritage.')

@section('content')
<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-cream text-sm font-medium mb-6">Events & Programmes</span>
        <h1 class="font-heading font-bold text-4xl md:text-5xl lg:text-6xl text-white mb-6 leading-tight">
            Events &amp; Gatherings<br>
            <span class="text-palm">Celebrating Africa's Coconut Heritage</span>
        </h1>
        <p class="text-lg text-cream/90 max-w-3xl mx-auto">From our flagship AgunkeFest festival to community events, exhibitions, and forums — we bring together stakeholders across Africa's coconut ecosystem.</p>
    </div>
</section>

<!-- Events Grid -->
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        @if($events->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
            <div class="group bg-white rounded-card overflow-hidden shadow-card hover:shadow-lg transition-all">
                @if($event->banner)
                <div class="overflow-hidden">
                    <img src="{{ $event->banner }}" alt="{{ $event->title }}" class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                @else
                <div class="w-full h-52 bg-gradient-to-br from-primary/10 to-forest/10 flex items-center justify-center">
                    <svg class="w-16 h-16 text-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="inline-block px-3 py-1 text-xs font-medium rounded-full 
                            @if($event->status == 'upcoming') bg-palm/10 text-palm
                            @elseif($event->status == 'ongoing') bg-primary/10 text-primary
                            @else bg-gray-200 text-slate @endif">
                            {{ ucfirst($event->status) }}
                        </span>
                        @if($event->registration_fee)
                        <span class="text-sm font-semibold text-forest">₦{{ number_format($event->registration_fee) }}</span>
                        @endif
                    </div>
                    <h3 class="font-heading font-bold text-lg text-charcoal mb-2 group-hover:text-primary transition-colors">
                        <a href="{{ route('events.show', $event) }}">{{ $event->title }}</a>
                    </h3>
                    <div class="flex items-center text-sm text-slate space-x-3 mb-3">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ $event->start_date->format('M d, Y') }}
                            @if($event->end_date) - {{ $event->end_date->format('M d, Y') }} @endif
                        </span>
                    </div>
                    @if($event->venue)
                    <p class="text-sm text-slate flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ $event->venue }}
                    </p>
                    @endif
                    <p class="text-slate text-sm mt-3 line-clamp-2">{{ $event->description }}</p>
                    <a href="{{ route('events.show', $event) }}" class="mt-4 inline-flex items-center text-primary text-sm font-semibold hover:text-forest transition-colors">
                        Event Details
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <div class="w-20 h-20 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="text-xl font-heading font-bold text-charcoal mb-2">No Events Currently Scheduled</h3>
            <p class="text-slate">Check back soon for updates on AgunkeFest and our other programmes and events.</p>
        </div>
        @endif
    </div>
</section>

<!-- AgunkeFest Feature -->
<section class="py-8 md:py-12 lg:py-16 bg-gradient-to-br from-forest/5 to-primary/5">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-content mx-auto text-center">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Flagship Programme</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mb-4">AgunkeFest — International Coconut Heritage Festival</h2>
            <p class="text-slate text-lg max-w-3xl mx-auto leading-relaxed">AgunkeFest is AFRICOCO's flagship programme — a vibrant celebration of Africa's coconut heritage featuring exhibitions, business forums, cultural performances, awards, and community engagement. Held annually in Badagry, it brings together farmers, investors, policymakers, and cultural stakeholders from across the continent.</p>
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 bg-primary hover:bg-forest text-white font-heading font-semibold rounded-btn transition-all">
                    Register Interest
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ route('about') }}" class="inline-flex items-center px-8 py-3 border-2 border-primary text-primary hover:bg-primary hover:text-white font-heading font-semibold rounded-btn transition-all">
                    Learn About AFRICOCO
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-8 md:py-12 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mb-6">Be Part of the Celebration</h2>
        <p class="text-slate text-lg max-w-2xl mx-auto mb-10">Whether as a participant, exhibitor, sponsor, or partner — join us in celebrating and advancing Africa's coconut heritage.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center px-10 py-4 bg-primary text-white font-heading font-semibold rounded-btn hover:bg-forest transition-all shadow-lg">
            Get In Touch
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>
@endsection