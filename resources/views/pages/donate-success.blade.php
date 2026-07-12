@extends('layouts.public')

@section('title', 'Donation Successful')
@section('meta_description', 'Thank you for your generous donation to AFRICOCO.')

@section('content')
<section class="py-8 md:py-12 lg:py-16 min-h-[60vh] flex items-center">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center">
            <div class="w-20 h-20 bg-primary/5 rounded-full flex items-center justify-center mx-auto mb-8">
                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h1 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mb-4">Thank You for Your Donation!</h1>
            <p class="text-lg text-slate mb-8">Your generosity helps us preserve Africa's coconut heritage and create opportunities for communities across the continent.</p>

            @if($donation)
            <div class="bg-white rounded-card p-8 shadow-card mb-8 text-left">
                <h3 class="font-heading font-bold text-lg text-charcoal mb-4">Donation Summary</h3>
                <div class="space-y-3">
                    <div class="flex justify-between py-2 border-b border-gray-200">
                        <span class="text-slate">Amount</span>
                        <span class="font-semibold text-charcoal">₦{{ number_format($donation->amount, 2) }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-200">
                        <span class="text-slate">Purpose</span>
                        <span class="font-semibold text-charcoal">{{ $donation->purpose }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-200">
                        <span class="text-slate">Reference</span>
                        <span class="font-semibold text-charcoal text-sm">{{ $donation->payment_reference }}</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-slate">Status</span>
                        <span class="font-semibold text-primary">{{ ucfirst($donation->payment_status) }}</span>
                    </div>
                </div>
            </div>

            <p class="text-slate mb-8">A receipt will be sent to <strong>{{ $donation->email }}</strong>.</p>
            @else
            <div class="bg-white rounded-card p-8 shadow-card mb-8">
                <p class="text-slate">Your donation was processed successfully. A receipt will be sent to your email.</p>
            </div>
            @endif

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="px-8 py-3 bg-primary hover:bg-forest text-white font-heading font-semibold rounded-btn transition-all">
                    Back to Home
                </a>
                <a href="{{ route('about') }}" class="px-8 py-3 border-2 border-primary text-primary hover:bg-primary hover:text-white font-heading font-semibold rounded-btn transition-all">
                    Learn About Our Impact
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
