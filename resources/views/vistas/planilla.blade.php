@extends('adminlte::page')

@section('title', 'Orquidea')



@section('content')

<!DOCTYPE html>
  <html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css"/>   
    <script src="https://kit.fontawesome.com/e73b073bc6.js" crossorigin="anonymous"></script>


    <!--MANEJO DEL DOM-->
    
    <!-- Librerias CSS para manejo del DOM-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <!--BOOSTRAP ESTILO DE TABLAS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






<!--ESTILOS CSS-->
    <style>

.dt-buttons {
	margin-bottom: 10px;
}
.dt-buttons.btn-group{
	float: left;
	margin-right: 2%;
}
.dataTables_filter {
	
	margin-top: 10px;
	margin-right: 0%;
	text-align: right;
    
}
.dataTables_info {
	float: right;
}
.dataTables_lengthMenu{
	float: center;
	margin-top: 4px;
	margin-left: 2%;
    text-align: right;
}
    .custom {
      width: 100px !important;
  }

  </style>

<style>
      .red{
        color: red;
        content: "*";
        position: absolute;
        margin-left: -10px;
}
      </style>


  </head>
<body>  


</br>

<div class="card">
  <div class="card-body">
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Administración de Pagos</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE PLANILLAS-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/9HZX3Mt/icono-mis-pagos-amarillo.png">
</div>
  
  </div>
</div>



<!-- BOTON AGREGAR PLANILLAS, MODAL-->
@can('/admin/planilla/insertarplanilla')
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
<button class="btn btn-outline-success" data-toggle="modal" data-target="#ventanaModal" > <i class="fas fa-plus"></i> AGREGAR PAGO</button>
</div></br>
@endcan



<!-- FORMULARIO PARA AGREGAR PAGO DE PLANILLA, MODAL-->

<main class="container">
  
<div class="modal fade bd-example-modal-lg" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true"> 
<div class="modal-dialog modal-lg" role="document">      
<div class="modal-content">


      <div class="modal-header bg-success  text-white">
          <h5 id="tituloVentana" style="text-transform:uppercase; font-size:20px;">AGREGAR PAGO</h5>
          <button class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>


<form action="{{url('/admin/planilla/insertarplanilla')}}" method="POST">
            {{csrf_field()}}

<div class="card-body">
<!-- IMAGEN PARA PANTALLA DE EMPLEADO, MODAL-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:70px; " src="https://i.ibb.co/9HZX3Mt/icono-mis-pagos-amarillo.png">
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;" >
                  <div class="col-md-6 mb-4" >
                  </br> <label for="Empleado">Empleado:</label>     
                      <select name="COD_EMPLEADO" ID="COD_EMPLEADO" class="form-control text-uppercase"  value=""  minlength="1" 
                      type="text" style="font-size:11px; text-align-last: center;">
                          @foreach($emples as $emple)
                          <option value="{{$emple->COD_EMPLEADO}}">{{$emple->PRIMER_NOMBRE}} {{$emple->PRIMER_APELLIDO}}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="col-md-6 mb-4">
                  </br>  <label for="start">Seleccione fecha de pago:</label></br>
                    <input class="form-control text-center"   type="date" id="start" name="FECHA_PAGO"
                           min="2018-01-01" max="2050-12-31" required="">
                           <div class="valid-feedback">¡Ok válido!</div>
                           <div class="invalid-feedback">Complete el campo.</div>   
                  </div>
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;" >
  <div class="col-md-6 mb-4">
        <label for="Periodos">Periodo de pago:</label>
        <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
        <label class="btn btn-success" style="font-size:14px; text-align:center">
          <input type="radio" id="Semanal" name="COD_PERIODO" value="1" autocomplete="off" required=""> Semanal
        </label>
        <label class="btn btn-success" style="font-size:14px; text-align:center">
          <input type="radio" id="Quincenal" name="COD_PERIODO" value="2"  autocomplete="off" required=""> Quincenal
        </label>
        <label class="btn btn-success" style="font-size:14px; text-align:center">
          <input type="radio" id="Mensual" name="COD_PERIODO" value="3"  autocomplete="off" required=""> Mensual 
        </label> 
      </div>
  </div>

      <div class="col-md-6 mb-4"  >
        <label for="PagosObras">Total de pagos por obras:</label>
        <input name="TOTAL_PAGOS_OBRAS" type="text" class="form-control monto text-uppercase" 
        onchange="sumar();" id="Valor1"  maxlength="7" minlength="2"
        placeholder="Agrega el total por obras" style="font-size:11px; text-align:center; height: 38px;" required="" 
        pattern="[0-9.]+" >
        <div class="valid-feedback">¡Ok válido!</div>
        <div class="invalid-feedback">Complete el campo.</div>   
    </div>
