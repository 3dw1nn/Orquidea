@extends('adminlte::page')

@section('title', 'Inversiones Orquidea')

@section('content_header')
    <h1>Crear Categoria</h1>
@stop

@section('content')
   
<div class="card">
<div class="card-body">
{!! Form::Open(['route' => 'admin.categories.store'])!!}

<div class="form-group">
{!! Form::label('name', 'Nombre') !!}
{!! Form::text('name', null, ['class' =>'form-control', 'placeholder'=>'Ingrese Categoría']) !!}
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror

</div>

<div class="form-group">
{!! Form::label('slug', 'Slug') !!}
{!! Form::text('slug', null, ['class' =>'form-control', 'placeholder'=>'Ingrese Slug', 'readOnly']) !!}
@error('slug')
<span class="text-danger">{{$message}}</span>
@enderror

</div>


<div class="form-group">
{!! Form::submit('Crear Categoría', ['class' =>'btn btn-primary']) !!}
</div>

{!! Form::Close()!!}
</div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}" ></script>


<script>
$(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});
</script>


@endsection
