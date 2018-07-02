@extends('pages.templates.body')

@section('titulo', 'Novedades - Parpen')

@section('contenido')
<!doctype html>
<html lang="es">
    <body>
        <!-- CUERPO -->
        <?php $cont_mapa = 0; ?>
	@foreach($mapas as $mapa)
		<input type="hidden" id="p1_{{ $cont_mapa }}" name="" value="{{ $mapa->lat }}">
		<input type="hidden" id="p2_{{ $cont_mapa }}" name="" value="{{ $mapa->lng }}">
		<?php $cont_mapa++; ?>
	@endforeach
        

			
	<input type="hidden" id="cantidad" name="" value="2">

	<link href="{{ asset('css/pages/donde.css') }}" rel="stylesheet">

	<main>
		<div class="container-distribuidor">
					{!!Form::open(['route'=>'donde.comprar', 'method'=>'GET'])!!}
							      	<div class="row no-margin">
							        	<div class="input-field col s12 l5">
							          		{!!Form::text('direccion',null,['class'=>'validate', 'id' => 'direccion', 'placeholder' => 'Ingresa una ubicación'])!!}
							          		<label for="direccion">Provincia, localidad, barrio o dirección</label>
							        	</div>
							        	<div class="input-field col s12 l3">
							          		{!!Form::text('radio',null,['class'=>'validate', 'id' => 'radio', 'placeholder' => 'Radio en km'])!!}
							          		<label for="radio">Radio de búsqueda</label>
							        	</div>
							        	<div class="col s12 l3">
										   <input class="boton" type="submit" value="buscar">

							        	</div>
							      	</div>
							    </div>
					{!!Form::close()!!}
		</div>
		<div id="map"></div>		
		
	</main>
	  </body>
</html>
@endsection
@section('js')
<script type="text/javascript">
	var map;

	jQuery(function($) {

	    var script = document.createElement('script');
	    script.src = "//maps.googleapis.com/maps/api/js?sensor=false&callback=initialize&key=AIzaSyAZUlidy4Exa3bvZLRh4qgqx4lwlLy6khw&libraries=geometry,places";
	    document.body.appendChild(script);
	});

		
	function initialize() 
	{ 
	    var mapOptions = {
	    	center: new google.maps.LatLng('-34.5582798', '-58.4838633'),
	    	zoom: 12,
	    	scrollwheel: true,
	    	disableDefaultUI: false,
	    	mapTypeId: google.maps.MapTypeId.ROADMAP
	 	};

	 	var codificador = new google.maps.Geocoder();


	 	var direccion = '';
	 	var kilometros = '';

	 	if(kilometros == ''){
	 		kilometros = 1000000;
	 	}

	 	var position;

	 	codificador.geocode({ 'address': direccion }, function(results, status){

	 		if (status == 'OK') {

		 		position = {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()
		 		};

			  	map = new google.maps.Map(document.getElementById("map"),mapOptions);
			  
			  	var cantidad = $("#cantidad").val();
			  	var p1, p2;
			  	var ubicacion1, ubicacion2;
			  	var distancia;
			  	ubicacion2 = new google.maps.LatLng(position.lat, position.lng);
			  	map.setCenter(position);

			  	for(var i = 0; i < cantidad; i++) {
			  		p1 = $("#p1_"+i).val();
			  		p2 = $("#p2_"+i).val();

			  		ubicacion1 = new google.maps.LatLng(p1, p2);
	 				distancia = google.maps.geometry.spherical.computeDistanceBetween(ubicacion1, ubicacion2);
	 				if(distancia/1000 < kilometros){
			    		addMarker(p1, p2);
	 				}
			  	}

	 		}else{
	 			map = new google.maps.Map(document.getElementById("map"),mapOptions);
			  
			  	var cantidad = $("#cantidad").val();
			  
			  	for(var i = 0; i < cantidad; i++) {
			    	addMarker($("#p1_"+i).val(), $("#p2_"+i).val());
			  	}
	 		}
	 	});

	  	googleAutocompleteInstance = new google.maps.places.Autocomplete($('#direccion')[0], {
			types: ['geocode'],
			componentRestrictions: {
			country: 'AR'
			}
		});
	 }

	 function addMarker(c1, c2){
	     marker = new google.maps.Marker({
	        position: new google.maps.LatLng(c1, c2),
	        map: map,
	    });
	}

</script>
	

  
    <script type="text/javascript">
        $('.logo').click(() => {
            window.location.href = "/drimer";
        });
    </script>
  @endsection