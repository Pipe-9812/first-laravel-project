<x-layouts.app title="Nuevo Post" meta-description="Formulario para crear un nuevo blog post">
    <header class="px-6 pt-0 pb-4 text-center mb-7 border-b border-slate-300">
        <h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">
            Crear Nuevo Post
        </h1>
    </header>

    <form method="POST" action="{{ route('posts.store') }}" class="flex flex-col max-w-xl px-8 py-6 mx-auto bg-white shadow dark:bg-slate-800 rounded-lg">

        <span class="sticky top-0 border-b bg-white border-slate-200 pb-2 mb-5">
            <a href="{{ route('posts.index') }}" class="inline-flex gap-2 py-1 px-3 items-center mr-auto text-sm font-semibold transition duration-300 text-sky-600 dark:text-sky-500
            rounded-lg hover:bg-slate-100 rounded hover:shadow focus:border-slate-500 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                  
                Volver
            </a>
        </span>
        
        {{-- Token CSRF, expira cada 2 horas (por defecto) --}}
        @csrf
        {{-- --- --}}

        @include('posts.form-fields')

        <div class="flex items-center justify-between mt-4">
            <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Enviar</button>
        </div>
    </form>
</x-layouts.app>
