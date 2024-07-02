<x-layouts.app :title="$post->title" :meta-description="$post->body">
    <h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">
        {{ $post->title }}
    </h1>

    <div class="flex flex-col max-w-xl px-8 py-6 mx-auto bg-white shadow dark:bg-slate-800 rounded-lg">
        <span class="sticky top-0 border-b border-slate-200 pb-2 mb-5">
            <a href="{{ route('posts.index') }}" class="inline-flex gap-2 py-1 px-3 items-center mr-auto text-sm font-semibold transition duration-300 text-sky-600 dark:text-sky-500
            rounded-lg hover:bg-slate-100 rounded hover:shadow focus:border-slate-500 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                  
                Volver
            </a>
        </span>
        
        <p class="flex flex-col h-96 overflow-auto leading-normal text-slate-600 dark:text-slate-400 sub-scrollbar">
            <span class="border border-slate-300 rounded-xl text-center p-2 mb-2 sticky top-0 backdrop-blur-md shadow">
                Contenido:
            </span>

            <span class="italic">
                {{ $post->body }}
            </span>
        </p>
    </div>
    
</x-layouts.app>