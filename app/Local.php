<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table    = "locales";
    protected $fillable = [
        'nombre', 'direccion', 'localidad', 'provincia', 'telefono', 'logitud', 'latitud',
    ];
}