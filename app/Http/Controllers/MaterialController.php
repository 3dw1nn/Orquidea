<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class MaterialController extends Controller
{
    public function selectmaterial(Request $request)
    {
        $texto=trim($request->get('texto'));

        //$materiales = DB::select('call select_material');
        $materiales = DB::table('pa_materiales')
        ->select('COD_MATERIAL', 'NOMBRE_MATERIAL', 'DESCRIPCION','FOTO')
        ->where('NOMBRE_MATERIAL', 'LIKE', '%'.$texto.'%')
        ->Orwhere('DESCRIPCION', 'LIKE', '%'.$texto.'%')
        ->orderBy('NOMBRE_MATERIAL', 'asc')
        ->Paginate(3);

        return view('vistas.material', compact("materiales", "texto"));


    }


     public function insertmaterial(Request $request)
     {
        $path = $request->file('FOTO_MATERIAL')->store('images', 'public');

         $values =[$request->NOMBRE_MATERIAL,$path, $request->DESCRIPCION_MATERIAL];
         DB::select('call insert_material( ?, ?, ?)', $values); 
         
         return redirect()->route('material.index')->with('info', ' Se agregó correctamente');
     }


     public function deletematerial($id)
     {
         $materiales= DB::select('call delete_material(?)', [$id]);

         return redirect()->route('material.index')->with('info', 'El material se eliminó correctamente');
        }


        public function updatematerial(Request $request)
        {
            $values =[$request->COD_MATERIAL, $request->NOMBRE_MATERIAL, $request->DESCRIPCION_MATERIAL, $request->FOTO_MATERIAL];
            DB::select('call update_material(?, ?, ?, ?)', $values); 
            
            return redirect()->route('material.index')->with('info', 'El material se actualizó correctamente');
        
        }


        public function getpdf(){
            $materiales = DB::table('pa_materiales')
        ->select('COD_MATERIAL', 'NOMBRE_MATERIAL', 'DESCRIPCION','FOTO')
        ->get();

    
               $pdf = PDF::loadView('imprimir.material', compact('materiales'));
               return $pdf->download('material.pdf');
           }
        
}
