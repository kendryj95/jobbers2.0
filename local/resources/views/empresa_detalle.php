<?php  

function formatDate($dateMayor, $dateMenor){
	$menor = new DateTime($dateMenor);
	$mayor = new DateTime(date($dateMayor));
	$intervalo = $mayor->diff($menor);

	if ($intervalo->format("%m") != 0) {
		$m = $intervalo->format("%m") == 1 ? "mes" : "meses";
		return $intervalo->format("Hace %m $m");
	} elseif ($intervalo->format("%a") != 0){
		$d = $intervalo->format("%a") == 1 ? "día" : "días";
		return $intervalo->format("Hace %a $d");
	} elseif ($intervalo->format("%h") != 0){
		$h = $intervalo->format("%h") == 1 ? "hora" : "horas";
		return $intervalo->format("Hace %h $h");
	} elseif ($intervalo->format("%i") != 0){
		return $intervalo->format("Hace %i min");
	} else {
		return $intervalo->format("Hace %s seg");
	}
}	

?>

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

	<?php  

	if (session()->get("empresa") == null) {
		
		include("includes/general_header_responsive.php");

		include("includes/general_header.php");

	} else {

		include("includes/header_responsive_empresa.php");

		include("includes/header_empresa.php");
	}

	?>

	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3><?= $empresa[0]->nombre_empresa ?></h3>
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
				 	<div class="col-lg-12 column">
				 		<div class="job-single-sec style3">
				 			<div class="job-head-wide">
				 				<div class="row">
				 					<div class="col-lg-10">
				 						<div class="job-single-head3 emplye">
							 				<div class="job-thumb"> <img src="../uploads/<?= $empresa[0]->imagen ?>" alt="Imagen de la empresa" width="120" height="120" /></div>
							 				<div class="job-single-info3">
							 					<h3><?= $empresa[0]->nombre_empresa ?></h3>
							 					<span><i class="la la-map-marker"></i><?= $empresa[0]->provincia_localidad ?></span><span class="job-is ft">Full time</span>
							 					<ul class="tags-jobs">
								 					<li><i class="la la-file-text"></i> Candidatos 0</li>
								 					<li><i class="la la-calendar-o"></i> Ultima Oferta: <?= $empresa[0]->last_date_oferta ?></li>
								 					<li><i class="la la-eye"></i> Visitas 0</li>
								 				</ul>
							 				</div>
							 			</div><!-- Job Head -->
				 					</div>
				 					<div class="col-lg-2">
				 						<div class="share-bar">
				 							<?php if ($empresa[0]->facebook != "" || $empresa[0]->facebook != null): ?>
							 				<a href="<?= $empresa[0]->facebook ?>" title="" class="share-fb"><i class="fa fa-facebook"></i></a>
							 				<?php endif ?>
							 				<?php if ($empresa[0]->instagram != "" || $empresa[0]->instagram != null): ?>
							 				<a href="<?= $empresa[0]->instagram ?>" title="" class="share-ig"><i class="fa fa-instagram"></i></a>
							 				<?php endif ?>
							 				<?php if ($empresa[0]->twitter != "" || $empresa[0]->twitter != null): ?>
							 				<a href="<?= $empresa[0]->twitter ?>" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
							 				<?php endif ?>
							 				<?php if ($empresa[0]->linkedin != "" || $empresa[0]->linkedin != null): ?>
							 				<a href="<?= $empresa[0]->linkedin ?>" title="" class="share-lkd"><i class="fa fa-linkedin"></i></a>
							 				<?php endif ?>
							 				<?php if ($empresa[0]->web != "" || $empresa[0]->web != null): ?>
							 				<a href="<?= $empresa[0]->web ?>" title="" class="share-web"><i class="la la-globe"></i></a>
							 				<?php endif ?>
							 			</div
				 					</div>
				 				</div>
				 			</div>
				 			<div class="job-wide-devider">
							 	<div class="row">
							 		<div class="col-lg-8 column">		
							 			<div class="job-details">
							 				<p><?= $empresa[0]->descripcion ?></p>
							 			</div>
								 		<div class="recent-jobs">
							 				<h3>Ofertas de la Empresa</h3>
							 				<div class="job-list-modern">
											 	<div class="job-listings-sec no-border">

											 		<?php foreach ($ofertas as $oferta): ?>
													<div class="job-listing wtabs noimg">
														<div class="job-title-sec">
															<h3><a href="../detalleoferta/<?= $oferta->id ?>" title=""><?= $oferta->titulo ?></a></h3>
															<div class="job-lctn"><i class="la la-map-marker"></i><?= $oferta->ubicacion ?></div>
														</div>
														<div class="job-style-bx">
															<span class="job-is ft"><?= $oferta->disponibilidad ?></span>
															<!-- <span class="fav-job"><i class="la la-heart-o"></i></span> -->
															<i><?= formatDate(date('Y-m-d H:i:s'), $oferta->fecha_creacion) ?></i>
														</div>
													</div>
													<?php endforeach ?><!-- Job -->
												</div>
											 </div>
							 			</div>
							 		</div>
							 		<div class="col-lg-4 column">
							 			<div class="job-overview">
								 			<h3>Información de la empresa</h3>
								 			<ul>
								 				<li><i class="la la-eye"></i><h3>Visitas </h3><span>0</span></li>
								 				<li><i class="la la-file-text"></i><h3>Ofertas Publicadas</h3><span><?= $empresa[0]->total_ofertas ?></span></li>
								 				<li><i class="la la-bars"></i><h3>Actividad/Industria</h3><span><?= $empresa[0]->actividad_empresa ?></span></li>
								 			</ul>
								 		</div><!-- Job Overview -->
							 		</div>
							 	</div>
							 </div>
					 	</div>
				 	</div>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 column">
						<div class="widget">
							<div class="about_widget">
								<div class="logo">
									<a href="#" title=""><img src="http://placehold.it/178x40" alt="" /></a>
								</div>
								<span>Collin Street West, Victor 8007, Australia.</span>
								<span>+1 246-345-0695</span>
								<span>info@jobhunt.com</span>
								<div class="social">
									<a href="#" title=""><i class="fa fa-facebook"></i></a>
									<a href="#" title=""><i class="fa fa-twitter"></i></a>
									<a href="#" title=""><i class="fa fa-linkedin"></i></a>
									<a href="#" title=""><i class="fa fa-pinterest"></i></a>
									<a href="#" title=""><i class="fa fa-behance"></i></a>
								</div>
							</div><!-- About Widget -->
						</div>
					</div>
					<div class="col-lg-4 column">
						<div class="widget">
							<h3 class="footer-title">Frequently Asked Questions</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-6">
										<a href="#" title="">Privacy & Seurty </a>
										<a href="#" title="">Terms of Serice</a>
										<a href="#" title="">Communications </a>
										<a href="#" title="">Referral Terms </a>
										<a href="#" title="">Lending Licnses </a>
										<a href="#" title="">Disclaimers </a>	
									</div>
									<div class="col-lg-6">
										<a href="#" title="">Support </a>
										<a href="#" title="">How It Works </a>
										<a href="#" title="">For Employers </a>
										<a href="#" title="">Underwriting </a>
										<a href="#" title="">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 column">
						<div class="widget">
							<h3 class="footer-title">Find Jobs</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-12">
										<a href="#" title="">US Jobs</a>	
										<a href="#" title="">Canada Jobs</a>	
										<a href="#" title="">UK Jobs</a>	
										<a href="#" title="">Emplois en Fnce</a>	
										<a href="#" title="">Jobs in Deuts</a>	
										<a href="#" title="">Vacatures China</a>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 column">
						<div class="widget">
							<div class="download_widget">
								<a href="#" title=""><img src="http://placehold.it/230x65" alt="" /></a>
								<a href="#" title=""><img src="http://placehold.it/230x65" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-line">
			<span>© 2018 Jobhunt All rights reserved. Design by Creative Layers</span>
			<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
		</div>
	</footer>

