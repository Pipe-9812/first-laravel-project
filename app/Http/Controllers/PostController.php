<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    // Método = index
    // Para listar todos los datos
    public function index()
    {
        // Sin usar Modelo:
        // $posts = DB::table('posts')->get();

        $posts = Post::get();

        return view('posts.index', ['posts' => $posts]);
    }

    // ________________________________________________

    // Método = show
    // Para mostrar el detalle de los datos

    // Se indica Type Hints como primer parámetro de Show
    public function show(Post $post)
    {
        // Sin Type Hints:
        // return Post::findOrFail($post);

        // Con Type Hints (Post):
        // return $post;

        return view('posts.show', ['post' => $post ]);
    }

    // ________________________________________________

    // Método = create
    // Devuelve el formulario/vista para crear un nuevo dato/registro
    public function create() {
        return view('posts.create', ['post' => new Post]);
    }

    // Método = store
    // Para almacenar los datos/registros en la base de datos
    public function store(SavePostRequest $request) {

        // Validación de datos
        // Recibe un arreglo con los campos a validar (atributo name).
        // Y a su vez el campo recibe otro arreglo con las reglas
        // de validación que se quieren aplicar.
        
        // Las reglas de validación se pueden ver en:
        // https://laravel.com/docs/11.x/validation
        // $request->validate([
        //     'title' => ['required', 'min: 4'],
        //     'body' => ['required']
        // ]);

        // Se quita la siguiente validacion, ya que se esta haciendo uso del nuevo
        // request = SavePostRequest
        // $validated = $request->validate([
        //     'title' => ['required', 'min: 4'],
        //     'body' => ['required']
        // ]);
        
        // Almacenamiento de datos en la base de datos con Eloquent:
        // $post = new Post;
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();

        // Usando el método create de Eloquent
        // Post::create([
        //     'title' => $request->input('title'),
        //     'body'  => $request->input('body')
        // ]);

        // Pasando los campos al método create con la variable de validación
        // Post::create($validated);

        // Al no tener la variable $validated, ya que se esta usando el nuevo 
        // request = SavePostRequest entonces se agrega solo el request con el metedo
        // validated()
        Post::create($request->validated());


        // Mensajes de sesión
        // Recibe 2 argumentos:
        // 1- Nombre del mensaje
        // 2- Mensaje
        // session()->flash('success', 'Post Creado!!');

        // return redirect()->route('posts.index');
        // El anterior enrutamiento es igual a:
        return to_route('posts.index')->with('success', 'Post creado!!');
    }

    // ________________________________________________

    // Método = edit
    // Devuelve el formulario/vista para editar un dato/registro existente
    public function edit(Post $post)
    {
        // return view('posts.edit', ['post' => $post]);
        return view('posts.edit', compact('post'));
    }

    // Método = update
    // Para almacenar los cambios de un datos/registros existente en la base de datos
    public function update(SavePostRequest $request, Post $post)
    {
        // $validated = $request->validate([
        //     'title' => ['required', 'min: 4'],
        //     'body' => ['required']
        // ]);
        
        // Se actualizan los datos en la base de datos con Eloquent:
        // $post = Post::find($post);
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();

        // Usando el método update de Eloquent para simplificar código 
        // de lo anterior.
        // $post->update([
        //     'title' => $request->input('title'),
        //     'body'  => $request->input('body'),
        // ]);

        // Pasando los campos al método create con la variable de validación
        $post->update($request->validated());

        // Mensajes de sesión
        // Recibe 2 argumentos:
        // 1- Nombre del mensaje
        // 2- Mensaje
        // session()->flash('updated', 'Post Actualizado Correctamente!!');

        // Se puede agregar el mismo mensaje flash con el método with() 
        // después de haber llamado el método to_route() en el return

        // return redirect()->route('posts.index');
        // El anterior enrutamiento es igual a:
        return to_route('posts.show', $post)->with('updated', 'Post actualizado correctamente!!');
    }

    // ________________________________________________

    // Método = destroy
    // Para eliminar los datos/registros de la base de datos
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index')->with('deleted', 'Post eliminado correctamente');
    }
}
