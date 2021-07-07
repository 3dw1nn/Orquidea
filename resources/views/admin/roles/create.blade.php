@extends('adminlte::page')

@section('title', 'Inversiones Orquidea')

@section('content_header')
<div class="card">
  <div class="card-body">
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">CREAR NUEVO ROL</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE EMPLEADO-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/XpBfffM/icono-permiso-individual.png">
</div>
  </div>
</div>
@stop

@section('content')
<div class="card">
<div class="card-body">
{!! Form::Open(['route' => 'admin.roles.store'])!!}

@include('admin.roles.partials.form')


<div class="form-group">
{!! Form::submit('GUARDAR', ['class' =>'btn btn-dark']) !!}
</div>

{!! Form::Close()!!}
</div>
</div>
    
@stop


