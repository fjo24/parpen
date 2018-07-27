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

            $categoria = new Categoria;
            $categoria->id = $row->id;
            $categoria->id_superior = $row->superior;
            $categoria->nombre = $row->nombre;
            $categoria->orden = $row->orden;
            $categoria->save();

        });
    
    });

    return "Terminado";
}
}
