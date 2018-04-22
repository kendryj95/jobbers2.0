<?php
//Rutas generales
Route::get('/', 'con_index@index');
Route::get('inicio', 'con_index@index');

//Rutas para los candidatos.

//Rutas para las empresas.

Route::get('empresa', 'con_empresa_login@index');


//Rutas para el administrador del sitio.

Route::get('administrator', 'con_administrator_login@index');