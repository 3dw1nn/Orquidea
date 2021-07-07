@extends('layouts.log')

@section('content')


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
          <h6 class="fw-bold text-center py-3">  BIENVENIDO </h6>
       </div>
   

<x-guest-layout>

            <x-slot name="logo"></x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label style="font-size:11px;"  for="name" value="{{ __('USUARIO') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" 
                name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label style="font-size:11px;"  for="password" value="{{ __('CONTRASEÑA') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" 
                
                
                name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordar contraseña') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">

                <x-jet-button class="ml-4" >
                    {{ __('Ingresar') }}
                </x-jet-button>
            </div>

            </form>

            
            <div class="flex  mt-4  justify-end" >
            @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" 
                    style="margin-right: 200px; " href="{{ route('password.request') }}">
                        {{ __('Recuperar contraseña') }}
                    </a>
             @endif
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registrar</a>
            </div>

     
</x-guest-layout>

</div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js" ></script>


</html>
@endsection