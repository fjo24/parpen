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
               <div class="links col l12 s12 m12 left">
               <h7>
                    <a href="/categorias" style="color: gray; padding-left: 75px;">
                        Productos | 
                    </a>
                    <a href="{{ route('categorias', $cat->id)}}" style="color: gray;text-transform: lowercase">
                        {!!$cat->nombre !!}
                    </a>
                </h7>
             </div>
                 {{-- Menu inicio --}}
                <div class="menuproductos2 col l4 m4 s12">
                    <div class="menu-titulo">
                        FILTROS
                    </div>
                    <div class="menu-todos">
                        <a href="{{ route('productos')}}">
                            TODOS LOS PRODUCTOS
                        </a>
                    </div>
                    @foreach($categorias as $categoria)
                    <ul class="collapsible">
                        @if(($categoria->id == $ref))
                        <li class="active">
                           <div class="collapsible-header activado">
                            @else
                            <li>
                                <div class="collapsible-header">
                                @endif
                                 <a href="{{ route('categorias', $categoria->id)}}">
                                    {!! $categoria->nombre !!}
                                 </a>
                                </div>
                        @foreach($subcategorias as $subcategoria)
                           @if($subcategoria->id_superior==$categoria->id)
                              @if(($categoria->id == $ref))
                        
                                <div class="collapsible-body" style="display: block;">
                                    <ul class="sub collapsible">

                                    @if(($subcategoria->id == $subref))
                                            <li class="active">
                                                <div class="collapsible-header activado">
                                                    @else
                                                    <li>
                                                        <div class="collapsible-header">
                                                            @endif
                               
                                             <a href="{{ route('subcategorias', $subcategoria->id)}}">
                                                {!! $subcategoria->nombre !!}
                                             </a>
                                            @isset($records)
                                                <i class="material-icons">
                                                    filter_drama
                                                </i>
                                                @endisset
                                            </div>
                                            <div class="collapsible-body" style="padding-left: 25px!important; padding-top: 6px!important;">
                                                @foreach($productos as $producto)
                                            @if($producto->visible!='privado')
                                                            @if($producto->categoria_id==$subcategoria->id)
                                                            @if(($producto->id == $p->id))
                      
                           <div class="collapsible-header activado" style="padding-top: 0px;padding-bottom: 29px;">
                            @else
                                
                                                <div class="collapsible-header" style="padding-top: 0px;padding-bottom: 29px;">
                                @endif
                                                <a href="{{ route('productoinfo', $producto->id)}}">
                                                    {!! $producto->nombre !!}
                                                    </a>
                                                </div>
                                                @endif
                                            @endif
                                         @endforeach
                                            </div>
                                        </li>
                                    </ul>
                                 </div>
                              @else
                                 <div class="collapsible-body">
                                    <ul class="sub collapsible">
                                        <li>
                                            <div class="collapsible-header">
                                                {!! $subcategoria->nombre !!}
                                            @isset($records)
                                                <i class="material-icons">
                                                    filter_drama
                                                </i>
                                                @endisset
                                            </div>
                                            <div class="collapsible-body" style="padding-left: 25px!important; padding-top: 6px!important;">
                                                @foreach($productos as $producto)
                                            @if($producto->visible!='privado')
                                                            @if($producto->categoria_id==$subcategoria->id)
                                                            @if(($producto->id == $p->id))
                                                <div class="collapsible-header activado">
                                                    @else
                                                <div class="collapsible-header" style="padding-top: 5px;">
                                                            @endif
                                                <a href="{{ route('productoinfo', $producto->id)}}">
                                                    {!! $producto->nombre !!}
                                                    </a>
                                                </div>
                                                @endif
                                            @endif
                                         @endforeach
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                              @endif
                           @endif
                        @endforeach
                        @foreach($categoria->productos as $product)
                           @if($product->visible!='privado')
                                    <div class="collapsible-body" style="display: block;">
                                        <ul class="collapsible">
                                            <li>
                                                <div class="collapsible-header">
                                                <a href="{{ route('productoinfo', $product->id)}}">
                                                    {!! $product->nombre !!}
                                                </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                        @endforeach
                            </li>
                        </li>
                    </ul>
                    @endforeach
                </div>
                {{-- Menu final --}}
                <div class="galeria2 col l8 m8 s12">
                    <div class="col l12 m12 s12" style="padding: 0;    height: auto;">
                        
                        <div class="col l6 m12 s12 galeriadeproducto">
                                



                                <div class="cont-ser">
                                            <div class="row imggrande">
                                                <div class="col s12" style="padding-left: 0px;">
                                                    @foreach($p->imagenes as $imagen)
                                                    <div class="cont-img">
                                                        <img alt="" class="responsive-img" id="producto" src="{{asset($imagen->imagen)}}" style="width: 100%;border:1px solid #AAAAAA;">
                                                        </img>
                                                    </div>
                                                    @if($ready == 0)    
                                        @break;
                                    @endif
                        @endforeach
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12" style="padding-left: 0px;padding-right: 0px;">
                                                    @foreach($p->imagenes as $imagen)
                                                    <div class="col l4 s4 m2" style="padding-left: 0px;">
                                                        <div class="cont-img">
                                                            <img alt="" class="responsive-img" onclick="actualizar('{{asset($imagen->imagen)}}')" src="{{asset($imagen->imagen)}}" style="border: 1px solid #AAAAAA;">
                                                            </img>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </br>
                                </div>




                        </div>
                        <div class="col l6 m12 s12 infoproducto" style="padding-left: 29px;">
                            <div class="nombreproducto">    
                                {!! $p->nombre !!}
                            </div>
                            <hr class="pro-line"/>
                            <div class="codigoproducto">    
                                Código: {!! $p->codigo !!}
                            </div>
                            <div class="descripcionproducto">    
                                {!! $p->descripcion !!}
                            </div>
                            <div class="contenidoproducto">    
                                {!! $p->contenido !!}
                            </div>
                               <a href="{{ route('contacto', $p->nombre) }}">
        <button class="pedido btn btn-default left" href="" style="background-color: #7D0045;">
            <span class="rpedido">
                
            REALIZAR CONSULTA
            </span>
        </button>
    </a>
                        </div>
              
                    </div>



                @isset($p->video)
                    <div class="masproducto col l12 m12 s12">
                        <div class="col l6 m12 s12">
                                <div class="cont-ser">
                                                <div class="col s12" style="padding-left: 0px;">
                            <div class="tituloproducto">    
                                Más sobre este producto
                            </div>
                            <div class="descripcionvideo">    
                                {!! $p->video_descripcion !!}
                            </div>

                                                </div>
                                </div>
                           </div>
                        <div class="col l6 m12 s12" style="padding-left: 29px;">
                            <iframe width="381" height="216" src="{!! $p->video!!}" frameborder="0" allowfullscreen></iframe>
                        </div>
              
                    </div>
                    @endisset

                    <div class="col l12 m12 s12 infoproducto" style="padding-left: 29px;">
                            <div class="trelacionados">    
                                Productos Relacionados
                            </div>
                            <hr class="rela-line"/>
                    </div>
                    <div class="col l12 m12 s12 relablock">
                    @foreach($relacionados as $relacionado)
                    <a href="{{ route('productoinfo', $relacionado->id)}}">
                        <div class="col l4 m12 s12 categoria-tarjeta">
                            @foreach($relacionado->imagenes as $img)
                            <img class="responsive-img" src="{{ asset($img->imagen) }}"/>
                            <h2 class="center">
                                {{ $relacionado->nombre }}
                            </h2>
                            @if($ready == 0)    
                                        @break;
                                    @endif
                            @endforeach
                        </div>
                    </a>
                    @endforeach 
                    </div>


            
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

    function actualizar(imagen){
      document.getElementById('producto').src = imagen;
    }
</script>
@endsection

