<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class BitacoraController extends Controller
{
    
    public function selectbitacora(Request $request)
    {
        
        $texto=trim($request->get('texto'));


 
        $bitacoras = DB::table('bitacora')
        ->select('COD_TABLA', 'TABLA', 'FECHA', 'USUARIO', 'ACCION', 'REGISTRO_ACTUAL', 'REGISTRO_ANTERIOR')
        ->where('TABLA', 'LIKE', '%'.$texto.'%')
        ->Orwhere('FECHA', 'LIKE', '%'.$texto.'%')
        ->Orwhere('USUARIO', 'LIKE', '%'.$texto.'%')
        ->Orwhere('ACCION', 'LIKE', '%'.$texto.'%')
        ->orderBy('TABLA', 'asc')
        ->Paginate(10);

        return view('vistas.bitacora', compact("bitacoras", "texto"));  
    }


    public function getpdf(){
           
        $bitacoras = DB::table('bitacora')
        ->select('COD_TABLA', 'TABLA', 'FECHA', 'USUARIO', 'ACCION', 'REGISTRO_ACTUAL', 'REGISTRO_ANTERIOR')
        ->get();


           $pdf = PDF::loadView('imprimir.bitacora', compact('bitacoras'));
           return $pdf->download('bitacora.pdf');
       }
}
