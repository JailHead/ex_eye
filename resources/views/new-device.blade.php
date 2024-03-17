<x-app-layout>    
    <x-slot name="new-device">
        <h2 class="font-semibold text-xl text-red-800 leading-tight">
            {{ __('Nuevo Dispositivo') }}
        </h2>
    </x-slot>

    <livewire:new-device-form />
</x-app-layout>