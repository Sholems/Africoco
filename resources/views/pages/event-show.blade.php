@extends('layouts.public')

@section('title', $event->title)
@section('meta_description', Str::limit($event->description, 160))
@section('og_type', 'event')
@if($event->banner_url)
@section('og_image', $event->banner_url)
@endif

@push('schema')
<script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Event',
        'name' => $event->title,
        'description' => Str::limit(strip_tags($event->description), 250),
        'image' => [$event->banner_url ?? asset('images/homepage-hero-africoco-event.jpg')],
        'startDate' => $event->start_time?->toAtomString() ?? $event->start_date?->toDateString(),
        'endDate' => $event->end_date?->toDateString(),
        'eventStatus' => $event->status === 'cancelled' ? 'https://schema.org/EventCancelled' : 'https://schema.org/EventScheduled',
        'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
        'location' => [
            '@type' => 'Place',
            'name' => $event->venue ?: 'Badagry, Lagos State, Nigeria',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Badagry',
                'addressRegion' => 'Lagos State',
                'addressCountry' => 'NG',
            ],
        ],
        'organizer' => [
            '@type' => 'Organization',
            'name' => 'AFRICOCO',
            'url' => url('/'),
        ],
        'url' => route('events.show', $event),
        'offers' => [
            '@type' => 'Offer',
            'url' => route('events.show', $event),
            'price' => (float) ($event->registration_fee ?? 0),
            'priceCurrency' => 'NGN',
            'availability' => 'https://schema.org/InStock',
            'validFrom' => $event->created_at?->toAtomString(),
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<!-- Event Header -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-2 bg-white/15 text-white text-sm font-semibold rounded-full mb-4">{{ ucfirst($event->status) }}</span>
            <h1 class="font-heading font-bold text-4xl md:text-5xl text-white mb-4">{{ $event->title }}</h1>
            <div class="flex flex-wrap gap-4 text-cream/80 mb-6">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    {{ $event->start_date->format('l, F d, Y') }}
                    @if($event->end_date && $event->end_date != $event->start_date)
                        - {{ $event->end_date->format('F d, Y') }}
                    @endif
                </span>
                @if($event->start_time)
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $event->start_time->format('g:i A') }}
                </span>
                @endif
                @if($event->venue)
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $event->venue }}
                </span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Event Content -->
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="prose prose-lg max-w-none text-slate leading-relaxed">
                    {!! nl2br(e($event->description)) !!}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-card p-8 shadow-card sticky top-28">
                    <h3 class="font-heading font-bold text-xl text-charcoal mb-6">Event Details</h3>
                    <div class="space-y-4 mb-8">
                        <div>
                            <span class="text-xs text-slate uppercase tracking-wider font-semibold">Date</span>
                            <p class="text-charcoal font-medium">{{ $event->start_date->format('M d, Y') }}</p>
                        </div>
                        @if($event->end_date)
                        <div>
                            <span class="text-xs text-slate uppercase tracking-wider font-semibold">End Date</span>
                            <p class="text-charcoal font-medium">{{ $event->end_date->format('M d, Y') }}</p>
                        </div>
                        @endif
                        @if($event->start_time)
                        <div>
                            <span class="text-xs text-slate uppercase tracking-wider font-semibold">Time</span>
                            <p class="text-charcoal font-medium">{{ $event->start_time->format('g:i A') }}</p>
                        </div>
                        @endif
                        @if($event->venue)
                        <div>
                            <span class="text-xs text-slate uppercase tracking-wider font-semibold">Venue</span>
                            <p class="text-charcoal font-medium">{{ $event->venue }}</p>
                        </div>
                        @endif
                        @if($event->registration_fee)
                        <div>
                            <span class="text-xs text-slate uppercase tracking-wider font-semibold">Registration Fee</span>
                            <p class="text-charcoal font-heading font-bold text-xl">₦{{ number_format($event->registration_fee) }}</p>
                        </div>
                        @else
                        <div>
                            <span class="text-xs text-slate uppercase tracking-wider font-semibold">Entry</span>
                            <p class="text-primary font-semibold">Free</p>
                        </div>
                        @endif
                    </div>

                    @if($event->registration_enabled && $event->status != 'completed' && $event->status != 'cancelled')
                    <button onclick="document.getElementById('registration-form').scrollIntoView({ behavior: 'smooth' })" class="w-full py-3 bg-primary hover:bg-forest text-white font-heading font-semibold rounded-btn transition-all">
                        Register Now
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Registration Form -->
@if($event->registration_enabled && $event->status != 'completed' && $event->status != 'cancelled')
<section id="registration-form" class="py-8 md:py-12 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <h2 class="font-heading font-bold text-2xl md:text-3xl text-charcoal mb-8 text-center">Register for {{ $event->title }}</h2>
            <form action="{{ route('events.register', $event) }}" method="POST" class="bg-cream rounded-card p-8 md:p-10 shadow-card">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="full_name" class="block text-sm font-semibold text-charcoal mb-2">Full Name *</label>
                        <input type="text" id="full_name" name="full_name" required value="{{ old('full_name') }}" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                        @error('full_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-charcoal mb-2">Email *</label>
                        <input type="email" id="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-charcoal mb-2">Phone</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                        @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label for="organization" class="block text-sm font-semibold text-charcoal mb-2">Organization</label>
                        <input type="text" id="organization" name="organization" value="{{ old('organization') }}" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                        @error('organization') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="mt-8">
                    <button type="submit" class="w-full py-4 bg-primary hover:bg-forest text-white font-heading font-semibold rounded-btn transition-all text-lg">
                        @if($event->registration_fee)
                            Register — ₦{{ number_format($event->registration_fee) }}
                        @else
                            Register — Free Entry
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endif
@endsection
