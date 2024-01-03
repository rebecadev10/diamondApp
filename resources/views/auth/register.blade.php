<x-guest-layout>
    <div class="flex h-screen w-screen">
        <div class="h-5/6 w-full">
            <div class="flex">

                <div class="flex flex-col w-1/2 h-full bg-fondoClaro h-screen items-center justify-center">
                    <div class="h-32">
                        <img src="{{ asset('img/LogoDS.png') }}" class="w-56 h-20" alt="">
                    </div>
                    <div class="h-32 w-full flex flex-col px-6 items-left justify-start ">

                        <div class="text-negro text-lg font-medium ">
                            <i class="fa-solid fa-desktop "></i>
                            <b class="text-amarillo  "> Todo en una plataforma </b> segura y en constante evolución.
                        </div>
                        <div class="text-negro text-lg font-medium ">
                            <i class="fa-solid fa-heart"></i>
                            <b class="text-amarillo"> Mejora tu estrategia de marketing, </b>al comprender tu Audiencia

                        </div>
                        <div class="text-negro text-lg font-medium ">
                            <i class="fa-solid fa-clock"></i>
                            <b class="text-amarillo">Ahorra tiempo </b>al programar tus publicaciones
                            {{-- </li> --}}
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
        <div class="h-1/6">
            @extends('footer')
        </div>
    </div>
</x-guest-layout>