</div>

<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>User Login</h3>
		<span>Click To Login With Demo User</span>
		<div class="select-user">
			<span>Candidate</span>
			<span>Employer</span>
		</div>
		<form>
			<div class="cfield">
				<input type="text" placeholder="Username" />
				<i class="la la-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" />
				<i class="la la-key"></i>
			</div>
			<p class="remember-label">
				<input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
			</p>
			<a href="#" title="">Forgot Password?</a>
			<button type="submit">Login</button>
		</form>
		<div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div>
	</div>
</div><!-- LOGIN POPUP -->

<div class="account-popup-area signup-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Sign Up</h3>
		<div class="select-user">
			<span>Candidate</span>
			<span>Employer</span>
		</div>
		<form>
			<div class="cfield">
				<input type="text" placeholder="Username" />
				<i class="la la-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" />
				<i class="la la-key"></i>
			</div>
			<div class="cfield">
				<input type="text" placeholder="Email" />
				<i class="la la-envelope-o"></i>
			</div>
			<div class="dropdown-field">
				<select data-placeholder="Please Select Specialism" class="chosen">
					<option>Web Development</option>
					<option>Web Designing</option>
					<option>Art & Culture</option>
					<option>Reading & Writing</option>
				</select>
			</div>
			<div class="cfield">
				<input type="text" placeholder="Phone Number" />
				<i class="la la-phone"></i>
			</div>
			<button type="submit">Signup</button>
		</form>
		<div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div>
	</div>
</div><!-- SIGNUP POPUP -->

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

</body>
</html>

