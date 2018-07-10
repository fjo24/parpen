@extends('pages.templates.body')

@section('titulo', 'Novedades - Parpen')

@section('contenido')
<link href="{{ asset('css/pages/novedades.css') }}" rel="stylesheet" type="text/css"/>
            <div class="container" style="width: 80%">
        <nav class="principalnov">
            <div class="row col l12 m12 s12 list">
                
                <ul class="center itemsnov">
                    @if($tipon=='destacados')
                    <li class="col l3 m3 s12">
                        <a class="activado" href="{{ route('novedades', 'destacados') }}">
                            Destacados
                        </a>
                    </li>
                    @else
                    <li class="col l3 m3 s12">
                        <a href="{{ route('novedades', 'destacados') }}">
                            Destacados
                        </a>
                    </li>
                    @endif
                @if($tipon=='exposiciones')
                    <li class="col l3 m3 s12">
                        <a class="activado" href="{{ route('novedades', 'exposiciones') }}">
                            Exposiciones
                        </a>
                    </li>
                    @else
                    <li class="col l3 m3 s12">
                        <a href="{{ route('novedades', 'exposiciones') }}">
                            Exposiciones
                        </a>
                    </li>
                    @endif
                @if($tipon=='ideas')
                    <li class="col l3 m3 s12">
                        <a class="activado" href="{{ route('novedades', 'ideas') }}">
                            Ideas
                        </a>
                    </li>
                    @else
                    <li class="col l3 m3 s12">
                        <a class='' href='{{ route('novedades', 'ideas') }}' data-target='dropdown1'>
                            Ideas
                        </a>
                    </li>
                    @endif

                    @if($tipon=='promociones')
                    <li class="col l3 m3 s12">
                        <a class="activado" href="{{ route('novedades', 'promociones') }}">
                            Promociones
                        </a>
                    </li>
                    @else
                    <li class="col l3 m3 s12">
                        <a class='' href='{{ route('novedades', 'promociones') }}' data-target='dropdown1'>
                            Promociones
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
@foreach($novedades as $novedad)
                @if($novedad->seccion==$tipon)
    <div class="row">
            
        <div class="contnovedad col l12 m12 s12">
            <div class="col l4 m4 s12" style="padding-left: 0px;">
            @foreach($novedad->imagenes as $imagen)
                    <div class="imgnovedad"> 
                        <img class="responsive-img" src="{{ asset($imagen->imagen) }}"/>
                    </div>
                    @if($ready == 0)    
                        @break;
                    @endif
            @endforeach
            </div>
            <div class="col l8 m8 s12" style="padding-left: 29px;">
                <div class="titulonovedad">
                    {!! $novedad->nombre !!}
                </div>
                <div class="fechanovedad">
                    {!! $novedad->fecha !!}
                </div>
                <div class="descripcionnovedad">
                    {!! $novedad->descripcion !!}
                </div>
                <div class="flecha">
                    <img class="responsive-img" src="{{ asset("/img/flecha.png") }}"/>
                    <a href="{{ route('novedadesinfo', $novedad->id) }}">
                    <span class="ver">
                    VER MÁS
                    </span>
                </a>
                </div>
            </div>
        </div>
    </div>
                @endif
    
@endforeach

<br><br><br><br><br><br><br><br><br><br>
            </div>
<script src="{{ asset('js/jquery.tinycarousel.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('js/slick.min.js') }}" type="text/javascript">
</script>
<script type="text/javascript">
</script>
@endsection

