<div class="flex flex-col w-full relative overflow-x-auto" style="height: calc(100vh - 209px)">    
    <div class="px-10 mb-8 h-2/5 border-l-4 border-yellow-500">
        <div class="w-full rounded-md" style="height: 10%">
            <h2 class="text-2xl font-bold text-gray-900">
                Bienvenido
            </h2>
        </div>        
        <div class="flex relative overflow-x-auto" style="height: 90%">
            <div class="w-1/3 mr-8" style="height: 188px">
                <div class="w-full flex flex-col">
                    <a class="inline-block overflow-hidden overflow-ellipsis whitespace-nowrap text-2xl font-poppins text-gray-900 hover:underline" href="{{ route('profile.show') }}">
                        {{ $this->user->name }}   
                    </a>        
                    <p class="m-0 font-poppins text-sm text-gray-500">{{$this->user->email}}</p>
                </div>
                <div class="flex gap-x-8 mt-4">
                    <div class="flex flex-col h-full items-start justify-start">
                        <p class="text-xl font-poppins text-gray-900 font-bold">
                            Todo parece estar bien
                        </p>
                        <p class="text-lg font-poppins text-gray-700">
                            Alertas el día de hoy:
                        </p>
                        <p class="mt-4 text-5xl font-poppins text-gray-900 font-bold">
                            {{ $this->alerts }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex-1 flex items-start justify-start bg-cover rounded-md" style="height: 188px;">

            </div>
        </div>
    </div>

    <p class="h-9 text-xl font-poppins pl-10 text-gray-900 font-bold">
        Tus dispositivos
        <div class="w-full h-1 bg-gray-700"></div>
    </p>
    <div class="w-full flex-1 relative overflow-x-auto">
        <table class="text-sm text-left rtl:text-right text-gray-500 shadow-sm">
            <thead class="text-xs text-white uppercase bg-gray-900">
                <tr>
                    <th scope="col" class="w-80 px-6 py-3">
                        Dipositivo
                    </th>
                    <th scope="col" class="w-40 px-6 py-3">
                        Modelo
                    </th>
                    <th scope="col" class="w-40 px-6 py-3">
                        Estatus
                    </th>
                    <th scope="col" class="w-full px-6 py-3">
                        Ubicación
                    </th>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($this->devices as $device)
                <tr class="bg-white border-b hover:bg-gray-50 dark:hover:bg-gray-100 cursor-pointer">
                    <td scope="row" class="w-80 flex items-center px-6 py-4 text-gray-900">
                        <div class="ps-3 w-full">
                            <div class="overflow-hidden overflow-ellipsis whitespace-nowrap text-base font-semibold">{{$device->name}}</div>                            
                        </div>
                    </td>
                    <td class="w-40 px-6 py-4">
                        <div class="w-40 overflow-hidden overflow-ellipsis whitespace-nowrap text-sm">{{ $device->model }}</div>
                    </td>
                    <td class="w-40 px-6 py-4">
                        <div class="w-40 flex items-center">
                            @if ($device->active)
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Activo
                            @else
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Inactivo
                            @endif
                        </div>
                    </td>
                    <td class="w-full px-6 py-4">
                        <div class="overflow-hidden overflow-ellipsis whitespace-nowrap text-base" style="width: 587px;">{{$this->getLocation($device->device_id)}}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="overflow-hidden overflow-ellipsis whitespace-nowrap text-base">                            
                            <button 
                            class="text-red-700 border-red-700 border-b border-b-transparent hover:border-b-red-700 font-medium text-xs px-2 py-1 text-center inline-flex items-center"
                            wire:click="showModalDelete('{{ $device->_id }}', '{{ $device->name }}')">
                                Eliminar
                                <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="12px" height="12px"><g fill="#b91c1c" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M10,2l-1,1h-6v2h1.10938l1.7832,15.25586v0.00781c0.13102,0.98666 0.98774,1.73633 1.98242,1.73633h8.24805c0.99468,0 1.8514,-0.74968 1.98242,-1.73633l0.00195,-0.00781l1.7832,-15.25586h1.10938v-2h-6l-1,-1zM6.125,5h11.75l-1.75195,15h-8.24805z"></path></g></g></svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <x-delete-modal device_id="{{ $selectedDevice_id }}">
            <x-slot:body>
                <p>Device id: <span>{{ $selectedDevice_id }}</span></p>
                <p>Device name: <span>{{ $selectedDevice_name }}</span></p>
                {{-- <livewire:delete-device-button device_name="{{ $selectedDevice_name }}" device_id="{{ $selectedDevice_id }}"/> --}}
            </x-slot>
        </x-delete-modal>
    </div>

</div>