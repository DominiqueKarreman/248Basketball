<nav x-data="{ open: false }" class="bg-black border-b border-gray-800">
    meta
    
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @can('viewAny', App\Models\Event::class)
                        <x-nav-link href="{{ route('events.index') }}" :active="request()->routeIs('events.index')">
                            {{ __('Evenementen') }}
                        </x-nav-link>
                    @endcan
                    @can('viewAny', App\Models\Veld::class)
                        <x-nav-link href="{{ route('velden.index') }}" :active="request()->routeIs('velden.index')">
                            {{ __('Velden') }}
                        </x-nav-link>
                    @endcan
                    @can('viewAny', App\Models\User::class)
                        <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                            {{ __('Users') }}
                        </x-nav-link>
                    @endcan
                    @can('viewAny', Spatie\Permission\Models\Role::class)
                        <x-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')">
                            {{ __('Rechten') }}
                        </x-nav-link>
                    @endcan
                    @can('viewAny', App\Models\ContactMessage::class)
                        <x-nav-link href="{{ route('contact.feedback') }}" :active="request()->routeIs('contact.feedback')">
                            {{ __('Feedback') }}
                        </x-nav-link>
                    @endcan
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                

                <!-- Settings Dropdown -->
                <div class="ml-3 relative bg-black">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    @if (!Auth::user()->profile_photo_path)
                                        <img src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" class="h-8 w-8 rounded-full object-cover">
                                    @else
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="/storage/{{ Auth::user()->profile_photo_path }}"
                                            alt="{{ Auth::user()->name }}" />
                                    @endif
                       
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-zinc-700 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block bg-zinc-800 px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-black"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @can('viewAny', App\Models\Event::class)
                <x-responsive-nav-link href="{{ route('events.index') }}" :active="request()->routeIs('events.index')">
                    {{ __('Evenementen') }}
                </x-responsive-nav-link>
            @endcan
            <x-responsive-nav-link href="{{ route('velden.index') }}" :active="request()->routeIs('velden.index')">
                {{ __('Velden') }}
            </x-responsive-nav-link>
            @can('viewAny', App\Models\User::class)
                <x-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                    {{ __('Users') }}
                </x-responsive-nav-link>
            @endcan
            @can('viewAny', Spatie\Permission\Models\Role::class)
                <x-responsive-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')">
                    {{ __('Rechten') }}
                </x-responsive-nav-link>
            @endcan
            @can('viewAny', App\Models\ContactMessage::class)
                <x-responsive-nav-link href="{{ route('contact.feedback') }}" :active="request()->routeIs('contact.feedback')">
                    {{ __('Feedback') }}
                </x-responsive-nav-link>
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        @if (!Auth::user()->profile_photo_path)
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                class="h-10 w-10 rounded-full object-cover">
                        @else
                            <img class="h-10 w-10 rounded-full object-cover"
                                src="/storage/{{ Auth::user()->profile_photo_path }}"
                                alt="{{ Auth::user()->name }}" />
                        @endif

                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    {{-- <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link> --}}

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-switchable-team :team="$team" component="responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
<style>
    body {
        background-color: black;
    }
</style>