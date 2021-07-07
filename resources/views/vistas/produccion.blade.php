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
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Administrar Producción</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE MATERIAL-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/PD7g5pz/Icono-Carpinteria-2021.png">
</div>
  
  </div>
</div>
  
  <!-- Boton para abrir el modal -->
@can('/admin/produccion/insertarproduccion')
  <div class="col-lg-12">            
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
    <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#myModal">
    <i class="fas fa-plus"></i> AGREGAR PEDIDO</button>   
    </div>    
    </div> 
@endcan

  <!-- El Modal -->
  <div class="modal fade bd-example-modal-lg" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

      <form action="{{url('/admin/produccion/insertarproduccion')}}" method="POST">
            {{csrf_field()}}

        <!-- Modal Header -->
        <div class="modal-header bg-success  text-white">
          <h4 class="modal-title0"  style="text-transform:uppercase; font-size:20px;" >AGREGAR PEDIDO</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
      
          
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">        
      <div class="col-md-6 mb-4p">
        <label for="start">Fecha del pedido:</label></br>
        <input class="form-control text-center"   type="date" id="start" name="FECHA_ORDEN"
        min="2018-01-01" max="2050-12-31" required="">
      </div>

 
      <div class="col-md-6 mb-4p">
          <label for="Producto">Producto:</label>     
          <select name="COD_PRODUCTO_INVENTARIO" ID="COD_PRODUCTO_INVENTARIO" class="form-control text-center text-uppercase"  
          style="font-size:11px; text-align-last:center" 
          value="" maxlength="100" minlength="1" type="text" >
          @foreach($LproductoIes as $LproductoI)
          <option value="{{$LproductoI->COD_PRODUCTO_INVENTARIO}}">{{$LproductoI->NOMBRE_PRODUCTO}}</option>
          @endforeach
        </select>
      </div> 
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;"> 
  
     <div class="col-md-6 mb-4p">
     </br><label for="apellido" class="form-label">Cantidad del material:</label>
    <input name="CANTIDAD_MATERIAL" type="apellido" class="form-control text-uppercase" id="apellido" 
    minlength="1" maxlength="5"
    required=""  pattern="[0-9]+"
    aria-describedby="apellido" 
    placeholder="Agrega cantidad del material que solicita"  style="font-size:11px; text-align:center" >
    </div>

    <div class="col-md-6 mb-4p">
    </br><label for="MedidaMaterial">Medida del material:</label>     
      <select name="COD_MEDIDA_MATERIAL_ORDEN" ID="COD_MEDIDA_MATERIAL" class="form-control text-center text-uppercase"  
      style="font-size:11px; text-align-last:center" 
      value="" maxlength="100" minlength="1" type="text" >
      @foreach($medidas as $medida)
      <option value="{{$medida->COD_MEDIDA_MATERIAL}}">{{$medida->NOMBRE_MEDIDA}}</option>
      @endforeach
    </select>
  </div> 

</div>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;"> 

        <div class="col-md-6 mb-4p">
        </br><label for="Material">Material:</label>     
          <select name="COD_MATERIAL_ORDEN" ID="COD_MATERIAL" class="form-control text-center text-uppercase"  
          style="font-size:11px; text-align-last:center" 
          value="" maxlength="100" minlength="1" type="text" >
          @foreach($Lmateriales as $Lmaterial)
          <option value="{{$Lmaterial->COD_MATERIAL}}">{{$Lmaterial->NOMBRE_MATERIAL}}</option>
          @endforeach
        </select>
      </div> 

        <div class="col-md-6 mb-4p">
        </br><label for="text" class="form-label">Cantidad de Piezas:</label>
         <input name="CANTIDAD_PIEZA" type="text" class="form-control text-uppercase" id="telefono" 
         minlength="1" maxlength="5"
          required=""  pattern="[0-9]+"
         aria-describedby="telefono" 
         placeholder="Agrega para cuantas piezas solicita el material" style="font-size:11px; text-align-last:center" >
       </div>


 </div>
 
 <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;"> 

      <div class="col-md-12 mb-4p">
      </br><label for="text" class="form-label">Descripción de la piezas:</label>
      <textarea name="DESCRIPCION" class="form-control text-uppercase" rows="2" id="telefono" 
      minlength="3" maxlength="100" 
      required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ0-9 '#_%$*+&]+"
      aria-describedby="telefono"
      placeholder="Agrega nombre de las piezas por la que se hace el pedido" style="font-size:11px; text-align:center"></textarea>
      </div>
  </div>
  </br>
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary custom"  style="font-size:14px; text-align:center;">GUARDAR</button>
          <button type="button" class="btn btn-secondary custom"  style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>

        </div>
        
        </form>
      </div>
    </div>
  </div>
  
