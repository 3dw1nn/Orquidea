<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class CGastoController extends Controller
{
    public function selectmgastos(Request $request)
    {

        $gastos = DB::table('pa_tipos_gastos')
        ->select('COD_TIPO_GASTO', 'NOMBRE_GASTO')
        ->paginate(3);

        $periodos = DB::select('call select_periodos');
        return view('vistas.mgastos', compact("gastos", "periodos"));
    } 

    public function insertcgasto(Request $request)
 {
   
     $values =[$request->NOMBRE_GASTO];
     DB::select('call insert_tipos_Gastos(?)', $values); 

     return redirect()->route('mgasto.index')->with('info',' Se agregó correctamente');
 
 }


 public function deletecgasto($id)
 {
     
     $gasto= DB::select('call delete_tipos_gastos(?)', [$id]);
     return redirect()->route('mgasto.index')->with('info','El gasto se eliminó correctamente');
    }


    public function updatecgasto(Request $request)
    {
      
       
        $values =[$request->COD_TIPO_GASTO, $request->NOMBRE_GASTO];
        DB::select('call update_tipos_Gastos(?, ?)', $values); 
   
        return redirect()->route('mgasto.index')->with('info','El gasto se actualizó correctamente');
    
    }

}
