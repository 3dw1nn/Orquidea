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
<main class="container">

<div class="card">
  <div class="card-body">
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Administración de Empleados</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE EMPLEADO-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/dBtcZHt/404-4042037-100-contributors-illustration-clipart.png">
</div>
  
  </div>
</div>


<!-- BOTONES AGREGAR, MODAL-->
@can('/admin/empleado/insertarempleado')
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
    <button class="btn btn-outline-success " data-toggle="modal" data-target="#ventanaModal"> <i class="fas fa-plus"></i> AGREGAR EMPLEADO </button> 
    </div>
@endcan
  </br>  
    

<!-- MODAL, FORMULARIO OARA AGREGAR EMPLEADO -->    


<div class="modal fade bd-example-modal-lg" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true"> 
<div class="modal-dialog modal-lg" role="document">      
<div class="modal-content">



        <div class="modal-header bg-success text-white ">

            <h5 id="tituloVentana">AGREGAR EMPLEADO</h5>
            <button class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>


<!-- VALIDAR FORMULARIO, MODAL-->
       <form action="{{url('/admin/empleado/insertarempleado')}}" method="POST">
            {{csrf_field()}}
        
         
<div class="card-body" >
 

<!-- IMAGEN PARA PANTALLA DE EMPLEADO, MODAL-->
        <div class="col-md-12 mb-2 text-center ">
          <img style="width:80px; " src="https://i.ibb.co/dBtcZHt/404-4042037-100-contributors-illustration-clipart.png">
        </div>

<!-- INFORMACIÓN EMPLEADO, MODAL-->
      <div class="form-row text-center " >
          <div class="col-md-11 mb-4">
          <label for="EMERGENCIA" style="text-transform:uppercase; font-size:18px; font-weight:500;  ">
            "INFORMACIÓN GENERAL DEL EMPLEADO"</label>
           </div>
      </div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
          <div class="col-md-6 mb-4">
                <Span class = "red"> * </span>
                <label for="PRIMER_NOMBRE" >Primer nombre:</label>
                <input name="PRIMER_NOMBRE" type="text" class="form-control text-uppercase" id="PRIMER_NOMBRE" minlength="3" maxlength="20"
                placeholder="Agrega primer nombre" style="font-size:11px; text-align:center; height: 38px;" value="" required=""
                pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
                <div class="valid-feedback">¡Ok válido!</div>
                <div class="invalid-feedback">Complete el campo.</div>    
          </div>
    
          <div class="col-md-6 mb-4 ">
                <label for="SEGUNDO_NOMBRE" >Segundo nombre:</label>
                <input name="SEGUNDO_NOMBRE" type="text" class="form-control text-uppercase" id="SEGUNDO_NOMBRE" minlength="3" maxlength="20"
                placeholder="Agrega segundo nombre" style="font-size:11px; text-align:center; height: 38px;" value="" 
                pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
                <div class="valid-feedback">¡Campo opcional!</div>
                <div class="invalid-feedback">Complete el campo.</div>    
          </div>                
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">

      <div class="col-md-6 mb-4">
                <Span class = "red"> * </span>
                <label for="PRIMER_APELLIDO">Primer apellido:</label> 
                <input name="PRIMER_APELLIDO" type="text" class="form-control text-uppercase" id="PRIMER_APELLIDO" minlength="3"  maxlength="20"
                placeholder="Agrega primer apellido" style="font-size:11px; text-align:center; height: 38px; " value="" required="" 
                pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
                <div class="valid-feedback">¡Ok válido!</div>
                <div class="invalid-feedback">Complete el campo.</div>   
      </div>
    
      <div class="col-md-6 mb-4">
                <label for="SEGUNDO_APELLIDO">Segundo apellido:</label> 
                <input name="SEGUNDO_APELLIDO" type="text" class="form-control text-uppercase" id="SEGUNDO_APELLIDO" minlength="3"  maxlength="20"
                placeholder="Agrega segundo apellido" style="font-size:11px; text-align:center; height: 38px;" value=""  
                pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
                <div class="valid-feedback">¡Campo opcional!</div>
                <div class="invalid-feedback">Complete el campo.</div>   
      </div>
