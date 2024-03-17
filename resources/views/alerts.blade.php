<x-app-layout>    
    <x-slot name="alerts">
        <h2 class="font-semibold text-xl text-red-800 leading-tight">
            {{ __('Alertas') }}
        </h2>
    </x-slot>

    <livewire:alert-list />
</x-app-layout>