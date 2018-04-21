<?php
//Rutas generales
Route::get('/', 'con_index@index');
Route::get('inicio', 'con_index@index');

//Rutas para los candidatos.

//Rutas para las empresas.

//Rutas para el administrador del sitio.

Route::get('administrator', 'con_administrator_login@index');
Route::get('admindashboard', 'con_administrator_dashboard@dashboard');
Route::get('adminfavoritos', 'con_administrator_favoritos@index');
Route::get('adminkardex', 'con_administrator_kardex@index');
Route::get('adminempresas', 'con_administrator_empresas@index');
Route::get('adminofertas', 'con_administrator_ofertas@index');
Route::get('admincandidatos', 'con_administrator_candidatos@index');
Route::get('adminnoticias', 'con_administrator_noticias@index');
Route::get('adminpagos', 'con_pagos@index');