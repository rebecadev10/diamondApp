<x-app-layout>
 {{
            Vite::useHotFile(storage_path('vite.hot')) // Customize the "hot" file...
              ->useBuildDirectory('bundle') // Customize the build directory...
                ->useManifestFilename('assets.json') // Customize the manifest filename...
                ->withEntryPoints(['resources/js/fullCalendar.js'])) // Specify the entry points... 
                
            }}
    {{-- @vite(['resources/js/fullCalendar.js']) --}}
    <div class="flex">
        <div class="w-1/5 bg-ceramic">
            <div
                class="flex   px-2 h-full bg-azul text-azul-plomo text-lg fill-azul-plomo text-sm items-start justify-center py-2 mx-4">
                <ul class=" flex flex-col  w-full ">
                    <li class="inline-flex w-full py-2 items-center justify-around">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                <path
                                    d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z" />
                            </svg>
                        </div>
                        <a href=""> Calendario</a>
                        <div>
                        </div>
                    </li>
                    <li class="inline-flex w-full py-2 items-center justify-around">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                <path
                                    d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z" />
                            </svg>
                        </div>
                        <a href=""> Historial</a>
                        <div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="w-4/5">
            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 ">
                <div class="flex  justify-between px-4 mt-2">
                    <button
                        class="w-48 bg-amarillo text-blanco hover:text-amarillo hover:bg-blanco rounded-md hover:border-2 hover:border-amarillo px-3 py-2 text-sm fill-white font-medium transform skew-x-12 overflow-hidden transition-all duration-400 ease-in-out hover:scale-105 hover:text-white hover:shadow-lg active:scale-90 before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-amarillo before:to-yellow-300 before:transition-all before:duration-500 before:ease-in-out before:z-[-1] hover:before:left-0">
                        <a href="{{ route('planificacion.publicar') }}" class="inline-flex items-center">
                            Crear Publicación <span class="ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="12" width="12"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>
                            </span>
                        </a>
                    </button>
                </div>

                <!-- component -->
                {{-- <div class="flex items-start justify-center h-screen py-4">

                    <div class="lg:w-11/12 md:w-10/12 sm:w-9/12 mx-auto ">
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                            <div class="flex items-center justify-between px-6 py-2 text-sm bg-gray-700">
                                <button id="prevMonth" class="text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"  height="16" width="14" class="fill-blanco" viewBox="0 0 448 512">
                                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                                    </button>
                                <h2 id="currentMonth" class="text-white"></h2>
                                <button id="nextMonth" class="text-white">

                                    <svg xmlns="http://www.w3.org/2000/svg"  height="16" width="14" class="fill-blanco" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                </button>
                            </div>
                            <div class="grid grid-cols-7 gap-2 p-4" id="calendar" data-publicaciones='@json($publicaciones)'>
                                <!-- Calendar Days Go Here -->
                            </div>
                            <div id="myModal"
                                class="modal hidden fixed inset-0 flex items-center justify-center z-50">
                                <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>

                                <div
                                    class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                    <div class="modal-content py-4 text-left px-6">
                                        <div class="flex justify-between items-center pb-3">
                                            <p class="text-2xl font-bold">Seleciona la fecha</p>
                                            <button id="closeModal"
                                                class="modal-close px-3 py-1 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring">✕</button>
                                        </div>
                                        <div id="modalDate" class="text-xl font-semibold"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="flex items-start justify-center h-screen py-4">

                    <div class="lg:w-11/12 md:w-10/12 sm:w-9/12 mx-auto ">
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
