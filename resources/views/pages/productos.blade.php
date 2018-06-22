@extends('pages.templates.body')

@section('titulo', 'Línea Parpen')

@section('contenido')
<link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/slick.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet" type="text/css"/>
<main>
    <section class="productos">
        <div class="container">
            <div class="row">
                {{-- Menu inicio --}}
                <div class="menuproductos col s12 m3">
                    @foreach($categorias as $categoria)
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header">

                                {!! $categoria->nombre !!}
                            </div>
                                @foreach($subcategorias as $subcategoria)
                            @if($subcategoria->id_superior==$categoria->id)
                            <div class="collapsible-body">
                                <ul class="collapsible">
                                    <li>
                                        <div class="collapsible-header">
                                            <i class="material-icons">
                                                filter_drama
                                            </i>
                                            {!! $subcategoria->nombre !!}
                                        </div>
                                        <div class="collapsible-body">
                                            @foreach($productos as $producto)
                                            @if($producto->visible!='privado')
                                        					@if($producto->categoria_id==$subcategoria->id)
		                                            <span>
		                                                {!! $producto->nombre !!}
		                                            </span>
                                            	@endif
                                            @endif
                                         @endforeach
                                        </div>
                                    </li>
                                </ul>
                                </div>
                                @endif
                              @endforeach
                              @foreach($categoria->productos as $product)
                              @if($product->visible!='privado')
                              <div class="collapsible-body">
                                <ul class="collapsible">
                                    <li>
                                        <div class="collapsible-header">
                                            <i class="material-icons">
                                                filter_drama
                                            </i>
                                            {!! $product->nombre !!}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                                @endif
                                @endforeach
                        </li>
                    </ul>
                    @endforeach
                </div>
                {{-- Menu final --}}
            </div>
        </div>
    </section>
</main>
<script src="{{ asset('js/jquery.tinycarousel.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('js/slick.min.js') }}" type="text/javascript">
</script>
<script type="text/javascript">
    $(document).ready(function()
		{
			$('.slider-for').slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  arrows: false,
			  fade: true,
			  asNavFor: '.slider-nav'
			});
			$('.slider-nav').slick({
			  slidesToShow: 3,
			  slidesToScroll: 1,
			  asNavFor: '.slider-for',
			  focusOnSelect: true,
			  dots: false
			});


			

			$( "#cantidad" ).change(function() {
			  	let cantidad = $(this).val();
			  	let precio = $("#input_precio").val();

			  	$('#precio').html("$"+(cantidad*precio).toFixed(2));
			});

			
			$('.modal').modal({
				dismissible: false,
			});

			$('#modal1').modal('open');

		});
</script>
@endsection
