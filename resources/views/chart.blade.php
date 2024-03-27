<x-app-layout>
  <x-slot name="alerts">
    <h2 class="font-semibold text-xl text-red-800 leading-tight">
        {{ __('Estadisticas') }}
    </h2>
  </x-slot>

  <div style="height: calc(100vh - 113px); width: 90%;">
    <div class="flex flex-col gap-y-4 mt-16">
      <div class="flex items-center h-8">
        <h2 class="font-poppins font-bold border-b-2 border-b-yellow-500">
          Tus alertas a lo largo del tiempo
        </h2>
      </div>
      <div class="flex justify-start">
        <div class="flex items-center mr-20">
          <input checked id="today" type="checkbox" value="" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-transparent focus:ring-2">
          <label for="today" class="ms-2 text-sm font-poppins font-medium text-gray-900">Hoy</label>
        </div>
        <div class="flex items-center mr-20">
          <input checked id="oneWeek" type="checkbox" value="" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-transparent focus:ring-2">
          <label for="oneWeek" class="ms-2 text-sm font-poppins font-medium text-gray-900">Hace más de una semana</label>
        </div>
        <div class="flex items-center mr-20">
          <input checked id="twoWeeks" type="checkbox" value="" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-transparent focus:ring-2">
          <label for="twoWeeks" class="ms-2 text-sm font-poppins font-medium text-gray-900">Hace más de dos semanas</label>
        </div>
        <div class="flex items-center mr-20">
          <input checked id="month" type="checkbox" value="" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-transparent focus:ring-2">
          <label for="month" class="ms-2 text-sm font-poppins font-medium text-gray-900">Hace más de un mes</label>
        </div>
      </div>
    </div>
    <livewire:column-chart-model />
  </div>
</x-app-layout>