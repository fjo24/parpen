@extends('adm.layouts.frame')

@section('titulo', 'Editar contenido home')

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
        {!!Form::model($contacto, ['route'=>['contacto.update',$contacto->id], 'method'=>'PUT', 'files' => true])!!}
            <div class="input-field col l12 s12">
                {!!Form::label('Texto en area de contacto:')!!}
						{!!Form::text('contenido', $contacto->contenido , ['class'=>''])!!}
            </div>

        <div class="col l12 s12 no-padding">
            <button class="btn-large waves-effect waves-light pink right" name="action" type="submit">
                Crear
                <i class="material-icons right">
                    send
                </i>
            </button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
</script>
@endsection
