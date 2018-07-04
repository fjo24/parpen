@extends('pages.templates.body')
@section('title', 'Parpen - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
<div class="slider hide-on-med-and-down">
    <ul class="slides" style="height: 561px!important;width: 100%">
        @foreach($sliders as $slider)
        <li>
            <img src="{{asset($slider->imagen)}}">
            @if(isset($slider->texto)||isset($slider->texto2))
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
                @endif
            </img>
        </li>
        @endforeach
    </ul>
</div>
<div class="container" style="width: 90%">
    <div class="destacado-home">
        <div class="row" style="margin-bottom: -5px!important;">
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
    <div class="destacado-home2">
<div class="container" style="width: 84%;">
        <div class="row" style="position: relative;top: 66px;">
            <div class="col l6 s12 hide-on-med-and-down">
                <img class="img-destacado responsive-img" src="{!! $contenido->imagen !!}" style="">
                </img>
            </div>
            <div class="dest-text col l6 s12">
                <div class="tit-dest">
                    {!! $contenido->nombre !!}
                </div>
                <div class="subtit-dest">
                    {!! $contenido->descripcion !!}
                </div>
                <div class="cont-dest">
                    {!! $contenido->contenido !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="seccion-banner" style="margin-top: -35px;">
    <div class="btexto">
        <div class="tbanner center">
            <p>
                Reciba Nuestras Novedades
            </p>
        </div>
        <div class="tbanner2 center">
            <p>
                Inspiración, ideas, nuevos productos y mucho más
            </p>
        </div>
        <div class="tbanner3 center">
     
                {!!Form::open(['route'=>'newsletters.store', 'method'=>'POST', 'files' => true])!!}
        <div class="row" style="font-family: 'Lato'; color: #B0B0B0;margin-left: 34%;margin-top: -1%;">
            <div class="input-field left" style="top: -10px;width: 271px;height: 42px;background-color: white;border-bottom:none;border-bottom: none;margin-left: 0%;border-radius: 3px;border: 1px solid #B0B0B0;">
                        {!!Form::text('email', null , ['class'=>'', 'required', 'placeholder' => 'ESCRIBA SU EMAIL'])!!}
            </div>
            <button class="boton2 btn waves-effect waves-light" name="action" type="submit">
                ENVIAR
            </button>
        </div>

        {!!Form::close()!!}
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
