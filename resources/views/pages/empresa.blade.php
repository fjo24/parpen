@extends('pages.templates.body')
@section('title', 'Parpen - Quienes Somos?')
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

    <div class="destacado-empresa">
<div class="container" style="width: 84%;">
        <div class="row" style="position: relative;top: 66px;">
            <div class="col l6 s12">
                <img class="img-destacado responsive-img" src="{!! $contenido->imagen !!}" style="">
                </img>
            </div>
            <div class="dest-text col l6 s12">
                <div class="tit-dest" style="margin-top: -10px;">
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
@endsection

@section('js')
<script type="text/javascript">
    $('.slider').slider({
        indicators: true,
        height: 561,
    });
</script>
@endsection
