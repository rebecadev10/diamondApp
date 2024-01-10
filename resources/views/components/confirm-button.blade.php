<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-azul-plomo border border-azul-plomo rounded-md font-semibold text-xs text-blanco fill-blanco uppercase tracking-widest shadow-sm hover:bg-azul-normal hover:text-blanco hover:fill-blanco focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
