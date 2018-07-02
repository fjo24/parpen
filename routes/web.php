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
Route::get('/', 'PaginasController@home');

//PRODUCTOS
Route::get('/productos', 'PaginasController@productos')->name('productos');

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

//NOVEDADES
Route::get('novedades/{tipo}', 'PaginasController@novedades')->name('novedades');

//ZONA PRIVADA************************************************************************************************
Route::get('/zonaprivada/productos', 'ZprivadaController@productos')->name('zproductos');
//NOVEDADES
Route::post('novedades/{tipo}', 'PaginasController@novedades')->name('novedades');

Route::post('/buscador',['uses'=>'BuscadorController@getProducts', 'as'=>'buscador']);
//Route::resource('carrito', 'CarritoController');

Route::group(['prefix' => 'carrito'], function() {
        Route::post('add', ['uses' => 'ZprivadaController@add', 'as' => 'carrito.add']);
        Route::get('delete/{id}', ['uses' => 'ZprivadaController@delete', 'as' => 'carrito.delete']);
        Route::post('enviar', ['uses' => 'ZprivadaController@send', 'as' => 'carrito.enviar']);
    });

//ADMIN*******************************************************************************************************
Route::prefix('adm')->middleware('auth')->group(function () {

    //DASHBOARD
    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard');
    Route::get('/dashboard', 'Adm\AdminController@dashboard')->name('dashboard');

    /*------------CATALOGOS----------------*/
    Route::resource('catalogos', 'Adm\CatalogosController');

    /*------------CATEGORIAS----------------*/
    Route::resource('categorias', 'Adm\CategoriasController');

    /*------------CONTENIDO HOMES----------------*/
    Route::resource('homes', 'Adm\ContenidohomesController');

    /*------------DATOS----------------*/
    Route::resource('datos', 'adm\DatosController');

    /*------------DESTACADO HOMES----------------*/
    Route::resource('destacadoshomes', 'Adm\DestacadohomesController');

    /*------------DISTRIBUIDORES----------------*/
    Route::resource('distribuidores', 'Adm\DistribuidoresController');

    /*------------EMPRESAS----------------*/
    Route::resource('empresas', 'Adm\EmpresasController');

    /*------------NOVEDADES----------------*/
    Route::resource('novedades', 'Adm\NovedadesController');
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

Route::get('/home', 'HomeController@index')->name('home');
