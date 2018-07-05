@extends('privada.templates.body')

@section('titulo', 'Línea Parpen')

@section('contenido')
<link href="{{ asset('css/privada/zproductos.css') }}" rel="stylesheet" type="text/css"/>
<div class="container" style="width: 89%">
    <div class="masiva center">
        Compra Masiva
    </div>
</div>
<body class="wide comments tprivada">
    <div class="fw-body">
        <div class="container" style="width: 85%">
            <div class="center buscadorprivado">


                {!!  Form::open(['route' => 'buscador', 'method' => 'POST', 'id'=>'buscador']) !!}
                <input id="pbuscar" name="pbuscar" type="psearch">
                </input>
                    {!! Form::close() !!}
            </div>
            <table class="display" id="tprivada" style="width:100%;margin-bottom: 13%;">
                <thead>
                    <tr class="trprincipal">
                        <th class="">
                            Imagen
                        </th>
                        <th class="">
                            Código
                        </th>
                        <th class="">
                            Descripción
                        </th>
                        <th class="">
                            Medidas
                        </th>
                        <th class="">
                            Embalaje
                        </th>
                        <th style="width: 128px" class="">
                            Cantidad de Embalajes
                        </th>
                        <th style="width: 128px" class="">
                            Precio Unitario
                        </th>
                        <th>
                            Pedir
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                     {!! Form::open(['route'=>'carrito.add','id'=>'formpedido','METHOD'=>'POST'])!!}
                        <tr>
                            <div><input type="hidden" value="{{$producto->id}}" name="id"></div>
                            <td class="timagen " style="width: 95px; height: 85px;">
                            @foreach($producto->imagenes as $img)
                            <img class="responsive-img" src="{{ asset($img->imagen) }}"/>
                            @if($ready == 0)    
                                        @break;
                                    @endif
                            @endforeach
                            </td>
                            <td class="tcodigo ">{!! $producto->codigo !!}</td>
                            <td class="tdescripcion ">
                                {!! $producto->nombre !!}
                            </td>
                            <td class="" value="medida" name="medida">{!! $producto->medidas !!}</td>
                            {{ Form::hidden('medidas', $producto->medidas) }}
                            <td class="">{!! $producto->embalaje !!}</td>
                            <td class="">
                                <label for="cantidad">Cantidad</label>
                            <input type="number" name="cantidad" value="1" style="width: 46px;">
                            </td>
                            <td class="">
                                {!! $producto->precio !!}
                            </td>
                            {{ Form::hidden('precio', $producto->precio) }}

                            <td class="">
                                
                                @isset($items)

                                @foreach($items as $item)
                            @if($item->id==$producto->id)
                                <?php $shop = 1; ?>
                                <button type="submit" name="submit" style="padding-bottom: 0px;padding-right: 0px;border-top-width: 0px;padding-left: 0px;background-color: white;border-left-width: 0px;margin-right: 0px;border-right-width: 0px;    border-bottom-width: 0px;"><i class="material-icons" style="color: green; background-color: transparent!important;">check_circle</i></button>
                            @endif
                            @endforeach
                            @endisset
                            @if($shop==0)
                                <button type="submit" name="submit" style="padding-bottom: 0px;padding-right: 0px;border-top-width: 0px;padding-left: 0px;background-color: white;border-left-width: 0px;margin-right: 0px;border-right-width: 0px;    border-bottom-width: 0px;"><i class="material-icons" style="color: #FF5F8A; background-color: transparent!important;">shopping_cart</i></button>
                            @endif
                            <?php $shop = 0; ?>
                            </td>
  
                            </td>
                        </tr>
                    {!!Form::close()!!}
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</body>

 
@endsection
@section('js')
<script class="init" type="text/javascript">
    /*$(document).ready(function() {
    $('#example').DataTable();
} );*/
$(document).ready(function(){
    $("#formpedido").on("change", "input:checkbox", function(){
        $("#formpedido").submit();
    });
});


  $(document).ready(function(){
    $('.modal').modal();
  });
          

</script>

@endsection
