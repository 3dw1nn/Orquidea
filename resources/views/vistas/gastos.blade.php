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
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Administración de Gastos</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE MATERIAL-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/cXf6Hbd/Gastar-Menos.png">
</div>
  
  </div>
</div>


  <!-- Button to Open the Modal -->

@can('/admin/gasto/insertargasto')
  <div class="col-lg-12">            
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
    <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#myModal">
    <i class="fas fa-plus"></i> AGREGAR GASTO</button>   
    </div>    
    </div> 
  @endcan
    </br>



  <!-- The Modal -->
  <div class="modal fade bd-example-modal-lg"  id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      

       <form action="{{url('/admin/gasto/insertargasto')}}" method="POST">
            {{csrf_field()}}


      <!-- Modal Header -->
        <div class="modal-header bg-success  text-white">
        <h5 class="modal-title" id="exampleModalLabel" 
        style="text-transform:uppercase; font-size:20px; ">AGREGAR GASTO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      
         <!-- Modal body -->

  <div class="card-body">
  <form  class="needs-validation" novalidate > 

   
        <!-- Datos a ingresar en modal-->    
        
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">       
          <div class="col-md-6 mb-4p">
                <label for="Empleado">Empleado:</label>     
                  <select name="COD_EMPLEADO" ID="COD_EMPLEADO" class="form-control text-uppercase"  
                  value="" maxlength="100" minlength="1" type="text" 
                  style="font-size:11px; text-align-last: center;"  >
                @foreach($emples as $emple)
                <option value="{{$emple->COD_EMPLEADO}}">{{$emple->PRIMER_NOMBRE}} {{$emple->PRIMER_APELLIDO}}</option>
                @endforeach
            </select>
          </div> 
                

          <div class="col-md-6 mb-4p">
          <label for="start">Fecha:</label></br> 
          <input class="form-control text-center"   type="date" id="start" name="FECHA_PAGO"
          min="2018-01-01" max="2050-12-31" required="">
          <div class="valid-feedback">¡Ok válido!</div>
          <div class="invalid-feedback">Complete el campo.</div>   
         </div> 
 </div>


 <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">      
          <div class="col-md-6 mb-4p">  
          </br><label for="Consumo">Seleccione el gasto:</label>     
              <select name="COD_TIPO_GASTO" ID="COD_TIPO_GASTO" class="form-control text-uppercase"  
              value="" maxlength="100" minlength="1" type="text" 
              style="font-size:11px; text-align-last: center;" >
              @foreach($consumos as $consumo)
              <option value="{{$consumo->COD_TIPO_GASTO}}">{{$consumo->NOMBRE_GASTO}}</option>
              @endforeach
              </select>
          </div> 

          <div class="col-md-6 mb-4p">
          </br><label for="Mat">Cantidad gastada:</label>
              <input name="CANTIDAD_GASTADA" type="text" class="form-control text-uppercase" id="gasto"  
              minlength="2" minlength="2" maxlength="35" placeholder="Agrega cantidad gastada"
              value="" required="" pattern=^[0-9]+([.][0-9]+)?$  type="gasto" style="font-size:11px; text-align:center">
              <div class="valid-feedback">¡Ok válido!</div>
              <div class="invalid-feedback">Complete el campo.</div> 
         </div>
</div>
            


</br><div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">      
      <div class="col-md-12 mb-4p">
      <label for="descripcion">Descripción del Gasto:</label>
      <textarea class="form-control text-uppercase" rows="2" id="comment" minlength="5" maxlength="200"  
      name=DESCRIPCION placeholder="Agrega descripción del gasto" 
      value="" required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" style="font-size:11px; text-align:center"></textarea>
      <div class="valid-feedback">¡Ok válido!</div>
      <div class="invalid-feedback">Complete el campo.</div>  
    </div>
</div>  
  </form>

               
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary custom"  style="font-size:14px; text-align:center;">GUARDAR</button>
          <button type="button" class="btn btn-secondary custom"  style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>


        </div>
        
      </div>
    </div>
    </div>
    </div>


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
                    <th scope="col">EMPLEADO</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">TIPO DE GASTO</th>
                    <th scope="col">CANTIDAD GASTADA</th>
                    <th scope="col">DESCRIPCIÓN</th>
                    <th scope="col">ACCIÓN</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gastos as $gasto)
                     <tr class="text-uppercase" style="font-size:13px;">

                      <td>{{$loop->iteration}}</td>
                      <td>{{$gasto->PRIMER_NOMBRE}} {{$gasto->PRIMER_APELLIDO}}</td>
                      <td>{{$gasto->FECHA}}</td>
                      <td>{{$gasto->NOMBRE_GASTO}}</td>
                      <td>{{$gasto->CANTIDAD}}</td>
                      <td>{{$gasto->DESCRIPCION}}</td>
       <td>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">


 
        <!-- EDITAR GASTO -->
