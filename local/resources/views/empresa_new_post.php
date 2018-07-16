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
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		
	</head>
	<body>
		<div class="theme-layout" id="scrollup">
			
			<?php include("includes/header_responsive_empresa.php") ?>
			
			<?php include "includes/header_empresa.php" ?>
			<section class="overlape">
				<div class="block no-padding">
					<div data-velocity="-.1" style="background: url(../local/resources/views/images/empresa_gral.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="inner-header">
									<h3>Bienvenido <?= session()->get("emp_nombre_empresa") != "" ? session()->get("emp_nombre_empresa") : session()->get("empresa") ?></h3>
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
							
							<?php include("includes/aside_empresa.php") ?>
							<div class="col-lg-9 column">
								<div class="padding-left">
									<div class="profile-title">
										<h3>Publicar nueva oferta de trabajo</h3>
										<div class="steps-sec">
											<div class="step active" id="step1">
												<p><i class="la la-info"></i></p>
												<span>Información</span>
											</div>
											
											<div class="step" id="step2">
												<p><i class="la  la-check-circle"></i></p>
												<span>Listo</span>
											</div>
										</div>
									</div>
									<div class="profile-form-edit" style="margin-bottom: 20px">
										<form id="form_oferta">
											<div class="row">
												<div class="col-lg-12">
													<span class="pf-title">Titulo de la oferta <b>*</b></span>
													<div class="pf-field">
														<input type="text" placeholder="Designer" name="titulo" id="titulo" />
													</div>
												</div>
												<div class="col-lg-12">
													<span class="pf-title">Descripción <b>*</b></span>
													<div class="pf-field">
														<textarea placeholder="Descripcion de la oferta" name="descripcion" id="descripcion"></textarea>
													</div>
												</div>
												
												<div class="col-lg-6">
													<span class="pf-title">Área <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el área" class="chosen" id="area" name="area" onchange="getSector(this.value)">
															<option value="0">Seleccionar</option>
															<?php foreach ($areas as $area): ?>
															<option value="<?= $area->id ?>"><?= $area->area ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Sector <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el sector" class="chosen" id="sector" name="sector">
															<option>Seleccionar</option>
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Provincia <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona la provincia" class="chosen" id="provincia" onchange="getLocalidad(this.value)" name="provincia">
															<option value="0">Seleccionar</option>
															<?php foreach ($provincias as $prov): ?>
															<option value="<?= $prov->id ?>"><?= $prov->provincia ?></option>
															<?php endforeach ?>
															
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Localidad <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona la localidad" class="chosen" id="localidad" name="localidad">
															<option>Seleccionar</option>
														</select>
													</div>
												</div>
												<div class="col-lg-12">
													<span class="pf-title">Dirección</span>
													<div class="pf-field">
														<input type="text" placeholder="Dirección de la oferta laboral" name="direccion" id="direccion" />
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Salario por ofrecer <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el tipo de salario" class="chosen" id="salario" name="salario">
															<option value="0">Seleccionar</option>
															<?php foreach ($salarios as $salario): ?>
															<option value="<?= $salario->id ?>"><?= $salario->salario ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Planes de estado <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el plan del estado" class="chosen" id="plan" name="plan">
															<option value="0">Seleccionar</option>
															<?php foreach ($planes as $plan): ?>
															<option value="<?= $plan->id ?>"><?= $plan->plan ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Disponibilidad <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor la disponibilidad" class="chosen" id="disp" name="disp">
															<option value="0">Seleccionar</option>
															<?php foreach ($disponibilidades as $disp): ?>
															<option value="<?= $disp->id ?>"><?= ucwords(strtolower($disp->nombre)); ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-12">
													<br>
													<p class="vtchek">
														<input type="checkbox" name="discapacidad" id="discapacidad">
														<label for="discapacidad">Candidados con discapacidad. <b>*</b></label>
													</p>
												</div>
												<div class="col-lg-12">
													<span class="pf-title">Agregar video</span>
													<div class="pf-field">
														<input type="text" placeholder="Link/Url Youtube (Opcional)" id="video" name="video" />
													</div>
												</div>
												<div class="col-lg-12">
													<button type="button" id="post">Publicar</button>
												</div>
												
											</div>
										</form>
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
		
				<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/modernizr.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/wow.min.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
				<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
				<script src="../local/resources/views/js/maps2.js" type="text/javascript"></script>
				<script src="../local/resources/views/plugins/notify.js" type="text/javascript"></script>
				<script>
					$(document).ready(function() {
						$('#post').on('click', function(){
							var titulo = $('#titulo').val();
							var descripcion = $('#descripcion').val();
							var area = $('#area').val();
							var sector = $('#sector').val();
							var provincia = $('#provincia').val();
							var localidad = $('#localidad').val();
							var salario = $('#salario').val();
							var plan = $('#plan').val();
							var disp = $('#disp').val();
							var discapacidad = $('#discapacidad').is(':checked') ? 1 : 0;
							if (titulo != "" && descripcion != "" && area != 0 && sector != 0 && provincia != 0 && localidad != 0 && salario != 0 && plan != 0 && disp != 0) {
								var datos = $('#form_oferta').serialize();
								
								$.ajaxSetup({
									headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									}
								});
								$.ajax({
									url: 'registrar_post',
									type: 'POST',
									dataType: 'json',
									data: datos,
									beforeSend: function(){
										$(this).text("Publicando...").prop("disabled", true);
									},
									success: function(response){
										if (response.status == 1) {
											$.notify("Oferta publicada satisfactoriamente.", {
												className:"success",
												globalPosition: "bottom center"
											});
											$('#step1').removeClass('active');
											$('#step2').addClass('active');
											$('#form_oferta')[0].reset();
											setTimeout(function(){
												window.location.assign("ofertas")
											}, 3000);
										} else {
											$.notify("Lo sentimos, ha ocurrido un error inesperado. Por favor recarge la pagina nuevamente.", {
												className:"error",
												globalPosition: "bottom center"
											});
										}
										
									},
									error: function(error){
										$.notify("Lo sentimos, ha ocurrido un error inesperado. Por favor recarge la pagina nuevamente.", {
												className:"error",
												globalPosition: "bottom center"
										});
									},
									complete: function(){
										$(this).text("Publicar").prop("disabled", false);
									}
								});
							} else {
								$.notify("Debes completar todos los campos obligatorios.", {
									className:"error",
									globalPosition: "bottom center"
								});
							}
				
						});
					});
					function getSector(id_area){
						if (id_area != 0) {
							$.ajax({
								url: '../sectores/'+id_area,
								type: 'GET',
								dataType: 'json',
								beforeSend: function(){
									$('#sector').html('<option value="">Cargando...</option>').prop('disabled', true).trigger('chosen:updated');
								},
								success: function(response){
									if (response.status == 1) {
										let html = '<option value="0">Seleccionar</option>';
										response.sectores.forEach(function(sector){
											html += '<option value="'+sector.id+'">'+sector.nombre+'</option>';
										});
										$('#sector').html(html).trigger('chosen:updated');
									} else {
										alert("Error al cargar los sectores");
									}
								},
								error: function(){
									alert("Lo sentimos, ha ocurrido un error inesperado. Por favor recargue la pagina");
									$('#sector').html('<option value="0">Seleccionar</option>').trigger('chosen:updated');
								},
								complete: function(){
									$('#sector').prop('disabled', false).trigger('chosen:updated');
								}
							});
						} else {
							$('#sector').html('<option value="0">Seleccionar</option>').trigger('chosen:updated');
						}
						
					}
					function getLocalidad(id_provincia){
						if (id_provincia != 0) {
							$.ajax({
								url: '../localidades/'+id_provincia,
								type: 'GET',
								dataType: 'json',
								beforeSend: function(){
									$('#localidad').html('<option value="">Cargando...</option>').prop('disabled', true).trigger('chosen:updated');
								},
								success: function(response){
									if (response.status == 1) {
										let html = '<option value="0">Seleccionar</option>';
										response.localidades.forEach(function(localidad){
											html += '<option value="'+localidad.id+'">'+localidad.localidad+'</option>';
										});
										$('#localidad').html(html).trigger('chosen:updated');
									} else {
										$.notify("Error al cargar las localidades", {
											className:"error",
											globalPosition: "bottom center"
										});
									}
								},
								error: function(){
									alert("Lo sentimos, ha ocurrido un error inesperado. Por favor recargue la pagina");
									$('#localidad').html('<option value="0">Seleccionar</option>').trigger('chosen:updated');
								},
								complete: function(){
									$('#localidad').prop('disabled', false).trigger('chosen:updated');
								}
							});
						} else {
							$('#localidad').html('<option value="0">Seleccionar</option>').trigger('chosen:updated');
						}
					}
				</script>
			</body>
		</html>