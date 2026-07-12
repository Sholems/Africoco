@extends('layouts.public')

@section('title', 'Contact Us')
@section('meta_description', 'Get in touch with AFRICOCO. We\'d love to hear from you about partnerships, questions, or collaboration opportunities.')

@section('content')
@php $hero = optional($sections)->get('hero'); @endphp
<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="font-heading font-bold text-4xl md:text-5xl text-white mb-6">{{ optional($hero)->title ?? 'Contact Us' }}</h1>
        <p class="text-lg text-cream/90 max-w-2xl mx-auto">{{ optional($hero)->body ?? 'Have a question, partnership idea, or want to learn more? We\'d love to hear from you.' }}</p>
    </div>
</section>

<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contact Info -->
            <div class="lg:col-span-1">
                <div class="space-y-8">
                    <div class="bg-white rounded-card p-6 shadow-card">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary/5 rounded-btn flex items-center justify-center flex-shrink-0 mr-4">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-lg text-charcoal mb-1">Email Us</h3>
                                <p class="text-slate text-sm">info@africoco.ng</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-card p-6 shadow-card">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary/5 rounded-btn flex items-center justify-center flex-shrink-0 mr-4">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-lg text-charcoal mb-1">Visit Us</h3>
                                <p class="text-slate text-sm">Badagry, Lagos State, Nigeria</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-card p-6 shadow-card">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary/5 rounded-btn flex items-center justify-center flex-shrink-0 mr-4">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-lg text-charcoal mb-1">Call Us</h3>
                                <p class="text-slate text-sm">+234 803 366 9496</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-card p-8 md:p-10 shadow-card">
                    <h2 class="font-heading font-bold text-2xl text-charcoal mb-2">Send Us a Message</h2>
                    <p class="text-slate mb-8">We'll get back to you as soon as possible.</p>

                    @if(session('success'))
                    <div class="mb-6 p-4 bg-primary/5 border border-primary/20 rounded-btn text-primary text-sm">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-charcoal mb-2">Full Name *</label>
                                <input type="text" id="name" name="name" required value="{{ old('name') }}" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors @error('name') border-red-400 @enderror">
                                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-semibold text-charcoal mb-2">Email *</label>
                                <input type="email" id="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors @error('email') border-red-400 @enderror">
                                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-charcoal mb-2">Phone</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-semibold text-charcoal mb-2">Subject</label>
                                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors">
                            </div>
                            <div class="md:col-span-2">
                                <label for="message" class="block text-sm font-semibold text-charcoal mb-2">Message *</label>
                                <textarea id="message" name="message" required rows="6" class="w-full px-4 py-3 bg-cream border border-gray-200 rounded-input text-charcoal focus:outline-none focus:border-primary transition-colors @error('message') border-red-400 @enderror">{{ old('message') }}</textarea>
                                @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="mt-8">
                            <button type="submit" class="w-full md:w-auto px-10 py-4 bg-primary hover:bg-forest text-white font-heading font-semibold rounded-btn transition-all">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
