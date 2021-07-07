<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;


class MedidaController extends Controller
{

    public function selectmmedidas(Request $request)
    {

        $periodos = DB::select('call select_periodos');

        $medidas = DB::table('pa_medidas_materiales')
        ->select('COD_MEDIDA_MATERIAL', 'NOMBRE_MEDIDA')
        ->paginate(3);
        return view('vistas.mmedida', compact("periodos", "medidas"));
    }
   /*Función para Insertar(POST)*/ 
 public function insertmedida(Request $request)
 {  
     $values =[$request->NOMBRE_MEDIDA];
     DB::select('call insert_medidas(?)', $values); 
     return redirect()->route('medida.index')->with('info',' Se agregó correctamente');
     
 }


 public function deleteMedida($id)
     {
         
         $inventarios= DB::select('call delete_Medidas(?)', [$id]);
         return redirect()->route('medida.index')->with('info','La medida se eliminó correctamente');
        }


        public function updateMedida(Request $request)
        {  
            $values =[$request->COD_MEDIDA_MATERIAL, $request->NOMBRE_MEDIDA];
            DB::select('call update_Medidas(?, ?)', $values); 
            return redirect()->route('medida.index')->with('info','la medida se actualizó correctamente');
            
        }
}
