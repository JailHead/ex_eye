<div class="flex flex-col w-full relative overflow-x-auto" style="height: calc(100vh - 209px)">
    <div class="px-10 mb-8 h-2/5">
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

            <div class="flex-1 flex items-start justify-start bg-cover rounded-md" style="height: 188px; background-image: url({{ asset('images/estatus_safe.jpg') }});">                
                <div class="h-full w-full bg-black opacity-50 rounded-md">

                </div>
                {{-- <x-dashboard-icon-safe />
                <div class="flex flex-col ml-6">
                    <p class="text-4xl font-poppins text-gray-500 font-bold">
                        Estatus:
                    </p>
                    <p class="text-xl font-poppins text-gray-900 font-bold">
                         Seguro
                    </p>
                </div> --}}
            </div>
        </div>
    </div>

    <p class="h-9 text-2xl font-poppins pl-10 text-gray-900 font-bold">
        Tus dispositivos
        <div class="w-full h-1 bg-yellow-500"></div>
    </p>
    <div class="w-full flex-1 relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 shadow-sm">
            <thead class="text-xs text-white uppercase bg-gray-900">
                <tr>
                    <th scope="col" class="w-96 px-6 py-3">
                        Dipositivo
                    </th>
                    <th scope="col" class="w-40 px-6 py-3">
                        Tipo
                    </th>
                    <th scope="col" class="w-40 px-6 py-3">
                        Estatus
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ubicación
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($this->devices as $device)            
                <tr class="bg-white border-b hover:bg-gray-50 dark:hover:bg-gray-100 cursor-pointer">
                    <td scope="row" class="w-96 flex items-center px-6 py-4 text-gray-900">
                        <div class="ps-3 w-full">
                            <div class="overflow-hidden overflow-ellipsis whitespace-nowrap text-base font-semibold">{{$device->name}}</div>
                            {{-- <div class="font-normal text-gray-500">{{$this->user->email}}</div> --}}
                        </div>
                    </td>
                    <td class="w-20 px-6 py-4">
                        <div class="w-20 overflow-hidden overflow-ellipsis whitespace-nowrap text-sm">{{ $device->type }}</div>
                    </td>
                    <td class="w-40 px-6 py-4">
                        <div class="flex items-center">
                            @if ($device->active)
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Activo                            
                            @else
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Desactivado
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="overflow-hidden overflow-ellipsis whitespace-nowrap text-base" style="width: 750px">{{$device->location}}</div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>