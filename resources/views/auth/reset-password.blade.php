@extends('layouts.log')

@section('content')

<style>
    .custom {
      width: 100px !important;
  }

  </style>


<!-- Formulario e imagen --> 
<div class="container w-75 bg-secondary mt-5 rounded shadow">
  <!-- 1 fila --> 
 <div class="row align-items-lg-stretch">
      <!-- 2 columnas --> 
     <div  class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-3 rounded">

     </div>

     <div class="col bg-white p-5 rounded-end">
       
       <div class="text-center">
         <img  src="https://i.ibb.co/ZW2Ppw8/logo.png"  width="200" alt=""   class="mx-auto d-block">
          <h2 class="fw-bold text-center py-2">  CAMBIO DE CONTRASEÑA </h2>

       </div>




<x-guest-layout>

        <x-slot name="logo">

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label style="font-size:11px;" for="email" value="{{ __('CORREO') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" 
                minlength="12" maxlength="35"
                name="email"  required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label style="font-size:11px;" for="password" value="{{ __('CONTRASEÑA') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" 
                minlength="8" maxlength="35"
                pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$"
                name="password" required autocomplete="new-password" />
                <span class="note" style="font-size:11px; " >*La contraseña debe tener al menos un dígito, 
                al menos una minúscula y al menos una mayúscula.</span>
            </div>

            <div class="mt-4">
                <x-jet-label style="font-size:11px;" for="password_confirmation" value="{{ __('CONFIRMAR CONTRASEÑA') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" 
                minlength="8" maxlength="35"
                pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$"
                name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('CAMBIAR CONTRASEÑA') }}
                </x-jet-button>
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