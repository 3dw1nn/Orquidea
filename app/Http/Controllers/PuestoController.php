<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class PuestoController extends Controller
{
    public function selectmpuestos(Request $request)
    {
        $catpuestos= DB::TABLE('pa_puestos')
        ->select('COD_PUESTO', 'PUESTO', 'DESCRIPCION')
        ->paginate(3);

        $periodos = DB::select('call select_periodos');

        return view('vistas.mpuestos', compact("catpuestos", "periodos"));
    }

    public function insertpuesto(Request $request)
 {
       
     $puesto =[$request->PUESTO, $request->DESCRIPCION];
     DB::select('call insert_puestos(?, ?)', $puesto); 

     return redirect()->route('puesto.index')->with('info',' Se agregó correctamente');
 
 }

 public function deletepuesto($id)
 {
     
     $inventarios= DB::select('call delete_puestos(?)', [$id]);
     return redirect()->route('puesto.index')->with('info','El puesto se eliminó correctamente');
    }


    public function updatepuesto(Request $request)
 {
   
    
     $puesto =[$request->COD_PUESTO, $request->PUESTO, $request->DESCRIPCION];
     DB::select('call update_puestos(?, ?, ?)', $puesto); 
     return redirect()->route('puesto.index')->with('info','El puesto se actualizó correctamente');
 
 }

 
}
