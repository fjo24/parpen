@extends('adm.layouts.frame')

@section('titulo', 'Editar destacado')

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
        @if(session('success'))
<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col s12">
        {!!Form::model($destacado, ['route'=>['destacadoshomes.update',$destacado->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Nombre:')!!}
                        {!!Form::text('nombre', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Link:')!!}
                        {!!Form::text('link', null , ['class'=>'', ''])!!}
            </div>
        </div>
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Orden:')!!}
                        {!!Form::text('orden', null , ['class'=>'', ''])!!}
            </div>
            <div class="file-field input-field col l6 s12">
                <div class="btn">
                    <span>
                        Imagen
                    </span>
                    {!! Form::file('imagen') !!}
                </div>
                @if($destacado->id==3)
                <div class="file-path-wrapper" style="">
                    {!! Form::text('imagen',null, ['class'=>'file-path ']) !!}
                {!!Form::label('Recomendado: 370px - 750px')!!}
                </div>
                @elseif($destacado->id==4)
                <div class="file-path-wrapper" style="">
                    {!! Form::text('imagen',null, ['class'=>'file-path ']) !!}
                {!!Form::label('Recomendado: 764px - 359px')!!}
                </div>
                @else
                <div class="file-path-wrapper" style="">
                    {!! Form::text('imagen',null, ['class'=>'file-path ']) !!}
                {!!Form::label('Recomendado: 370px - 370px')!!}
                @endif
                </div>
            </div>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="btn-large waves-effect waves-light right" style="background: #FF5E88;" name="action" type="submit">
                Editar
                <i class="material-icons right">
                    send
                </i>
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js">
</script>
<script>
    CKEDITOR.replace('contenido');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
    
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection
