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
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Administración de Proveedores</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE PROVEEDORES-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:95px; " src="https://i.ibb.co/j8vW7JQ/icono-proveedor-png-5.png">
</div>
  
  </div>
</div>

@can('/admin/proveedor/insertarproveedor')
             <div class="col-lg-12">            
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#myModal">
            <i class="fas fa-plus"></i>  AGREGAR PROVEEDOR</button>   
            </div>    
            </div> 
@endcan
            </br>   

<main class="container">       
    <!--Modal para Proveedores-->
    <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               
 <form action="{{url('/admin/proveedor/insertarproveedor')}}" method="POST">
            {{csrf_field()}}


               <!--Modal header-->
                <div class="modal-header bg-success  text-white ">
                    <h5 class="modal-title text-center" id="exampleModalLabel" 
                    style="text-transform:uppercase; font-size:20px; "> Agregar Proveedor </h5>
                     <button type="button" class="close" 
                     data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
    
              <!--Inicio Formulario-->
              <div class="card-body">
                <form  class="needs-validation" novalidate >


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;" >
                    <div class="col-md-6 mb-4p text-uppercase">
                    <label for="nombre" class="col-form-label">NOMBRE:</label>
                    <input type="text"  class="form-control text-uppercase" name="NOMBRE_EMPRESA" id="nombre" 
                    placeholder="Agrega un nombre" minlength="4" maxlength="50" 
                    style="font-size:11px; text-align:center" value="" required=""
                    pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ& '.]+"  > 
                    <div class="valid-feedback">¡Válido!</div>
                    <div class="invalid-feedback">Complete el campo.</div>                
                    </div>


                    <div class="col-md-6 mb-4p text-uppercase" > 
                    <label for="direccion" class="col-form-label">CIUDAD:</label>
                    <input type="text" class="form-control text-uppercase" name="CIUDAD" 
                    id="direccion" 
                    minlength="3" maxlength="50" 
                    placeholder="Agrega una ciudad" style="font-size:11px; text-align:center" 
                    value="" required="" pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ. ']+">
                    <div class="valid-feedback">¡Válido!</div>
                    <div class="invalid-feedback">Complete el campo.</div>
                    </div>
</div>



<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
                    <div class="col-md-6 mb-4p text-uppercase">
                    </br><label for="direccion" class="col-form-label">DIRECCIÓN:</label>
                    <input type="text" class="form-control text-uppercase" name="DIRECCION" id="direccion" 
                    minlength="7" maxlength="250"
                    placeholder="Agrega una dirección" style="font-size:11px; text-align:center" 
                    value="" required="" pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ'.#,+-/ ]+">
                    <div class="valid-feedback">¡Válido!</div>
                    <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="col-md-6 mb-4p">
                    </br><label for="correo" class="col-form-label">CORREO:</label>
                    <input type="email" class="form-control" name="CORREO" id="correo" minlength="15" maxlength="50"
                    placeholder="ejemplo@dominio.com" style="font-size:14px; text-align:center" required="">
                    <div class="valid-feedback">¡Válido!</div>
                    </br> <div class="invalid-feedback">Verifique el correo y complete el campo.</div> 
                    </div>      
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
  

                    <div class="col-md-6 mb-4p">
                    <label for="telefono" class="col-form-label">TELÉFONO:</label>
                    <input type="tel" class="form-control text-uppercase" 
                    name= "NUM_TRABAJO" id="celular" required="" pattern="[0-9]{4}-[0-9]{4}"
                    placeholder="Agrega un número" style="font-size:11px; text-align:center" minlength="9" maxlength="9"/>
                    <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx</span>
                    <div class="valid-feedback" >¡Válido!</div>
                    <div class="invalid-feedback">Verifique el número y complete el campo.</div>
                    </div>  

