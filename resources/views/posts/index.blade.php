<style>
     /* Tooltip container */
     .tooltip {
      position: relative;
      display: inline-block;
    }

    /* Tooltip text */
    .tooltip .tooltiptext {
      visibility: hidden;
      width: 120px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;

      /* Position the tooltip text - see examples below! */
      position: absolute;
      z-index: 1;
      bottom: 125%; /* Change this to move the tooltip */
      left: 50%;
      margin-left: -60px;

      /* Fade in tooltip - takes 0.3 seconds to go from 0% to 100% opac: */
      opacity: 0;
      transition: opacity 0.3s;
    }

    /* Tooltip arrow */
    .tooltip .tooltiptext::after {
      content: "";
      position: absolute;
      top: 100%; /* At the bottom of the tooltip */
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: black transparent transparent transparent;
    }

    /* Show the tooltip text when you mouse over the tooltip container */
    .tooltip:hover .tooltiptext {
      visibility: visible;
      opacity: 1;
    }
</style>

<x-layouts.app title="Blog" meta-description="Blog del Proyecto">

    <header class="px-6 pt-0 pb-4 text-center mb-7 border-b border-slate-300">
        <h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">Blog</h1>

        @auth
            <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-900 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky" href="{{ route('posts.create') }}">Crear nuevo post</a>
        @endauth
    
    </header>

    <main class="grid w-full gap-4 px-4 sm:grid-cols-2 md:grid-cols-3">
        @foreach($posts as $post)
            <div class="max-w-3xl p-4 space-y-4 bg-white rounded-xl border shadow-inner shadow-slate-100 dark:border-gray-600 dark:shadow-none dark:bg-slate-800">
                <h2 class="text-xl text-slate-600 dark:text-slate-300">
                    <a href="{{ route('posts.show', $post) }}" class="tooltip inline-flex gap-2 items-center border-b-2 border-transparent hover:border-b-slate-500 transition duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                          </svg>

                        {{ $post->title }}

                        <span class="tooltiptext">Ver Post</span>
                    </a>
                </h2>

                @auth
                    <div class="flex justify-end gap-4">
                        <form class="m-0" action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="inline-flex items-center text-xs font-semibold p-2 border border-red-200 rounded-md tracking-widest text-center text-red-500 uppercase transition duration-300 ease-in-out dark:text-red-500/80 hover:text-red-600 hover:bg-red-100 focus:outline-none" type="submit">Eliminar</button>
                        </form>

                        <a class="inline-flex items-center text-xs font-semibold tracking-widest text-center uppercase transition duration-300 ease-in-out p-2 border rounded-md hover:bg-slate-200 dark:text-slate-400 text-slate-500 hover:text-slate-600 dark:hover:text-slate-500 focus:outline-none focus:border-slate-200" href="{{ route('posts.edit', $post) }}">Editar</a>
                    </div>
                @endauth
            </div>
        @endforeach
    </main>

    {{-- @foreach ($posts as $post)
        <div style="display: flex; justify-content: space-between; align-items: baseline; gap: 0.5rem; border: 1px solid silver; border-radius: 0.5rem; margin-bottom: 0.7rem; padding: 0 0.5rem;">
            <h2>
                <a href="{{ route('posts.show', $post->id) }}">
                    {{ $post->title }}
                </a>
            </h2>
            
            <div style="display: flex; gap: 0.7rem;">
                <a href="{{ route('posts.edit', $post) }}">Editar</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf

                    @method('DELETE')

                    <button type="submit">Borrar</button>
                </form>
            </div>
        </div>
    @endforeach     --}}
    
</x-layouts.app>