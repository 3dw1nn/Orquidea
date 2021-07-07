<?php


use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\CGastoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FacturacionController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\PlanillaController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\GraficasController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('dash');
})->name('dash');

Route::middleware(['auth:sanctum', 'verified'])->get('/dash', [ReporteController::class, 'selectreporte']);

Route::get('/admin/almacen/veralmacen', [AlmacenController::class, 'selectalmacen'])->name('almacen.index');
Route::post('/admin/almacen/insertaralmacen', [AlmacenController::class, 'insertalmacen']);

Route::post('/admin/catalogo/insertarcgasto', [CGastoController::class, 'insertcgasto'])->name('cgasto.index');
Route::delete('/admin/catalogo/eliminarcgasto/{COD_TIPO_GASTO}', [CGastoController::class, 'deletecgasto']);
Route::PUT('/admin/catalogo/actualizarcgasto/{COD_TIPO_GASTO}', [CGastoController::class, 'updatecgasto']);

Route::get('/admin/cliente/vercliente',[ClienteController::class, 'selectcliente'])->name('cliente.index');
Route::post('/admin/cliente/insertarcliente',[ClienteController::class,'insertcliente']);
Route::delete('/admin/cliente/eliminarcliente/{COD_PERSONA}',[ClienteController:: class,'deletecliente']);
Route::put('/admin/cliente/actualizarcliente/{COD_PERSONA}', [ClienteController:: class,'updatecliente']);

Route::get('/admin/empleado/verempleado', [EmpleadoController:: class,'selectempleado'])->name('empleado.index'); 
Route::post('/admin/empleado/insertarempleado', [EmpleadoController::class,'insertempleado']);
Route::delete('/admin/empleado/eliminarempleado/{COD_PERSONA}',[EmpleadoController::class,'deleteempleado']);
Route::put('/admin/empleado/actualizarempleado/{COD_PERSONA}', [EmpleadoController::class,'updateempleado']);

Route::get('/admin/facturacion/verfacturacion', [FacturacionController::class, 'selectfacturacion'])->name('factura.index');
Route::post('/admin/facturacion/insertarfacturacion', [FacturacionController::class, 'insertfacturacion']);

Route::get('/admin/catalogo/vercatalogo', [FamiliarController::class, 'selectcatalogo'])->name('catalogo.index');
Route::post('/admin/catalogo/insertarfamiliar', [FamiliarController::class, 'insertfamiliar']);
Route::delete('/admin/catalogo/eliminarfamiliar/{COD_FAMILIAR}', [FamiliarController::class,'deletefamiliar']);
Route::put('/admin/catalogo/actualizarfamiliar/{COD_FAMILIAR}', [FamiliarController::class, 'updatefamiliar']);

Route::get('/admin/gasto/vergasto', [GastoController::class, 'selectgasto'])->name('gasto.index');
Route::Post('/admin/gasto/insertargasto', [GastoController::class, 'insertgasto']);
Route::put('/admin/gasto/actualizargasto/{COD_CONTROL_GASTO}', [GastoController::class,'updategasto']);

Route::get('/admin/inventario/verinventario', [InventarioController::class, 'selectinventario'])->name('inventario.index');
Route::post('/admin/inventario/insertarinventario', [InventarioController::class, 'insertinventario']);
Route::delete('/admin/inventario/eliminarinventario/{COD_PRODUCTO_INVENTARIO}', [InventarioController::class, 'deleteinventario']);
Route::put('/admin/inventario/actualizarinventario/{COD_PRODUCTO_INVENTARIO}', [InventarioController::class, 'updateinventario']);

Route::get('/admin/material/vermaterial', [MaterialController::class, 'selectmaterial'])->name('material.index');
Route::post('/admin/material/insertarmaterial', [MaterialController::class,'insertmaterial']);
Route::delete('/admin/material/eliminarmaterial/{COD_MATERIAL}', [MaterialController:: class, 'deletematerial']);
Route::put('/admin/material/actualizarmaterial/{COD_MATERIAL}', [MaterialController::class, 'updatematerial']);

Route::post('/admin/catalogo/insertarmedida', [MedidaController::class, 'insertmedida'])->name('medida.index');
Route::DELETE('/admin/catalogo/eliminarmedida/{COD_MEDIDA_MATERIAL}', [MedidaController::class, 'deletemedida']);
Route::PUT('/admin/catalogo/actualizarmedida/{COD_MEDIDA_MATERIAL}', [MedidaController::class, 'updatemedida']);

