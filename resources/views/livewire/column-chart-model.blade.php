<div class="container border-l-8 border-l-gray-700 mx-auto p-4 sm:p-0 mt-4">
    {{-- <div class="flex items-center pl-8 h-8">
        <h2 class="font-poppins font-bold border-b-2 border-b-yellow-500">Tus alertas a lo largo del tiempo</h2>
    </div> --}}
    <div class="shadow-sm rounded px-4 pb-4 bg-white" style="height: 16rem;">
        <livewire:livewire-column-chart
            key="{{ $columnChartModel->reactiveKey() }}"
            :column-chart-model="$columnChartModel" />
    </div>
</div>
