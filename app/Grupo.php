<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    // Tabla de la BBDD. Pero no haría falta porque Pluralize lo convierte añadiendole una s.
    protected $table = "grupos";

    // Todos modificables menos la ID
    protected $guarded = [];

    // No queremos timestamps
    public $timestamps = false;
}
