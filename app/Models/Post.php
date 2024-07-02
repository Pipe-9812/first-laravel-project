<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Como el modelo se llama "Post" asume el plural del
// nombre de la tabla, osea "posts"

class Post extends Model
{
    use HasFactory;

    // Propiedad $table es para asignar un nombre diferente a la tabla:
    // protected $table = 'posts';


    // La propiedad $fillable condiciona el guardado en la base de datos
    // de los campos que se definan:
    // protected $fillable = ['title', 'body'];


    // La propiedad $guarded se define lo opuesto al $fillable
    // Es decir los campos que no podrán ser asignados de forma masiva.
    // ---------------------
    // Si se deja vacía esta propiedad, permite guardar todos los campos, por
    // lo tanto nunca se debe pasar el método all ( $request->all() ) a los 
    // métodos create y update del modelo Eloquent ya que intentaría guardar
    // los inputs ocultos (csrf por ejemplo) ademas de que si un usuario malintencionado
    // agrega un nuevo campo por el DevTools del navegador también lo intentaría guardar.
    // ----------------------
    // Lo mejor entonces es pasar los campos validados ( request->validated() )
    // del request personalizado (SavePostRequest)

    // protected $guarded = [ ];

    // Para hacer usa globalmente de lo anterior se define
    // Model::unguard();
    // En el método boot() del archivo app\Providers\AppServiceProvider.php
}
