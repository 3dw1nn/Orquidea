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



<main class="container">

<div class="card">
  <div class="card-body">
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Administraci??n de Productos</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE PRODUCTOS-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/yhVnhHY/furniture-store.png">
</div>
  
  </div>
</div>



  <!-- MODAL AGREGAR PRODUCTO -->
@can('/admin/inventario/insertarinventario')
  <div class="col-lg-12">            
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
    <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#myModal">
    <i class="fas fa-plus"></i>  AGREGAR PRODUCTO</button>   
    </div>    
    </div> 
@endcan   
</br>

  <!-- The Modal -->
  <div class="modal fade bd-example-modal-lg" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      

      <form action="{{url('/admin/inventario/insertarinventario')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}


      <!-- Modal Header -->
        
        
        <div class="modal-header bg-success  text-white">
        <h4 class="modal-title"   style="text-transform:uppercase; font-size:20px; ">
          Registro de Inventario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
      
       
        
        <div class="card-body">
        <form  class="needs-validation" novalidate > 
     
 <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">    
     <div class="col-md-6 mb-4p">
                  <label for="NOMBRE_PRODUCTO" class="col-form-label">Nombre del Producto:</label>
                    <textarea type="text" class="form-control text-uppercase" rows="2" name= "NOMBRE_PRODUCTO" 
                    minlength="4" maxlength="100" 
                    placeholder="Ingresa nombre del producto"
                    required="" pattern="[a-zA-Z????????????????????????????0-9 ',.#/]+"
                    style="font-size:11px; text-align:center" ></textarea>
                    <div class="valid-feedback">??V??lido!</div>
                    <div class="invalid-feedback">Complete el campo.</div>
    </div>


      <div class="col-md-6 mb-4p">
        <label for="descripcion" class="col-form-label" >Descripci??n del producto:</label>
        <textarea type="text" class="form-control text-uppercase" rows="2"  name="DESCRIPCION_PRODUCTO" minlength="5" maxlength="100" 
        placeholder="Ingresa descripci??n del producto"
        required="" pattern="[a-zA-Z????????????????????????????0-9 ',.#/]+"
        style="font-size:11px; text-align:center" ></textarea>
        <div class="valid-feedback">??Ok v??lido!</div>
        <div class="invalid-feedback">Complete el campo.</div>  
      </div>
</div>

 
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">    
  <div class="col-md-6 mb-4p">
  </br> <label for="precio">Precio del Producto:</label>
      <input type="text" name="PRECIO_PRODUCTO"  class="form-control text-uppercase" id="precio" minlength="3" maxlength="10"
      placeholder="Ingresa precio del producto" 
      required="" pattern="[0-9']+"  style="font-size:11px; text-align:center" >
    </div>


    <div class="col-md-6 mb-4p">
    </br>  <label for="FOTO_PRODUCTO">Foto:</label> 
      <input type="file"  class="form-control text-uppercase" name="FOTO_PRODUCTO" accept="image/gif, image/jpeg, image/png"  
      style="font-size:11px; text-align:center" />
      <div class="valid-feedback">??Ok v??lido!</div>
      <div class="invalid-feedback">Complete el campo.</div> 
   </div>
</div>   



</br>
    <div class="modal-footer">
    <button type="submit" class="btn btn-primary" style="font-size:14px; text-align:center;">GUARDAR</button>
    <button type="button" class="btn btn-secondary" style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>
    </div>
    </div>
  </form>
  </div>  
        </div>
      </div>
 <!--FIN MODAL AGREGAR PRODUCTO -->


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
      <th width="100px" scope="col">DESCRIPCI??N</th>
      <th scope="col">PRECIO</th>
      <th scope="col">FOTO</th>
      <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($inventarios as $inventario)
       <tr class="text-uppercase" style="font-size:13px;">
      
      <td>{{$loop->iteration}}</td>
      <td>{{$inventario->NOMBRE_PRODUCTO}}</td>
      <td width="100px" >{{$inventario->DESCRIPCION}}</td>
      <td>{{$inventario->PRECIO_PRODUCTO}}</td>
      <td><img src="{{asset('storage/'. $inventario->FOTO) }}" alt="" width="100"></td>
      
       <td>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">


@can('/admin/inventario/actualizarinventario/')
    <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#editModal{{$inventario->COD_PRODUCTO_INVENTARIO}}"><i class="far fa-edit"></i> </button>
@endcan


