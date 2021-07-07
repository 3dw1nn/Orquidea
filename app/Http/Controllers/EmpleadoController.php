<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class EmpleadoController extends Controller
{
    public function selectempleado(Request $request)
    {
        $texto=trim($request->get('texto'));

        //$empleados = DB::select('call select_empleado');

        $empleados = DB::table('pa_personas')
        ->join('pa_empleados', 'pa_personas.COD_PERSONA', '=', 'pa_empleados.COD_PERSONA')
        ->join('pa_puestos', 'pa_empleados.COD_PUESTO', '=', 'pa_puestos.COD_PUESTO')
        ->join('pa_generos', 'pa_personas.COD_GENERO', '=', 'pa_generos.COD_GENERO')
        ->join('pa_estados_civiles', 'pa_empleados.COD_ESTADO_CIVIL', '=', 'pa_estados_civiles.COD_ESTADO_CIVIL')
        ->join('pa_emergencias', 'pa_empleados.COD_EMERGENCIA', '=', 'pa_emergencias.COD_EMERGENCIA')
        ->join('pa_familiares', 'pa_empleados.COD_FAMILIAR', '=', 'pa_familiares.COD_FAMILIAR')
        ->join('pa_tipos_personas', 'pa_personas.COD_TIPO_PERSONA', '=', 'pa_tipos_personas.COD_TIPO_PERSONA')
        ->join('REL_DIRECC_PERSONAS_PROVEEDOR', 'pa_personas.COD_PERSONA', '=', 'REL_DIRECC_PERSONAS_PROVEEDOR.COD_PERSONA')
        ->join('pa_direcciones', 'REL_DIRECC_PERSONAS_PROVEEDOR.COD_DIRECCION', '=', 'pa_direcciones.COD_DIRECCION')
        ->join('REL_TEL_PERSONAS_PROVEEDOR', 'pa_personas.COD_PERSONA', '=', 'REL_TEL_PERSONAS_PROVEEDOR.COD_PERSONA')
        ->join('PA_TELEFONOS', 'REL_TEL_PERSONAS_PROVEEDOR.COD_TELEFONO', '=', 'PA_TELEFONOS.COD_TELEFONO')
        ->join('REL_CORREOS_PERSONAS_PROVEEDORES', 'pa_personas.COD_PERSONA', '=', 'REL_CORREOS_PERSONAS_PROVEEDORES.COD_PERSONA')
        ->join('PA_CORREOS', 'REL_CORREOS_PERSONAS_PROVEEDORES.COD_CORREO', '=', 'PA_CORREOS.COD_CORREO')
        
        ->select('pa_personas.COD_PERSONA', 'pa_personas.NUM_ID', 'pa_personas.PRIMER_NOMBRE', 'pa_personas.SEGUNDO_NOMBRE', 'pa_personas.PRIMER_APELLIDO', 'pa_personas.SEGUNDO_APELLIDO',
        'pa_estados_civiles.NOMBRE_ESTADO', 'PA_PUESTOS.PUESTO', 'PA_FAMILIARES.FAMILIAR', 'PA_EMERGENCIAS.NOMBRE_EMERG', 'PA_EMERGENCIAS.APELLIDO_EMERG',
        'PA_GENEROS.NOMBRE_GENERO', 'PA_TIPOS_PERSONAS.TIPO', 'PA_EMPLEADOS.FECHA_CONTRATO', 'PA_EMPLEADOS.FECHA_SALIDA',
        'PA_DIRECCIONES.CIUDAD', 'PA_DIRECCIONES.DIRECCION', 'PA_CORREOS.CORREO', 'PA_TELEFONOS.NUM_TELEFONO')

        ->where('PRIMER_NOMBRE', 'LIKE', '%'.$texto.'%')
        ->Orwhere('SEGUNDO_NOMBRE', 'LIKE', '%'.$texto.'%')
        ->Orwhere('PRIMER_APELLIDO', 'LIKE', '%'.$texto.'%')
        ->Orwhere('SEGUNDO_APELLIDO', 'LIKE', '%'.$texto.'%')
        ->paginate(3);


        $puestos= DB::select('call select_listado_puesto');
        $familiares=DB::select('call select_lista_Familiar');
        $emergencias=DB::select('call select_emergencia');
        return view('vistas.Empleado', compact("empleados", "puestos", "familiares", "emergencias", "texto"));
       
    }


    public function insertempleado(Request $request)
    {
           $values =[$request->PRIMER_NOMBRE, $request->SEGUNDO_NOMBRE, $request->PRIMER_APELLIDO, $request->SEGUNDO_APELLIDO, $request->COD_GENERO, $request->COD_TIPO_PERSONA, $request->COD_ESTADO_CIVIL, $request->COD_PUESTO,
           $request->COD_FAMILIAR, $request->NUM_ID, $request->FECHA_CONTRATO, $request->FECHA_SALIDA,  $request->CIUDAD, $request->DIRECCION, $request->CORREO,$request->NUM_PERSONAL,$request->NOMBRE_EMERG, $request->APELLIDO_EMERG, $request->NUM_EMERGENCIA ];
           DB::select('call insert_empleado( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $values);
           
           return redirect()->route('empleado.index')->with('info',' Se agregó correctamente');    
    }


       public function deleteempleado($id)
       {
           $empleados=DB::select('call delete_empleado(?)', [$id]);
           return redirect()->route('empleado.index')->with('info','El empleado se eliminó correctamente');
          }



          public function updateempleado(Request $request)
          {
          
            $values =[$request->COD_PERSONA, $request->PRIMER_NOMBRE, $request->SEGUNDO_NOMBRE, $request->PRIMER_APELLIDO, $request->SEGUNDO_APELLIDO, $request->COD_GENERO, $request->COD_TIPO_PERSONA, $request->COD_ESTADO_CIVIL, $request->COD_PUESTO,
            $request->COD_FAMILIAR, $request->NUM_ID, $request->FECHA_CONTRATO, $request->FECHA_SALIDA,  $request->CIUDAD, $request->DIRECCION, $request->CORREO,$request->NUM_PERSONAL,$request->NOMBRE_EMERG, $request->APELLIDO_EMERG, $request->NUM_EMERGENCIA ];
            DB::select('call update_empleado( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $values);
            
            return redirect()->route('empleado.index')->with('info','El empleado se actualizó correctamente');
 
            }


            public function getpdf(){
           
                $empleados = DB::table('pa_personas')
                ->join('pa_empleados', 'pa_personas.COD_PERSONA', '=', 'pa_empleados.COD_PERSONA')
                ->join('pa_puestos', 'pa_empleados.COD_PUESTO', '=', 'pa_puestos.COD_PUESTO')
                ->join('pa_generos', 'pa_personas.COD_GENERO', '=', 'pa_generos.COD_GENERO')
                ->join('pa_estados_civiles', 'pa_empleados.COD_ESTADO_CIVIL', '=', 'pa_estados_civiles.COD_ESTADO_CIVIL')
                ->join('pa_emergencias', 'pa_empleados.COD_EMERGENCIA', '=', 'pa_emergencias.COD_EMERGENCIA')
                ->join('pa_familiares', 'pa_empleados.COD_FAMILIAR', '=', 'pa_familiares.COD_FAMILIAR')
                ->join('pa_tipos_personas', 'pa_personas.COD_TIPO_PERSONA', '=', 'pa_tipos_personas.COD_TIPO_PERSONA')
                ->join('REL_DIRECC_PERSONAS_PROVEEDOR', 'pa_personas.COD_PERSONA', '=', 'REL_DIRECC_PERSONAS_PROVEEDOR.COD_PERSONA')
                ->join('pa_direcciones', 'REL_DIRECC_PERSONAS_PROVEEDOR.COD_DIRECCION', '=', 'pa_direcciones.COD_DIRECCION')
                ->join('REL_TEL_PERSONAS_PROVEEDOR', 'pa_personas.COD_PERSONA', '=', 'REL_TEL_PERSONAS_PROVEEDOR.COD_PERSONA')
                ->join('PA_TELEFONOS', 'REL_TEL_PERSONAS_PROVEEDOR.COD_TELEFONO', '=', 'PA_TELEFONOS.COD_TELEFONO')
                ->join('REL_CORREOS_PERSONAS_PROVEEDORES', 'pa_personas.COD_PERSONA', '=', 'REL_CORREOS_PERSONAS_PROVEEDORES.COD_PERSONA')
                ->join('PA_CORREOS', 'REL_CORREOS_PERSONAS_PROVEEDORES.COD_CORREO', '=', 'PA_CORREOS.COD_CORREO')
                ->select('pa_personas.COD_PERSONA', 'pa_personas.NUM_ID', 'pa_personas.PRIMER_NOMBRE', 'pa_personas.SEGUNDO_NOMBRE', 'pa_personas.PRIMER_APELLIDO', 'pa_personas.SEGUNDO_APELLIDO',
                'pa_estados_civiles.NOMBRE_ESTADO', 'PA_PUESTOS.PUESTO', 'PA_FAMILIARES.FAMILIAR', 'PA_EMERGENCIAS.NOMBRE_EMERG', 'PA_EMERGENCIAS.APELLIDO_EMERG',
                'PA_GENEROS.NOMBRE_GENERO', 'PA_TIPOS_PERSONAS.TIPO', 'PA_EMPLEADOS.FECHA_CONTRATO', 'PA_EMPLEADOS.FECHA_SALIDA',
                'PA_DIRECCIONES.CIUDAD', 'PA_DIRECCIONES.DIRECCION', 'PA_CORREOS.CORREO', 'PA_TELEFONOS.NUM_TELEFONO')
                ->get();
                

        
                   $pdf = PDF::loadView('imprimir.empleado', compact('empleados'));
                   return $pdf->download('empleado.pdf');
               }

}
