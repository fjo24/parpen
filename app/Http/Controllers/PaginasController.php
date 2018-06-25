<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Categoria_obra;
use App\Cliente;
use App\Consejo;
use App\Dato;
use App\Destacado_empresa;
use App\Destacado_home;
use App\Destacado_mantenimiento;
use App\Obra;
use App\Obra_imagen;
use App\Producto;
use App\Servicio;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaginasController extends Controller
{
    public function home()
    {
        $activo    = 'mantenimiento';
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'home')->get();
        $contenido = Destacado_home::all()->first();
        return view('pages.home', compact('sliders', 'servicios', 'banner', 'contenido', 'activo'));
    }

    public function productos()
    {
        $activo        = 'producto';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();
        $todos         = Producto::OrderBy('orden', 'ASC')->get();

        return view('pages.productos', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos'));
    }

    public function categorias($id)
    {
        $ref           = $id;
        $cat           = Categoria::find($id);
        $activo        = 'producto';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();
        $todos         = Producto::where('categoria_id', $id)->OrderBy('orden', 'ASC')->get();

        return view('pages.categorias', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos', 'ref', 'cat'));
    }

    public function subcategorias($id)
    {
        $sub           = Categoria::find($id);
        $subref        = $sub->id;
        $ref           = $sub->id_superior;
        $cat           = Categoria::find($ref);
        $activo        = 'producto';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();
        $todos         = Producto::where('categoria_id', $id)->OrderBy('orden', 'ASC')->get();

        return view('pages.subcategorias', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos', 'ref', 'subref', 'sub', 'cat'));
    }

    public function mantenimiento()
    {
        $activo    = 'mantenimiento';
        $servicios = Servicio::OrderBy('orden', 'ASC')->get();
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'mantenimiento')->get();
        $contenido = Destacado_mantenimiento::all()->first();
        return view('pages.mantenimiento', compact('sliders', 'servicios', 'contenido', 'activo'));
    }

    public function productoinfo($id)
    {
        $p = Producto::find($id);
        $idsub    = $p->categoria_id;
        $sub      = Categoria::find($idsub);
        if ($sub->id_superior != null) {
            $cat = Categoria::find($sub->id_superior);
        }else{
            $cat = Categoria::find($idsub);
        }
        $ready = 0;
        $relacionados = Producto::OrderBy('orden', 'ASC')->Where('categoria_id', $p->categoria_id)->get();
        $subref        = $sub->id;
        $ref           = $sub->id_superior;
        $activo        = 'producto';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();

        return view('pages.producto', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'ready', 'activo', 'ref', 'subref', 'sub', 'cat', 'p', 'relacionados'));
    }

    public function empresa()
    {
        $activo    = 'empresa';
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'empresa')->get();
        $contenido = Destacado_empresa::all()->first();
        return view('pages.empresa', compact('sliders', 'contenido', 'activo'));
    }

    public function categoriaobras()
    {
        $activo = 'obras';
        $obras  = Categoria_obra::OrderBy('orden', 'asc')->get();
        return view('pages.catobras', compact('obras', 'activo'));
    }

    public function obras($id)
    {
        $activo    = 'obras';
        $categoria = Categoria::find($id);
        $ready     = 0;
        $servicios = Producto::OrderBy('orden', 'ASC')->get();
        $obras     = Obra::OrderBy('orden', 'ASC')->where('categoria_obra_id', $id)->get();
        return view('pages.obras', compact('obras', 'ready', 'categoria', 'servicios', 'activo'));
    }
    public function obrainfo($id)
    {
        $activo  = 'obras';
        $obra    = Obra::find($id);
        $sliders = Slider::orderBy('id', 'ASC')->Where('seccion', 'obras')->get();
        return view('pages.obrainfo', compact('obra', 'sliders', 'activo'));
    }

    public function modeloinfo($id)
    {
        $activo        = 'productos';
        $modelo        = Modelo::find($id);
        $categorias    = Categoria::OrderBy('orden', 'asc')->get();
        $producto      = Producto::find($modelo->producto_id);
        $idc           = $producto->categoria_id;
        $ready         = 0;
        $vidrio1       = Tipovidrio::find(1);
        $vidrio2       = Tipovidrio::find(2);
        $imgtipos      = Imgtipo::OrderBy('id', 'asc')->get();
        $imgvidrio     = Imgvidrio::OrderBy('id', 'asc')->get();
        $categoria     = Categoria::find($idc);
        $tipos_ventana = Tipoventana::OrderBy('orden', 'asc')->get();
        return view('pages.modeloinfo', compact('producto', 'categoria', 'modelo', 'categorias', 'tipos_ventana', 'ready', 'imgtipos', 'vidrio1', 'vidrio2', 'imgvidrio', 'activo'));
    }

    public function servicios()
    {
        $activo    = 'null';
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'servicios')->get();
        $servicios = Servicio::OrderBy('id', 'ASC')->get();
        return view('pages.servicios', compact('sliders', 'servicios', 'activo'));
    }

    public function galeria($id)
    {
        $activo   = 'obras';
        $ready    = 0;
        $obra     = Obra::find($id);
        $imagenes = Obra_imagen::OrderBy('id', 'ASC')->where('obra_id', '$id')->get();
        return view('pages.obragaleria', compact('obra', 'imagenes', 'ready', 'activo'));
    }

    public function fabrica()
    {
        $activo  = 'null';
        $fabrica = Fabrica::all()->first();
        $sliders = Slider::orderBy('id', 'ASC')->Where('seccion', 'fabrica')->get();
        return view('pages.fabrica', compact('fabrica', 'sliders', 'activo'));
    }

    public function presupuesto()
    {
        $activo  = 'null';
        $sliders = Slider::orderBy('id', 'ASC')->Where('seccion', 'presupuesto')->get();
        return view('pages.presupuesto', compact('sliders', 'activo'));
    }

    public function enviarpresupuesto(Request $request)
    {
        $activo    = 'null';
        $sliders   = Slider::orderBy('id', 'ASC')->Where('seccion', 'presupuesto')->get();
        $nombre    = $request->nombre;
        $mail      = $request->mail;
        $localidad = $request->localidad;
        $tel       = $request->tel;
        $detalle   = $request->detalle;
        $medida    = $request->medida;

        $newid = producto::all()->max('id');
        $newid++;

        if ($request->hasFile('archivo')) {
            if ($request->file('archivo')->isValid()) {
                $file = $request->file('archivo');
                $path = public_path('img/archivos/');
                $request->file('archivo')->move($path, $newid . '_' . $file->getClientOriginalName());
                $archivo = 'img/archivos/' . $newid . '_' . $file->getClientOriginalName();

            }
        }

        Mail::send('pages.emails.presupuestomail', ['nombre' => $nombre, 'tel' => $tel, 'mail' => $mail, 'localidad' => $localidad, 'detalle' => $detalle, 'medida' => $medida], function ($message) use ($archivo) {

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'Excelsior');

            $message->to($dato->descripcion);

            //Attach file
            $message->attach($archivo);

            //Add a subject
            $message->subject("Presupuesto");

        });
        if (Mail::failures()) {
            return view('pages.presupuesto');
        }
        return view('pages.presupuesto', compact('activo'));
    }

    public function consejos()
    {
        $activo   = 'consejos';
        $consejos = Consejo::orderBy('orden', 'ASC')->get();
        $switch   = 1;
        return view('pages.consejos', compact('consejos', 'switch', 'activo'));
    }

    public function clientes()
    {
        $activo   = 'clientes';
        $clientes = Cliente::orderBy('orden', 'ASC')->get();
        return view('pages.clientes', compact('clientes', 'activo'));
    }

    public function contacto()
    {
        $activo = 'null';
        return view('pages.contacto', compact('activo'));
    }

    public function enviarmail(Request $request)
    {
        $activo   = 'null';
        $dato     = Dato::where('tipo', 'mail')->first();
        $nombre   = $request->nombre;
        $apellido = $request->apellido;
        $empresa  = $request->empresa;
        $email    = $request->email;
        $mensaje  = $request->mensaje;

        Mail::send('pages.emails.contactomail', ['nombre' => $nombre, 'apellido' => $apellido, 'empresa' => $empresa, 'email' => $email, 'mensaje' => $mensaje], function ($message) {

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'Excelsior');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject("Contacto");

        });
        if (Mail::failures()) {
            return view('pages.contacto');
        }
        return view('pages.contacto', compact('activo'));
    }

}
