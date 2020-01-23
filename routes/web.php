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

//-----------------------------------RUTAS ADMINISTRADOR----------------------------------------//
Route::prefix('admin')->namespace('Admin')->middleware('auth','LoginRutas')->group(function(){

Route::get('/','AdminController@index')->name('indexadmin');


Route::get('/ListarEmpleados','AdminController@ListarEmpleados')->name('ListarEmpleados');
Route::post('/ListarEmpleados','AdminController@empleados')->name('empleados');
Route::get('/agregarempleado','AdminController@agregarempleado')->name('agregarempleado');
Route::post('/actualizarempleados', 'AdminController@actualizarempleados')->name('actualizarempleados');
Route::post('/eliminarempleados', 'AdminController@eliminarempleados')->name('eliminarempleados');
Route::get('/ListarServicios','AdminController@ListarServicios')->name('ListarServicios');
Route::post('/ListarServicios','AdminController@servicios')->name('servicios');
Route::get('/agregarservicios','AdminController@agregarservicios')->name('agregarservicios');
Route::post('/actualizarservicios', 'AdminController@actualizarservicios')->name('actualizarservicios');
Route::get('/ListarUsuarios','AdminController@ListarUsuarios')->name('ListarUsuarios');
Route::post('/actualizarusuarios', 'AdminController@actualizarusuarios')->name('actualizarusuarios');
Route::get('/ventas','AdminController@ventas')->name('ventas');
Route::post('/ventas','AdminController@enviarpago')->name('enviarpago');
Route::post('/confirmar','AdminController@confirmar')->name('confirmar');
Route::get('/reporteventas','AdminController@reporteventas')->name('reporteventas');
Route::post('/reporteventas','AdminController@filtrarventas')->name('filtrarventas');
Route::get('/reporteservicios','AdminController@reporteservicios')->name('reporteservicios');
Route::post('/reporteservicios','AdminController@filtrarservicios')->name('filtrarservicios');
Route::get('/reportecomosiones','AdminController@reportecomosiones')->name('reportecomosiones');
Route::post('/reportecomosiones','AdminController@filtrarcomisiones')->name('filtrarcomisiones');
Route::get('/reporteGastos','AdminController@reportegastos')->name('reportegastos');
Route::post('/reporteGastos','AdminController@filtrargastos')->name('filtrargastos');
Route::get('/AgregarGastos','AdminController@AgregarGastos')->name('AgregarGastos');
Route::post('/insertargastos','AdminController@insertargastos')->name('confirmargastos');
Route::get('/Reservas','AdminController@Reservas')->name('Reservas');
Route::get('/Reservas/{id_reserva}','AdminController@Reservaspago')->name('Reservaspago');
Route::get('/enviarpagoreserva','AdminController@Reservas')->name('reservaIndex');
Route::post('/enviarpagoreserva','AdminController@enviarpagoreserva')->name('enviarpagoreserva');
Route::post('/confirmarventareserva','AdminController@confirmarventareserva')->name('confirmarventareserva');
Route::get('/eliminarventas','AdminController@eliminarventas')->name('eliminarventas');
Route::post('/eliminarventa','AdminController@eliminarventa')->name('eliminarventa');
Route::post('/eliminarventafinal','AdminController@eliminarventafinal')->name('eliminarventafinal');
Route::get('/infodesarrolladores','AdminController@infodesarrolladores')->name('infodesarrolladores');
Route::get('/reporteventaseliminadas','AdminController@reporteventaseliminadas')->name('reporteventaseliminadas');
Route::post('/reporteventaseliminadas','AdminController@filtrarventaseliminadas')->name('filtrarventaseliminadas');
Route::get('/reportecomosionestotal','AdminController@reportecomosionestotal')->name('reportecomosionestotal');
Route::post('/reportecomosionestotal','AdminController@filtrarcomisionestotal')->name('filtrarcomisionestotal');
Route::get('/agregarservempleado/{id_empleado}','AdminController@agregarservempleado')->name('agregarservempleado');
Route::post('/eliminarservicioempleado','AdminController@eliminarservicioempleado')->name('eliminarservicioempleado');
Route::post('/agregarservicioempleado','AdminController@agregarservicioempleado')->name('agregarservicioempleado');


Route::get('/reportetotalesservicios','AdminController@reportetotalesservicios')->name('reportetotalesservicios');
Route::post('/reportetotalesserviciosfiltrar','AdminController@reportetotalesserviciosfiltrar')->name('reportetotalesserviciosfiltrar');







    
});


Route::prefix('Reservas')->namespace('Publico')->middleware('auth','SeguridadCliente')->group(function(){


    Route::get('/CalendarioReservas','PublicoReservas@index')->name('ReservasCliente');
    Route::get('/CalendarioReservas/{id_empleado}','PublicoReservas@cargarCalendario')->name('calendario');



    Route::post('/CalendarioReservas','PublicoReservas@CargarDetalle')->name('cargarDetalle');
    Route::post('/FinalizarReserva','PublicoReservas@crearEvento')->name('addEvento');

    Route::post('/Horas','PublicoReservas@horasDisponibles')->name('horas');

});

//-----------------------------------RUTAS Barbero----------------------------------------//
Route::prefix('barberos')->namespace('Barberos')->middleware('auth','SeguridadBarberos')->group(function(){


    Route::get('/','BarberosController@index');
    
    
    });


Route::prefix('Cajero')->namespace('Cajero')->middleware('auth','SeguridadCajero')->group(function(){


    Route::get('/','CajeroController@index')->name('indexcajero');
    Route::get('/Reservas','CajeroController@Reservas')->name('Reservascajero');
    Route::get('/Reservas/{id_reserva}','CajeroController@Reservaspago')->name('Reservaspagopagocajero');
    
    Route::post('/enviarpagoreserva','CajeroController@enviarpagoreserva')->name('enviarpagoreservapagocajero');
    Route::post('/confirmarventareserva','CajeroController@confirmarventareserva')->name('confirmarventareservapagocajero');


    Route::get('/ventas','CajeroController@ventas')->name('ventascajero');
    Route::get('/enviarpago','CajeroController@ventas')->name('enviarpagocajeroget');
    Route::post('/enviarpago','CajeroController@enviarpago')->name('enviarpagocajero');
    Route::post('/confirmar','CajeroController@confirmar')->name('confirmarpagocajero');

    Route::get('/reporteventascajero','CajeroController@reporteventascajero')->name('reporteventascajero');
    Route::get('/infocajero','CajeroController@infodesarrolladorescaja')->name('infodesarrolladorescaja');

    
    Route::post('/BuscarUser','CajeroController@BuscarUser')->name('BuscarUser');
    
    });



