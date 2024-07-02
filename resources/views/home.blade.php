<x-layouts.app title="Home" meta-description="Home del Proyecto">
    <header class="px-6 pt-0 pb-4 text-center mb-7 border-b border-slate-300">
        <h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">
            Home
        </h1>
    </header>

    @auth
        <div class="p-5 shadow-md text-xl text-center">
            <b>Bienvenido:</b>
            {{ Auth::user()->name }}
        </div>
    @endauth
</x-layouts.app>