</div>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
          <div class="col-md-4 mb-4">
          <Span class = "red"> * </span>
          <label for="Generos">Género:</label></br>
            <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
            <label class="btn btn-success" style="font-size:14px; text-align:center">
              <input type="radio" name="COD_GENERO" id="masculino" value="1" autocomplete="off" required=""> Hombre
            </label>
            <label class="btn btn-success" style="font-size:14px; text-align:center">
              <input type="radio" name="COD_GENERO" id="femenino" value="2"  autocomplete="off" required=""> Mujer
            </label>
            <label class="btn btn-success" style="font-size:14px; text-align:center">
              <input type="radio"  name="COD_GENERO" id="otro" value="3"  autocomplete="off" required="">Otro 
            </label> 
          </div>
        </div>


        <div class="col-md-4 mb-4">
          <Span class = "red"> * </span>
            <label for="COD_TIPO_PERSONA">Tipo persona:</label></br>
          <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
          <label class="btn btn-success" style="font-size:14px; text-align:center">
            <input type="radio" name="COD_TIPO_PERSONA" id="natural" value="1" autocomplete="off" required=""> Natural
          </label>
          <label class="btn btn-success" style="font-size:14px; text-align:center">
            <input type="radio"  name="COD_TIPO_PERSONA" id="juridico"  value="2"  autocomplete="off" required=""> Juridico
          </label>
        </div>
        </div>

        <div class="col-md-4 mb-4">
        <Span class = "red"> * </span>
          <label for="COD_ESTADO_CIVIL">Estado civil:</label></br>
        <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
        <label class="btn btn-success" style="font-size:14px; text-align:center">
          <input type="radio" name="COD_ESTADO_CIVIL" id="casado" value="1" autocomplete="off" required=""> Casado(a)
        </label>
        <label class="btn btn-success" style="font-size:14px; text-align:center">
          <input type="radio"  name="COD_ESTADO_CIVIL" id="soltero"  value="2"  autocomplete="off" required=""> Soltero(a)
        </label>

        </div>
        </div>
  

</div>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
          <div class="col-md-4 mb-4p">
          <Span class = "red"> * </span>
            <label for="Producto">Puesto:</label>     
            <select name="COD_PUESTO" ID="COD_PUESTO" class="form-control text-uppercase text-center"  
            style="font-size:11px; text-align:center; height: 38px; " 
            value="" maxlength="100" minlength="1" type="text" required="">
            @foreach($puestos as $puesto)
            <option value="{{$puesto->COD_PUESTO}}">{{$puesto->PUESTO}} </option>
            @endforeach
          </select>
        </div> 


        <div class="col-md-4 mb-4">
                <Span class = "red"> * </span>
                <label for="start">Fecha de contrato:</label></br>
                <input class="form-control text-center"   type="date" id="start" name="FECHA_CONTRATO"
                min="2015-01-01" max="2050-12-31" required="">
                <div class="valid-feedback">¡Ok válido!</div>
                <div class="invalid-feedback">Complete el campo.</div>   
        </div>
      
                  <div class="col-md-4 mb-4">
                  <label for="start">Fecha de despido:</label></br>
                  <input class="form-control text-center"   type="date" id="start" name="FECHA_SALIDA"
                  min="2015-01-01" max="2050-12-31"  readonly="true">
                  <div class="valid-feedback">¡Ok válido!</div>
                  <div class="invalid-feedback">Complete el campo.</div>   
        </div>
    
 
</div>