</div>

</br>
<!-- FIN Modal -->


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
                    <th scope="col">FECHA</th>
                    <th scope="col">PRODUCTO</th>
                    <th scope="col">CANTIDAD</th>
                    <th scope="col">MEDIDA</th>
                    <th scope="col">MATERIAL</th>
                    <th scope="col">CANTIDAD_PIEZAS</th>
                    <th scope="col">DESCRIPCIÓN DE PIEZAS</th>
                    <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($producciones as $produccion)
                     <tr class="text-uppercase" style="font-size:13px;">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$produccion->FECHA_ORDEN}}</td>
                    <td>{{$produccion->NOMBRE_PRODUCTO}}</td>
                    <td>{{$produccion->CANTIDAD_MATERIAL}}</td>
                    <td>{{$produccion->NOMBRE_MEDIDA}}</td>
                    <td>{{$produccion->NOMBRE_MATERIAL}}</td>
                    <td>{{$produccion->CANTIDAD_PIEZA}}</td>
                    <td>{{$produccion->DESCRIPCION_PIEZAS}}</td>
       <td>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">



     <!-- EDITAR PRODUCCION --> 
     @can('/admin/produccion/actualizarproduccion/')
    <button type="button" class="btn btn-warning"><i class="far fa-edit" data-toggle="modal" data-target="#editModal{{$produccion->ORDEN_PRODUCCION}}"  ></i> </button>
@endcan

  <!-- El Modal -->
  <div class="modal fade bd-example-modal-lg" id="editModal{{$produccion->ORDEN_PRODUCCION}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

<form action="{{url('/admin/produccion/actualizarproduccion/' .$produccion->ORDEN_PRODUCCION)}}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}

      
        <!-- Modal Header -->
        <div class="modal-header bg-warning  text-white">
          <h4 class="modal-title0"  style="text-transform:uppercase; font-size:20px;" >EDITAR PEDIDO</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
      
          
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">     
      <div class="col-md-6 mb-4p">
        <label for="start">Fecha del pedido:</label></br>
        <input class="form-control text-center"  value="{{$produccion->FECHA_ORDEN}}"  type="date" id="start"  name="FECHA_ORDEN"
        min="2018-01-01" max="2050-12-31" required="">
      </div>


 
      <div class="col-md-6 mb-4p">
          <label for="Producto">Producto:</label>     
          <select name="COD_PRODUCTO_INVENTARIO" ID="COD_PRODUCTO_INVENTARIO" class="form-control text-center text-uppercase"  
          style="font-size:11px; text-align-last:center" 
          value="{{$produccion->NOMBRE_PRODUCTO}}" maxlength="100" minlength="1" type="text" >
          @foreach($LproductoIes as $LproductoI)
          <option value="{{$LproductoI->COD_PRODUCTO_INVENTARIO}}">{{$LproductoI->NOMBRE_PRODUCTO}}</option>
          @endforeach
        </select>
      </div> 
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">  
  
    <div class="col-md-6 mb-4p">
    </br><label for="apellido" class="form-label">Cantidad del material:</label>
    <input name="CANTIDAD_MATERIAL" value="{{$produccion->CANTIDAD_MATERIAL}}" type="apellido" class="form-control text-uppercase" id="apellido" 
    minlength="1" maxlength="5"
    required=""  pattern="[0-9]+" aria-describedby="apellido" 
    placeholder="Agrega cantidad del material que solicita"  style="font-size:11px; text-align:center" >
    </div>

    <div class="col-md-6 mb-4p">
    </br><label for="MedidaMaterial">Medida del material:</label>     
      <select name="COD_MEDIDA_MATERIAL_ORDEN" ID="COD_MEDIDA_MATERIAL" class="form-control text-center text-uppercase"  
      style="font-size:11px; text-align-last:center" 
      value="{{$produccion->NOMBRE_MEDIDA}}" maxlength="100" minlength="1" type="text" >
      @foreach($medidas as $medida)
      <option value="{{$medida->COD_MEDIDA_MATERIAL}}">{{$medida->NOMBRE_MEDIDA}}</option>
      @endforeach
    </select>
  </div> 

