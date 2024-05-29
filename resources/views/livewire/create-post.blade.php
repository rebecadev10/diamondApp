<div class="flex ">
    <div class="w-1/2 bg-fondoCrema px-4 py-2">
    <form method="POST" wire:submit="save">
        @csrf
        <div class="space-y-3">
            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 px-4">

                <div class="justify ">
                    <x-label for="tipo_red_social" value="{{ __('Publicar en:') }}" />
                    @if (Auth::user()->facebook_id)
                    
                    <x-select  id="tipo_red_social"
                        wire:model.live="postCreate.tipo_red_social"
                        >
                       
                        <option value="" disabled>Seleccione una categoria</option>
                        <option value="Facebook">Facebook {{ Auth::user()->name }}</option>
                        {{-- <option value="tiktok">Tiktok</option> --}}
                    </x-select>
                @else
                <p>Debes iniciar sesion en facebook antes</p>
                    <a href="{{ route('auth.redirect') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                    </a>
                    @endif
                    
                    <x-input-error for="postCreate.tipo_red_social"/>
                  
                </div>


            </div>
            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 px-4">
                <x-label for="image" value="{{ __('Contenido multimedia:') }}" />
                <input type="file" id="images" multiple wire:model.live="postCreate.images" wire:key="{{ $postCreate->imageKey }}" x-ref="images"
                x-on:change="
                    const files = Array.from($refs.images.files);
                    files.forEach(file => {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreviews.push(e.target.result);
                        };
                        reader.readAsDataURL(file);
                    });
                "
                class="text-sm text-gris border-grisClaro border rounded-md w-full file:mr-4 file:py-2 file:px-4 file:border file:rounded-md file:text-xs file:font-medium file:bg-azul-plomo file:text-white hover:file:bg-white hover:file:border-azul-plomo hover:file:text-azul-plomo transition-all duration-400 ease-in-out"
            />

                {{-- <input type="file" id="photo" 
                wire:model.live="postCreate.image"
                wire:key="{{$postCreate->imageKey}}"
                x-ref="photo"
                x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                "
                class="text-sm text-gris border-grisClaro border rounded-md w-full file:mr-4 file:py-2 file:px-4 file:border file:rounded-md  file:text-xs file:font-medium file:bg-azul-plomo file:text-white hover:file:bg-white hover:file:border-azul-plomo hover:file:text-azul-plomo transition-all duration-400 ease-in-out "
                />
                --}}

            </div>
            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-4 px-4 ">
                <x-label for="descripcion" value="{{ __('Detalles de la publicación:') }}" />
                    <x-textarea id="descripcion"   wire:model.live="postCreate.descripcion"></x-textarea>
                    {{-- <x-input type="text"  wire:model="postCreate.descripcion"></x-input> --}}
            <x-input-error for="postCreate.descripcion"/>
            </div>
            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 px-4 ">

                {{-- <h4 class="justify-start px-4 py-2 text-xs font-medium">Opciones de programación:</h4> --}}
               
                <x-label for="date_public_facebook" value="{{ __('Facebook') }}" />
                <x-input type="date"  wire:model.live="postCreate.date_public_facebook"></x-input>
                <x-input-error for="postCreate.date_public_facebook"/>
                <x-input type="time"  wire:model.live="postCreate.time_public_facebook"></x-input>
                <x-input-error for="postCreate.time_public_facebook"/>
                <x-label for="date_public_instagram" value="{{ __('Instagram') }}" />
                <x-input type="date" wire:model.live="postCreate.date_public_instagram"></x-input>
                <x-input-error for="postCreate.date_public_instagram"/>
                <x-input type="time"  wire:model.live="postCreate.time_public_instagram"></x-input>
                <x-input-error for="postCreate.time_public_instagram"/>


            </div>
            <div class="flex justify-end space-x-2">
                <x-cancel-button>Cancelar</x-cancel-button>
                <x-confirm-button type="submit">Publicar
                <div wire:loading>
        
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                <path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/>
            </svg>    
         <!-- SVG loading spinner -->
    </div>
                </x-confirm-button>
            </div>
        </div>
    </form>
</div>
<div class="w-1/2 mx-4 my-4 p-2">



<div class="w-4/5 bg-blanco h-screen w-full rounded-lg shadow-xl">
    <div class="px-2 py-4 mx-2 my-4 items-center flex-row flex">
   
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}" />
                                     <p class="flex text-gray-700">  {{ Auth::user()->name }}</p> 
                            @else
                                  <p class="flex text-gray-700 text-center">  {{ Auth::user()->name }}</p> 
                                @endif
                                </div>
@if($postCreate->tipo_red_social ==='Facebook')

    @if($postCreate->descripcion)
    <p class="text-md text-left p-4">{{$postCreate->descripcion}}</p>
    @endif
              {{-- @if($postCreate->image)
            <div class="relative w-72 p-4 rounded-lg ">
                <img src="{{$postCreate->image->temporaryUrl()}}" alt="" class="object-contain">
                <div class="absolute top-0 left-0 bg-white p-2 z-10">
                 
                    
                    
                </div>
            </div>
            @endif --}}
            @if($postCreate->images)
            <div class="grid grid-cols-2 gap-4 p-4">
                @foreach ($postCreate->images as $image)
                    <div class="relative w-72 p-4 rounded-lg">
                        <img src="{{ $image->temporaryUrl() }}" alt="" class="object-contain">
                        <div class="absolute top-0 left-0 bg-white p-2 z-10"></div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    @else
    <div> 

    </div >
    @endif    

</div>
</div>

