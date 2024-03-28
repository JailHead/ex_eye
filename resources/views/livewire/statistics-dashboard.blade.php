<div style="height: calc(100vh - 113px); width: 90%;">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-8">

        <!-- CARD 1 -->
        <div class="rounded overflow-hidden shadow-lg flex flex-col">            
            <div class="bg-gray-900 px-6 py-2">
                <p class="h-full font-poppins text-sm text-gray-200">
                    Estadisticas
                </p>                
            </div>
            <div class="px-6 py-4 mb-auto hover:text-yellow-500 ">
                <p class="font-medium text-lg transition duration-500 ease-in-out inline-block mb-2">Alertas
                    totales el día de hoy</p>
                <p class="text-gray-700 text-5xl">
                    {{ $this->datesOfToday }} <span class="text-gray-500 text-2xl">alertas</span>
                </p>
            </div>
            <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <x-statistics-icon-alert />
                    <span class="ml-1">Alertas </span>
                </span>

                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <x-dashboard-icon-safe-sm />
                    <span class="ml-1">ExEye</span>
                </span>
            </div>
        </div>



        <!-- CARD 2 -->
        <div class="rounded overflow-hidden shadow-lg flex flex-col">            
            <div class="bg-gray-900 px-6 py-2">
                <p class="h-full font-poppins text-sm text-gray-200">
                    Estadisticas
                </p>                
            </div>
            <div class="px-6 py-4 mb-auto hover:text-yellow-500 ">
                <p class="font-medium text-lg transition duration-500 ease-in-out inline-block mb-2">Alertas
                    totales todo el tiempo</p>
                <p class="text-gray-700 text-5xl">
                    {{ $this->alertsCount }} <span class="text-gray-500 text-2xl">alertas</span>
                </p>
            </div>
            <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <x-statistics-icon-alert />
                    <span class="ml-1"> Alertas </span>
                </span>

                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <x-dashboard-icon-safe-sm />
                    <span class="ml-1">ExEye</span>
                </span>
            </div>
        </div>



        <!-- CARD 3 -->
        <div class="rounded overflow-hidden shadow-lg flex flex-col">            
            <div class="bg-gray-900 px-6 py-2">
                <p class="h-full font-poppins text-sm text-gray-200">
                    Estadisticas
                </p>                
            </div>
            <div class="px-6 py-4 mb-auto hover:text-yellow-500 ">
                <p class="font-medium text-lg transition duration-500 ease-in-out inline-block mb-2">Temperatura promedio de tus ubicaciones</p>
                <p class="text-gray-700 text-5xl">
                    {{ $this->averageTemperature }} <span class="text-gray-500 text-2xl">C°</span>
                </p>
            </div>
            <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <x-statistics-icon-temperature />
                    <span class="ml-1">Temperatura</span>
                </span>

                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <x-dashboard-icon-safe-sm />
                    <span class="ml-1">ExEye</span>
                </span>
            </div>
        </div>
    </div>
    <div class="flex mb-10 pb-4 gap-x-4">
        <div class="flex flex-col flex-2 gap-y-4 mt-8">
            <div class="flex items-center h-8">
                <h2 class="font-poppins font-bold border-b-2 border-b-yellow-500">
                    Tus alertas a lo largo del tiempo
                </h2>
            </div>
            <div class="flex justify-start">
                <div class="flex items-center mr-20">
                    <input checked id="today" type="checkbox" value=""
                        class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-transparent focus:ring-2">
                    <label for="today" class="ms-2 text-sm font-poppins font-medium text-gray-900">Hoy</label>
                </div>
                <div class="flex items-center mr-20">
                    <input checked id="oneWeek" type="checkbox" value=""
                        class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-transparent focus:ring-2">
                    <label for="oneWeek" class="ms-2 text-sm font-poppins font-medium text-gray-900">Hace más de una
                        semana</label>
                </div>
                <div class="flex items-center mr-20">
                    <input checked id="twoWeeks" type="checkbox" value=""
                        class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-transparent focus:ring-2">
                    <label for="twoWeeks" class="ms-2 text-sm font-poppins font-medium text-gray-900">Hace más de dos
                        semanas</label>
                </div>
                <div class="flex items-center mr-20">
                    <input checked id="month" type="checkbox" value=""
                        class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-transparent focus:ring-2">
                    <label for="month" class="ms-2 text-sm font-poppins font-medium text-gray-900">Hace más de un
                        mes</label>
                </div>
            </div>
            <div class="container border-l-8 border-l-gray-700 mx-auto p-4 sm:p-0 mt-4">
                <div class="rounded px-4 pb-4 bg-white" style="height: 24rem;">
                    <livewire:column-chart-model />
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 mt-8 gap-y-4">
            <div class="flex items-center h-8">
                <h2 class="font-poppins font-bold border-b-2 border-b-yellow-500">
                    Estado de tus ubicaciones
                </h2>
            </div>
            <div class="" style="height: 20px;">
                <p class="text-gray-500 text-sm">
                    Muestra de la temperatura maxima de cada ubicación
                </p>
            </div>
            <div class="container mx-auto p-4 sm:p-0 mt-4">
                <div class="rounded w-full px-4 pb-4 bg-white" style="height: 24rem;">
                    <livewire:multi-column-chart-model />
                </div>
            </div>
        </div>
    </div>
</div>
