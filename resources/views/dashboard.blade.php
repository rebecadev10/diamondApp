<x-app-layout>

    <div class="py-12 bg-fondoClaro">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
            <div class="flex flex-col px-4">
                <div class="w-full">
                    <p class="justify-end  text-right text-negro text-normal py-2 px-2">Fecha</p>
                </div>
                <div class="flex flex-row w-full justify-between">
                    <h3 class="font-bold">Resumen General</h3>
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    @else
                        <p>{{ Auth::user()->name }}</p>
                        @endif
                </div>
            </div>

            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2 ">
                <h4 class="justify-start px-4 py-2 text-md ">Crecimiento</h4>

               
            </div>
            
            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2">
                <h4 class="justify-start px-4 py-2 text-md ">Post</h4>

               
            </div>
            <div class="w-full">
                <p class="justify-start  text-left text-negro text-normal py-2 px-2">Cuenta</p>
            </div>
            <div class="bg-blanco w-full overflow-hidden shadow-xl sm:rounded-lg py-2">
                <h4 class="justify-start px-4 py-2 text-md ">Lista de publicaciones</h4>

               
            </div>
        </div>
    </div>
</x-app-layout>
