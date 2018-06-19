<footer class="page-footer">
    <div class="container" style="width: 100%">
        <div class="row" style="display:  flex; align-items:  center;">
            <div class="leftitems col l4 s12 m4 hide-on-med-and-down">
                <h5 class="titulo-footer">
                    SITEMAP
                </h5>
                <div class="links">
                    <div class="listlinks col l6 m6">
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
                    </div>
                    <div class="listlinks col l6 m6">
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
            </div>
            <div class="col l4 s12 m4">
                <div class="row">
                    <div class="logfooter center">
                        <img alt="" src="{{asset('img/layouts/logo-footer.png')}}">
                        </img>
                    </div>
                </div>
            </div>
            <div class="rightitems col l4 s12 m4 hide-on-med-and-down left">
                <h5 class="titulo-footer">
                    EXCELSIOR S.A.
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
