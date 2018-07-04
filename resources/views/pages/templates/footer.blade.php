<footer class="page-footer">
    <div class="container" style="width: 100%">
        <div class="row" style="display:  flex; align-items:  center;">
            <div class="footer-a col l3 s12 m3">
                <div class="col l12 s12 m12">
                    <div class="row">
                        <div class="logfooter center">
                            <img alt="" src="{{asset('img/logo_footer.png')}}">
                            </img>
                        </div>
                    </div>
                </div>
                <div class="col l12 s12 m12">
                    <div class="li-redes-footer center">
                        <div class="item-redesf">
                            <a href="">
                                <img alt="" class="" src="{{asset('img/layouts/facebook_footer.png')}}">
                                </img>
                            </a>
                        </div>
                        <div class="item-redesf">
                            <a href="">
                                <img alt="" class="" src="{{asset('img/layouts/instagram_footer.png')}}">
                                </img>
                            </a>
                        </div>
                        <div class="item-redesf">
                            <a href="">
                                <img alt="" class="" src="{{asset('img/layouts/youtube_footer.png')}}">
                                </img>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-b col l3 s12 m3" style="    padding-left: 5%;">
                <h5 class="titulo-footer" style="    margin-top: 46px;">
                    SITEMAP
                </h5>
                <div class="linksb">
                    <ul>
                        <li>
                            <a class="itemsb" href="{{ url('/') }}">
                                INICIO
                            </a>
                        </li>
                        <li>
                            <a class="itemsb" href="{{ url('/empresa') }}">
                            QUIÉNES SOMOS
                        </a>
                        </li>
                        <li>
                            <a class="itemsb" href="{{ url('/productos') }}">
                            PRODUCTOS
                        </a>
                        </li>
                        <li>
                            <a class="itemsb" href="{{ url('/donde') }}">
                            DÓNDE COMPRAR
                        </a>
                        </li>
                        <li>
                            <a class="itemsb" href="{{ route('novedades', 'destacados') }}">
                            NOVEDADES
                        </a>
                        </li>
                        <li>
                            <a class="itemsb" href="{{ url('/contacto') }}">
                            CONTACTO
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="leftitems col l3 s12 m3">
                <h5 class="titulo-footer2" style="margin-top: 15%;">
                    PRODUCTOS
                </h5>
                <div class="linksb">
                    <ul>
                        <li>
                            <a class="itemsc" href="#!">
                                ARMADORES DE PLÁSTICO

                            </a>
                        </li>
                        <li>
                            <a class="itemsc" href="#!">
                                AROS INOXIDABLES

                            </a>
                        </li>
                        <li>
                            <a class="itemsc" href="#!">
                                HERRAMIENTAS VARIAS

                            </a>
                        </li>
                        <li>
                            <a class="itemsc" href="#!">
                                MARCADORES DE PASTAS

                            </a>
                        </li>
                        <li>
                            <a class="itemsc" href="#!">
                                MINI RODILLOS

                            </a>
                        </li>
                        <li>
                            <a class="itemsc" href="#!">
                                MOLDES PLACAS
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer_c col l3 s12 m3 hide-on-med-and-down left">
                <h5 class="titulo-footer3" style="margin-top: -1%;">
                    PARPEN ARGENTINA
                </h5>
                <div class="links2">
                    <div class="listlinks2 col l12 m12">
                        <ul>
                            <li>
                                <div class="row rightlist">
                                    <div class="col s12">
                                        {{$direccion->descripcion}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row rightlist">
                                    <div class="col s12">
                                        {{$telefono->descripcion}}
                                    </div>
                                    <div class="col s12">             
                                        {{$telefono2->descripcion}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row rightlist">
                                    <div class="col s12">
                                        {{$email->descripcion}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
