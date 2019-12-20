<?php

Route::get('/Login','seguridad\LoginController@index')->name('login');
Route::post('/Login','seguridad\LoginController@login')->name('login_post');
Route::get('/logout','seguridad\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
//------------------------Rutas Publicas------------------------------------//

Route::get('/','Publico\PublicoController@index')->name('inicio');
Route::get('/servicios','Publico\PublicoController@servicios')->name('serviciosweb');
Route::get('/galeria','Publico\PublicoController@galeria')->name('galeria');
Route::get('/blog','Publico\PublicoController@blog')->name('blog');
Route::get('/about','Publico\PublicoController@about')->name('about');
Route::get('/blogsimple','Publico\PublicoController@blogsimple')->name('blogsimple');
Route::get('/prueba1','Publico\PublicoController@index');



//------------------------Fin Rutas Publicas--------------------------------//

// Auth::routes();
 Route::get('/home', 'HomeController@index')->name('home');

//-----------------------------------RUTAS PUBLICAS----------------------------------------//
Route::prefix('Reservas')->namespace('Publico')->middleware('auth')->group(function(){

    Route::get('/CalendarioReservas','PublicoReservas@index')->name('ReservasCliente');
    Route::get('/CalendarioReservas/{id_empleado}','PublicoReservas@cargarCalendario')->name('calendario');
    Route::post('/CalendarioReservas','PublicoReservas@crearEvento')->name('addEvento');

});

//-----------------------------------RUTAS ADMINISTRADOR----------------------------------------//
Route::prefix('admin')->namespace('Admin')->middleware('auth','LoginRutas')->group(function(){

Route::get('/','AdminController@index')->name('indexadmin');


Route::get('/ListarEmpleados','AdminController@ListarEmpleados')->name('ListarEmpleados');
Route::post('/ListarEmpleados','AdminController@empleados')->name('empleados');
Route::get('/agregarempleado','AdminController@agregarempleado')->name('agregarempleado');
Route::post('/actualizarempleados', 'AdminController@actualizarempleados')->name('actualizarempleados');
Route::get('/ListarServicios','AdminController@ListarServicios')->name('ListarServicios');
Route::post('/ListarServicios','AdminController@servicios')->name('servicios');
Route::get('/agregarservicios','AdminController@agregarservicios')->name('agregarservicios');
Route::post('/actualizarservicios', 'AdminController@actualizarservicios')->name('actualizarservicios');
Route::get('/ListarUsuarios','AdminController@ListarUsuarios')->name('ListarUsuarios');
Route::post('/actualizarusuarios', 'AdminController@actualizarusuarios')->name('actualizarusuarios');
Route::get('/ventas','AdminController@ventas')->name('ventas');
Route::get('/Reservas','AdminController@Reservas')->name('Reservas');
Route::post('/enviarpago','AdminController@enviarpago')->name('enviarpago');
Route::get('/reporteventas','AdminController@reporteventas')->name('reporteventas');
Route::post('/reporteventas','AdminController@filtrarventas')->name('filtrarventas');
Route::get('/reporteservicios','AdminController@reporteservicios')->name('reporteservicios');
Route::post('/reporteservicios','AdminController@filtrarservicios')->name('filtrarservicios');
Route::get('/reportecomosiones','AdminController@reportecomosiones')->name('reportecomosiones');
Route::post('/reportecomosiones','AdminController@filtrarcomisiones')->name('filtrarcomisiones');
Route::post('/confirmar','AdminController@confirmar')->name('confirmar');



    
});

//-----------------------------------RUTAS Barbero----------------------------------------//
Route::prefix('barberos')->namespace('Barberos')->middleware('auth','SeguridadBarberos')->group(function(){


    Route::get('/','BarberosController@index');
    
    
    });



