<div container="">
    <header>
        {{-- BARRA SUPERIOR --}}
        <div class="top">
            <div class="container nav-flex hide-on-med-and-down">
                <div class="list-top row">
                    <div class="li-red">
                        <a href="">
                            <img alt="" src="{{asset('img/layouts/lupa.png')}}">
                            </img>
                        </a>
                    </div>
                    <div class="li-telefono">
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
            <div class="container" style="width: 90%">
                <ul class="item-left left hide-on-med-and-down">
                    @if($activo=='mantenimiento')
                    <li>
                        <a class="activo" href="{{ url('/mantenimiento') }}">
                            MANTENIMIENTO
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/mantenimiento') }}">
                            MANTENIMIENTO
                        </a>
                    </li>
                    @endif
                @if($activo=='productos')
                    <li>
                        <a class="activo" href="{{ url('/categorias') }}">
                            PRODUCTOS
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/categorias') }}">
                            PRODUCTOS
                        </a>
                    </li>
                    @endif
                @if($activo=='empresa')
                    <li>
                        <a class="activo" href="{{ url('/empresa') }}">
                            EMPRESA
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/empresa') }}">
                            EMPRESA
                        </a>
                    </li>
                    @endif
                </ul>
                <a class="brand-logo center" href="{{ url('/') }}">
                    <img alt="" src="{{asset('img/layouts/logo-header.png')}}">
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
                            CONSEJOS DE SEGURIDAD
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/consejos') }}">
                            CONSEJOS DE SEGURIDAD
                        </a>
                    </li>
                    @endif
                    @if($activo=='obras')
                    <li>
                        <a class="activo" href="{{ url('/categoriaobras') }}">
                            OBRAS
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/categoriaobras') }}">
                            OBRAS
                        </a>
                    </li>
                    @endif
                    @if($activo=='clientes')
                    <li>
                        <a class="activo" href="{{ url('/clientes') }}">
                            CLIENTES
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ url('/clientes') }}">
                            CLIENTES
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li>
                <a href="{{ url('/mantenimiento') }}">
                    MANTENIMIENTO
                </a>
            </li>
            <li>
                <a href="{{ url('/categorias') }}">
                    PRODUCTOS
                </a>
            </li>
            <li>
                <a href="{{ url('/empresa') }}">
                    EMPRESA
                </a>
            </li>
            <li>
                <a href="{{ url('/consejos') }}">
                    CONSEJOS DE SEGURIDAD
                </a>
            </li>
            <li>
                <a href="{{ url('/categoriaobras') }}">
                    OBRAS
                </a>
            </li>
            <li>
                <a href="{{ url('/clientes') }}">
                    CLIENTES
                </a>
            </li>
        </ul>
    </header>
</div>