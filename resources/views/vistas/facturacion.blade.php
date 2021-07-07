@extends('adminlte::page')

@section('title', 'Orquidea')



@section('content')

<!DOCTYPE html>
  <html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css"/>   
    <script src="https://kit.fontawesome.com/e73b073bc6.js" crossorigin="anonymous"></script>


    <!--MANEJO DEL DOM-->
    
    <!-- Librerias CSS para manejo del DOM-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <!--BOOSTRAP ESTILO DE TABLAS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






<!--ESTILOS CSS-->
    <style>

.dt-buttons {
	margin-bottom: 10px;
}
.dt-buttons.btn-group{
	float: left;
	margin-right: 2%;
}
.dataTables_filter {
	
	margin-top: 10px;
	margin-right: 0%;
	text-align: right;
    
}
.dataTables_info {
	float: right;
}
.dataTables_lengthMenu{
	float: center;
	margin-top: 4px;
	margin-left: 2%;
    text-align: right;
}
    .custom {
      width: 100px !important;
  }

  </style>

<style>
      .red{
        color: red;
        content: "*";
        position: absolute;
        margin-left: -10px;
}
      </style>


  </head>

  <div class="card">
  <div class="card-body">
    <h1 style="text-transform:uppercase; font-size:30px; text-align: center;">Administración de Facturas</h1> 
  
  <!-- IMAGEN PARA PANTALLA DE FACTURA-->
<div class="col-md-12 mb-2 text-center ">
  <img style="width:100px; " src="https://i.ibb.co/DzgRSJS/308827.png">
</div>
  
  </div>
</div>

	

			  	<div class="col-md-12">
				 <div class="d-flex justify-content-md-center">
@can('/admin/facturacion/insertarfacturacion')	  
					<div class="btn-group" role="group" aria-label="Basic example">
							  
					<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-outline-info">  <i class="fas fa-plus"></i> AGREGAR VENTA</button>
@endcan  
					</div>
			  
				</div>	
			</div>





	  
  <!-- Modal -->

  <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">

		<div class="modal-header bg-info text-white">

		  <h5 class="modal-title" id="exampleModalLabel">AGREGAR VENTA</h5>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		
		</div>


<form action="{{url('/admin/facturacion/insertarfacturacion')}}" method="POST">
            {{csrf_field()}}
        

				<div class="modal-body">
				
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">  

<div class="col-md-6 mb-4" >
                  <label for="Empleado">Empleado</label>     
                      <select name="COD_EMPLEADO" ID="COD_EMPLEADO" class="form-control text-uppercase"  
					  value=""  minlength="1" type="text" style="font-size:11px; text-align-last: center;" >
                          @foreach($emples as $emple)
                          <option value="{{$emple->COD_EMPLEADO}}">{{$emple->PRIMER_NOMBRE}} {{$emple->PRIMER_APELLIDO}}</option>
                          @endforeach
                      </select>
                  </div>


				  <div class="col-md-6 mb-4" >
					<label for="nombre_cliente">Cliente</label>
							<select name="COD_CLIENTE" ID="COD_CLIENTE" 
							class="form-control text-uppercase" value="" maxlength="100" 
							minlength="1" type="text" style="font-size:11px; text-align-last: center;" >
								@foreach($clientes as $cliente)
								<option value="{{$cliente->COD_CLIENTE}}">{{$cliente->PRIMER_NOMBRE}} {{$cliente->SEGUNDO_NOMBRE}} {{$cliente->PRIMER_APELLIDO}}</option>
								@endforeach
							</select>
							</div>
</div>

