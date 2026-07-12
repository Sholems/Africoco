@extends('layouts.public')

@section('title', 'Our Impact')
@section('meta_description', 'Discover AFRICOCO\'s measurable impact across Africa — trees planted, communities reached, youth and women empowered, and projects completed.')

@section('content')
<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-cream text-sm font-medium mb-6">Our Impact</span>
        <h1 class="font-heading font-bold text-4xl md:text-5xl lg:text-6xl text-white mb-6 leading-tight">
            Making a Difference<br>
            <span class="text-palm">Across Africa</span>
        </h1>
        <p class="text-lg text-cream/90 max-w-3xl mx-auto">Through our strategic initiatives and programmes, AFRICOCO continues to drive measurable, meaningful change in communities across the continent.</p>
    </div>
</section>

<!-- Impact Counters -->
<section class="py-8 md:py-12 lg:py-16 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">By the Numbers</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Our Impact in Numbers</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">Every number represents a life touched, a tree planted, a community empowered, and a step toward a sustainable coconut future.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($stats as $stat)
            <div class="group bg-cream rounded-card p-6 text-center shadow-sm hover:shadow-lg transition-all border border-gray-100 hover:-translate-y-1 duration-300">
                <div class="w-12 h-12 rounded-btn flex items-center justify-center mx-auto mb-4 transition-transform group-hover:scale-110 duration-300" style="background-color: {{ $stat['color'] }}15;">
                    @switch($stat['icon'])
                        @case('leaf')
                        <svg class="w-6 h-6" style="color: {{ $stat['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        @break
                        @case('globe')
                        <svg class="w-6 h-6" style="color: {{ $stat['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        @break
                        @case('academic-cap')
                        <svg class="w-6 h-6" style="color: {{ $stat['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                        @break
                        @case('user-group')
                        <svg class="w-6 h-6" style="color: {{ $stat['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        @break
                        @case('briefcase')
                        <svg class="w-6 h-6" style="color: {{ $stat['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v1m4 1v10m4-1.01V18m0 0h7m-7 0H9"/></svg>
                        @break
                        @case('book-open')
                        <svg class="w-6 h-6" style="color: {{ $stat['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        @break
                        @case('handshake')
                        <svg class="w-6 h-6" style="color: {{ $stat['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        @break
                        @case('map')
                        <svg class="w-6 h-6" style="color: {{ $stat['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        @break
                        @case('heart')
                        <svg class="w-6 h-6" style="color: {{ $stat['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        @break
                        @default
                        <svg class="w-6 h-6" style="color: {{ $stat['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    @endswitch
                </div>
                <div class="text-3xl md:text-4xl font-heading font-bold mb-1" style="color: {{ $stat['color'] }};">{{ $stat['value'] }}</div>
                <div class="text-sm text-slate">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Our Impact Story -->
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-content mx-auto">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Our Story</span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Creating Lasting Change</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-card p-8 shadow-card">
                    <div class="w-14 h-14 bg-primary/5 rounded-btn flex items-center justify-center mb-5">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-charcoal mb-3">Environmental Impact</h3>
                    <p class="text-slate leading-relaxed">Through our coconut tree planting campaigns and coastal restoration initiatives, we are restoring ecosystems, combating climate change, and promoting sustainable agricultural practices across Africa's coconut-growing regions.</p>
                </div>
                <div class="bg-white rounded-card p-8 shadow-card">
                    <div class="w-14 h-14 bg-gold/5 rounded-btn flex items-center justify-center mb-5">
                        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-charcoal mb-3">Economic Empowerment</h3>
                    <p class="text-slate leading-relaxed">We are creating jobs, improving livelihoods, and stimulating rural development by connecting farmers, entrepreneurs, and investors to opportunities across the coconut value chain — from production to processing to export.</p>
                </div>
                <div class="bg-white rounded-card p-8 shadow-card">
                    <div class="w-14 h-14 bg-palm/10 rounded-btn flex items-center justify-center mb-5">
                        <svg class="w-7 h-7 text-palm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-charcoal mb-3">Social Development</h3>
                    <p class="text-slate leading-relaxed">Youth and women are at the heart of our work. Through training bootcamps, mentorship programmes, and access to funding, we are empowering the next generation of coconut agripreneurs and community leaders.</p>
                </div>
                <div class="bg-white rounded-card p-8 shadow-card">
                    <div class="w-14 h-14 bg-primary/5 rounded-btn flex items-center justify-center mb-5">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-xl text-charcoal mb-3">Cultural Preservation</h3>
                    <p class="text-slate leading-relaxed">Through AgunkeFest, heritage trails, and cultural documentation, we are preserving and celebrating Africa's rich coconut heritage for future generations while promoting tourism and local economic development.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Current Projects -->
