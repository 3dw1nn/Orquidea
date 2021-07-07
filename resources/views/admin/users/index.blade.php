@extends('adminlte::page')

@section('title', 'INVERSIONES ORQUIDEA')

@section('content_header')
<div class="card">
  <div class="card-body">
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;"> <strong> LISTA DE USUARIOS</strong></h1> 
  
  <!-- IMAGEN PARA PANTALLA DE EMPLEADO-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/FsF3dqL/admin-settings-male.png">
</div>
  </div>
</div>


<div class="col-lg-12">            
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
<a type="button" class="btn btn-outline-primary" href="{{route('admin.users.create')}}"><i class="fas fa-plus"></i> AGREGAR USUARIO</a>
</div>    
</div> 
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop 