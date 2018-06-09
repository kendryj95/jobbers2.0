<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina - Empresa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers">
		<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		
	</head>
	<body>
		<div class="theme-layout" id="scrollup">
			
			<?php include("includes/header_responsive_empresa.php") ?>
			
			<?php include "includes/header_empresa.php" ?>
					<section class="overlape">
						<div class="block no-padding">
							<div data-velocity="-.1" style="background: url(../../local/resources/views/images/empresa_gral.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
							<div class="container fluid">
								<div class="row">
									<div class="col-lg-12">
										<div class="inner-header">
											<h3>Postulados a <a href="../../detalleoferta/<?= $postulados[0]->id_publicacion ?>">"<?= $postulados[0]->titulo_oferta ?>"</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section>
						<div class="block no-padding">
							<div class="container">
								<div class="row no-gape">
									<aside class="col-lg-4 column border-right">
										<button class="btn btn-primary" id="filterButton" onclick="limpiarFiltros()"><i class="la la-filter filters"></i> 
										<i class="la la-eraser clear-filters" style="display: none"></i>
											Limpiar Filtros
										</button>
										<div class="widget">
											<h3 class="sb-title open">Sexo</h3>
											<div class="specialism_widget">
												<div class="simple-checkbox">
													<p><input class="sexo" type="radio" name="smplechk" id="sexo_0" checked="checked" value="0"><label for="sexo_0">Ambos</label></p>
													<p><input class="sexo" type="radio" name="smplechk" id="sexo_1" value="1"><label for="sexo_1">Masculino</label></p>
													<p><input class="sexo" type="radio" name="smplechk" id="sexo_2" value="2"><label for="sexo_2">Femenino</label></p>
													<p><input class="sexo" type="radio" name="smplechk" id="sexo_3" value="3"><label for="sexo_3">Otros</label></p>
												</div>
											</div>
										</div>
										<div class="widget">
											<h3 class="sb-title open">Experiencia Laboral</h3>
											<div class="specialism_widget">
												<div class="simple-checkbox scrollbar">
													<p><input class="exp" type="radio" name="exp_lab" id="exp_lab_0" value="0" checked="checked"><label for="exp_lab_0">Sin Seleccionar</label></p>
													<?php foreach ($filtro_experiencia_laboral as $value): ?>
													<p><input class="exp" type="radio" name="exp_lab" id="exp_lab_<?= $value->id ?>" value="<?= $value->id ?>"><label for="exp_lab_<?= $value->id ?>"><?= $value->nombre ?></label></p>
													<?php endforeach ?>
												</div>
											</div>
										</div>
										<div class="widget">
											<h3 class="sb-title open">Salario Pretendido</h3>
											<div class="specialism_widget">
												<div class="simple-checkbox">
													<p><input class="salario" type="radio" name="salario" id="salario_0" value="0" checked="checked"><label for="salario_0">Sin Seleccionar</label></p>
													<?php foreach ($filtro_salario as $value): ?>
													<p><input class="salario" type="radio" name="salario" id="salario_<?= $value->id ?>" value="<?= $value->id ?>"><label for="salario_<?= $value->id ?>"><?= $value->salario ?></label></p>
													<?php endforeach ?>
												</div>
											</div>
										</div>
										<div class="widget">
											<h3 class="sb-title closed">Edad</h3>
											<div class="specialism_widget">
												<div class="simple-checkbox">
													<p><input class="edad" type="radio" name="edad" id="edad_0" value="" checked="checked"><label for="edad_0">Sin Definir</label></p>
													<p><input class="edad" type="radio" name="edad" id="edad_1" value="0,18"><label for="edad_1">0 - 18</label></p>
													<p><input class="edad" type="radio" name="edad" id="edad_2" value="18,30"><label for="edad_2">18 - 30</label></p>
													<p><input class="edad" type="radio" name="edad" id="edad_3" value="30,45"><label for="edad_3">30 - 45</label></p>
													<p><input class="edad" type="radio" name="edad" id="edad_4" value="45"><label for="edad_4">45+</label></p>
												</div>
											</div>
										</div>
										<div class="widget">
											<h3 class="sb-title closed">Areas de estudio</h3>
											<div class="specialism_widget">
												<div class="simple-checkbox">
													<p><input class="area" type="radio" name="area" id="area_0" value="0" checked="checked"><label for="area_0">Sin Definir</label></p>
													<?php foreach ($filtro_area_estudios as $value): ?>
													<p><input class="area" type="radio" name="area" id="area_<?= $value->id ?>" value="<?= $value->id ?>"><label for="area_<?= $value->id ?>"><?= $value->descripcion ?></label></p>
													<?php endforeach ?>
												</div>
											</div>
										</div>
										<div class="widget">
											<h3 class="sb-title closed">Provincia</h3>
											<div class="specialism_widget">
												<div class="simple-checkbox">
													<p><input class="provincia" type="radio" name="prov" id="prov_0" value="0" checked="checked"><label for="prov_0">Sin Definir</label></p>
													<?php foreach ($filtro_provincia as $value): ?>
													<p><input class="provincia" type="radio" name="prov" id="prov_<?= $value->id ?>" value="<?= $value->id ?>"><label for="prov_<?= $value->id ?>"><?= $value->provincia ?></label></p>
													<?php endforeach ?>
												</div>
											</div>
										</div>
										<div class="widget">
											<h3 class="sb-title closed">Idiomas</h3>
											<div class="specialism_widget">
												<div class="simple-checkbox">
													<p><input class="idioma" type="radio" name="idioma" id="idioma_0" value="0" checked="checked"><label for="idioma_0">Sin Definir</label></p>
													<?php foreach ($filtro_idioma as $value): ?>
													<p><input class="idioma" type="radio" name="idioma" id="idioma_<?= $value->id ?>" value="<?= $value->id ?>"><label for="idioma_<?= $value->id ?>"><?= $value->descripcion ?></label></p>
													<?php endforeach ?>
												</div>
											</div>
										</div>
									</aside>
									<div class="col-lg-8 column">
										<div class="padding-left">
											<div class="manage-jobs-sec">
												<h3>Lista de candidatos</h3>
												<table id="table_postulados">
													<thead>
														<tr>
															<td>Candidato</td>
															<td>Ocupación</td>
															<td>Fecha postulación</td>
															<td></td>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($postulados as $postulado): ?>
														<tr>
															<td>
																<div class="table-list-title">
																	<a href="#"><?= $postulado->nombre_candidato ?></a><br />
																	<span>Edad: <?= $postulado->edad_candidato ?>&nbsp; Sexo: <?= $postulado->sexo_candidato ?></span>
																</div>
															</td>
															<td>
																<div class="table-list-title">
																	<h3><a href="#" title=""><?= $postulado->profesion_candidato ?></a></h3>
																</div>
															</td>
															<td>
																<span><?= $postulado->fecha_postulacion ?></span><br />
															</td>
															<td>
																<ul class="action_job">
																	<!-- <li><span>Eliminar</span><a href="#" title=""><i class="la la-trash-o"></i></a></li> -->
																</ul>
															</td>
														</tr>
														<?php endforeach ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<br>
					<?php include("includes/general_footer_empresas.php") ?>
				</div>
				
						<script src="../../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
						<script src="../../local/resources/views/js/modernizr.js" type="text/javascript"></script>
						<script src="../../local/resources/views/js/script.js" type="text/javascript"></script>
						<script src="../../local/resources/views/js/wow.min.js" type="text/javascript"></script>
						<script src="../../local/resources/views/js/slick.min.js" type="text/javascript"></script>
						<script src="../../local/resources/views/js/parallax.js" type="text/javascript"></script>
						<script src="../../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
						<script src="../../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
						<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
						<script src="../../local/resources/views/js/maps2.js" type="text/javascript"></script>
						<script src="../../local/resources/views/plugins/notify.js" type="text/javascript"></script>
						<script>
							
							var selector = ".sexo, .exp, .salario, .edad, .area, .provincia, .idioma";
							
							$(document).ready(function() {


								$('#filterButton').hover(onHover, onLeave);
								function onHover(){
									$('.filters').hide();
									$('.clear-filters').show();
								}

								function onLeave(){
									$('.clear-filters').hide();
									$('.filters').show();
								}
								
								

								$(selector).on('change', function(){
									filtrar();
								});

							});

							function limpiarFiltros(){
								$('.sexo[value=0]').prop('checked', true);
								$('.exp[value=0]').prop('checked', true);
								$('.salario[value=0]').prop('checked', true);
								$('.edad[value=""]').prop('checked', true);
								$('.area[value=0]').prop('checked', true);
								$('.provincia[value=0]').prop('checked', true);
								$('.idioma[value=0]').prop('checked', true);

								filtrar();
							}

							function filtrar(){

								$.ajaxSetup({
									headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									}
								});
								$.ajax({
									url: '../../postulados/filtrar',
									type: 'POST',
									dataType: 'json',
									data: {
										sexo: $('.sexo:checked').val(),
										experiencia: $('.exp:checked').val(),
										salario: $('.salario:checked').val(),
										edad: $('.edad:checked').val(),
										area: $('.area:checked').val(),
										provincia: $('.provincia:checked').val(),
										idioma: $('.idioma:checked').val(),
										id_publicacion: <?= $id_publicacion ?>
									},
									success: function(response){

										var html = '';

										if (response.postulados.length>0) {

											response.postulados.forEach(function(p){
												html += '<tr><td><div class="table-list-title"><a href="#">'+p.nombre_candidato +'</a><br/><span>Edad: '+ p.edad_candidato +'&nbsp; Sexo: '+ p.sexo_candidato +'</span></div></td><td><div class="table-list-title"><h3><a href="#" title="">'+ p.profesion_candidato +'</a></h3></div></td><td><span>'+p.fecha_postulacion +'</span><br/></td><td><ul class="action_job"></ul></td></tr>';
											});
										} else {
											html = '<tr><td colspan="4" align="center">"Sin resultados"</td></tr>';
										}

										$('#table_postulados tbody').html(html);
									},
									error: function(error){
										console.log("Error", error);
									}
								});
								
							}
						</script>
					</body>
				</html>