@if($projects->count() > 0)
<section class="py-8 md:py-12 lg:py-16 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Projects</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Our Projects</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">From tree planting to youth empowerment, explore the projects that are creating real impact on the ground.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="group bg-cream rounded-card overflow-hidden shadow-card hover:shadow-lg transition-all border border-gray-100">
                @if($project->featured_image)
                <div class="overflow-hidden">
                    <img src="{{ $project->featured_image }}" alt="{{ $project->title }}" class="w-full h-44 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                @else
                <div class="w-full h-32 bg-gradient-to-br from-primary/5 to-forest/5 flex items-center justify-center">
                    <svg class="w-10 h-10 text-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                @endif
                <div class="p-6">
                    <span class="inline-block px-2.5 py-1 text-xs font-medium rounded-full bg-primary/5 text-primary">{{ $project->status }}</span>
                    <h3 class="font-heading font-bold text-lg text-charcoal mt-3 mb-2">{{ $project->title }}</h3>
                    <p class="text-slate text-sm leading-relaxed line-clamp-2">{{ $project->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Partners Section -->
@if($partners->count() > 0)
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Our Partners</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Trusted By</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">We work with governments, development agencies, corporate partners, and community organizations across Africa.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 items-center">
            @foreach($partners as $partner)
            <div class="bg-white rounded-card p-6 shadow-sm hover:shadow-md transition-all text-center border border-gray-100">
                @if($partner->logo)
                <div class="h-16 flex items-center justify-center">
                    <img src="{{ $partner->logo }}" alt="{{ $partner->organization_name }}" class="max-h-full grayscale hover:grayscale-0 transition-all">
                </div>
                @else
                <div class="h-16 flex items-center justify-center">
                    <span class="text-charcoal font-heading font-semibold text-sm">{{ $partner->organization_name }}</span>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- News & Updates -->
@if($posts->count() > 0)
<section class="py-8 md:py-12 lg:py-16 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Latest Updates</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Impact Stories</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">Read our latest news, success stories, and updates from the field.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <div class="group bg-cream rounded-card overflow-hidden shadow-card hover:shadow-lg transition-all border border-gray-100">
                @if($post->featured_image)
                <div class="overflow-hidden">
                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                @endif
                <div class="p-6">
                    <span class="text-xs text-primary font-medium">{{ $post->created_at->format('M d, Y') }}</span>
                    <h3 class="font-heading font-bold text-lg text-charcoal mt-2 mb-2 group-hover:text-primary transition-colors">
                        <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                    </h3>
                    <p class="text-slate text-sm line-clamp-2">{{ Str::limit(strip_tags($post->body ?? ''), 120) }}</p>
                    <a href="{{ route('blog.show', $post) }}" class="mt-4 inline-flex items-center text-primary text-sm font-semibold hover:text-forest transition-colors">
                        Read More
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA -->
<section class="py-8 md:py-12 bg-gradient-to-br from-forest to-primary text-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl mb-6">Help Us Do More</h2>
        <p class="text-cream/90 text-lg max-w-2xl mx-auto mb-10">Every contribution — whether as a partner, donor, or volunteer — helps us expand our impact and reach more communities across Africa.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('corporate-partnerships') }}" class="px-8 py-3 bg-palm text-forest font-heading font-semibold rounded-btn hover:bg-palm/90 transition-all shadow-lg">Become a Partner</a>
            <a href="{{ route('volunteer') }}" class="px-8 py-3 border-2 border-white/30 text-white hover:bg-white/10 font-heading font-semibold rounded-btn transition-all">Volunteer With Us</a>
            <a href="{{ route('projects') }}" class="px-8 py-3 border-2 border-palm text-palm hover:bg-palm hover:text-forest font-heading font-semibold rounded-btn transition-all">View Our Projects</a>
        </div>
    </div>
</section>
@endsection