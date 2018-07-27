<ul class="collapsible show-on-medium-and-down hide-on-large-only">
    <li>
      <div class="titulo_filtro collapsible-header"><span>Filtrar</span></div>
      <div class="collapsible-body" style="background: #fafafa;height: 100%;">
  @foreach($categorias as $categoria)
                    <ul class="cuerpo_filtro collapsible">
                        @if(($categoria->id == $ref))
                        <li class="active">
                           <div class="catemovil collapsible-header activado">
                            @else
                            <li>
                                <div class="catemovil collapsible-header">
                                @endif

                                <a href="{{ route('categorias', $categoria->id)}}">
                                {!! $categoria->nombre !!}
                        </a>
                            <i class="material-icons right">
                                arrow_drop_down
                            </i>
                            </div>
                            @foreach($subcategorias as $subcategoria)
                            @if($subcategoria->id_superior==$categoria->id)
                            <div class="collapsible-body">
                                <ul class="cuerpo_filtro collapsible">
                                    @if(($subcategoria->id == $subref))
                        <li class="active">
                           <div class="subcatemovil collapsible-header activado">
                            @else
                            <li class="">
                           <div class="subcatemovil collapsible-header">
                                @endif
                                        <a href="{{ route('subcategorias', $subcategoria->id)}}">
                                            {!! $subcategoria->nombre !!}
                                        </a> 
                                        <i class="material-icons right">
                                            arrow_drop_down
                                        </i>
                                        </div>
                                        <div class="collapsible-body" style="padding-top: 6px!important; text-transform: uppercase;">
                                            @foreach($productos as $producto)
                                            @if($producto->visible!='privado')
                                                            @if($producto->categoria_id==$subcategoria->id)
                                            <div class="productomovil collapsible-header" style="">
                                                <a class="" href="{{ route('productoinfo', $producto->id)}}" style="   width: 100%;">
                                                    {!! $producto->nombre !!}
                                                </a>
                                            </div>
                                            @endif
                                            @endif
                                         @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @endif
                              @endforeach
                              @foreach($categoria->productos as $product)
                              @if($product->visible!='privado')
                            <div class="collapsible-body">
                                <ul class="cuerpo_filtro collapsible">
                                    <li>
                                        <div class="productomovil collapsible-header" style="">
                                            <a class="" href="{{ route('productoinfo', $product->id)}}" style="">
                                                {!! $product->nombre !!}
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @endif
                                @endforeach
                        </li>
                    </ul>
                    @endforeach
      </div>
    </li>
  </ul>