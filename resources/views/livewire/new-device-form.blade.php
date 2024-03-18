<div class="grid grid-cols-2" style="height: calc(100vh - 113px); width: 90%;">
    <div class="flex flex-col justify-center">
        <div class="w-full h-1/3">
            
        </div>
        <div class="flex-1">
            <form wire:submit="newDevice" novalidate>
                <div class="relative z-0 w-full mb-5 group">
                    <input wire:model="name" type="name" name="name" id="name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                        placeholder=" "/>
                    <label for="name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Nombre de Dispositivo
                    </label>
                    @error('name')
                        <p class="mt-2 font-poppins text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input wire:model="model" type="text" name="model" id="model"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                        placeholder=" "/>
                    <label for="type"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Modelo (ESP32-WROOM ó ESP32-CAM)
                    </label>
                    @error('model')
                        <p class="mt-2 font-poppins text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input wire:model="location" type="text" name="location" id="location"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                        placeholder=" "/>
                    <label for="location"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Ubicación (agrega la ubicacion de intalación de tu dispositivo)
                    </label>
                    @error('location')
                        <p class="mt-2 font-poppins text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="grid md:grid-cols-2">                    
                    <div class="flex">
                        <div class="flex items-center h-5">
                            <input wire:model="active" id="active" aria-describedby="active" type="checkbox" class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 rounded">
                        </div>
                        <div class="ms-2 text-sm">
                            <label for="active" class="font-medium text-gray-900">Dispositivo activado</label>
                            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500">Si ya haz activado tu dispositivo marca esta caja</p>
                        </div>
                    </div>
                </div>
                <div class="relative z-0 w-1/2 mt-8">
                    <button type="submit"
                        class="font-poppins text-gray-700 bg-white border-2 border-gray-700 hover:bg-yellow-500 hover:border-yellow-500 hover:-translate-y-1 transition-all ease-in-out font-medium active:translate-y-0.5 rounded-lg text-sm w-full px-5 py-2.5 text-center">
                        Agregar dispositivo
                    </button>
                </div>
            </form>
            
            @if (session()->has('success'))                
                <div id="flashSuccess" class="mt-8 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                            <p class="font-bold text-lg">Registro realizado con exito</p>
                            <p class="text-sm">
                                Tu nuevo dispositivo ha sido agregado, puedes ver su información en la tabla de dispositivos de tu dashboard.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>    
</div>
