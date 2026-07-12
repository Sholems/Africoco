<x-guest-layout>
    <div class="mb-8">
        <div class="mb-5 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-primary/8 text-primary">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2Zm10-10V7a4 4 0 0 0-8 0v4h8Z" />
            </svg>
        </div>
        <h1 class="font-heading text-2xl font-bold text-charcoal">Welcome back</h1>
        <p class="mt-2 text-sm leading-6 text-slate">
            Sign in to continue managing the AFRICOCO dashboard.
        </p>
    </div>

    <x-auth-session-status class="mb-5 rounded-input border border-primary/10 bg-primary/5 px-4 py-3 text-sm font-medium text-primary" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-semibold text-charcoal">{{ __('Email address') }}</label>
            <input
                id="email"
                class="mt-2 block w-full rounded-input border border-gray-200 bg-cream/60 px-4 py-3 text-charcoal shadow-sm transition duration-200 placeholder:text-slate/45 focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/15"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="you@example.com"
            >
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex items-center justify-between gap-4">
                <label for="password" class="block text-sm font-semibold text-charcoal">{{ __('Password') }}</label>
                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-primary transition hover:text-forest-deeper focus:outline-none focus:ring-2 focus:ring-primary/20 focus:ring-offset-2" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>
            <input
                id="password"
                class="mt-2 block w-full rounded-input border border-gray-200 bg-cream/60 px-4 py-3 text-charcoal shadow-sm transition duration-200 placeholder:text-slate/45 focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/15"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Enter your password"
            >
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between gap-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary" name="remember">
                <span class="ms-2 text-sm text-slate">{{ __('Remember me') }}</span>
            </label>
        </div>

        <button type="submit" class="inline-flex w-full items-center justify-center rounded-btn bg-primary px-5 py-3 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-forest-deeper focus:outline-none focus:ring-2 focus:ring-primary/30 focus:ring-offset-2">
            {{ __('Log in') }}
        </button>

        <div class="border-t border-gray-100 pt-5 text-center text-sm text-slate">
            @if (Route::has('register'))
                <span>{{ __('Need access?') }}</span>
                <a class="font-semibold text-primary transition hover:text-forest-deeper focus:outline-none focus:ring-2 focus:ring-primary/20 focus:ring-offset-2" href="{{ route('register') }}">
                    {{ __('Create an account') }}
                </a>
            @else
                <span>{{ __('Need access? Contact your AFRICOCO administrator.') }}</span>
            @endif
        </div>
    </form>
</x-guest-layout>
