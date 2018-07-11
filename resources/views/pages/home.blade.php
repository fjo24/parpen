@extends('pages.templates.body')
@section('title', 'Parpen - Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet"/>
@endsection
@section('contenido')
@if(count($errors) > 0)
        <div class="col s12 card-panel red lighten-4 red-text text-darken-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!!$error!!}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @isset($success)
        <div class="col s12 card-panel green lighten-4 green-text text-darken-4">
          {{ $success }}
        </div>
        @endisset
       

<div class="slider">
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
                <div class="col l8 s12 no-padding">
                    <div class="col l6 m12 s12">
                        <div class="card">
                            <div class="card-image">
                                    <img src="{{asset($bloque1->imagen)}}" style="">
                                    </img>
                            </div>
                            <div class="div-nombre center">
                                <p class="texto">
                                    {!!$bloque1->nombre !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col l6 m12 s12">
                        <div class="card">
                            <div class="card-image center-align">
                                <a class="responsive-img" href="{!!$bloque2->link !!}">
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
                    <div class="col l12 m12 s12">
                        <div class="card">
                            <div class="card-image center-align">
                                <a class="responsive-img" href="{!!$bloque4->link !!}">
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
                <div class="col l4 m12 s12 no-padding">
                    <div class="card">
                        <div class="card-image center-align">
                            <a class="responsive-img" href="{!!$bloque3->link !!}">
                                <img src="{{asset($bloque3->imagen)}}" style="">
                                </img>
                            </a>
                        </div>
                        <div class="div-nombrehight center">
                            <p class="texto">
                                {!!$bloque3->nombre !!}
                            </p>
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
            <div class="newsletter input-field left" style="">
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
