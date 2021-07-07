<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class FacturacionController extends Controller
{
    public function selectfacturacion(Request $request)
    { 
        //$facturas=DB::select('call select_factura');

        $texto=trim($request->get('texto'));

 
        $facturas = DB::table('PA_FACTURAS')
        ->join('PA_DETALLES_FACTURAS', 'PA_FACTURAS.COD_FACTURA', '=', 'PA_DETALLES_FACTURAS.COD_FACTURA')
        ->join('PA_PIEZAS_PRODUCTOS', 'PA_DETALLES_FACTURAS.COD_PIEZA_PRODUCTO', '=', 'PA_PIEZAS_PRODUCTOS.COD_PIEZA_PRODUCTO')
        ->join('PA_PRODUCTOS_INVENTARIOS', 'PA_DETALLES_FACTURAS.COD_PRODUCTO_INVENTARIO', '=', 'PA_PRODUCTOS_INVENTARIOS.COD_PRODUCTO_INVENTARIO')
        ->join('PA_CLIENTES', 'PA_FACTURAS.COD_CLIENTE', '=', 'PA_CLIENTES.COD_CLIENTE')
        ->join('PA_PERSONAS', 'PA_CLIENTES.COD_PERSONA', '=', 'PA_PERSONAS.COD_PERSONA')
        ->join('PA_EMPLEADOS', 'PA_FACTURAS.COD_EMPLEADO', '=', 'PA_EMPLEADOS.COD_EMPLEADO')
       
        ->select( 'PA_FACTURAS.COD_FACTURA', 'PA_FACTURAS.TOTAL_FACTURA', 'PA_FACTURAS.FECHA',
        'PA_EMPLEADOS.COD_EMPLEADO', 'PA_PERSONAS.PRIMER_NOMBRE', 'PA_PERSONAS.PRIMER_APELLIDO',
        'PA_PRODUCTOS_INVENTARIOS.NOMBRE_PRODUCTO', 'PA_PIEZAS_PRODUCTOS.NOMBRE_PIEZA',
        'PA_DETALLES_FACTURAS.PRECIO_PIEZA', 'PA_DETALLES_FACTURAS.IVA','PA_DETALLES_FACTURAS.DETALLE_CAMBIO', 
        'PA_DETALLES_FACTURAS.TOTAL_OPCIONALES', 'PA_DETALLES_FACTURAS.DESCUENTO')
        ->where('FECHA', 'LIKE', '%'.$texto.'%')
        ->Orwhere('NOMBRE_PRODUCTO', 'LIKE', '%'.$texto.'%')
        ->Orwhere('NOMBRE_PIEZA', 'LIKE', '%'.$texto.'%')
        ->paginate(3);


        $emples= DB::select('call select_listado');
        $clientes= DB::select('call select_cliente');
        $productos = DB::select('call select_listado_producto');
        $piezasfacturas= DB::select('call select_listado_piezas');
        
        return view('vistas.facturacion', compact("emples", "clientes", "productos",  "piezasfacturas", "facturas", "texto" ));       
    }

    public function insertfacturacion(Request $request)
    {
        

        $values =[$request->FECHA, $request->COD_EMPLEADO, $request->COD_CLIENTE,$request->COD_PRODUCTO_INVENTARIO,
        $request->COD_PIEZA_PRODUCTO, $request->PRECIO_PIEZA, $request->DETALLE_CAMBIO,$request->DESCUENTO,
        $request->IVA, $request->TOTAL_OPCIONALES,$request->TOTAL_FACTURA];
        DB::select('call insert_factura( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $values); 
        
        
        return redirect()->route('factura.index')->with('info',' Se agregó correctamente');
    }


    public function getpdf(){
           
        $facturas = DB::table('PA_FACTURAS')
        ->join('PA_DETALLES_FACTURAS', 'PA_FACTURAS.COD_FACTURA', '=', 'PA_DETALLES_FACTURAS.COD_FACTURA')
        ->join('PA_PIEZAS_PRODUCTOS', 'PA_DETALLES_FACTURAS.COD_PIEZA_PRODUCTO', '=', 'PA_PIEZAS_PRODUCTOS.COD_PIEZA_PRODUCTO')
        ->join('PA_PRODUCTOS_INVENTARIOS', 'PA_DETALLES_FACTURAS.COD_PRODUCTO_INVENTARIO', '=', 'PA_PRODUCTOS_INVENTARIOS.COD_PRODUCTO_INVENTARIO')
        ->join('PA_CLIENTES', 'PA_FACTURAS.COD_CLIENTE', '=', 'PA_CLIENTES.COD_CLIENTE')
        ->join('PA_PERSONAS', 'PA_CLIENTES.COD_PERSONA', '=', 'PA_PERSONAS.COD_PERSONA')
        ->join('PA_EMPLEADOS', 'PA_FACTURAS.COD_EMPLEADO', '=', 'PA_EMPLEADOS.COD_EMPLEADO')
        ->select( 'PA_FACTURAS.COD_FACTURA', 'PA_FACTURAS.TOTAL_FACTURA', 'PA_FACTURAS.FECHA',
        'PA_EMPLEADOS.COD_EMPLEADO', 'PA_PERSONAS.PRIMER_NOMBRE', 'PA_PERSONAS.PRIMER_APELLIDO',
        'PA_PRODUCTOS_INVENTARIOS.NOMBRE_PRODUCTO', 'PA_PIEZAS_PRODUCTOS.NOMBRE_PIEZA',
        'PA_DETALLES_FACTURAS.PRECIO_PIEZA', 'PA_DETALLES_FACTURAS.IVA','PA_DETALLES_FACTURAS.DETALLE_CAMBIO', 
        'PA_DETALLES_FACTURAS.TOTAL_OPCIONALES', 'PA_DETALLES_FACTURAS.DESCUENTO')
        ->get();



           $pdf = PDF::loadView('imprimir.facturacion', compact('facturas'));
           return $pdf->download('facturacion.pdf');
       }

}
