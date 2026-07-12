@extends('layouts.public')

@section('title', 'About AFRICOCO')
@section('meta_description', 'AFRICOCO is Africa\'s leading organization advancing sustainable development through the coconut ecosystem. Learn about our vision, mission, strategic pillars, and impact across the continent.')

@section('content')
@php $hero = optional($sections)->get('hero'); @endphp

<!-- Hero -->
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-forest/90 via-forest/80 to-primary/70 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/homepage-hero-africoco-event.jpg') }}')"></div>
    <!-- Decorative circles -->
    <div class="absolute top-20 right-20 w-64 h-64 bg-white/5 rounded-full blur-3xl z-10"></div>
    <div class="absolute bottom-10 left-10 w-48 h-48 bg-palm/10 rounded-full blur-3xl z-10"></div>
    <div class="relative z-20 max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-cream text-sm font-medium mb-6" x-data x-init="$el.style.opacity='0'; setTimeout(() => $el.style.opacity='1', 100)" style="transition: opacity 0.6s ease-out">About AFRICOCO</span>
        <h1 class="font-heading font-bold text-4xl md:text-5xl lg:text-6xl text-white mb-6 leading-tight" x-data x-init="$el.style.opacity='0'; setTimeout(() => $el.style.opacity='1', 300)" style="transition: opacity 0.8s ease-out">
            Africa's Leading Coconut<br>
            <span class="text-palm">Ecosystem Development Organization</span>
        </h1>

    </div>
</section>

<!-- Who We Are -->
<section class="py-8 md:py-12 lg:py-16" x-data="{ visible: false }" x-intersect="visible = true">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-content mx-auto">
            <div class="text-center mb-12" x-show="visible" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8">
                <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Who We Are</span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Advancing Africa Through the Coconut Ecosystem</h2>
            </div>
            <div class="space-y-6" x-show="visible" x-transition:enter="transition ease-out duration-700 delay-200" x-transition:enter-start="opacity-0 translate-y-8">
                <p class="text-lg font-medium text-charcoal leading-relaxed">The African Coconut Heritage Initiative (AFRICOCO) is a non-governmental organization driving sustainable development across Africa through the coconut ecosystem.</p>
                <p class="text-slate leading-relaxed">Founded on the belief that the coconut tree is one of nature's most valuable resources, AFRICOCO works to unlock the enormous economic, social, and environmental potential of the coconut value chain. We are not merely an event organizer — we are a <strong class="text-charcoal">year-round, impact-driven, pan-African organization</strong> committed to transforming the coconut landscape across the continent.</p>
                <p class="text-slate leading-relaxed">Through enterprise development, environmental conservation, heritage tourism, education, innovation, strategic partnerships, and community empowerment, we are creating a sustainable coconut economy that benefits farmers, entrepreneurs, communities, and nations across Africa.</p>
                <p class="text-slate leading-relaxed">Our work is inspired by the urgent need for economic diversification, environmental sustainability, youth and women empowerment, and the preservation of Africa's rich cultural heritage. We believe the coconut industry has the capacity to create millions of jobs, improve livelihoods, stimulate rural development, attract investment, and contribute significantly to national and continental economic growth.</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Bar -->
<section class="py-12 bg-gradient-to-r from-forest via-primary to-forest-deeper" x-data="{ visible: false }" x-intersect="visible = true">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center" x-show="visible" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                <div class="text-3xl md:text-4xl font-heading font-bold text-palm mb-1">50,000+</div>
                <div class="text-cream/70 text-sm">Trees Planted</div>
            </div>
            <div class="text-center" x-show="visible" x-transition:enter="transition ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                <div class="text-3xl md:text-4xl font-heading font-bold text-palm mb-1">100+</div>
                <div class="text-cream/70 text-sm">Communities Reached</div>
            </div>
            <div class="text-center" x-show="visible" x-transition:enter="transition ease-out duration-500 delay-200" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                <div class="text-3xl md:text-4xl font-heading font-bold text-palm mb-1">2,000+</div>
                <div class="text-cream/70 text-sm">Youth Empowered</div>
            </div>
            <div class="text-center" x-show="visible" x-transition:enter="transition ease-out duration-500 delay-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                <div class="text-3xl md:text-4xl font-heading font-bold text-palm mb-1">40+</div>
                <div class="text-cream/70 text-sm">Partners & Sponsors</div>
            </div>
        </div>
    </div>
