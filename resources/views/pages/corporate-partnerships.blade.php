@extends('layouts.public')

@section('title', 'Corporate Partnerships')
@section('meta_description', 'Partner with AFRICOCO to drive sustainable development across Africa through the coconut ecosystem. Explore sponsorship levels, CSR alignment, and partnership benefits.')

@section('content')
<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-cream text-sm font-medium mb-6">Corporate Partnerships</span>
        <h1 class="font-heading font-bold text-4xl md:text-5xl lg:text-6xl text-white mb-6 leading-tight">
            Partner With<br>
            <span class="text-palm">AFRICOCO</span>
        </h1>
        <p class="text-lg text-cream/90 max-w-3xl mx-auto">Join us in driving sustainable development across Africa through the coconut ecosystem. Together, we can create lasting impact for communities, the environment, and generations to come.</p>
    </div>
</section>

<!-- Why Partner -->
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Why Partner With AFRICOCO</span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mb-6">A Strategic Partnership for Sustainable Impact</h2>
                <div class="space-y-5 text-slate leading-relaxed">
                    <p>AFRICOCO offers corporations, foundations, government agencies, and international organizations a unique opportunity to align their brand with Africa's leading coconut ecosystem development organization.</p>
                    <p>Our work spans enterprise development, environmental sustainability, heritage tourism, education, innovation, and community empowerment — providing multiple entry points for meaningful corporate engagement.</p>
                    <p>By partnering with AFRICOCO, your organization contributes directly to the United Nations Sustainable Development Goals (SDGs), including No Poverty, Zero Hunger, Gender Equality, Decent Work and Economic Growth, Climate Action, and Life on Land.</p>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 bg-gradient-to-br from-primary/10 to-gold/10 rounded-2xl blur-xl"></div>
                <div class="relative bg-white rounded-card p-8 shadow-card border border-gray-100">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-heading font-bold text-primary">50,000+</div>
                            <div class="text-sm text-slate mt-1">Trees Planted</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-heading font-bold text-primary">100+</div>
                            <div class="text-sm text-slate mt-1">Communities</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-heading font-bold text-primary">2,000+</div>
                            <div class="text-sm text-slate mt-1">Youth Empowered</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-heading font-bold text-primary">40+</div>
                            <div class="text-sm text-slate mt-1">Partners</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Corporate Benefits -->
<section class="py-8 md:py-12 lg:py-16 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Benefits</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Why Partner With AFRICOCO</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">Your partnership with AFRICOCO delivers measurable value across multiple dimensions — for communities, the environment, and your organization.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-cream rounded-card p-6 shadow-sm hover:shadow-md transition-all border border-gray-100 text-center group">
                <div class="w-14 h-14 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/10 transition-colors">
                    <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">Brand Visibility</h3>
                <p class="text-slate text-sm">Prominent logo placement across our digital platforms, events, publications, and media coverage reaching thousands of stakeholders across Africa.</p>
            </div>
            <div class="bg-cream rounded-card p-6 shadow-sm hover:shadow-md transition-all border border-gray-100 text-center group">
                <div class="w-14 h-14 bg-gold/5 rounded-btn flex items-center justify-center mx-auto mb-4 group-hover:bg-gold/10 transition-colors">
                    <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">CSR Alignment</h3>
                <p class="text-slate text-sm">Align your corporate social responsibility strategy with measurable, impactful programmes that directly contribute to the UN Sustainable Development Goals.</p>
            </div>
            <div class="bg-cream rounded-card p-6 shadow-sm hover:shadow-md transition-all border border-gray-100 text-center group">
                <div class="w-14 h-14 bg-palm/10 rounded-btn flex items-center justify-center mx-auto mb-4 group-hover:bg-palm/20 transition-colors">
                    <svg class="w-7 h-7 text-palm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">Market Access</h3>
                <p class="text-slate text-sm">Connect with farmers, processors, investors, and policymakers across Africa's rapidly growing coconut value chain — a multi-billion dollar industry.</p>
            </div>
            <div class="bg-cream rounded-card p-6 shadow-sm hover:shadow-md transition-all border border-gray-100 text-center group">
                <div class="w-14 h-14 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/10 transition-colors">
                    <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">Impact Reporting</h3>
                <p class="text-slate text-sm">Receive detailed annual impact reports with metrics, stories, and data that demonstrate the tangible difference your partnership is making on the ground.</p>
            </div>
        </div>
    </div>
