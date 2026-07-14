@extends('layouts.public')

@section('title', 'Gallery')
@section('meta_description', 'Browse through the AFRICOCO gallery showcasing moments from our programs, events, and community initiatives.')

@push('styles')
<style>
    .gallery-item:hover img { transform: scale(1.1); }
    .gallery-filter.active { background-color: #2F9E44; color: white; border-color: #2F9E44; }
</style>
@endpush

@section('content')
<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    @php
        $hero = $sections->get('hero');
    @endphp
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="font-heading font-bold text-4xl md:text-5xl text-white mb-6">{{ $hero?->title ?? 'Our Gallery' }}</h1>
        <p class="text-lg text-cream/90 max-w-2xl mx-auto">{{ $hero?->body ?? "Moments that capture the spirit of AFRICOCO's mission across Africa." }}</p>
    </div>
</section>

<!-- Gallery -->
<section class="py-8 md:py-12 lg:py-16" x-data="{ activeFilter: 'all' }">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter Buttons -->
        @if($categories->count() > 0)
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button @click="activeFilter = 'all'" :class="{ 'active': activeFilter === 'all' }" class="gallery-filter px-5 py-2.5 text-sm font-medium rounded-full border border-gray-200 text-slate hover:border-primary transition-all">
                All
            </button>
            @foreach($categories as $category)
            <button @click="activeFilter = '{{ $category }}'" :class="{ 'active': activeFilter === '{{ $category }}' }" class="gallery-filter px-5 py-2.5 text-sm font-medium rounded-full border border-gray-200 text-slate hover:border-primary transition-all">
                {{ $category }}
            </button>
            @endforeach
        </div>
        @endif

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" x-data="{}">
            @forelse($gallery as $item)
            <div class="gallery-item group relative rounded-card overflow-hidden shadow-card cursor-pointer"
                 x-show="activeFilter === 'all' || activeFilter === '{{ $item->category }}'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100">
                <img src="{{ $item->image_url ?? asset('images/homepage-hero-africoco-event.jpg') }}" alt="{{ $item->title }}" class="w-full h-64 object-cover transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-end p-5">
                    <h3 class="text-white font-heading font-semibold text-lg">{{ $item->title }}</h3>
                    @if($item->category)
                    <span class="text-white/70 text-sm">{{ $item->category }}</span>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <div class="w-20 h-20 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-xl font-heading font-bold text-charcoal mb-2">No Images Yet</h3>
                <p class="text-slate">Our gallery is being updated. Check back soon for new photos.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Lightbox would be added here with Alpine.js -->
@endsection