</section>

<!-- Vision and Mission -->
<section class="py-8 md:py-12 lg:py-16 bg-white" x-data="{ visible: false }" x-intersect="visible = true">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" x-show="visible" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Our Direction</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Vision & Mission</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <div class="bg-gradient-to-br from-primary/5 to-primary/10 rounded-card p-10 shadow-card border border-primary/10 relative overflow-hidden group hover:shadow-xl transition-all duration-500 hover:-translate-y-1"
                 x-show="visible" x-transition:enter="transition ease-out duration-700 delay-200" x-transition:enter-start="opacity-0 translate-x-8">
                <div class="absolute top-0 right-0 w-40 h-40 bg-primary/5 rounded-full -translate-y-1/2 translate-x-1/2 group-hover:scale-[2] transition-transform duration-1000"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-primary/5 rounded-full translate-y-1/2 -translate-x-1/2 group-hover:scale-[2] transition-transform duration-1000"></div>
                <div class="relative">
                    <div class="w-14 h-14 bg-primary/10 rounded-btn flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-primary/20 transition-all duration-300">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-charcoal mb-4">Our Vision</h3>
                    <p class="text-slate leading-relaxed">To build a thriving and globally competitive coconut industry that drives economic prosperity, environmental sustainability, cultural preservation, and inclusive development across Africa.</p>
                </div>
            </div>
            <div class="bg-gradient-to-br from-gold/5 to-gold/10 rounded-card p-10 shadow-card border border-gold/10 relative overflow-hidden group hover:shadow-xl transition-all duration-500 hover:-translate-y-1"
                 x-show="visible" x-transition:enter="transition ease-out duration-700 delay-400" x-transition:enter-start="opacity-0 -translate-x-8">
                <div class="absolute top-0 right-0 w-40 h-40 bg-gold/5 rounded-full -translate-y-1/2 translate-x-1/2 group-hover:scale-[2] transition-transform duration-1000"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-gold/5 rounded-full translate-y-1/2 -translate-x-1/2 group-hover:scale-[2] transition-transform duration-1000"></div>
                <div class="relative">
                    <div class="w-14 h-14 bg-gold/10 rounded-btn flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-gold/20 transition-all duration-300">
                        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-2xl text-charcoal mb-4">Our Mission</h3>
                    <p class="text-slate leading-relaxed">To promote and preserve Africa's coconut heritage through advocacy, education, tourism, entrepreneurship, innovation, strategic partnerships, and sustainable value-chain development while empowering communities and future generations to benefit from the vast opportunities within the coconut sector.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Strategic Pillars -->
