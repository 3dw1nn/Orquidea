<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class AlmacenController extends Controller
{
    public function selectalmacen(Request $request)
    {
       
         //$almacenes = DB::select('call select_almacen');
        

         $texto=trim($request->get('texto'));

 
         $almacenes = DB::table('pa_almacen_materiales')
         ->join('pa_materiales', 'pa_almacen_materiales.COD_MATERIAL', '=', 'pa_materiales.COD_MATERIAL')
         ->join('PA_PROVEEDORES', 'PA_ALMACEN_MATERIALES.COD_PROVEEDOR', '=', 'PA_PROVEEDORES.COD_PROVEEDOR')
         ->join('PA_MEDIDAS_MATERIALES', 'pa_almacen_materiales.COD_MEDIDA_MATERIAL', '=', 'PA_MEDIDAS_MATERIALES.COD_MEDIDA_MATERIAL')
         ->select('PA_PROVEEDORES.NOMBRE_EMPRESA', 'PA_MATERIALES.NOMBRE_MATERIAL', 
         'PA_MEDIDAS_MATERIALES.NOMBRE_MEDIDA', 'PA_ALMACEN_MATERIALES.ENTRADA', 
         'PA_ALMACEN_MATERIALES.PRECIO', 
         'PA_ALMACEN_MATERIALES.SALIDA', 'PA_ALMACEN_MATERIALES.EXISTENCIA')
         ->where('NOMBRE_EMPRESA', 'LIKE', '%'.$texto.'%')
         ->Orwhere('NOMBRE_MATERIAL', 'LIKE', '%'.$texto.'%')
         ->paginate(3);




         $Lmateriales = DB::select('call select_lista_material');
         $Lproveedores = DB::select('call select_lista_proveedor');
         $medidas = DB::select('call select_lista_medida');
         return view('vistas.almacen', compact("almacenes", "Lmateriales", "Lproveedores", "medidas", "texto"));
     
    }


     
     public function insertalmacen(Request $request)
     {
         
         $values =[$request->COD_PROVEEDOR,$request->COD_MATERIAL, $request->COD_MEDIDA_MATERIAL, $request->PRECIO, 
         $request->ENTRADA];
         DB::select('call insert_almacen( ?, ?, ?, ?, ?)', $values); 
         
        return redirect()->route('almacen.index')->with('info', ' Se agregó correctamente');
     
     
     }


     public function deletalmacen($id)
     {
         $materiales= DB::select('call delete_almacen(?)', [$id]);
         return redirect()->route('almacen.index')->with('info', 'El material se eliminó correctamente');

        }


        public function getpdf(){
           
            $almacenes = DB::table('pa_almacen_materiales')
            ->join('pa_materiales', 'pa_almacen_materiales.COD_MATERIAL', '=', 'pa_materiales.COD_MATERIAL')
            ->join('PA_PROVEEDORES', 'PA_ALMACEN_MATERIALES.COD_PROVEEDOR', '=', 'PA_PROVEEDORES.COD_PROVEEDOR')
            ->join('PA_MEDIDAS_MATERIALES', 'pa_almacen_materiales.COD_MEDIDA_MATERIAL', '=', 'PA_MEDIDAS_MATERIALES.COD_MEDIDA_MATERIAL')
            ->select('PA_PROVEEDORES.NOMBRE_EMPRESA', 'PA_MATERIALES.NOMBRE_MATERIAL', 
            'PA_MEDIDAS_MATERIALES.NOMBRE_MEDIDA', 'PA_ALMACEN_MATERIALES.ENTRADA', 
            'PA_ALMACEN_MATERIALES.PRECIO', 
            'PA_ALMACEN_MATERIALES.SALIDA', 'PA_ALMACEN_MATERIALES.EXISTENCIA')
           ->get();

    
               $pdf = PDF::loadView('imprimir.almacen', compact('almacenes'));
               return $pdf->download('almacen.pdf');
           }


}
