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
    <div class="container" style="background: #FBFBFB; margin-top: 37px !important; outline: none; width: 256px;">
        {!!Form::open(['route'=>'login', 'method'=>'POST'])!!}
        <div class="input-field col s12" style="padding-left: 10px; margin: 2px; margin-top: 15px;">
          {!!Form::text('email',null,['class'=>'', 'required', 'autocomplete' => 'off'])!!}
          <label for="email" style="color:white; font-weight: 500; font-family: 'Raleway'; font-size: 15px;">Email</label>
        </div>
        <div class="input-field col s12" style="padding-left: 10px; margin: 2px;" placeholder="contrasena">
          {!!Form::password('contrasena',null,['class'=>'', 'required'])!!}
          <label for="contrasena" style="color:white; font-weight: 500; font-family: 'Raleway'; font-size: 15px;" >Contraseña</label>
        </div>

        <style type="text/css">
            .color-del-boton{
                 background-color: #01A0E2;
            }
            .color-del-boton:hover{
                 background-color: #01A0E2;
            }

        </style>

        <div class="col s12" style="    position: relative;
    right: 24%;">
            {!!Form::submit('INGRESAR', ['class'=>'waves-effect waves-light btn right colorboton'])!!}
        </div>
        
      <li class="center" style="font-size: 12px;color: pink; text-decoration: none;">
      <a href="" style="color: #FF608A!important">
      CREAR UNA CUENTA NUEVA
        </a>
      </li>
      
       </div>
  </ul>

                  </div>
  <!-- Dropdown LOGIN FIN -->


                    <div class="li-redes">
                        <a href="">
                            <img alt="" class="" src="{{asset('img/layouts/facebook.png')}}">
                            </img>
                        </a>
                        <a href="">
                            <img alt="" class="" src="{{asset('img/layouts/instagram.png')}}">
                            </img>
                        </a>
                        <a href="">
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
                    @if($activo=='mantenimiento')
                    <li>
                        <a class="activo" href="{{ url('/mantenimiento') }}">
                            INICIO
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/mantenimiento') }}">
                            INICIO
                        </a>
                    </li>
                    @endif
                @if($activo=='productos')
                    <li>
                        <a class="activo" href="{{ url('/categorias') }}">
                            QUIÉNES SOMOS
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/categorias') }}">
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
                    <img alt="" src="{{asset('img/logo_principal.png')}}">
                    </img>
                </a>
                <a class="sidenav-trigger" data-target="mobile-demo" href="#">
                    <i class="material-icons center" style="background-color: gray; width: 150%">
                        menu
                    </i>
                </a>
                <ul class="item-right right hide-on-med-and-down">
                    @if($activo=='consejos')
                    <li>
                        <a class="activo" href="{{ url('/consejos') }}">
                            DÓNDE COMPRAR
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/consejos') }}">
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
                    @if($activo=='clientes')
                    <li>
                        <a class="activo" href="{{ url('/clientes') }}">
                            CONTACTO
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/clientes') }}">
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