@extends('pages.templates.body')

@section('titulo', 'Donde comprar - Parpen')

@section('contenido')
<!DOCTYPE doctype html>
<html lang="es">
    <body>
        <!-- CUERPO -->
        <?php $cont_mapa = 0; ?>
        @foreach($mapas as $mapa)
        <input id="p1_{{ $cont_mapa }}" name="" type="hidden" value="{{ $mapa->lat }}">
            <input id="p2_{{ $cont_mapa }}" name="" type="hidden" value="{{ $mapa->lng }}">
                <?php $cont_mapa++; ?>
                @endforeach
				<input type="hidden" id="cantidad" name="" value="{{ $cont_mapa }}">
                    <link href="{{ asset('css/pages/donde.css') }}" rel="stylesheet">
                        <main>
                            <div class="container-distribuidor">
                                {!!Form::open(['route'=>'donde.comprar', 'method'=>'GET'])!!}
                                <div class="row no-margin">
                                    <div class="input-field col s12 l3">
                                        <input autocomplete="off" background="white" class="direccion_mapa" id="direccion" name="direccion" placeholder="Ingresa una ubicación" style="background-color: white" type="text"/>
                                        <label class="titulos_input_direccion" for="direccion">
                                            Provincia, localidad, barrio o dirección
                                        </label>
                                    </div>
                                    <div class="input-field col s12 l3">
                                        <input autocomplete="off" background="white" class="radio_mapa" id="radio" name="radio" placeholder="Radio en km" style="background-color: white" type="number"/>
                                        <label class="titulos_input_radio" for="radio">
                                            Radio de búsqueda
                                        </label>
                                    </div>
                                    <div class="col s12 l2">
                                        <button class="boton_mapa btn waves-effect waves-light" name="action" type="submit">
                                            BUSCAR
                                        </button>
                                    </div>
                                    <div class="ver_mapa col s12 l2">
                                        <a href="{{ url('/donde') }}">
                                            <img alt="" src="{{asset('img/ver_mapa.png')}}">
                                            </img>
                                        </a>
                                    </div>
                                    <div class="ver_listado col s12 l2" style="    margin-top: 1%;">
                                        <a href="{{ url('/dondelistado') }}">
                                            <img alt="" src="{{asset('img/listado.png')}}">
                                            </img>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </main>
                    </link>
    </body>
</html>
<div id="map">
</div>
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


	 	var direccion = '<?php if(isset($_GET['direccion'])){echo $_GET['direccion'];}else{echo '';} ?>';
	 	var kilometros = '<?php if(isset($_GET['radio'])){echo $_GET['radio'];}else{echo '';} ?>';

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
			  	var ubicacion1, ubicacion2, ubicacion3, ubicacion4;
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
            window.location.href = "/parpen";
        });
</script>
@endsection
