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
                        <div style="text-transform: uppercase;">
                            BIENVENIDO, {{ Auth::User()->name }}
                        </div>
                    </a>
                </div>
                  <!-- Dropdown LOGIN -->
                  <div class="areaprivada"> 
<ul class="dropdown-content" id="dropdown1">
                <li>
                    <a class="right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color:#FF5B88;">
                        {{ __('  Cerrar Sesión') }}
                    </a>
                    <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
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
                    <i class="material-icons center" style="width: 150%">
                        menu
                    </i>
                </a>
                <ul class="item-right right hide-on-med-and-down">
                    @if($activo=='listadeprecios')
                    <li>
                        <a class="zactivo" href="{{ route('listadeprecios') }}">
                            LISTA DE PRECIOS
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('listadeprecios') }}">
                            LISTA DE PRECIOS
                        </a>
                    </li>
                    @endif
                        
                    @if($activo=='ofertasynovedades')
                    <li>
                        <a class="zactivo" href="{{ route('ofertasynovedades') }}" style="width: 47%;line-height: 135%;position: relative;margin-top: 1%;">
                            OFERTAS Y NOVEDADES
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('ofertasynovedades') }}" style="width: 47%;line-height: 135%;position: relative;margin-top: 1%;">
                            OFERTAS Y NOVEDADES
                        </a>
                    </li>
                    @endif
                </ul>
        </nav>
            </div>
        <ul class="sidenav" id="mobile-demo" style="position: absolute;color: #7D0045;">
        <div class="center logoside">
            <a class="brand-logoside" href="">
                <img alt="" class="responsive-img" src="{{ asset('img/logo_principal.jpg') }}">
                </img>
            </a>
        </div>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ route('zproductos') }}">
                    <i class="material-icons"  style="color: #FF5F8A!important;">
                        brush
                    </i>
                    PRODUCTOS
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ route('carrito') }}">
                    <i class="material-icons"  style="color: #FF5F8A!important;">
                        shopping_cart
                    </i>
                    PEDIDOS
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ route('listadeprecios') }}">
                    <i class="material-icons"  style="color: #FF5F8A!important;">
                        attach_money
                    </i>
                    LISTA DE PRECIOS
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ route('ofertasynovedades') }}">
                    <i class="material-icons"  style="color: #FF5F8A!important;">
                        new_releases
                    </i>
                    OFERTAS Y NOVEDADES
                </a>
            </li>
        </ul>
        
    </header>
</div>
