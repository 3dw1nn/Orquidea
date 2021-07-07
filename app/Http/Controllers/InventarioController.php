<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;





class InventarioController extends Controller
{
    public function selectinventario(Request $request)
    {
        
        $texto=trim($request->get('texto'));

 
        $inventarios = DB::table('pa_productos_inventarios')
        ->select('COD_PRODUCTO_INVENTARIO', 'NOMBRE_PRODUCTO', 'DESCRIPCION', 'PRECIO_PRODUCTO', 'FOTO')
        ->where('NOMBRE_PRODUCTO', 'LIKE', '%'.$texto.'%')
        ->Orwhere('DESCRIPCION', 'LIKE', '%'.$texto.'%')
        ->Orwhere('PRECIO_PRODUCTO', 'LIKE', '%'.$texto.'%')
        ->orderBy('NOMBRE_PRODUCTO', 'asc')
        ->Paginate(3);

        return view('vistas.inventario', compact("inventarios", "texto"));  
    }


     /*Función para Insertar(POST)*/ 
     public function insertinventario(Request $request)
     {
         $path = $request->file('FOTO_PRODUCTO')->store('images', 'public');
       
         $values =[$request->NOMBRE_PRODUCTO, $request->DESCRIPCION_PRODUCTO, $request->PRECIO_PRODUCTO,$path];
         DB::select('call insert_inventario( ?, ?, ?, ?)', $values); 
         
         return redirect()->route('inventario.index')->with('info', ' Se agregó correctamente ');
     
     }

     

     public function deleteinventario($id)
     {
         
         $inventarios= DB::select('call delete_inventario(?)', [$id]);

         return redirect()->route('inventario.index')->with('info', 'El Producto se eliminó correctamente ');
        }


        
        public function updateinventario(Request $request)
     {
     
        $path = $request->file('FOTO_PRODUCTO')->store('images', 'public');

        $values =[$request->COD_PRODUCTO_INVENTARIO, $request->NOMBRE_PRODUCTO, $request->DESCRIPCION_PRODUCTO, $request->PRECIO_PRODUCTO, $path];
        $inventarios = DB::select('call update_inventario(?, ?, ?, ?, ?)', $values);

        return redirect()->route('inventario.index')->with('info', 'El Producto se actualizó correctamente ');      
       }
         
        
       public function getpdf(){
           
        $inventarios = DB::table('pa_productos_inventarios')
        ->select( 'NOMBRE_PRODUCTO', 'DESCRIPCION', 'PRECIO_PRODUCTO')
        ->get();

           $pdf = PDF::loadView('imprimir.inventario', compact('inventarios'));
           return $pdf->download('inventario.pdf');
       }
      
}
