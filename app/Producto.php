<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table    = "productos";
    protected $fillable = [
        'nombre', 'codigo', 'descripcion', 'contenido', 'categoria_id', 'video', 'video_descripcion', 'precio', 'visible', 'orden',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function imagenes()
    {
        return $this->hasMany('App\Imgproducto');
    }
}
