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
            <div class="footer-b col l3 s12 m3">
                <h5 class="titulo-footer">
                    SITEMAP
                </h5>
                <div class="links">
                    <ul>
                        <li>
                            <a class="itemsb" href="#!">
                                Home
                            </a>
                        </li>
                        <li>
                            <a class="itemsb" href="#!">
                                Mantenimiento
                            </a>
                        </li>
                        <li>
                            <a class="itemsb" href="#!">
                                Productos
                            </a>
                        </li>
                        <li>
                            <a class="itemsb" href="#!">
                                Empresa
                            </a>
                        </li>
                    </ul>
                    <ul style="">
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Consejos de Seguridad
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Obras
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Clientes
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Contacto
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="leftitems col l3 s12 m3">
                <h5 class="titulo-footer">
                    SITEMAP
                </h5>
                <div class="links">
                    <ul>
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Home
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Mantenimiento
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Productos
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Empresa
                            </a>
                        </li>
                    </ul>
                    <ul style="">
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Consejos de Seguridad
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Obras
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Clientes
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="#!">
                                Contacto
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="rightitems col l3 s12 m3 hide-on-med-and-down left">
                <h5 class="titulo-footer">
                    PARPEN ARGENTINA
                </h5>
                <div class="links2">
                    <div class="listlinks2 col l12 m12">
                        <ul>
                            <li>
                                <div class="row rightlist">
                                    <div class="col s1">
                                        <img alt="" src="{{asset('img/layouts/ubicacion.png')}}">
                                        </img>
                                    </div>
                                    <div class="col s11">
                                        {{$direccion->descripcion}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row rightlist">
                                    <div class="col s1">
                                        <img alt="" src="{{asset('img/layouts/telefono.png')}}">
                                        </img>
                                    </div>
                                    <div class="col s11">
                                        {{$telefono->descripcion}}
                                    |
                                        {{$telefono2->descripcion}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row rightlist">
                                    <div class="col s1">
                                        <img alt="" src="{{asset('img/layouts/urgencias.png')}}">
                                        </img>
                                    </div>
                                    <div class="col s11">
                                        2313213
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row rightlist">
                                    <div class="col s1">
                                        <img alt="" src="{{asset('img/layouts/email.png')}}">
                                        </img>
                                    </div>
                                    <div class="col s11">
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
