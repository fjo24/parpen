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
        <li>
            {!!$error!!}
        </li>
        @endforeach
    </ul>
</div>
@endif
        @isset($success)
<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
    {{ $success }}
</div>
@endisset
<div class="container" style="width: 89%;">
<div class="slider">
    <ul class="slides" style="height: 461px!important;width: 100%">
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
</div>
<div class="container" style="width: 87%;">
    <section class="destacados">
        <div class="row">
            <div class="col s12 l8 no-padding">
                <a href="{!!$bloque1->link !!}">
                <div class="col s12 l6">
                    <div class="card">
                        <div class="cuadradas card-image">
                            <img src="{{asset($bloque1->imagen)}}" style="">
                            </img>
                            <div class="card-title" style="display: table;background-color: rgba(179, 0, 74, 0.86);font-family: 'Asap';width: 100%;">
                                <p style="display: table-cell;text-align: center;">
                                    {!!$bloque1->nombre !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                <a href="{!!$bloque2->link !!}">
                    <div class="col s12 l6">
                        <div class="card">
                            <div class="cuadradas card-image">
                                <img src="{{asset($bloque2->imagen)}}" style="">
                                </img>
                                <div class="card-title" style="display: table;background-color: rgba(179, 0, 74, 0.86);font-family: 'Asap';width: 100%;">
                                    <p style="display: table-cell;text-align: center;">
                                        {!!$bloque2->nombre !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{!!$bloque4->link !!}">
                    <div class="col s12">
                        <div class="card">
                            <div class="larga card-image">
                                <img src="{{asset($bloque4->imagen)}}" style="">
                                </img>
                                <div class="card-title" style="display: table;background-color: rgba(179, 0, 74, 0.86);font-family: 'Asap';width: 100%;">
                                    <p style="display: table-cell;text-align: center;">
                                        {!!$bloque4->nombre !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s12 l4 no-padding">
                <a href="{!!$bloque3->link !!}">
                <div class="col s12">
                    <div class="card">
                        <div class="alta card-image">
                            <img class="b3" src="{{asset($bloque3->imagen)}}" style="">
                            </img>
                            <div class="card-title" style="display: table;background-color: rgba(179, 0, 74, 0.86);font-family: 'Asap';width: 100%;">
                                <p style="display: table-cell;text-align: center;">
                                    {!!$bloque3->nombre !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </section>
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
<div class="seccion-banner" style="margin-top: 0px;">
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
