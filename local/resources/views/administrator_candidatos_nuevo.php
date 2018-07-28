<?php
$mi_tokken = csrf_token();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/colors/colors.css" />
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/chosen.css" /> 
	<meta name="csrf-token" content="<?php echo $mi_tokken; ?>">
</head>
<body  style="background-image: url('https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg');"> 
	<!--Header responsive-->
	<div class="theme-layout" id="scrollup">
		<?php $atras=1;?>
			<?php include('local/resources/views/includes/header_administrator.php');?> 
 <section>


		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	<div class="col-lg-9 column">
                            
                                <div class="padding-left">
                                    <div class="manage-jobs-sec addscroll">
                                        <h3>Perfil - Victor Fernandez</h3>
                                    </div> 
                                </div>
                                   <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Icons8_flat_businessman.svg/200px-Icons8_flat_businessman.svg.png" style="margin-left: 40%;">
                                <div class="text-center">  
                                   
                                     <div class="profile-form-edit" style="padding-left: 30px;">
												<p style="margin-bottom: 0px;">Imagen</p>
												<div class="pf-field" style="height: 55px;"> 
											  <input name="imagen_noticia" id="imagen_noticia" type="file" placeholder="" accept="image/*">
											</div> 
											</div>
                                </div>
                                <div class="padding-left">
                                    <div class="manage-jobs-sec addscroll">
                                        <h3>Datos personales</h3>
                                    </div>
                                </div>
                                <?php
                                
                                //Datos personales
                                $up_nombres="";
                                $up_apellidos="";
                                $up_edo_civil="";
                                $up_discapacidad="";
                                $up_sexo="";
                                $up_hijos="";
                                $up_nacionalidad="";
                                $up_t_id="";
                                $up_id="";
                                $up_fecha="";
                                $up_desc="";
                                if(isset($bandera_datos_personales) && $bandera_datos_personales==1)
                                {
                                $up_nombres=$datos_personales_up[0]->nombres;
                                $up_apellidos=$datos_personales_up[0]->apellidos;
                                $up_edo_civil=$datos_personales_up[0]->id_edo_civil;
                                $up_discapacidad=$datos_personales_up[0]->id_discapacidad;
                                $up_sexo=$datos_personales_up[0]->id_sexo;
                                $up_hijos=$datos_personales_up[0]->hijos;
                                $up_nacionalidad=$datos_personales_up[0]->id_nacionalidad;
                                $up_t_id=$datos_personales_up[0]->id_tipo_identificacion;
                                $up_id=$datos_personales_up[0]->n_identificacion;
                                $up_fecha=$datos_personales_up[0]->fecha_nac;
                                $up_desc=$datos_personales_up[0]->sobre_mi;
                                
                                }
                                // Prefenrencias laborales
                                $up_remuneracion="";
                                $up_jornada="";
                                if(isset($bandera_preferencias_laborales) && $bandera_preferencias_laborales ==1)
                                {
                                $up_remuneracion=$preferencias_laborales_up[0]->id_remuneracion_pre;
                                $up_jornada=$preferencias_laborales_up[0]->id_jornada;
                                }
                                //Datos de contacto
                                //infocontacto[0]
                                $up_telefono_contac="";
                                $up_correo_contac="";
                                $up_sitio_contac="";
                                $up_pais_contac="";
                                $up_provincia_contac="";
                                $up_localidad_contac="";
                                $up_direccion_contac="";
                                $up_latitud_contac="";
                                $up_longitud_contac="";
                                if(isset($bandera_datos_contacto) && $bandera_datos_contacto==1)
                                {
                                $up_telefono_contac=$infocontacto[0]->telefono;
                                $up_correo_contac=$infocontacto[0]->correo;
                                $up_sitio_contac=$infocontacto[0]->web;
                                $up_pais_contac=$infocontacto[0]->id_pais;
                                $up_provincia_contac=$infocontacto[0]->id_provincia;
                                $up_localidad_contac=$infocontacto[0]->id_localidad;
                                $up_direccion_contac=$infocontacto[0]->direccion;
                                $up_latitud_contac=$infocontacto[0]->latitud;
                                $up_longitud_contac=$infocontacto[0]->logitud;
                                }
                                ?>
                                <div class="profile-form-edit">
                                    <form  id="form_datos_per"  action="candidatosper" method="POST">
                                        <input type="hidden" name="_token" value="">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Nombres</span>
                                                <div class="pf-field">
                                                    <input id="datos_per_nombres" value="<?php echo $up_nombres;?>" name="nombres" type="text" placeholder="Victor" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Apellidos</span>
                                                <div class="pf-field">
                                                    <input id="datos_per_apellidos" value="<?php echo $up_apellidos;?>" name="apellidos" type="text" placeholder="Fernández" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Identificación</span>
                                                <div class="pf-field">
                                                    <select id="tipo_id" name="t_id" name="sexo" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Nº de identificación</span>
                                                <div class="pf-field">
                                                    <input id="datos_per_n_identificacion" value="<?php echo $up_id;?>" name="id" type="text" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Estado civil</span>
                                                <div class="pf-field">
                                                    <select id="edo_civil" name="edo_civil" name="sexo" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="4">Seleccionar</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <span class="pf-title">Discapacidad</span>
                                                <div class="pf-field">
                                                    <select id="discapacidad" name="discapacidad" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Sexo</span>
                                                <div class="pf-field">
                                                    <select id="sexo" name="sexo" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                         
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Fecha de nacimiento</span>
                                                <div class="pf-field">
                                                    <input id="datos_per_fecha_nac" value="<?php echo $up_fecha;?>" name="fecha_nac" type="date" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Hijos</span>
                                                <div class="pf-field">
                                                    <select id="hijos" name="hijos" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <option id="hijos_0" value="0">Sin hijos</option>
                                                        <option id="hijos_1" value="1">1</option>
                                                        <option id="hijos_2" value="2">2</option>
                                                        <option id="hijos_3" value="3">3</option>
                                                        <option id="hijos_4" value="4">4</option>
                                                        <option id="hijos_5" value="5">5</option>
                                                        <option id="hijos_6" value="6">+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Nacionalidad</span>
                                                <div class="pf-field">
                                                    <select id="nacionalidad" name="nacionalidad" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <span class="pf-title">¿Cómo te describes?</span>
                                                <div class="pf-field">
                                                    <textarea id="datos_per_descripcion" name="sobremi"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <button type="button" onClick="datos_per_validar()">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="social-edit">
                                        <h3>Preferencias laborales</h3>
                                        <form id="form_preferencias_lab" method="POST" action="candipreflab">
                                            <input type="hidden" name="_token" value="">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span class="pf-title">Remuneración</span>
                                                    <div class="pf-field">
                                                        <select id="remuneracion"  name="remuneracion" data-placeholder="Allow In Search" class="chosen">
                                                            <option value="">Seleccionar</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span class="pf-title">Jornada</span>
                                                    <div class="pf-field">
                                                        <select id="jorna" name="jornada" data-placeholder="Allow In Search" class="chosen">
                                                            <option value="">Seleccionar</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span class="pf-title">Cargos pretendidos</span>
                                                    <div class="pf-field">
                                                        <select id="cbn_cargos" onChange="set_cargo(this.value,this.id,'categorias_cargos',1)" name="cargos" data-placeholder="Allow In Search" class="chosen">
                                                            <option value="">Seleccionar</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="social-edit" style="margin-bottom: 0px;margin-top: 15px;">
                                                        
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <style type="text/css">
                                                                .addedTag span
                                                                {
                                                                margin-bottom: 20px;
                                                                }
                                                                </style>
                                                                <div class="pf-field no-margin" style="margin-top: 10px;">
                                                                    <ul class="tags" id="categorias_cargos">
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <button type="button" onClick="preferencias_lab_validar()">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                $facebook="";
                                $instagram="";
                                $twitter="";
                                $linkendin="";
                               if(isset($redes))
                               {
                               	 foreach ($redes as $key ) {
                                if($key->id_red_social=="1"){$facebook=$key->red_social;}
                                if($key->id_red_social=="3"){$instagram=$key->red_social;}
                                if($key->id_red_social=="5"){$linkendin=$key->red_social;}
                                if($key->id_red_social=="2"){$twitter=$key->red_social;}
                                }
                               }
                                ?>
                                <div class="social-edit">
                                    <h3>Redes sociales</h3>
                                    <form action="candiredescrear" method="post" id="form_candiredescrear">
                                        <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                                        <input type="hidden" name="pagina" value="perfil">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Facebook</span>
                                                <div class="pf-field">
                                                    <input id="facebook" name="facebook" type="text" placeholder="Facebook" value="<?php echo $facebook;?> " />
                                                    <i class="fa fa-facebook"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Twitter</span>
                                                <div class="pf-field">
                                                    <input  id="twitter" name="twitter" value="<?php echo $twitter;?>" type="text" placeholder="Twitter" />
                                                    <i class="fa fa-twitter"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Instragram</span>
                                                <div class="pf-field">
                                                    <input  id="instagram" name="instagram" value="<?php echo $instagram;?>" type="text" placeholder="Instragram" />
                                                    <i class="la la-instagram"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Linkedin</span>
                                                <div class="pf-field">
                                                    <input  id="linkendin" name="linkendin" value="<?php echo $linkendin;?>" type="text" placeholder="linkedin" />
                                                    <i class="la la-linkedin"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="button" onclick="redes_validar()">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="contact-edit">
                                    <h3>Información de contacto</h3>
                                    <form id="form_contact" action="candicontac" method="post">
                                        <input type="hidden"  name="_token" value="">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <span class="pf-title">Teléfono</span>
                                                <div class="pf-field">
                                                    <input id="telefono" value="<?php echo $up_telefono_contac;?>" name="telefono" type="text" placeholder="+90 538 963 58 96" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Correo</span>
                                                <div class="pf-field">
                                                    <input id="correo" value="<?php echo $up_correo_contac;?>" name="correo" type="text" placeholder="demo@jobbers.com" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Sitio Web</span>
                                                <div class="pf-field">
                                                    <input id="sitio_web" value="<?php echo $up_sitio_contac;?>" name="web" type="text" placeholder="www.jobbers.com" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">País</span>
                                                <div class="pf-field">
                                                    <select id="pais_contac" name="pais" data-placeholder="Please Select Specialism" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <option value="10">Argentina</option>
                                                        <?php
                                                        //foreach ($paises as $key) {
                                                        //echo '<option value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                        //}
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Provincia</span>
                                                <div class="pf-field">
                                                    <select id="provincia_contac" name="provincia" data-placeholder="Please Select Specialism" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Localidad</span>
                                                <div class="pf-field">
                                                    <select id="localidad_contac" name="localidad" data-placeholder="Please Select Specialism" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="">
                                                <span class="pf-title">Dirección</span>
                                                <div class="pf-field">
                                                    <input  id="direccion" value="<?php echo $up_direccion_contac;?>" name="direccion" type="text" placeholder="Buenos Aires, Argentina" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="pf-title">Latitud</span>
                                                <div class="pf-field">
                                                    <input  id="latitud" value="<?php echo $up_latitud_contac;?>" name="latitud" type="text" placeholder="41.1589654" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="pf-title">Longitud</span>
                                                <div class="pf-field">
                                                    <input  id="longitud" value="<?php echo $up_longitud_contac;?>" name="longitud" type="text" placeholder="21.1589654" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="button" onClick="contac_validar()">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                
                                <div class="padding-left" style="margin-bottom: 100px;margin-top: -50px;">
                                    <div class="manage-jobs-sec">
                                        <div class="border-title"><h3>Educación</h3>
                                            <a href="#" title="" data-toggle="modal" data-target="#modal_educ_cand" onClick="limpiar_mod_educ()">
                                            <i class="la la-plus"></i> Agregar estudios</a></div>
                                           <?php if (isset($educacion)): ?>
                                           	 <?php foreach ($educacion as $key): ?>
                                            <input type="hidden" id="estudios" value="<?php echo $key->id_area_estudio;?>" />
                                            <input type="hidden" id="nivel_es" value="<?php echo $key->id_nivel_estudio;?>" />
                                            <input type="hidden" id="pais" value="<?php echo $key->id_pais;?>" />
                                            <input type="hidden" id="titulo_" value="<?php echo $key->titulo;?>" />
                                            
                                            <div class="edu-history-sec">
                                                <div class="edu-history">
                                                    <i class="la la-graduation-cap"></i>
                                                    <div class="edu-hisinfo">
                                                        <h3 id="universidad_<?php echo $key->id;?>"><?php echo $key->nombre_institucion;?></h3>
                                                        <i id="periodo_<?php echo $key->id;?>"><?php echo $key->desde;?> - <?php echo $key->hasta;?></i>
                                                        <span><?php echo $key->titulo;?>
                                                            <i><?php echo $key->descripcion;?></i>
                                                            <i><?php echo $key->nivel;?></i>
                                                            <i><?php echo $key->estudios;?></i>
                                                        </span>
                                                        <p></p>
                                                    </div>
                                                    <ul class="action_job">
                                                        <li><span>Editar</span><a onClick="limpiar_mod_educ(<?php echo $key->id;?>),set_educacion(<?php echo $key->id;?>)" title=""><i class="la la-pencil"></i></a></li>
                                                        <li><span>Eliminar</span><a href="candidelestudios/<?php echo $key->id;?>" title=""><i class="la la-trash-o"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                           <?php endif ?>
                                            <div class="border-title"><h3>Experiencia laboral</h3><a href="#" title=""  data-toggle="modal" data-target="#modal_educ_expe"><i class="la la-plus"></i> Agregar experiencia</a></div>
                                            <div class="edu-history-sec">
                                            	<?php if (isset($experiencias)): ?>
                                                <?php foreach ($experiencias as $key): ?>
                                                <input type="hidden" id="e_sector_<?php echo $key->id;?>" value="<?php echo $key->id_actividad_empresa;?>">
                                                <div class="edu-history style2">
                                                    <i></i>
                                                    <div class="edu-hisinfo">
                                                        <h3 id="e_empresa_<?php echo $key->id;?>"><?php echo $key->nombre_empresa;?></h3> <span><?php echo $key->sector;?></span></h3>
                                                        <i id="e_periodo_<?php echo $key->id;?>"><?php echo $key->desde;?> - <?php echo $key->hasta;?></i>
                                                        <i id="e_cargo_<?php echo $key->id;?>"><?php echo $key->cargo;?></i>
                                                        <p id="e_descripcion_<?php echo $key->id;?>"><?php echo $key->descripcion;?></p>
                                                    </div>
                                                    <ul class="action_job">
                                                        <li><span>Editar</span><a onClick="limpiar_mod_expe(<?php echo $key->id;?>),set_experiencia(<?php echo $key->id;?>)" title=""><i class="la la-pencil"></i></a></li>
                                                        <li><span>Eliminar</span><a href="candidelexpe/<?php echo $key->id;?>" title=""><i class="la la-trash-o"></i></a></li>
                                                    </ul>
                                                </div>
                                                <?php endforeach ?>
                                               <?php endif ?>
                                            </div>
                                            
                                            <div class="border-title"><h3>Habilidades</h3><a title=""><i class="la la-plus" ></i> Agregar habilidad</a></div>
                                            <div class="social-edit" style="margin-bottom: 0px;">
                                                <form id="form_habilidades" method="POST" action="candisethabilidad">
                                                    <input type="hidden" name="_token" value="">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pf-field">
                                                                <select id="cbn_habilidad" onChange="set_cargo(this.value,this.id,'categorias_habilidad',1)" name="cargos" data-placeholder="Allow In Search" class="chosen">
                                                                    <option value="">Seleccionar</option>
                                                                   
                                                                </select>
                                                            </div>
                                                            <div class="social-edit" style="margin-bottom: 0px;margin-top: 15px;">
                                                                
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <style type="text/css">
                                                                        .addedTag span
                                                                        {
                                                                        margin-bottom: 20px;
                                                                        }
                                                                        </style>
                                                                        <div class="pf-field no-margin" style="margin-top: 10px;">
                                                                            <ul class="tags" id="categorias_habilidad">
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button onclick="habilidades_validar()" type="button">Guardar</button>
                                                </form>
                                                
                                            </div>
                                            <div class="progress-sec" style="margin-bottom: 0px;">
                                                
                                                <div class="col-lg-12">
                                                    <div class="social-edit">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Idiomas-->
                                        <div class="border-title"><h3>Idiomas</h3><a title=""><i class="la la-plus" ></i> Agregar idioma</a></div>
                                            <div class="social-edit" style="margin-bottom: 0px;">
                                                <form id="form_idiomas" method="POST" action="candisetidioma">
                                                    <input type="hidden" name="_token" value="">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pf-field">
                                                                <select id="cbn_idioma" onChange="set_cargo(this.value,this.id,'categorias_idioma',1)" name="cargos" data-placeholder="Allow In Search" class="chosen">
                                                                    <option value="">Seleccionar</option>
                                                                   >
                                                            </div>
                                                            <div class="social-edit" style="margin-bottom: 0px;margin-top: 15px;">
                                                                
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <style type="text/css">
                                                                        .addedTag span
                                                                        {
                                                                        margin-bottom: 20px;
                                                                        }
                                                                        </style>
                                                                        <div class="pf-field no-margin" style="margin-top: 10px;">
                                                                            <ul class="tags" id="categorias_idioma">
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button onclick="idiomas_validar()" type="button">Guardar</button>
                                                </form> 
                                            </div> 
                                        </div>
                                    </div> 
                                </div>
                            </div>
				 </div>
			</div>
		</div>
	</section>
</div>
<script src="../../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/slick.min.js" type="text/javascript"></script> 
  <script src="../../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
</body>
</html>