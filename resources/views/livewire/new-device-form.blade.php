<div class="grid grid-cols-2" style="height: calc(100vh - 113px); width: 90%;">
    <div class="flex flex-col justify-center">
        <form class="w-full">
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="floating_email" id="floating_email"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                    placeholder=" " required />
                <label for="floating_email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre de Dispositivo</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="floating_password" id="floating_password"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                    placeholder=" " required />
                <label for="floating_password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tipo (sensor o cámara)</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="repeat_password" id="floating_repeat_password"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                    placeholder=" " required />
                <label for="floating_repeat_password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ubicación (agrega la ubicacion de intalación de tu dispositivo)</label>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <div class="flex items-center ps-4 border border-gray-200 rounded">
                        <input id="bordered-checkbox-1" type="checkbox" value="" name="bordered-checkbox" class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 rounded outline-none transition-all ease-in-out">
                        <label for="bordered-checkbox-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-700">Dispositivo activado</label>
                    </div>
                </div>
            </div>
            <div class="relative z-0 w-1/2 mt-5">
                <button type="submit"
                    class="font-poppins text-gray-900 bg-white border-2 border-gray-900 hover:bg-yellow-500 hover:border-yellow-500 hover:-translate-y-1 transition-all ease-in-out focus:ring-4 focus:outline-none focus:ring-gray-300 font-bold rounded-lg text-sm w-full px-5 py-2.5 text-center">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
