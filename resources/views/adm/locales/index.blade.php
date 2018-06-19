@extends('adm.layouts.frame')

@section('titulo', 'Listado de Locales')

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
        <table class="highlight bordered">
            <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Dirección
                </th>
                <th>
                	Localidad
                </th>
                <th class="center">
                    Provincia
                </th>
                <th class="text-right">
                    Acciones
                </th>
            </thead>
            <tbody>
                @foreach($locales as $local)
                <tr>
                    <td>
                        {!!$local->nombre!!}
                    </td>
                    <td>
                        {!!$local->direccion!!}
                    </td>
                    <td>
                    	{!!$local->localidad!!}
                     </td>
                    <td>
                        {!!$local->provincia!!}
                    </td>
                    <td class="text-right">
                        <a href="{{ route('locales.edit',$local->id)}}">
                            <i class="material-icons">
                                create
                            </i>
                        </a>
                        {!!Form::open(['class'=>'en-linea', 'route'=>['locales.destroy', $local->id], 'method' => 'DELETE'])!!}
                        <button class="submit-button" onclick="return confirm_delete(this);" type="submit">
                            <i class="material-icons red-text">
                                cancel
                            </i>
                        </button>
                        {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('js/eliminar.js') }}" type="text/javascript">
</script>
@endsection