<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">  

					 <div class="col-md-4 mb-4">
                  </br>  <label for="start">Fecha</label></br>
                    <input class="form-control text-center"   type="date" id="start" name="FECHA"
                           min="2018-01-01" max="2050-12-31" required="">
                           <div class="valid-feedback">¡Ok válido!</div>
                           <div class="invalid-feedback">Complete el campo.</div>   
                  </div>


						<div class="col-md-4 mb-4p">
						</br>	<label for="Producto">Producto</label>     
							<select name="COD_PRODUCTO_INVENTARIO" ID="COD_PRODUCTO_INVENTARIO" class="form-control text-uppercase"
							style="font-size:11px; text-align-last: center;"  
							value="" maxlength="100" minlength="1" type="text" required>>
							@foreach($productos as $producto)
							<option value="{{$producto->COD_PRODUCTO_INVENTARIO}}">{{$producto->NOMBRE_PRODUCTO}}</option>
							@endforeach
						  </select>
						</div> 
			
						<div class="col-md-4 mb-4p">
						</br> <label for="Pieza">Pieza producto</label>     
							<select name="COD_PIEZA_PRODUCTO" ID="COD_PIEZA_PRODUCTO" class="form-control text-uppercase"
							style="font-size:11px; text-align:center" 
							value="" maxlength="100" minlength="1" type="text" required> >
							@foreach($piezasfacturas as $piezafactura)
							<option value="{{$piezafactura->COD_PIEZA_PRODUCTO}}">{{$piezafactura->NOMBRE_PIEZA}}</option>
							@endforeach
						  </select>
						</div> 
					</div>		
<div class="form-row  text-center text-uppercase" style="font-size:14px; text-align:center; margin:0 15px 0 15px;">  
						<div class="col-md-12 mb-4">
						 <label for="EMERGENCIA" style="text-transform:uppercase; font-size:18px; text-align: center; font-weight:500; ">
						  "DETALLE DE LA VENTA"</label>
					  </div>
				</div>


<div class="form-row  text-center text-uppercase" style="font-size:14px;  margin:0 15px 0 15px;"> 
						<table class="table table-hover table-sm" id="items">
							<tbody>
								<tr class="item-row">
									<td class="item-name">
									<div class="delete-wpr" >
									Precio producto
									</div>
									</td>
									<td>			
									  <input name="PRECIO_PIEZA"  type="text"  pattern=^[0-9]+([.][0-9]+)?$ id="cantidad_precio" required="" class="cost" placeholder="L. 0.00"/>
									</td>

									<td>
									  <input type="text" class="price iv" disabled/>
									</td>
									<td>
								<input class="iva" disabled/>
								  </td>
								</tr>

								 <tr>
								  
									  <th>Opcional</th>
									  <th>Precio</th>
									  <th>IVA</th>
									  <th>Total</th>
								  </tr>
								<tr class="item-row">
									<td class="item-name">
									<div class="delete-wpr">
									Extra
									</div></td>
						
									<td>			  <input name="DETALLE_CAMBIO"  pattern=^[0-9]+([.][0-9]+)?$ type="text" class="cost opc" placeholder="L. 0.00"/></td>
						
									<td> <input type="text" class="price iv" disabled/></td>
									<td>			<input type="text" class="iva" disabled/></td>
								</tr>
								<tr class="item-row">
									<td class="item-name">
									<div class="delete-wpr">
									Descuento
									</div></td>
						
									<td>			  <input name="DESCUENTO"  pattern=^[0-9]+([.][0-9]+)?$ type="text" class="cost opc" placeholder="L. 0.00"/></td>
				
								</tr>
	
								<td colspan="12" class="blank"></td>
								<td colspan="12" class="total-line list-group-item-primary">Precio</td>
								<td class="total-value">
								<div id="subtotal">
									<input  type="number" id="precio_cotiza" placeholder="L. 0.00" disabled/>
								</div>
									</td>
								
								<tr>
						
									<td colspan="12" class="blank"></td>
									<td colspan="12" class="total-line list-group-item-primary">Total opcionales</td>
									<td class="total-value">
									<div id="total">
										<input name="TOTAL_OPCIONALES" type="number"  pattern=^[0-9]+([.][0-9]+)?$ id="total_opcionales" placeholder="L. 0.00" readonly/>
									</div>
									</td>
								</tr>
								<tr>
									<td colspan="12" class="blank"></td>
									<td colspan="12" class="total-line list-group-item-primary">Total IVA</td>
						
									<td class="total-value">			
										<input name="IVA" type="number" id="total_iva" placeholder="L. 0.00" readonly/>
									</td>
								</tr>
								
									<td colspan="12" class="blank"></td>
									<td colspan="12" class="total-line list-group-item-primary">Total a pagar</td>
									<td class="total-value">
									<div class="due">
										<input name="TOTAL_FACTURA" type="number" id="total_total" placeholder="L. 0.00" readonly>
									</div></td>
								</tr>

							</tbody>
						</table>
					</div>		



			
			
			  <div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					  
					  
		</div>

			<div class="modal-footer">
				<button class="btn btn-primary custom" style="font-size:14px; text-align:center;" type="submit">GUARDAR</button> 
				<button class="btn btn-secondary custom" style="font-size:14px; text-align:center;" type="button" data-dismiss="modal">CERRAR</button>
			</div>
	  </div>
	</div>
  </div>
  
  

