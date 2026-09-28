<nav class="navbar bg-base-100 rounded-box border">
    <div class="flex-1">
        <a href="{{ route('home') }}" class="btn btn-ghost btn-sm">Verein</a>
        /
        <a href="{{ route('workshops.index') }}" class="btn btn-ghost btn-sm">Workshops</a>
        /
{{--        <a href="{{ route('dashboard') }}" class="btn btn-ghost btn-sm">Dashboard</a>--}}
    </div>

    <div class="flex-none flex items-center gap-2">
        {{-- Name mit Nachrichten-Dropdown --}}
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-sm">
                Name
                <span class="badge badge-primary badge-sm">2</span>
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box w-64 p-2 shadow border z-10">
                <li class="menu-title">Nachrichten</li>
                <li><a>Nachricht 1</a></li>
                <li><a>Nachricht 2</a></li>
            </ul>
        </div>

{{--        <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Login</a>--}}
    </div>
</nav>
