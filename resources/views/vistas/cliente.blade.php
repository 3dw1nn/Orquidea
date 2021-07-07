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
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Administración de Clientes</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE CLIENTES-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:180px; " src="https://i.ibb.co/xqWXkYG/Co-mo-atraer-clientes-en-8-pasos-02.png">
</div>
  
  </div>
</div>
 
 
<!--Inicio Modal-->

@can('/admin/cliente/insertarcliente')
        <div class="col-lg-12">            
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal">
        <i class="fas fa-plus" ></i> AGREGAR CLIENTE</button> 
        </div> </br>
@endcan

<div class="modal fade bd-example-modal-lg" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

<form action="{{url('/admin/cliente/insertarcliente')}}" method="POST">
            {{csrf_field()}}


        <!--Modal header-->
        
            <div class="modal-header bg-success  text-white">
                <h5 class="modal-title" id="exampleModalLabel"  style="text-transform:uppercase; font-size:20px;"> 
                  Agregar Cliente </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>


 <!--Formulario Cliente-->

        <form id="formClientes" class="needs-validation" novalidate>    
            <div class="modal-body">
              <div class="container">
                
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
                <div class="col-md-6 mb-4p">
                <Span class = "red"> * </span>
                <label for="primernombre" class="col-form-label"> Primer nombre:</label>
                <input type="text" name="PRIMER_NOMBRE" class="form-control text-uppercase" minlength="3" 
                placeholder="Agrega primer nombre" style="font-size:11px; text-align:center"
                pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" maxlength="35" id="nombres" required>
                <div class="invalid-feedback">Complete el campo</div>
                </div>
                
                <div class="col-md-6 mb-4p">
                <label for="segundonombre" class="col-form-label text-uppercase">Segundo nombre:</label>
                <input type="text"  name="SEGUNDO_NOMBRE" class="form-control text-uppercase" 
                placeholder="Agrega segundo nombre" style="font-size:11px; text-align:center"
                minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" maxlength="35" id="apellidos">
                <div class="invalid-feedback">Complete el campo</div>
                </div>
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
              <div class="col-md-6 mb-4p ">
              </br> <Span class = "red"> * </span><label for="primerapellido" class="col-form-label"> Primer apellido:</label>
                  <input type="text"  name="PRIMER_APELLIDO" class="form-control text-uppercase" 
                  placeholder="Agrega primer apellido" style="font-size:11px; text-align:center" 
                  minlength="4" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" maxlength="35" id="apellidos" required>
                  <div class="invalid-feedback">Complete el campo</div>
                </div>

              <div class="col-md-6 mb-4p">
              </br> <label for="segundoapellido" class="col-form-label"> Segundo apellido:</label>
                  <input type="text"  name="SEGUNDO_APELLIDO" class="form-control text-uppercase" 
                  placeholder="Agrega segundo apellido" style="font-size:11px; text-align:center"
                  minlength="4" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" maxlength="35" id="apellidos">
                  <div class="invalid-feedback">Complete el campo</div>
                </div>
