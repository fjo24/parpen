<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\Dato;
use App\Producto;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ZprivadaController extends Controller
{
    public function productos()
    {
        $activo    = 'productos';
        $carrito   = Cart::content();
        $items     = $carrito->all();
        $ready     = 0;
        $config    = 4;
        $shop      = 0;
        $productos = Producto::OrderBy('orden', 'ASC')->get();
        $aux       = Producto::orderBy('orden', 'ASC')->get();
        $prod      = $aux->toJson();
        // dd($carrito->all());
        return view('privada.productos', compact('shop', 'carrito', 'activo', 'productos', 'ready', 'prod', 'config', 'items'));
    }

    public function add(Request $request)
    {
        $activo    = 'productos';
        $carrito   = Cart::content();
        $items     = $carrito->all();
        $ready     = 0;
        $config    = 4;
        $shop      = 0;
        $productos = Producto::OrderBy('orden', 'ASC')->get();
        $producto  = Producto::find($request->id);

        if ($request->cantidad > 0) {
            Cart::add(['id' => $producto->id, 'name' => $producto->nombre, 'price' => $producto->precio, 'qty' => $request->cantidad, 'options' => ['codigo' => $producto->codigo, 'orden' => $producto->orden]]);
            return redirect()->route('zproductos', compact('shop', 'carrito', 'activo', 'productos', 'ready', 'prod', 'config', 'items'));
        } else {
            return back();
        }
    }

    public function carrito(Request $request)
    {

        $activo = 'pedido';

        return view('privada.carrito', compact('activo'));
    }

    public function send(Request $request)
    {
        $activo = 'carrito';
        $dato   = Dato::where('tipo', 'mail')->first();
        foreach (Cart::content() as $row) {
            $producto = $row->name;
            $cantidad = $row->qty;
            $precio   = $row->price;
            //$idproducto = $row->rowId
        }
        $carrito = Cart::content();
        $items   = $carrito->all();

        $subtotal = Cart::Subtotal();
        $total    = Cart::Total();
        $mensaje  = $request->input('mensaje');
        // dd($request->total);

        Mail::send('privada.mailpedido', ['total' => $total, 'items' => $items, 'row' => $row, 'subtotal' => $subtotal, 'mensaje' => $mensaje], function ($message) {

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'Parpen');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject("Pedido");

        });
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

    public function listadeprecios()
    {
        $activo    = 'listadeprecios';
        $catalogo = Catalogo::orderBy('created_at', 'ASC')->first();

        return view('privada.listadeprecios', compact('activo', 'catalogo'));
    }

    public function downloadPdf2($id)
    {
        $catalogo = Catalogo::find($id);
        $path     = public_path();
        $url      = $path . '/' . $catalogo->pdf;
        return response()->download($url);
        return redirect()->route('catalogos.index');
    }

    public function ofertasynovedades()
    {
        $activo        = 'ofertasynovedades';
        $productos     = Producto::OrderBy('orden', 'ASC')->orwhere('tipo', 'novedad')->orwhere('tipo', 'oferta')->get();
        $ready         = 0;

        return view('privada.ofertasynovedades', compact('productos', 'activo', 'ready'));
    }

}
