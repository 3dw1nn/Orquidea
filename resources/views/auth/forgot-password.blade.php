@extends('layouts.log')

@section('content')

<style>
    .custom {
      width: 100px !important;
  }

  </style>


<!-- Formulario e imagen --> 
<div class="container w-75 bg-primary mt-5 rounded shadow">
  <!-- 1 fila --> 
 <div class="row align-items-lg-stretch">
      <!-- 2 columnas --> 
     <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

     </div>

     <div class="col bg-white p-5 rounded-end">
       
       <div class="text-center">
         <img  src="img/logo.png"  width="200" alt=""   class="mx-auto d-block">
          <h2 class="fw-bold text-center py-2">  RECUPERACIÓN DE CONTRASEÑA </h2>
          <div class="mb-4 text-sm text-gray-400">
            {{ __('Recuperación de contraseña vía correo electrónico') }}
        </div>

       </div>


<x-guest-layout>

        <x-slot name="logo">
        </x-slot>


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label  style="font-size:11px; " for="name" value="{{ __('USUARIO') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" 
                minlength="3" maxlength="35"
                name="name" required autofocus />
            </div>
</br>

            <div class="block">
                <x-jet-label  style="font-size:11px; " for="email" value="{{ __('CORREO') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="text" 
                minlength="12" maxlength="35"
                name="email"  required autofocus />
            </div>
</br></br>


                <div class="flex items-center justify-center mt-2">
                <button class="btn btn-primary custom" style="font-size:14px; text-align:center;" >
                    {{ __('ENVIAR') }}
                </button>

                <button class="btn btn-secondary custom" style="font-size:14px; text-align:center;margin-left:15px"  >
                    <a href="{{ url('/login') }}" style="font-size:12px;">CANCELAR</a>
                </button>
                </div>




          

        </form>

</x-guest-layout>


</div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js" ></script>


</html>
@endsection