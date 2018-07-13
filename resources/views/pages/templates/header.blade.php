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
                <li id="menu_productos">
                    <a class="prod_menu" href="{{ url('/productos') }}">
                        PRODUCTO
                    </a>
                    <ul>
                        <li class="menu_cate">
                            <a href="{{ route('productos')}}">
                                TODOS LOS PRODUCTOS
                            </a>
                        </li>
                        @foreach($categorias as $categoria)
                        <li class="menu_cate">
                            <a href="{{ route('categorias', $categoria->id)}}" style="text-transform: uppercase;">
                                {{ $categoria->nombre }}
                            </a>
                            <ul class="menu_subcate">
                                @foreach($subcategorias as $subcategoria)
                            @if($subcategoria->id_superior==$categoria->id)
                                <li>
                                    <a href="{{ route('subcategorias', $subcategoria->id)}}" style="text-transform: uppercase;">
                                        {!! $subcategoria->nombre !!}
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @else
                <li id="menu_productos">
                    <a class="prod_menu" href="{{ url('/productos') }}">
                        PRODUCTO
                    </a>
                    <ul>
                        <li class="menu_cate">
                            <a href="{{ route('productos')}}">
                                TODOS LOS PRODUCTOS
                            </a>
                        </li>
                        @foreach($categorias as $categoria)
                        <li class="menu_cate">
                            <a href="{{ route('categorias', $categoria->id)}}" style="text-transform: uppercase;">
                                {{ $categoria->nombre }}
                            </a>
                            <ul class="menu_subcate">
                                @foreach($subcategorias as $subcategoria)
                            @if($subcategoria->id_superior==$categoria->id)
                                <li>
                                    <a href="{{ route('subcategorias', $subcategoria->id)}}" style="text-transform: uppercase;">
                                        {!! $subcategoria->nombre !!}
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
            </ul>
            <a class="brand-logo center" href="{{ url('/') }}">
                <img alt="" src="{{asset('img/logo_footer.png')}}">
                </img>
            </a>
            <a class="sidenav-trigger" data-target="mobile-demo" href="#" style="width: 0%;margin-left: 0;">
                <i class="material-icons center">
                    menu
                </i>
            </a>
            {!!  Form::open(['route' => 'buscar', 'method' => 'POST','class' => 'right']) !!}
            <div class="lupa">
                <input id="mobile_search" name="nombre" placeholder="" type="search">
                </input>
            </div>
            {!! Form::close() !!}
            <ul class="item-right right hide-on-med-and-down">
                @if($activo=='donde')
                <li>
                    <a class="activo" href="{{ url('/donde') }}">
                        DÓNDE COMPRAR
                    </a>
                </li>
                @else
                <li class="">
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
                    <a class="activo" href="{{ url('/contacto', 'General') }}">
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
    <ul class="sidenav" id="mobile-demo" style="position: absolute;">
        <ul class="collapsible collapsible-accordion">
            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin" href="{{ url('/') }}">
                    <span class="side">
                        INICIO
                    </span>
                    <i class="material-icons">
                        home
                    </i>
                </a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="{{route('destacadoshomes.index')}}">
                                Editar Destacados
                            </a>
                        </li>
                        <li>
                            <a href="{{route('homes.create')}}">
                                Editar Contenido
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="bold" style="background-color: #FAFAFA;">
                <a class="collapsible-header waves-effect waves-admin" style="
      ">
      <i class="material-icons">
                        brush
                    </i>
                    PRODUCTOS
                    <i class="material-icons right">
                        arrow_drop_down
                    </i>
                    
                </a>
                <div class="collapsible-body">
                    @foreach($categorias as $categoria)
                    <ul class="collapsible">
                        <li>
                            <a class="collapsible-header" style="background-color: #FAFAFA;   text-transform: uppercase;font-family: 'lato';font-weight: bold;color: #FF5F8A;border-style: solid;border-width: 0px 0px 1px 0px;padding-left: 4%;">
                                    {!! $categoria->nombre !!}
                            </a>
                            @foreach($subcategorias as $subcategoria)
                            @if($subcategoria->id_superior==$categoria->id)
                            <div class="collapsible-body">
                                <ul class="collapsible">
                                    <li>
                                        <a class="collapsible-header"  style="background-color: #FAFAFA;   text-transform: uppercase;font-family: 'lato';font-weight: bold;color: #FF5F8A;border-style: solid;border-width: 0px 0px 1px 0px;padding-left: 8%;">

                                            {!! $subcategoria->nombre !!}
                                            @isset($records)
                                            @endisset
                                        </a>
                                        <div class="collapsible-body" style="padding-top: 6px!important; text-transform: uppercase;">
                                            @foreach($productos as $producto)
                                            @if($producto->visible!='privado')
                                                            @if($producto->categoria_id==$subcategoria->id)
                                            <div class="collapsible-header"  style="background-color: #FAFAFA;   text-transform: uppercase;font-family: 'lato';font-weight: bold;color: #FF5F8A;border-style: solid;border-width: 0px 0px 1px 0px;padding-left: 0%">
                                                <a style="text-transform: uppercase;font-family: 'Asap';font-weight: bold;color: #7D0045;font-size: 13px" href="{{ route('productoinfo', $producto->id)}}">
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
                                <ul class="collapsible">
                                    <li>
                                        <div class="collapsible-header" style="background-color: #FAFAFA;text-transform: uppercase;font-family: 'Asap';font-weight: bold;color: #7D0045;border-style: solid;border-width: 0px 0px 1px 0px;">
                                            <a  style="text-transform: uppercase;font-family: 'Asap';font-weight: bold;color: #7D0045;    padding-left: 1%;font-size: 13px;" href="{{ route('productoinfo', $product->id)}}">
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
            <li class="bold">
                <a class="collapsible-header waves-effect waves-admin">
                    <i class="material-icons">
                        email
                    </i>
                    Newsletter
                </a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="{{route('newsletters.index')}}">
                                Listado
                            </a>
                        </li>
                        <li>
                            <a href="{{route('newsletters.create')}}">
                                Registrar email
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </ul>
</header>
