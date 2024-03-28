<div class="flex flex-col" style="height: calc(100vh - 113px); width: 100%;">
    <div class="relative overflow-x-auto h-1/6 mt-8">
        <div class="px-6 flex flex-col justify-center h-full rounded-lg">
            <h2 class="font-poppins font-bold text-2xl">Estas son tus alertas registradas.</h2>
            <p class="text-sm text-gray-500">
                Aqui puedes visualizar todas las alertas capturadas por tu o tus dispositivos,
                no pierdas ningun rastro de tus alertas!
            </p>
        </div>
    </div>
    <div class="flex gap-x-16 relative mb-2 h-7 pl-6">
        <h2 class="font-poppins text-base">Total de alertas: <span class="font-poppins text-sm font-medium">{{ $this->alertsCount }}</span>
    </div>
    <div class="relative overflow-auto h-full mb-24 border-b-4 border-b-yellow-500">
        <table class="overflow-y-scroll w-full text-sm text-left rtl:text-right shadow-lg text-gray-500">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3 w-40 rounded-ss-lg">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3 w-full">
                        Descripción
                    </th>
                    <th scope="col" class="w-40 px-6 py-3">
                        Dispositivo
                    </th>
                    <th scope="col" class="w-40 px-6 py-3 rounded-se-lg">
                        Fecha
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($this->alerts as $alert)                    
                    <tr class="bg-white border-b-2">
                        <th scope="row" class="px-6 py-2">
                            <div class="w-40 text-red-500 text-sm overflow-hidden overflow-ellipsis whitespace-nowrap">
                                {{ $alert->title }}
                            </div>
                        </th>
                        <th scope="row" class="px-6 py-2 text-sm font-poppins font-light text-gray-900 whitespace-nowrap">
                            {{-- Se ha detectado movimiento en la ubicacion: <span class="text-yellow-700">"Sala A"</span> --}}
                            {{ $alert->description }}
                        </th>
                        <td class="px-6 py-2">
                            <div class="w-48 text-sm font-poppins font-light overflow-hidden overflow-ellipsis whitespace-nowrap">
                                {{ $alert->device }}
                            </div>
                        </td>
                        <td class="px-6 py-2 text-sm font-poppins font-light">
                            <div class="w-40">
                                {{ $alert->created_at }}
                            </div>
                        </td>
                    </tr>                
                @endforeach
            </tbody>
        </table>
    </div>
</div>