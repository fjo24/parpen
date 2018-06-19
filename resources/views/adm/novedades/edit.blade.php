@extends('adm.layouts.frame')

@section('titulo', 'Editar novedad')

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
        {!!Form::model($novedad, ['route'=>['novedades.update',$novedad->id], 'method'=>'PUT', 'files' => true])!!}
        <div class="row">
            <div class="input-field col l6 s12">
                {!!Form::label('Nombre:')!!}
                        {!!Form::text('nombre', null , ['class'=>'', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Fecha:')!!}
                        {!!Form::text('fecha', null , ['class'=>'datepicker', ''])!!}
            </div>
            <div class="input-field col l6 s12">
                {!! Form::select('seccion', ['destacados' => 'Destacados', 'exposiciones' => 'Exposiciones', 'ideas' => 'Ideas', 'promociones' => 'Promociones'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione sección']) !!}
            </div>
            <div class="input-field col l6 s12">
                {!!Form::label('Orden:')!!}
                        {!!Form::text('orden', null , ['class'=>'', ''])!!}
            </div>
        </div>
        <label class="col l12 s12" for="descripcion">
            Descripcion
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="descripcion" name="descripcion" required="">
            {!!$novedad->descripcion!!}
            </textarea>
        </div>
        <label class="col l12 s12" for="contenido">
            Contenido
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="contenido" name="contenido" required="">
            {!!$novedad->contenido!!}
            </textarea>
        </div>
        <div class="input-field col l12 s12">
            {!!Form::label('Link de video:')!!}
                        {!!Form::text('video', null , ['class'=>'', ''])!!}
        </div>
        <label class="col l12 s12" for="video_descripcion">
            Descripcion del video
        </label>
        <div class="input-field col l12 s12">
            <textarea class="materialize-textarea" id="video_descripcion" name="video_descripcion" required="">
            {!!$novedad->video_descripcion!!}
            </textarea>
        </div>
        <div class="col l12 s12 no-padding">
            <button class="btn-large waves-effect waves-light right" name="action" type="submit">
                Crear
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
  $(document).ready(function(){
   $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
              selectYears: 200
        });
   });

    CKEDITOR.replace('descripcion');
    CKEDITOR.replace('contenido');
    CKEDITOR.replace('video_descripcion');
    CKEDITOR.config.height = '150px';
    CKEDITOR.config.width = '100%';
    
$(document).ready(function(){
    $('select').formSelect();
  });
</script>
@endsection
