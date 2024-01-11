<div>
    <form method="POST" wire:submit="save">
        @csrf
        <div class="space-y-3">
            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 px-4">

                <div class="justify ">
                    <x-label for="tipo_red_social" value="{{ __('Publicar en:') }}" />
                    <x-select  id="tipo_red_social"
                        wire:model="tipo_red_social"
                        required>
                        <option value="" disabled>Seleccione una categoria</option>
                        <option value="Facebook_e_Instagran">Facebook e Instagran</option>
                        <option value="tiktok">Tiktok</option>
                    </x-select>
                    {{-- <x-select id="socialMedia" class="block mt-1 w-full" type="text" name="socialMedia"
                    :value="old('socialMedia')" required autofocus autocomplete="socialMedia" /> --}}
                </div>


            </div>
            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 px-4">
                <x-label for="media_photo_path" value="{{ __('Contenido multimedia:') }}" />
                <input type="file" id="photo" 
                wire:model.live="photo"
                x-ref="photo"
                x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                "/>
                {{-- <div class="flex w-full px-2 justify-end  ">
                    <input type="file"> --}}
                    {{-- <x-blue-button>
                        Subir
                        Fotos<svg xmlns="http://www.w3.org/2000/svg" height="12" width="12"
                            class="mx-1" viewBox="0 0 512 512">
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                        </svg>
                    </x-blue-button> --}}
                    {{-- <button class="bg-azul-plomo px-2 text-blanco text-xs w-32 justify-end  rounded-lg py-2 ">
                        <a href="{{ route('planificacion.publicar') }}"
                            class="inline-flex fill-blanco items-center">Subir
                            Fotos<svg xmlns="http://www.w3.org/2000/svg" height="12" width="12"
                                class="mx-1" viewBox="0 0 512 512">
                                <path
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                            </svg> </a></button> --}}
                {{-- </div> --}}


            </div>
            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 px-4 ">
                <x-label for="descricipcion" value="{{ __('Detalles de la publicación:') }}" />

                <textarea id="descricipcion"  rows="3" wire:model="descricipcion"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>

            </div>
            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 px-4 ">

                <h4 class="justify-start px-4 py-2 text-xs">Opciones de programación:</h4>
                <x-label for="date_public_facebook" value="{{ __('Facebook') }}" />
                <x-input type="date"  wire:model="date_public_facebook"></x-input>
                <x-input type="time"  wire:model="time_public_facebook"></x-input>
                <x-label for="date_public_instagram" value="{{ __('Instagram') }}" />
                <x-input type="date" wire:model="date_public_instagram"></x-input>
                <x-input type="time"  wire:model="time_public_instagram"></x-input>


            </div>
            <div class="flex justify-end space-x-2">
                <x-cancel-button>Cancelar</x-cancel-button>
                <x-confirm-button type="submit">Publicar</x-confirm-button>
            </div>
        </div>
    </form>
</div>
