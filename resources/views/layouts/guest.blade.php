<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('africoco-logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-charcoal antialiased">
        <div class="min-h-screen bg-cream lg:grid lg:grid-cols-[minmax(0,1fr)_minmax(460px,560px)]">
            <aside class="relative hidden overflow-hidden bg-forest-deeper lg:flex">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(132,204,22,0.18),transparent_34%),linear-gradient(135deg,rgba(13,94,36,0.92),rgba(6,66,26,0.98))]"></div>
                <div class="absolute inset-0 opacity-[0.05]" style="background-image: linear-gradient(rgba(255,255,255,0.35) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.35) 1px, transparent 1px); background-size: 44px 44px;"></div>

                <div class="relative z-10 flex min-h-screen w-full flex-col justify-between px-12 py-10 xl:px-16">
                    <a href="/" class="inline-flex w-fit items-center gap-3">
                        <img src="{{ asset('africoco-logo.png') }}" alt="AFRICOCO" class="h-12 w-auto brightness-0 invert">
                        <span class="font-heading text-lg font-semibold tracking-wide text-white">AFRICOCO</span>
                    </a>

                    <div class="max-w-xl">
                        <p class="mb-4 text-sm font-semibold uppercase tracking-[0.28em] text-palm">Admin access</p>
                        <h1 class="font-heading text-4xl font-bold leading-tight text-white xl:text-5xl">
                            Manage the work growing Africa's coconut future.
                        </h1>
                        <p class="mt-5 max-w-lg text-base leading-7 text-white/72">
                            Sign in to review programs, partners, stories, and the impact data that keeps the AFRICOCO mission moving.
                        </p>

                        <div class="mt-10 grid max-w-lg grid-cols-3 gap-4">
                            <div class="border-l border-white/18 pl-4">
                                <div class="font-heading text-2xl font-bold text-white">50K+</div>
                                <div class="mt-1 text-xs font-medium uppercase tracking-wider text-white/50">Trees</div>
                            </div>
                            <div class="border-l border-white/18 pl-4">
                                <div class="font-heading text-2xl font-bold text-white">100+</div>
                                <div class="mt-1 text-xs font-medium uppercase tracking-wider text-white/50">Communities</div>
                            </div>
                            <div class="border-l border-white/18 pl-4">
                                <div class="font-heading text-2xl font-bold text-white">2K+</div>
                                <div class="mt-1 text-xs font-medium uppercase tracking-wider text-white/50">Partners</div>
                            </div>
                        </div>
                    </div>

                    <p class="max-w-md border-t border-white/12 pt-6 text-sm leading-6 text-white/48">
                        Preserving coconut heritage through sustainable development and practical opportunity.
                    </p>
                </div>
            </aside>

            <main class="flex min-h-screen items-center justify-center px-5 py-8 sm:px-8 lg:px-10">
                <div class="w-full max-w-md">
                    <div class="mb-8 text-center lg:hidden">
                        <a href="/" class="inline-flex justify-center">
                            <img src="{{ asset('africoco-logo.png') }}" alt="AFRICOCO" class="h-14 w-auto">
                        </a>
                    </div>

                    <div class="overflow-hidden rounded-card border border-primary/10 bg-white p-6 shadow-card sm:p-8">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
