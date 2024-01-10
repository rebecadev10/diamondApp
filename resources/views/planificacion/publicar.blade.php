<x-app-layout>
    <div class="flex">
        <div class="w-1/2 bg-fondoCrema px-4 py-2 ">
            <form method="POST" action="">
                @csrf
                <div class="space-y-3">
                    <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 px-4">

                        <div class="justify ">
                            <x-label for="socialMedia" value="{{ __('Publicar en:') }}" />
                            <select name="socialMedia" id="socialMedia"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6 "
                                required>
                                <option value="">Facebook e Instagran</option>
                                <option value="">Tiktok</option>
                            </select>
                            {{-- <x-select id="socialMedia" class="block mt-1 w-full" type="text" name="socialMedia"
                            :value="old('socialMedia')" required autofocus autocomplete="socialMedia" /> --}}
                        </div>


                    </div>
                    <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 px-4">
                        <x-label for="socialMedia" value="{{ __('Contenido multimedia:') }}" />

                        <div class="flex w-full px-2 justify-end  ">
                            <x-blue-button>
                                Subir
                                Fotos<svg xmlns="http://www.w3.org/2000/svg" height="12" width="12"
                                    class="mx-1" viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>
                            </x-blue-button>
                            {{-- <button class="bg-azul-plomo px-2 text-blanco text-xs w-32 justify-end  rounded-lg py-2 ">
                                <a href="{{ route('planificacion.publicar') }}"
                                    class="inline-flex fill-blanco items-center">Subir
                                    Fotos<svg xmlns="http://www.w3.org/2000/svg" height="12" width="12"
                                        class="mx-1" viewBox="0 0 512 512">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                    </svg> </a></button> --}}
                        </div>


                    </div>
                    <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 px-4 ">
                        <x-label for="socialMedia" value="{{ __('Detalles de la publicación:') }}" />

                        <textarea id="about" name="about" rows="3"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>

                    </div>
                    <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 px-4 ">

                        <h4 class="justify-start px-4 py-2 text-xs">Opciones de programación:</h4>
                        <x-label for="socialMedia" value="{{ __('Facebook') }}" />
                        <x-input type="date"></x-input>
                        <x-label for="socialMedia" value="{{ __('Instagram') }}" />
                        <x-input type="date"></x-input>


                    </div>
                    <div class="flex justify-end space-x-2">
                        <x-cancel-button>Cancelar</x-cancel-button>
                        <x-confirm-button>Publicar</x-confirm-button>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-1/2"></div>
    </div>
</x-app-layout>
