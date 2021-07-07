<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ProveedorController extends Controller
{
    public function selectproveedor(Request $request)
    {
        //$proveedores = DB::select('call select_proveedor');
        
        $texto=trim($request->get('texto'));

        $proveedores = DB::table('PA_PROVEEDORES')
        ->join('REL_DIRECC_PERSONAS_PROVEEDOR', 'PA_PROVEEDORES.COD_PROVEEDOR', '=', 'REL_DIRECC_PERSONAS_PROVEEDOR.COD_PROVEEDOR')
        ->join('pa_direcciones', 'REL_DIRECC_PERSONAS_PROVEEDOR.COD_DIRECCION', '=', 'pa_direcciones.COD_DIRECCION')
        /*ojo en los otros modulos*/->join('REL_TEL_PERSONAS_PROVEEDOR', 'PA_PROVEEDORES.COD_PROVEEDOR', '=', 'REL_TEL_PERSONAS_PROVEEDOR.COD_PROVEEDOR')
        ->join('PA_TELEFONOS', 'REL_TEL_PERSONAS_PROVEEDOR.COD_TELEFONO', '=', 'PA_TELEFONOS.COD_TELEFONO')
        ->join('REL_CORREOS_PERSONAS_PROVEEDORES', 'PA_PROVEEDORES.COD_PROVEEDOR', '=', 'REL_CORREOS_PERSONAS_PROVEEDORES.COD_PROVEEDOR')
        ->join('PA_CORREOS', 'REL_CORREOS_PERSONAS_PROVEEDORES.COD_CORREO', '=', 'PA_CORREOS.COD_CORREO')
        ->select('PA_PROVEEDORES.COD_PROVEEDOR', 'PA_PROVEEDORES.NOMBRE_EMPRESA', 'pa_direcciones.CIUDAD', 'pa_direcciones.DIRECCION', 'PA_CORREOS.CORREO', 'PA_TELEFONOS.TIPO_TELEFONO',
        'PA_TELEFONOS.NUM_TELEFONO')

        ->where('NOMBRE_EMPRESA', 'LIKE', '%'.$texto.'%')
        ->Orwhere('CORREO', 'LIKE', '%'.$texto.'%')
        ->paginate(3);


        return view('vistas.proveedor', compact("proveedores", "texto"));
       
    }


    public function insertproveedor(Request $request)
    {
        $values =[$request->NOMBRE_EMPRESA, $request->CIUDAD, $request->DIRECCION,$request->CORREO,$request->NUM_TRABAJO];
        DB::select('call insert_proveedor( ?, ?, ?, ?, ?)', $values);
        
        
        return redirect()->route('proveedor.index')->with('info',' Se agregó correctamente');
    }

 
       public function deleteproveedor($id)
       {
        
        $proveedores=DB::select('call delete_proveedor(?)', [$id]);

        return redirect()->route('proveedor.index')->with('info','El proveedor se eliminó correctamente');
    
    }


          public function updateproveedor(Request $request)
          {
              $values =[$request->COD_PROVEEDOR, $request->NOMBRE_EMPRESA, $request->CIUDAD, $request->DIRECCION,$request->CORREO,$request->NUM_EMPRESA];
              DB::select('call update_proveedor(?, ?, ?, ?, ?, ?)', $values);

              return redirect()->route('proveedor.index')->with('info','El proveedor se actualizó correctamente');
          
          }

          
          public function getpdf(){
           
            $proveedores = DB::table('PA_PROVEEDORES')
            ->join('REL_DIRECC_PERSONAS_PROVEEDOR', 'PA_PROVEEDORES.COD_PROVEEDOR', '=', 'REL_DIRECC_PERSONAS_PROVEEDOR.COD_PROVEEDOR')
            ->join('pa_direcciones', 'REL_DIRECC_PERSONAS_PROVEEDOR.COD_DIRECCION', '=', 'pa_direcciones.COD_DIRECCION')
            /*ojo en los otros modulos*/->join('REL_TEL_PERSONAS_PROVEEDOR', 'PA_PROVEEDORES.COD_PROVEEDOR', '=', 'REL_TEL_PERSONAS_PROVEEDOR.COD_PROVEEDOR')
            ->join('PA_TELEFONOS', 'REL_TEL_PERSONAS_PROVEEDOR.COD_TELEFONO', '=', 'PA_TELEFONOS.COD_TELEFONO')
            ->join('REL_CORREOS_PERSONAS_PROVEEDORES', 'PA_PROVEEDORES.COD_PROVEEDOR', '=', 'REL_CORREOS_PERSONAS_PROVEEDORES.COD_PROVEEDOR')
            ->join('PA_CORREOS', 'REL_CORREOS_PERSONAS_PROVEEDORES.COD_CORREO', '=', 'PA_CORREOS.COD_CORREO')
            ->select('PA_PROVEEDORES.COD_PROVEEDOR', 'PA_PROVEEDORES.NOMBRE_EMPRESA', 'pa_direcciones.CIUDAD', 'pa_direcciones.DIRECCION', 'PA_CORREOS.CORREO', 'PA_TELEFONOS.TIPO_TELEFONO',
            'PA_TELEFONOS.NUM_TELEFONO')
            ->get();

    
               $pdf = PDF::loadView('imprimir.proveedor', compact('proveedores'));
               return $pdf->download('proveedor.pdf');
           }

}