</div>
</br>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">

        <div class="col-md-6 mb-4"> 
        <Span class = "red"> * </span>
          <label for="NUM_ID">N° Identidad: </label>
          <input name="NUM_ID"  type="tel" class="form-control text-uppercase" id="NUM_ID"  pattern="[0-9]{4}-[0-9]{4}-[0-9]{5}" 
          placeholder="Agrega número de identidad" style="font-size:11px; text-align:center; height: 38px;" 
          minlength="15" maxlength="15" required=""/>
          <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx-xxxxx </span>
          <div class="valid-feedback" >¡Campo opcional!</div>
          <div class="invalid-feedback">Verifique el número y complete el campo.</div>   
      </div>


       <div class="col-md-6 mb-4"> 
       <Span class = "red"> * </span>
          <label for="RTN">N° RTN: </label>
          <input name="RTN"  type="tel" class="form-control text-uppercase" id="RTN"  pattern="[0-9]{4}-[0-9]{4}-[0-9]{6}" 
          placeholder="Agrega número RTN" style="font-size:11px; text-align:center; height: 38px;" 
          minlength="16" maxlength="16" required=""/>
          <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx-xxxxxx </span>
          <div class="valid-feedback" >¡Campo opcional!</div>
          <div class="invalid-feedback">Verifique el número y complete el campo.</div>   
      </div>

    </div>



  <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
                <div class="col-md-6 mb-4">
                <Span class = "red"> * </span>
                <label for="Generos">Género:</label></br>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
                  <label class="btn btn-success" style="font-size:14px; text-align:center">
                    <input type="radio" name="COD_GENERO"   id="masculino" value="1" autocomplete="off" required=""> Masculino
                  </label>
                  <label class="btn btn-success"  style="font-size:14px; text-align:center"> 
                    <input type="radio" name="COD_GENERO" id="femenino" value="2"  autocomplete="off" required=""> Femenino
                  </label>
                  <label class="btn btn-success"  style="font-size:14px; text-align:center">
                    <input type="radio"  name="COD_GENERO" id="otro" value="3"  autocomplete="off" required="">Otro 
                  </label> 
                </div>
              </div>


              <div class="col-md-6 mb-4">
              <Span class = "red"> * </span>
              <label for="COD_TIPO_PERSONA">Tipo persona:</label></br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
                <label class="btn btn-success"   style="font-size:14px; text-align:center">
                  <input type="radio" name="COD_TIPO_PERSONA" id="natural" value="1" autocomplete="off" required=""> Natural
                </label>
                <label class="btn btn-success"   style="font-size:14px; text-align:center">
                  <input type="radio"  name="COD_TIPO_PERSONA" id="juridico"  value="2"  autocomplete="off" required=""> Juridico
                </label>
              </div>
            </div>
                
            
</div>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
                <div class="col-md-6 mb-4p">
                <Span class = "red"> * </span>
                <label for="Ciudad" class="col-form-label">Ciudad:</label>
                  <input type="text" class="form-control text-uppercase" name="CIUDAD" pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ'.#,+-/ ]+" 
                  id="direccion" required
                  placeholder="Agrega una ciudad" style="font-size:11px; text-align:center">
                  
                  <div class="invalid-feedback"> complete el campo</div>
                </div>

                <div class="col-md-6 mb-4p">
                <Span class = "red"> * </span>
                <label for="direccion" class="col-form-label">Dirección:</label>
                <input type="text" class="form-control text-uppercase" name="DIRECCION"
                 pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ'.# ]+" id="direccion" required
                 minlength="5" maxlength="250"
                placeholder="Agrega una dirección" style="font-size:11px; text-align:center">
                <div class="invalid-feedback"> complete el campo</div>
                </div>
 </div>
 
 <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">              
                <div class="col-md-6 mb-4p">
                </br> <Span class = "red"> * </span><label for="correo" class="col-form-label">Correo:</label>
                <input type="email" class="form-control text-uppercase" name="CORREO" minlength="15" maxlength="35" id="Correo" required
                placeholder="Agrega un correo" style="font-size:11px; text-align:center">
                <div class="invalid-feedback">Complete el campo</div>
                </div> 

 
                  <div class="col-md-6 mb-4p"> 
                  
                  </br><span class = "red"> * </span><label for="telefono">Teléfono:</label>
                    <input name="NUM_CLIENTE"   type="tel" class="form-control text-uppercase" id="NUM_CLIENTE"  
                    pattern="[0-9]{4}-[0-9]{4}" 
                    placeholder="Número de contacto en caso de emergencia" style="font-size:11px; text-align:center; height: 38px;" 
                    minlength="9" maxlength="9" required=""/>
                    <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx </span>
                    <div class="valid-feedback" >¡Campo opcional!</div>
                    <div class="invalid-feedback">Verifique el número y complete el campo.</div>   
                  </div>   
</div>           
            <div class="modal-footer">
            <button class="btn btn-primary custom" style="font-size:14px; text-align:center;" type="submit">GUARDAR</button> 
              <button type="button" class="btn btn-secondary custom" style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>
              </div>
            </div>             
            </div>
            </form>    
            </div>
        </div>
    </div>