</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;"> 

        <div class="col-md-6 mb-4p">
        </br><label for="Material">Material:</label>     
          <select name="COD_MATERIAL_ORDEN" ID="COD_MATERIAL" class="form-control text-center text-uppercase"  
          style="font-size:11px; text-align-last:center" 
          value="{{$produccion->NOMBRE_MATERIAL}}" maxlength="100" minlength="1" type="text" >
          @foreach($Lmateriales as $Lmaterial)
          <option value="{{$Lmaterial->COD_MATERIAL}}">{{$Lmaterial->NOMBRE_MATERIAL}}</option>
          @endforeach
        </select>
      </div> 

        <div class="col-md-6 mb-4p">
        </br><label for="text" class="form-label">Cantidad de Piezas:</label>
         <input name="CANTIDAD_PIEZA"  value="{{$produccion->CANTIDAD_PIEZA}}" type="text" class="form-control text-uppercase" id="telefono" 
         minlength="1" maxlength="5"
        required=""  pattern="[0-9]+" aria-describedby="telefono" 
         placeholder="Agrega para cuantas piezas solicita el material" style="font-size:11px; text-align:center" >
       </div>


 </div>
 
 <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;"> 

      <div class="col-md-12 mb-4p">
      </br><label for="text" class="form-label">Descripción de la piezas:</label>
      <input name="DESCRIPCION" value="{{$produccion->DESCRIPCION_PIEZAS}}" class="form-control text-uppercase" rows="2" id="telefono" 
      minlength="3" maxlength="200" 
      required="" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ0-9 '#_%$*+&]+"
      aria-describedby="telefono"
      placeholder="Agrega nombre de las piezas por la que se hace el pedido" style="font-size:11px; text-align:center"></input>
      </div>
  </div>

        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary custom" style="font-size:14px; text-align:center;">GUARDAR</button>
          <button type="button" class="btn btn-secondary custom" style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>

        </div>
        
      </div>
    </div>
  </div>
</div>
</form>


          <!-- FIN EDITAR PRODUCCION -->   
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
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                },
                titleAttr: 'COPIAR INFORMACIÓN',
                className: 'btn btn-info'
                
            },
            {
                extend: 'excelHtml5',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-excel"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                },
                filename: 'EXCEL REPORTE PRODUCCIÓN',
                messageTop: 'Dirección: Barrio el Edén (14.078591, -87.225581) - Teléfono: +504 9445-5962',
                titleAttr: 'EXPORTAR A EXCEL',
                className: 'btn btn-success',
            },
            {
                text: 'Custom PDF',
                extend: 'pdfHtml5', 
                filename: 'PDF REPORTE PRODUCCIÓN',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-pdf"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
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
                doc.pageMargins = [ 140, 30, 140, 30 ]; },
                
            
            },
          
        
        
        ]

        });
} );  

</script>
@stop




