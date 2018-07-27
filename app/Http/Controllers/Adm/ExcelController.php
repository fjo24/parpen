<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class ExcelController extends Controller
{
    public function importCat(Request $request)
{
    \Excel::load($request->excel, function($reader) {

        $excel = $reader->get();

        // iteracción
        $reader->each(function($row) {
            $cate_ref = Categoria::Find($row->id);
            if(!isset($cate_ref)){
                $categoria = new Categoria;
                $categoria->id = $row->id;
                $categoria->id_superior = $row->superior;
                $categoria->nombre = $row->nombre;
                $categoria->orden = $row->orden;
                $categoria->save();
            }else{

                $cate_ref->id = $row->id;
                $cate_ref->id_superior = $row->superior;
                $cate_ref->nombre = $row->nombre;
                $cate_ref->orden = $row->orden;
                $cate_ref->update();
            }

        });
    
    });

    return "Terminado";
}
}
