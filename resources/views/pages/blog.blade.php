@extends('layouts.public')

@section('title', 'News & Blog')
@section('meta_description', 'Read the latest news, articles, and updates from AFRICOCO about the coconut industry, sustainability, and community impact.')

@section('content')
<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    @php
        $hero = $sections->get('hero');
    @endphp
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="font-heading font-bold text-4xl md:text-5xl text-white mb-6">{{ $hero?->title ?? 'News & Blog' }}</h1>
        <p class="text-lg text-cream/90 max-w-2xl mx-auto">{{ $hero?->body ?? "Insights, stories, and updates from the frontlines of Africa's coconut revolution." }}</p>
    </div>
</section>

<!-- Blog Grid -->
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article class="bg-white rounded-card overflow-hidden shadow-card hover:shadow-lg transition-all group">
                <div class="overflow-hidden">
                    <img src="{{ $post->featured_image_url ?? asset('images/homepage-hero-africoco-event.jpg') }}" alt="{{ $post->title }}" class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    @if($post->category)
                    <span class="inline-block px-3 py-1 bg-primary/5 text-primary text-xs font-medium rounded-full mb-3">{{ $post->category->name }}</span>
                    @endif
                    <h3 class="font-heading font-bold text-lg text-charcoal mb-2">
                        <a href="{{ route('blog.show', $post) }}" class="group-hover:text-primary transition-colors">{{ $post->title }}</a>
                    </h3>
                    <p class="text-slate text-sm leading-relaxed mb-4">{{ Str::limit($post->excerpt, 120) }}</p>
                    <div class="flex items-center justify-between text-xs text-slate">
                        <span>{{ $post->published_at?->format('M d, Y') }}</span>
                        <a href="{{ route('blog.show', $post) }}" class="text-primary font-semibold hover:text-forest transition-colors">Read More →</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <div class="w-20 h-20 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
            <h3 class="text-xl font-heading font-bold text-charcoal mb-2">No Posts Yet</h3>
            <p class="text-slate">Our blog is coming soon. Stay tuned for updates.</p>
        </div>
        @endif
    </div>
</section>
@endsection
