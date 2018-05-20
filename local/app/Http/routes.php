<?php

//********************************************************//
//*            RUTAS GENERALES DEL SISTEMA               *//
//********************************************************//
Route::get('/', 'con_index@index');
Route::get('inicio', 'con_index@index');
Route::get('nosotros', function () {return view('nosotros');});
Route::get('contacto', function () {return view('contacto');});
Route::get('noticias', function () {return view('noticias');});
Route::get('fag', 'con_administrator_faq@detalle_preguntas');
Route::get('detallenoticia', function () {return view('detalle_noticia');});
Route::get('ofertas', 'con_ofertas@index');
Route::get('detalleoferta/{id}', 'con_ofertas@detalle');
Route::post('loguear', 'con_login@log');
Route::get('logout', 'con_login@salir');
Route::get('login', 'con_login@logincandidato');
Route::get('recuperarclave', 'con_login@recuperar');
Route::post('recuperarclave', 'con_login@enviar');
Route::get('localidades/{id_provincia}', 'con_gral@getLocalidades');
Route::get('sectores/{id_area}', 'con_gral@getSectores');

Route::post('register', 'con_login@register');
Route::post('regreferido', 'con_login@regReferido');
Route::get('r/{token}/{tipo}', 'con_login@vregreferidos');

//********************************************************//
//*                 RUTAS PARA LOS CANDIDATOS            *//
//********************************************************//

Route::group(['middleware' => 'log_c'], function () {
    Route::get('candidashboard', 'con_candidato_dashboard@dashboard');
    Route::get('candifavoritos', 'con_candidato_favoritos@index');
    Route::get('candifaveliminar/{id}', 'con_candidato_favoritos@eliminar');
    Route::post('candisetfavorite', 'con_candidato_favoritos@setFavorite');
    Route::get('candimaletin', 'con_maletin@indexcandidato');
    Route::post('listar_arch', 'con_maletin@listarArch');
    Route::post('actarch', 'con_maletin@alias'); //Actualiza los alias
    Route::get('delarchivo/{id}', 'con_maletin@eliminar'); //Elimina los archivos
    Route::get('descargar/{archivo}', 'con_maletin@descargar'); // Descarga los archivos
    Route::get('candiconfiguracion', 'con_candidatos_configuracion@index');
    Route::post('candisetprofilepic', 'con_candidatos_configuracion@setProfilePic');
    Route::post('candiactualizardatos', 'con_candidatos_configuracion@actualizardatos');
    Route::post('subir', 'con_maletin@postUpload');
    Route::get('candipostulaciones', 'con_candidato_postulaciones@index');
    Route::get('candipostular/{id}', 'con_candidato_postulaciones@postular');
    Route::get('candidato', 'con_candidato_perfil_publico@perfilPublico');
    Route::get('candiperfil', 'con_candidato_perfil_publico@perfil');
    Route::get('candicv', function () {return view('candidatos_cv');});
    Route::get('candiempseg', function () {return view('candidatos_empresas_seguidas');});
    Route::get('candisoporte', function () {return view('candidato_soporte');});
    Route::get('candirecomendaciones', 'con_candidato_recomendaciones@index');
    Route::post('candirecomendar', 'con_candidato_recomendaciones@recomendar');
    Route::get('canditienda', function () {return view('candidato_tienda');});
    Route::get('candireferidos', 'con_candidato_referidos@index');
    Route::get('candiredes', 'con_candidato_redes@index');
    Route::post('candiredescrear', 'con_candidato_redes@crear');

});

//********************************************************//
//*                RUTAS PARA LAS EMPRESAS               *//
//********************************************************//
Route::get('empresas', 'con_empresa@ver');
Route::get('empresa', 'con_empresa@login');
Route::get('empresa/registro', 'con_empresa@registroView');
Route::post('empresa/exists', 'con_empresa@existEmpresa'); // Verifica si existe la empresa o no.
Route::post('empresa/registro_success', 'con_empresa@registro'); // Verifica si existe la empresa o no.
Route::get('empresa/detalle', 'con_empresa@detail');

Route::group(['middleware' => 'log_e'], function () {
    Route::get('empresa/perfil', 'con_empresa@profile');
    Route::get('empresa/new_post', 'con_empresa@newPost');
    Route::get('empresa/ofertas', 'con_empresa@ofertas');
    Route::get('empresa/planes', 'con_empresa@planes');
    Route::get('empresa/candidatos-postulados', 'con_empresa@postulados');
    Route::post('empresa/registrar_post', 'con_empresa@registerPost');
    Route::post('empresa/actualizar_profile', 'con_empresa@actualizarProfile');

});

//********************************************************//
//*       RUTAS PARA EL ADMINISYTRADOR DE SISTEMA        *//
//********************************************************//

Route::post('admlog', 'con_administrator_login@login');
Route::get('administrator', 'con_administrator_login@index');

Route::group(['middleware' => 'log_a'], function () {

    Route::get('admindashboard', 'con_administrator_dashboard@dashboard');
    Route::get('adminfavoritos', 'con_administrator_favoritos@index');
    Route::get('adminkardex', 'con_administrator_kardex@index');

    Route::get('adminempresas', 'con_administrator_empresas@index');
    Route::get('adminempresanueva', 'con_administrator_empresas@create');
    Route::post('adminempresaagregar', 'con_administrator_empresas@register');

    Route::get('adminmalerinver', 'con_maletin@index');
    //Route::post('subir', 'con_maletin@post_upload');
    Route::get('adminofertas', 'con_administrator_ofertas@index');
    Route::get('admincandidatos', 'con_administrator_candidatos@index');
    Route::get('adminnoticias', 'con_administrator_noticias@index');
    Route::get('adminpagos', 'con_pagos@index');

    // Preguntas prefrecuentes
    Route::get('adminfag', 'con_administrator_faq@index');
    Route::post('adminfaqcrear', 'con_administrator_faq@crear');
    Route::get('eliminarpre/{id}', 'con_administrator_faq@eliminar');
    Route::post('actpregunta', 'con_administrator_faq@update');

    Route::get('configuracion', 'con_administrator_configuracion@index');
    Route::post('adminconfigcrear', 'con_administrator_configuracion@actualizar');

    //Publiacaciones
    Route::get('publiacionesver', 'con_publiaciones@index');
    Route::get('publiacionescrear', 'con_publiaciones@create');
    /*Route::post('listar_arch', 'con_maletin@listar_arch');
    Route::post('actarch', 'con_maletin@alias');//Actualiza los alias
    Route::get('delarchivo/{id}', 'con_maletin@eliminar'); //Elimina los archivos
    Route::get('descargar/{archivo}', 'con_maletin@descargar'); // Descarga los archivos*/
    Route::get('admsalir', 'con_administrator_login@salir');
});
