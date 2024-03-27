<nav>
    <header class="flex items-center justify-between py-3 px-24 border-b border-gray-100">
        <div id="header-left" class="flex items-baseline">
            @auth
                <a wire:navigate href="{{route('dashboard')}}">
                    <x-application-mark class="block h-9 w-auto" />
                </a>
            @else
                <a wire:navigate href="{{route('home')}}">
                    <x-application-mark class="block h-9 w-auto" />
                </a>
            @endauth
            <div class="top-menu ml-10">
                
                @auth                    
                    <div class="flex space-x-4">
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Home') }}
                        </x-nav-link>                        
                        <x-nav-link href="{{ route('alerts') }}" :active="request()->routeIs('alerts')">
                            {{ __('Alertas') }}
                        </x-nav-link>                        
                        <x-nav-link href="{{ route('chart') }}" :active="request()->routeIs('chart')">
                            {{ __('Estadisticas') }}
                        </x-nav-link>                        
                        <x-nav-link href="{{ route('new-device') }}" :active="request()->routeIs('new-device')">
                            {{ __('Nuevo Dispositivo') }}
                        </x-nav-link>
                    </div>
                @endauth
            </div>
        </div>
        <div id="header-right" class="flex items-center md:space-x-6">                          
            @auth                
                @include('layouts.includes.header-auth')
            @else
                @include('layouts.includes.header-guest')
            @endauth
        </div>
    </header>
</nav>