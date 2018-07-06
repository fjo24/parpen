<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
//PAGINAS/*************************************************************************************************

//HOME
Route::get('/', 'PaginasController@home')->name('inicio');

//PRODUCTOS
Route::get('/productos', 'PaginasController@productos')->name('productos');

//EMPRESAS
Route::get('/empresa', 'PaginasController@empresa')->name('empresa');

//CONTACTO
Route::get('/contacto/{producto}', 'PaginasController@contacto')->name('contacto');
Route::post('enviar-mail', [
    'uses' => 'PaginasController@enviarmail',
    'as'   => 'enviarmail',
]);

//FILTRO CATEGORIAS DE PRODUCTOS
Route::get('categorias/{id}', 'PaginasController@categorias')->name('categorias');

//FILTRO DE PRODUCTOS
Route::get('subcategorias/{id}', 'PaginasController@subcategorias')->name('subcategorias');

//FILTRO DE PRODUCTO
Route::get('producto/{id}', 'PaginasController@productoinfo')->name('productoinfo');

//BUSCADOR
Route::post('productos/buscar', [
    'uses' => 'PaginasController@buscar',
    'as'   => 'buscar',
]);

//DONDE COMPRAR
Route::get('/donde', ['uses' => 'PaginasController@dondeComprar', 'as' => 'donde.comprar']);
//DONDE COMPRAR {listado}
Route::get('/dondelistado', ['uses' => 'PaginasController@dondeComprarlistado', 'as' => 'donde.comprar.listado']);

//NOVEDADES
Route::get('novedades/{tipo}', 'PaginasController@novedades')->name('novedades');
//NOVEDADES
Route::get('novedadesinfo/{id}', 'PaginasController@novedadesinfo')->name('novedadesinfo');

//ZONA PRIVADA************************************************************************************************
Route::get('/zonaprivada/productos', 'ZprivadaController@productos')->name('zproductos')->middleware('auth');
//LISTA DE PRECIOS************************************************************************************************
Route::get('/zonaprivada/listadeprecios', 'ZprivadaController@listadeprecios')->name('listadeprecios')->middleware('auth');
// Rutas de reportes pdf desde la web
    Route::get('pdf2/{id}', ['uses' => 'ZprivadaController@downloadPdf2', 'as' => 'file-pdf2']);

//REGISTRO DE DISTRIBUIDORES
Route::get('registro', ['uses' => 'DistribuidorController@index', 'as' => 'registro']);
Route::post('/registro', ['uses' => 'DistribuidorController@store', 'as' => 'cliente.store']);
Route::post('/nuevousuario', ['uses' => 'DistribuidorController@registroStore', 'as' => 'registro.store']);
//novedades y ofertas
Route::get('/zonaprivada/ofertasynovedades', 'ZprivadaController@ofertasynovedades')->name('ofertasynovedades')->middleware('auth');

//NOVEDADES
Route::post('novedades/{tipo}', 'PaginasController@novedades')->name('novedades');

Route::post('/buscador', ['uses' => 'BuscadorController@getProducts', 'as' => 'buscador']);

Route::post('login/distribuidor', ['uses' => 'DistribuidorController@loginDistribuidor', 'as' => 'login.distribuidor']);
//Route::resource('carrito', 'CarritoController');

Route::group(['prefix' => 'carrito'], function () {
    Route::post('add', ['uses' => 'ZprivadaController@add', 'as' => 'carrito.add']);
    Route::get('carrito', ['uses' => 'ZprivadaController@carrito', 'as' => 'carrito']);
    Route::get('delete/{id}', ['uses' => 'ZprivadaController@delete', 'as' => 'carrito.delete']);
    Route::post('enviar', ['uses' => 'ZprivadaController@send', 'as' => 'carrito.enviar']);
});

//ADMIN*************->middleware('admin')******************************************************************************************
Route::prefix('adm')->middleware('admin')->middleware('auth')->group(function () {
    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard');

    //DASHBOARD
    Route::get('/dashboard', 'Adm\AdminController@admin')->middleware('admin');

    /*------------CATALOGOS----------------*/
    Route::resource('catalogos', 'Adm\CatalogosController')->middleware('admin');
    // Rutas de reportes pdf
    Route::get('pdf/{id}', ['uses' => 'Adm\CatalogosController@downloadPdf', 'as' => 'file-pdf']);

    /*------------CATEGORIAS----------------*/
    Route::resource('categorias', 'Adm\CategoriasController')->middleware('admin');

    /*------------CONTENIDO HOMES----------------*/
    Route::resource('homes', 'Adm\ContenidohomesController')->middleware('admin');

    /*------------DATOS----------------*/
    Route::resource('datos', 'adm\DatosController')->middleware('admin');

    /*------------DESTACADO HOMES----------------*/
    Route::resource('destacadoshomes', 'Adm\DestacadohomesController')->middleware('admin');

    /*------------DISTRIBUIDORES----------------*/
    Route::resource('distribuidores', 'Adm\DistribuidoresController')->middleware('admin');

    /*------------EMPRESAS----------------*/
    Route::resource('empresas', 'Adm\EmpresasController')->middleware('admin');

    /*------------NOVEDADES----------------*/
    Route::resource('novedades', 'Adm\NovedadesController')->middleware('admin');
    /*------------Imagen----------------*/
    Route::get('novedad/{novedad_id}/imagenes/', 'Adm\NovedadesController@imagenes')->name('imgnovedad.lista'); //index del modulo imagenes
    //agregar nuevas imagenes de productos
    Route::post('novedad/nuevaimagen/{id}', 'Adm\NovedadesController@nuevaimagen')->name('imgnovedad.nueva'); //es el store de las imagenes
    Route::delete('imgnovedad/{id}/destroy', [
        'uses' => 'Adm\NovedadesController@destroyimg',
        'as'   => 'imgnovedad.destroy',
    ]);

    /*------------PRODUCTOS----------------*/
    Route::resource('productos', 'Adm\ProductosController');
    /*------------Imagen----------------*/
    Route::get('producto/{producto_id}/imagenes/', 'Adm\ProductosController@imagenes')->name('imgproducto.lista'); //index del modulo imagenes
    //agregar nuevas imagenes de productos
    Route::post('producto/nuevaimagen/{id}', 'Adm\ProductosController@nuevaimagen')->name('imgproducto.nueva'); //es el store de las imagenes
    Route::delete('imgproducto/{id}/destroy', [
        'uses' => 'Adm\ProductosController@destroyimg',
        'as'   => 'imgproducto.destroy',
    ]);

    /*------------LOCALES----------------*/
    Route::resource('locales', 'Adm\LocalesController');

    /*------------NEWSLETTERS----------------*/
    Route::resource('newsletters', 'Adm\NewslettersController');

    /*------------REDES----------------*/
    Route::resource('redes', 'Adm\RedesController');

    /*------------SLIDERS----------------*/
    Route::resource('sliders', 'Adm\SlidersController');

    /*------------USERS----------------*/
    Route::resource('users', 'Adm\UsersController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');
