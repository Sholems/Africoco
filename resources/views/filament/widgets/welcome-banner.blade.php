<div class="overflow-hidden rounded-xl welcome-banner-gradient relative p-6 sm:p-8">
    <!-- Decorative blur orbs for depth -->
    <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
    <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-amber-300/15 rounded-full blur-xl"></div>
    <div class="absolute top-1/2 right-1/4 w-24 h-24 bg-emerald-300/10 rounded-full blur-xl"></div>

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 relative z-10">
        <div class="flex-1">
            <div class="flex items-center gap-3 mb-1">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/20 backdrop-blur-sm ring-1 ring-white/30 shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-white sm:text-2xl tracking-tight">
                        Welcome back, {{ auth()->user()->name }}
                    </h2>
                    <p class="text-sm text-emerald-100/90 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ now()->format('l, F j, Y') }}
                        <span class="w-1 h-1 rounded-full bg-emerald-200/50"></span>
                        African Coconut Development Initiative
                    </p>
                </div>
            </div>
            <p class="mt-3 text-sm leading-relaxed text-emerald-50/90 max-w-2xl">
                Manage your content, review volunteer applications, monitor event registrations, and keep your
                website up to date — all from one place. Use the quick actions above to jump into
                common tasks.
            </p>
        </div>

        <!-- Quick summary badges -->
        <div class="flex flex-wrap gap-3 flex-shrink-0">
            <div class="flex items-center gap-2 px-3 py-2 bg-white/15 backdrop-blur-sm rounded-lg ring-1 ring-white/20">
                <svg class="w-4 h-4 text-amber-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span class="text-xs font-medium text-white">{{ now()->format('g:i A') }}</span>
            </div>
            <div class="flex items-center gap-2 px-3 py-2 bg-white/15 backdrop-blur-sm rounded-lg ring-1 ring-white/20">
                <svg class="w-4 h-4 text-amber-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span class="text-xs font-medium text-white">{{ auth()->user()->getRoleNames()->implode(', ') }}</span>
            </div>
        </div>
    </div>
</div>