<!--BUSCAR PRODUCTO 
<div class="col-lg-12">
<div class="d-grid gap-2 d-md-flex justify-content-md-rigth">
@can('/pdfcliente')
<a href="{{route('descargarPDFcliente')}}" class="btn btn btn-success"  style="margin-left: 410px; ">DESCARGAR PDF</a>
@endcan
</div>
</div>
FIN BUSCAR PRODUCTO 
</br>
-->


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
                            <th scope="col">GÉNERO</th>
                            <th scope="col">CIUDAD</th>
                            <th scope="col">DIRECCIÓN</th>
                            <th scope="col">TELÉFONO</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($clientes as $cliente)
                     <tr style="text-transform:uppercase; font-size:13px;">
                        
      <td>{{$loop->iteration}}</td>
      <td>{{$cliente->PRIMER_NOMBRE}}</td>
      <td>{{$cliente->PRIMER_APELLIDO}}</td>
      <td>{{$cliente->GENERO}}</td>
      <td>{{$cliente->CIUDAD}}</td>
      <td>{{$cliente->DIRECCION}}</td>
      <td>{{$cliente->NUM_TELEFONO}}</td>
       <td>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">

 <!--DETALLE DE CLIENTE-->
    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#detailModal{{$cliente->COD_PERSONA}}" ><i class="far fa-file-alt"></i></button>

  <div class="modal fade" id="detailModal{{$cliente->COD_PERSONA}}" tabindex="-1" role="dialog" aria-labelledby="tituloVentana2" aria-hidden="true"> 
  <div class="modal-dialog" role="document">      
  <div class="modal-content">
        <div class="modal-header bg-info text-white">
            <h5 id="tituloVentana2">MAS DETALLES DEL CLIENTE</h5>
            <button class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
  </br>
  </br>

 <div class="col-sm-12">
<div class="card border-info mb-3">
  <div class="card-body">
    <h6 class="card-title">INFORMACIÓN GENERAL DEL CLIENTE</h6>
              <p class="card-text">
              <label for="NOMBRE" class="col-form-label">NOMBRE:<option>  {{$cliente->PRIMER_NOMBRE}} {{$cliente->SEGUNDO_NOMBRE}} {{$cliente->PRIMER_APELLIDO}} {{$cliente->SEGUNDO_APELLIDO}}</option></label>
              </br>
              <label for="NUM_ID" class="col-form-label">N° IDENTIDAD:<option> {{$cliente->NUM_ID}}</option></label>
              </br>
              <label for="RTN" class="col-form-label">RTN:<option> {{$cliente->RTN}}</option></label>
              </br>
              <label for="NOMBRE_TIPO" class="col-form-label">TIPO DE PERSONA:<option> {{$cliente->NOMBRE_TIPO}}</option></label>
              </br>
              <label for="NOMBRE_GENERO" class="col-form-label">GÉNERO:<option> {{$cliente->NOMBRE_GENERO}}</option></label>
              </br>
              <label for="DIRECCION" class="col-form-label">DIRECCIÓN:<option> {{$cliente->CIUDAD}}, {{$cliente->DIRECCION}}</option></label>
              </br>
              <label for="CORREO" class="col-form-label">CORREO:<option> {{$cliente->CORREO}}</option></label>
              </br>
              <label for="TELEFONO" class="col-form-label">TELÉFONO:<option> {{$cliente->NUM_TELEFONO}}</option></label>
                </p>
  </div>
</div>
</div>
 </div>
</div>
</div>

<!--FIN DETALLE DE CLIENTE-->


<!--EDITARCLIENTE-->
 @can('/admin/cliente/actualizarcliente/')    
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$cliente->COD_PERSONA}}"  ><i class="far fa-edit"></i></button>
@endcan

