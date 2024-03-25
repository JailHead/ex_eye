<x-guest-layout>
    @guest        
        <div class="flex flex-col justify-center items-center relative w-full text-center bg-cover bg-top" 
        style="background-image: url({{asset('images/hero-image-home.jpg')}}); height: 600px;">
            <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
                Welcome to <span class="text-yellow-500">ExEye</span> <span class="text-gray-900"> System</span>
            </h1>
            <p class="text-gray-500 text-lg mt-1">El mejor sistema de monitoreo</p>
            <a wire:navigate class="w-52 px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block hover:bg-gray-950 hover:-translate-y-0.5 active:translate-y-0.5 transition ease-in-out"
                href="http://127.0.0.1:8000/register">Comienza ahora</a>
        </div>
    @endguest

    @include('layouts.includes.welcome-main')

    @include('layouts.includes.footer')
</x-guest-layout>