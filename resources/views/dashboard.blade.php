<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="w-full py-12">
        <livewire:devices-list />        
    </div>
</x-app-layout>