<section class="py-8 md:py-12 lg:py-16" x-data="{ visible: false }" x-intersect="visible = true">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" x-show="visible" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Our Framework</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Strategic Pillars</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">Our work is organized around five interconnected strategic pillars that guide every initiative, programme, and partnership we undertake.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @forelse($pillars as $index => $pillar)
            @php
                $accentColors = [
                    'emerald' => ['hex' => '#059669', 'bg' => 'rgba(5,150,105,0.08)'],
                    'teal' => ['hex' => '#0d9488', 'bg' => 'rgba(13,148,136,0.08)'],
                    'amber' => ['hex' => '#d97706', 'bg' => 'rgba(217,119,6,0.08)'],
                    'blue' => ['hex' => '#2563eb', 'bg' => 'rgba(37,99,235,0.08)'],
                    'purple' => ['hex' => '#7c3aed', 'bg' => 'rgba(124,58,237,0.08)'],
                    'rose' => ['hex' => '#e11d48', 'bg' => 'rgba(225,29,72,0.08)'],
                    'primary' => ['hex' => '#2d6a4f', 'bg' => 'rgba(45,106,79,0.08)'],
                    'palm' => ['hex' => '#d4a373', 'bg' => 'rgba(212,163,115,0.08)'],
                ];
                $accent = $accentColors[$pillar->color] ?? ['hex' => '#2d6a4f', 'bg' => 'rgba(45,106,79,0.08)'];
            @endphp
            <div class="group bg-white rounded-card overflow-hidden shadow-card hover:shadow-xl transition-all duration-500 border border-gray-100 hover:-translate-y-1"
                 x-show="visible" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" style="transition-delay: {{ $index * 100 }}ms">
                <div class="h-1.5 transition-all duration-500 group-hover:h-2" style="background-color: {{ $accent['hex'] }};"></div>
                <div class="p-6">
                    <div class="w-12 h-12 rounded-btn flex items-center justify-center mb-4 transition-all duration-300 group-hover:scale-110 group-hover:rotate-3" style="background-color: {{ $accent['bg'] }};">
                        @if($pillar->icon)
                        <img src="{{ $pillar->icon }}" alt="{{ $pillar->name }}" class="w-6 h-6">
                        @else
                        <svg class="w-6 h-6" style="color: {{ $accent['hex'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        @endif
                    </div>
                    <h3 class="font-heading font-bold text-lg text-charcoal mb-2" style="color: {{ $accent['hex'] }};">{{ $pillar->name }}</h3>
                    <p class="text-slate text-sm leading-relaxed mb-3">{{ $pillar->description }}</p>
                    @if($pillar->programs_count > 0)
                    <span class="inline-flex items-center text-xs font-medium px-2.5 py-1 rounded-full transition-all duration-300" style="background-color: {{ $accent['bg'] }}; color: {{ $accent['hex'] }};">
                        {{ $pillar->programs_count }} programme{{ $pillar->programs_count != 1 ? 's' : '' }}
                    </span>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-8">
                <p class="text-slate">Our strategic pillars framework is being developed. Check back soon.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-10" x-show="visible" x-transition:enter="transition ease-out duration-700 delay-500" x-transition:enter-start="opacity-0 translate-y-8">
            <a href="{{ route('programs') }}" class="inline-flex items-center px-8 py-3 bg-primary hover:bg-forest text-white font-heading font-semibold rounded-btn transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 shadow-md hover:shadow-lg">
                Explore Our Programmes
                <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- Our History -->
<section class="py-8 md:py-12 lg:py-16 bg-white" x-data="{ visible: false }" x-intersect="visible = true">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-content mx-auto">
            <div class="text-center mb-12" x-show="visible" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8">
                <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Our Journey</span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Our History</h2>
            </div>
            <div class="relative" x-show="visible">
                <!-- Timeline line -->
                <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-primary via-gold to-primary transform md:-translate-x-1/2"></div>

                <div class="space-y-12">
                    @php
                        $milestoneColors = ['primary' => '#0D5E24', 'gold' => '#C67A2B', 'palm' => '#84CC16'];
                        $milestones = [
                            ['side' => 'left', 'icon' => 'M12 6v6m0 0v6m0-6h6m-6 0H6', 'color' => 'primary', 'title' => 'Foundation & Vision', 'text' => 'AFRICOCO was founded with a bold vision — to transform Africa\'s coconut sector from an underutilized resource into a thriving economic engine that drives sustainable development, creates jobs, and preserves cultural heritage.'],
                            ['side' => 'right', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'color' => 'gold', 'title' => 'AgunkeFest — A Flagship is Born', 'text' => 'The inaugural AgunkeFest (International Coconut Heritage Festival) was launched, establishing a powerful platform for coconut advocacy, cultural celebration, industry networking, and community engagement in Badagry.'],
                            ['side' => 'left', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'color' => 'primary', 'title' => 'Growth & Expansion', 'text' => 'AFRICOCO expanded its programmes beyond the festival, launching tree-planting campaigns, youth agribusiness bootcamps, women empowerment initiatives, school awareness programmes, and research collaborations across Nigeria.'],
                            ['side' => 'right', 'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'palm', 'title' => 'Pan-African Vision', 'text' => 'Today, AFRICOCO is recognized as Africa\'s leading coconut ecosystem development organization, driving impact across the continent through strategic partnerships with governments, development agencies, corporate partners, and international organizations.'],
                        ];
                    @endphp

                    @foreach($milestones as $i => $milestone)
                    @php $bgColor = $milestoneColors[$milestone['color']] ?? '#0D5E24'; @endphp
                    <div class="relative flex flex-col md:flex-row items-start gap-8"
                         x-show="visible"
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0 translate-y-8"
                         style="transition-delay: {{ $i * 200 }}ms">
                        <div class="{{ $milestone['side'] === 'left' ? 'flex md:w-1/2 md:justify-end' : 'md:w-1/2 md:ml-auto' }}">
                            <div class="bg-cream rounded-card p-6 shadow-card hover:shadow-lg transition-all duration-300 ml-16 md:ml-0 {{ $milestone['side'] === 'left' ? 'md:mr-8' : 'md:ml-8' }}">
                                <h3 class="font-heading font-bold text-lg text-charcoal">{{ $milestone['title'] }}</h3>
                                <p class="text-slate text-sm mt-2 leading-relaxed">{{ $milestone['text'] }}</p>
                            </div>
                        </div>
                        <div class="absolute left-0 md:left-1/2 w-16 h-16 rounded-full flex items-center justify-center shadow-lg transform md:-translate-x-1/2 border-4 border-white z-10 transition-all duration-300 hover:scale-110" style="background-color: {{ $bgColor }};">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $milestone['icon'] }}"/></svg>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Coconut Matters -->
