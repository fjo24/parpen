@extends('adm.layouts.frame')

@section('titulo', 'Categoria de productos')

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
    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="panel panel-default table-responsive">

            <div class="panel-heading">
                <h3 class="panel-title">Carga de productos <span class="glyphicon glyphicon-upload" style="font-size: 24px;color: cadetblue;"></span></h3>
            </div>
            @include('flash::message')
      <div class="panel-body">
       <h2>ATENCIÓN</h2>
       <p>Para hacer la carga de productos mediante un archivo Excel, deberá cumplir lo siguiente:
       </p>
       <p>1. El archivo debe guardarlo en formato <strong>.CSV</strong> .</p>
       <p>2. Este archivo debe estar estructurado por columnas, las cuales deberan ser cada campo de la tabla. Deberán ser 9 columnas. La columna 2 debe contener las medidas. La columna 5 debe contener el precio en dólares y la columna 9 debe tener el ID del producto (puede consultarlo en la sección Editar Productos). </p>
       </div>
        
       

<div class="links">
    <form method="post" action="{{route('importCat')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" name="excel">
        <br><br>
        <input type="submit" value="Enviar" style="padding: 10px 20px;">
    </form>
</div>
      
    </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){
    $('select').formSelect();
  });

</script>
@endsection