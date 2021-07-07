<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class ReporteController extends Controller
{
    public function selectreporte(Request $request)
    {
         $rempleados= DB::select('call select_count_empleado');
         $rproveedores= DB::select('call select_count_proveedor');
         $rclientes= DB::select('call select_count_cliente');
         $rinventarios= DB::select('call select_count_inventario');
         return view('vistas.index', compact("rempleados", "rproveedores", "rclientes", "rinventarios" ));
    }

}