<div class="modal fade bd-example-modal-lg" id="editModal{{$cliente->COD_PERSONA}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

  <form action="{{url('/admin/cliente/actualizarcliente/' . $cliente->COD_PERSONA)}}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}

        <!--Modal header-->
            <div class="modal-header bg-warning  text-white">
                <h5 class="modal-title" id="exampleModalLabel"  style="text-transform:uppercase; font-size:20px;"> 
                  Editar Cliente </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

 <!--Formulario Cliente-->

        <form id="formClientes" class="needs-validation" novalidate>    
            <div class="modal-body">
              <div class="container">
                
              <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
                <div class="col-md-6 mb-4p">
                <Span class = "red"> * </span>
                <label for="primernombre" class="col-form-label"> Primer nombre:</label>
                <input type="text" value="{{$cliente->PRIMER_NOMBRE}}" name="PRIMER_NOMBRE" class="form-control text-uppercase" minlength="3" 
                placeholder="Agrega primer nombre" style="font-size:11px; text-align:center"
                pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" maxlength="35" id="nombres" required>
                <div class="invalid-feedback">Complete el campo</div>
                </div>
                
                <div class="col-md-6 mb-4p">
                <label for="segundonombre" class="col-form-label">Segundo nombre:</label>
                <input type="text" value="{{$cliente->SEGUNDO_NOMBRE}}" name="SEGUNDO_NOMBRE" class="form-control text-uppercase" 
                placeholder="Agrega segundo nombre" style="font-size:11px; text-align:center"
                minlength="3" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" maxlength="35" id="apellidos">
                <div class="invalid-feedback">Complete el campo</div>
                </div>
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
              <div class="col-md-6 mb-4p">
              </br><Span class = "red"> * </span><label for="primerapellido" class="col-form-label"> Primer apellido:</label>
                  <input type="text" value="{{$cliente->PRIMER_APELLIDO}}"  name="PRIMER_APELLIDO" class="form-control text-uppercase" 
                  placeholder="Agrega primer apellido" style="font-size:11px; text-align:center" 
                  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" minlength="3" maxlength="35" id="apellidos" required>
                  <div class="invalid-feedback">Complete el campo</div>
                </div>

              <div class="col-md-6 mb-4p">
              </br><label for="segundoapellido" class="col-form-label"> Segundo apellido:</label>
                  <input type="text"  value="{{$cliente->SEGUNDO_APELLIDO}}" name="SEGUNDO_APELLIDO" class="form-control text-uppercase" 
                  placeholder="Agrega segundo apellido" style="font-size:11px; text-align:center"
                  minlength="4" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" maxlength="35" id="apellidos">
                  <div class="invalid-feedback">Complete el campo</div>
                </div>
</div>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">

        <div class="col-md-6 mb-4"> 
        </br><Span class = "red"> * </span><label for="NUM_ID">N° Identidad: </label>
          <input name="NUM_ID" value="{{$cliente->NUM_ID}}" type="tel" class="form-control text-uppercase" id="NUM_ID"  pattern="[0-9]{4}-[0-9]{4}-[0-9]{5}" 
          placeholder="Agrega número de identidad" style="font-size:11px; text-align:center; height: 38px;" minlength="15" maxlength="15" required=""/>
          <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx-xxxxx </span>
          <div class="valid-feedback" >¡Campo opcional!</div>
          <div class="invalid-feedback">Verifique el número y complete el campo.</div>   
      </div>


       <div class="col-md-6 mb-4"> 
       </br><Span class = "red"> * </span><label for="RTN">N° RTN: </label>
          <input name="RTN" value="{{$cliente->RTN}}"   type="tel" class="form-control text-uppercase" id="RTN"  pattern="[0-9]{4}-[0-9]{4}-[0-9]{6}" 
          placeholder="Agrega número de identidad" style="font-size:11px; text-align:center; height: 38px;" minlength="16" maxlength="16" required=""/>
          <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx-xxxxxx </span>
          <div class="valid-feedback" >¡Campo opcional!</div>
          <div class="invalid-feedback">Verifique el número y complete el campo.</div>   
      </div>

    </div>

    <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
                <div class="col-md-6 mb-4">
                
                </br><Span class = "red"> * </span><label for="Generos">Género:</label></br>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
                  <label class="btn btn-warning " style="font-size:14px; text-align:center">
                    <input type="radio" name="COD_GENERO" id="masculino" value="1" autocomplete="off" required=""> Masculino
                  </label>
                  <label class="btn btn-warning " style="font-size:14px; text-align:center">
                    <input type="radio" name="COD_GENERO" id="femenino" value="2"  autocomplete="off" required=""> Femenino
                  </label>
                  <label class="btn btn-warning " style="font-size:14px; text-align:center"> 
                    <input type="radio"  name="COD_GENERO" id="otro" value="3"  autocomplete="off" required="">Otro 
                  </label> 
                </div>
              </div>

              
              <div class="col-md-6 mb-4">
              </br><Span class = "red"> * </span><label for="COD_TIPO_PERSONA">Tipo persona:</label></br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
                <label class="btn btn-warning " style="font-size:14px; text-align:center">
                  <input type="radio" name="COD_TIPO_PERSONA" id="natural" value="1" autocomplete="off" required=""> Natural
                </label>
                <label class="btn btn-warning " style="font-size:14px; text-align:center">
                  <input type="radio"  name="COD_TIPO_PERSONA" id="juridico"  value="2"  autocomplete="off" required=""> Juridico
                </label>
              </div>
            </div>
                
            