</section>

<!-- Current Projects -->
@if($featuredProjects->count() > 0)
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Current Projects</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Projects Seeking Partners</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">These active initiatives are looking for corporate partners and sponsors to scale their impact.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($featuredProjects as $project)
            <div class="group bg-white rounded-card overflow-hidden shadow-card hover:shadow-lg transition-all border border-gray-100 flex flex-col md:flex-row">
                @if($project->featured_image)
                <div class="md:w-2/5 overflow-hidden">
                    <img src="{{ $project->featured_image }}" alt="{{ $project->title }}" class="w-full h-full object-cover min-h-[200px] group-hover:scale-110 transition-transform duration-500">
                </div>
                @endif
                <div class="p-6 md:w-3/5">
                    <h3 class="font-heading font-bold text-lg text-charcoal mb-2">{{ $project->title }}</h3>
                    <p class="text-slate text-sm leading-relaxed line-clamp-3">{{ $project->description }}</p>
                    @if($project->budget > 0)
                    <div class="mt-4">
                        <div class="flex items-center justify-between text-sm mb-1">
                            <span class="text-slate">Budget: <strong class="text-charcoal">₦{{ number_format($project->budget) }}</strong></span>
                            <span class="text-slate">{{ $project->funding_progress }}% funded</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full transition-all" style="width: {{ $project->funding_progress }}%;"></div>
                        </div>
                    </div>
                    @endif
                    <a href="{{ route('contact') }}" class="mt-4 inline-flex items-center text-primary text-sm font-semibold hover:text-forest transition-colors">
                        Sponsor This Project
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CSR Alignment -->
<section class="py-8 md:py-12 lg:py-16 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">CSR Alignment</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Aligning With Your CSR Goals</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">Our strategic pillars directly support the United Nations Sustainable Development Goals (SDGs), providing clear alignment for your corporate social responsibility strategy.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-cream rounded-card p-6 shadow-sm border border-gray-100 text-center">
                <div class="w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: #e5243b;">
                    <span class="text-white font-heading font-bold text-lg">1</span>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">No Poverty</h3>
                <p class="text-slate text-sm">Creating livelihood opportunities for smallholder farmers and rural communities through coconut enterprise development.</p>
            </div>
            <div class="bg-cream rounded-card p-6 shadow-sm border border-gray-100 text-center">
                <div class="w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: #dda63a;">
                    <span class="text-white font-heading font-bold text-lg">2</span>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">Zero Hunger</h3>
                <p class="text-slate text-sm">Promoting coconut cultivation for food security, nutrition, and sustainable agricultural practices.</p>
            </div>
            <div class="bg-cream rounded-card p-6 shadow-sm border border-gray-100 text-center">
                <div class="w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: #fd9d24;">
                    <span class="text-white font-heading font-bold text-lg">5</span>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">Gender Equality</h3>
                <p class="text-slate text-sm">Empowering women through targeted programmes, training, and economic opportunities in the coconut value chain.</p>
            </div>
            <div class="bg-cream rounded-card p-6 shadow-sm border border-gray-100 text-center">
                <div class="w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: #3c86a7;">
                    <span class="text-white font-heading font-bold text-lg">8</span>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">Decent Work & Economic Growth</h3>
                <p class="text-slate text-sm">Driving job creation, entrepreneurship, and economic growth across the coconut value chain.</p>
            </div>
            <div class="bg-cream rounded-card p-6 shadow-sm border border-gray-100 text-center">
                <div class="w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: #0072b3;">
                    <span class="text-white font-heading font-bold text-lg">13</span>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">Climate Action</h3>
                <p class="text-slate text-sm">Planting coconut trees, restoring coastal ecosystems, and promoting climate-resilient agricultural practices.</p>
            </div>
            <div class="bg-cream rounded-card p-6 shadow-sm border border-gray-100 text-center">
                <div class="w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: #3eb049;">
                    <span class="text-white font-heading font-bold text-lg">15</span>
                </div>
                <h3 class="font-heading font-bold text-charcoal mb-2">Life on Land</h3>
                <p class="text-slate text-sm">Protecting biodiversity, restoring ecosystems, and promoting sustainable land management practices.</p>
            </div>
        </div>
    </div>
