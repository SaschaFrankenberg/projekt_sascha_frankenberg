<nav class="navbar bg-base-100 rounded-box border border-base-300 shadow-lg px-4">
    <div class="flex-1 gap-1">
        <a href="{{ route('welcome') }}"
           class="btn btn-sm {{ request()->routeIs('home') ? 'btn-primary' : 'btn-ghost hover:bg-base-300' }}">
            Verein
        </a>
        <a href="{{ route('workshops.index') }}"
           class="btn btn-sm {{ request()->routeIs('workshops.*') ? 'btn-primary' : 'btn-ghost hover:bg-base-300' }}">
            Workshops
        </a>
{{--        @auth--}}
{{--            <a href="{{ route('dashboard') }}"--}}
{{--               class="btn btn-sm {{ request()->routeIs('dashboard') ? 'btn-primary' : 'btn-ghost hover:bg-base-300' }}">--}}
{{--                Dashboard--}}
{{--            </a>--}}
{{--        @endauth--}}
    </div>

    <div class="flex-none flex items-center gap-1">
        @auth
            {{-- Nachrichten --}}
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle hover:bg-base-300">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
                        </svg>
                        @if (auth()->user()->unreadNotifications->count() > 0)
                            <span class="badge badge-primary badge-sm indicator-item min-w-5 h-5 px-1.5 font-bold text-xs">
                                {{ auth()->user()->unreadNotifications->count() }}
                            </span>
                        @endif
                    </div>
                </div>

                <div tabindex="0" class="dropdown-content bg-base-100 rounded-box border border-base-300 z-10 mt-3 w-72 shadow-xl">
                    <ul class="menu menu-sm p-2">
                        <li class="menu-title">Nachrichten</li>
                        @forelse (auth()->user()->unreadNotifications as $notification)
                            <li><a class="hover:bg-base-300">{{ $notification->data['message'] }}</a></li>
                        @empty
                            <li class="disabled"><a>Keine neuen Nachrichten</a></li>
                        @endforelse
                    </ul>

                    @if (auth()->user()->unreadNotifications->count() > 0)
                        <form method="POST" action="{{ route('notifications.read') }}" class="p-2 border-t border-base-300">
                            @csrf
                            <button type="submit" class="btn btn-ghost btn-xs w-full hover:bg-base-300">
                                Als gelesen markieren
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            {{-- Name --}}
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-sm hover:bg-base-300">
                    {{ auth()->user()->name }}
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box border border-base-300 z-10 mt-3 w-44 p-2 shadow-xl">
                    <li>
                        @auth
                            <a href="{{ route('dashboard') }}"
                               class="btn btn-sm {{ request()->routeIs('dashboard') ? 'btn-primary' : 'btn-ghost hover:bg-base-300' }}">
                                Dashboard
                            </a>
                        @endauth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-ghost btn-sm w-full justify-center hover:bg-base-300">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm hover:brightness-110">Login</a>
        @endauth
    </div>
</nav>