<section class="py-8 md:py-12 lg:py-16" x-data="{ visible: false }" x-intersect="visible = true">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" x-show="visible" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Why Coconut</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Why Coconut Matters</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">The coconut tree is one of nature's most valuable resources, offering immense potential for economic growth, environmental sustainability, and community development across Africa.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-cream rounded-card p-8 shadow-card text-center group hover:shadow-xl transition-all duration-500 hover:-translate-y-1"
                 x-show="visible" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" style="transition-delay: 100ms">
                <div class="w-16 h-16 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-5 group-hover:bg-primary/10 group-hover:scale-110 transition-all duration-300">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-xl text-charcoal mb-3">Economic Impact</h3>
                <p class="text-slate text-sm leading-relaxed">Creating jobs, improving livelihoods, and stimulating rural development through the coconut value chain across Africa.</p>
            </div>
            <div class="bg-cream rounded-card p-8 shadow-card text-center group hover:shadow-xl transition-all duration-500 hover:-translate-y-1"
                 x-show="visible" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" style="transition-delay: 200ms">
                <div class="w-16 h-16 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-5 group-hover:bg-primary/10 group-hover:scale-110 transition-all duration-300">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-xl text-charcoal mb-3">Environmental Benefits</h3>
                <p class="text-slate text-sm leading-relaxed">Promoting sustainable agriculture, restoring plantations, and contributing to climate resilience and biodiversity conservation.</p>
            </div>
            <div class="bg-cream rounded-card p-8 shadow-card text-center group hover:shadow-xl transition-all duration-500 hover:-translate-y-1"
                 x-show="visible" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" style="transition-delay: 300ms">
                <div class="w-16 h-16 bg-primary/5 rounded-btn flex items-center justify-center mx-auto mb-5 group-hover:bg-primary/10 group-hover:scale-110 transition-all duration-300">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-heading font-bold text-xl text-charcoal mb-3">Community Development</h3>
                <p class="text-slate text-sm leading-relaxed">Empowering youth, women, and local communities through skills development, training, and economic opportunities.</p>
            </div>
        </div>
    </div>
</section>

