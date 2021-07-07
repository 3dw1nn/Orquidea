@extends('adminlte::page')

@section('title', 'Inversiones Orquidea')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
   


<div class="card">
<div class="container">

  <div class="row">
<div class="col-sm-6">

</br>
    <form action="{{route('admin.users.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Usuario</label>
        <input type="text" class="form-control" name="name" placeholder="Ingrese usuario">
        
      </div>
    
      <div class="form-group">
        <label for="email">Correo</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingrese correo electrónico">
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


      <button type="submit" class="btn btn-primary">Crear</button>
    </br>
  </br>
    </form>


  </div>
  </div>
</div>
</div>



@endsection
