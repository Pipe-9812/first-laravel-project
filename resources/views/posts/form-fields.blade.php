<div class="space-y-4">
    <div class="flex flex-col">
        <label class="text-slate-600 dark:text-slate-400 font-bold cursor-pointer" for="title">
            Titulo:
        </label>
    
        <input id="title" type="text" name="title" value="{{old('title', $post->title)}}" class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400">
    
        @error('title')
            <small class="font-bold text-red-500/80">
                {{ $message }}
            </small>
        @enderror
    </div>
    
    <div class="flex flex-col">
        <label class="text-slate-600 dark:text-slate-400 font-bold cursor-pointer" for="body">
            Contenido:
        </label>
        
        <textarea id="body" rows="10" name="body" class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400">{{old('body', $post->body)}}</textarea>
    
        @error('body')
            <small class="font-bold text-red-500/80">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>