<!-- AgunkeFest – Flagship Programme -->
<section class="py-8 md:py-12 lg:py-16 bg-gradient-to-br from-forest/5 to-primary/5" x-data="{ visible: false }" x-intersect="visible = true">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-content mx-auto">
            <div class="text-center mb-10" x-show="visible" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8">
                <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Flagship Programme</span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">AgunkeFest — International Coconut Heritage Festival</h2>
                <p class="text-slate mt-4 max-w-2xl mx-auto">One of AFRICOCO's flagship programmes, celebrating Africa's coconut heritage and driving industry development.</p>
            </div>
            <div class="max-w-content mx-auto">
                <div class="space-y-4" x-show="visible" x-transition:enter="transition ease-out duration-700 delay-200" x-transition:enter-start="opacity-0 translate-y-8">
                    <p class="text-lg font-medium text-charcoal">The annual International Coconut Heritage Festival, popularly known as <strong>AgunkeFest</strong>, is one of AFRICOCO's flagship programmes.</p>
                    <p class="text-slate leading-relaxed">The festival serves as a powerful platform for bringing together farmers, researchers, investors, government agencies, development partners, cultural stakeholders, entrepreneurs, and the general public to celebrate, promote, and explore opportunities within the coconut industry.</p>
                    <p class="text-slate leading-relaxed">Through exhibitions, business forums, cultural performances, awards, workshops, and networking sessions, AgunkeFest has become a leading platform for coconut advocacy and industry development in Nigeria and across Africa.</p>
                    <div class="flex flex-wrap gap-3 mt-6">
                        <span class="inline-flex items-center px-3 py-1.5 bg-primary/5 text-primary text-sm rounded-full transition-all duration-300 hover:bg-primary/10"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Exhibitions</span>
                        <span class="inline-flex items-center px-3 py-1.5 bg-primary/5 text-primary text-sm rounded-full transition-all duration-300 hover:bg-primary/10"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Business Forums</span>
                        <span class="inline-flex items-center px-3 py-1.5 bg-primary/5 text-primary text-sm rounded-full transition-all duration-300 hover:bg-primary/10"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Cultural Performances</span>
                        <span class="inline-flex items-center px-3 py-1.5 bg-primary/5 text-primary text-sm rounded-full transition-all duration-300 hover:bg-primary/10"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Workshops</span>
                        <span class="inline-flex items-center px-3 py-1.5 bg-primary/5 text-primary text-sm rounded-full transition-all duration-300 hover:bg-primary/10"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Awards</span>
                        <span class="inline-flex items-center px-3 py-1.5 bg-primary/5 text-primary text-sm rounded-full transition-all duration-300 hover:bg-primary/10"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Networking</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Impact -->
