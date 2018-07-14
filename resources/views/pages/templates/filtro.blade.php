<ul class="collapsible show-on-small hide-on-med-and-up">
    <li>
      <div class="titulo_filtro collapsible-header"><span>Filtrar</span></div>
      <div class="collapsible-body">
  @foreach($categorias as $categoria)
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header" style="text-transform: uppercase;">
                                <a href="{{ route('categorias', $categoria->id)}}">
                                    {!! $categoria->nombre !!}
                                </a>
                            </div>
                            @foreach($subcategorias as $subcategoria)
                            @if($subcategoria->id_superior==$categoria->id)
                            <div class="collapsible-body">
                                <ul class="sub collapsible">
                                    <li>
                                        <div class="collapsible-header" style="text-transform: uppercase;">
                                            {!! $subcategoria->nombre !!}
                                            @isset($records)
                                            <i class="material-icons">
                                                filter_drama
                                            </i>
                                            @endisset
                                        </div>
                                        <div class="collapsible-body" style="padding-left: 25px!important; padding-top: 6px!important; text-transform: uppercase;">
                                            @foreach($productos as $producto)
                                            @if($producto->visible!='privado')
                                                            @if($producto->categoria_id==$subcategoria->id)
                                            <div class="collapsible-header" style="padding-top: 5px;text-transform: uppercase;">
                                                {!! $producto->nombre !!}
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
                                <ul class="sub collapsible">
                                    <li>
                                        <div class="collapsible-header" style="text-transform: uppercase;">
                                            {!! $product->nombre !!}
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