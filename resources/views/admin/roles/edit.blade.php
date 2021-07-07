
@extends('adminlte::page')

@section('title', 'Inversiones Orquidea')

@section('content_header')
<div class="card">
  <div class="card-body">
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">EDITAR ROL</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE EMPLEADO-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/XpBfffM/icono-permiso-individual.png">
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
{!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
    @include('admin.roles.partials.form')

    {!! Form::submit('GUARDAR', ['class' =>'btn btn-dark']) !!}
{!! Form::Close()!!}
</div>
</div>
@stop 