<section class="py-8 md:py-12 lg:py-16 bg-white" x-data="{ visible: false }" x-intersect="visible = true">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-content mx-auto">
            <div class="text-center mb-12" x-show="visible" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8">
                <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Our Impact</span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Making a Difference Across Africa</h2>
                <p class="text-slate mt-4 max-w-2xl mx-auto">Through our strategic initiatives, AFRICOCO continues to drive measurable, meaningful change across the continent.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" x-show="visible" x-transition:enter="transition ease-out duration-700 delay-200">
                @php $impacts = [
                    ['title' => 'Coconut Cultivation & Plantation Restoration', 'text' => 'Promoting the planting of thousands of coconut trees and restoration of plantations across coastal communities.'],
                    ['title' => 'Public Awareness & Economic Advocacy', 'text' => 'Increasing awareness of the economic importance of the coconut industry among policymakers, investors, and the public.'],
                    ['title' => 'Youth & Women Empowerment', 'text' => 'Supporting youth and women participation in coconut agribusiness through training, funding access, and mentorship.'],
                    ['title' => 'Investment Facilitation', 'text' => 'Encouraging investment across the coconut value chain through business forums, matchmaking, and policy advocacy.'],
                    ['title' => 'Partnerships & Stakeholder Engagement', 'text' => 'Strengthening partnerships among government agencies, private sector, civil society, and international organizations.'],
                    ['title' => 'Tourism & Cultural Heritage', 'text' => 'Promoting agro-tourism and cultural heritage preservation in coconut-growing communities, particularly Badagry.'],
                    ['title' => 'Knowledge Sharing & Capacity Development', 'text' => 'Facilitating research, training, and knowledge exchange to build capacity across the coconut value chain.'],
                    ['title' => 'Environmental Sustainability', 'text' => 'Supporting environmental sustainability through tree planting, coastal conservation, and climate resilience initiatives.'],
                ]; @endphp

                @foreach($impacts as $i => $impact)
                <div class="group flex items-start p-6 bg-cream rounded-card shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5"
                     style="transition-delay: {{ $i * 50 }}ms">
                    <div class="w-10 h-10 bg-primary/5 rounded-btn flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:bg-primary/10 group-hover:scale-110 transition-all duration-300">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="font-heading font-bold text-charcoal">{{ $impact['title'] }}</h4>
                        <p class="text-slate text-sm mt-1 leading-relaxed">{{ $impact['text'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Our Commitment -->
<section class="py-8 md:py-12 lg:py-16 bg-gradient-to-br from-forest/5 to-primary/5" x-data="{ visible: false }" x-intersect="visible = true">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-content mx-auto text-center" x-show="visible" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Our Promise</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal mb-6">Our Commitment</h2>
            <div class="bg-white/60 backdrop-blur-sm rounded-card p-8 md:p-12 shadow-card border border-white/80">
                <p class="text-slate leading-relaxed text-lg">At AFRICOCO, we are committed to building a future where the coconut industry serves as a powerful driver of economic transformation, environmental stewardship, cultural preservation, and sustainable development across Africa. Through innovation, collaboration, and community engagement, we continue to create pathways for prosperity while preserving a heritage that can benefit generations to come.</p>
                <div class="w-16 h-1 bg-gradient-to-r from-primary to-palm rounded-full mx-auto my-6"></div>
                <p class="text-slate leading-relaxed text-lg italic">Together, we are growing opportunities, preserving heritage, and building a sustainable future through the power of the coconut.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
@if(isset($team) && $team->count() > 0)
<section class="py-8 md:py-12 lg:py-16 bg-white" x-data="{ visible: false }" x-intersect="visible = true">
    <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" x-show="visible" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8">
            <span class="inline-block px-4 py-2 bg-primary/5 rounded-full text-primary text-sm font-medium mb-4">Our Team</span>
            <h2 class="font-heading font-bold text-3xl md:text-4xl text-charcoal">Leadership</h2>
            <p class="text-slate mt-4 max-w-2xl mx-auto">Meet the dedicated team driving AFRICOCO's mission across Africa.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($team as $index => $member)
            <div class="group bg-white rounded-card overflow-hidden shadow-card hover:shadow-xl transition-all duration-500 border border-gray-100 hover:-translate-y-1"
                 x-show="visible" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8" style="transition-delay: {{ $index * 100 }}ms">
                @if($member->photo)
                <div class="overflow-hidden">
                    <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                @else
                <div class="w-full h-60 bg-gradient-to-br from-primary/10 to-forest/10 flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                    <svg class="w-16 h-16 text-primary/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                @endif
                <div class="p-5 text-center">
                    <h3 class="font-heading font-bold text-lg text-charcoal group-hover:text-primary transition-colors duration-300">{{ $member->name }}</h3>
                    <p class="text-primary text-sm font-medium">{{ $member->position }}</p>
                    @if($member->bio)
                    <p class="text-slate text-sm mt-2 line-clamp-2 leading-relaxed">{{ $member->bio }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-8 md:py-12 bg-gradient-to-br from-forest to-primary text-white relative overflow-hidden" x-data="{ visible: false }" x-intersect="visible = true">
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-10 left-10 w-40 h-40 bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-60 h-60 bg-palm/5 rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-container mx-auto px-4 sm:px-6 lg:px-8 text-center" x-show="visible" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8">
        <h2 class="font-heading font-bold text-3xl md:text-4xl mb-6">Join Our Mission</h2>
        <p class="text-cream/90 text-lg max-w-2xl mx-auto mb-10">Be part of Africa's coconut revolution. Whether you're a farmer, investor, partner, or volunteer, there's a role for you in building a sustainable coconut future.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('corporate-partnerships') }}" class="px-8 py-3 bg-palm text-forest font-heading font-semibold rounded-btn hover:bg-palm/90 transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 shadow-lg hover:shadow-xl">Become a Partner</a>
            <a href="{{ route('volunteer') }}" class="px-8 py-3 border-2 border-white/30 text-white hover:bg-white/10 font-heading font-semibold rounded-btn transition-all duration-300 hover:-translate-y-0.5">Volunteer With Us</a>
            <a href="{{ route('contact') }}" class="px-8 py-3 border-2 border-palm text-palm hover:bg-palm hover:text-forest font-heading font-semibold rounded-btn transition-all duration-300 hover:-translate-y-0.5">Contact Us</a>
        </div>
    </div>
</section>

<!-- Alpine.js Intersect plugin for scroll animations -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.directive('intersect', (el, { value, expression, modifiers }, { evaluate }) => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if (expression) evaluate(expression);
                        observer.unobserve(el);
                    }
                });
            }, { threshold: 0.1 });
            observer.observe(el);
        });
    });
</script>
@endsection
