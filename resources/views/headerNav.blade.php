<div class="container mx-auto flex flex-row z-50   ">
    <div class=" relative ">
        <div class="fixed top-0 left-0 right-0 ">
            <nav class="bg-blanco items-center shadow-md rounded-b-2xl  ">


                {{-- <div class="hidden sm:ml-6 sm:block"> --}}
                {{-- <div class="flex-row "> --}}
                <div class="flex  py-6 px-2">
                    <div class="flex justify-center w-1/5">

                        <img src="{{ asset('img/LogoDS.png') }}" alt="Logo Diamond Sharp"
                            class=" object-contain w-20 h-8 max-w-xs">
                    </div>
                    <div class="justify-start w-3/5  items-start">



                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->


                        <a href="#" class="bg-azul-plomo text-blanco rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">Inicio</a>
                        <span class="text-amarillo  px-3 py-2">\</span>
                        <a href="#"
                            class="text-azul-plomo  hover:text-blanco hover:bg-azul-plomo rounded-md px-3 py-2 text-sm font-medium">Precios</a>
                        <span class="text-amarillo  px-3 py-2">\</span>
                        <a href="#"
                            class="text-azul-plomo  hover:text-blanco hover:bg-azul-plomo rounded-md px-3 py-2 text-sm font-medium">Novedades</a>
                        <span class="text-amarillo  px-3 py-2">\</span>
                        <a href="#"
                            class="text-azul-plomo  hover:text-blanco hover:bg-azul-plomo rounded-md px-3 py-2 text-sm font-medium">Aprender</a>
                    </div>

                    {{-- </div> --}}
                    {{-- </div> --}}


                    {{-- <div class=" inset-y-0 right-0 flex items-center"> --}}
                    <div class="justify-end w-1/5 items-center">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-azul-claro font-bold">Comenzar</a>
                            @else
                                <a class="px-3 py-2 text-sm text-amarillo font-normal rounded-md border-2 border-amarillo"
                                    href="{{ route('login') }}">Entrar</a>
                                @if (Route::has('register'))
                                    <a class="bg-azul-plomo text-blanco rounded-md px-3 py-2 text-sm font-normal"
                                        href="{{ route('register') }}">Registrarse</a>
                                @endif
                            @endauth
                        @endif

                    </div>
                </div>
                {{-- </div> --}}


            </nav>
        </div>
    </div>
</div>