</br>
<!--BUSCAR PRODUCTO -->
<div class="col-xl-12">
<form action="">
<div class="form-row">
<div class="col-sm-4">
<input type="text" class="form-control" name="texto" value="" placeholder="Búsqueda">
</div>
<div class="col-auto">
<input type="submit" class="btn btn-primary" value="Buscar">
@can('/pdffacturacion')
<a href="{{route('descargarPDFfactura')}}" class="btn btn btn-success"  style="margin-left: 410px; ">DESCARGAR PDF</a>
@endcan
</div>

</div>
</form>
</div>
<!--FIN BUSCAR PRODUCTO -->
</br>


  	
<!--MENSAJE DE ALERTA -->
@if (session('info'))
      <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
       </div>
   @endif
<!--FIN MENSAJE DE ALERTA -->


</br>			  
		
  <section class="row ">
	<div class="table-responsive">
		<table class="table table-striped table-hover ">
		<thead class="thead-dark">
				<tr style="text-transform:uppercase; font-size:14px; ">
					<th>#</th>
					<th>Fecha</th>
					<th>Producto</th>
					<th>Pieza </th>
					<th>Total</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
			@if(count($facturas)<=0)
      <tr>
      <td colspan="6">No hay resultados</td>
      </tr>
      @else
			@foreach($facturas as $factura)
				<tr class="text-uppercase" style="font-size:13px;">
				    <td>{{$loop->iteration}}</td>
					<td>{{$factura->FECHA}}</td>
					<td>{{$factura->NOMBRE_PRODUCTO}}</td>
					<td>{{$factura->NOMBRE_PIEZA}}</td>
					<td>L. {{$factura->TOTAL_FACTURA}}</td>
					<td>  
					<button type="button" class="btn btn-info"  data-toggle="modal" data-target="#detailModal{{$factura->COD_FACTURA}}" ><i class="far fa-file-alt"></i></button>
					
					<div class="modal fade" id="detailModal{{$factura->COD_FACTURA}}" tabindex="-1" role="dialog" aria-labelledby="tituloVentana2" aria-hidden="true"> 
  <div class="modal-dialog" role="document">      
  <div class="modal-content">
        <div class="modal-header bg-info text-white">
            <h5 id="tituloVentana2">FACTURA</h5>
            <button class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
  </br>
  

 <div class="col-sm-12">
