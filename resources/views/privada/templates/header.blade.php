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
  <ul id='dropdown1' class='dropdown-content' style="background: none">
    <div class="container" style="background: #FBFBFB; margin-top: 37px !important; outline: none; width: 300px;">

        <div class="input-field col s12" style="padding-left: 10px; margin: 2px; margin-top: 15px;">
          {!!Form::text('email',null,['class'=>'validate', 'required', 'autocomplete' => 'off'])!!}
          <label for="email" style="color:white; font-weight: 500; font-family: 'Raleway'; font-size: 15px;">Email</label>
        </div>
        <div class="input-field col s12" style="padding-left: 10px; margin: 2px;">
          {!!Form::password('contrasena',null,['class'=>'validate', 'required'])!!}
          <label for="contrasena" style="color:white; font-weight: 500; font-family: 'Raleway'; font-size: 15px;">Contraseña</label>
        </div>

        <style type="text/css">
            .color-del-boton{
                 background-color: #01A0E2;
            }
            .color-del-boton:hover{
                 background-color: #01A0E2;
            }

        </style>

        <div class="col s12">
            {!!Form::submit('INGRESAR', ['class'=>'waves-effect waves-light btn right colorboton'])!!}
        </div>
        <div class="col s12">
        <a href="">
          <li style="font-size: 12px; text-decoration: underline; color: #4B4B4B; font-size: 14px; font-family: 'Raleway';">Olvidé mi contraseña</li>
        </a>
        </div>
        
      <li class="center" style="font-size: 12px; text-decoration: underline;">
      <a href="">
      CREAR CUENTA
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
            <div class="container" style="width: 85%">
        <nav class="principal">
                <ul class="item-left left hide-on-med-and-down">
                    @if($activo=='productos')
                    <li>
                        <a class="zactivo" href="{{ route('zproductos') }}">
                            PRODUCTOS
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('zproductos') }}">
                            PRODUCTOS
                        </a>
                    </li>
                    @endif
                @if($activo=='pedido')
                    <li>
                        <a class="zactivo" href="{{ route('carrito') }}">
                            PEDIDOS
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('carrito') }}">
                            PEDIDOS
                        </a>
                    </li>
                    @endif
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
                        <a class="zactivo" href="{{ url('/consejos') }}">
                            LISTA DE PRECIOS
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/consejos') }}">
                            LISTA DE PRECIOS
                        </a>
                    </li>
                    @endif
                        
                    @if($activo=='novedades')
                    <li>
                        <a class="zactivo" href="{{ route('novedades', 'destacados') }}" style="width: 47%;line-height: 135%;position: relative;margin-top: 1%;">
                            OFERTAS Y NOVEDADES
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('novedades', 'destacados') }}" style="width: 47%;line-height: 135%;position: relative;margin-top: 1%;">
                            OFERTAS Y NOVEDADES
                        </a>
                    </li>
                    @endif
                </ul>
        </nav>
            </div>
        <ul class="sidenav" id="mobile-demo">
            <li>
                <a href="{{ url('/mantenimiento') }}">
                    PRODUCTOS
                </a>
            </li>
            <li>
                <a href="{{ url('/categorias') }}">
                    PEDIDOS
                </a>
            </li>
            <li>
                <a href="{{ url('/productos') }}">
                    LISTA DE PRECIOS
                </a>
            </li>
            <li>
                <a href="{{ url('/consejos') }}">
                    OFERTAS Y NOVEDADES
                </a>
            </li>
        </ul>
        
    </header>
</div>