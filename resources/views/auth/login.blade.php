<x-guest-layout>
    <div class="flex">
        <div class="w-1/2 bg-fondoClaro items-center justify-center">
            <img src="{{ asset('img/contenido/5.png') }}" alt="" class="object-fill w-full h-screen">
        </div>
        <div class="w-1/2">
            <x-authentication-card>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="justify-center">
                    <h3 class="text-negro text-center font-bold text-xl">
                        Inciar Sesión
                    </h3>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>
                    <div class="flex">
                        <div class="block mt-4 w-1/2">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex w-1/2 items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-center py-6">
                        <x-button class="ms-4 ">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                    <div class="border-t-2 my-4">

                    </div>
                <div class="flex flex-col items-center justify-center py-2  space-y-2  ">

                    <a href="{{ route('auth.redirect') }}" 
                        class="flex flex-row justify-around items-center text-sm fill-white bg-social-facebook text-blanco border border-social-facebook hover:bg-white hover:text-social-facebook  hover:fill-social-facebook px-4 py-2 rounded-lg"><svg
                            xmlns="http://www.w3.org/2000/svg" with="14" height="14" class="mr-2"
                            viewBox="0 0 512 512">
                            <path
                                d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                        </svg> Iniciar Sesion con  Facebook</a>
                    <a href="{{ route('google.redirect') }}"
                        class="flex flex-row justify-around items-center space-x-3 text-sm  bg-slate-200  text-negro px-4 py-2 rounded-lg"><svg
                            xmlns="http://www.w3.org/2000/svg" with="14" height="14" class="mr-2"
                            viewBox="0 0 488 512">
                            <path
                                d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
                        </svg>Iniciar Sesion con Google</a>
                    {{-- <a href="{{ route('twitter.redirect') }}"
                        class="flex flex-row justify-around items-center text-sm  bg-social-twitter border border-social-twitter text-white fill-white  text-negro px-4 py-2"><svg
                            xmlns="http://www.w3.org/2000/svg" with="14" height="14"
                            viewBox="0 0 512 512">
                            <path
                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                        </svg>Iniciar Sesion Twitter</a> --}}
                </div>

                </form>
                <div class="flex justify-center">
                    <span class="text-gris text-xs items-center self-center px-2">¿No tienes una cuenta? </span>
                    <a class="text-amarillo  text-sm font-normal" href="{{ route('register') }}">Registrarse</a>
                </div>
            </x-authentication-card>
        </div>
    </div>
    {{-- <x-footer/> --}}
</x-guest-layout>