</div>



<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;" >
        <div class="col-md-6 mb-4" >
              <label for="bono">Bono:</label>
              <input name="BONO" type="text" class="form-control monto text-uppercase" id="Valor2" 
              onchange="sumar();" value="" maxlength="7" minlength="1"
              placeholder="Agrega un bono" style="font-size:11px; text-align:center; height: 38px;" required="" 
              pattern="[0-9.]+">
              <div class="valid-feedback">¡Ok válido!</div>
              <div class="invalid-feedback">Complete el campo.</div>
        </div>   

        <div class="col-md-6 mb-4" >
          <label for="deducciones">Total deducciones:</label>
          <input name="TOTAL_DEDUCCIONES" type="text" class="form-control monto text-uppercase" onchange="sumar();" 
          id="Valor3" value="" maxlength="100" minlength="1"
          placeholder="Agrega total deducciones" style="font-size:11px; text-align:center; height: 38px;"  
          pattern="^-[0-9.]\d*">
          <span class="note" style="font-size:11px;" >ejemplo: -x </span>  
     </div>
</div>
  
  
  
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;" >
          <div class="col-md-6 mb-4" > 
               <label for="TOTAL_PAGAR">Total a pagar:</label>
               <input name="TOTAL_PAGAR" type="text" class="form-control" id="total"  maxlength="7" minlength="2"
               style="font-size:14px; text-align:center; height: 38px;" required="" pattern="[0-9]+" readonly="true" >
               <div class="valid-feedback">¡Ok válido!</div>
               <div class="invalid-feedback">Complete el campo.</div>   

           </div>

           <div class="col-md-6 mb-4">
            <label for="DESCRIPCION_DEDUC">Descripción de deducción:</label>
            <input name="DESCRIPCION_DEDUC" type="text" class="form-control text-uppercase" id="DESCRIPCION_DEDUC" minlength="5" maxlength="70"
            placeholder="Agregar porqué se le está deduciendo al empleado" style="font-size:11px; text-align:center; height: 38px;" value="" 
            pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ',.]+" >
            <div class="valid-feedback">¡Complete solo si hizo una deducción!</div>
            <div class="invalid-feedback">Complete el campo.</div>   
          </div>  
  </div> 
</div>
   

<div class="modal-footer">
          <button class="btn btn-primary custom" style="font-size:14px; text-align:center;" type="submit">GUARDAR</button> 
             <button class="btn btn-secondary custom" style="font-size:14px; text-align:center;" type="button" data-dismiss="modal"> CERRAR</button>

</div>

</form>
      
</div>
</div>
</div>
</div>
</form>
</main>

<!--MENSAJE DE ALERTA -->
@if (session('info'))
      <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
       </div>
   @endif
<!--FIN MENSAJE DE ALERTA -->


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
            <table id="tabla" class="table table-striped " style="width:100%" >
                    <thead class="thead-dark">
                    <tr style="text-transform:uppercase; font-size:14px;">
					<th width="10px">#</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">APELLIDO</th>
        <th width="130px" scope="col">FECHA DE PAGO</th>
        <th scope="col">TOTAL</th>
        <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($planillas as $planilla)
                     <tr class="text-uppercase" style="font-size:13px;">
          <td>{{$loop->iteration}}</td> 
          <td>{{$planilla->PRIMER_NOMBRE}}</td> 
          <td>{{$planilla->PRIMER_APELLIDO}}</td>       
          <td  width="132px">{{$planilla->FECHA_PAGO}}</td>   
          <td>{{$planilla->TOTAL_PAGAR}}</td>
       <td>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">

 

        <!--DETALLE DE PLANILLA-->
        <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#detailModal{{$planilla->COD_PLANILLA}}" ><i class="far fa-file-alt"></i></button>