</div>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
                <div class="col-md-6 mb-4p">
                <Span class = "red"> * </span>
                <label for="Ciudad" class="col-form-label">Ciudad:</label>
                  <input type="text" class="form-control text-uppercase" value="{{$cliente->CIUDAD}}" name="CIUDAD" 
                  pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ'.# /*-.!$%&]+" id="direccion" required
                  placeholder="Agrega una ciudad" style="font-size:11px; text-align:center">
                  
                  <div class="invalid-feedback"> complete el campo</div>
                </div>

                <div class="col-md-6 mb-4p">
                <Span class = "red"> * </span>
                <label for="direccion" class="col-form-label">Dirección:</label>
                <input type="text" class="form-control text-uppercase" value="{{$cliente->DIRECCION}}" name="DIRECCION" 
                pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ'.# /*-.!$%& ]+" id="direccion" required
                minlength="5" maxlength="250"
                placeholder="Agrega una dirección" style="font-size:11px; text-align:center">
                <div class="invalid-feedback"> complete el campo</div>
                </div>
 </div>
 
 <div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">            
                <div class="col-md-6 mb-4p">
                </br><Span class = "red"> * </span><label for="correo" class="col-form-label">Correo:</label>
                <input type="email" class="form-control" value="{{$cliente->CORREO}}" name="CORREO" minlength="15" maxlength="35" id="Correo" required
                placeholder="Agrega un correo" style="font-size:14px; text-align:center">
                <div class="invalid-feedback">Complete el campo</div>
                </div> 
                

                <div class="col-md-6 mb-4p">
                </br><Span class = "red"> * </span><label for="telefono" class="col-form-label">Teléfono:</label>
                <input type="tel" class="form-control text-uppercase" value="{{$cliente->NUM_TELEFONO}}" name="NUM_CLIENTE" id="telefono" minlength="9" maxlength="9" 
                placeholder="Agrega un número de teléfono" style="font-size:11px; text-align:center"
                pattern="[0-9]{4}-[0-9]{4}" required >
                <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx </span>
                <div class="invalid-feedback">Complete el campo</div>
                </div>
</div>
                


            
            <div class="modal-footer">
            <button class="btn btn-primary custom" style="font-size:14px; text-align:center;" type="submit">GUARDAR</button> 
              <button type="button" class="btn btn-secondary custom" style="font-size:14px; text-align:center;" data-dismiss="modal">CERRAR</button>


              </div>
            </div>             
            </div>
            </form>    
            </div>
        </div>
    </div>

 <!--FIN EDITARCLIENTE-->
   

<!--ELIMINAR CLIENTE-->
      <form method="post" action="{{url('/admin/cliente/eliminarcliente/'.$cliente->COD_PERSONA)}}" class="d-inline formulario-eliminar">
      {{csrf_field()}}
      {{method_field('DELETE')}}
       
 @can('/admin/cliente/eliminarcliente/')      
       <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>  
 @endcan           
            
            </form>
<!--FIN ELIMINAR CLIENTE-->
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
                filename: 'EXCEL REPORTE CLIENTES',
                messageTop: 'Dirección: Barrio el Edén (14.078591, -87.225581) - Teléfono: +504 9445-5962', 
                titleAttr: 'EXPORTAR A EXCEL',
                className: 'btn btn-success',
            },
            {
                text: 'Custom PDF',
                extend: 'pdfHtml5', 
                filename: 'PDF REPORTE CLIENTES',
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
                doc.pageMargins = [ 150, 30, 150, 30 ]; },
                
            
            },
          
        
        
        ]

        });
} );  

</script>
@stop




