<?php

namespace App\Http\Controllers;

use App\Mail\pedido;
use App\Producto;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ZprivadaController extends Controller
{
    public function productos()
    {
        $activo    = 'productos';
        $ready     = 0;
        $config    = 4;
        $productos = Producto::OrderBy('orden', 'ASC')->get();
        $aux       = Producto::orderBy('orden', 'ASC')->get();
        $prod      = $aux->toJson();
        return view('privada.productos', compact('activo', 'productos', 'ready', 'prod', 'config'));
    }

    public function add(Request $request)
    {

        $activo   = 'carrito';
        $producto = Producto::find($request->id);

        if ($request->cantidad > 0) {
            Cart::add(['id' => $producto->id, 'name' => $producto->nombre, 'price' => $producto->precio, 'qty' => $request->cantidad, 'options' => ['codigo' => $producto->codigo, 'orden' => $producto->orden]]);
            return view('privada.carrito', compact('activo'));
        } else {
            return back();
        }
    }

    public function send(Request $request)
    {
        $activo = 'carrito';
        foreach (Cart::content() as $row) {
            $producto = $row->name;
            $cantidad = $row->qty;
            $precio   = $row->price;
        }

        $subtotal = Cart::Subtotal();
        $total    = Cart::Total();
        $mensaje  = $request->input('mensaje');
        Mail::to('fjo224@gmail.com')->send(new pedido($producto, $cantidad, $precio, $subtotal, $total, $mensaje));

        if (count(Mail::failures()) > 0) {

            $success = 'Ha ocurrido un error al enviar el correo';

        } else {

            $success = 'Pedido enviado correctamente';

        }
        Cart::destroy();

        return view('privada.carrito', compact('activo'))->with('success', $success);

    }

    public function delete($id)
    {
        $activo = 'carrito';
        Cart::remove($id);
        return view('privada.carrito', compact('activo'));
    }

}