<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">

        <div class="col-md-4 mb-8"> 
          <Span class = "red"> * </span>
          <label for="NUM_ID">N° Identidad:</label>
          <input name="NUM_ID"  type="tel" class="form-control text-uppercase" id="NUM_ID"  pattern="[0-9]{4}-[0-9]{4}-[0-9]{5}" 
          placeholder="Agrega número de identidad" style="font-size:11px; text-align:center; height: 38px;" minlength="15" maxlength="15" required=""/>
          <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx-xxxxx </span>
          <div class="valid-feedback" >¡Campo opcional!</div>
          <div class="invalid-feedback">Verifique el número y complete el campo.</div>   
      </div></br>


      <div class="col-md-4 mb-4">
        <Span class = "red"> * </span>
        <label for="CORREO">Correo:</label>
        <input name="CORREO" type="email" class="form-control" id="CORREO" minlength="15" maxlength="50"
        placeholder="ejemplo@dominio.com" style="font-size:12px; text-align:center; height: 38px;" required="">
        <div class="valid-feedback">¡Campo opcional!</div>
        <div class="invalid-feedback">Verifique el correo y complete el campo.</div>   
    </div>
    
    <div class="col-md-4 mb-4"> 
      <Span class = "red"> * </span>
      <label for="NUM_PERSONAL">Télefono empleado:</label>
      <input name="NUM_PERSONAL"  type="tel" class="form-control text-uppercase" id="NUM_PERSONAL"  pattern="[0-9]{4}-[0-9]{4}" 
      placeholder="Agrega un número" style="font-size:11px; text-align:center; height: 38px;" minlength="9" maxlength="9" required=""/>
      <span class="note" style="font-size:11px; " >ejemplo: xxxx-xxxx </span>
      <div class="valid-feedback" >¡Campo opcional!</div>
      <div class="invalid-feedback">Verifique el número y complete el campo.</div>   
    </div></br>             
        
  
</div>

 
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">


  <div class="col-md-6 mb-4">
  <Span class = "red"> * </span>
    <label for="CIUDAD">Ciudad:</label>
    <input name="CIUDAD" type="text" class="form-control text-uppercase" id="CIUDAD" minlength="3" maxlength="35"
    placeholder="Agrega una ciudad" style="font-size:11px; text-align:center; height: 38px;" value="" required="" pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" required="">  
    <div class="valid-feedback">¡Ok válido!</div>
    <div class="invalid-feedback">Complete el campo.</div>
</div>

<div class="col-md-6 mb-4">
  <Span class = "red"> * </span>
  <label for="DIRECCION">Dirección:</label>
  <input name="DIRECCION" type="text" class="form-control text-uppercase" id="DIRECCION" minlength="5" maxlength="250"
  placeholder="Agrega una dirección" style="font-size:11px; text-align:center; height: 38px;" value="" required="" 
  pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ',#$%&&/!°¿|.]+" required="">
  <div class="valid-feedback">¡Ok válido!</div>
  <div class="invalid-feedback">Complete el campo.</div>   
</div>   


</div>




<div class="form-row text-center" >
        <div class="col-md-12 mb-4">
        <label for="EMERGENCIA" style="text-transform:uppercase; font-size:20px; text-align: center; font-weight:500; ">
          "INFORMACIÓN DE CONTACTO EN CASO DE EMERGENCIA"</label>
      </div>
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">

      <div class="col-md-6 mb-4 ">
      <Span class = "red"> * </span>
        <label for="NOMBRE_EMERG" >Primer nombre:</label>
        <input name="NOMBRE_EMERG" type="text" class="form-control text-uppercase" id="NOMBRE_EMERG" minlength="3" maxlength="20"
        placeholder="Agrega un nombre" style="font-size:11px; text-align:center; height: 38px;" value="" required=""
        pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
        <div class="valid-feedback">¡Ok válido!</div>
        <div class="invalid-feedback">Complete el campo.</div>    
    </div>

  <div class="col-md-6 mb-4">
             <Span class = "red"> * </span>
            <label for="APELLIDO_EMERG">Primer apellido:</label> 
            <input name="APELLIDO_EMERG" type="text" class="form-control text-uppercase" id="APELLIDO_EMERG" minlength="3"  maxlength="20"
            placeholder="Agrega un apellido" style="font-size:11px; text-align:center; height: 38px;" value="" required="" 
            pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback">Complete el campo.</div>   
  </div>

