<nav class="panel navbar px-4">
    <div class="flex-1 gap-1">
        <a href="{{ route('home') }}"
           class="btn btn-ghost btn-sm {{ request()->routeIs('home') ? 'text-primary' : '' }}">Verein</a>
        <span class="opacity-40">/</span>
        <a href="{{ route('workshops.index') }}"
           class="btn btn-ghost btn-sm {{ request()->routeIs('workshops.*') ? 'text-primary' : '' }}">Workshops</a>
        <span class="opacity-40">/</span>
        <a href="{{ route('dashboard') }}"
           class="btn btn-ghost btn-sm {{ request()->routeIs('dashboard') ? 'text-primary' : '' }}">Dashboard</a>
    </div>

    <div class="flex-none flex items-center gap-1">

        {{-- Nachrichten --}}
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
                    </svg>
                    <span class="badge badge-primary badge-xs indicator-item">2</span>
                </div>
            </div>

            <ul tabindex="0" class="menu menu-sm dropdown-content panel z-10 mt-3 w-72 p-2 shadow-xl">
                <li class="menu-title">Nachrichten</li>

                {{-- Später mit Notifications, z. B.:
                @forelse (auth()->user()->unreadNotifications as $notification)
                    <li><a>{{ $notification->data['message'] }}</a></li>
                @empty
                    <li class="disabled"><a>Keine neuen Nachrichten</a></li>
                @endforelse
                --}}

                <li><a>Neue Anmeldung zu Workshop 1</a></li>
                <li><a>Workshop 2 wurde verschoben</a></li>
            </ul>
        </div>

        {{-- Name --}}
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-sm">Name</div>

            <ul tabindex="0" class="menu menu-sm dropdown-content panel z-10 mt-3 w-44 p-2 shadow-xl">
                <li>
{{--                    <form method="POST" action="{{ route('logout') }}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="w-full text-left">Logout</button>--}}
{{--                    </form>--}}
                </li>
            </ul>
        </div>

    </div>
</nav>
