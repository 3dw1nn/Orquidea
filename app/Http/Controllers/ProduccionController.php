<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ProduccionController extends Controller
{
    public function selectproduccion(Request $request)
    {

 
 //$producciones= DB::select('call select_produccion');
           
 $texto=trim($request->get('texto'));

 
        $producciones = DB::table('pa_almacen_materiales')
        ->join('pa_materiales', 'pa_almacen_materiales.COD_MATERIAL', '=', 'pa_materiales.COD_MATERIAL')
        ->join('PA_MEDIDAS_MATERIALES', 'pa_almacen_materiales.COD_MEDIDA_MATERIAL', '=', 'PA_MEDIDAS_MATERIALES.COD_MEDIDA_MATERIAL')
        ->join('PA_ORDENES_PRODUCCION', 'pa_almacen_materiales.COD_MATERIAL', '=', 'PA_ORDENES_PRODUCCION.COD_MATERIAL')
        ->join('PA_PRODUCTOS_INVENTARIOS', 'PA_ORDENES_PRODUCCION.COD_PRODUCTO_INVENTARIO', '=', 'PA_PRODUCTOS_INVENTARIOS.COD_PRODUCTO_INVENTARIO')
        ->select('PA_ORDENES_PRODUCCION.ORDEN_PRODUCCION', 'PA_ORDENES_PRODUCCION.FECHA_ORDEN', 
        'PA_ORDENES_PRODUCCION.CANTIDAD_MATERIAL', 'PA_ORDENES_PRODUCCION.CANTIDAD_PIEZA', 
        'PA_ORDENES_PRODUCCION.DESCRIPCION_PIEZAS', 'PA_PRODUCTOS_INVENTARIOS.NOMBRE_PRODUCTO', 
        'PA_MEDIDAS_MATERIALES.NOMBRE_MEDIDA', 'PA_MATERIALES.NOMBRE_MATERIAL')
        ->where('NOMBRE_PRODUCTO', 'LIKE', '%'.$texto.'%')
        ->Orwhere('NOMBRE_MATERIAL', 'LIKE', '%'.$texto.'%')
        ->paginate(3);


         $LproductoIes =  DB::select('call select_listado_producto');
         $Lmateriales = DB::select('call select_lista_material');
         $medidas = DB::select('call select_lista_medida');
         return view('vistas.produccion', compact("producciones", "LproductoIes", "Lmateriales", "medidas", "texto" ));
     
    }


     public function insertproduccion(Request $request)
     {
         $values =[$request->FECHA_ORDEN,$request->COD_PRODUCTO_INVENTARIO, $request->CANTIDAD_MATERIAL, $request->COD_MEDIDA_MATERIAL_ORDEN, 
         $request->COD_MATERIAL_ORDEN, $request->CANTIDAD_PIEZA, $request->DESCRIPCION];
         DB::select('call insert_orden_produccion( ?, ?, ?, ?, ?, ?, ?)', $values); 

         return redirect()->route('produccion.index')->with('info','El producto se agregó correctamente');

     }


     public function updateproduccion(Request $request)
     {
         $values =[$request->ORDEN_PRODUCCION, $request->FECHA_ORDEN,$request->COD_PRODUCTO_INVENTARIO, $request->CANTIDAD_MATERIAL, $request->COD_MEDIDA_MATERIAL_ORDEN, 
         $request->COD_MATERIAL_ORDEN, $request->CANTIDAD_PIEZA, $request->DESCRIPCION];
         DB::select('call update_produccion(?, ?, ?, ?, ?, ?, ?, ?)', $values); 


         return redirect()->route('produccion.index')->with('info','El producto se actualizó correctamente');        

     }

     public function getpdf(){
           
        $producciones = DB::table('pa_almacen_materiales')
        ->join('pa_materiales', 'pa_almacen_materiales.COD_MATERIAL', '=', 'pa_materiales.COD_MATERIAL')
        ->join('PA_MEDIDAS_MATERIALES', 'pa_almacen_materiales.COD_MEDIDA_MATERIAL', '=', 'PA_MEDIDAS_MATERIALES.COD_MEDIDA_MATERIAL')
        ->join('PA_ORDENES_PRODUCCION', 'pa_almacen_materiales.COD_MATERIAL', '=', 'PA_ORDENES_PRODUCCION.COD_MATERIAL')
        ->join('PA_PRODUCTOS_INVENTARIOS', 'PA_ORDENES_PRODUCCION.COD_PRODUCTO_INVENTARIO', '=', 'PA_PRODUCTOS_INVENTARIOS.COD_PRODUCTO_INVENTARIO')
        ->select('PA_ORDENES_PRODUCCION.ORDEN_PRODUCCION', 'PA_ORDENES_PRODUCCION.FECHA_ORDEN', 
        'PA_ORDENES_PRODUCCION.CANTIDAD_MATERIAL', 'PA_ORDENES_PRODUCCION.CANTIDAD_PIEZA', 
        'PA_ORDENES_PRODUCCION.DESCRIPCION_PIEZAS', 'PA_PRODUCTOS_INVENTARIOS.NOMBRE_PRODUCTO', 
        'PA_MEDIDAS_MATERIALES.NOMBRE_MEDIDA', 'PA_MATERIALES.NOMBRE_MATERIAL')
        ->get();



           $pdf = PDF::loadView('imprimir.produccion', compact('producciones'));
           return $pdf->download('produccion.pdf');
       }
     
}