<!-- MODAL EDITAR PRODUCTO -->
  

  <!-- The Modal -->
  <div class="modal fade bd-example-modal-lg" id="editModal{{$inventario->COD_PRODUCTO_INVENTARIO}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      

       <form form method="post" action="{{url('/admin/inventario/actualizarinventario/' .$inventario->COD_PRODUCTO_INVENTARIO )}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}

      <!-- Modal Header -->
        
        <div class="modal-header bg-warning text-white">
        <h4 class="modal-title"   style="text-transform:uppercase; font-size:20px; ">
          Editar Inventario</h4>
          
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
      
        <div class="card-body">
        <form  class="needs-validation" novalidate > 
     

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">    
     <div class="col-md-6 mb-4p">
                  <label for="NOMBRE_PRODUCTO" class="col-form-label">Nombre del Producto:</label>
                    <input type="text" class="form-control  text-uppercase" rows="2" 
                    name= "NOMBRE_PRODUCTO" value="{{$inventario->NOMBRE_PRODUCTO}}"   maxlength="100"          
                    required="" pattern="[a-zA-Z????????????????????????????0-9 ',.#/]+"
                    style="font-size:11px; text-align:center" ></input>
                    <div class="valid-feedback">??V??lido!</div>
                    <div class="invalid-feedback">Complete el campo.</div>
    </div>


      <div class="col-md-6 mb-4p">
        <label for="descripcion" class="col-form-label" >Descripci??n del producto:</label>
        <input type="text" class="form-control  text-uppercase" rows="2" value="{{$inventario->DESCRIPCION}}" 
        name="DESCRIPCION_PRODUCTO" maxlength="100" 
        required="" pattern="[a-zA-Z????????????????????????????0-9 ',.#/]+"
        style="font-size:11px; text-align:center" ></input>
        <div class="valid-feedback">??Ok v??lido!</div>
        <div class="invalid-feedback">Complete el campo.</div>  
      </div>
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">    
  <div class="col-md-6 mb-4p">
  </br> <label for="precio">Precio del Producto:</label>
      <input type="text" value="{{$inventario->PRECIO_PRODUCTO}}" name="PRECIO_PRODUCTO"  
      class="form-control  text-uppercase" id="precio" maxlength="10"
      required="" pattern="[0-9']+"  style="font-size:11px; text-align:center" >
    </div>


    <div class="col-md-6 mb-4p">
    </br>  <label for="FOTO_PRODUCTO">Foto:</label> <br/>
      <input type="file"  class="form-control  text-uppercase" value="{{$inventario->FOTO}}" 
      name="FOTO_PRODUCTO" accept="image/gif, image/jpeg, image/png"  
      style="font-size:11px; text-align:center" />
      <div class="valid-feedback">??Ok v??lido!</div>
      <div class="invalid-feedback">Complete el campo.</div> 
   </div>
</div>   


</br>

    <div class="modal-footer">
         
    <button type="submit" class="btn btn-primary custom" style="font-size:14px; text-align:center;">GUARDAR</button>
    <button type="button" class="btn btn-secondary custom" style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>
    

    </form>
    </div>
    </div>
   
  </form>
  </div>  
        </div>
      </div>
      
 <!--FIN MODAL EDITAR PRODUCTO -->



    <form method="post" action="{{url('/admin/inventario/eliminarinventario/'.$inventario->COD_PRODUCTO_INVENTARIO)}}" class="d-inline formulario-eliminar">
            {{csrf_field()}}
            {{method_field('DELETE')}}
@can('/admin/inventario/eliminarinventario/')
             <button class="btn btn-danger"  type="submit" ><i class="far fa-trash-alt"></i></button>  
@endcan
      </form>

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
                <h4 class="modal-title">Crear Categor??a</h4>
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
        title: '??Est??s Seguro?',
        text: "Estos Registros se eliminar??n definitivamente",
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
                    columns: [ 0, 1, 2, 3]
                },
                titleAttr: 'COPIAR INFORMACI??N',
                className: 'btn btn-info'
                
            },
            {
                extend: 'excelHtml5',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-excel"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3]
                },
                filename: 'EXCEL REPORTE PRODUCTOS',
                messageTop: 'Direcci??n: Barrio el Ed??n             (14.078591, -87.225581)                                    Tel??fono: +504 9445-5962',
                titleAttr: 'EXPORTAR A EXCEL',
                className: 'btn btn-success',
            },
            {
                text: 'Custom PDF',
                extend: 'pdfHtml5', 
                filename: 'PDF REPORTE PRODUCTOS',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-pdf"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                },
                
                titleAttr: 'EXPORTAR A PDF',
                messageTop: 'Direcci??n: Barrio el Ed??n             (14.078591, -87.225581)                                    Tel??fono: +504 9445-5962', 
                pageSize: 'A4',
                orientation:'landscape',
                className: 'btn btn-danger',
                //MARGEN PARA CENTRAR LAS TABLAS
                customize: function(doc) {
                  
              //pageMargins [left, top, right, bottom] 
                doc.pageMargins = [ 330, 30, 330, 30 ]; },
                
            
            },
          
        
        
        ]

        });
} );  

</script>
@stop




