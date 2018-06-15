<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $table    = "novedades";
    protected $fillable = [
        'nombre', 'fecha', 'descripcion', 'video', 'video_descripcion', 'seccion', 'orden',
    ];

    public function imagenes()
    {
        return $this->hasMany('App\Imgproducto');
    }
}
