<x-app-layout>
  <x-slot name="alerts">
    <h2 class="font-semibold text-xl text-red-800 leading-tight">
        {{ __('Estadisticas') }}
    </h2>
  </x-slot>

  <livewire:statistics-dashboard />
</x-app-layout>