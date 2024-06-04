<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet"> --}}
        {{
            Vite::useHotFile(storage_path('vite.hot')) // Customize the "hot" file...
              ->useBuildDirectory('bundle') // Customize the build directory...
                ->useManifestFilename('assets.json') // Customize the manifest filename...
                ->withEntryPoints(['resources/js/app.js','resources/css/app.css'])) // Specify the entry points... 
                
            }}
    {{-- @vite('resources/css/app.css', 'resources/js/app.js') --}}
</head>

<body>
    {{-- <div> --}}
    @extends('headerNav')
    {{-- </div> --}}
    {{-- <div class="flex z-50 bg-azul-transparent"> --}}
    <div class="w-full h-full">
        <div class="absolute flex h-screen bg-azul-transparente">
            <div class=" flex flex-col">

                <div class=" flex w-80  h-4/5 items-end  ">
                    <h2 class="text-left text-3xl text-blanco font-bold px-8 mt-12">¡IMPULSA TU PRESENCIA EN REDES SOCIALES
                        COMO
                        NUNCA ANTES!</h2>

                </div>
                <div class=" w-3/4 h-1/5">
                    <p class=" text-left text-blanco pl-8 pt-2 mt-4">Descubre el poder de las metricas precisas y optimiza
                        tus
                        publicaciones
                        con nuestra plataforma lider. ¡Aumenta tu impacto digital ahora!</p>
                </div>
            </div>
        </div>
        <img src="{{ asset('img/contenido/1.jpg') }}" class="w-full h-full " alt="">
        {{-- <p>hola</p> --}}

    </div>
    <div class="w-full h-full">
        <h2 class="text-center text-negro font-semibold text-2xl py-6">¿POR QUÉ DIAMOND ANALITIC?</h2>
        <div class="flex items-center justify-between py-12">
            <div class="w-1/2 px-8 justify-end ">

                <p class="text-negro text-right text-m font-normal "> En nuestra plataforma, no solo encontrarás
                    métricas de vanguardia, sino una experiencia diseñada para ti. Conviértete en el arquitecto de tu
                    éxito digital.</p>
            </div>
            <div class="w-1/2 ">
                <img src="{{ asset('img/contenido/2.png') }}" alt="" class="object-cover px-8  h-50  ">
            </div>
        </div>
        <div class="flex items-center justify-between bg-amarillo py-16">
            <div class="w-1/2 ">
                <img src="{{ asset('img/contenido/3.png') }}" alt="" class="object-contain px-8  h-50  ">
            </div>
            <div class="w-1/2 px-8">
                <h3 class="font-bold text-1xl ">¿POR QUÉ CONFIAR EN NOSOTROS?</h3>
                <p class="text-negro text-left text-m font-normal w-56">Porque ofrecemos no solo herramientas, sino una
                    promesa: simplificar tu camino hacia la excelencia en redes sociales.</p>
            </div>

        </div>


        <div class="flex items-center justify-between py-12">
            <div class="w-1/2 px-8 justify-end ">

                <p class="text-negro text-right text-m font-normal ">Imagina una interfaz intuitiva que te permite medir
                    el impacto de cada publicación, comprender a tu audiencia en profundidad y, lo mejor de todo,
                    acelerar el proceso de publicación como nunca antes. Nuestra comunidad confía en nosotros para
                    proporcionar resultados reales y tangibles.


                </p>
            </div>
            <div class="w-1/2 ">
                <img src="{{ asset('img/contenido/4.png') }}" alt="" class="object-contain px-8  h-50  ">
            </div>
        </div>
        {{-- <div class=" "> --}}

        <div class="flex flex-col items-center justify-center bg-amarillo py-8 px-4  ">

            <span class="font-medium text-lg text-blanco ">¿Listo para dar el siguiente paso?
            </span>
            <button
                class="text-blanco border-2 border-azul-plomo bg-azul-plomo hover:bg-blanco hover:text-azul-plomo my-4 px-4 py-2 rounded-md  "><a
                    href="">Crear mi cuenta</a></button>
        </div>

        {{-- </div> --}}
    </div>
    {{-- <div class="flex justify-end"> --}}
    @extends('components.footer')
    {{-- </div>  --}}