</div>




        

                <div class="modal-footer">
                     <button class="btn btn-primary custom" style="font-size:14px; text-align:center;" type="submit">GUARDAR</button> 
                    <button type="button" class="btn btn-secondary custom "  style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>
                </div>

              </form>  
            </div>
            </form>    
            </div>
        </div>
    </div>  
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
                  <th scope="col">CIUDAD</th>
                  <th scope="col">DIRECCIÓN</th>
                  <th scope="col">CORREO</th>
                  <th scope="col">TELÉFONO</th>
                  <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($proveedores as $proveedor)
                    <tr style="text-transform:uppercase; font-size:13px;">
              <td class="text-uppercase" style="font-size:13px;">{{$loop->iteration}}</td>
              <td class="text-uppercase" style="font-size:13px;">{{$proveedor->NOMBRE_EMPRESA}}</td>
              <td class="text-uppercase" style="font-size:13px;">{{$proveedor->CIUDAD}}</td>
              <td class="text-uppercase" style="font-size:13px;">{{$proveedor->DIRECCION}}</td>
              <td style="font-size:14px;">{{$proveedor->CORREO}}</td>
              <td class="text-uppercase" style="font-size:13px;">{{$proveedor->NUM_TELEFONO}}</td>
              <td>
              <div class="d-grid gap-2 d-md-flex justify-content-md-left">



              
              
           <!--DETALLE DE EMPLEADO-->
           <button type="button" class="btn btn-info text-center"  data-toggle="modal" data-target="#detailModal{{$proveedor->COD_PROVEEDOR}}" ><i class="far fa-file-alt"></i></button>

<div class="modal fade" id="detailModal{{$proveedor->COD_PROVEEDOR}}" tabindex="-1" role="dialog" aria-labelledby="tituloVentana2" aria-hidden="true"> 
<div class="modal-dialog" role="document">      
<div class="modal-content">
      <div class="modal-header bg-info text-white">
          <h5 id="tituloVentana2">MÁS DETALLES DEL PROVEEDOR</h5>
          <button class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
</br>


<div class="col-sm-12">
<div class="card border-info mb-3">
<div class="card-body text-uppercase">
<h5 class="card-text " >INFORMACIÓN GENERAL</h5>
            <p class="card-text">
            <label for="NOMBRE" class="col-form-label">NOMBRE DEL PROVEEDOR: <option>{{$proveedor->NOMBRE_EMPRESA}}</option></label>
            </br>
            <label for="CORREO" class="col-form-label">CORREO: <option>{{$proveedor->CORREO}}</option></label>
            </br>
            <label for="CIUDAD" class="col-form-label">CIUDAD: <option>{{$proveedor->CIUDAD}}</option></label>
            </br>
            <label for="DIRECCION" class="col-form-label">DIRECCIÓN: <option>{{$proveedor->DIRECCION}}</option></label>
            </br>
            <label for="TELEFONO" class="col-form-label">TELÉFONO: <option>{{$proveedor->NUM_TELEFONO}}</option> </label>
              </p>
</div>
</div> 
</div>
</div>
</div>
</div>


<!--FIN DETALLE DE PROVEEDOR-->     
            
            
            
<!--EDITAR PROVEEDOR-->        
@can('/admin/proveedor/actualizarproveedor/')     
            <button type="button" class="btn btn-warning text-center"  data-toggle="modal" data-target="#editModal{{$proveedor->COD_PROVEEDOR}}"  ><i class="far fa-edit"></i> </button>
@endcan

  <!--Modal para Proveedores-->
  <div class="modal fade bd-example-modal-lg" id="editModal{{$proveedor->COD_PROVEEDOR}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             
<form action="{{url('/admin/proveedor/actualizarproveedor/' . $proveedor->COD_PROVEEDOR)}}" method="POST">
          {{csrf_field()}}
          {{method_field('PUT')}}


             <!--Modal header-->
              <div class="modal-header bg-warning  text-white ">
                  <h5 class="modal-title text-center" id="exampleModalLabel" 
                  style="text-transform:uppercase; font-size:20px; "> EDITAR PROVEEDOR </h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
  
            <!--Inicio Formulario-->
            <div class="card-body">

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
                  <div class="col-md-6 mb-4p">
                  <label for="nombre" class="col-form-label">NOMBRE:</label>
                  <input type="text" class="form-control text-uppercase" value="{{$proveedor->NOMBRE_EMPRESA}}" 
                  name="NOMBRE_EMPRESA" id="nombre" minlength="4"  maxlength="50" 
                  placeholder="Agregue el nombre" 
                  style="font-size:11px; text-align:center" value="" required=""
                  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ& '.]+"> 
                  <div class="valid-feedback">¡Válido!</div>
                  <div class="invalid-feedback">Complete el campo.</div>                
                  </div>


                  <div class="col-md-6 mb-4p">
                  <label for="direccion" class="col-form-label">CIUDAD:</label>
                  <input type="text" class="form-control text-uppercase" value="{{$proveedor->CIUDAD}}" name="CIUDAD" id="direccion" 
                  minlength="3"  maxlength="100"
                  placeholder="Agregue una dirección" style="font-size:11px; text-align:center" 
                  value="" required="" pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ. ']+">
                  <div class="valid-feedback">¡Válido!</div>
                  <div class="invalid-feedback">Complete el campo.</div>
                  </div>
