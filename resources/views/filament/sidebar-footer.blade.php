@auth
    <div class="af-sidebar-footer">
        <div class="af-sidebar-footer__user">
            <span class="af-sidebar-footer__name">{{ auth()->user()->name }}</span>
            <span class="af-sidebar-footer__email">{{ auth()->user()->email }}</span>
        </div>
        <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
            @csrf
            <button type="submit" class="af-sidebar-footer__logout">
                <span>Logout</span>
            </button>
        </form>
    </div>
@endauth
