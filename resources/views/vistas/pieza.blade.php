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
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Administración de Piezas</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE PIEZAS DE PRODUCTOS-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:110px; " src="https://i.ibb.co/T0YYLYW/124324.png">
</div>
  
  </div>
</div>

@can('/admin/pieza/insertarpieza')
  <!-- Button to Open the Modal -->
   <div class="d-grid gap-2 d-md-flex justify-content-md-center">
  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal">
  <i class="fas fa-plus"></i> AGREGAR PIEZA
  </button>
  </div>
@endcan
</br>

<main class="container">

  <!-- The Modal -->
  <div class="modal fade bd-example-modal-lg" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
<form action="{{url('/admin/pieza/insertarpieza')}}" method="POST" enctype="multipart/form-data"  >
            {{csrf_field()}}

      <!-- Modal Header -->
        <div class="modal-header bg-success  text-white ">
          <h4 class="modal-title"  
          style="text-transform:uppercase; font-size:20px; ">AGREGAR PIEZA</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
      
        <!-- Modal body -->

        
        
        <div class="card-body">
          <form  class="needs-validation" novalidate > 

        <div class="form-group">
             <!-- Modal  -->

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">    
        <div class="col-md-6 mb-4p">
            <label for="Producto">Producto:</label>     
            <select name="COD_PRODUCTO_INVENTARIO" ID="COD_PRODUCTO_INVENTARIO" class="form-control text-uppercase"  
            style="font-size:11px; text-align:center" 
            value="" maxlength="100" minlength="1" type="text" >
            @foreach($productos as $producto)
            <option value="{{$producto->COD_PRODUCTO_INVENTARIO}}">{{$producto->NOMBRE_PRODUCTO}}</option>
            @endforeach
          </select>
        </div> 
          


        <div class="col-md-6 mb-4p">
              <label for="pieza">Nombre de pieza:</label>
              <input name="NOMBRE_PIEZA"  type="text" class="form-control text-uppercase" id="pieza" minlength="5" maxlength="35" 
              placeholder="Ingresa nombre de pieza" 
              style="font-size:11px; text-align:center"  
              value="" required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ0-9 ',.#/]+" type="pieza">
              <div class="valid-feedback">¡Ok válido!</div>
              <div class="invalid-feedback">Complete el campo.</div>  
        </div>
</div> 


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">    


      <div class="col-md-6 mb-4p">
    </br><label for="descripcion">Descripción:</label>
      <input class="form-control text-uppercase" name="DESCRIPCION_PIEZA" minlength="7"   maxlength="100"  id="comment" 
      placeholder="Ingresa descripción de la pieza producto" style="font-size:11px; text-align:center" 
       value="" required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ0-9 ',.#/]+">
      <div class="valid-feedback">¡Ok válido!</div>
      <div class="invalid-feedback">Complete el campo.</div>  
      </div>
      
      
      <div class="col-md-6 mb-4p">
      </br>  <label for="FOTO_PIEZA"> Foto </label>
      <input type="file"  class="form-control text-uppercase" name="FOTO_PIEZA" accept="image/gif, image/jpeg, image/png"
      style="font-size:11px; text-align:center" />
   </div>
  
  </div>    
     
  </form>

  </br>      
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary custom " style="font-size:14px; text-align:center;">GUARDAR</button>
          <button type="button" class="btn btn-secondary custom" style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>


        </div>
        
      </div>
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
      <th scope="col">NOMBRE DE PIEZA</th>
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">FOTO ACCIONES</th>
      <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($piezas as $pieza)
       <tr  class="text-uppercase" style="font-size:13px;">
      <td>{{$loop->iteration}}</td>
      <td>{{$pieza->NOMBRE_PIEZA}}</td>
      <td>{{$pieza->DESCRIPCION}}</td>
       <td><img src="{{asset('storage').'/'.$pieza->FOTO}}" alt="" width="150"></td>
       <td>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">



@can('/admin/pieza/actualizarpieza/')
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$pieza->COD_PIEZA_PRODUCTO}}"> <i class="fas fa-edit"></i></button>
@endcan
<!-- MODAL EDITAR PRODUCTO -->

<!-- The Modal -->
  <div class="modal fade bd-example-modal-lg" id="editModal{{$pieza->COD_PIEZA_PRODUCTO}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
