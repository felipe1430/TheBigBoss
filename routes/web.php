<?php

Route::get('/Login','seguridad\LoginController@index')->name('login');
Route::post('/Login','seguridad\LoginController@login')->name('login_post');
Route::get('/logout','seguridad\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
//------------------------Rutas Publicas------------------------------------//

Route::get('/','Publico\PublicoController@index')->name('inicio');
Route::get('/servicios','Publico\PublicoController@servicios')->name('servicios');
Route::get('/galeria','Publico\PublicoController@galeria')->name('galeria');
Route::get('/blog','Publico\PublicoController@blog')->name('blog');
Route::get('/about','Publico\PublicoController@about')->name('about');
Route::get('/blogsimple','Publico\PublicoController@blogsimple')->name('blogsimple');



Route::get('/prueba1','Publico\PublicoController@index');
Route::get('/ListarEmpleados','Admin\AdminController@ListarEmpleados')->name('ListarEmpleados');




//------------------------Fin Rutas Publicas--------------------------------//
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

//-----------------------------------RUTAS ADMINISTRADOR----------------------------------------//
Route::prefix('Reservas')->namespace('Publico')->middleware('auth')->group(function(){

    Route::get('/','PublicoReservas@index')->name('ReservasCliente');

});


Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function(){


Route::get('/','AdminController@index');




});
