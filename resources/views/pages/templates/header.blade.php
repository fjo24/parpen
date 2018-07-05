    <header>
        {{-- BARRA SUPERIOR --}}
        <div class="top">
            <div class="container nav-flex hide-on-med-and-down">
                <div class="list-top row">
                    <div class="li-red">

                        {!!  Form::open(['route' => 'buscar', 'method' => 'POST', 'id'=>'buscador']) !!}
          <input type="search" id="buscar" name="buscar">
        {!! Form::close() !!} 
                        <a href="">
                            <img alt="" src="{{asset('img/layouts/lupa.png')}}">
                            </img>
                        </a>
                    </div>
                    <div class="li-icondistribuidor">
                        <a href="">
                            <img alt="" src="{{asset('img/layouts/icono_distribuidor.png')}}">
                            </img>
                        </a>
                    </div>
                <div class="li-distribuidor">
                    <a class="dropdown-trigger" data-target="dropdown1" href="#">
                        <img alt="" src="">
                            ZONA DISTRIBUIDOR
                        </img>
                    </a>
                </div>
                  <!-- Dropdown LOGIN -->
                  <div class="areaprivada"> 
  <ul id='dropdown1' class='dropdown-content' style="background: none, width:400px!important; height: 300px!important;">
    <div class="container" style="background: #FAFAFA; margin-top: 19px !important; outline: none; width: 282px;">

        {!!Form::open(['route'=>'login', 'method'=>'POST'])!!}
        <div class="input-field col s12" style="padding-left: 10px;    border-bottom: 1px solid #595959; margin: 2px; margin-top: 14px;">
          {!!Form::text('username',null,['class'=>'', 'required', 'autocomplete' => 'off'])!!}
          <label for="username" style="color:gray; font-weight: 500; font-family: 'Lato'; font-size: 15px;">Username</label>
        </div>
        <div class="input-field col s12" style="padding-left: 10px;    border-bottom: 1px solid #595959; margin: 2px;" placeholder="password">
          {!!Form::password('password',null,['class'=>'', 'required'])!!}
          <label for="password" style="color:gray; font-weight: 500; font-family: 'Lato'; font-size: 15px;" >Contraseña</label>
        </div>

        <style type="text/css">
            .color-del-boton{
                 background-color: #01A0E2;
            }
            .color-del-boton:hover{
                 background-color: #01A0E2;
            }

        </style>

        <div class="col s12" style="position: relative;right: 24%;">
        <input class="waves-effect waves-light btn right colorboton" type="submit" value="INGRESAR" style="
    color: white;
">

        </div>
        
      <li class="center" style="font-size: 12px;color: pink; text-decoration: none;">
      <a href="{{ url('registro') }}" style="color: #FF608A!important; text-align: center;">
      CREAR UNA CUENTA NUEVA
        </a>
      </li>
      {!!Form::close()!!}
       </div>
  </ul>

                  </div>
  <!-- Dropdown LOGIN FIN -->


                    <div class="li-redes">
                        <a href="https://es-la.facebook.com/parpenargentina/">
                            <img alt="" class="" src="{{asset('img/layouts/facebook.png')}}">
                            </img>
                        </a>
                        <a href="https://www.instagram.com/parpenargentina/">
                            <img alt="" class="" src="{{asset('img/layouts/instagram.png')}}">
                            </img>
                        </a>
                        <a href="https://www.youtube.com/channel/UCSrcO4wXydma0e5SnYICd1g">
                            <img alt="" class="" src="{{asset('img/layouts/youtube.png')}}">
                            </img>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- BARRA PRINCIPAL --}}
        <nav class="principal">
            <div class="container" style="width: 93%">
                <ul class="item-left left hide-on-med-and-down">
                    @if($activo=='home')
                    <li>
                        <a class="activo" href="{{ url('/') }}">
                            INICIO
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/') }}">
                            INICIO
                        </a>
                    </li>
                    @endif
                @if($activo=='empresa')
                    <li>
                        <a class="activo" href="{{ url('/empresa') }}">
                            QUIÉNES SOMOS
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/empresa') }}">
                            QUIÉNES SOMOS
                        </a>
                    </li>
                    @endif
                @if($activo=='productos')
                    <li>
                        <a class="activo" href="{{ url('/productos') }}">
                            PRODUCTOS
                        </a>
                    </li>
                    @else
                    <li>
                        <a class='' href='{{ url('/productos') }}' data-target='dropdown1'>
                            PRODUCTOS
                        </a>
                        <!-- Dropdown Structure -->
                        <!--
  <ul id='dropdown1' class='dropdown-content'>
  @foreach($categorias as $category)         
                                <li>
                                    <a class="dropdown-button" data-activates="dropdown-categorias" data-beloworigin="true" data-constrainwidth="false" href="">
                                        {{ $category->nombre }}
                                    </a>
                                    <ul id="dropdown-categorias{{ $category->id }}" class="dropdown-content dropdown-categorias" style="">
                                        @foreach($categorias as $category)
                                                <li>
                                                    <a href="" class="dropdown-button" data-activates="dropdown-categorias" data-beloworigin="true" data-constrainwidth="false">{{ $category->nombre }}</a>
                                                </li>
                                                <li class="divider"></li>
                                        @endforeach
                                    </ul>
                                </li>                                  
                            @endforeach

  </ul> 
                    </li>
                    @endif
  -->
                </ul>
                <a class="brand-logo center" href="{{ url('/') }}">
                    <img alt="" src="{{asset('img/logo_footer.png')}}">
                    </img>
                </a>
                <a class="sidenav-trigger" data-target="mobile-demo" href="#">
                    <i class="material-icons center" style="background-color: gray; width: 150%">
                        menu
                    </i>
                </a>
                <ul class="item-right right hide-on-med-and-down">
                    @if($activo=='donde')
                    <li>
                        <a class="activo" href="{{ url('/donde') }}">
                            DÓNDE COMPRAR
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/donde') }}">
                            DÓNDE COMPRAR
                        </a>
                    </li>
                    @endif
                    @if($activo=='novedades')
                    <li>
                        <a class="activo" href="{{ route('novedades', 'destacados') }}">
                            NOVEDADES
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('novedades', 'destacados') }}">
                            NOVEDADES
                        </a>
                    </li>
                    @endif
                    @if($activo=='contacto')
                    <li>
                        <a class="activo" href="{{ url('/contacto') }}">
                            CONTACTO
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/contacto') }}">
                            CONTACTO
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li>
                <a href="{{ url('/mantenimiento') }}">
                    INICIO
                </a>
            </li>
            <li>
                <a href="{{ url('/categorias') }}">
                    QUIÉNES SOMOS
                </a>
            </li>
            <li>
                <a href="{{ url('/productos') }}">
                    PRODUCTOS
                </a>
            </li>
            <li>
                <a href="{{ url('/consejos') }}">
                    DÓNDE COMPRAR
                </a>
            </li>
            <li>
                <a href="{{ url('/categoriaobras') }}">
                    NOVEDADES
                </a>
            </li>
            <li>
                <a href="{{ url('/clientes') }}">
                    CONTACTO
                </a>
            </li>
        </ul>
        
    </header>
</div>