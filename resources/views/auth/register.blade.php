<x-guest-layout>
    <div class="flex h-screen w-screen">
        <div class="h-5/6 w-full">
            <div class="flex">

                <div class="flex flex-col w-1/2 h-full bg-fondoClaro h-screen items-center justify-center">
                    <div class="h-32">
                        <img src="{{ asset('img/LogoDS.png') }}" class="w-56 h-20" alt="">
                    </div>
                    <div class="h-32 w-full flex flex-col px-6 items-left justify-start ">

    
                        <div class=" flex items-center text-negro fill-negro text-lg font-medium ">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 576 512">
                                <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                            </svg>
<div class="px-1"><b class="text-amarillo  "> Todo en una plataforma </b> segura y en constante evolución.</div>
                        </div>
                    
                    
                        <div class="flex items-center text-negro fill-negro text-lg font-medium ">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512">
                                <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                            </svg>
                          <div class="px-1">  <b class="text-amarillo"> Mejora tu estrategia de marketing, </b>al comprender tu Audiencia</div>

                        </div>
                    
                    
                        <div class="flex items-center  text-negro fill-negro text-lg font-medium ">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512">
                                <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                            </svg>
                            <div class="px-1"><b class="text-amarillo">Ahorra tiempo </b>al programar tus publicaciones</div>
                            
                        </div>
                    
                    </div>
                </div>
                <div class="w-1/2">
                    <x-authentication-card-register>
                        {{-- <div class=" hidden">
                    <x-slot name="logo" class="hidden">
                        <x-authentication-card-logo />
                    </x-slot>
                </div> --}}
                        <x-validation-errors class="mb-4" />
                        <div class="justify-center">
                            <h3 class="text-negro text-center font-bold text-xl">
                                Crea tu cuenta gratis ahora!
                            </h3>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div>
                                <x-label for="name" value="{{ __('Nombre') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <div class="mt-4">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>
                            <div class="mt-4">
                                {{-- {{ route('auth.redirect')}} --}}
                                <a href="" class="bg-azul-normal text-blanco px-4 py-2" id="btnRegister">Iniciar Sesion Facebook</a>
                            </div>
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />

                                            <div class="ms-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' =>
                                                        '<a target="_blank" href="' .
                                                        route('terms.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                        __('Terms of Service') .
                                                        '</a>',
                                                    'privacy_policy' =>
                                                        '<a target="_blank" href="' .
                                                        route('policy.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                        __('Privacy Policy') .
                                                        '</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif
                            <div class="flex flex-col">
                                <div class="flex justify-center">
                                    <span
                                        class="text-gris text-xs text-center items-center self-center px-2 py-2 w-full">
                                        Al registrarte estás aceptando los

                                        Términos y Condiciones</span>
                                </div>
                                <div class="flex items-center justify-end mt-4 w-full">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>

                                    <x-button class="ms-4">
                                        {{ __('Register') }}
                                    </x-button>
                                </div>
                            </div>

                        </form>
                    </x-authentication-card-register>
                </div>

            </div>
        </div>
        {{-- <div class="h-1/6">
            @extends('components.footer')
        </div> --}}
    </div>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

</x-guest-layout>