<div class="card border-info mb-3">
  <div class="card-body">
    <h6 class="card-title" >DETALLE DE FACTURA</h6>
              <p class="card-text">
			  <label for="NOMBRE" class="col-form-label">CLIENTE:<option> {{$factura->PRIMER_NOMBRE}} {{$factura->PRIMER_APELLIDO}}</option> </label>
              </br>
              <label for="FECHA" class="col-form-label">FECHA:<option> {{$factura->FECHA}}</option> </label>
              </br>
              <label for="NOMBRE_PRODUCTO" class="col-form-label">PRODUCTO:<option> {{$factura->NOMBRE_PRODUCTO}}</option> </label>
              </br>
              <label for="NOMBRE_PIEZA" class="col-form-label">PIEZA:<option> {{$factura->NOMBRE_PIEZA}}</option> </label>
              </br>
			  <label for="PRECIO" class="col-form-label">PRECIO DE PIEZA:<option> {{$factura->PRECIO_PIEZA}}</option> </label>
              </br>
			  </p>
	<h6 class="card-title" >OPCIONALES</h6>
	<p class="card-text">
              <label for="DETALLE_CAMBIO" class="col-form-label">DETALLE DE CAMBIO:<option> {{$factura->DETALLE_CAMBIO}}</option> </label>
              </br>
              <label for="DESCUENTO" class="col-form-label">DESCUENTO:<option> {{$factura->DESCUENTO}}</option> </label>
              </br>
			  <label for="TOTAL_OPCIONALES" class="col-form-label">TOTAL OPCIONALES:<option> {{$factura->TOTAL_OPCIONALES}}</option> </label>
              </br></br>

			  <label for="IVA" class="col-form-label">IVA:<option> {{$factura->IVA}}</option> </label>
              </br>
              
              <label for="TOTAL_FACTURA" class="col-form-label">TOTAL A PAGAR:<option> L. {{$factura->TOTAL_FACTURA}}</option> </label>
	</p>     
  </div>
</div>
</div>
 </div>
</div>
</div>		
					</td>
					
				</tr>
			</tbody>
			  @endforeach
			  @endif
		</table>
		{{$facturas->links()}}
		Hay {{$facturas->count()}} registros(s) de la página {{$facturas->currentPage()}} de un total de {{$facturas->total()}}
	</div>
</section>
	
  
  </main>





    <script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	   
<script>

$('input,textarea').attr('size',3);

// from http://www.mediacollege.com/internet/javascript/number/round.html
function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    }
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}
function update_price(itemRow) {
  var row;
  if($(itemRow).hasClass('item-row')){
    // if called directly
    row = $(itemRow)
  } else {
    // if called from blur
    row = $(this).parents('.item-row');
  }
    var precio = row.find('.cost').val();
    var price = row.find('.cost').val().replace("$","") * 0.15;
    
    price = roundNumber(price,2);
    isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').val(price);
    
    var iva = parseFloat(precio) + parseFloat(price);
    iva = roundNumber(iva,2);
    isNaN(iva) ? row.find('.iva').html("N/A") : row.find('.iva').val(iva);

 //update_total();
      var precio_cotiza = parseFloat($('#cantidad_precio').val());
        $("input#precio_cotiza").val(parseFloat(precio_cotiza).toFixed(2));
    
    var cantidad_opc = 0;
        $('.opc').each(function(k,v) {
            cantidad_opc += parseFloat($(this).val() || 0);
        });
 
      $('#total_opcionales').val(cantidad_opc.toFixed(2));
      
      var cantidad_iva = 0;
  

         $('.iv').each(function(k,v) {
            cantidad_iva += parseFloat($(this).val() || 0);
        });
     //   console.log(cantidad_iva);

     $('#total_iva').val(cantidad_iva.toFixed(2));
    $('#total_total').val((precio_cotiza + cantidad_opc + cantidad_iva).toFixed(2));
    
}


function bind() {
  $("body").on('keyup', '.cost, .iva, .price, .iv, .opc', update_price);
}

$(document).ready(function() {

  $('input').click(function(){
    $(this).select();
  });
        


  bind();
    
});
							         

        $('#porcentaje').change(function() {
         		   var total_total = parseFloat($('#total_total').val());
            var porcentaje  	= parseFloat($('#porcentaje').val());
            var porcentaje2 = parseFloat($('#porcentaje2').val());
			            var fifty2      = parseFloat($("#fifty2").val());
            				//  console.log(fifty2);
         		   // iva = roundNumber(iva,2);
            $("#fifty").val((total_total * porcentaje).toFixed(2));
          
        		    var fifty       = parseFloat($("#fifty").val());
          
											            $("#porcentaje2").val(((1-porcentaje)*100).toFixed(0));
            			$("#fifty2").val(parseFloat(total_total - fifty).toFixed(2));
          
        });
		</script>
</body>
	
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop