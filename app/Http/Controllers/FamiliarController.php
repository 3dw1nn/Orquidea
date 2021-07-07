<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class FamiliarController extends Controller
{
    public function selectcatalogo(Request $request)
    {

        $familiares = DB::table('pa_familiares')
        ->select('COD_FAMILIAR', 'FAMILIAR')
        ->paginate(3);

        $periodos = DB::select('call select_periodos');

        return view('vistas.catalogo', compact("familiares", "periodos"));
    }


 /*Función para Insertar(POST)*/ 
 public function insertfamiliar(Request $request)
 {  
     $values =[$request->FAMILIAR];
     DB::select('call insert_Familiar(?)', $values); 
     return redirect()->route('catalogo.index')->with('info',' Se agregó correctamente');
     
 }


 public function deletefamiliar($id)
     {
         
         $inventarios= DB::select('call delete_familiar(?)', [$id]);
         return redirect()->route('catalogo.index')->with('info','El familiar se eliminó correctamente');
        }


        public function updatefamiliar(Request $request)
        {  
            $values =[$request->COD_FAMILIAR, $request->FAMILIAR];
            DB::select('call update_Familiar(?, ?)', $values); 
            return redirect()->route('catalogo.index')->with('info','El familiar se actualizó correctamente');
            
        }
        
}