</div>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;" >
                  <div class="col-md-6 mb-4p">
                  </br><label for="direccion" class="col-form-label">DIRECCIÓN:</label>
                  <input type="text" class="form-control text-uppercase" value="{{$proveedor->DIRECCION}}" name="DIRECCION" id="direccion" 
                  minlength="7" maxlength="250"
                  placeholder="Agregue una dirección" style="font-size:11px; text-align:center" 
                  value="" required="" pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ'.#,+-/ ]+">
                  <div class="valid-feedback">¡Válido!</div>
                  <div class="invalid-feedback">Complete el campo.</div>
                  </div>

                  <div class="col-md-6 mb-4p">
                  </br><label for="correo" class="col-form-label">CORREO:</label>
                  <input type="email" class="form-control" value="{{$proveedor->CORREO}}" name="CORREO" id="correo" 
                  minlength="15" maxlength="50"
                  placeholder="Ejemplo@dominio.com" style="font-size:14px; text-align:center" required="">
                  <div class="valid-feedback">¡Válido!</div>
                  </br> <div class="invalid-feedback">Verifique el correo y complete el campo.</div> 
                  </div>      
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
                  <div class="col-md-6 mb-4p">
                  <label for="telefono" class="col-form-label">TÉLEFONO:</label>
                  <input type="tel" class="form-control" value="{{$proveedor->NUM_TELEFONO}}" name= "NUM_EMPRESA" id="celular" required="" pattern="[0-9]{4}-[0-9]{4}"
                  placeholder="Agregue un número" style="font-size:11px; text-align:center" minlength="9" maxlength="9"/>
                  <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx</span>
                  <div class="valid-feedback" >¡Válido!</div>
                  <div class="invalid-feedback">Verifique el número y complete el campo.</div>
                  </div>  

</div>

              <div class="modal-footer">
                  <button class="btn btn-primary custom" style="font-size:14px; text-align:center;" type="submit">GUARDAR</button>
                  <button type="button" class="btn btn-secondary custom"  style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>

              </div>
            </form>  
          </div>
          </form>    
          </div>
      </div>
  </div>  

<!--FIN EDITAR PROVEEDOR--> 


<!--ELIMINAR PROVEEDOR-->
          <form method="post" action="{{url('/admin/proveedor/eliminarproveedor/'.$proveedor->COD_PROVEEDOR)}}" class="d-inline formulario-eliminar">
          {{csrf_field()}}
          {{method_field('DELETE')}}
@can('/admin/proveedor/eliminarproveedor/')
           <button class="btn btn-danger text-center" type="submit"><i class="far fa-trash-alt"></i></button>  
@endcan
          </form>
          </div>
            </td>
    
<!--ELIMINAR PROVEEDOR-->      

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
                    columns: [ 0, 1, 2, 3, 4, 5]
                },
                filename: 'EXCEL REPORTE PROVEEDORES',
                messageTop: 'Dirección: Barrio el Edén (14.078591, -87.225581) - Teléfono: +504 9445-5962',
                titleAttr: 'EXPORTAR A EXCEL',
                className: 'btn btn-success',
            },
            {
                text: 'Custom PDF',
                extend: 'pdfHtml5', 
                filename: 'PDF REPORTE PROVEEDORES',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-pdf"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5]
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
                doc.pageMargins = [ 240, 30, 240, 30 ]; },
                
            
            },
          
        
        
        ]

        });
} );  

</script>
@stop




