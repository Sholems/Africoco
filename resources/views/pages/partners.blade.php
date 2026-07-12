@extends('layouts.public')

@section('title', 'Partners & Sponsors')
@section('meta_description', 'Meet the organizations, partners, and sponsors supporting AFRICOCO\'s mission to preserve Africa\'s coconut heritage.')

@section('content')
<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="font-heading font-bold text-4xl md:text-5xl text-white mb-6">Our Partners & Sponsors</h1>
        <p class="text-lg text-cream/90 max-w-2xl mx-auto">Together with our valued partners, we are advancing Africa's coconut industry.</p>
    </div>
</section>

<!-- Partners Grid -->
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        @if($partners->count() > 0)
        @foreach(['Partner', 'Sponsor', 'Government', 'NGO', 'Corporate', 'Donor'] as $category)
            @php $filtered = $partners->where('category', $category); @endphp
            @if($filtered->count() > 0)
            <div class="mb-16 last:mb-0">
                <h2 class="font-heading font-bold text-2xl text-charcoal mb-8 pb-4 border-b border-gray-200">{{ $category }}s</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 items-center">
                    @foreach($filtered as $partner)
                    <div class="group bg-white rounded-card p-8 shadow-card hover:shadow-lg transition-all text-center">
                        @if($partner->logo)
                        <div class="h-20 flex items-center justify-center mb-4">
                            <img src="{{ $partner->logo }}" alt="{{ $partner->organization_name }}" class="max-h-full grayscale group-hover:grayscale-0 transition-all">
                        </div>
                        @else
                        <div class="h-20 flex items-center justify-center mb-4">
                            <span class="text-charcoal font-heading font-bold text-lg">{{ $partner->organization_name }}</span>
                        </div>
                        @endif
                        <h3 class="text-sm font-semibold text-charcoal">{{ $partner->organization_name }}</h3>
                        @if($partner->description)
                        <p class="text-xs text-slate mt-2">{{ $partner->description }}</p>
                        @endif
                        @if($partner->website)
                        <a href="{{ $partner->website }}" target="_blank" rel="noopener noreferrer" class="mt-3 inline-flex items-center text-xs text-primary hover:text-forest transition-colors">
                            Visit Website
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach
        @else
        <div class="text-center py-16">
            <div class="w-20 h-20 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <h3 class="text-xl font-heading font-bold text-charcoal mb-2">Partners Coming Soon</h3>
            <p class="text-slate">We are building relationships with organizations that share our vision.</p>
        </div>
        @endif
    </div>
</section>

@if($partners->count() > 0)
<!-- CTA -->
<section class="py-8 md:py-12 bg-gradient-to-br from-forest to-primary text-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl mb-6">Become a Partner</h2>
        <p class="text-cream/90 text-lg max-w-2xl mx-auto mb-10">Join us in advancing Africa's coconut industry. We welcome partnerships with organizations, government agencies, and businesses.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center px-10 py-4 bg-palm text-forest font-heading font-semibold rounded-btn hover:bg-palm/90 transition-all shadow-lg">
            Partner With Us
        </a>
    </div>
</section>
@endif
@endsection
