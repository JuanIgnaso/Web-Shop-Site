<nav x-data="{ open: false }" class="bg-sandrift border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                {{-- url del logo app.logomakr.com/26AYp0 --}}
                <div class="shrink-0 flex items-center w-20">
                    <a href="{{ route('dashboard') }}">
                        {{-- <img class="block h-12 w-auto "  src="{{Vite::asset('resources/images/moon-logo.png')}}" alt=""> --}}
                        <img src="{{Vite::asset('resources/images/web-logo.png')}}" alt="logo de la tienda">
                    </a>
                </div>

                <!-- Menú de Navegación superior -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')">
                        {{ __('Contactar') }}
                    </x-nav-link>
                    <x-nav-link :href="route('producto.categorias')" :active="request()->routeIs('producto.categorias')">
                        {{ __('Nuestros Productos') }}
                    </x-nav-link>
                    @if(Auth::check() && Auth::user()->claseUsuario != 1)
                    <x-nav-link :href="route('panel.index')" :active="request()->routeIs('panel.index')">
                        {{ __('Panel de Control') }}
                    </x-nav-link>
                    @endif
                </div>

            </div>


            <!-- Settings Dropdown -->
            @if(Auth::check())
            <div class="hidden sm:flex sm:items-center gap-2 sm:ms-6">

                {{-- Carrito --}}
                <x-ui.shopping-cart.main></x-ui.shopping-cart.main>

                {{-- Menú del usuario --}}
                  <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md text-linen font-black bg-sandrift hover:text-gray-700  focus:outline-none transition ease-in-out duration-150">
                            <div> {{Auth::user()->name}} </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- Iniciar sesión/registrarse --}}
            @else
                <div class="flex gap-4 text-sm text-white">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Iniciar Sesión') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Registrarse') }}
                    </x-nav-link>
                </div>
            @endif

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="bg-sandrift inline-flex items-center justify-center p-2 rounded-md text-linen hover:text-verdeAlga  hover:bg-azulDianne focus:outline-none focus:bg-shingleFawn focus:text-linen transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')">
                {{ __('Contactar') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('producto.categorias')" :active="request()->routeIs('producto.categorias')">
                {{ __('Nuestros Productos') }}
            </x-responsive-nav-link>
            @if(Auth::check() && Auth::user()->claseUsuario != 1)
            <x-responsive-nav-link :href="route('panel.index')" :active="request()->routeIs('panel.index')">
                {{ __('Panel de Control') }}
            </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if(Auth::check())
            <div class="px-4">
                <div class="font-medium text-base text-linen">{{Auth::user()->name ?? 'Default Name'}}</div>
                <div class="font-medium text-sm text-linen flex items-center gap-2">{{Auth::user()->email ?? 'Default Name'}}

                 {{-- Carrito --}}
                 <x-ui.shopping-cart.main></x-ui.shopping-cart.main>
                {{--  --}}
                </div>

            </div>



            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @endif
        </div>
    </div>
</nav>
