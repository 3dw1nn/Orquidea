<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class GastoController extends Controller
{
    public function selectgasto(Request $request)
    {

        $texto=trim($request->get('texto'));
        //$gastos = DB::select('call select_gasto');

        $gastos = DB::table('pa_control_gastos')
        ->join('pa_empleados', 'PA_CONTROL_GASTOS.COD_EMPLEADO', '=', 'pa_empleados.COD_EMPLEADO')
        ->join('PA_TIPOS_GASTOS', 'PA_TIPOS_GASTOS.COD_TIPO_GASTO' , '=', 'PA_CONTROL_GASTOS.COD_TIPO_GASTO')
        ->join('PA_PERSONAS', 'PA_PERSONAS.COD_PERSONA', '=', 'pa_empleados.COD_PERSONA' )
        
        ->select('PA_CONTROL_GASTOS.COD_CONTROL_GASTO', 'PA_CONTROL_GASTOS.FECHA', 'PA_CONTROL_GASTOS.CANTIDAD', 'PA_CONTROL_GASTOS.DESCRIPCION',
        'PA_PERSONAS.PRIMER_NOMBRE', 'PA_PERSONAS.PRIMER_APELLIDO', 'PA_TIPOS_GASTOS.NOMBRE_GASTO')
        ->where('PRIMER_NOMBRE', 'LIKE', '%'.$texto.'%')
        ->Orwhere('PRIMER_APELLIDO', 'LIKE', '%'.$texto.'%')
        ->Orwhere('FECHA', 'LIKE', '%'.$texto.'%')
        ->Orwhere('NOMBRE_GASTO', 'LIKE', '%'.$texto.'%')
        ->paginate(3);

        $emples= DB::select('call select_listado');
        $consumos= DB::select('call select_listado_gasto');

        return view('vistas.gastos', compact("gastos", "emples", "consumos", "texto"));
            
    }


     /*Función para Insertar(POST)*/ 
     public function insertgasto(Request $request)
     {
         $values =[$request->COD_EMPLEADO, $request->FECHA_PAGO, $request->COD_TIPO_GASTO,$request->CANTIDAD_GASTADA,$request->DESCRIPCION];
         DB::select('call insert_gasto( ?, ?, ?, ?, ?)', $values); 
         return redirect()->route('gasto.index')->with('info',' Se agregó correctamente'); 
     
     }

     /*Función para actualizar(Update)*/ 
     public function updategasto(Request $request)
     {
         $values =[$request->COD_CONTROL_GASTO, $request->COD_EMPLEADO, $request->FECHA_PAGO, $request->COD_TIPO_GASTO,$request->CANTIDAD_GASTADA,$request->DESCRIPCION];
         DB::select('call update_gasto(?, ?, ?, ?, ?, ?)', $values); 
         
         return redirect()->route('gasto.index')->with('info','El gasto se actualizó correctamente');
     
     }

     public function getpdf(){
           
        $gastos = DB::table('pa_control_gastos')
        ->join('pa_empleados', 'PA_CONTROL_GASTOS.COD_EMPLEADO', '=', 'pa_empleados.COD_EMPLEADO')
        ->join('PA_TIPOS_GASTOS', 'PA_TIPOS_GASTOS.COD_TIPO_GASTO' , '=', 'PA_CONTROL_GASTOS.COD_TIPO_GASTO')
        ->join('PA_PERSONAS', 'PA_PERSONAS.COD_PERSONA', '=', 'pa_empleados.COD_PERSONA' )
        
        ->select('PA_CONTROL_GASTOS.COD_CONTROL_GASTO', 'PA_CONTROL_GASTOS.FECHA', 'PA_CONTROL_GASTOS.CANTIDAD', 'PA_CONTROL_GASTOS.DESCRIPCION',
        'PA_PERSONAS.PRIMER_NOMBRE', 'PA_PERSONAS.PRIMER_APELLIDO', 'PA_TIPOS_GASTOS.NOMBRE_GASTO')
        ->get();


           $pdf = PDF::loadView('imprimir.gastos', compact('gastos'));
           return $pdf->download('gastos.pdf');
       }


}
