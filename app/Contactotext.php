<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactotext extends Model
{
    protected $table    = "contactotexts";
    protected $fillable = [
        'contenido',
    ];
}
