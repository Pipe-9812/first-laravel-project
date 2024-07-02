<x-layouts.app title="Registrarse" meta-description="Registrarse del Proyecto">
    <header class="px-6 pt-0 pb-4 text-center mb-7 border-b border-slate-300">
        <h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">Registrarse</h1>
    </header>

    <form method="POST" action="{{ route('register') }}" class="flex flex-col max-w-xl px-8 py-6 mx-auto bg-white shadow dark:bg-slate-800 rounded-lg">
        <div class="flex w-full border-b border-slate-200 pb-2 mb-5">
            <a href="{{ route('login') }}" class="flex gap-2 py-1 px-3 items-center text-sm font-semibold transition duration-300 text-sky-600 dark:text-sky-500 rounded-lg hover:bg-slate-100 rounded hover:shadow focus:border-slate-500 focus:outline-none ml-auto">
                Ir al Login
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                </svg>
            </a>
        </div>
        
        {{-- Token CSRF, expira cada 2 horas (por defecto) --}}
        @csrf
        {{-- --- --}}

        <div class="space-y-4">
            <div class="flex flex-col">
                <label class="text-slate-600 dark:text-slate-400 font-bold cursor-pointer" for="userName">
                    Nombre:
                </label>
            
                <input id="userName" type="text" name="name" value="{{old('name')}}" autofocus="autofocus" class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400">
            
                @error('name')
                    <small class="font-bold text-red-500/80">
                        {{ $message }}
                    </small>
                @enderror
            </div>

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

            <div class="flex flex-col">
                <label class="text-slate-600 dark:text-slate-400 font-bold cursor-pointer" for="confirmPassword">
                    Confirmar Contraseña:
                </label>
            
                <input id="confirmPassword" type="password" name="password_confirmation" class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400">
            
                @error('password_confirmation')
                    <small class="font-bold text-red-500/80">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>

        <div class="flex items-center justify-start mt-8">
            <button class="inline-flex items-center px-4 py-2 text-md font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Registrarse</button>
        </div>
    </form>
</x-layouts.app>