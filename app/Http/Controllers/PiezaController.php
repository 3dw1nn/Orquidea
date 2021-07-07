<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class PiezaController extends Controller
{
    
    public function selectpieza(Request $request)
    {
        $texto=trim($request->get('texto'));

        //$piezas = DB::select('call select_pieza');
        $piezas = DB::table('pa_piezas_productos')
        ->select('COD_PIEZA_PRODUCTO', 'COD_PRODUCTO_INVENTARIO', 'NOMBRE_PIEZA', 'DESCRIPCION', 'FOTO')
        ->where('NOMBRE_PIEZA', 'LIKE', '%'.$texto.'%')
        ->Orwhere('DESCRIPCION', 'LIKE', '%'.$texto.'%')
        ->orderBy('NOMBRE_PIEZA', 'asc')
        ->Paginate(3);

        $productos = DB::select('call select_listado_producto');
        return view('vistas.pieza', compact("piezas", "productos", "texto"));
        
    }


     /*Función para Insertar(POST)*/ 
     public function insertpieza(Request $request)
     {
         $path = $request->file('FOTO_PIEZA')->store('images', 'public');
         $values =[$request->COD_PRODUCTO_INVENTARIO, $request->NOMBRE_PIEZA, $request->DESCRIPCION_PIEZA,$path];
         DB::select('call insert_pieza( ?, ?, ?, ?)', $values); 
         
         
         return redirect()->route('piezas.index')->with('info', ' Se agregó correctamente');
     
     }

     public function deletepieza($id)
     {
         $inventarios= DB::select('call delete_pieza(?)', [$id]);

         return redirect()->route('piezas.index')->with('info', 'La Pieza se eliminó correctamente ');
        }



        public function updatepieza(Request $request)
        {

            $path = $request->file('FOTO_PIEZA')->store('images', 'public');
            $values =[$request->COD_PIEZA_PRODUCTO, $request->NOMBRE_PIEZA, $request->DESCRIPCION_PIEZA,$path];
            $inventarios = DB::select('call update_pieza(?, ?, ?, ?)', $values);
   
            return redirect()->route('piezas.index')->with('info', 'La Pieza se actualizó correctamente ');

        }


        public function getpdf(){
            $piezas = DB::table('pa_piezas_productos')
            ->select('COD_PIEZA_PRODUCTO', 'COD_PRODUCTO_INVENTARIO', 'NOMBRE_PIEZA', 'DESCRIPCION')
            ->get();


    
               $pdf = PDF::loadView('imprimir.pieza', compact('piezas'));
               return $pdf->download('pieza.pdf');
           }
}
