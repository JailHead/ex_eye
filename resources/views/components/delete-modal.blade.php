@props(['device_id'])
<div
class="fixed z-10 inset-0 backdrop-blur-sm"
x-data="{show:false, device_id: '{{ $device_id }}', device_name: ''}"
x-show="show"
x-on:open-modal.window="show=(device_id!==$event.detail.device_id); device_name=$event.detail.device_name; console.log('El id es: '+'{{ $device_id }}'); console.log('El id del evento es: '+$event.detail.device_id);"
x-on:close-modal.window="show=false"
x-on:keydown.escape.window="show=false"
x-transition
style="display: none;">

    <div x-on:click="show=false" class="fixed inset-0 bg-gray-300 opacity-40"></div>
    <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow" style="width: 500px; height: 250px">
        <button x-on:click="show=false" type="button"
            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
        </button>       
        <div>
            {{ $body }}
        </div>
    </div>
</div>
