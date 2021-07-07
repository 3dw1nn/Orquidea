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
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Lista de Materiales</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE MATERIAL-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/JdPjVmb/hammer.png">
</div>
  
  </div>
</div>


  <!-- Button to Open the Modal -->
@can('/admin/material/insertarmaterial')
  <div class="col-lg-12">            
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
    <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#myModal">
    <i class="fas fa-plus"></i> AGREGAR MATERIAL</button>   
    </div>    
    </div> 
    </br>   
@endcan


<main class="container">

  <!-- The Modal -->
  <div class="modal fade bd-example-modal-lg" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
<form action="{{url('/admin/material/insertarmaterial')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

      <!-- Modal Header -->
        <div class="modal-header bg-success  text-white">
          <h4 class="modal-title" style="text-transform:uppercase; font-size:20px; ">AGREGAR MATERIAL</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
      
        <!-- Modal body -->

        
        
        <div class="card-body">
          <form  class="needs-validation" novalidate > 

 
             <!-- Modal  -->

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;"> 
     <div class="col-md-6 mb-4p">
     <Span class = "red"> * </span>
       <label for="NOMBRE_MATERIAL" class="col-form-label ">Nombre del Material:</label>
          <input type="text" class="form-control text-uppercase" name= "NOMBRE_MATERIAL" id="categoria" minlength="3" maxlength="50"
          placeholder="Agrega el nombre del Material" style="font-size:11px; text-align:center" 
          value="" required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ0-9 ',.#/]+">  
          <div class="valid-feedback">¡Válido!</div>
          <div class="invalid-feedback">Complete el campo.</div>
    
    </div>


    <div class="col-md-6 mb-4p">
          <label for="Foto" class="col-form-label ">Foto:</label> 
          <input type="file" class="form-control text-uppercase" 
           name="FOTO_MATERIAL" accept="image/gif, image/jpeg, image/png"
          style="font-size:11px; text-align:center"/>
    </div>
 
    <div class="col-md-12 mb-4p">
    
        </br><Span class = "red"> * </span><label for="DESCRIPCION_MATERIAL">Descripción:</label>
          <input type="text" class="form-control text-uppercase" name="DESCRIPCION_MATERIAL"  minlength="5" maxlength="100" 
          id="comment" placeholder="Agrega una descripción para el material"
          style="font-size:12px; text-align:center" 
          value="" required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ0-9 ',.#/]+" />
          <div class="valid-feedback">¡Ok válido!</div>
          <div class="invalid-feedback">Complete el campo.</div>  
      </div>


  </div>
     


  </br>   
        <!-- Modal footer -->
        <div class="modal-footer">
           <button type="submit" class="btn btn-primary custom" style="font-size:14px; text-align:center;">GUARDAR</button>
          <button type="button" class="btn btn-secondary custom" style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>

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
                      <th scope="col">NOMBRE DE MATERIAL</th>
                      <th scope="col">DESCRIPCIÓN</th>
                      <th scope="col">FOTO</th>
                      <th scope="col">ACCIONES</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($materiales as $material)
                 <tr class="text-uppercase" style="font-size:13px;">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$material->NOMBRE_MATERIAL}}</td>
                    <td>{{$material->DESCRIPCION}}</td>
                    <td><img src="{{asset('storage/'. $material->FOTO) }}" alt="" width="100"></td>
       <td>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">



 <!-- ACTUALIZAR MATERIAL --> 
 @can('/admin/material/actualizarmaterial/')    
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$material->COD_MATERIAL}}" > <i class="fas fa-edit"></i></button>
@endcan

 <!-- The Modal -->
  <div class="modal fade bd-example-modal-lg" id="editModal{{$material->COD_MATERIAL}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
<form action="{{url('/admin/material/actualizarmaterial/' .$material->COD_MATERIAL)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}

      <!-- Modal Header -->
        <div class="modal-header bg-warning text-white">
          <h4 class="modal-title" style="text-transform:uppercase; font-size:20px; ">EDITAR MATERIAL</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
      
        <!-- Modal body -->

         
        
        <div class="card-body">
          <form  class="needs-validation" novalidate > 

 
             <!-- Modal  -->


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;"> 
     <div class="col-md-6 mb-4p">
     <Span class = "red"> * </span>
           <label for="NOMBRE_MATERIAL" class="col-form-label">Nombre de Material:</label>
           <input type="text" class="form-control text-uppercase" value=" {{$material->NOMBRE_MATERIAL}}" 
           name= "NOMBRE_MATERIAL" id="categoria" minlength="3" maxlength="50"
           placeholder="Agrega nombre del Material" style="font-size:11px; text-align:center" 
          required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ0-9 ',.#/]+">  
          <div class="valid-feedback">¡Válido!</div>
          <div class="invalid-feedback">Complete el campo.</div>
    </div>

       <div class="col-md-6 mb-4p">
          <label for="Foto" class="col-form-label ">Foto:</label> 
          <input type="file" class="form-control text-uppercase" type="file" 
          value=" {{$material->FOTO}}" name="FOTO_MATERIAL" accept="image/gif, image/jpeg, image/png"
          style="font-size:11px; text-align:center"/>
        </div>

       
        <div class="col-md-12 mb-4p">
        
        </br> <Span class = "red"> * </span><label for="DESCRIPCION_MATERIAL">Descripción:</label>
            <input class="form-control text-uppercase" name="DESCRIPCION_MATERIAL"  minlength="5" maxlength="100"  id="comment" 
            placeholder="agrega una descripción para el material"
            value=" {{$material->DESCRIPCION}}" required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ0-9 ',.#/]+"
            style="font-size:11px; text-align:center" ></input>
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback">Complete el campo.</div>  
      </div>
  </div>
     
  </br> 
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary custom" style="font-size:14px; text-align:center;">GUARDAR</button>
          <button type="button" class="btn btn-secondary custom" style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>
        </div>

      </form>        
      </div>
    </form>  
    </div>
    </div>
    </div>






<!-- ACTUALIZAR MATERIAL --> 

<!-- ELIMINAR MATERIAL -->
       <form method="post" action="{{url('/admin/material/eliminarmaterial/'.$material->COD_MATERIAL)}}" class="d-inline formulario-eliminar">
            {{csrf_field()}}
            {{method_field('DELETE')}}
@can('/admin/material/eliminarmaterial/')
             <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>  
@endcan
      </form>
      </div>
 <!-- FIN ELIMINAR MATERIAL -->      

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
                text: '<i class="fas fa-copy"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2]
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
                filename: 'EXCEL REPORTES MATERIALES',
                messageTop: 'Dirección: Barrio el Edén  (14.078591, -87.225581)  -  Teléfono: +504 9445-5962',
                titleAttr: 'EXPORTAR A EXCEL',
                className: 'btn btn-success',
            },
            {
                text: 'Custom PDF',
                extend: 'pdfHtml5', 
                filename: 'PDF REPORTES MATERIALES',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-pdf"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2]
                },
                
                titleAttr: 'EXPORTAR A PDF',
                messageTop: 'Dirección: Barrio el Edén                                       (14.078591, -87.225581)                                    Teléfono: +504 9445-5962',
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