@can('/admin/gasto/actualizargasto/')
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$gasto->COD_CONTROL_GASTO}}"  > <i class="fas fa-edit"></i></button> 
@endcan
 <!-- The Modal -->
  <div class="modal fade bd-example-modal-lg"  id="editModal{{$gasto->COD_CONTROL_GASTO}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      


      <form action="{{url('/admin/gasto/actualizargasto/' .$gasto->COD_CONTROL_GASTO)}}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}

      <!-- Modal Header -->
        <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="exampleModalLabel" 
        style="text-transform:uppercase; font-size:20px; ">EDITAR GASTO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      
         <!-- Modal body -->

  <div class="card-body">
  <form  class="needs-validation" novalidate > 

   
        <!-- Datos a ingresar en modal-->    
        
        
 <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">       
          <div class="col-md-6 mb-4p">
                <label for="Empleado">Empleado:</label>     
                  <select name="COD_EMPLEADO" ID="COD_EMPLEADO" class="form-control text-uppercase"  
                  value="{{$emple->PRIMER_NOMBRE}} {{$emple->PRIMER_APELLIDO}}" maxlength="100" minlength="1" type="text" 
                  style="font-size:11px; text-align-last: center;" >
                @foreach($emples as $emple)
                <option value="{{$emple->COD_EMPLEADO}}">{{$emple->PRIMER_NOMBRE}} {{$emple->PRIMER_APELLIDO}}</option>
                @endforeach
            </select>
          </div> 
                

          <div class="col-md-6 mb-4p">
          <label for="start">Fecha:</label></br> 
          <input class="form-control text-center"  value="{{$gasto->FECHA}}" type="date" id="start" name="FECHA_PAGO"
          min="2018-01-01" max="2050-12-31" required="">
          <div class="valid-feedback">¡Ok válido!</div>
          <div class="invalid-feedback">Complete el campo.</div>   
         </div> 
 </div>


 <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">        
          <div class="col-md-6 mb-4p">  
          </br><label for="Consumo">Seleccione el gasto:</label>     
              <select name="COD_TIPO_GASTO" ID="COD_TIPO_GASTO" class="form-control text-uppercase"  
              value="{{$gasto->NOMBRE_GASTO}}" maxlength="100" minlength="1" type="text" 
              style="font-size:11px; text-align-last: center;">
              @foreach($consumos as $consumo)
              <option value="{{$consumo->COD_TIPO_GASTO}}">{{$consumo->NOMBRE_GASTO}}</option>
              @endforeach
              </select>
          </div> 

          <div class="col-md-6 mb-4p">
          </br><label for="Mat">Cantidad gastada:</label>
              <input name="CANTIDAD_GASTADA" type="text" class="form-control text-uppercase" id="gasto"  
              maxlength="35" placeholder="Agrega cantidad gastada"
              value="{{$gasto->CANTIDAD}}" required="" pattern=^[0-9]+([.][0-9]+)?$ type="gasto" style="font-size:11px; text-align:center">
              <div class="valid-feedback">¡Ok válido!</div>
              <div class="invalid-feedback">Complete el campo.</div> 
         </div>
</div>
            

</br><div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">        
      <div class="col-md-12 mb-4p">
      <label for="descripcion">Descripción del Gasto:</label>
      <input class="form-control text-uppercase" rows="2" id="comment"  
      maxlength="200"  name=DESCRIPCION placeholder="Agrega descripción del gasto" 
      value="{{$gasto->DESCRIPCION}}" required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ./#']+" style="font-size:11px; text-align:center"></input>
      <div class="valid-feedback">¡Ok válido!</div>
      <div class="invalid-feedback">Complete el campo.</div>  
    </div>
</div>  
  </form>

               
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary custom"  style="font-size:14px; text-align:center;">GUARDAR</button>
          <button type="button" class="btn btn-secondary custom"  style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>

        </div>
        
      </div>
    </div>
    </div>
    </div>

      <!-- FIN EDITAR GASTO -->       
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
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                },
                titleAttr: 'COPIAR INFORMACIÓN',
                className: 'btn btn-info'
                
            },
            {
                extend: 'excelHtml5',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-excel"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                },
                filename: 'EXCEL REPORTE GASTOS',
                messageTop: 'Dirección: Barrio el Edén (14.078591, -87.225581) - Teléfono: +504 9445-5962',
                titleAttr: 'EXPORTAR A EXCEL',
                className: 'btn btn-success',
            },
            {
                text: 'Custom PDF',
                extend: 'pdfHtml5', 
                filename: 'PDF REPORTE GASTOS',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-pdf"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                },
                
                titleAttr: 'EXPORTAR A PDF',
                messageTop: 'Dirección: Barrio el Edén (14.078591, -87.225581) - Teléfono: +504 9445-5962',
                pageSize: 'A4',
                orientation:'landscape',
                className: 'btn btn-danger',
                //MARGEN PARA CENTRAR LAS TABLAS
                customize: function(doc) {
                doc.defaultStyle.alignment = 'center',
              //pageMargins [left, top, right, bottom] 
                doc.pageMargins = [ 210, 30, 210, 30 ]; },
                
            
            },
          
        
        
        ]

        });
} );  

</script>
@stop




