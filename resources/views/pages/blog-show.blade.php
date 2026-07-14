@extends('layouts.public')

@section('title', $blogPost->title)
@section('meta_description', $blogPost->seo_description ?? strip_tags($blogPost->excerpt))
@section('og_type', 'article')
@section('og_image', asset('africoco-logo.png'))

@push('schema')
<script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $blogPost->seo_title ?? $blogPost->title,
        'description' => $blogPost->seo_description ?? strip_tags($blogPost->excerpt),
        'image' => [$blogPost->featured_image_url ?? asset('images/homepage-hero-africoco-event.jpg')],
        'datePublished' => $blogPost->published_at?->toAtomString(),
        'dateModified' => $blogPost->updated_at?->toAtomString(),
        'author' => [
            '@type' => 'Person',
            'name' => $blogPost->author ?: 'AFRICOCO',
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'AFRICOCO',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('africoco-logo.png'),
            ],
        ],
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => route('blog.show', $blogPost),
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

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
<section class="py-8 md:py-12 lg:py-16 bg-cream/40">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $imageCredits = [
                '/images/blog/nigeria-coconut-tree-fruit.jpg' => 'Photo: Biggiepopa via Wikimedia Commons, CC BY-SA 4.0.',
                '/images/blog/coconuts-drying-copra-processing.jpg' => 'Photo: Peter Davis / AusAID via Wikimedia Commons.',
                '/images/blog/coconut-oil-mill-processing.jpg' => 'Photo: Amolnaik3k via Wikimedia Commons, public domain.',
            ];
            $imageCredit = $imageCredits[$blogPost->featured_image] ?? null;
        @endphp
        @if($blogPost->featured_image_url)
        <figure class="mb-10 overflow-hidden rounded-card bg-white shadow-card">
            <img src="{{ $blogPost->featured_image_url }}" alt="{{ $blogPost->title }}" class="h-[260px] w-full object-cover md:h-[420px]">
            <figcaption class="border-t border-gray-100 px-5 py-3 text-sm text-slate">
                AFRICOCO insight: {{ $blogPost->category?->name ?? 'Coconut heritage and sustainability' }}
                @if($imageCredit)
                    <span class="block text-xs text-slate/75">{{ $imageCredit }}</span>
                @endif
            </figcaption>
        </figure>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <article class="bg-white rounded-card shadow-card px-5 py-7 md:px-10 md:py-10">
                    <div class="mb-8 flex flex-wrap items-center gap-3 text-sm text-slate">
                        @if($blogPost->category)
                        <span class="inline-flex rounded-full bg-primary/10 px-3 py-1 font-semibold text-primary">{{ $blogPost->category->name }}</span>
                        @endif
                        @if($blogPost->published_at)
                        <span>{{ $blogPost->published_at->format('F d, Y') }}</span>
                        @endif
                        <span>{{ max(1, ceil(str_word_count(strip_tags($blogPost->body)) / 200)) }} min read</span>
                    </div>
                    <div class="prose prose-lg max-w-none prose-headings:font-heading prose-headings:text-charcoal prose-p:text-slate prose-p:leading-8 prose-a:text-primary prose-strong:text-charcoal">
                    {!! $blogPost->body !!}
                    </div>
                </article>
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
                                <img src="{{ $relatedPost->featured_image_url ?? asset('images/homepage-hero-africoco-event.jpg') }}" alt="" class="w-16 h-16 rounded-image object-cover flex-shrink-0">
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
