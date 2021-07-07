@extends('adminlte::page')

@section('title', 'Inversiones Orquidea')

@section('content_header')
@if (session('info'))
      <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
       </div>
   @endif


<div class="card">
  <div class="card-body">
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;"> <strong> LISTA DE ROLES</strong></h1> 
  
  <!-- IMAGEN PARA PANTALLA DE EMPLEADO-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/XpBfffM/icono-permiso-individual.png"> 
</div>
  </div>
</div>

<div class="col-lg-12">            
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
<a type="button" class="btn btn-outline-primary" href="{{route('admin.roles.create')}}"><i class="fas fa-plus"></i> AGREGAR ROL</a>
</div>    
</div> 
@stop

@section('content')
   
  <div class="card-body">
        <table class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
        <tr style="font-size:14px;">
            <th>ID</th>
            <th>ROL</th>
            <th colspan="2">ACCIONES</th>
        </tr>
  </thead>

  <tbody>
   @foreach($roles as $role)
  <tr>
  <td width="100px">{{$role->id}}</td>
  <td>{{$role->name}}</td>
  <td width="50px">
 
  <a class="btn btn-warning" href="{{route('admin.roles.edit', $role)}}"><i class="fas fa-edit"></i></a>

  </td>
  <td width="50px">
 
    <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
    @csrf
    @method('delete')

    <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
    </form> 

  </td>
  </tr>
   @endforeach
  </tbody>
  </table>
  </div>
  </div>
@stop
