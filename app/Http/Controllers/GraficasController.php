<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class GraficasController extends Controller
{
    

 
    public function graficas(Request $request)
    {


        $gclientes = DB::table('pa_clientes')->select(DB::Raw("COUNT(*) as count"))
        ->whereYear('FECHA_REG', date('Y'))
        ->groupBy(DB::raw("Month(FECHA_REG)"))
        ->pluck('count');

        $gproveedores = DB::table('pa_proveedores')->select(DB::Raw("COUNT(*) as count"))
        ->whereYear('FECHA_REG', date('Y'))
        ->groupBy(DB::raw("Month(FECHA_REG)"))
        ->pluck('count');


        $gmateriales = DB::table('pa_materiales')->select(DB::Raw("COUNT(*) as count"))
        ->whereYear('FECHA_REG', date('Y'))
        ->groupBy(DB::raw("Month(FECHA_REG)"))
        ->pluck('count');

        $ggastos = DB::table('pa_control_gastos')->select(DB::Raw("COUNT(*) as count"))
        ->whereYear('FECHA', date('Y'))
        ->groupBy(DB::raw("Month(FECHA)"))
        ->pluck('count');

        return view('graficas.graficarClientes', compact('gclientes', 'gproveedores', 'gmateriales', 'ggastos' ));
       
    }

}
