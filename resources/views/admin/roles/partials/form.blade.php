<!DOCTYPE html>
<html lang="en">
<head>
  <title>Interfaz almacen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



<style>
/* Customize the label (the container) */
.container {
  display: block;
  position: relative;
  padding-left: 6px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 1;
  height: 20px;
  width: 20px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 8px;
  top: 4px;
  width: 4px;
  height: 9px;
  border: solid white;
  border-width: 0 2.5px 2.5px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

</style>

<style>
  .panel-heading {
    background: rgb(13,110,253);
background: linear-gradient(90deg, rgba(13,110,253,1) 0%, rgba(27,76,162,1) 31%, rgba(2,42,96,1) 100%);
    color: white;
}

.panel-body {
    background-color: blue;
    color: white;
}
</style>



</head>

<body>



<div class="form-group">
  <div class="text-center">
{!! Form::label('name', 'NOMBRE') !!}
</div>

{!! Form::text('name', null, ['class' =>'form-control text-center','style' => 'font-size:16px;', 'placeholder'=>'AGREGA UN ROL']) !!}


@error('name')
<small class="text-danger">{{$message}}</small>
@enderror
</div>
<h2 style="text-transform:uppercase; font-size:30px; text-align: center;"> LISTA DE PERMISOS</h2>


<div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" id="customSwitch1">
  <label class="custom-control-label" 	style="font-size:16px; text-align:center; height: 30px;"
   for="customSwitch1">MARCAR/DESMARCAR TODAS LAS CASILLAS</label>
</div>


<!-- INICIO ACORDEON -->

<div class="accordion" id="accordionExample">

<!-- ACORDEON 1-->

    <div class="card">
    <div class="panel-heading" id="headingOne">
      <h2 class="mb-0">
        <button class="btn  btn-block text-left text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        <img style="width:30px; " src="https://i.ibb.co/mc1V8fp/security-shield-green.png"> SEGURIDAD
             
        </button>

      </h2>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">


<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
          <tr style="font-size:14px;">
            <th scope="col">MÓDULO</th>
            <th scope="col">VER</th>
            <th scope="col">AGREGAR</th>
            <th scope="col">EDITAR</th>
            <th scope="col">ELIMINAR</th>
            <th scope="col">DESCARGAR</th>
          </tr>
        </thead>
        <tbody>


          <tr>
            <td>
              USUARIOS
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 2, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label>
            </td>

             <td><div class="text-muted d-inline"></div></td>
            <td><div class="text-muted d-inline"></div></td>
             <td><div class="text-muted d-inline"></div></td>
             <td><div class="text-muted d-inline"></div></td>
          </tr>

          <tr>
            <td>
              ROLES
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 3,  null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

             <td><div class="text-muted d-inline"></div></td>
            <td><div class="text-muted d-inline"></div></td>
             <td><div class="text-muted d-inline"></div></td>
             <td><div class="text-muted d-inline"></div></td>
          </tr>
          <tr>
            <td>
              BITACORA
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 54, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

             <td><div class="text-muted d-inline"></div></td>
            
            <td><div class="text-muted d-inline"></div></td>

             <td><div class="text-muted d-inline"></div></td>
            
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 66, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
          </tr>

          <tr>
            <td>
              REPORTERÍA
            </td>
            <td>
            <label class="container">   
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 1, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

             <td><div class="text-muted d-inline"></div></td>
            <td><div class="text-muted d-inline"></div></td>
             <td><div class="text-muted d-inline"></div></td>
             <td><div class="text-muted d-inline"></div></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


      </div>
    </div>
  </div>

<!-- FIN ACORDEON 1-->


<!-- ACORDEON 2-->
  <div class="card">
    <div class="panel-heading" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn  btn-block text-left text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <img style="width:30px; " src="https://i.ibb.co/cNQQPPt/icon-contrato.png"> REGISTROS
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        
        <div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
          <tr style="font-size:14px;">
            <th scope="col">MÓDULO</th>
            <th scope="col">VER</th>
            <th scope="col">AGREGAR</th>
            <th scope="col">EDITAR</th>
            <th scope="col">ELIMINAR</th>
            <th scope="col">DESCARGAR</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td>
              EMPLEADO - REGISTRO
            </td>
            <td>
            <label class="container">   
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 13, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 14,  null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 15, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 16, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
            
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 57, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
          </tr>

          <tr>
            <td>
              EMPLEADOS - PAGOS
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 41, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 42, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 43, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td><div class="text-muted d-inline"></div></td>
            
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 63, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
             </tr>


             <tr>
            <td>
              CLIENTES
            </td>
            <td>
            <label class="container">   
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 9, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container">   
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 10, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container">   
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 11, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container">   
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 12, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
            
            <td>
            <label class="container">   
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 56,  null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
          </tr>

          <tr>
            <td>
              PROVEEDORES
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 47, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 48, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 49, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

             <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 50, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
            
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 65, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
          </tr>

          <tr>
            <td>
            INVENTARIO - PRODUCTOS
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 26, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 27, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 28, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 29, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
            
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 60, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
          </tr>


              <tr>
            <td>
             INVENTARIO - PIEZAS
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 37, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 38, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 39, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 40, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
            
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 62, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
          
          </tr>

          <tr>
            <td>
              ALMACÉN - MATERIALES
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 30, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 31, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 32, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 33, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
            
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 61, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
          </tr>
            <tr>
            <td>
              ALMACÉN - ADMINISTRACIÓN
            </td>
            <td>
            <label class="container">   
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 4,  null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container">   
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 5,  null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td><div class="text-muted d-inline"></div></td>
            <td><div class="text-muted d-inline"></div></td>
            <td>
            <label class="container">   
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 55,  null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
          
          </tr>
   
          <tr>
            <td>
              PRODUCCIÓN
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 44, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 45, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 46, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td><div class="text-muted d-inline"></div></td>
            
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 64, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
          </tr>


 

          <tr>
          <td>
              FACTURA
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 17, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 18, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td><div class="text-muted d-inline"></div></td>
            <td><div class="text-muted d-inline"></div></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 58, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
          </tr>



          <tr>
            <td>
              CONTROL DE GASTOS
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 23, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 24, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 25, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td><div class="text-muted d-inline"></div></td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 59, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
          </tr>
 
        </tbody>
      </table>
    </div>
  </div>
</div>


      </div>
    </div>
  </div>

<!-- FIN ACORDEON 2-->

<!-- ACORDEON 3-->
  <div class="card">
    <div class="panel-heading" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-block text-left text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <img style="width:25px; " src="https://i.ibb.co/rkXJp7H/564898.png"> MANTENIMIENTO
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">

        <div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
          <tr style="font-size:14px;">
            <th scope="col">MÓDULO</th>
            <th scope="col">VER</th>
            <th scope="col">AGREGAR</th>
            <th scope="col">EDITAR</th>
            <th scope="col">ELIMINAR</th>
            <th scope="col">DESCARGAR</th>
          </tr>
        </thead>
        <tbody>
     


           <tr>
            <td>
              PUESTOS
            </td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 19, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 51, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 52, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 53, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

             <td><div class="text-muted d-inline"></div></td>
          </tr>

          <tr>
            <td>
              FAMILIARES
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 19, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 20, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 21, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 22, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
            
            <td><div class="text-muted d-inline"></div></td>
          </tr>

          <tr>
            <td>
              MEDIDAS
            </td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 19, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 34, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 35, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container"> 
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 36, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td><div class="text-muted d-inline"></div></td>
            
          </tr>

          <tr>
           <td>
              GASTOS
            </td>
            <td>
            <label class="container">   
            <div class="text-muted d-inline">
            {!! Form::checkbox('permissions[]', 19,  null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>
            <td>
            <label class="container">   
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 6, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container">   
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 7, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td>
            <label class="container">   
            <div class="text-muted d-inline">
                  {!! Form::checkbox('permissions[]', 8, null, ['id' => 'checkbox1']) !!}
                  <span class="checkmark"></span>
              </div>
              </label></td>

            <td><div class="text-muted d-inline"></div></td>
          </tr>

        </tbody>
      </table>

      </div>
    </div>
  </div>

  <!-- FIN ACORDEON 3-->
  
</div>
</div>
</div>
<!-- FIN ACORDEON -->
</br>

<!-- FUNCION PARA MARCAR TODOS LOS CHECKBOX-->
<script>
$(document).ready(function() {
   $("#customSwitch1").click(function() {
      $('input:checkbox').not(this).prop('checked', this.checked);
   });
});
</script>



</body>
</html>