Route::get('/admin/pieza/verpieza', [PiezaController::class, 'selectpieza'])->name('piezas.index');
Route::post('/admin/pieza/insertarpieza', [PiezaController::class, 'insertpieza']);
Route::delete('/admin/pieza/eliminarpieza/{COD_PIEZA_PRODUCTO}', [PiezaController::class, 'deletepieza']);
Route::put('/admin/pieza/actualizarpieza/{COD_PIEZA_PRODUCTO}', [PiezaController::class, 'updatepieza']);

Route::get('/admin/planilla/verplanilla',[PlanillaController::class, 'selectplanilla'])->name('planilla.index');
Route::post('/admin/planilla/insertarplanilla',[PlanillaController::class, 'insertplanilla']);
Route::put('/admin/planilla/actualizarplanilla/{COD_PLANILLA}',[PlanillaController::class,'updateplanilla']);

Route::get('/admin/produccion/verproduccion', [ProduccionController::class, 'selectproduccion'])->name('produccion.index');
Route::post('/admin/produccion/insertarproduccion', [ProduccionController::class, 'insertproduccion']);
Route::put('/admin/produccion/actualizarproduccion/{ORDEN_PRODUCCION}', [ProduccionController::class, 'updateproduccion']);

Route::get('/admin/proveedor/verproveedor', [ProveedorController:: class,'selectproveedor'])->name('proveedor.index');
Route::post('/admin/proveedor/insertarproveedor',[ProveedorController:: class, 'insertproveedor']);
Route::delete('/admin/proveedor/eliminarproveedor/{COD_PROVEEDOR}', [ProveedorController:: class, 'deleteproveedor']);
Route::put('/admin/proveedor/actualizarproveedor/{COD_PROVEEDOR}',[ProveedorController:: class, 'updateproveedor']);

Route::post('/admin/catalogo/insertarpuesto', [PuestoController::class, 'insertpuesto'])->name('puesto.index');
Route::DELETE('/admin/catalogo/eliminarpuesto/{COD_PUESTO}', [PuestoController::class, 'deletepuesto']);
Route::PUT('/admin/catalogo/actualizarpuesto/{COD_PUESTO}', [PuestoController::class, 'updatepuesto']);


Route::get('/admin/Bitacora/verbitacora', [BitacoraController::class,'selectbitacora'])->name('bitacora.index');

Route::get('/admin/Backup/verbackup', [BackupController::class,'selectbackup']);

/*RUTAS DESCARGAR PDF*/
Route::get('/pdfalmacen', [AlmacenController::class, 'getpdf'])->name('descargarPDFalmacen');
//Route::post('/pdfcgasto', [CGastoController::class, 'getpdf'])->name('descargarPDFcgasto');
Route::get('/pdfcliente',[ClienteController::class, 'getpdf'])->name('descargarPDFcliente');
Route::get('/pdfempleado', [EmpleadoController:: class,'getpdf'])->name('descargarPDFempleado');
Route::get('/pdffacturacion', [FacturacionController::class, 'getpdf'])->name('descargarPDFfactura');
//Route::get('/pdfcatalogo', [FamiliarController::class, 'getpdf'])->name('descargarPDFcatalogo');
Route::get('/pdfgastos', [GastoController::class, 'getpdf'])->name('descargarPDFgastos');
Route::get('/pdfinventario', [InventarioController::class, 'getpdf'])->name('descargarPDFInventario');
Route::get('/pdfmaterial', [MaterialController::class, 'getpdf'])->name('descargarPDFmaterial');
//Route::post('/pdfmedida', [MedidaController::class, 'getpdf'])->name('descargarPDFmedida');
Route::get('/pdfpieza', [PiezaController::class, 'getpdf'])->name('descargarPDFpiezas');
Route::get('/pdfplanilla',[PlanillaController::class, 'getpdf'])->name('descargarPDFplanilla');
Route::get('/pdfproduccion', [ProduccionController::class, 'getpdf'])->name('descargarPDFproduccion');
Route::get('//pdfproveedor', [ProveedorController:: class,'getpdf'])->name('descargarPDFproveedor');
//Route::post('/pdfpuesto', [PuestoController::class, 'getpdf'])->name('descargarPDFpuesto');
Route::get('/pdfbitacora', [BitacoraController::class,'getpdf'])->name('descargarPDFbitacora');


//Nuevas rutas
Route::get('/admin/catalogo/vermedidas', [MedidaController::class, 'selectmmedidas'])->name('medida.index');
Route::get('/admin/catalogo/vergastos', [CGastoController::class, 'selectmgastos'])->name('mgasto.index');
Route::get('/admin/catalogo/verpuestos', [PuestoController::class, 'selectmpuestos'])->name('puesto.index');
Route::get('/graficas/reportes', [GraficasController::class, 'graficas']);


