<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use Illuminate\Auth\Events\Registered;

// Route::get('/', function () {
//     return view('welcome');
// });



// Parámetros de las rutas:
// 1er Parámetro: Definición de la ruta
//     Ej: http://laravel-project.test/about

// 2ndo Parámetro: Se llamara al nombre del archivo ó 
// a un método un controlador
//     Ej: " [PostController::class, 'index'] "

Route::view('/', 'home')->name('home');
// ________________________________________________

Route::view('/about', 'about')->name('about');
// ________________________________________________

// Route::get('/blog', [PostController::class, 'index'])->name('posts.index');

// Route::get('blog/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/blog', [PostController::class, 'store'])->name('posts.store');

// Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');

// Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::patch('/blog/{post}', [PostController::class, 'update'])->name('posts.update');

// Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Las anteriores rutas de los 7 métodos rests se pueden simplificar en una sola con el método resource
// 3er Parámetro del método resource: Recibe una array de configuración para:
// - Darle nombre a la ruta ('names')
// - Darle nombre al parámetro de la ruta {post}
Route::resource('blog', PostController::class, [
    'names'      => 'posts',
    'parameters' => ['blog' => 'post']
]);
// ________________________________________________

Route::view('/contact', 'contact')->name('contact');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

// Comando para ver el listado de las rutas:
// php artisan route:list --path=nombre_de_ruta