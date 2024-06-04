<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{
        Vite::useHotFile(storage_path('vite.hot')) // Customize the "hot" file...
          ->useBuildDirectory('bundle') // Customize the build directory...
            ->useManifestFilename('assets.json') // Customize the manifest filename...
            ->withEntryPoints(['resources/js/app.js','resources/css/app.css'])) // Specify the entry points... 
            
        }}
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-fondoClaro">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
                <header class="  ">
                    <div class="max-w-7xl mx-auto py-4  px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
        {{-- <div class="flex"> --}}
            {{-- <div class="flex w-1/5">


                <x-sidebar-menu />

            </div> --}}
            <div class="w-full">
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        {{-- </div> --}}
        <x-footer/>
    </div>

    @stack('modals')

    @livewireScripts
    
</body>

</html>