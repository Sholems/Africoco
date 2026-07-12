@extends('layouts.public')

@section('title', 'Donate')
@section('meta_description', 'Support AFRICOCO\'s mission. Choose a cause — Tree Planting, Youth Empowerment, Women\'s Programme, Research, Community Development, AgunkeFest, or General Support.')

@section('content')
@php $hero = optional($sections)->get('hero');

$causes = [
    [
        'id' => 'Tree Planting',
        'title' => 'Coconut Tree Planting',
        'description' => 'Help us plant thousands of coconut trees across Africa, restoring coastal ecosystems, combating climate change, and creating sustainable livelihoods for farming communities.',
        'target' => 5000000,
        'raised' => 1850000,
        'icon' => 'leaf',
        'color' => '#059669',
        'bg' => 'rgba(5,150,105,0.08)',
    ],
    [
        'id' => 'Youth Programme',
        'title' => 'Youth Agribusiness Programme',
        'description' => 'Empower young Africans with training, mentorship, and resources to build successful coconut agribusinesses and become the next generation of agricultural leaders.',
        'target' => 3500000,
        'raised' => 1200000,
        'icon' => 'academic-cap',
        'color' => '#7c3aed',
        'bg' => 'rgba(124,58,237,0.08)',
    ],
    [
        'id' => 'Women Programme',
        'title' => 'Women in Coconut Enterprise',
        'description' => 'Support women coconut farmers and entrepreneurs with training, access to markets, microloans, and business development services across coconut-growing communities.',
        'target' => 3000000,
        'raised' => 980000,
        'icon' => 'user-group',
        'color' => '#e11d48',
        'bg' => 'rgba(225,29,72,0.08)',
    ],
    [
        'id' => 'Research',
        'title' => 'Research & Innovation',
        'description' => 'Fund research into improved coconut varieties, sustainable farming practices, value-added processing technologies, and innovative coconut-based products.',
        'target' => 4000000,
        'raised' => 650000,
        'icon' => 'book-open',
        'color' => '#0d9488',
        'bg' => 'rgba(13,148,136,0.08)',
    ],
    [
        'id' => 'Community Development',
        'title' => 'Community Development',
        'description' => 'Support infrastructure, clean water, healthcare access, and educational resources for coconut-growing communities in rural areas across Africa.',
        'target' => 2500000,
        'raised' => 1100000,
        'icon' => 'globe',
        'color' => '#2563eb',
        'bg' => 'rgba(37,99,235,0.08)',
    ],
    [
        'id' => 'AgunkeFest',
        'title' => 'AgunkeFest Sponsorship',
        'description' => 'Help sustain Africa\'s premier coconut heritage festival — supporting cultural performances, exhibitions, workshops, and community celebrations that preserve our heritage.',
        'target' => 8000000,
        'raised' => 3200000,
        'icon' => 'calendar',
        'color' => '#d97706',
        'bg' => 'rgba(217,119,6,0.08)',
    ],
    [
        'id' => 'General Support',
        'title' => 'General Support',
        'description' => 'Your unrestricted donation allows us to direct funds where they\'re needed most — supporting all our programmes, operations, and strategic initiatives across Africa.',
        'target' => 0,
        'raised' => 0,
        'icon' => 'heart',
        'color' => '#0d5e24',
        'bg' => 'rgba(13,94,36,0.08)',
    ],
];
@endphp

<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-cream text-sm font-medium mb-6">Support Our Work</span>
        <h1 class="font-heading font-bold text-4xl md:text-5xl lg:text-6xl text-white mb-6 leading-tight">
            Make a Donation<br>
            <span class="text-palm">Choose Your Cause</span>
        </h1>
        <p class="text-lg text-cream/90 max-w-3xl mx-auto">Every contribution — big or small — helps us preserve Africa's coconut heritage, empower communities, and build a sustainable future for generations to come.</p>
    </div>
</section>

<!-- Impact Stats Bar -->
<div class="bg-white border-b border-gray-100">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-2xl md:text-3xl font-heading font-bold text-primary">₦8.5M+</div>
                <div class="text-xs text-slate mt-1">Total Raised</div>
            </div>
            <div class="text-center">
                <div class="text-2xl md:text-3xl font-heading font-bold text-primary">500+</div>
                <div class="text-xs text-slate mt-1">Donors</div>
            </div>
            <div class="text-center">
                <div class="text-2xl md:text-3xl font-heading font-bold text-primary">6</div>
                <div class="text-xs text-slate mt-1">Active Causes</div>
            </div>
            <div class="text-center">
                <div class="text-2xl md:text-3xl font-heading font-bold text-primary">100%</div>
                <div class="text-xs text-slate mt-1">Goes to Programmes</div>
            </div>
        </div>
    </div>
