<header>
    {{-- BARRA SUPERIOR --}}
    <div class="top">
        <div class="container nav-flex hide-on-med-and-down">
            <div class="list-top row">
                <div class="li-red">
                    {!!  Form::open(['route' => 'buscar', 'method' => 'POST', 'id'=>'buscador']) !!}
                    <input id="buscar" name="buscar" type="search">
                        {!! Form::close() !!}
                        <a href="">
                            <img alt="" src="{{asset('img/layouts/lupa.png')}}">
                            </img>
                        </a>
                    </input>
                </div>
                <div class="li-icondistribuidor">
                    <a href="">
                        <img alt="" src="{{asset('img/layouts/icono_distribuidor.png')}}">
                        </img>
                    </a>
                </div>
                @if(Auth::user())
                <div class="li-distribuidor">
                    <a class="dropdown-trigger" href="zonaprivada/productos">
                        <img alt="" src="">
                            ZONA DISTRIBUIDOR
                        </img>
                    </a>
                </div>
                @else
                <div class="li-distribuidor">
                    <a class="dropdown-trigger" data-target="dropdown1" href="#">
                        <img alt="" src="">
                            ZONA DISTRIBUIDOR
                        </img>
                    </a>
                </div>
                @endif
                <!-- Dropdown LOGIN -->
                <div class="areaprivada">
                    <ul class="dropdown-content" id="dropdown1" style="background: none, width:400px!important; height: 300px!important;">
                        <div class="container" style="background: #FAFAFA; margin-top: 19px !important; outline: none; width: 282px;">
                            {!!Form::open(['route'=>'logindistribuidor', 'method'=>'POST'])!!}
                            <div class="input-field col s12" style="padding-left: 10px;    border-bottom: 1px solid #595959; margin: 2px; margin-top: 1px; margin-bottom: 9px;">
                                {!!Form::text('username',null,['class'=>'', 'required', 'autocomplete' => 'off'])!!}
                                <label for="username" style="color:gray; font-weight: 500; font-family: 'Lato'; font-size: 15px;">
                                    Username
                                </label>
                            </div>
                            <div class="input-field col s12" placeholder="password" style="padding-left: 10px;    border-bottom: 1px solid #595959; margin: 2px;">
                                {!!Form::password('password',null,['class'=>'', 'required'])!!}
                                <label for="password" style="color:gray; font-weight: 500; font-family: 'Lato'; font-size: 15px;">
                                    Contraseña
                                </label>
                            </div>
                            <style type="text/css">
                                .color-del-boton{
                 background-color: #01A0E2;
            }
            .color-del-boton:hover{
                 background-color: #01A0E2;
            }
                            </style>
                            <div class="col s12" style="position: relative;right: 24%;margin-top: 9%;
    margin-bottom: 2%;">
                                <input class="waves-effect waves-light btn right colorboton" style="color: white;font-family: 'Lato';font-weight: bold;" type="submit" value="INGRESAR">
                                </input>
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
                    <a href="{{$facebook->link}}">
                        <img alt="" class="" src="{{asset('img/layouts/facebook.png')}}">
                        </img>
                    </a>
                    <a href="{{$instagram->link}}">
                        <img alt="" class="" src="{{asset('img/layouts/instagram.png')}}">
                        </img>
                    </a>
                    <a href="{{$youtube->link}}">
                        <img alt="" class="" src="{{asset('img/layouts/youtube.png')}}">
                        </img>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- BARRA PRINCIPAL --}}
    <ul>
    <li class="productos_menu">
                    <a href="">
                        PRODUCTOX
                    </a>
                    <ul>
                        <li>P 1
                            <ul>
                                <li>>P 1</li>
                                <li>>P 3</li>
                                <li>>P 1</li>
                                <li>>P r</li>
                            </ul>
                        </li>
                        <li>P 3</li>
                        <li>P 1</li>
                        <li>P r</li>
                    </ul>
                </li>
        
    </ul>
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
                    <!-- HEAD 1 -->
                    <a class="dropdown-trigger btn" data-target="categorias" href="#">
                        PRODUCTOS
                    </a>
                    <!-- FIN HEAD 1 -->
                    <!-- CONTENIDO 1-->
                    <ul class="dropdown-content" id="categorias">
                        @foreach($categorias as $categoria)
                        <li>
                            <!-- HEAD 2 -->
                            <a class="dropdown-trigger2 btn" data-target="subcategorias" href="#">
                                {{ $categoria->nombre }}
                            </a>
                            <!-- FIN HEAD 2-->
                            <!-- CONTENIDO 2-->
                            <ul class="dropdown-content" id="subcategorias">
                                @foreach($subcategorias as $subcategoria)
                            @if($subcategoria->id_superior==$categoria->id)
                                <li>
                                    <!-- HEAD 3 -->
                                    <a class="dropdown-trigger3 btn" data-target="productos" href="#">
                                        {{ $subcategoria->nombre }}
                                    </a>
                                    <!-- FIN HEAD 3 -->
                                    <!-- CONTENIDO 3 -->
                                    <ul class="dropdown-content" id="productos">
                                       @foreach($productos as $producto)
                                            @if($producto->visible!='privado')
                                            @if($producto->categoria_id==$subcategoria->id)
                                        <li>
                                            <!-- HEAD 4 -->
                                            <a href="#">
                                                {{ $subcategoria->nombre }}
                                            </a>
                                            <!-- FIN HEAD 4 -->
                                        </li>
                                        @endif
                                        @endif
                                @endforeach
                                    </ul>
                                    <!-- FIN CONTENIDO 3 -->
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            <!-- FIN CONTENIDO 2 -->
                        </li>
                        @endforeach
                    </ul>
                    <!-- FIN CONTENIDO 1 -->
                </li>
                @else
                <li>
                    <a href="{{ url('/empresa') }}">
                        PRODUCTOSX
                    </a>
                </li>
                @endif
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
                <li class="productos_menu">
                    <a href="">
                        PRODUCTOX
                    </a>
                    <ul>
                        <li>P 1</li>
                        <li>P 3</li>
                        <li>P 1</li>
                        <li>P r</li>
                    </ul>
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
                    <a class="activo" href="{{ url('/contacto', 'productos parpen') }}">
                        CONTACTO
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('/contacto', 'General') }}">
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