</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">

      <div class="col-md-6 mb-4"> 
      <Span class = "red"> * </span>
        <label for="NUM_EMERGENCIA">Télefono:</label>
        <input name="NUM_EMERGENCIA"  type="tel" class="form-control text-uppercase" id="NUM_EMERGENCIA"  pattern="[0-9]{4}-[0-9]{4}" 
        placeholder="Número de contacto en caso de emergencia" style="font-size:11px; text-align:center; height: 38px;" minlength="9" maxlength="9" required=""/>
        <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx </span>
        <div class="valid-feedback" >¡Campo opcional!</div>
        <div class="invalid-feedback">Verifique el número y complete el campo.</div>   
      </div></br>      

        
      <div class="col-md-6 mb-4p">
      <span class = "red"> * </span>
        <label for="COD_FAMILIAR">Relación que tiene con el empleado</label>     
        <select name="COD_FAMILIAR" ID="COD_FAMILIAR" class="form-control text-uppercase"  
        style="font-size:11px;  text-align:center; height: 38px;" 
        value="" maxlength="100" minlength="1" type="text" required="" >
        @foreach($familiares as $familiar)
        <option value="{{$familiar->COD_FAMILIAR}}">{{$familiar->FAMILIAR}}</option>
        @endforeach
      </select>
    </div> 

</div>




<div class="modal-footer">
  <button class="btn btn-primary custom" style="font-size:14px; text-align:center;" type="submit">GUARDAR</button> 
  <button class="btn btn-secondary custom" style="font-size:14px; text-align:center;" type="button" data-dismiss="modal"> CERRAR</button>

        
</div>


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
      <th scope="col">APELLIDO</th>
      <th scope="col">PUESTO</th>
      <th scope="col">CIUDAD</th>
      <th scope="col">DIRECCIÓN</th>
      <th scope="col">TELÉFONO</th>
      <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($empleados as $empleado)
                     <tr style="text-transform:uppercase; font-size:13px;">
                        <td>{{$loop->iteration}}</td>       
        <td>{{$empleado->PRIMER_NOMBRE}} </td>    
        <td>{{$empleado->PRIMER_APELLIDO}} </td>
        <td>{{$empleado->PUESTO}}</td>
        <td>{{$empleado->CIUDAD}}</td>
        <td>{{$empleado->DIRECCION}}</td>
        <td>{{$empleado->NUM_TELEFONO}}</td>
        <td>
       <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        <!--DETALLE DE EMPLEADO-->
       
    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#detailModal{{$empleado->COD_PERSONA}}" ><i class="far fa-file-alt"></i></button>

  
  <div class="modal fade" id="detailModal{{$empleado->COD_PERSONA}}" tabindex="-1" role="dialog" aria-labelledby="tituloVentana2" aria-hidden="true"> 
  <div class="modal-dialog" role="document">      
  <div class="modal-content">
        <div class="modal-header bg-info text-white">
            <h5 id="tituloVentana2">MAS DETALLES DEL EMPLEADO</h5>
            <button class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
  </br>
  

 <div class="col-sm-12">
