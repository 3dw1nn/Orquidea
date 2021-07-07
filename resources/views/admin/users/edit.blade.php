@extends('adminlte::page')

@section('title', 'Inversiones Orquidea')

@section('content_header')

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

<div class="card">
  <div class="card-body">
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;"> <strong> ACTUALIZAR USUARIO</strong></h1> 
  
  <!-- IMAGEN PARA PANTALLA DE EMPLEADO-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/FsF3dqL/admin-settings-male.png">
</div>
  </div>
</div>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

<div class="card">
<div class="card-body">
 {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}

<div class="form-group">
{!! Form::label('name', 'Nombre') !!}
{!! Form::text('name', null, ['class' =>'form-control', 'placeholder'=>'Ingrese Nombre']) !!}
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror

</div>

<div class="form-group">
{!! Form::label('email', 'Email') !!}
{!! Form::text('email', null, ['class' =>'form-control', 'placeholder'=>'Ingrese email']) !!}
@error('slug')
<span class="text-danger">{{$message}}</span>
@enderror
</div>

<div class="form-group">
  <label for="password">Contraseña</label>
  <input type="password" class="form-control" name="password" placeholder="Ingrese contraseña">
</div>


          <div class="card-body">
        <table class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
        <tr style="font-size:14px;">
            <th>N°</th>
            <th>ROL</th>
            <th>ASIGNACIÓN</th>
         
            </tr>
  </thead>
<tbody>
  
 @foreach ($roles as $role)
  <tr>
  <td>{{$loop->iteration}}</td>  
  <td>{{$role->name}}</td>
    
    <td>  <label class="container">   
            <div>
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'only-one']) !!}
                <span class="checkmark"  ></span> 
            </div>
        </label>
    </td>
  </tr>
   @endforeach
  </tbody>
  </table>

</br>

<div class="form-group">
{!! Form::submit('Actualizar', ['class' =>'btn btn-primary']) !!}
</div>

{!! Form::Close()!!}
</div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script>
    let Checked = null;
//The class name can vary
for (let CheckBox of document.getElementsByClassName('only-one')){
	CheckBox.onclick = function(){
  	if(Checked!=null){
      Checked.checked = false;
      Checked = CheckBox;
    }
    Checked = CheckBox;
  }
}
</script>
    <script> console.log('Hi!'); </script>
@stop