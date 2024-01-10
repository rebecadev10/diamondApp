@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-amarillo text-xs font-medium leading-5 text-blanco focus:outline-none focus:border-amarillo transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-xs font-medium leading-5 text-blanco hover:text-blanco hover:bg-amarillo rounded-lg focus:outline-none focus:text-blanco focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
