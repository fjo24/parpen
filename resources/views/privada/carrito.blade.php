@extends('privada.templates.body')

@section('titulo', 'Línea Parpen')

@section('contenido')
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>

<body>
<main class="zonaprivada">

	<div class="mipedido left">MI PEDIDO</div>

	<div class="container" style="width:90%;">

@if(isset($success))
	@if($success == 'Ha ocurrido un error al enviar el correo')
		<div class="col s12 card-panel red lighten-4 white-text text-darken-4" style="position: relative;top: 26px;height: 123px;text-align: center;font-size: 27px;">
		{{($success) }}
		</div>
	@endif

	@if($success == 'Pedido enviado correctamente')
		<div class="col s12 card-panel green lighten-4 black-text text-darken-4" style="height: 70px">
		{{($success) }}
		</div>
	@endif
@endif

	  	<div class="row mb50">
				<div class="col s12">
	  			@if(Cart::count() > 0)

					<table class="highlight bordered">

						<thead style="border-bottom: 3px solid #000000;background-color: #FAFAFA;">

							<th></th>
							<th>IMAGEN</th>

							<th>DESCRIPCIÓN</th>

							<th>CATEGORIA</th>

							<th>CODIGO</th>

							<th>CANTIDAD</th>

							<th>PRECIO UNITARIO</th>

							<th>SUBTOTAL</th>

							<th>ELIMINAR</th>

						</thead>
						
						<tbody>
								@php
									$total = 0;
								@endphp
								@foreach(Cart::content()  as $row)
								<tr>
									
									<td></td>
									<td class="timagen " style="width: 95px; height: 85px;"><img class="responsive-img" src="{{ asset($row->options->imagen) }}"/></td>
									<td>{{ $row->name }}</td>
									<td>{{ $row->options->categoria }}</td>
									<td>{{ $row->options->codigo }}</td>
									<td>{{ $row->qty }}</td>
									<td>{{ '$'.$row->price }}</td>
									<td>{{ '$'.$row->price*$row->qty }}</td>
									<td>
										<a href="{{ url('carrito/delete/'.$row->rowId) }}">
											<i class="material-icons" style="color:lightgray;">cancel</i>
										</a>
									</td>
									@php
										$total += $row->price*$row->qty;
									@endphp
								</tr>
								@endforeach
								@if(Cart::count() > 0)
							{!! Form::open(['route'=>'carrito.enviar', 'method'=>'POST']) !!}
								<tr style="border-top: 3px solid black;border-bottom: none;height:150%;color: #595959">
									<td colspan="7">
							        <textarea id="mensaje" name="mensaje" class="materialize-textarea" placeholder="Mensaje"></textarea>
									</td>
									<td class="total fs24 azul bold">SUBTOTAL</td>
									<td>{{ '$'.$total }}</td>
								</tr>
								<tr style="border-bottom: none;">
									<td colspan="7"></td>
									<td class="total fs24 azul bold">IVA 21%</td>
									<td>{{ '$'.$total*0.21}}</td>
								</tr>
								<tr style="border-bottom: none;">
									<td colspan="7"></td>
									<td class="total fs24 azul bold">TOTAL</td>
									<td name>{{ '$'.$total*1.21 }}</td>
								</tr>
								@endif
							</tbody>
						
					</table>
						<div class="row">
							    <div class="col s7">
							      <div class="row">
							        <div class="input-field col s12">

							        </div>
							      </div>
							    </div>
								<div class="col s5 right mt30">
									<div class="col s6">
									</div>
									<div class="col s6">
										<button class="enviar" class="bg-azul" href="#modal1" style="color:white; padding: 20px; background-color: #7D0045; border: none; width: 181px;
    height: 42px!important;"><span style="font-family: 'lato';font-size: 13px;position: relative;bottom: 8px;font-weight: bold;">REALIZAR PEDIDO</span></button></a>
									</div>
									<a type="submit" class="waves-effect waves-light btn modal-trigger" href="#modal1" style="    position: relative;
    top: 258px;
    background: white;">Modal</a>
									  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
									{!! Form::close() !!}
								</div>

									<a href="{{ url('/zonaprivada/productos') }}" class="right"><button class="boton" style="height: 42px;border: 1px solid #7D0045; color:#7D0045; background-color: white; padding: 20px; width: 181px;position: relative;
    bottom: 51px;
    left: 244px;"><span style="font-family: 'lato';font-size: 13px;position: relative;bottom: 8px;font-weight: bold;">SEGUIR COMPRANDO</span></button></a>
						</div>
					@endif
				</div>

			</div>

		

  	</div>
 <!-- Modal Trigger -->
  


</main>


</body>
@endsection
@section('js')
<script class="init" type="text/javascript">
    /*$(document).ready(function() {
    $('#example').DataTable();
} );*/
$(document).ready(function(){
    $("#formpedido").on("change", "input:checkbox", function(){
        $("#formpedido").submit();
    });
});
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>

@endsection