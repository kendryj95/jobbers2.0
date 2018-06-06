<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina - Empresa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers">
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
									<h3>Bienvenido <?= session()->get("emp_nombre_empresa") ?></h3>
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
							<!-- Inicio del contenido de la vista -->
							<div class="col-lg-9 column">
								<div class="padding-left">
									<br><br>
									<div class="row">
										<div class="col-lg-12">
											<div class="heading">
												<h2>Compra nuestro planes y paquetes</h2>
												<span>Recuerda que comprando el plan PREMIUM tienes todos los beneficios de nuestra plataforma y te ayudará a conseguir a los mejores jobbers del mundo.</span>
												</div><!-- Heading -->
												<div class="plans-sec">
													<div class="row">
														<div class="col-lg-6">
															<div class="pricetable">
																<div class="pricetable-head">
																	<h3>Gratis</h3>
																	<h2><i>$</i>0</h2>
																	<span>30 días</span>
																	</div><!-- Price Table -->
																	<ul>
																		<li>1 job posting</li>
																		<li>0 featured job</li>
																		<li>Job displayed for 20 days</li>
																		<li>Premium Support 24/7</li>
																	</ul>
																	<a href="javascript:void(0)" class="addPlan" title="">SELECCIONAR</a>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="pricetable">
																	<div class="pricetable-head">
																		<h3>Premium</h3>
																		<h2><i>$</i>100</h2>
																		<span>1 Año</span>
																		</div><!-- Price Table -->
																		<ul>
																			<li>11 job posting</li>
																			<li>12 featured job</li>
																			<li>Job displayed for 30 days</li>
																			<li>Premium Support 24/7</li>
																		</ul>
																		<a href="javascript:void(0)" class="addPlan" title="">SELECCIONAR</a>
																	</div>
																</div>
															</div>
														</div>
														
														<div style="float: left; width: 100%; margin-top: 10px; padding: 20px">
															<button class="btn btn-primary btn-block">
															Aceptar
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Fin del contenido de la vista -->
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
									$('.addPlan').on('click', function(){
										$('.addPlan').html('SELECCIONAR').closest('.pricetable').removeClass('active');
										$(this).html('<i class="la la-check-circle"></i> SELECCIONADO').closest('.pricetable').addClass('active');
									});
								});
							</script>
						</body>
					</html>