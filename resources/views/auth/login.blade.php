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

                </form>
                <div class="flex justify-center">
                    <span class="text-gris text-xs items-center self-center px-2">¿No tienes una cuenta? </span>
                    <a class="text-amarillo  text-sm font-normal" href="{{ route('register') }}">Registrarse</a>
                </div>
            </x-authentication-card>
        </div>
    </div>
</x-guest-layout>
