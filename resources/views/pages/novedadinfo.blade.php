@extends('pages.templates.body')

@section('titulo', 'Novedades - Parpen')

@section('contenido')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
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
    </div>
<div class="container" style="width: 53%; margin-top: 5%; margin-bottom: 5%;">
<div class="slider">
    <ul class="slides" style="height: 561px!important;">
        @foreach($novedad->imagenes as $imagen)
        <li>
            <img src="{{asset($imagen->imagen)}}" style="width: 720px!important;">
            </img>
        </li>
        @endforeach
    </ul>
</div>
<div class="titulonovedad">
                    {!! $novedad->nombre !!}
                </div>
                <div class="fechanovedad">
                    {!! $novedad->fecha !!}
                </div>
                <div class="descripcionnovedad">
                    {!! $novedad->descripcion !!}
                </div>
                @isset($novedad->video)
                    <div class="center masproducto hide-on-med-and-down col l12 m12 s12" style="margin-top: 9%;margin-bottom: 16%">
                        <iframe width="671" height="383" src="{!! $novedad->video!!}" frameborder="0" allowfullscreen></iframe>              
                    </div>
                    @endisset
</div>
<script src="{{ asset('js/jquery.tinycarousel.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('js/slick.min.js') }}" type="text/javascript">
</script>
<script type="text/javascript">
</script>
@endsection

@section('js')
<script type="text/javascript">
    $('.slider').slider({
        indicators: true,
        height: 540,
        width:720,
    });
</script>
@endsection