</section>

<!-- Sponsorship Levels -->
<section class="py-8 md:py-12 lg:py-16">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Sponsorship Levels</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Partnership Tiers</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">Choose a partnership level that aligns with your organization's goals and capacity. Each tier offers increasing levels of engagement, visibility, and impact.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($sponsorshipLevels as $level)
            <div class="relative bg-white rounded-2xl overflow-hidden shadow-card hover:shadow-xl transition-all border {{ $level['featured'] ? 'border-primary ring-2 ring-primary/20' : 'border-gray-100' }}">
                @if($level['featured'])
                <div class="absolute top-0 left-0 right-0 bg-primary text-white text-center text-xs font-medium py-1.5">RECOMMENDED</div>
                @endif
                <div class="p-8 {{ $level['featured'] ? 'pt-12' : '' }}">
                    <h3 class="font-heading font-bold text-xl text-charcoal mb-1">{{ $level['name'] }}</h3>
                    <div class="text-2xl font-heading font-bold text-primary mb-4">{{ $level['amount'] }}</div>
                    <ul class="space-y-3">
                        @foreach($level['benefits'] as $benefit)
                        <li class="flex items-start text-sm text-slate">
                            <svg class="w-4 h-4 text-primary mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            {{ $benefit }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Current Partners -->
@if($partners->count() > 0)
<section class="py-8 md:py-12 lg:py-16 bg-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Current Partners</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Trusted by Leading Organizations</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">We are proud to work with these organizations who share our vision for a sustainable coconut future.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 items-center">
            @foreach($partners as $partner)
            <div class="bg-cream rounded-card p-4 shadow-sm hover:shadow-md transition-all text-center border border-gray-100">
                @if($partner->logo)
                <div class="h-14 flex items-center justify-center">
                    <img src="{{ $partner->logo }}" alt="{{ $partner->organization_name }}" class="max-h-full grayscale hover:grayscale-0 transition-all">
                </div>
                @else
                <div class="h-14 flex items-center justify-center">
                    <span class="text-charcoal font-heading font-semibold text-xs">{{ $partner->organization_name }}</span>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Contact CTA -->
<section class="py-8 md:py-12 bg-gradient-to-br from-forest to-primary text-white">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-cream text-sm font-medium mb-4">Get in Touch</span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl mb-6">Become a Partner Today</h2>
                <p class="text-cream/90 text-lg leading-relaxed mb-8">Ready to explore how your organization can partner with AFRICOCO? Our partnerships team is ready to discuss tailored opportunities that align with your strategic goals.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact') }}" class="px-8 py-3 bg-palm text-forest font-heading font-semibold rounded-btn hover:bg-palm/90 transition-all shadow-lg inline-flex items-center">
                        Contact Partnership Team
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="#" class="px-8 py-3 border-2 border-white/30 text-white hover:bg-white/10 font-heading font-semibold rounded-btn transition-all inline-flex items-center">
                        Download Proposal
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 bg-white/5 rounded-2xl blur-xl"></div>
                <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                    <h3 class="font-heading font-bold text-xl text-white mb-4">Partnership Inquiry</h3>
                    <p class="text-cream/80 text-sm mb-6">Fill out our contact form and a member of our partnerships team will reach out within 48 hours.</p>
                    <ul class="space-y-3 text-sm text-cream/80">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-palm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Custom partnership packages available
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-palm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Multi-year partnership discounts
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-palm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            In-kind partnership opportunities
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-palm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Employee volunteer programmes
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection