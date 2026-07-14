@extends('layouts.public')

@section('title', 'Volunteer With Us')
@section('meta_description', 'Join AFRICOCO as a volunteer and contribute to Africa\'s coconut heritage preservation and community development.')

@section('content')
<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    @php
        $hero = $sections->get('hero');
    @endphp
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="font-heading font-bold text-4xl md:text-5xl text-white mb-6">{{ $hero?->title ?? 'Volunteer With Us' }}</h1>
        <p class="text-lg text-cream/90 max-w-2xl mx-auto">{{ $hero?->body ?? "Be part of the change. Your skills and passion can help preserve Africa's coconut heritage." }}</p>
    </div>
</section>

<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Info -->
            <div>
                <h2 class="font-heading font-bold text-3xl text-charcoal mb-6">Why Volunteer with AFRICOCO?</h2>
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-primary/5 rounded-btn flex items-center justify-center flex-shrink-0 mr-4">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-heading font-bold text-lg text-charcoal mb-1">Make a Difference</h3>
                            <p class="text-slate text-sm">Contribute to sustainable development and community empowerment across Africa.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-primary/5 rounded-btn flex items-center justify-center flex-shrink-0 mr-4">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <div>
                            <h3 class="font-heading font-bold text-lg text-charcoal mb-1">Gain Experience</h3>
                            <p class="text-slate text-sm">Develop skills in agriculture, tourism, event management, advocacy, and community development.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-primary/5 rounded-btn flex items-center justify-center flex-shrink-0 mr-4">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-heading font-bold text-lg text-charcoal mb-1">Network & Connect</h3>
                            <p class="text-slate text-sm">Connect with like-minded individuals, organizations, and industry leaders in the coconut sector.</p>
                        </div>
                    </div>
                </div>

                <h3 class="font-heading font-bold text-xl text-charcoal mt-12 mb-4">Areas of Interest</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-2 bg-primary/5 text-primary text-sm rounded-full">Event Support</span>
                    <span class="px-4 py-2 bg-primary/5 text-primary text-sm rounded-full">Media & Publicity</span>
                    <span class="px-4 py-2 bg-primary/5 text-primary text-sm rounded-full">Community Outreach</span>
                    <span class="px-4 py-2 bg-primary/5 text-primary text-sm rounded-full">Research</span>
                    <span class="px-4 py-2 bg-primary/5 text-primary text-sm rounded-full">Training</span>
                    <span class="px-4 py-2 bg-primary/5 text-primary text-sm rounded-full">Environmental Campaigns</span>
                    <span class="px-4 py-2 bg-primary/5 text-primary text-sm rounded-full">Sponsorship Support</span>
                </div>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-card p-8 md:p-10 shadow-card">
                <h2 class="font-heading font-bold text-2xl text-charcoal mb-6">Apply Now</h2>
                @if(session('success'))
                <div class="mb-6 p-4 bg-primary/5 border border-primary/20 rounded-btn text-primary text-sm">{{ session('success') }}</div>
                @endif
                <form action="{{ route('volunteer.apply') }}" method="POST">
                    @csrf
                    <div class="space-y-5">
                        <div>
                            <label for="full_name" class="block text-sm font-semibold text-charcoal mb-2">Full Name *</label>
                            <input type="text" id="full_name" name="full_name" required value="{{ old('full_name') }}" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors @error('full_name') border-red-400 @enderror">
                            @error('full_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="email" class="block text-sm font-semibold text-charcoal mb-2">Email *</label>
                                <input type="email" id="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors @error('email') border-red-400 @enderror">
                                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-charcoal mb-2">Phone</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                                @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div>
                            <label for="location" class="block text-sm font-semibold text-charcoal mb-2">Location</label>
                            <input type="text" id="location" name="location" value="{{ old('location') }}" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                        </div>
                        <div>
                            <label for="area_of_interest" class="block text-sm font-semibold text-charcoal mb-2">Area of Interest</label>
                            <select id="area_of_interest" name="area_of_interest" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                                <option value="">Select an area...</option>
                                <option value="Event Support" @selected(old('area_of_interest') == 'Event Support')>Event Support</option>
                                <option value="Media & Publicity" @selected(old('area_of_interest') == 'Media & Publicity')>Media & Publicity</option>
                                <option value="Community Outreach" @selected(old('area_of_interest') == 'Community Outreach')>Community Outreach</option>
                                <option value="Research" @selected(old('area_of_interest') == 'Research')>Research</option>
                                <option value="Training" @selected(old('area_of_interest') == 'Training')>Training</option>
                                <option value="Environmental Campaigns" @selected(old('area_of_interest') == 'Environmental Campaigns')>Environmental Campaigns</option>
                                <option value="Sponsorship Support" @selected(old('area_of_interest') == 'Sponsorship Support')>Sponsorship Support</option>
                            </select>
                        </div>
                        <div>
                            <label for="skills" class="block text-sm font-semibold text-charcoal mb-2">Skills & Experience</label>
                            <textarea id="skills" name="skills" rows="3" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">{{ old('skills') }}</textarea>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-semibold text-charcoal mb-2">Why do you want to volunteer?</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="w-full py-4 bg-primary hover:bg-forest text-white font-heading font-semibold rounded-btn transition-all text-lg">
                            Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
