@extends('layouts.public')

@section('title', 'Our Projects')
@section('meta_description', 'Explore AFRICOCO\'s ongoing projects across Africa. From tree planting to youth empowerment, see the impact your support can make.')

@section('content')
<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-cream text-sm font-medium mb-6">Our Projects</span>
        <h1 class="font-heading font-bold text-4xl md:text-5xl lg:text-6xl text-white mb-6 leading-tight">
            Projects Making an Impact<br>
            <span class="text-palm">Across Africa</span>
        </h1>
        <p class="text-lg text-cream/90 max-w-3xl mx-auto">From coconut tree planting to youth empowerment and community development — explore the projects that are transforming lives and landscapes.</p>
    </div>
</section>

@if($projects->count() > 0)
<!-- Projects List -->
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-10">
            @foreach($projects as $project)
            <div class="group bg-white rounded-card overflow-hidden shadow-card hover:shadow-lg transition-all border border-gray-100">
                <div class="grid grid-cols-1 lg:grid-cols-3">
                    <!-- Image / Gallery -->
                    <div class="lg:col-span-1 relative overflow-hidden min-h-[250px]">
                        @if($project->featured_image)
                        <img src="{{ $project->featured_image }}" alt="{{ $project->title }}" class="w-full h-full absolute inset-0 object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                        <div class="w-full h-full absolute inset-0 bg-gradient-to-br from-primary/10 to-forest/10 flex items-center justify-center">
                            <svg class="w-16 h-16 text-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        @endif
                        <!-- Status Badge -->
                        <span class="absolute top-4 left-4 px-3 py-1 text-xs font-semibold rounded-full 
                            @if($project->status == 'ongoing') bg-palm/90 text-forest
                            @elseif($project->status == 'completed') bg-primary/90 text-white
                            @elseif($project->status == 'planned') bg-blue-500/90 text-white
                            @else bg-gray-500/90 text-white @endif">
                            {{ ucfirst($project->status) }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="lg:col-span-2 p-6 md:p-8">
                        <div class="flex flex-wrap items-center gap-2 mb-3">
                            @if($project->pillar)
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-primary/5 text-primary">{{ $project->pillar->name }}</span>
                            @endif
                            @if($project->start_date)
                            <span class="text-xs text-slate">
                                {{ $project->start_date->format('M Y') }}
                                @if($project->end_date) — {{ $project->end_date->format('M Y') }} @endif
                            </span>
                            @endif
                        </div>

                        <h2 class="font-heading font-bold text-xl md:text-2xl text-charcoal mb-3">{{ $project->title }}</h2>
                        
                        <p class="text-slate text-sm leading-relaxed mb-4">{{ $project->description }}</p>

                        <!-- Objectives -->
                        @if($project->objectives)
                        <div class="mb-4">
                            <h3 class="font-heading font-semibold text-sm text-charcoal mb-2">Objectives</h3>
                            <p class="text-slate text-sm">{{ $project->objectives }}</p>
                        </div>
                        @endif

                        <!-- Funding Progress -->
                        @if($project->budget > 0)
                        <div class="mb-4">
                            <div class="flex items-center justify-between text-sm mb-1.5">
                                <div class="flex items-center gap-3">
                                    <span class="text-slate">Budget: <strong class="text-charcoal">₦{{ number_format($project->budget) }}</strong></span>
                                    <span class="text-slate">Raised: <strong class="text-primary">₦{{ number_format($project->amount_raised ?? 0) }}</strong></span>
                                </div>
                                <span class="font-semibold" style="color: {{ $project->funding_progress >= 100 ? '#059669' : '#d97706' }};">{{ $project->funding_progress }}%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                                <div class="h-full rounded-full transition-all duration-500" 
                                     style="width: {{ $project->funding_progress }}%; background: linear-gradient(90deg, #0D5E24, #2F9E44);"></div>
                            </div>
                        </div>
                        @endif

                        <!-- CTA -->
                        <div class="flex flex-wrap gap-3 mt-5">
                            <a href="{{ route('contact', ['subject' => 'Sponsor: ' . $project->title]) }}" class="inline-flex items-center px-5 py-2.5 bg-primary hover:bg-forest text-white text-sm font-semibold rounded-btn transition-all">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z"/></svg>
                                Sponsor This Project
                            </a>
                            <a href="{{ route('contact', ['subject' => 'Support: ' . $project->title]) }}" class="inline-flex items-center px-5 py-2.5 border-2 border-primary text-primary hover:bg-primary hover:text-white text-sm font-semibold rounded-btn transition-all">
                                Support This Project
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@else
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center py-16">
        <div class="w-20 h-20 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </div>
        <h3 class="text-xl font-heading font-bold text-charcoal mb-2">Projects Coming Soon</h3>
        <p class="text-slate">Our projects are being developed. Check back soon for updates.</p>
        <a href="{{ route('contact') }}" class="mt-6 inline-flex items-center px-6 py-3 bg-primary text-white font-heading font-semibold rounded-btn hover:bg-forest transition-all">
            Get Involved
        </a>
    </div>
</section>
@endif

<!-- CTA -->
<section class="py-section-sm md:py-section-md bg-gradient-to-br from-forest to-primary text-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-heading font-bold text-3xl md:text-4xl mb-6">Support a Project</h2>
        <p class="text-cream/90 text-lg max-w-2xl mx-auto mb-10">Every project needs partners, sponsors, and donors to scale its impact. Choose a project to support, or contact us to discuss custom partnership opportunities.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('corporate-partnerships') }}" class="px-8 py-3 bg-palm text-forest font-heading font-semibold rounded-btn hover:bg-palm/90 transition-all shadow-lg">Become a Partner</a>
            <a href="{{ route('contact') }}" class="px-8 py-3 border-2 border-white/30 text-white hover:bg-white/10 font-heading font-semibold rounded-btn transition-all">Contact Our Team</a>
        </div>
    </div>
</section>
@endsection