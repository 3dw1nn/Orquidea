<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class PlanillaController extends Controller
{
    public function selectplanilla(Request $request)
    {
        //$planillas= DB::select('call select_planilla');

        
        $texto=trim($request->get('texto'));

        $planillas = DB::table('PA_PLANILLAS')
        ->join('PA_EMPLEADOS', 'PA_PLANILLAS.COD_EMPLEADO', '=', 'PA_EMPLEADOS.COD_EMPLEADO')
        ->join('PA_PUESTOS', 'PA_EMPLEADOS.COD_PUESTO', '=', 'PA_PUESTOS.COD_PUESTO')
        ->join('PA_PERSONAS', 'PA_EMPLEADOS.COD_PERSONA', '=', 'PA_PERSONAS.COD_PERSONA')
        ->join('PA_PERIODOS', 'PA_PLANILLAS.COD_PERIODO', '=', 'PA_PERIODOS.COD_PERIODO')
        ->select('PA_PERSONAS.PRIMER_NOMBRE', 'PA_PERSONAS.SEGUNDO_NOMBRE', 'PA_PERSONAS.PRIMER_APELLIDO', 'PA_PERSONAS.SEGUNDO_APELLIDO', 
        'PA_PUESTOS.PUESTO', 'PA_PERIODOS.NOMBRE_PERIODO',
        'PA_PLANILLAS.FECHA_PAGO', 'PA_PLANILLAS.COD_PLANILLA',  'PA_PLANILLAS.TOTAL_PAGOS_OBRAS', 'PA_PLANILLAS.BONO',
        'PA_PLANILLAS.TOTAL_DEDUCCIONES', 'PA_PLANILLAS.DESCRIPCION_DEDUC', 'PA_PLANILLAS.TOTAL_PAGAR', 'PA_PLANILLAS.FECHA_REG', )
        ->where('PRIMER_NOMBRE', 'LIKE', '%'.$texto.'%')
        ->Orwhere('SEGUNDO_NOMBRE', 'LIKE', '%'.$texto.'%')
        ->Orwhere('PRIMER_APELLIDO', 'LIKE', '%'.$texto.'%')
        ->Orwhere('SEGUNDO_APELLIDO', 'LIKE', '%'.$texto.'%')
        ->Orwhere('FECHA_PAGO', 'LIKE', '%'.$texto.'%')
        ->paginate(3);

        $emples= DB::select('call select_listado');
        return view('vistas.planilla', compact("planillas", "emples", "texto"));
               
    }


    public function insertplanilla(Request $request) 
    {
        $values =[$request->COD_EMPLEADO, $request->FECHA_PAGO, $request->COD_PERIODO,$request->TOTAL_PAGOS_OBRAS,$request->BONO,$request->TOTAL_DEDUCCIONES, 
        $request->TOTAL_PAGAR, $request->DESCRIPCION_DEDUC];
        DB::select('call insert_planilla( ?, ?, ?, ?, ?, ?, ?, ?)', $values);
        
        return redirect()->route('planilla.index')->with('info',' Se agregó correctamente');             
    }

    public function updateplanilla(Request $request)
    {
        $values =[$request->COD_PLANILLA, $request->COD_EMPLEADO, $request->FECHA_PAGO, $request->COD_PERIODO,$request->TOTAL_PAGOS_OBRAS,$request->BONO,$request->TOTAL_DEDUCCIONES, 
        $request->TOTAL_PAGAR, $request->DESCRIPCION_DEDUC];
        DB::select('call update_planilla(?, ?, ?, ?, ?, ?, ?, ?, ?)', $values);
        return redirect()->route('planilla.index')->with('info',' Se actualizó correctamente');    
       
        
    
    }

    public function getpdf(){
           
        $planillas = DB::table('PA_PLANILLAS')
        ->join('PA_EMPLEADOS', 'PA_PLANILLAS.COD_EMPLEADO', '=', 'PA_EMPLEADOS.COD_EMPLEADO')
        ->join('PA_PUESTOS', 'PA_EMPLEADOS.COD_PUESTO', '=', 'PA_PUESTOS.COD_PUESTO')
        ->join('PA_PERSONAS', 'PA_EMPLEADOS.COD_PERSONA', '=', 'PA_PERSONAS.COD_PERSONA')
        ->join('PA_PERIODOS', 'PA_PLANILLAS.COD_PERIODO', '=', 'PA_PERIODOS.COD_PERIODO')
        ->select('PA_PERSONAS.PRIMER_NOMBRE', 'PA_PERSONAS.SEGUNDO_NOMBRE', 'PA_PERSONAS.PRIMER_APELLIDO', 'PA_PERSONAS.SEGUNDO_APELLIDO', 
        'PA_PUESTOS.PUESTO', 'PA_PERIODOS.NOMBRE_PERIODO',
        'PA_PLANILLAS.FECHA_PAGO', 'PA_PLANILLAS.COD_PLANILLA',  'PA_PLANILLAS.TOTAL_PAGOS_OBRAS', 'PA_PLANILLAS.BONO',
        'PA_PLANILLAS.TOTAL_DEDUCCIONES', 'PA_PLANILLAS.DESCRIPCION_DEDUC', 'PA_PLANILLAS.TOTAL_PAGAR', 'PA_PLANILLAS.FECHA_REG', )
        ->get();



           $pdf = PDF::loadView('imprimir.planilla', compact('planillas'));
           return $pdf->download('planilla.pdf');
       }

}
