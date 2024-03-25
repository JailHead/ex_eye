@props(['device_name', 'device_id'])
<div class="p-4 md:p-5 text-center">
    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 20 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    <div class="w-4/5 mx-auto">
        <h3 class="text-lg font-normal text-gray-500">
            Esta operación es irreversible.
        </h3>
        <h3 class="mb-5 text-lg font-normal text-gray-500">
            ¿Estas seguro/a de que deseas eliminar el dispositivo 
            <span class="text-gray-700 font-bold">{{ $device_id }}</span>?
        </h3>
    </div>
    <div class="flex items-center justify-center w-full mx-auto">
        <div>            
            <button wire:click="deleteDevice({{ $device_id }})" type="button"
            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                Si, eliminar
            </button>
        </div>
        <button x-data x-on:click="$dispatch('close-modal')" data-modal-hide="popup-modal" type="button"
            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
            No, cancelar
        </button>
    </div>
</div>
