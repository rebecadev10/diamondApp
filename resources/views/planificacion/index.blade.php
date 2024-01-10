<x-app-layout>
    <div class="flex">
        <div class="w-1/5 bg-ceramic">
            <div
                class="flex   px-2 h-full bg-azul text-azul-plomo fill-azul-plomo text-sm items-start justify-center py-2">
                <ul class=" flex flex-col  w-full ">
                    <li class="inline-flex w-full py-2 items-center justify-between">
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
                    <li class="inline-flex w-full py-2 items-center justify-between">
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
                <div class="flex flex-row justify-between px-4 mt-2">
                    <button
                        class="bg-amarillo px-2 text-blanco text-xs    rounded-lg "> <a  href="{{route('planificacion.publicar')}}" class="inline-flex fill-blanco items-center">Crear
                        Publicación <svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" class="mx-1"
                            viewBox="0 0 512 512">
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                        </svg> </a></button>
                    <h4 class="justify-start px-4  text-md ">Calendario</h4>

                </div>
                <!-- component -->
                <div class="flex items-start justify-center h-screen py-4">

                    <div class="lg:w-11/12 md:w-10/12 sm:w-9/12 mx-auto ">
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                            <div class="flex items-center justify-between px-6 py-3 bg-gray-700">
                                <button id="prevMonth" class="text-white">Previous</button>
                                <h2 id="currentMonth" class="text-white"></h2>
                                <button id="nextMonth" class="text-white">Next</button>
                            </div>
                            <div class="grid grid-cols-7 gap-2 p-4" id="calendar">
                                <!-- Calendar Days Go Here -->
                            </div>
                            <div id="myModal"
                                class="modal hidden fixed inset-0 flex items-center justify-center z-50">
                                <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>

                                <div
                                    class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                    <div class="modal-content py-4 text-left px-6">
                                        <div class="flex justify-between items-center pb-3">
                                            <p class="text-2xl font-bold">Selected Date</p>
                                            <button id="closeModal"
                                                class="modal-close px-3 py-1 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring">✕</button>
                                        </div>
                                        <div id="modalDate" class="text-xl font-semibold"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
