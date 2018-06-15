<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table    = "pedidos";
    protected $fillable = [
        'fecha', 'iva', 'subtotal', 'total', 'distribuidor_id',
    ];

    public function distribuidor()
    {
        return $this->belongsTo('App\Distribuidor');
    }
}
