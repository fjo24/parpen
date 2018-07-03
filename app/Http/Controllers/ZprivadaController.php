<?php

namespace App\Http\Controllers;

use App\Mail\pedidom;
use App\Producto;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
Use App\Pedido;
use Carbon\Carbon;
class ZprivadaController extends Controller
{
    public function productos()
    {
        $activo    = 'productos';
        $carrito = Cart::content();   
        $items = $carrito->all();
        $ready     = 0;
        $config    = 4;
        $productos = Producto::OrderBy('orden', 'ASC')->get();
        $aux       = Producto::orderBy('orden', 'ASC')->get();
        $prod      = $aux->toJson();
      // dd($carrito->all());
        return view('privada.productos', compact('carrito','activo', 'productos', 'ready', 'prod', 'config', 'items'));
    }

    public function add(Request $request)
    {

        $activo   = 'pedido';
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
            //$idproducto = $row->rowId
        }

        $subtotal = Cart::Subtotal();
        $total    = Cart::Total();
        $mensaje  = $request->input('mensaje');
       // dd($request->total);
        $pedidox = new Pedido();
        $pedidox->fecha = Carbon::now();
        $pedidox->iva=8;
        $pedidox->total=$subtotal;
        $pedidox->distribuidor_id=1;
        $pedidox->save();

        //$pedidox->productos
        //$pedidox->productos()->sync(array('cantidad' => $request->cantidad[$i], 'cantidad' => $request->cantidad[$i], 3, 4));

   //     for ($i = 0; $i < count($request->id); $i++) {
   //         $pedidox->productos()->attach($request->producto[$i], ['cantidad' => $request->cantidad[$i], 'price' => $request->costo[$i]]);
     //   }

        Mail::to('fjo224@gmail.com')->send(new pedidom($producto, $cantidad, $precio, $subtotal, $total, $mensaje));

        if (count(Mail::failures()) > 0) {

            $success = 'Ha ocurrido un error al enviar el correo';
            dd("si");
        } else {
            dd("no");
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
