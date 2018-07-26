<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\producto;
use App\familia;
use App\tabla;

class CargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adm.categorias.carga');
    }

    public function create()
    {
    
    }

    public function store(Request $request)
    {
        set_time_limit(120);
        $archivo = $request->file('archivo');
        $handle = fopen($archivo,"r");
        $csv_data = fgets($handle);
        $csv_array = explode(";", $csv_data);


        feof($handle);
        do
        {
            $tabla= new tabla();

            $csv_data = fgets($handle);
        if ($csv_data!='') {
         
            $data = explode(";", $csv_data);

            foreach ($data as $j => $fila)
            {
                if($j==0)
                {
                    $tabla->a= $fila;
                }

                if($j==1)
                {
                    $tabla->b= $fila;
                }

                if($j==2)
                {
                    $tabla->c= $fila;
                }

                if($j==3)
                {
                    $tabla->d= $fila;
                }
                if($j==4)
                {
                    $tabla->e= $fila;
                 }

                if($j==5)
                {
                    $tabla->f= $fila;
                }

                if($j==6)
                {
                    $tabla->g= $fila;
                }

                if($j==7)
                {
                    $tabla->h= $fila;
                }

                if($j==8)
                {
                   	$precio = str_replace(',', '.', $fila);
                    $tabla->i= $precio;
                }

                if($j==9)
                {
                    $tabla->j= $fila;
                }

                if($j==12)
                {
                    $tabla->id_producto= $fila;
                }

            }
            $tabla->save();
          }  
            // 
        }while(!feof($handle));
        echo "fin";

        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->route('carga.index');
  
    }
   
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tabla = tabla::find($id);
        return view('adm.php.editarCabecera', compact('tabla'));
    }

    public function update(Request $request, $id)
    {
        $tabla=tabla::find($request->id);
        $tabla->a=$request->a;
        $tabla->b=$request->b;
        $tabla->c=$request->c;
        $tabla->d=$request->d;
        $tabla->e=$request->e;
        $tabla->f=$request->f;
        $tabla->g=$request->g;
        $tabla->h=$request->h;
        $tabla->i=$request->i;
        $tabla->j=$request->j;
        
        
        $tabla->save();
        
        flash('Se ha actualizado de forma exitosa')->success()->important();
        return redirect()->back();
    }

    public function destroy($id)
    {
        
    }
}