<div class="card border-info mb-3">
  <div class="card-body">
    <h6 class="card-title " >INFORMACIÓN GENERAL DEL EMPLEADO</h6>
              <p class="card-text">
              <label for="NOMBRE" class="col-form-label">NOMBRE:<option>  {{$empleado->PRIMER_NOMBRE}} {{$empleado->SEGUNDO_NOMBRE}} {{$empleado->PRIMER_APELLIDO}} {{$empleado->SEGUNDO_APELLIDO}}</option> </label>
              </br>
              <label for="NUM_ID" class="col-form-label">N° IDENTIDAD: <option> {{$empleado->NUM_ID}}</option> </label>
              </br>
              <label for="PUESTO" class="col-form-label">PUESTO:<option>  {{$puesto->PUESTO}}</option> </label>
               </br>
               <label for="NOMBRE_GENERO" class="col-form-label">GÉNERO:<option>  {{$empleado->NOMBRE_GENERO}}</option> </label>
              </br>
              <label for="NOMBRE_ESTADO" class="col-form-label">ESTADO CIVIL:<option>  {{$empleado->NOMBRE_ESTADO}}</option> </label>
              </br>
              <label for="DIRECCION" class="col-form-label">DIRECCIÓN:<p> {{$empleado->CIUDAD}}, {{$empleado->DIRECCION}}</p></label>
            
              <label for="CORREO" class="col-form-label">CORREO:<option>  {{$empleado->CORREO}}</option> </label>
              </br>
              <label for="TELEFONO" class="col-form-label">TELÉFONO:<option>  {{$empleado->NUM_TELEFONO}}</option> </label>
              </br>
 
              <label for="FECHA" class="col-form-label">FECHA DE CONTRATO:<option>  {{$empleado->FECHA_CONTRATO}}</option> </label>
              </br>

              </br>
               <h6 class="card-title " >INFORMACIÓN DE CONTACTO EN CASO DE EMERGENCIA</h6>
              <label for="FAMILIAR" class="col-form-label">NOMBRE DE REFERENCIA: 
              <option>{{$empleado->NOMBRE_EMERG}} {{$empleado->APELLIDO_EMERG}}</option> </label>
                </br>
                <label for="FAMILIAR" class="col-form-label">FAMILIAR:<option>  {{$empleado->FAMILIAR}}</option> </label>
              </br>
              <label for="EMERGENCIA" class="col-form-label">TELÉFONO:
             @foreach($emergencias as $emergencia)
            <option>{{$emergencia->NUM_TELEFONO}} </option>
            @endforeach
                </p>
  </div>
</div>
</div>
 </div>
</div>
</div>

<!--FIN DETALLE DE EMPLEADO-->

@can('/admin/empleado/actualizarempleado/')
<button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#editModal{{$empleado->COD_PERSONA}}"><i class="far fa-edit"></i> </button>  
@endcan

<!-- MODAL, FORMULARIO PARA EDITAR EMPLEADO -->    
<div class="modal fade bd-example-modal-lg" id="editModal{{$empleado->COD_PERSONA}}" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true"> 
<div class="modal-dialog modal-lg" role="document">      
<div class="modal-content">


        <div class="modal-header bg-warning text-white">
            <h5 id="tituloVentana">EDITAR EMPLEADO</h5>
            <button class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>


       <form action="{{url('/admin/empleado/actualizarempleado/' . $empleado->COD_PERSONA)}}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}
            
<div class="card-body">
<form  class="needs-validation" novalidate >
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
          <div class="col-md-6 mb-4 ">
          <span class = "red"> * </span>
                <label for="PRIMER_NOMBRE" >Primer Nombre:</label>
                <input name="PRIMER_NOMBRE" type="text" class="form-control text-uppercase" id="PRIMER_NOMBRE" minlength="3" maxlength="35"
                placeholder="Agrega primer nombre" style="font-size:11px; text-align:center" value="{{$empleado->PRIMER_NOMBRE}}" required=""
                pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
                <div class="valid-feedback">¡Ok válido!</div>
                <div class="invalid-feedback">Complete el campo.</div>    
          </div>
    
          <div class="col-md-6 mb-4 ">
                <label for="SEGUNDO_NOMBRE" >Segundo Nombre:</label>
                <input name="SEGUNDO_NOMBRE" type="text" class="form-control text-uppercase" id="SEGUNDO_NOMBRE" minlength="3" maxlength="35"
                placeholder="Agrega segundo nombre" style="font-size:11px; text-align:center" value="{{$empleado->SEGUNDO_NOMBRE}}" 
                pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
                <div class="valid-feedback">¡Campo opcional!</div>
                <div class="invalid-feedback">Complete el campo.</div>    
          </div>                
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">

      <div class="col-md-6 mb-4">
      <span class = "red"> * </span>
                <label for="PRIMER_APELLIDO">Primer Apellido:</label> 
                <input name="PRIMER_APELLIDO" type="text" class="form-control text-uppercase" id="PRIMER_APELLIDO" minlength="3"  maxlength="35"
                placeholder="Agrega primer apellido" style="font-size:11px; text-align:center" value="{{$empleado->PRIMER_APELLIDO}}" required="" 
                pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
                <div class="valid-feedback">¡Ok válido!</div>
                <div class="invalid-feedback">Complete el campo.</div>   
      </div>
    
      <div class="col-md-6 mb-4">
                <label for="SEGUNDO_APELLIDO">Segundo apellido:</label> 
                <input name="SEGUNDO_APELLIDO" type="text" class="form-control text-uppercase" id="SEGUNDO_APELLIDO" minlength="3"  maxlength="35"
                placeholder="Agrega segundo apellido" style="font-size:11px; text-align:center" value="{{$empleado->SEGUNDO_APELLIDO}}"  
                pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
                <div class="valid-feedback">¡Campo opcional!</div>
                <div class="invalid-feedback">Complete el campo.</div>   
      </div>
