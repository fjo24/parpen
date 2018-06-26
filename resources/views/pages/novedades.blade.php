@extends('pages.templates.body')

@section('titulo', 'Novedades - Parpen')

@section('contenido')
<link href="{{ asset('css/pages/novedades.css') }}" rel="stylesheet" type="text/css"/>
            <div class="container" style="width: 80%">
        <nav class="principalnov">
            <div class="row col l12 m12 s12 list">
                
                <ul class="center itemsnov hide-on-med-and-down">
                    @if($tipon=='destacado')
                    <li class="col l3 m3 s6">
                        <a class="activado" href="{{ url('/mantenimiento') }}">
                            Destacados
                        </a>
                    </li>
                    @else
                    <li class="col l3 m3 s6">
                        <a href="{{ url('/mantenimiento') }}">
                            Destacados
                        </a>
                    </li>
                    @endif
                @if($tipon=='exposiciones')
                    <li class="col l3 m3 s6">
                        <a class="activo" href="{{ url('/categorias') }}">
                            Exposiciones
                        </a>
                    </li>
                    @else
                    <li class="col l3 m3 s6">
                        <a href="{{ url('/categorias') }}">
                            Exposiciones
                        </a>
                    </li>
                    @endif
                @if($tipon=='ideas')
                    <li class="col l3 m3 s6">
                        <a class="activo" href="{{ url('/productos') }}">
                            Ideas
                        </a>
                    </li>
                    @else
                    <li class="col l3 m3 s6">
                        <a class='' href='{{ url('/productos') }}' data-target='dropdown1'>
                            Ideas
                        </a>
                    </li>
                    @endif

                    @if($tipon=='promociones')
                    <li class="col l3 m3 s6">
                        <a class="activo" href="{{ url('/productos') }}">
                            Promociones
                        </a>
                    </li>
                    @else
                    <li class="col l3 m3 s6">
                        <a class='' href='{{ url('/productos') }}' data-target='dropdown1'>
                            Promociones
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
@foreach($novedades as $novedad)
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
            </div>
        </div>
    </div>
    
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

