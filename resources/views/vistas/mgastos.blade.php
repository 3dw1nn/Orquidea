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
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Gastos</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE CLIENTES-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/xqRY63t/2273264.png">
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

	<!-- Main container -->
	<main class="full-box main-container">
		
    <!--========================================-->


			<div class="container">
				<ul class="full-box list-unstyled page-nav-tabs">
				<div class="col-lg-12"> 
				@can('admin/catalogo/insertarcgasto')           
					<div class="d-grid gap-2 d-md-flex justify-content-md-center">
					<button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#myModal2">
					<i class="fas fa-plus"></i> AGREGAR GASTO</button>   
					</div>  
					@endcan  
				</div> 

					


					<!-- The Modal -->
                <div class="modal" id="myModal2">
                <div class="modal-dialog">
             <div class="modal-content">
      
                   <!-- Modal Header -->
               <div class="modal-header bg-success  text-white">
                <h5 class="modal-title">AGREGAR GASTO</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
              </div>

  <form action="{{url('/admin/catalogo/insertarcgasto')}}" method="POST">
            {{csrf_field()}}
      
         <!-- Modal body -->

         <div class="card-body">
			 
		 <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center;">

		    <div class="col-md-12 mb-4">
				<label for="gasto">Nombre del gasto:</label>
				<input name="NOMBRE_GASTO"  type="text" class="form-control text-uppercase" id="gasto" minlength="4" maxlength="30" 
				value="" 
				placeholder="Agrega nombre del gasto" 
				style="font-size:11px; text-align:center; height: 38px;" 
				required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" type="gasto">
				<div class="valid-feedback">¡Ok válido!</div>
				<div class="invalid-feedback">Complete el campo.</div> 
			  </div>
			  </div>
			  <!-- Modal footer -->
			  <div class="modal-footer">
			  <button type="submit" class="btn btn-primary custom" style="font-size:14px; text-align:center;">GUARDAR</button>
				<button type="button" class="btn btn-secondary custom" style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>
			  </div>
		
	
		  </div>
		  
		</form>
	  </div>
				</ul>	
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
								<th>NOMBRE DEL GASTO</th>
								<th width="10px">ACTUALIZAR</th>
								<th width="10px">ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($gastos as $gasto)
							<tr class="text-uppercase text-center" style="font-size:13px;" >
								<td>{{$loop->iteration}}</td>
								<td>{{$gasto->NOMBRE_GASTO}}</td>
       <td>

<!-- Modal editar -->
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
									@can('/admin/catalogo/actualizarcgasto/')
									<a  class="btn btn-warning accion" type="button" data-toggle="modal" data-target="#updateModal{{$gasto->COD_TIPO_GASTO}}"> <i class="far fa-edit"></i></a>
									@endcan
									</div>
		<!-- The Modal -->
       <div class="modal" id="updateModal{{$gasto->COD_TIPO_GASTO}}">
      <div class="modal-dialog">
      <div class="modal-content">
      
      <!-- Modal Header -->

		<div class="modal-header bg-success  text-white">
          <h5 class="modal-title">EDITAR GASTO</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>

		</div>

    
         <!-- Modal body -->
		<form action="{{url('/admin/catalogo/actualizarcgasto/' .$gasto->COD_TIPO_GASTO)}}" method="POST">
            {{csrf_field()}}
			{{method_field('PUT')}}


         <div class="card-body">

			 <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center;">
				 <div class="col-md-12 mb-4">
				<label for="gasto">Nombre del gasto:</label>
				<input name="NOMBRE_GASTO"  type="text" class="form-control text-uppercase" id="compra" minlength="4"  maxlength="30" 
				value="{{$gasto->NOMBRE_GASTO}}" 	placeholder="Agrega nombre del gasto" 
				style="font-size:11px; text-align:center; height: 38px;" 
				required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" type="gasto">
				<div class="valid-feedback">¡Ok válido!</div>
				<div class="invalid-feedback">Complete el campo.</div>  
				</div>
			  </div>


			 
		</form>
			  
			  <!-- Modal footer -->

			  <div class="modal-footer">
			  <button type="submit" class="btn btn-primary custom" style="font-size:14px; text-align:center;">GUARDAR</button>
				<button type="button" class="btn btn-secondary custom" style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>
			  </div>
		
	<!--FIN Modal editar -->							


								</td>
								<td>
									<div class="d-grid gap-2 d-md-flex justify-content-md-center">
										<form method="post" action="{{url('/admin/catalogo/eliminarcgasto/'.$gasto->COD_TIPO_GASTO)}}" class="d-inline formulario-eliminar">
            							{{csrf_field()}}
            							{{method_field('DELETE')}}

						@can('/admin/catalogo/eliminarcgasto/')
								<button type="submit" class="btn btn-danger" >
								<i class="far fa-trash-alt"></i></button>  
						@endcan
									</div>
											</form>
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

        
        "lengthMenu": [ 2, 5, 10, 15, 20 ],
        "footer": true,
        dom: 'Bfltrip',
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
                filename: 'EXCEL_TABLA_CLIENTES',
                titleAttr: 'EXPORTAR A EXCEL',
                className: 'btn btn-success',
            },
            {
                text: 'Custom PDF',
                extend: 'pdfHtml5', 
                filename: 'PDF_TABLA_CLIENTES',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-pdf"></i>',
                exportOptions: {
                    columns: [ 0, 1 ]
                },
                
                titleAttr: 'EXPORTAR A PDF',
                messageTop: 'Tabla de clientes',
                pageSize: 'A4',
                orientation:'landscape',
                className: 'btn btn-danger',
                //MARGEN PARA CENTRAR LAS TABLAS
                customize: function(doc) {
              //pageMargins [left, top, right, bottom] 
                doc.pageMargins = [ 120, 30, 120, 30 ]; },
                
            
            },
          
        
        
        ]

        });
} );  

</script>
@stop