<div class="modal fade" id="detailModal{{$planilla->COD_PLANILLA}}" tabindex="-1" role="dialog" aria-labelledby="tituloVentana2" aria-hidden="true"> 
<div class="modal-dialog" role="document">      
<div class="modal-content">
      <div class="modal-header bg-info text-white">
          <h5 id="tituloVentana2">MAS DETALLES DEL PAGO</h5>
          <button class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
</br>


<div class="col-sm-12">
<div class="card border-info mb-3">
<div class="card-body">
  <h6 class="card-title">INFORMACIÓN GENERAL DE LOS PAGOS</h6>
            <p class="card-text">
            <label for="NOMBRE" class="col-form-label">EMPLEADO:<option> {{$planilla->PRIMER_NOMBRE}} {{$planilla->SEGUNDO_NOMBRE}} {{$planilla->PRIMER_APELLIDO}} {{$planilla->SEGUNDO_APELLIDO}}</option></label>
            </br>
            <label for="FECHA" class="col-form-label">FECHA DE PAGO:<option> {{$planilla->FECHA_PAGO}}</option></label>
            </br>
            <label for="PERIODO" class="col-form-label">PERIODO DE PAGO:<option> {{$planilla->NOMBRE_PERIODO}}</option></label>
            </br>
            <label for="PAGOS" class="col-form-label">TOTAL PAGOS POR OBRAS:<option> {{$planilla->TOTAL_PAGOS_OBRAS}}  </option></label>
            </br>
            <label for="BONO" class="col-form-label">BONO:<option> {{$planilla->BONO}}</option></label>
            </br>
            <label for="TOTAL_DEDUCCIONES" class="col-form-label">TOTAL DEDUCCIÓN:<option> {{$planilla->TOTAL_DEDUCCIONES}}</option></label>
            </br>
            <label for="DESCRIPCION_DEDUC" class="col-form-label">DESCRIPCIÓN DE LA DEDUCCIÓN:<option> {{$planilla->DESCRIPCION_DEDUC}}</option></label>
            </br>
            <label for="TOTAL" class="col-form-label">TOTAL A PAGAR:<option> {{$planilla->TOTAL_PAGAR}}</option></label>
              </p>
</div>
</div>
</div>
</div>
</div>
</div>


<!-- UPDATE PLANILLA-->
@can('/admin/planilla/actualizarplanilla/')
 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$planilla->COD_PLANILLA}}"> <i class="fas fa-edit"></i></button>
 @endcan

<main class="container">
  

<div class="modal fade bd-example-modal-lg" id="editModal{{$planilla->COD_PLANILLA}}" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true"> 
<div class="modal-dialog modal-lg" role="document">      
<div class="modal-content">


<form action="{{url('/admin/planilla/actualizarplanilla/' .$planilla->COD_PLANILLA)}}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}


      <div class="modal-header bg-warning text-white">
          <h5 id="tituloVentana" style="text-transform:uppercase; font-size:20px;">EDITAR PAGOS</h5>
          <button class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>


