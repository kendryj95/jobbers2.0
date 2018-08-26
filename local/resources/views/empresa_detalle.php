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
		<?php include('local/resources/views/includes/chat_soporte.php');?>
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
													<?php $imagen_perfil = $empresa[0]->imagen == null || $empresa[0]->imagen == '' ? asset('local/resources/views/images/company-avatar.png') : asset('uploads/'.$empresa[0]->imagen) ?>
													<div class="job-thumb"> <img src="<?= $imagen_perfil ?>" alt="Imagen de la empresa" width="120" height="120" /></div>
													<div class="job-single-info3">
														<h3><?= $empresa[0]->nombre_empresa ?></h3>
														<span><i class="la la-map-marker"></i><?= $empresa[0]->provincia_localidad ?></span>
														<ul class="tags-jobs">
															<li><i class="la la-file-text"></i> Candidatos 0</li>
															<li><i class="la la-calendar-o"></i> Ultima Oferta: <?= $empresa[0]->last_date_oferta ?></li>
															<li><i class="la la-eye"></i> Visitas 0</li>
														</ul>
													</div>
													</div><!-- Job Head -->
												</div>
												<!-- <div class="col-lg-2">
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
													</div>
												</div> -->
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
															<!-- Oferta recomendada -->
															<div class="job-listing wtabs borde-recomend" style="background: url(../local/resources/views/images/back-ofertas.jpg); background-size: cover">
																<div class="recomend"><span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> Oferta destacada</span></div>
																<div class="job-title-sec container-desc-oferta">
																	<div class="row">
																		<div class="col-6">
																			<h5 class="title-recom">Coca Cola</h5>
																			<p class="time-pub" style="margin-left: 20px;">Publicaciones: 485</p>
																			<p class="time-pub" style="margin-left: 20px; margin-bottom: 20px">
																			Redes: 
																			<a href="#"><span class="container-fb" style="float: inherit"><i class="fa fa-facebook" style="padding:6px; margin-left: 0px;"></i></span></a>
																			<a href="#"><span class="container-in" style="float: inherit"><i class="fa fa-linkedin mr-0" style="padding:4px; margin-left: 0px; font-size: 13px;"></i></span></a>
																			<a href="#"><span class="container-tw" style="float: inherit"><i class="fa fa-twitter mr-0" style="padding:3px; margin-left: 0px;"></i></span></a><a href="#" class="jump mobile-inline"><br></a>
																			<a href="#"><span class="container-ig" style="float: inherit"><i class="fa fa-instagram mr-0" style="padding:3px; margin-left: 1px;"></i></span></a>
																			<a href="#"><span class="container-web" style="float: inherit"><i class="fa fa-globe mr-0" style="padding:3px; margin-left: 0px;"></i></span></a>
																			</p>
																		</div>
																		<div class="col-6">
																			<img src="http://urbancomunicacion.com/wp-content/uploads/2017/08/Historia-del-logotipo-de-Coca-Cola-Urban-comunicacion.png" class="img-fluid" width="80" alt="">
																		</div>
																	</div>
																	<h5 class="title-recom">Titulo de la oferta de trabajo <a href="#"><span style="float: right; color: #bbbbbb; font-size: 15px; font-weight: 400;"><sup>Denunciar</sup> <i class="fa fa-exclamation-circle exclamation-icon"></i></span></a></h5>
																	<p class="time-pub"><i class="fa fa-calendar"></i> Publicada Hoy a las 10:58 Am - Termina: 08/12/2018</p>
																	<p class="desc-oferta">Mauris pulvinar efficitur quam nec consequat. Vestibulum eu luctus eros. Praesent non erat ullamcorper, ultrices tellus sed, egestas massa. Nunc mollis ipsum non nunc aliquet blandit. Praesent ullamcorper, libero id maximus mollis, leo neque hendrerit ligula, a egestas augue ipsum at lectus. Donec a ligula porta, vulputate mauris quis, sodales elit. </p>
																	<br>
																	<div class="job-lctn">
																		Cocacola&nbsp;
																		<i class="fa fa-star gold"></i>
																		<i class="fa fa-star gold"></i>
																		<i class="fa fa-star gold"></i>
																		<i class="fa fa-star gold"></i>
																		<i class="fa fa-star gold"></i>
																		&nbsp;
																		<i class="fa fa-eye"></i>11&nbsp;
																		<i class="fa fa-heart red"></i>3&nbsp;
																		<i class="fa fa-clock-o mr-0"></i>
																		<span class="disponibilidad">FullTime</span>&nbsp;
																		<i class="fa fa-wheelchair blue"></i>
																		<div class="desk" style="float: right">
																			<a href="#"><span class="container-fb"><i class="fa fa-facebook mr-0"></i></span></a>
																			<a href="#"><span class="container-in"><i class="fa fa-linkedin mr-0"></i></span></a>
																			<a href="#"><span class="container-tw"><i class="fa fa-twitter mr-0"></i></span></a>
																			<a href="#"><span class="container-ig"><i class="fa fa-instagram mr-0"></i></span></a>
																			<a href="#"><span class="container-web"><i class="fa fa-globe mr-0"></i></span></a>
																		</div>
																		<p class="container-media mobile" style="margin-bottom: 0;">
																			<a href="#"><span class="container-fb" style="float: inherit"><i class="fa fa-facebook" style="margin-left: 4px; vertical-align: text-top"></i></span></a>
																			<a href="#"><span class="container-in" style="float: inherit"><i class="fa fa-linkedin mr-0" style="padding:4px; margin-left: 0px; font-size: 13px; vertical-align: super;"></i></span></a>
																			<a href="#"><span class="container-tw" style="float: inherit"><i class="fa fa-twitter mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
																			<a href="#"><span class="container-ig" style="float: inherit"><i class="fa fa-instagram mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
																			<a href="#"><span class="container-web" style="float: inherit"><i class="fa fa-globe mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
																		</p>
																	</div>
																</div>
																<div class="job-style-bx container-img-oferta desk">
																	<img src="../local/resources/views/images/award.png" class="img-fluid img-oferta" alt="">
																</div>
															</div>


															<!-- Oferta normal -->
															<div class="job-listing wtabs">
																<div class="mobile">
																	<img src="http://urbancomunicacion.com/wp-content/uploads/2017/08/Historia-del-logotipo-de-Coca-Cola-Urban-comunicacion.png" class="img-fluid img-oferta" alt="">
																	<p class="nombre-img">Coca Cola</p>
																</div>
																<div class="job-title-sec container-desc-oferta">
																	<h5 class="title-recom">Titulo de la oferta de trabajo <a href="#"><span style="float: right; color: #bbbbbb; font-size: 15px; font-weight: 400;"><sup>Denunciar</sup> <i class="fa fa-exclamation-circle exclamation-icon"></i></span></a></h5>
																	<p class="time-pub"><i class="fa fa-calendar"></i> Publicada Hoy a las 10:58 Am - Termina: 08/12/2018</p>
																	<p class="desc-oferta">Mauris pulvinar efficitur quam nec consequat. Vestibulum eu luctus eros. Praesent non erat ullamcorper, ultrices tellus sed, egestas massa. Nunc mollis ipsum non nunc aliquet blandit. Praesent ullamcorper, libero id maximus mollis, leo neque hendrerit ligula, a egestas augue ipsum at lectus. Donec a ligula porta, vulputate mauris quis, sodales elit. </p>
																	<br>
																	<div class="job-lctn">
																		Cocacola&nbsp;
																		<i class="fa fa-star gold"></i>
																		<i class="fa fa-star gold"></i>
																		<i class="fa fa-star gold"></i>
																		<i class="fa fa-star gold"></i>
																		<i class="fa fa-star gold"></i>
																		&nbsp;
																		<i class="fa fa-eye"></i>11&nbsp;
																		<i class="fa fa-heart red"></i>3&nbsp;
																		<i class="fa fa-clock-o mr-0"></i>
																		<span class="disponibilidad">FullTime</span>&nbsp;
																		<i class="fa fa-wheelchair blue"></i>
																		<div class="desk" style="float: right">
																			<a href="#"><span class="container-fb"><i class="fa fa-facebook mr-0"></i></span></a>
																			<a href="#"><span class="container-in"><i class="fa fa-linkedin mr-0"></i></span></a>
																			<a href="#"><span class="container-tw"><i class="fa fa-twitter mr-0"></i></span></a>
																			<a href="#"><span class="container-ig"><i class="fa fa-instagram mr-0"></i></span></a>
																			<a href="#"><span class="container-web"><i class="fa fa-globe mr-0"></i></span></a>
																		</div>
																		<p class="container-media mobile" style="margin-bottom: 0;">
																			<a href="#"><span class="container-fb" style="float: inherit"><i class="fa fa-facebook" style="margin-left: 4px; vertical-align: text-top"></i></span></a>
																			<a href="#"><span class="container-in" style="float: inherit"><i class="fa fa-linkedin mr-0" style="padding:4px; margin-left: 0px; font-size: 13px; vertical-align: super;"></i></span></a>
																			<a href="#"><span class="container-tw" style="float: inherit"><i class="fa fa-twitter mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
																			<a href="#"><span class="container-ig" style="float: inherit"><i class="fa fa-instagram mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
																			<a href="#"><span class="container-web" style="float: inherit"><i class="fa fa-globe mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
																		</p>
																	</div>
																</div>
																<div class="job-style-bx container-img-oferta desk">
																	<img src="http://urbancomunicacion.com/wp-content/uploads/2017/08/Historia-del-logotipo-de-Coca-Cola-Urban-comunicacion.png" class="img-fluid img-oferta" alt="">
																	<p class="nombre-img">Coca Cola</p>
																</div>
															</div>

															<!-- Curso gratis -->
															<div class="job-listing wtabs borde-urgente">
																<div class="urgente"><span>Curso gratis</span></div>
																<div class="job-title-sec container-desc-curso" ;>
																	<h3>
																	<a href="detalleoferta/'.$key->id.'" title="">
																		<div style="font-size:22px; color: #494949" id="descripcion_'.$key->id.'">Curso de programador PHP  <span class="link-urgente">https://google.co.ve/search</span></div>
																	</a>
																	</h3>
																	<p href="#"><span style="color: #555555; line-height: 18px; color: #494949">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum tincidunt velit at molestie. Donec mattis orci non risus auctor blandit.
																	</span></p>
																	<br>
																</div>
															</div>


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
															<li><i class="la la-bullhorn"></i>
																<h3>Redes Sociales</h3>
																<div class="share-bar">
																	<?php if ($empresa[0]->facebook != "" || $empresa[0]->facebook != null): ?>
																	<a href="<?= $empresa[0]->facebook ?>" title="" class="share-fb"><i style="position: initial; font-size: initial; color:inherit;" class="fa fa-facebook"></i></a>
																	<?php endif ?>
																	<?php if ($empresa[0]->instagram != "" || $empresa[0]->instagram != null): ?>
																	<a href="<?= $empresa[0]->instagram ?>" title="" class="share-ig"><i style="position: initial; font-size: initial; color:inherit;" class="fa fa-instagram"></i></a>
																	<?php endif ?>
																	<?php if ($empresa[0]->twitter != "" || $empresa[0]->twitter != null): ?>
																	<a href="<?= $empresa[0]->twitter ?>" title="" class="share-twitter"><i style="position: initial; font-size: initial; color:inherit;" class="fa fa-twitter"></i></a>
																	<?php endif ?>
																	<?php if ($empresa[0]->linkedin != "" || $empresa[0]->linkedin != null): ?>
																	<a href="<?= $empresa[0]->linkedin ?>" title="" class="share-lkd"><i style="position: initial; font-size: initial; color:inherit;" class="fa fa-linkedin"></i></a>
																	<?php endif ?>
																	<?php if ($empresa[0]->web != "" || $empresa[0]->web != null): ?>
																	<a href="<?= $empresa[0]->web ?>" title="" class="share-web"><i style="position: initial; font-size: initial; color:inherit;" class="la la-globe"></i></a>
																	<?php endif ?>
																</div>
															</li>
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