<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    // Tabla de la BBDD. Pero no haría falta porque Pluralize lo convierte añadiendole una s.
    protected $table = "personajes";

    // Todos modificables menos la ID
    protected $guarded = ["id"];

    // No queremos timestamps
    public $timestamps = false;
}
