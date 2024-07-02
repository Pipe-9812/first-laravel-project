<x-layouts.app title="Registrarse" meta-description="Ingresar del Proyecto">
    <header class="px-6 pt-0 pb-4 text-center mb-7 border-b border-slate-300">
        <h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">Ingresar</h1>
    </header>

    <form method="POST" action="{{ route('login') }}" class="flex flex-col max-w-xl px-8 py-6 mx-auto bg-white shadow dark:bg-slate-800 rounded-lg">
        <div class="flex w-full border-b border-slate-200 pb-2 mb-5">
            <a href="{{ route('register') }}" class="flex gap-2 py-1 px-3 items-center text-sm font-semibold transition duration-300 text-sky-600 dark:text-sky-500 rounded-lg hover:bg-slate-100 rounded hover:shadow focus:border-slate-500 focus:outline-none ml-auto">
                Registrarse
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
            </a>
        </div>
        
        {{-- Token CSRF, expira cada 2 horas (por defecto) --}}
        @csrf
        {{-- --- --}}

        @error('session')
            <div class="p-4 mb-4 text-sm text-red-900 rounded-lg bg-red-100 dark:bg-gray-800 dark:text-red-400 shadow-md" role="alert">
                <span class="font-medium me-2">Alerta:</span>{{ $message }}
          </div>
        @enderror

        <div class="space-y-4">
            <div class="flex flex-col">
                <label class="text-slate-600 dark:text-slate-400 font-bold cursor-pointer" for="userEmail">
                    Email:
                </label>
            
                <input id="userEmail" type="email" name="email" value="{{old('email')}}" class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400">
            
                @error('email')
                    <small class="font-bold text-red-500/80">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="flex flex-col">
                <label class="text-slate-600 dark:text-slate-400 font-bold cursor-pointer" for="userPassword">
                    Contraseña:
                </label>
            
                <input id="userPassword" type="password" name="password" class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400">
            
                @error('password')
                    <small class="font-bold text-red-500/80">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="flex items-center">
                <input id="remember" type="checkbox" name="remember" class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400 cursor-pointer">

                <label class="ml-2 text-slate-600 dark:text-slate-400 font-bold cursor-pointer" for="remember">
                    Recordar Contraseña:
                </label>
            </div>
        </div>

        <div class="flex items-center justify-between mt-4">
            <button class="flex w-full items-center justify-center px-4 py-2 my-3 text-md text-base font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">
                Ingresar
            </button>
        </div>
    </form>
</x-layouts.app>