</div>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">
          <div class="col-md-4 mb-4">
          <span class = "red"> * </span>
          <label for="Generos">Género:</label></br>
            <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
            <label class="btn btn-warning" style="font-size:14px; text-align:center">
              <input type="radio" name="COD_GENERO" id="masculino" value="1" autocomplete="off" required=""> Hombre
            </label>
            <label class="btn btn-warning" style="font-size:14px; text-align:center">
              <input type="radio" name="COD_GENERO" id="femenino" value="2"  autocomplete="off" required=""> Mujer
            </label>
            <label class="btn btn-warning" style="font-size:14px; text-align:center">
              <input type="radio"  name="COD_GENERO" id="otro" value="3"  autocomplete="off" required="">Otro 
            </label> 
          </div>
        </div>


        <div class="col-md-4 mb-4">
        <span class = "red"> * </span>
            <label for="COD_TIPO_PERSONA">Tipo persona:</label></br>
          <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
          <label class="btn btn-warning" style="font-size:14px; text-align:center"> 
            <input type="radio" name="COD_TIPO_PERSONA" id="natural" value="1" autocomplete="off" required=""> Natural
          </label>
          <label class="btn btn-warning" style="font-size:14px; text-align:center">
            <input type="radio"  name="COD_TIPO_PERSONA" id="juridico"  value="2"  autocomplete="off" required=""> Juridico
          </label>
        </div>
        </div>

        <div class="col-md-4 mb-4">
        <span class = "red"> * </span>
          <label for="COD_ESTADO_CIVIL">Estado civil:</label></br>
        <div class="btn-group btn-group-toggle" data-toggle="buttons" required="">
        <label class="btn btn-warning" style="font-size:14px; text-align:center">
          <input type="radio" name="COD_ESTADO_CIVIL" id="casado" value="1" autocomplete="off" required=""> Casado(a)
        </label>
        <label class="btn btn-warning" style="font-size:14px; text-align:center">
          <input type="radio"  name="COD_ESTADO_CIVIL" id="soltero"  value="2"  autocomplete="off" required=""> Soltero(a)
        </label>

        </div>
        </div>
  

</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">

        <div class="col-md-4 mb-8p">
        <span class = "red"> * </span>
            <label for="Producto">Puesto:</label>     
            <select name="COD_PUESTO" ID="COD_PUESTO" class="form-control text-uppercase"  
            style="font-size:11px; text-align:center; height: 38px;" 
            value="{{$puesto->COD_PUESTO}}" maxlength="100" minlength="1" type="text" >
            @foreach($puestos as $puesto)
            <option value="{{$puesto->COD_PUESTO}}">{{$puesto->PUESTO}}</option>
            @endforeach
          </select>
        </div> 

    <div class="col-md-4 mb-4">
    <span class = "red"> * </span>
      <label for="start">Fecha de contrato:</label></br>
      <input class="form-control text-center"   type="date" id="start" name="FECHA_CONTRATO"
             value="{{$empleado->FECHA_CONTRATO}}" min="2018-01-01" max="2050-12-31" required="">
             <div class="valid-feedback">¡Ok válido!</div>
             <div class="invalid-feedback">Complete el campo.</div>   
    </div>
  
              <div class="col-md-4 mb-4">
              <label for="start">Fecha de despido:</label></br>
              <input class="form-control text-center"   type="date" id="start" name="FECHA_SALIDA"
                min="2018-01-01" max="2050-12-31" >
               <div class="valid-feedback">¡Ok válido!</div>
               <div class="invalid-feedback">Complete el campo.</div>   
            </div>
   </div> 


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">

