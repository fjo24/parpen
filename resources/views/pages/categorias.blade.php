@extends('page.main')

@section('titulo', 'Línea Drimer')

@section('cuerpo')
   
   <link type="text/css" rel="stylesheet" href="{{ asset('css/productos.css') }}"/>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}"/>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}"/>

   <main>
      @if(!session('cliente'))
      <!-- Modal Structure -->
      <section class="modal-section">
         <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-header">
                  <a href="{{ url('/') }}" class="cerrar right" style="margin-top: 15px; margin-right: 15px;">CERRAR X</a>
             </div>
            <div class="modal-body row" style="margin: 0">
                <h2>Ingresar</h2>
                <p>Ingresá los siguientes datos para ver los precios.</p>
               {!!Form::open(['route'=>'login.invitado', 'method'=>'POST'])!!}
                  <div class="col s12">
                        <div class="row invitado">
                        <div class="input-field col s12 l6">
                              {!!Form::text('nombre',null,['class'=>'validate', 'required'])!!}
                              <label for="nombre">Nombre y Apellido</label>
                        </div>
                        <div class="input-field col s12 l6">
                              {!!Form::email('email',null,['class'=>'validate', 'required'])!!}
                              <label for="email">Correo electronico</label>
                        </div>
                        </div>

                        <div class="col s12">
                           {!!Form::submit('ingresar', ['class'=>'boton right invitado mayorista'])!!}
                        </div>
                  </div>
               {!!Form::close()!!}
            </div>
         </div>
      </section>
      @endif
      <section class="productos">
         <div class="container">
            <div class="row miga">
               <div class="col s12">
                  <a href="{{ url('/productos') }}">productos</a>
                  @foreach($miga as $item)
                     <span>|</span>
                     <a href="{{ url('/categorias/'.$item->id) }}">{{ $item->nombre }}</a>
                  @endforeach
               </div>
            </div>
            <div class="row">
               {{-- Menu inicio --}}

               <div class="col s12 m3">
                  <ul class="collapsible" data-collapsible="accordion">
                     @foreach($familias as $familia)
                      <li>
                              @if($familia->id == $familia_id )
                              {{-- != $padres_s[0] --}}
                              <div class="collapsible-header active">
                           @else
                              <div class="collapsible-header">
                           @endif
                              <a href="{{ url('categorias/'.$familia->id) }}">
                                    {{ $familia->nombre }}<i class="material-icons">expand_more</i>
                              </a>
                              </div>
                           <div class="collapsible-body">
                              <ul class="collapsible" data-collapsible="accordion">
                              @foreach($categorias as $categoria)
                                 @if($categoria->padre == $familia->id)
                                 <li>
                                          @if((isset($padres_s[1]) && $categoria->id != $padres_s[1]) || !isset($padres_s[1]))
                                          <div class="collapsible-header">
                                       @else
                                          <div class="collapsible-header active">
                                       @endif
                                          <a href="{{ url('categorias/'.$categoria->id) }}">
                                                {{ $categoria->nombre }}<i class="material-icons">expand_more</i>
                                             </a>
                                          </div>
                                       <div class="collapsible-body">
                                          <ul class="collapsible" data-collapsible="accordion">
                                          @foreach($categorias as $categoria_2)
                                             @if($categoria_2->padre == $categoria->id)
                                             <li>
                                                      @if((isset($padres_s[2]) && $categoria_2->id != $padres_s[2]) || !isset($padres_s[2]))
                                                      <div class="collapsible-header">
                                                   @else
                                                      <div class="collapsible-header active">
                                                   @endif
                                                      <a href="{{ url('categorias/'.$categoria_2->id) }}">
                                                            {{ $categoria_2->nombre }}<i class="material-icons">expand_more</i>
                                                         </a>
                                                      </div>
                                                   <div class="collapsible-body">
                                                      <ul class="collapsible" data-collapsible="accordion">
                                                      @foreach($categorias as $categoria_3)
                                                         @if($categoria_3->padre == $categoria_2->id)
                                                         <li>
                                                                  @if((isset($padres_s[3]) && $categoria_3->id != $padres_s[3]) || !isset($padres_s[3]))
                                                                  <div class="collapsible-header">
                                                               @else
                                                                  <div class="collapsible-header active">
                                                               @endif
                                                                  <a href="{{ url('categorias/'.$categoria_3->id) }}">
                                                                        {{ $categoria_3->nombre }}<i class="material-icons">expand_more</i>
                                                                     </a>
                                                                  </div>
                                                               <div class="collapsible-body">
                                                                  <ul class="collapsible" data-collapsible="accordion">
                                                                     @foreach($productos as $productonav)
                                                                        @if($productonav->categoria == $categoria_3->id)
                                                                     <li>
                                                                              <div class="collapsible-header">
                                                                              <a href="{{ url('categorias/'.$productonav->id) }}">
                                                                                    {{ $productonav->nombre }}<i class="material-icons">expand_more</i>
                                                                                 </a>
                                                                              </div>
                                                                        </li>
                                                                        @endif
                                                                     @endforeach
                                                                  </ul>
                                                               </div>
                                                            </li>
                                                            @endif
                                                         @endforeach
                                                         @foreach($productos as $productonav)
                                                            @if($productonav->categoria == $categoria_2->id)
                                                         <li>
                                                                  <div class="collapsible-header">
                                                                  <a href="{{ url('producto/'.$productonav->id) }}">
                                                                        {{ $productonav->nombre }}
                                                                     </a>
                                                                  </div>
                                                            </li>
                                                            @endif
                                                         @endforeach
                                                      </ul>
                                                   </div>
                                                </li>
                                                @endif
                                             @endforeach
                                             @foreach($productos as $productonav)
                                                @if($productonav->categoria == $categoria->id)
                                             <li>
                                                      <div class="collapsible-header">
                                                      <a href="{{ url('producto/'.$productonav->id) }}">
                                                            {{ $productonav->nombre }}
                                                         </a>
                                                      </div>
                                                </li>
                                                @endif
                                             @endforeach
                                          </ul>
                                       </div>
                                    </li>
                                    @endif
                                 @endforeach

                                 
                                 @foreach($productox as $productonav)
                                    @if($productonav->categoria == $familia->id)
                                 <li>
                                       <div class="collapsible-header">
                                          <a href="{{ url('producto/'.$productonav->id.'/'.$familia->id) }}">
                                             {{ $productonav->nombre }}
                                          </a>
                                       </div>
                                    </li>
                                    @endif
                                 @endforeach

                              </ul>
                        </div>
                      </li>
                      @endforeach
                   </ul>
               </div>
               {{-- Menu final --}}

               <div class="col s12 m9 ficha">
                  <div class="col s12 m5" style=" margin-bottom: 30px;">
                     <div class="slider-for">
                        <div>
                           <img class="responsive-img" src="{{ asset('imagenes/productos/'.$producto->ruta) }}">
                        </div>
                        @foreach($sliders as $slider)
                           <div>
                              <img class="responsive-img" src="{{ asset('imagenes/sliders/'.$slider->ruta) }}">
                           </div>
                        @endforeach
                     </div>
                     <div class="slider-nav">
                        <div>
                           <img class="responsive-img" src="{{ asset('imagenes/productos/'.$producto->ruta) }}">
                        </div>
                        @foreach($sliders as $slider)
                           <div>
                              <img class="responsive-img" src="{{ asset('imagenes/sliders/'.$slider->ruta) }}">
                           </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="col s12 m7">
                     <h1>{{ $producto->nombre }}</h1>
                     <div class="linea"></div>
                     <h2>Detalles</h2>
                     <span class="col s4 margin-car no-padding caracteristica">C&oacutedigo</span>
                     <span class="col s8 margin-car no-padding">{{ $producto->codigo }}</span>
                     <span class="col s4 margin-car no-padding caracteristica">Sabor</span>
                     <span class="col s8 margin-car no-padding">{{ $producto->sabor }}</span>
                     <span class="col s4 margin-car no-padding caracteristica">Peso neto</span>
                     <span class="col s8 margin-car no-padding">{{ $producto->peso }}</span>
                     <span class="col s4 margin-car no-padding caracteristica">Vencimiento</span>
                     <span class="col s8 margin-car no-padding">{{ $producto->vencimiento }}</span>
                     <span class="col s4 margin-car no-padding caracteristica">Presentaci&oacuten</span>
                     <span class="col s8 margin-car no-padding">{{ $producto->presentacion }}</span>
                     {!!Form::open(['route'=>'carrito.add', 'method'=>'POST'])!!}
                        <div class="input-field col s2 no-padding">
                           {!!Form::label('Unidades')!!}
                           {!!Form::number('cantidad', $producto->unidades,['id' => 'cantidad', 'class'=>'validate', 'min' => $producto->unidades, 'step' => $producto->unidades, 'value' => $producto->presentacion, 'required'])!!}
                           {!!Form::hidden('input_precio',$producto->{"precio_".session('tipo_cliente')},['id' => 'input_precio'])!!}
                           {!!Form::hidden('producto',$producto->id)!!}
                        </div>
                        {{-- <span style="margin-top: 1rem; height: 3rem; line-height: 3rem;" class="col s2">x{{ $producto->unidades }}</span> --}}
                        <div class="col s8 offset-s2 costo">
                           <span id="precio">${{ number_format($producto->{"precio_".session('tipo_cliente')}*$producto->unidades,2) }}</span>
                           <p>Los precios no incluyen IVA</p>
                        </div>
                        {!!Form::submit('añadir al carrito', ['class'=>'boton'])!!}
                        <i class="material-icons">add_shopping_cart</i>
                     {!!Form::close()!!} 
                  </div>

                  <div class="col s12 contenido">

                     @if($producto->video != null)
                        <h2>Conoce mas del producto</h2>
                        
                        <div class="video-container">
                             <iframe width="853" height="480" src="{{ $producto->video }}" frameborder="0" allowfullscreen></iframe>
                         </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>

   <script type="text/javascript" src="{{ asset('js/jquery.tinycarousel.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
   
   <script type="text/javascript">
      $(document).ready(function()
      {
         $('.slider-for').slick({
           slidesToShow: 1,
           slidesToScroll: 1,
           arrows: false,
           fade: true,
           asNavFor: '.slider-nav'
         });
         $('.slider-nav').slick({
           slidesToShow: 3,
           slidesToScroll: 1,
           asNavFor: '.slider-for',
           focusOnSelect: true,
           dots: false
         });


         

         $( "#cantidad" ).change(function() {
            let cantidad = $(this).val();
            let precio = $("#input_precio").val();

            $('#precio').html("$"+(cantidad*precio).toFixed(2));
         });

         
         $('.modal').modal({
            dismissible: false,
         });

         $('#modal1').modal('open');

      });


   </script>


@endsection