<div class="card-body">
<!-- IMAGEN PARA PANTALLA DE EMPLEADO, MODAL-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:70px; " src="https://i.ibb.co/9HZX3Mt/icono-mis-pagos-amarillo.png">
</div>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;" > 
                  <div class="col-md-6 mb-4" >
                  </br> <label for="Empleado">Empleado:</label>     
          <select name="COD_EMPLEADO" value="{{$emple->PRIMER_NOMBRE}} {{$emple->PRIMER_APELLIDO}}" ID="COD_EMPLEADO" 
          class="form-control text-uppercase"  
           minlength="1" type="text" style="font-size:14px; text-align:center; height: 38px;">
                          @foreach($emples as $emple)
                          <option value="{{$emple->COD_EMPLEADO}}">{{$emple->PRIMER_NOMBRE}} {{$emple->PRIMER_APELLIDO}}</option>
                          @endforeach
                      </select>  
                  </div>

                  <div class="col-md-6 mb-4">
                  </br>  <label for="start">Seleccione fecha de pago:</label></br>
                    <input class="form-control text-center"   type="date" id="start" value="{{$planilla->FECHA_PAGO}}" name="FECHA_PAGO"
                           min="2018-01-01" max="2050-12-31" required="">
                           <div class="valid-feedback">¡Ok válido!</div>
                           <div class="invalid-feedback">Complete el campo.</div>   
                  </div>
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;" >
  <div class="col-md-6 mb-4">
        <label for="Periodos">Periodo de pago:</label>
        <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
        <label class="btn btn-warning"  style="font-size:14px; text-align:center">
          <input type="radio" id="Semanal" name="COD_PERIODO" value="1" autocomplete="off" required=""> Semanal
        </label>
        <label class="btn btn-warning"  style="font-size:14px; text-align:center">
          <input type="radio" id="Quincenal" name="COD_PERIODO" value="2"  autocomplete="off" required=""> Quincenal
        </label>
        <label class="btn btn-warning"  style="font-size:14px; text-align:center"> 
          <input type="radio" id="Mensual" name="COD_PERIODO" value="3"  autocomplete="off" required=""> Mensual 
        </label> 
      </div>
  </div>

      <div class="col-md-6 mb-4"  >
        <label for="PagosObras">Total de pagos por obras:</label>
        <input value="" name="TOTAL_PAGOS_OBRAS" type="text" class="form-control montoedit text-uppercase" 
         id="Valor1" onchange="sumaredit();"  maxlength="7" minlength="2"
        placeholder="Agrega el total por obras" style="font-size:11px; text-align:center; height: 38px;" required="" pattern="[0-9.]+" >
        <div class="valid-feedback">¡Ok válido!</div>
        <div class="invalid-feedback">Complete el campo.</div>   
    </div>
</div>



<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;" >
        <div class="col-md-6 mb-4" >
              <label for="bono">Bono:</label>
              <input name="BONO" value="" type="text" class="form-control montoedit text-uppercase" id="Valor2"
               onchange="sumaredit();" value="" maxlength="7" minlength="1"
              placeholder="Agrega un bono" style="font-size:11px; text-align:center; height: 38px;" required="" pattern="[0-9.]+">
              <div class="valid-feedback">¡Ok válido!</div>
              <div class="invalid-feedback">Complete el campo.</div>
        </div>   

        <div class="col-md-6 mb-4" >
          <label for="deducciones">Total deducciones:</label>
          <input name="TOTAL_DEDUCCIONES"  value="" type="text" class="form-control montoedit text-uppercase"  
          id="Valor3" onchange="sumaredit();" value="" maxlength="7" minlength="1"
          placeholder="Agrega las deducciones" style="font-size:11px; text-align:center; height: 38px;" required="" pattern="^-[0-9.]\d*" >
          <div class="valid-feedback">¡Ok válido!</div>
          <div class="invalid-feedback">Complete el campo.</div>   
     </div>
