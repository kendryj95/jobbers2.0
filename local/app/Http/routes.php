<?php
//Rutas generales
Route::get('/', 'con_index@index');
Route::get('inicio', 'con_index@index');

Route::get('nosotros', function (){return view('nosotros');});
Route::get('contacto', function (){return view('contacto');});
Route::get('fag', function (){return view('faq');});
Route::get('noticias', function (){return view('noticias');});
Route::get('detallenoticia', function (){return view('detalle_noticia');});
Route::get('ofertas', function (){return view('ofertas');});
Route::get('detalleoferta', function (){return view('detalle_oferta');});
//Rutas para los candidatos.

//Rutas para las empresas.

Route::get('empresa', 'con_empresa_login@login');
Route::get('empresa/registro', 'con_empresa_login@registro_view');


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
