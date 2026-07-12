@extends('layouts.public')

@section('title', $blogPost->title)
@section('meta_description', $blogPost->seo_description ?? strip_tags($blogPost->excerpt))
@if($blogPost->featured_image)
@section('og_image', $blogPost->featured_image)
@endif

@section('content')
<!-- Blog Post Header -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            @if($blogPost->category)
            <span class="inline-block px-4 py-2 bg-white/15 text-white text-sm font-semibold rounded-full mb-4">{{ $blogPost->category->name }}</span>
            @endif
            <h1 class="font-heading font-bold text-3xl md:text-4xl lg:text-5xl text-white leading-tight">{{ $blogPost->title }}</h1>
            <div class="flex items-center text-cream/80 text-sm mt-6 space-x-4">
                @if($blogPost->author)
                <span>By {{ $blogPost->author }}</span>
                <span>·</span>
                @endif
                <span>{{ $blogPost->published_at?->format('F d, Y') }}</span>
            </div>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="prose prose-lg max-w-none text-slate leading-relaxed">
                    {!! $blogPost->body !!}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-8">
                    @if($blogPost->category)
                    <div class="bg-white rounded-card p-6 shadow-card">
                        <h3 class="font-heading font-bold text-lg text-charcoal mb-4">Category</h3>
                        <span class="inline-block px-4 py-2 bg-primary/5 text-primary text-sm font-medium rounded-full">{{ $blogPost->category->name }}</span>
                    </div>
                    @endif

                    @if($related->count() > 0)
                    <div class="bg-white rounded-card p-6 shadow-card">
                        <h3 class="font-heading font-bold text-lg text-charcoal mb-4">Related Posts</h3>
                        <div class="space-y-4">
                            @foreach($related as $relatedPost)
                            <a href="{{ route('blog.show', $relatedPost) }}" class="flex items-start space-x-3 group">
                                <img src="{{ $relatedPost->featured_image ?? 'https://images.unsplash.com/photo-1504711434969-e33886168d8c?w=100' }}" alt="" class="w-16 h-16 rounded-image object-cover flex-shrink-0">
                                <div>
                                    <h4 class="text-sm font-semibold text-charcoal group-hover:text-primary transition-colors leading-snug">{{ $relatedPost->title }}</h4>
                                    <span class="text-xs text-slate">{{ $relatedPost->published_at?->format('M d, Y') }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
