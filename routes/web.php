<?php

//------------------------Rutas Publicas------------------------------------//

Route::get('/','Admin\AdminController@index')->name('inicio');
Route::get('/servicios','Admin\AdminController@servicios')->name('servicios');
Route::get('/galeria','Admin\AdminController@galeria')->name('galeria');
Route::get('/blog','Admin\AdminController@blog')->name('blog');
Route::get('/blogsimple','Admin\AdminController@blogsimple')->name('blogsimple');
Route::get('/about','Admin\AdminController@about')->name('about');


//------------------------Fin Rutas Publicas--------------------------------//


