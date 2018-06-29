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
                {!!  Form::open(['route' => 'buscar', 'method' => 'POST', 'id'=>'buscador']) !!}
                <input id="pbuscar" name="pbuscar" type="psearch">
                </input>
                    {!! Form::close() !!}
            </div>
            <table class="display" id="tprivada" style="width:100%">
                <thead>
                    <tr class="trprincipal">
                        <th class="center">
                            Imagen
                        </th>
                        <th class="center">
                            Código
                        </th>
                        <th class="center">
                            Descripción
                        </th>
                        <th class="center">
                            Medidas
                        </th>
                        <th class="center">
                            Embalaje
                        </th>
                        <th style="width: 128px" class="center">
                            Cantidad de Embalajes
                        </th>
                        <th style="width: 128px" class="center">
                            Precio Unitario
                        </th>
                        <th>
                            Pedir
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    {!!Form::open(['route'=>'carrito.store','id'=>'formpedido' ,'method'=>'POST', 'files' => true])!!}
                        <tr>
                            <td class="timagen center" style="width: 95px; height: 85px;">
                            @foreach($producto->imagenes as $img)
                            <img class="responsive-img" src="{{ asset($img->imagen) }}"/>
                            @if($ready == 0)    
                                        @break;
                                    @endif
                            @endforeach
                            </td>
                            <td class="tcodigo center">{!! $producto->codigo !!}</td>
                            <td class="tdescripcion center">
                                {!! $producto->nombre !!}
                            </td>
                            <td class="center" value="medida" name="medida">{!! $producto->medidas !!}</td>
                            {{ Form::hidden('medidas', $producto->medidas) }}
                            <td class="center">{!! $producto->embalaje !!}</td>
                            <td class="center">
                                <input class="tnumcantidad" id="tnumcantidad" type="number" min="0" max="100" value="0" step="1"></input>
                            </td>
                            <td class="center">
                                {!! $producto->precio !!}
                            </td>
                            {{ Form::hidden('precio', $producto->precio) }}
                            <td class="center"><input type="checkbox" name="test" value="value1"  onchange="document.getElementById('formpedido').submit()">
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


        //Si cambian el numero de cantidad, se calculan los numeros nuevamente
    /*    $(document).on('change', '.tnumcantidad', function () {
            calculate()
        });
*/
// LLAMAR A CALCULATE CON BOTON CALCULATE

//Llamar calculate y costos cuando se agrega producto


        //Fin  Caluclar total de los costos

        //Inicio calculate, realiza la mayoria de los calculos de la pagina, llamando a las otras funciones
     /*   function calculate() {

            var precio = {{ $producto->precio }};

            if ($(".tnumcantidad").val() > 0) {
                var total = eval($(".tnumcantidad").val() * precio);
            }

            $(".cantidad").val(precio)

        }*/
        //Fin calculate
</script>

@endsection
