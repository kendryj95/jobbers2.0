<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers">
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="local/resources/views/css/icons.css">
		<link rel="stylesheet" href="local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	</head>
	<body>
		<!--Header responsive-->
		<?php include("local/resources/views/includes/menu_top_responsive.php");?>
		<?php include("local/resources/views/includes/menu_top.php");?>
		<section>
			<div class="block no-padding  gray">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="inner2">
								<div class="inner-title2">
									<h3>Contacto jobbers</h3> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="block">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 column">
							<div class="contact-form">
								<h3>Completa el formulario</h3>
								<form action="regcontato" method="POST">
									<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
									<div class="row">
										<div class="col-lg-12">
											<span class="pf-title">Nombre completo</span>
											<div class="pf-field">
												<input name="nombres" type="text" placeholder="Nombre">
											</div>
										</div>
										<div class="col-lg-12">
											<span class="pf-title">Correo</span>
											<div class="pf-field">
												<input name="correo" type="text" placeholder="Correo">
											</div>
										</div>
										<div class="col-lg-12">
											<span class="pf-title">Asunto</span>
											<div class="pf-field">
												<input name="asunto" type="text" placeholder="Asunto">
											</div>
										</div>
										<div class="col-lg-12">
											<span class="pf-title">Mensaje</span>
											<div  class="pf-field">
												<textarea name="mensaje"></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<button type="submit">Enviar</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-6 column">
							<div class="contact-textinfo">
								<h3>Datos de Jobbers</h3>
								<ul>
									<li><i class="la la-map-marker"></i><span>Cordoba, Artentina.</span></li>
									<li><i class="la la-phone"></i><span>Teléfono : Proximamente</span></li>
									<li><i class="la la-fax"></i><span>Fax : Proximamente</span></li>
									<li><i class="la la-envelope-o"></i><span>Correo : administracion@jobbersargentina.net</span></li>
								</ul>
								 
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php include("local/resources/views/includes/general_footer.php");?>
	</div>
	<?php include("local/resources/views/includes/login_register_modal.php");?>
	<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
	<script src="local/resources/views/js/script.js" type="text/javascript"></script>
	<script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
	<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
	<script src="local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
	<script src="local/resources/views/js/maps2.js" type="text/javascript"></script>
</body>
</html>