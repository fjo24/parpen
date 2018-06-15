<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribuidor extends Model
{
	protected $table    = "distribuidores";

    protected $fillable = [
        'name', 'username', 'email', 'telefono', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }
}
