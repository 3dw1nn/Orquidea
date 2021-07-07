@extends('adminlte::page')

@section('title', 'Orquidea')

@section('content_header')
    <h1></h1>
@stop

@section('content')


    

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Interfaz almacen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
  <body>
  <div class="splitview skewed">
        <div class="panel bottom">
            <div class="content">
                <div class="description">
                    <h1>SISTEMA WEB ORQUIDEA </h1>
                    
         
                </div>

                <img src="img/XX.jpg" alt="Original">
            </div>
        </div>

        <div class="panel top">
            <div class="content">
            
                <div class="description">
                
                    <h1>BIENVENIDO</h1>
                    <p>¡Ha ingresado exitosamente al sistema!</p>
                </div>

                <img src="img/XX.jpg"  alt="Duotone">
            </div> 
        </div>

        <div class="handle"></div>
    </div>




</br></br>
<div class="content">
    <div class="container-fluid">
      <div class="row">


@can('/admin/proveedor/verproveedor')
 <div class="col-lg-3 col-md-6 col-sm-6">
 <a href="{{url('/admin/proveedor/verproveedor')}}"></a>
          <div class="card text-white bg-info mb-3 btn btn-info" style="max-width: 18rem;">
  <div class="card-header">PROVEEDORES</div>
  <div class="card-body btn btn-info" >
    <h1 class="card-text display-4">
    <i class="fas fa-users">
     @foreach($rproveedores as $rproveedor)
<td>{{$rproveedor->TOTAL}}</td>
@endforeach
</i>
    </h1>
  </div>
</div>
   </div>
@endcan

@can('/admin/cliente/vercliente')
<div class="col-lg-3 col-md-6 col-sm-6">
<a href="{{url('/admin/cliente/vercliente')}}"></a>
         <div class="card text-white bg-warning mb-3 btn btn-warning" style="max-width: 18rem;">
  <div class="card-header">CLIENTES</div>
  <div class="card-body btn btn-warning" >
    <h1 class="card-text display-4">
    <i class="fas fa-user">
     @foreach($rclientes as $rcliente)
<td>{{$rcliente->TOTAL}}</td>
@endforeach
</i>
    </h1>
  </div>
</div>
   </div>
@endcan

@can('/admin/inventario/verinventario')
<div class="col-lg-3 col-md-6 col-sm-6">
<a href="{{url('/admin/inventario/verinventario')}}"></a>
  <div class="card text-white bg-danger mb-3 btn btn-danger" style="max-width: 18rem;">
  <div class="card-header">PRODUCTOS</div>
  <div class="card-body btn btn-danger" >
    <h1 class="card-text display-4">
    <i class="fas fa-trailer">
     @foreach($rinventarios as $rinventario)
<td>{{$rinventario->TOTAL}}</td>
@endforeach
</i>
    </h1>    
  </div>
</div>
   </div>
@endcan

@can('/admin/empleado/verempleado')
   <div class="col-lg-3 col-md-6 col-sm-6">
   <a href="{{url('/admin/empleado/verempleado')}}"></a>
          <div class="card text-white bg-success mb-3 btn btn-success" style="max-width: 18rem;">
  <div class="card-header"> EMPLEADOS</div>
  <div class="card-body btn btn-success" >
    <h1 class="card-text display-4">
    <i class="far fa-file-alt">
     @foreach($rempleados as $rempleado)
<td>{{$rempleado->TOTAL}}</td>
@endforeach
</i>
    </h1>
  </div>
</div>
   </div>
@endcan
  

            </div>
            </div>
            </div>
    


















  
    
        
      
      
      
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script>
        $('.carousel').carousel();
    </script>  
      
  </body>
</html>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

<style>
  /* Reset. */
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 0;
    font-size: 100%;
    font-family: Arial, Helvetica, sans-serif;
}

/* Panels. */
.splitview {
    position: relative;
    width: 100%;
    min-height: 30vw;
    overflow: hidden;
}

.panel {
    position: absolute;
    width: 100vw;
    min-height: 30vw;
    overflow: hidden;
}

    .panel .content {
        position: absolute; 
        width: 80vw;
        min-height: 30vw;
        color: #FFF;
    }

    .panel .description {
        width: 25%;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        text-align: center;
    }

    .panel img {
        box-shadow: 0 0 20px 20px rgba(0, 0, 0, 0.15);
        width: 35%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


.bottom {
    background-color: rgb(44, 44, 44);
    z-index: 1;
}

    .bottom .description {
        right: 5%;
    }

.top {
    background-color: rgb(77, 69, 173);
    z-index: 2;
    width: 50vw;

    /*-webkit-clip-path: polygon(60% 0, 100% 0, 100% 100%, 40% 100%);
    clip-path: polygon(60% 0, 100% 0, 100% 100%, 40% 100%);*/
}

    .top .description {
        left: 5%;
    }

/* Handle. */
.handle {
    height: 100%;
    position: absolute;
    display: block;
    background-color: rgb(253, 171, 0);
    width: 5px;
    top: 0;
    left: 50%;
    z-index: 3;
}

/* Skewed. */
.skewed .handle {
    top: 50%;
    transform: rotate(30deg) translateY(-50%);
    height: 200%;
    -webkit-transform-origin: top;
    -moz-transform-origin: top;
    transform-origin: top;
}

.skewed .top {
    transform: skew(-30deg);
    margin-left: -1000px;
    width: calc(50vw + 1000px);
}

.skewed .top .content {
    transform: skew(30deg);
    margin-left: 1000px;
}

/* Responsive. */
@media (max-width: 900px) {
    body {
        font-size: 75%;
    }
}
    </style>


    
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var parent = document.querySelector('.splitview'),
        topPanel = parent.querySelector('.top'),
        handle = parent.querySelector('.handle'),
        skewHack = 0,
        delta = 0;

    // If the parent has .skewed class, set the skewHack var.
    if (parent.className.indexOf('skewed') != -1) {
        skewHack = 1000;
    }

    parent.addEventListener('mousemove', function(event) {
        // Get the delta between the mouse position and center point.
        delta = (event.clientX - window.innerWidth / 2) * 0.5;

        // Move the handle.
        handle.style.left = event.clientX + delta + 'px';

        // Adjust the top panel width.
        topPanel.style.width = event.clientX + skewHack + delta + 'px';
    });
});
    </script>
@stop