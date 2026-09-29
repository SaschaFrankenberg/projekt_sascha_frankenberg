<nav class="navbar bg-base-100 rounded-box border border-base-300 shadow-sm px-4">
    <div class="flex-1 gap-1">
        <a href="{{ route('welcome') }}"
           class="btn btn-sm {{ request()->routeIs('welcome') ? 'btn-primary' : 'btn-ghost hover:bg-base-200' }}">
            Verein
        </a>
        <a href="{{ route('workshops.index') }}"
           class="btn btn-sm {{ request()->routeIs('workshops.*') ? 'btn-primary' : 'btn-ghost hover:bg-base-200' }}">
            Workshops
        </a>
        @auth
            <a href="{{ route('dashboard') }}"
               class="btn btn-sm {{ request()->routeIs('dashboard') ? 'btn-primary' : 'btn-ghost hover:bg-base-200' }}">
                Dashboard
            </a>
        @endauth
    </div>

    <div class="flex-none flex items-center gap-1">

        @auth
            {{-- Nachrichten --}}
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle hover:bg-base-200">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                        </svg>
                        <span class="badge badge-primary badge-xs indicator-item">2</span>
                    </div>
                </div>

                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box border border-base-300 z-10 mt-3 w-72 p-2 shadow-lg">
                    <li class="menu-title">Nachrichten</li>
                    <li><a class="hover:bg-base-200">Neue Anmeldung zu Workshop 1</a></li>
                    <li><a class="hover:bg-base-200">Workshop 2 wurde verschoben</a></li>
                </ul>
            </div>

            {{-- Name --}}
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-sm hover:bg-base-200">
                    {{ auth()->user()->name }}
                </div>

                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box border border-base-300 z-10 mt-3 w-44 p-2 shadow-lg">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left hover:bg-base-200 rounded-md px-3 py-2">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            {{-- Login-Button als Ersatz, wenn niemand angemeldet ist --}}
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm hover:brightness-110">
                Login
            </a>
        @endauth

    </div>
</nav>