</div>
  
  
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;" >
          <div class="col-md-6 mb-4" > 
               <label for="TOTAL_PAGAR">Total a pagar:</label>
               <input name="TOTAL_PAGAR" value="" type="text" class="form-control text-uppercase" id="totaledit"  maxlength="7" minlength="2"
               style="font-size:11px; text-align:center; height: 38px;" required="" pattern="[0-9.]+" readonly="true" >
               <div class="valid-feedback">¡Ok válido!</div>
               <div class="invalid-feedback">Complete el campo.</div>   

           </div>

           <div class="col-md-6 mb-4">
            <label for="DESCRIPCION_DEDUC">Descripción de deducción:</label>
            <input name="DESCRIPCION_DEDUC" value="{{$planilla->DESCRIPCION_DEDUC}}" type="text" class="form-control text-uppercase"
             id="DESCRIPCION_DEDUC" minlength="5" maxlength="70"
            placeholder="Especifique porqué se le está deduciendo al empleado" style="font-size:11px; text-align:center; height: 38px;" value="" 
            pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ /',.]+" >
            <div class="valid-feedback">¡Complete solo si hizo una deducción!</div>
            <div class="invalid-feedback">Complete el campo.</div>   
          </div>  
  </div> 
</div>
   

<div class="modal-footer">
            <button class="btn btn-primary custom"  style="font-size:14px; text-align:center;" type="submit">GUARDAR</button> 
             <button class="btn btn-secondary custom"  style="font-size:14px; text-align:center;" type="button" data-dismiss="modal"> CERRAR</button>

</div>


</div>
</div>
</div>
</form>
</main>



<!--FIN DETALLE DE PLANILLA-->
</div>
          
          </td>  
     @endforeach
                       </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body">
                <p>Proximamente, Formulario....</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</body>  
@stop

                                                 <!--SECCION DE JS-->
                                                 @section('js')
                                                 <script>
function sumar()
{
  const $total = document.getElementById('total');

  let subtotal = 0;

  [ ...document.getElementsByClassName( "form-control monto" ) ].forEach( function ( element ) {
    if(element.value !== '') {
      subtotal +=  parseFloat(element.value);
    }
  });
  $total.value = subtotal; 
}
</script>





<script> console.log('Hi!'); </script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<script>
 $('.formulario-eliminar').submit(function(e){
 e.preventDefault();

 Swal.fire({
   title: '¿Estás Seguro?',
   text: "Estos Registros se eliminarán definitivamente",
   icon: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Si, Eliminar!',
   cancelButtonText: 'Cancelar'
   
 }).then((result) => {
   if (result.isConfirmed) {
     /*Swal.fire(
       'Deleted!',
       'Your file has been deleted.',
       'success'
     )*/
     this.submit();
   }
 })

});
</script>
<!--ARCHIVOS DE JAVA PARA DATABASE-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

 <!--AGREGAR COLORES DE BOOSTRAPP A LOS BOTONES-->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>

 

<script>
$(document).ready(function() {
    $('#tabla').DataTable( {

      "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },

      
        lengthMenu: [
            [ 2, 5, 10, 15, 20  -1 ],
            [ '2 ', '5 ', '10 ', '20 ', 'todo' ]
        ],

        "footer": true,
        dom: 'Bfltip',
        buttons: [
            {
                extend: 'copyHtml5',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-copy"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                },
                titleAttr: 'COPIAR INFORMACIÓN',
                className: 'btn btn-info'
                
            },
            {
                extend: 'excelHtml5',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-excel"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                },
                filename: 'EXCEL REPORTE PAGOS',
                titleAttr: 'EXPORTAR A EXCEL',
                messageTop: 'Dirección: Barrio el Edén (14.078591, -87.225581) - Teléfono: +504 9445-5962', 
                className: 'btn btn-success',
            },
            {
                text: 'Custom PDF',
                extend: 'pdfHtml5', 
                filename: 'PDF REPORTE PAGOS',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-pdf"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                },
                
                titleAttr: 'EXPORTAR PDF',
                messageTop: 'Dirección: Barrio el Edén (14.078591, -87.225581) - Teléfono: +504 9445-5962', 
                pageSize: 'A4',
                orientation:'landscape',
                className: 'btn btn-danger',
                //MARGEN PARA CENTRAR LAS TABLAS
                customize: function(doc) {
                  doc.defaultStyle.alignment = 'center',
              //pageMargins [left, top, right, bottom] 
                doc.pageMargins = [ 292, 30, 292, 30 ]; },
                
            
            },
          
        
        
        ]

        });
} );  

</script>
@stop




