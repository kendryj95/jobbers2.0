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

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
		    google_ad_client: "ca-pub-1968505410020323",
		    enable_page_level_ads: true
		  });
		</script>
		
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
					<div data-velocity="-.1" style="background: url(../local/resources/views/images/detalle.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
													<?php if (count($ofertas) > 0): ?>
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
													<?php endif ?>
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
						</body>
					</html>