<div class="col-md-4 mb-4"> 
<span class = "red"> * </span>
  <label for="NUM_ID">N° Identidad: </label>
  <input name="NUM_ID"  type="tel" class="form-control text-uppercase" id="NUM_ID"  pattern="[0-9]{4}-[0-9]{4}-[0-9]{5}" 
  placeholder="Agrega número de identidad" style="font-size:11px; text-align:center; height: 38px;" minlength="15" maxlength="15" required=""/>
  <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx-xxxxx </span>
  <div class="valid-feedback" >¡Campo opcional!</div>
  <div class="invalid-feedback">Verifique el número y complete el campo.</div>   
</div></br>


<div class="col-md-4 mb-4">
<span class = "red"> * </span>
<label for="CORREO">Correo:</label>
<input name="CORREO" type="email" class="form-control" id="CORREO"  value="{{$empleado->CORREO}}" minlength="15" maxlength="50"
placeholder="Ejemplo@dominio.com" style="font-size:12px; text-align:center; height: 38px;" required="">
<div class="valid-feedback">¡Campo opcional!</div>
<div class="invalid-feedback">Verifique el correo y complete el campo.</div>   
</div>

<div class="col-md-4 mb-4"> 
<span class = "red"> * </span>
<label for="NUM_PERSONAL">Télefono empleado:</label>
<input name="NUM_PERSONAL"  type="tel" class="form-control text-uppercase" id="NUM_PERSONAL"  value="{{$empleado->NUM_TELEFONO}}" pattern="[0-9]{4}-[0-9]{4}" 
placeholder="Agrega un número" style="font-size:11px; text-align:center; height: 38px;" minlength="9" maxlength="9" required=""/>
<span class="note" style="font-size:12px; " >Formato: xxxx-xxxx </span>
<div class="valid-feedback" >¡Campo opcional!</div>
<div class="invalid-feedback">Verifique el número y complete el campo.</div>   
</div></br>             


</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">


<div class="col-md-6 mb-4">
<span class = "red"> * </span>
<label for="CIUDAD">Ciudad:</label>
<input name="CIUDAD" type="text" class="form-control text-uppercase" id="CIUDAD" minlength="3" maxlength="35"
placeholder="Agrega una ciudad" style="font-size:11px; text-align:center; height: 38px;" value="{{$empleado->CIUDAD}}" required="" pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+" required="">  
<div class="valid-feedback">¡Ok válido!</div>
<div class="invalid-feedback">Complete el campo.</div>
</div>

<div class="col-md-6 mb-4">
<span class = "red"> * </span>
<label for="DIRECCION">Dirección:</label>
<input name="DIRECCION" type="text" class="form-control text-uppercase" id="DIRECCION" minlength="5" maxlength="250"
placeholder="Agrega una dirección" style="font-size:11px; text-align:center; height: 38px;" value="{{$empleado->DIRECCION}}" 
required="" pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ',#$%&&/!°¿|.]+" required="">
<div class="valid-feedback">¡Ok válido!</div>
<div class="invalid-feedback">Complete el campo.</div>   
</div>   


</div>


<div class="form-row text-center" >
        <div class="col-md-12 mb-4">
        <label for="EMERGENCIA" style="text-transform:uppercase; font-size:20px; text-align: center; font-weight:500; ">
          "INFORMACIÓN DE CONTACTO EN CASO DE EMERGENCIA"</label>
      </div>
