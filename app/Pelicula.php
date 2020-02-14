<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    // Tabla de la BBDD. Pero no haría falta porque Pluralize lo convierte añadiendole una s.
    protected $table = "peliculas";

    // Todos modificables menos la ID
    protected $guarded = [];

    // No queremos timestamps
    public $timestamps = false;
}
