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

.orderby {
    text-align-last: center;
    padding: 9px;
    width:400px;
    border-radius: 1px;
    border: 1px solid #ddd;
    font-weight: 600;
    color: #868585;
    font-size: 16px;
}
  </style>



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
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Administración de Materiales</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE MATERIAL-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:85px; " src="https://i.ibb.co/5xzCY4N/iconos-web-revision.png">
</div>
  
  </div>
</div>

  <!-- Button to Open the Modal -->

@can('/admin/almacen/insertaralmacen')
<div class="col-lg-12">            
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
    <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#myModal">
    <i class="fas fa-plus"></i>  AGREGAR AL ALMACÉN</button>   
    </div>    
</div> 
</br>
@endcan
  


  <!-- The Modal -->
  <div class="modal fade bd-example-modal-lg" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

     
<form action="{{url('/admin/almacen/insertaralmacen')}}" method="POST">
            {{csrf_field()}}



      <!-- Modal Header -->
      
        <div class="modal-header bg-success  text-white ">
          <h4 class="modal-title" style="text-transform:uppercase; font-size:20px;" >AGREGAR AL ALMACÉN</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      
         <!-- Modal body -->

         <div class="card-body">
          <form  class="needs-validation" novalidate > 
       

 
        <!-- Datos a ingresar en modal-->    


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">  

              <div class="col-md-12 mb-4p">
              </br><label for="Proveedor">Proveedor:</label>     
                <select name="COD_PROVEEDOR" ID="COD_PROVEEDOR" class="form-control"  
                style="font-size:12px; text-align-last: center;" 
                value="" maxlength="100" minlength="1" type="text" >
                @foreach($Lproveedores as $Lproveedor)
                <option value="{{$Lproveedor->COD_PROVEEDOR}}">{{$Lproveedor->NOMBRE_EMPRESA}}</option>
                @endforeach
              </select>
            </div> 
        
</div>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">  

 <div class="col-md-6 mb-4p">
            </br><label for="Material">Material:</label>     
              <select name="COD_MATERIAL" ID="COD_MATERIAL" class="form-control text-uppercase"  
              style="font-size:11px; text-align-last: center;" 
              value="" maxlength="100" minlength="1" type="text" >
              @foreach($Lmateriales as $Lmaterial)
              <option value="{{$Lmaterial->COD_MATERIAL}}">{{$Lmaterial->NOMBRE_MATERIAL}}</option>
              @endforeach
            </select>
          </div> 

                              
  <div class="col-md-6 mb-4p">
  </br><label for="MedidaMaterial">Medida del material:</label>     
    <select name="COD_MEDIDA_MATERIAL" ID="COD_MEDIDA_MATERIAL" class="form-control text-uppercase"  
    style="font-size:11px; text-align-last: center;" 
    value="" maxlength="100" minlength="1" type="text" >
    @foreach($medidas as $medida)
    <option value="{{$medida->COD_MEDIDA_MATERIAL}}">{{$medida->NOMBRE_MEDIDA}}</option>
    @endforeach
  </select>
</div> 
    

    
</div>    
    
    
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">  
        <div class="col-md-6 mb-4"> 
    </br><label for="precio">Precio de compra:</label>
      <input name="PRECIO"  type="text" class="form-control text-uppercase" 
      id="compra" minlength="2" maxlength="30" placeholder="agrega precio de compra" 
      value="" required="" pattern=^[0-9]+([.][0-9]+)?$ type="compra" style="font-size:11px; text-align:center">
      <div class="valid-feedback">¡Ok válido!</div>
      <div class="invalid-feedback">Complete el campo.</div> 
    </div>

        <div class="col-md-6 mb-4p">
        </br> <label for="entr">Entrada de material:</label>
          <input name ="ENTRADA"  type="text" class="form-control text-uppercase" id="entrada" minlength="1" maxlength="40" 
          placeholder="agrega cantidad del material que entró" style="font-size:11px; text-align:center"
          value="" required="" pattern="[0-9]+" type="entrada">
          <div class="valid-feedback">¡Ok válido!</div>
          <div class="invalid-feedback">Complete el campo.</div> 
        </div>
   
  
        
      </div> 


        
   
        
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
                    <th scope="col">MATERIAL</th>
                    <th scope="col">MEDIDA DE MATERIAL</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">ENTRADA</th>
                    <th scope="col">SALIDA</th>
                    <th scope="col">EXISTENCIA</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($almacenes as $almacen)
       <tr class="text-uppercase" style="font-size:13px;">
       
      <td>{{$loop->iteration}}</td>
      <td>{{$almacen->NOMBRE_MATERIAL}}</td>
      <td>{{$almacen->NOMBRE_MEDIDA}}</td>
      <td>{{$almacen->PRECIO}}</td>
      <td>{{$almacen->ENTRADA}}</td>
      <td>{{$almacen->SALIDA}}</td>
      <td>{{$almacen->EXISTENCIA}}</td>
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


 <!-- Funcion para validar campos -->
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
  </script>


<!-- Estilo para validar numero-->
<style>
input:invalid + span:after {
content: '✘';
color: #f00;
padding-left: 4px;
}
input:valid + span:after {
content: '✔';
color: #26b72b;
padding-left: 4px;
}
</style>

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
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                },
                titleAttr: 'COPIAR INFORMACIÓN',
                className: 'btn btn-info'
                
            },
            {
                extend: 'excelHtml5',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-excel"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                },
                filename: 'EXCEL REPORTE ALMACEN',
                titleAttr: 'EXPORTAR A EXCEL',
                className: 'btn btn-success',
            },
            {
                text: 'Custom PDF',
                extend: 'pdfHtml5', 
                filename: 'PDF REPORTE ALMACEN',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-pdf"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
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