<form action="{{url('/admin/pieza/actualizarpieza/' .$pieza->COD_PIEZA_PRODUCTO)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}

      <!-- Modal Header -->
        <div class="modal-header bg-warning text-white ">
          <h4 class="modal-title"  
          style="text-transform:uppercase; font-size:20px; ">EDITAR PIEZA</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
      
        <!-- Modal body -->

        
        
        <div class="card-body">
          <form  class="needs-validation" novalidate > 

        <div class="form-group">
             <!-- Modal  -->

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">    
        <div class="col-md-6 mb-4p">
            <label for="Producto">Producto</label>     
            <select name="COD_PRODUCTO_INVENTARIO" ID="COD_PRODUCTO_INVENTARIO" class="form-control text-uppercase"  
            style="font-size:11px; text-align:center" 
            value="" maxlength="100" minlength="1" type="text" >
            @foreach($productos as $producto)
            <option value="{{$producto->COD_PRODUCTO_INVENTARIO}}">{{$producto->NOMBRE_PRODUCTO}}</option>
            @endforeach
          </select>
        </div> 
          
 

        <div class="col-md-6 mb-4p">
              <label for="pieza">Nombre de pieza:</label>
              <input name="NOMBRE_PIEZA"  type="text" class="form-control text-uppercase" id="pieza" minlength="5" maxlength="35"  
              style="font-size:11px; text-align:center"  
              value="{{$pieza->NOMBRE_PIEZA}}" required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ0-9 ',.#/]+"type="pieza">
              <div class="valid-feedback">¡Ok válido!</div>
              <div class="invalid-feedback">Complete el campo.</div>  
        </div>
</div> 


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">   

    <div class="col-md-6 mb-4p">
    </br><label for="descripcion">Descripción:</label>
      <input class="form-control text-uppercase" name="DESCRIPCION_PIEZA" minlength="7" maxlength="100"  id="comment" 
      style="font-size:11px; text-align:center" 
       value="{{$pieza->DESCRIPCION}}" required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ0-9 ',.#/]+"></input>
      <div class="valid-feedback">¡Ok válido!</div>
      <div class="invalid-feedback">Complete el campo.</div>  
    </div>

    <div class="col-md-6 mb-4p">
      </br>  <label for="FOTO_PIEZA"> Foto </label>
      <input type="file"  class="form-control text-uppercase" 
      value="{{$pieza->FOTO}}" type="file" name="FOTO_PIEZA" accept="image/gif, image/jpeg, image/png"
      style="font-size:11px; text-align:center"/>
   </div>
 </div>   
     
  </form>            


  </br> 
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary custom">GUARDAR</button>
          <button type="button" class="btn btn-secondary custom" data-dismiss="modal">CERRAR</button>

        </div>
        
      </div>
    </div>
    </div>
    </div>
    </div>

 <!-- FIN MODAL EDITAR PRODUCTO -->   

       <form method="post" action="{{url('/admin/pieza/eliminarpieza/'.$pieza->COD_PIEZA_PRODUCTO)}}" class="d-inline formulario-eliminar">
            {{csrf_field()}}
            {{method_field('DELETE')}}
@can('/admin/pieza/eliminarpieza/')
             <button class="btn btn-danger" type="submit" ><i class="far fa-trash-alt"></i></button>  
@endcan     
      </form>
      </div>

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
                    columns: [ 0, 1, 2 ]
                },
                titleAttr: 'COPIAR INFORMACIÓN',
                className: 'btn btn-info'
                
            },
            {
                extend: 'excelHtml5',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-excel"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2]
                },
                filename: 'EXCEL REPORTE DE PIEZAS PRODUCTOS',
                messageTop: 'Dirección: Barrio el Edén  (14.078591, -87.225581)  -  Teléfono: +504 9445-5962',
                titleAttr: 'EXPORTAR A EXCEL',
                className: 'btn btn-success',
            },
            {
                text: 'Custom PDF',
                extend: 'pdfHtml5', 
                filename: 'PDF REPORTE DE PIEZAS PRODUCTOS',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-pdf"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                },
                
                titleAttr: 'EXPORTAR A PDF',
                messageTop: 'Dirección: Barrio el Edén                         (14.078591, -87.225581)                                               Teléfono: +504 9445-5962',
                pageSize: 'A4',
                orientation:'landscape',
                className: 'btn btn-danger',
                //MARGEN PARA CENTRAR LAS TABLAS
                customize: function(doc) {
                  
              //pageMargins [left, top, right, bottom] 
                doc.pageMargins = [ 310, 30, 310, 30 ]; },
                
            
            },
          
        
        
        ]

        });
} );  

</script>
@stop




