<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\NovedadesRequest;
use App\Imgnovedad;
use App\Novedad;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NovedadesController extends Controller
{
    //'nombre', 'fecha', 'descripcion', 'video', 'video_descripcion', 'seccion', 'orden',
    public function index()
    {
        $novedades = Novedad::orderBy('seccion', 'ASC')->get();
        return view('adm.novedades.index', compact('novedades'));
    }

    public function create()
    {
        return view('adm.novedades.create');
    }

    public function store(NovedadesRequest $request)
    {
        $novedad                    = new novedad();
        $novedad->nombre            = $request->nombre;
        $novedad->fecha             = $request->fecha;
        $novedad->descripcion       = $request->descripcion;
        $novedad->contenido         = $request->contenido;
        $novedad->video             = $request->video;
        $novedad->video_descripcion = $request->video_descripcion;
        $novedad->seccion           = $request->seccion;
        $novedad->orden             = $request->orden;
        $novedad->save();
        $id = $novedad->id;

        return redirect()->route('novedades.index');
    }

    public function edit($id)
    {
        $novedad = Novedad::find($id);
        return view('adm.novedades.edit', compact('novedad'));
    }

    public function update(NovedadesRequest $request, $id)
    {
        $novedad                    = Novedad::find($id);
        $novedad->nombre            = $request->nombre;
        $novedad->fecha             = $request->fecha;
        $novedad->descripcion       = $request->descripcion;
        $novedad->contenido         = $request->contenido;
        $novedad->video             = $request->video;
        $novedad->video_descripcion = $request->video_descripcion;
        $novedad->seccion           = $request->seccion;
        $novedad->orden             = $request->orden;
        $novedad->save();

        return redirect()->route('novedades.index');
    }

    public function destroy($id)
    {
        $novedad = Novedad::find($id);
        $novedad->delete();
        return redirect()->route('novedades.index');
    }

    //admin de imagenes
    public function imagenes($id)
    {
        $imagenes = Imgnovedad::orderBy('id', 'ASC')->Where('novedad_id', $id)->get();

        $novedad = Novedad::find($id);
        return view('adm.novedades.imagenes')->with(compact('imagenes', 'novedad'));
    }

    public function nuevaimagen(Request $request, $id)
    {

        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/novedad/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen             = new Imgnovedad;
                $imagen->imagen     = 'img/novedad/' . $id . '_' . $file->getClientOriginalName();
                $imagen->orden      = $request->orden;
                $imagen->novedad_id = $id;
                $imagen->save();
            }
        }

        $imagenes = Imgnovedad::orderBy('id', 'ASC')->Where('novedad_id', $id)->get();

        $novedad = Novedad::find($id);
        return view('adm.novedades.imagenes')->with(compact('imagenes', 'novedad'));
    }

    public function destroyimg($id)
    {
        $imagen    = Imgnovedad::find($id);
        $idnovedad = $imagen->novedad_id;
        $imagen->delete();
        $imagenes = Imgnovedad::orderBy('id', 'ASC')->Where('novedad_id', $idnovedad)->get();

        $novedad = Novedad::find($idnovedad);
        return view('adm.novedades.imagenes')->with(compact('imagenes', 'novedad'));
    }
}
