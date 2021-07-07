<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ClienteController extends Controller
{
    public function selectcliente(Request $request)
    {

    $clientes = DB::select('call select_cliente');



        return view('vistas.cliente', compact("clientes"));
       
    }


           public function insertcliente(Request $request)
       {
       
           $values =[ $request->PRIMER_NOMBRE, $request->SEGUNDO_NOMBRE, $request->PRIMER_APELLIDO, $request->SEGUNDO_APELLIDO,$request->NUM_ID, $request->RTN, $request->COD_GENERO, $request->COD_TIPO_PERSONA, $request->CIUDAD,
           $request->DIRECCION, $request->CORREO, $request->NUM_CLIENTE];
           DB::select('call insert_cliente(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $values);
           return redirect()->route('cliente.index')->with('info',' Se agregó correctamente');
       }



       public function deletecliente($id)
    {
        $clientes= DB::select('call delete_cliente(?)', [$id]);

        return redirect()->route('cliente.index')->with('info','El cliente se eliminó correctamente');
       
    }



       public function updatecliente(Request $request)
       {
       
        $values =[$request->COD_PERSONA, $request->PRIMER_NOMBRE, $request->SEGUNDO_NOMBRE, $request->PRIMER_APELLIDO, $request->SEGUNDO_APELLIDO,$request->NUM_ID, $request->RTN, $request->COD_GENERO, $request->COD_TIPO_PERSONA, $request->CIUDAD,
        $request->DIRECCION, $request->CORREO, $request->NUM_CLIENTE];
        
        DB::select('call update_cliente(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $values);
           

        return redirect()->route('cliente.index')->with('info','El cliente se actualizó correctamente');
       }
       


       public function getpdf(){

        $clientes = DB::table('PA_PERSONAS')
        ->join('PA_CLIENTES', 'PA_PERSONAS.COD_PERSONA', '=', 'PA_CLIENTES.COD_PERSONA')
        ->join('pa_generos', 'pa_personas.COD_GENERO', '=', 'pa_generos.COD_GENERO')
        ->join('pa_tipos_personas', 'pa_personas.COD_TIPO_PERSONA', '=', 'pa_tipos_personas.COD_TIPO_PERSONA')
        ->join('REL_DIRECC_PERSONAS_PROVEEDOR', 'pa_personas.COD_PERSONA', '=', 'REL_DIRECC_PERSONAS_PROVEEDOR.COD_PERSONA')
        ->join('pa_direcciones', 'REL_DIRECC_PERSONAS_PROVEEDOR.COD_DIRECCION', '=', 'pa_direcciones.COD_DIRECCION')
        ->join('REL_TEL_PERSONAS_PROVEEDOR', 'PA_PERSONAS.COD_PERSONA', '=', 'REL_TEL_PERSONAS_PROVEEDOR.COD_PERSONA')
        ->join('PA_TELEFONOS', 'REL_TEL_PERSONAS_PROVEEDOR.COD_TELEFONO', '=', 'PA_TELEFONOS.COD_TELEFONO')
        ->join('REL_CORREOS_PERSONAS_PROVEEDORES', 'pa_personas.COD_PERSONA', '=', 'REL_CORREOS_PERSONAS_PROVEEDORES.COD_PERSONA')
        ->join('PA_CORREOS', 'REL_CORREOS_PERSONAS_PROVEEDORES.COD_CORREO', '=', 'PA_CORREOS.COD_CORREO')
        ->select('pa_personas.COD_PERSONA', 'pa_personas.NUM_ID', 'pa_personas.PRIMER_NOMBRE', 'pa_personas.SEGUNDO_NOMBRE', 'pa_personas.PRIMER_APELLIDO', 'pa_personas.SEGUNDO_APELLIDO',
        'pa_clientes.RTN', 'pa_clientes.COD_CLIENTE', 
        'PA_GENEROS.GENERO', 'PA_GENEROS.NOMBRE_GENERO', 'PA_TIPOS_PERSONAS.NOMBRE_TIPO', 
        'PA_DIRECCIONES.CIUDAD', 'PA_DIRECCIONES.DIRECCION', 'PA_CORREOS.CORREO', 'PA_TELEFONOS.NUM_TELEFONO')
        ->get();

 

           $pdf = PDF::loadView('imprimir.cliente', compact('clientes'));
           return $pdf->download('cliente.pdf');
       }

       
}
