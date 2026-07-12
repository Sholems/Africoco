<div class="af-auth">
<style>
    /* Hallmark · macrostructure: Split Portal · tone: restrained admin · anchor hue: coconut green */
    :root {
        --auth-paper: oklch(98.4% 0.012 88);
        --auth-paper-2: oklch(95.8% 0.026 91);
        --auth-ink: oklch(21.4% 0.026 257);
        --auth-muted: oklch(48.5% 0.033 258);
        --auth-rule: oklch(88.8% 0.025 92);
        --auth-accent: oklch(42.5% 0.121 148);
        --auth-accent-2: oklch(64.8% 0.151 139);
        --auth-accent-ink: oklch(98.6% 0.01 145);
        --auth-danger: oklch(55.5% 0.188 27);
        --auth-focus: oklch(69.8% 0.149 142);
        --auth-shadow: 0 24px 70px rgba(13, 94, 36, 0.14);
        --auth-radius-card: 24px;
        --auth-radius-input: 14px;
        --auth-ease-out: cubic-bezier(0.16, 1, 0.3, 1);
    }

    html,
    body {
        overflow-x: clip;
    }

    .af-auth {
        min-height: 100vh;
        display: grid;
        grid-template-columns: minmax(0, 1.08fr) minmax(440px, 0.92fr);
        background:
            linear-gradient(90deg, rgba(253, 248, 238, 0.98), rgba(253, 248, 238, 0.84)),
            var(--auth-paper);
        color: var(--auth-ink);
        font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    .af-auth__brand {
        position: relative;
        min-width: 0;
        overflow: hidden;
        padding: clamp(28px, 5vw, 72px);
        display: flex;
        align-items: stretch;
        background:
            linear-gradient(135deg, rgba(6, 66, 26, 0.96), rgba(13, 94, 36, 0.91) 52%, rgba(47, 158, 68, 0.82)),
            var(--auth-accent);
        color: var(--auth-accent-ink);
    }

    .af-auth__brand::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255,255,255,0.075) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.075) 1px, transparent 1px);
        background-size: 56px 56px;
        mask-image: linear-gradient(135deg, rgba(0,0,0,0.7), transparent 74%);
        pointer-events: none;
    }

    .af-auth__brand::after {
        content: "";
        position: absolute;
        width: 420px;
        height: 420px;
        right: -160px;
        bottom: -170px;
        border-radius: 999px;
        background: rgba(132, 204, 22, 0.2);
        filter: blur(20px);
        pointer-events: none;
    }

    .af-auth__brand-inner {
        position: relative;
        z-index: 1;
        width: min(100%, 620px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 48px;
    }

    .af-auth__logo-block {
        display: inline-flex;
        width: fit-content;
        align-items: center;
        gap: 14px;
        border: 1px solid rgba(255,255,255,0.14);
        border-radius: 18px;
        background: rgba(255,255,255,0.09);
        padding: 12px 16px;
        backdrop-filter: blur(16px);
    }

    .af-auth__logo {
        width: 172px;
        max-width: 48vw;
        height: auto;
        display: block;
        filter: drop-shadow(0 14px 24px rgba(0,0,0,0.2));
    }

    .af-auth__eyebrow {
        margin: 0 0 16px;
        color: rgba(255,255,255,0.72);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .af-auth__title {
        margin: 0;
        max-width: 11ch;
        color: #fff;
        font-family: Poppins, Inter, ui-sans-serif, system-ui, sans-serif;
        font-size: clamp(2.6rem, 5vw, 5rem);
        line-height: 0.96;
        letter-spacing: -0.035em;
        overflow-wrap: anywhere;
    }

    .af-auth__copy {
        max-width: 520px;
        margin: 24px 0 0;
        color: rgba(255,255,255,0.76);
        font-size: clamp(1rem, 1.4vw, 1.15rem);
        line-height: 1.7;
    }

    .af-auth__proof {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1px;
        width: min(100%, 520px);
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.14);
        border-radius: 20px;
        background: rgba(255,255,255,0.14);
    }

    .af-auth__proof-item {
        min-width: 0;
        padding: 18px;
        background: rgba(255,255,255,0.08);
    }

    .af-auth__proof-value {
        display: block;
        color: #fff;
        font-family: Poppins, Inter, ui-sans-serif, system-ui, sans-serif;
        font-size: clamp(1.35rem, 2vw, 1.8rem);
        font-weight: 800;
        line-height: 1;
    }

    .af-auth__proof-label {
        display: block;
        margin-top: 8px;
        color: rgba(255,255,255,0.58);
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .af-auth__quote {
        margin: 0;
        max-width: 520px;
        border-top: 1px solid rgba(255,255,255,0.14);
        padding-top: 22px;
        color: rgba(255,255,255,0.56);
        font-size: 0.95rem;
        line-height: 1.7;
    }

    .af-auth__panel {
        min-width: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: clamp(24px, 5vw, 64px);
    }

    .af-auth__card-wrap {
        width: min(100%, 470px);
    }

    .af-auth__mobile-logo {
        display: none;
        margin: 0 auto 28px;
        width: min(230px, 70vw);
        height: auto;
    }

    .af-auth__card {
        border: 1px solid var(--auth-rule);
        border-radius: var(--auth-radius-card);
        background: rgba(255,255,255,0.92);
        box-shadow: var(--auth-shadow);
        padding: clamp(28px, 4vw, 42px);
    }

    .af-auth__card-kicker {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 26px;
        color: var(--auth-accent);
        font-size: 0.82rem;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .af-auth__lock {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: color-mix(in oklch, var(--auth-accent) 10%, white);
        color: var(--auth-accent);
    }

    .af-auth__card h2 {
        margin: 0;
        color: var(--auth-ink);
        font-family: Poppins, Inter, ui-sans-serif, system-ui, sans-serif;
        font-size: clamp(1.9rem, 3vw, 2.45rem);
        line-height: 1.08;
        letter-spacing: -0.025em;
    }

    .af-auth__card-text {
        margin: 10px 0 28px;
        color: var(--auth-muted);
        line-height: 1.6;
    }

    .af-auth__status {
        margin-bottom: 18px;
        border-radius: 14px;
        padding: 12px 14px;
        font-size: 0.9rem;
        font-weight: 650;
    }

    .af-auth__status--ok {
        border: 1px solid color-mix(in oklch, var(--auth-accent) 20%, white);
        background: color-mix(in oklch, var(--auth-accent) 8%, white);
        color: var(--auth-accent);
    }

    .af-auth__status--error {
        border: 1px solid color-mix(in oklch, var(--auth-danger) 20%, white);
        background: color-mix(in oklch, var(--auth-danger) 8%, white);
        color: var(--auth-danger);
    }

    .af-auth__form {
        display: grid;
        gap: 18px;
    }

    .af-auth__field {
        display: grid;
        gap: 8px;
    }

    .af-auth__field label {
        color: var(--auth-ink);
        font-size: 0.92rem;
        font-weight: 750;
    }

    .af-auth__field input {
        width: 100%;
        min-height: 48px;
        border: 1px solid var(--auth-rule);
        border-radius: var(--auth-radius-input);
        background: var(--auth-paper);
        color: var(--auth-ink);
        padding: 0 14px;
        font: inherit;
        transition: border-color 180ms var(--auth-ease-out), background 180ms var(--auth-ease-out), box-shadow 180ms var(--auth-ease-out);
    }

    .af-auth__field input:focus {
        border-color: var(--auth-accent);
        background: #fff;
        outline: none;
        box-shadow: 0 0 0 4px color-mix(in oklch, var(--auth-focus) 18%, transparent);
    }

    .af-auth__error {
        margin: 0;
        color: var(--auth-danger);
        font-size: 0.82rem;
        font-weight: 650;
    }

    .af-auth__remember {
        display: inline-flex;
        width: fit-content;
        align-items: center;
        gap: 10px;
        color: var(--auth-muted);
        font-size: 0.9rem;
        font-weight: 650;
    }

    .af-auth__remember input {
        width: 18px;
        height: 18px;
        accent-color: var(--auth-accent);
    }

    .af-auth__submit {
        min-height: 50px;
        width: 100%;
        border: 0;
        border-radius: 14px;
        background: var(--auth-accent);
        color: var(--auth-accent-ink);
        cursor: pointer;
        font: inherit;
        font-weight: 850;
        box-shadow: 0 14px 28px rgba(13, 94, 36, 0.18);
        transition: transform 180ms var(--auth-ease-out), background 180ms var(--auth-ease-out), box-shadow 180ms var(--auth-ease-out);
    }

    .af-auth__submit:hover {
        transform: translateY(-1px);
        background: color-mix(in oklch, var(--auth-accent) 84%, var(--auth-accent-2));
        box-shadow: 0 18px 34px rgba(13, 94, 36, 0.22);
    }

    .af-auth__submit:active {
        transform: translateY(0);
    }

    .af-auth .fi-fo-field-wrp-label span,
    .af-auth .fi-checkbox-input + span,
    .af-auth label {
        color: var(--auth-ink) !important;
        font-weight: 700;
    }

    .af-auth .fi-input-wrp {
        border-radius: var(--auth-radius-input) !important;
        border-color: var(--auth-rule) !important;
        background: var(--auth-paper) !important;
        box-shadow: none !important;
        transition: border-color 180ms var(--auth-ease-out), background 180ms var(--auth-ease-out), box-shadow 180ms var(--auth-ease-out);
    }

    .af-auth .fi-input-wrp:focus-within {
        border-color: var(--auth-accent) !important;
        background: #fff !important;
        box-shadow: 0 0 0 4px color-mix(in oklch, var(--auth-focus) 18%, transparent) !important;
    }

    .af-auth .fi-input {
        color: var(--auth-ink) !important;
    }

    .af-auth .fi-checkbox-input {
        color: var(--auth-accent) !important;
        border-radius: 6px !important;
    }

    .af-auth .fi-btn {
        min-height: 48px;
        border-radius: 14px !important;
        background: var(--auth-accent) !important;
        color: var(--auth-accent-ink) !important;
        font-weight: 800 !important;
        box-shadow: 0 14px 28px rgba(13, 94, 36, 0.18) !important;
        transition: transform 180ms var(--auth-ease-out), background 180ms var(--auth-ease-out), box-shadow 180ms var(--auth-ease-out);
    }

    .af-auth .fi-btn:hover {
        transform: translateY(-1px);
        background: color-mix(in oklch, var(--auth-accent) 84%, var(--auth-accent-2)) !important;
        box-shadow: 0 18px 34px rgba(13, 94, 36, 0.22) !important;
    }

    .af-auth .fi-btn:active {
        transform: translateY(0);
    }

    .af-auth .fi-btn:focus-visible,
    .af-auth a:focus-visible,
    .af-auth button:focus-visible,
    .af-auth input:focus-visible {
        outline: 3px solid var(--auth-focus) !important;
        outline-offset: 3px !important;
    }

    .af-auth__footer {
        margin: 22px 0 0;
        color: var(--auth-muted);
        text-align: center;
        font-size: 0.78rem;
    }

    @media (max-width: 1023px) {
        .af-auth {
            grid-template-columns: minmax(0, 1fr);
            background:
                linear-gradient(180deg, rgba(6,66,26,0.08), rgba(253,248,238,0.98) 34%),
                var(--auth-paper);
        }

        .af-auth__brand {
            display: none;
        }

        .af-auth__panel {
            min-height: 100vh;
        }

        .af-auth__mobile-logo {
            display: block;
        }
    }

    @media (max-width: 420px) {
        .af-auth__panel {
            padding: 18px;
        }

        .af-auth__card {
            padding: 24px 20px;
            border-radius: 20px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .af-auth *,
        .af-auth *::before,
        .af-auth *::after {
            transition-duration: 120ms !important;
            animation-duration: 120ms !important;
        }
    }
</style>
    <aside class="af-auth__brand" aria-label="AFRICOCO admin welcome">
        <div class="af-auth__brand-inner">
            <div class="af-auth__logo-block">
                <img src="{{ asset('africoco-logo.png') }}" alt="AFRICOCO" class="af-auth__logo">
            </div>

            <div>
                <p class="af-auth__eyebrow">Admin workspace</p>
                <h1 class="af-auth__title">Welcome back.</h1>
                <p class="af-auth__copy">
                    Manage AFRICOCO content, partnerships, events, and impact records from one focused dashboard.
                </p>
            </div>

            <div class="af-auth__proof" aria-label="AFRICOCO impact highlights">
                <div class="af-auth__proof-item">
                    <span class="af-auth__proof-value">50K+</span>
                    <span class="af-auth__proof-label">Trees</span>
                </div>
                <div class="af-auth__proof-item">
                    <span class="af-auth__proof-value">100+</span>
                    <span class="af-auth__proof-label">Communities</span>
                </div>
                <div class="af-auth__proof-item">
                    <span class="af-auth__proof-value">2K+</span>
                    <span class="af-auth__proof-label">Partners</span>
                </div>
            </div>

            <p class="af-auth__quote">
                Preserving Africa's coconut heritage through practical tools, careful records, and accountable action.
            </p>
        </div>
    </aside>

    <main class="af-auth__panel">
        <div class="af-auth__card-wrap">
            <img src="{{ asset('africoco-logo.png') }}" alt="AFRICOCO" class="af-auth__mobile-logo">

            <section class="af-auth__card" aria-labelledby="af-auth-title">
                <div class="af-auth__card-kicker">
                    <span class="af-auth__lock" aria-hidden="true">
                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2Zm10-10V7a4 4 0 0 0-8 0v4h8Z" />
                        </svg>
                    </span>
                    Secure sign in
                </div>

                <h2 id="af-auth-title">Admin Login</h2>
                <p class="af-auth__card-text">Use your approved AFRICOCO account to continue.</p>

                @if (session('status'))
                    <div class="af-auth__status af-auth__status--ok">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="af-auth__status af-auth__status--error">
                        {{ session('error') }}
                    </div>
                @endif

                <form id="form" class="af-auth__form" method="POST" action="{{ route('admin.login.store') }}">
                    @csrf

                    <div class="af-auth__field">
                        <label for="email">Email address</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            autocomplete="username"
                            autofocus
                            required
                        >
                        @error('email')
                            <p class="af-auth__error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="af-auth__field">
                        <label for="password">Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required
                        >
                        @error('password')
                            <p class="af-auth__error">{{ $message }}</p>
                        @enderror
                    </div>

                    <label class="af-auth__remember" for="remember">
                        <input id="remember" name="remember" type="checkbox" value="1">
                        <span>Remember me</span>
                    </label>

                    <button type="submit" class="af-auth__submit">
                        Sign in
                    </button>
                </form>
            </section>

            <p class="af-auth__footer">
                &copy; {{ date('Y') }} AFRICOCO. All rights reserved.
            </p>
        </div>
    </main>
</div>