</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">

      <div class="col-md-6 mb-4 ">
      <span class = "red"> * </span>
        <label for="NOMBRE_EMERG" >Primer nombre:</label>
        <input name="NOMBRE_EMERG" type="text" class="form-control text-uppercase" id="NOMBRE_EMERG" maxlength="20"
        placeholder="Agrega un nombre" style="font-size:11px; text-align:center; height: 38px;" value="" required=""
        pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
        <div class="valid-feedback">¡Ok válido!</div>
        <div class="invalid-feedback">Complete el campo.</div>    
    </div>

  <div class="col-md-6 mb-4">
           <span class = "red"> * </span>
            <label for="APELLIDO_EMERG">Primer apellido:</label> 
            <input name="APELLIDO_EMERG" type="text" class="form-control text-uppercase" id="APELLIDO_EMERG"   maxlength="20"
            placeholder="Agrega un apellido" style="font-size:11px; text-align:center; height: 38px;" value="" required="" 
            pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ']+">
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback">Complete el campo.</div>   
  </div>

</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">

      <div class="col-md-6 mb-4"> 
      <span class = "red"> * </span>
        <label for="NUM_EMERGENCIA">Télefono:</label>
        <input name="NUM_EMERGENCIA"  type="tel" class="form-control text-uppercase" id="NUM_EMERGENCIA"  pattern="[0-9]{4}-[0-9]{4}" 
        placeholder="Número de contacto en caso de emergencia" style="font-size:11px; text-align:center; height: 38px;" minlength="9" maxlength="9" required=""/>
        <span class="note" style="font-size:11px; " >Ejemplo: xxxx-xxxx </span>
        <div class="valid-feedback" >¡Campo opcional!</div>
        <div class="invalid-feedback">Verifique el número y complete el campo.</div>   
      </div></br>      

        
      <div class="col-md-6 mb-4p">
      <span class = "red"> * </span>
        <label for="COD_FAMILIAR">Relación que tiene con el empleado</label>     
        <select name="COD_FAMILIAR" ID="COD_FAMILIAR" class="form-control text-uppercase"  
        style="font-size:11px;  text-align:center; height: 38px;" 
        value="" maxlength="100" minlength="1" type="text" required="" >
        @foreach($familiares as $familiar)
        <option value="{{$familiar->COD_FAMILIAR}}">{{$familiar->FAMILIAR}}</option>
        @endforeach
      </select>
    </div> 

</div>


<div class="modal-footer">
  
  <button class="btn btn-primary custom" style="font-size:14px; text-align:center;" type="submit">GUARDAR</button> 
  <button class="btn btn-secondary custom" style="font-size:14px; text-align:center;" type="button" data-dismiss="modal"> CERRAR</button>

        
</div>


</div>
</div>
</div>
</div>
</form>
</main>
<!-- FIN MODAL, FORMULARIO PARA EDITAR EMPLEADO -->   



<!-- BOTON PARA ELIMINAR EL EMPLEADO --> 
            <form method="post" action="{{url('/admin/empleado/eliminarempleado/'.$empleado->COD_PERSONA)}}" class="d-inline formulario-eliminar">
            {{csrf_field()}}
            {{method_field('DELETE')}}
             
 @can('/admin/empleado/eliminarempleado/')            
             <button class="btn btn-danger" type="submit" ><i class="far fa-trash-alt"></i></button>  
 @endcan       
            </form>
<!-- FIN BOTON PARA ELIMINAR EL EMPLEADO --> 


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
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                },
                titleAttr: 'COPIAR INFORMACIÓN',
               
                messageTop: 'Dirección: Barrio el Edén (14.078591, -87.225581) - Teléfono: +504 9445-5962', 
                className: 'btn btn-info'
                
            },
            {
                extend: 'excelHtml5',
                title: 'INVERSIONES DIVERSAS LA ORQUIDEA',
                text: '<i class="fas fa-file-excel"></i>',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                },
                filename: 'EXCEL REPORTE EMPLEADOS',
                titleAttr: 'EXPORTAR A EXCEL',
                messageTop: 'Dirección: Barrio el Edén (14.078591, -87.225581) - Teléfono: +504 9445-5962', 
                className: 'btn btn-success',
            },
            {
                text: 'Custom PDF',
                extend: 'pdfHtml5', 
                filename: 'PDF REPORTE EMPLEADOS',
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
                doc.pageMargins = [ 140, 30, 140, 30 ];
              },
              
            
            },
          
        
        
        ]

        });
} );  

</script>
@stop




