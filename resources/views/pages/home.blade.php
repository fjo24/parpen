@extends('pages.templates.body')
@section('title', 'Excelsior - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="slider hide-on-med-and-down">
    <ul class="slides" style="height: 561px!important;">
        @foreach($sliders as $slider)
        <li>
            <img src="{{asset($slider->imagen)}}">
                <div class="caption box-cap" style="">
                    <div style="">
                        <span class="slidertext2">
                            {!! $slider->texto !!}
                        </span>
                        <span class="slidertext1">
                            {!! $slider->texto2 !!}
                        </span>
                    </div>
                </div>
            </img>
        </li>
        @endforeach
    </ul>
</div>
<div class="container" style="width: 90%">
    <div class="destacado-home">
        <div class="row" style="">
            <div class="tododestacado col l12 s12">
                <div class="col l8 s12">
                    <div class="col l6 s12">
                        <div class="div-bloque card z-depth-0" style="width: 370px;height: 380px;">
                            <div class="card-image center-align">
                                <a class="imgrupo2" href="{!!$bloque1->link !!}">
                                    <img src="{{asset($bloque1->imagen)}}" style="">
                                    </img>
                                </a>
                            </div>
                            <div class="div-nombre center">
                                <p class="texto">
                                    {!!$bloque1->nombre !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col l6 s12">
                        <div class="div-bloque card z-depth-0" style="width: 370px;height: 380px;">
                            <div class="card-image center-align">
                                <a class="imgrupo2" href="{!!$bloque2->link !!}">
                                    <img src="{{asset($bloque2->imagen)}}" style="">
                                    </img>
                                </a>
                            </div>
                            <div class="div-nombre center">
                                <p class="texto">
                                    {!!$bloque2->nombre !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col l12 s12">
                        <div class="div-bloque card z-depth-0" style="width: 370px;">
                            <div class="card-image center-align">
                                <a class="imglarge" href="{!!$bloque4->link !!}">
                                    <img src="{{asset($bloque4->imagen)}}" style="">
                                    </img>
                                </a>
                            </div>
                            <div class="div-nombrelarge center">
                                <p class="texto">
                                    {!!$bloque4->nombre !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l4 s12">
                    <div class="div-categoria card z-depth-0">
                        <div class="card-image center-align">
                            <a class="imgl" href="{!!$bloque3->link !!}">
                                <img src="{{asset($bloque3->imagen)}}" style="">
                                </img>
                            </a>
                        </div>
                        <div class="div-nombre center">
                            <p class="texto">
                                {!!$bloque3->nombre !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="width: 84%;">
    <div class="destacado-home">
        <div class="row" style="">
            <div class="col l6 s12 hide-on-med-and-down">
                <img class="img-destacado responsive-img" src="{!! $contenido->imagen !!}" style="">
                </img>
            </div>
            <div class="dest-text col l6 s12">
                <div class="tit-dest">
                    {!! $contenido->nombre !!}
                </div>
                <hr class="dest-line">
                <div class="subtit-dest">
                    {!! $contenido->descripcion !!}
                </div>
                <div class="cont-dest">
                    {!! $contenido->contenido !!}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cont-btn">
                    <a href="{!! $contenido->link !!}">
                    <button type="button" class="boton btn btn-default pull-right">Conocé mas</button>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('.slider').slider({
        indicators: true,
        height: 561,
    });
</script>
@endsection
