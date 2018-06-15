<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imgnovedad extends Model
{
    protected $table    = "imgnovedades";
    protected $fillable = [
        'imagen', 'novedad_id', 'orden',
    ];

    public function novedad()
    {
        return $this->belongsTo('App\Novedad');
    }
}