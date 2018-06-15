<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table    = "productos";
    protected $fillable = [
        'nombre', 'orden', 'ficha', 'contenido', 'categoria_id',
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
