<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white bg-cover bg-bottom" style="height: calc(100vh - 53px); background-image: url({{asset('images/auth-form-bg.jpg')}});">
    <div class="h-44">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-4 px-6 py-4 bg-white shadow-lg overflow-hidden">
        {{ $slot }}
    </div>
</div>
