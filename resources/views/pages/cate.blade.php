@extends('pages.templates.body')

@section('titulo', 'Línea Parpen')

@section('contenido')
<link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/slick.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet" type="text/css"/>
<div class="container" style="width: 89%">
    <section class="productos">
        <div class="row">
            <div class="col l12 m12 s12" style="padding-right: 0px;padding-left: 22px;">
                {{-- Menu inicio --}}

                  <!-- Dropdown Trigger -->
  <a class='dropdown-trigger btn show-on-small hide-on-med-and-up' href='#' data-target='dropdown2'>Drop Me!</a>

  <!-- Dropdown Structure -->
  <ul id='dropdown2' class='filtro_categorias dropdown-content'>
  @foreach($categorias as $categoria)
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header" style="text-transform: uppercase;">
                                <a href="{{ route('categorias', $categoria->id)}}">
                                    {!! $categoria->nombre !!}
                                </a>
                            </div>
                            @foreach($subcategorias as $subcategoria)
                            @if($subcategoria->id_superior==$categoria->id)
                            <div class="collapsible-body">
                                <ul class="sub collapsible">
                                    <li>
                                        <div class="collapsible-header" style="text-transform: uppercase;">
                                            {!! $subcategoria->nombre !!}
                                            @isset($records)
                                            <i class="material-icons">
                                                filter_drama
                                            </i>
                                            @endisset
                                        </div>
                                        <div class="collapsible-body" style="padding-left: 25px!important; padding-top: 6px!important; text-transform: uppercase;">
                                            @foreach($productos as $producto)
                                            @if($producto->visible!='privado')
                                                            @if($producto->categoria_id==$subcategoria->id)
                                            <div class="collapsible-header" style="padding-top: 5px;text-transform: uppercase;">
                                                {!! $producto->nombre !!}
                                            </div>
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
                                <ul class="sub collapsible">
                                    <li>
                                        <div class="collapsible-header" style="text-transform: uppercase;">
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

  </ul>
                <div class="menuproductos col l4 m12 s12 hide-on-med-and-down">
                    <div class="menu-titulo">
                        PRODUCTOS
                    </div>
                    <div class="activado menu-todos">
                        <a href="{{ route('productos')}}">
                            TODOS LOS PRODUCTOS
                        </a>
                    </div>
                    @foreach($categorias as $categoria)
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header" style="text-transform: uppercase;">
                                <a href="{{ route('categorias', $categoria->id)}}">
                                    {!! $categoria->nombre !!}
                                </a>
                            </div>
                            @foreach($subcategorias as $subcategoria)
                            @if($subcategoria->id_superior==$categoria->id)
                            <div class="collapsible-body">
                                <ul class="sub collapsible">
                                    <li>
                                        <div class="collapsible-header" style="text-transform: uppercase;">
                                            {!! $subcategoria->nombre !!}
                                            @isset($records)
                                            <i class="material-icons">
                                                filter_drama
                                            </i>
                                            @endisset
                                        </div>
                                        <div class="collapsible-body" style="padding-left: 25px!important; padding-top: 6px!important; text-transform: uppercase;">
                                            @foreach($productos as $producto)
                                            @if($producto->visible!='privado')
                                                            @if($producto->categoria_id==$subcategoria->id)
                                            <div class="collapsible-header" style="padding-top: 5px;text-transform: uppercase;">
                                                {!! $producto->nombre !!}
                                            </div>
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
                                <ul class="sub collapsible">
                                    <li>
                                        <div class="collapsible-header" style="text-transform: uppercase;">
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
                <div class="galeria col l8 m12 s12">
                    @foreach($categorias as $ca)
                    <a href="{{ route('categorias', $ca->id)}}">
                        <div class="center col l4 m4 s12 categoria-tarjeta">
                            <div class="efecto">
                                <span class="central">
                                    <i class="material-icons">
                                        add
                                    </i>
                                    <span class="ingresar">
                                        Ingresar
                                    </span>
                                </span>
                            </div>
                            <img class="center responsive-img" src="{{ asset($ca->imagen) }}"/>
                            <h2 class="center">
                                {{ $ca->nombre }}
                            </h2>
    
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
<script src="{{ asset('js/jquery.tinycarousel.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('js/slick.min.js') }}" type="text/javascript">
</script>
<script type="text/javascript">

$('.dropdown-trigger').dropdown();
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