</div>

<!-- Causes Section -->
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Choose a Cause</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Where Your Donation Goes</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">Select a cause that resonates with you. Each has a funding target and progress tracker so you can see the impact of your contribution.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto mb-16">
            @foreach($causes as $cause)
            @php
                $progress = $cause['target'] > 0 ? min(100, round(($cause['raised'] / $cause['target']) * 100)) : 0;
            @endphp
            <div class="group bg-white rounded-card overflow-hidden shadow-card hover:shadow-lg transition-all border border-gray-100 cursor-pointer"
                 x-data
                 @click="document.getElementById('purpose').value = '{{ $cause['id'] }}'; document.getElementById('donation-form').scrollIntoView({ behavior: 'smooth' });">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-btn flex items-center justify-center" style="background-color: {{ $cause['bg'] }};">
                            @switch($cause['icon'])
                                @case('leaf')
                                <svg class="w-6 h-6" style="color: {{ $cause['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                @break
                                @case('academic-cap')
                                <svg class="w-6 h-6" style="color: {{ $cause['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                                @break
                                @case('user-group')
                                <svg class="w-6 h-6" style="color: {{ $cause['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                @break
                                @case('book-open')
                                <svg class="w-6 h-6" style="color: {{ $cause['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                @break
                                @case('globe')
                                <svg class="w-6 h-6" style="color: {{ $cause['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                @break
                                @case('calendar')
                                <svg class="w-6 h-6" style="color: {{ $cause['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                @break
                                @default
                                <svg class="w-6 h-6" style="color: {{ $cause['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            @endswitch
                        </div>
                        <button type="button" class="px-4 py-2 text-xs font-semibold rounded-btn transition-all" 
                                style="background-color: {{ $cause['bg'] }}; color: {{ $cause['color'] }};"
                                @click.stop="document.getElementById('purpose').value = '{{ $cause['id'] }}'; document.getElementById('donation-form').scrollIntoView({ behavior: 'smooth' });">
                            Donate
                        </button>
                    </div>
                    <h3 class="font-heading font-bold text-lg text-charcoal mb-2">{{ $cause['title'] }}</h3>
                    <p class="text-slate text-sm leading-relaxed mb-4">{{ $cause['description'] }}</p>

                    @if($cause['target'] > 0)
                    <div class="mt-auto">
                        <div class="flex items-center justify-between text-sm mb-1.5">
                            <span class="text-slate">₦{{ number_format($cause['raised']) }} raised</span>
                            <span class="font-semibold" style="color: {{ $cause['color'] }};">{{ $progress }}%</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-500" 
                                 style="width: {{ $progress }}%; background: linear-gradient(90deg, {{ $cause['color'] }}88, {{ $cause['color'] }});"></div>
                        </div>
                        <p class="text-xs text-slate mt-1.5">Target: ₦{{ number_format($cause['target']) }}</p>
                    </div>
                    @else
                    <div class="mt-4">
                        <p class="text-xs text-slate italic">No specific target — every amount helps</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Donation Form -->
        <div id="donation-form" class="max-w-4xl mx-auto">
            <div class="bg-white rounded-card p-8 md:p-10 shadow-card border border-gray-100">
                <div class="text-center mb-8">
                    <h2 class="font-heading font-bold text-2xl text-charcoal mb-2">Complete Your Donation</h2>
                    <p class="text-slate text-sm">Your contribution makes a real difference. Thank you for supporting AFRICOCO's mission.</p>
                </div>

                @if(session('success'))
                <div class="mb-6 p-4 bg-primary/5 border border-primary/20 rounded-btn text-primary text-sm">{{ session('success') }}</div>
                @endif

                <form action="{{ route('donate.store') }}" method="POST">
                    @csrf
                    <div class="space-y-6" x-data="{ selected: '{{ $preset_amount ?? '5000' }}', customAmount: '' }">
                        <!-- Purpose Selection -->
                        <div>
                            <label for="purpose" class="block text-sm font-semibold text-charcoal mb-3">I want to support</label>
                            <select id="purpose" name="purpose" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                                @foreach($causes as $cause)
                                <option value="{{ $cause['id'] }}" @selected(($preset_purpose ?? '') == $cause['id'])>{{ $cause['title'] }}</option>
                                @endforeach
                            </select>
                            @error('purpose') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Amount Presets -->
                        <div>
                            <label class="block text-sm font-semibold text-charcoal mb-3">Select Amount</label>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                @foreach(['5000', '10000', '25000', '50000', '100000', 'custom'] as $value)
                                <button type="button" 
                                        @click="selected = '{{ $value }}'; customAmount = ''" 
                                        :class="{ 'bg-primary text-white border-primary shadow-md': selected === '{{ $value }}', 'bg-cream text-charcoal border-gray-200 hover:border-primary/50': selected !== '{{ $value }}' }" 
                                        class="px-4 py-3 text-sm font-semibold rounded-btn border transition-all">
                                    @if($value === 'custom') Custom Amount
                                    @else ₦{{ number_format((int)$value) }}
                                    @endif
                                </button>
                                @endforeach
                            </div>
                            @error('amount') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Custom Amount Input -->
                        <div x-show="selected === 'custom'" x-cloak x-transition>
                            <label for="custom_amount" class="block text-sm font-semibold text-charcoal mb-2">Enter Amount (₦)</label>
                            <input type="number" id="custom_amount" x-model="customAmount" min="100" step="100" placeholder="Enter amount (₦)" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                        </div>

                        <!-- Hidden Amount -->
                        <input type="hidden" name="amount" :value="selected === 'custom' ? customAmount : selected">

                        <!-- Donor Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="donor_name" class="block text-sm font-semibold text-charcoal mb-2">Full Name *</label>
                                <input type="text" id="donor_name" name="donor_name" required value="{{ $preset_name ?? old('donor_name') }}" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors @error('donor_name') border-red-400 @enderror">
                                @error('donor_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-semibold text-charcoal mb-2">Email *</label>
                                <input type="email" id="email" name="email" required value="{{ $preset_email ?? old('email') }}" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors @error('email') border-red-400 @enderror">
                                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-charcoal mb-2">Phone</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-semibold text-charcoal mb-2">Message (Optional)</label>
                            <textarea id="message" name="message" rows="2" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors" placeholder="Share why you're supporting AFRICOCO...">{{ old('message') }}</textarea>
                        </div>

                        @if($event_id && $registration_id)
                        <input type="hidden" name="event_id" value="{{ $event_id }}">
                        <input type="hidden" name="registration_id" value="{{ $registration_id }}">
                        @endif

                        <button type="submit" class="w-full py-4 bg-primary hover:bg-forest text-white font-heading font-semibold rounded-btn transition-all text-lg shadow-md hover:shadow-lg">
                            Complete Donation
                        </button>

                        <p class="text-xs text-slate text-center">Your donation is secure and processed through Paystack. You'll receive a receipt via email.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Why Donate -->
<section class="py-8 md:py-12 bg-gradient-to-br from-forest/5 to-primary/5">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div class="bg-white rounded-card p-6 shadow-sm text-center">
                <div class="w-12 h-12 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">100% Transparent</h3>
                <p class="text-slate text-sm">We publish annual reports detailing how every donation is used to create impact across our programmes.</p>
            </div>
            <div class="bg-white rounded-card p-6 shadow-sm text-center">
                <div class="w-12 h-12 bg-gold/5 rounded-btn flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">Real-Time Impact</h3>
                <p class="text-slate text-sm">Track the progress of your chosen cause through our impact reports and project updates throughout the year.</p>
            </div>
            <div class="bg-white rounded-card p-6 shadow-sm text-center">
                <div class="w-12 h-12 bg-palm/10 rounded-btn flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-palm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">Community Driven</h3>
                <p class="text-slate text-sm">Your donation directly supports community-led initiatives that empower local people to drive their own development.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-8 md:py-12 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mb-6">Other Ways to Support</h2>
        <p class="text-slate text-lg max-w-2xl mx-auto mb-10">Not ready to donate? You can still make a difference by partnering with us, volunteering your time, or spreading the word about our work.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('corporate-partnerships') }}" class="px-8 py-3 bg-primary hover:bg-forest text-white font-heading font-semibold rounded-btn transition-all">Become a Partner</a>
            <a href="{{ route('volunteer') }}" class="px-8 py-3 border-2 border-primary text-primary hover:bg-primary hover:text-white font-heading font-semibold rounded-btn transition-all">Volunteer With Us</a>
            <a href="{{ route('contact') }}" class="px-8 py-3 border-2 border-charcoal text-charcoal hover:bg-charcoal hover:text-white font-heading font-semibold rounded-btn transition-all">Contact Us</a>
        </div>
    </div>
</section>
@endsection