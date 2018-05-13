<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Jobbers Argentina
    </title>
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/local/resources/views/css/font-awesome.min.css" />
	
</head>
<body> 

<div class="theme-layout" id="scrollup">
	
	
	<?php include('local/resources/views/includes/general_header_responsive.php');?>
	<?php include('local/resources/views/includes/general_header.php');?>

	<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-featured-sec">
							<ul class="main-slider-sec text-arrows">
								<li class="slideHome"><img src="local/resources/views/images/fondo_inicio.jpg" alt="" /></li>
								<li class="slideHome"><img src="http://placehold.it/1600x800" alt="" /></li>
								<li class="slideHome"><img src="http://placehold.it/1600x800" alt="" /></li>
							</ul>
							<div class="job-search-sec">
								<div class="job-search">
									<h3>En Jobbers encuentra lo que necesitas</h3>
									<span>Programadores, contadores, médicos</span>
									<form>
										<div class="row">
											<div class="col-lg-7 col-md-5 col-sm-5 col-xs-12">
												<div class="job-field">
													<input type="text" placeholder="Palabra clave..." />
													<i class="la la-keyboard-o"></i>
												</div>
											</div>
											<div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
												<div class="job-field">
													<select data-placeholder="City, province or region" class="chosen-city">
														<option>Lugar</option>
														<option>Buenos Aires</option>
														<option>Córdoba</option> 
													</select>
													<i class="la la-map-marker"></i>
												</div>
											</div>
											<div class="col-lg-1 col-md-2 col-sm-2 col-xs-12">
												<button type="submit"><i class="la la-search"></i></button>
											</div>
										</div>
									</form>
									<div class="or-browser">
										<!--<span>Or browse job offers by </span>
										<a href="#" title="">category</a>-->
									</div>
								</div>
							</div>
							<div class="scroll-to">
								<a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
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
					<div class="col-lg-12">
						<div class="heading">
							<h2>Últimas ofertas</h2>
							<span>Las mejores empresas buscan los mejores talentos.</span>
						</div>
						<div class="job-listings-sec">
							<?php foreach ($ultimas_publicaciones as $key ) {
								echo
								'
								<div class="job-listing">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="uploads/'.$key->nombre_aleatorio.'" alt="" style="width:98px;" /> </div>
										<h3><a href="#" title="">'.$key->titulo.'</a></h3>
										<span>'.$key->empresa.'</span>
									</div>
									<span class="job-lctn"><i class="la la-map-marker"></i>'.$key->direccion.'</span>
									<span class="fav-job"><i class="la la-heart-o"></i></span>
									<span class="job-is ft">'.$key->nombre.'</span>
								</div>
								';
							}?> 
					</div>
					<div class="col-lg-12">
						<div class="browse-all-cat">
							<a href="ofertas" title="">Ver ofertas</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Categorias
	<section id="scroll-here">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Lo más buscado</h2>
							<span>37 Ofertas - 0 nuevas ofertas.</span>
						</div> 
						<div class="cat-sec">
							<div class="row no-gape">
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<i class="la la-bullhorn"></i>
											<span>Design, Art & Multimedia</span>
											<p>(22 open positions)</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<i class="la la-graduation-cap"></i>
											<span>Education Training</span>
											<p>(6 open positions)</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<i class="la la-line-chart "></i>
											<span>Accounting / Finance</span>
											<p>(3 open positions)</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<i class="la la-users"></i>
											<span>Human Resource</span>
											<p>(3 open positions)</p>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="cat-sec">
							<div class="row no-gape">
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<i class="la la-phone"></i>
											<span>Telecommunications</span>
											<p>(22 open positions)</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<i class="la la-cutlery"></i>
											<span>Restaurant / Food Service</span>
											<p>(6 open positions)</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<i class="la la-building"></i>
											<span>Construction / Facilities</span>
											<p>(3 open positions)</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="p-category">
										<a href="#" title="">
											<i class="la la-user-md"></i>
											<span>Health</span>
											<p>(3 open positions)</p>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="browse-all-cat">
							<a href="ofertas" title="">Ver todas las ofertas</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	Fin Categorias-->

	<section>
		<div class="block double-gap-top double-gap-bottom">
			<div data-velocity="-.1" style="background: url(local/resources/views/images/fondo_inicio_2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="simple-text-block">
							<h3>Con Jobbers Llegas a cientos de empresas</h3>
							<span>Publica tu CV en Jobbers y encuentra el empleo que necesitas.</span>
							<a href="#" title="">Cargar mi CV</a>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>

	

	<!--
	<section>
		<div class="block">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1920x1000) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading light">
							<h2>Qué opinan nuestros Jobbers</h2>
							<span>Cientos de Jobbers comparten sus vivencias</span>
						</div>
						<div class="reviews-sec" id="reviews-carousel">
							<div class="col-lg-6">
								<div class="reviews">
									<img src="http://placehold.it/101x101" alt="" />
									<h3>Augusta Silva <span>Web designer</span></h3>
									<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="reviews">
									<img src="http://placehold.it/101x101" alt="" />
									<h3>Ali Tufan <span>Web designer</span></h3>
									<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="reviews">
									<img src="http://placehold.it/101x101" alt="" />
									<h3>Augusta Silva <span>Web designer</span></h3>
									<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="reviews">
									<img src="http://placehold.it/101x101" alt="" />
									<h3>Ali Tufan <span>Web designer</span></h3>
									<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>
	-->

	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Jobbers en alianza con las mejores empresas</h2>
							<span>Encuentra un gran trabajo en una gran empresa</span>
						</div>
						<div class="comp-sec">
							<?php foreach ($logos_empresas as $key) {
								echo'<div class="company-img">
								<a href="#" title=""><img src="uploads/'.$key->nombre_aleatorio.'" alt="" style="width:180px;" /></a>
							</div>';
							}?>	 
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block">
			<div data-velocity="-.1" style="background: url(local/resources/views/images/fondo_tips.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Jobbers Tips</h2>
							<span>Sigue nuestros consejos y encontrarás el empleo que buscas.</span>
						</div>
						<div class="blog-sec">
							<div class="row">
								<?php foreach ($tips as $key) {
									$cadena=explode("?", $key->descripcion);
									echo '<div class="col-lg-4">
									<div class="my-blog">
											<div class="blog-thumb">
												<a href="#" title=""><img src="uploads/'.$key->nombre_aleatorio.'" alt="" style="min-height:300px;"/></a>
												<div class="blog-metas">
													<a href="#" title="">'.$cadena[0].'</a>
													<!--<a href="#" title="">0 Comments</a>-->
												</div>
											</div>
											<div class="blog-details" style="min-height:230px;">
												<h3><a href="#" title=""><p>'.$cadena[1].'</p>
												<!--<a href="#" title="">Ver<i class="la la-long-arrow-right"></i></a>-->
											</div>
										</div>
									</div>';
								}?>
								
								 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="simple-text">
							<h3>¿Alguna duda?</h3>
							<span>Escríbenos a <a href="#" style="text-decoration: underline;"><strong>Dudas Jobbers</strong></a> será una placer ayudarte</span>
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

</body>
</html>

