<!DOCTYPE html>
<html>
	<head>
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
		<div class="theme-layout" id="scrollup">
			<!--Header responsive-->
			<?php include('local/resources/views/includes/general_header.php');?>
			<?php include('local/resources/views/includes/general_header_responsive.php');?>
			<!--fin Header responsive-->
			<section class="overlape">
				<div class="block no-padding">
					<div data-velocity="-.1" style="background: url(../local/resources/views/images/fondo_candidato.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax" style="padding: 0px;height: 100px;"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="inner-header">
									<div class="container">
										<div class="row">
											<div class="col-lg-6">
												<div class="text-socail">
													<a href="#" title=""><i class="fa fa-facebook"></i></a>
													<a href="#" title=""><i class="fa fa-twitter"></i></a>
													<a href="#" title=""><i class="la la-instagram"></i></a>
													<a href="#" title=""><i class="la la-pinterest"></i></a>
													<a href="#" title=""><i class="la la-dribbble"></i></a>
													<a href="#" title=""><i class="la la-google"></i></a>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="action-inner style2">
													<div class="download-cv">
														<a href="#" title="">Descargar CV <i class="la la-download"></i></a>
													</div>
													<a href="#" title=""><i class="la la-map-marker"></i><?php echo $datos_datos_contacto[0]->provincia;?> / <?php echo $datos_datos_contacto[0]->localidad;?></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="overlape">
				<div class="block remove-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="cand-single-user">
									<div class="share-bar circle"></div>
									<div class="can-detail-s">
										<div class="cst"><img style="width: 144px;height: 144px;" src="../uploads/<?php echo $datos_foto[0]->foto;?>" alt=""></div>
										<h3  style="margin-bottom: 20px;"><?php echo $datos_personales[0]->nombres ." ".$datos_personales[0]->apellidos;?></h3> 
									</div>
									<div class="download-cv"></div>
								</div>
								<div class="cand-details-sec">
									<div class="row no-gape">
										<div class="col-lg-9 column">
											<div class="cand-details">
												<div class="job-overview style2">
													<ul>
														<li><i class="la la-money"></i><h3>Salario pretendido</h3><span><?php echo $datos_preferencias_lab[0]->salario;?></span></li>
														<li><i class="la la-mars-double"></i><h3>Genero</h3><span><?php echo $datos_personales[0]->genero;?></span></li>
														<li><i class="la la-thumb-tack"></i><h3>Disponibilidad</h3><span><?php echo $datos_preferencias_lab[0]->nombre;?></span></li>
														<li><i class="la la-money"></i><h3>Discapacidad</h3><span><?php echo $datos_personales[0]->discapacidad;?></span></li>
														<li><i class="la la-mars-double"></i><h3>Hijos</h3><span><?php echo $datos_personales[0]->hijos;?></span></li>
														<li><i class="la la-thumb-tack"></i><h3>Estado civil</h3><span><?php echo $datos_personales[0]->edo_civil;?></span></li>
													</ul>
													</div><!-- Job Overview -->
													<h2>Acerca de <?php echo $datos_personales[0]->nombres;?></h2>
													<p style="text-align: justify;"> <?php echo $datos_personales[0]->sobre_mi;?></p>
													<div class="edu-history-sec">
														<h2>Educación</h2>
														<?php foreach ($datos_educacion as $key): ?>
														<div class="edu-history">
															<i class="la la-graduation-cap"></i>
															<div class="edu-hisinfo">
																<h3><?php echo $datos_educacion[0]->nombre_institucion;?></h3>
																<i><?php echo $datos_educacion[0]->desde;?> - <?php echo $datos_educacion[0]->hasta;?></i>
																<span><?php echo $datos_educacion[0]->titulo;?><i><?php echo $datos_educacion[0]->area_estudio;?></i></span>
																<p></p>
															</div>
														</div>
														<?php endforeach ?>
													</div>
													<div class="edu-history-sec">
														<h2>Experiencia laboral</h2>
														<?php foreach ($datos_experiencias as $key): ?>
															<div class="edu-history style2">
															<i></i>
															<div class="edu-hisinfo">
																<h3><?php echo $key->nombre_empresa?> <span><?php echo $key->nombre?></span></h3>
																<i><?php echo $key->desde;?> - <?php echo $key->hasta;?></i>
																<p><?php echo $key->descripcion?></p>
															</div>
														</div> 
														<?php endforeach ?>
														
													</div>
													<!--
													<div class="mini-portfolio">
																	<h2>Portfolio</h2>
																	<div class="mp-row">
																					<div class="mp-col">
																									<div class="mportolio"><img src="http://placehold.it/165x115" alt=""><a href="#" title=""><i class="la la-search"></i></a></div>
																					</div>
																					<div class="mp-col">
																									<div class="mportolio"><img src="http://placehold.it/165x115" alt=""><a href="#" title=""><i class="la la-search"></i></a></div>
																					</div>
																					<div class="mp-col">
																									<div class="mportolio"><img src="http://placehold.it/165x115" alt=""><a href="#" title=""><i class="la la-search"></i></a></div>
																					</div>
																					<div class="mp-col">
																									<div class="mportolio"><img src="http://placehold.it/165x115" alt=""><a href="#" title=""><i class="la la-search"></i></a></div>
																					</div>
																	</div>
													</div>-->
													
													<div class="companyies-fol-sec">
														<h2>Habilidades</h2>
														<div class="skills-badge" style="min-width: 500px;">
															<?php foreach ($datos_habilidades as $key): ?>
															<?php echo "<span>".$key->habilidad."</span>";?>
															<?php endforeach ?>
														</div>
													</div>

													<div class="companyies-fol-sec">
														<h2>Idiomas</h2>
														<div class="skills-badge" style="min-width: 500px;">
															<?php foreach ($datos_idiomas as $key): ?>
															<?php echo "<span>".$key->descripcion."</span>";?>
															<?php endforeach ?>
														</div>
													</div>

													<div class="companyies-fol-sec">
														<h2>Empresas seguidas</h2>
														<div class="cmp-follow">
															<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
																	<a href="#" title=""><img src="http://placehold.it/80x80" alt=""><span>King LLC</span></a>
																</div>
															</div>
														</div>
													</div> 
												</div>
											</div>
											<div class="col-lg-3 column">
												<div class="job-overview style3">
													Publicidad, marcadores
													<!--<ul>
																		<li><i class="la la-briefcase"></i><h3>Candidates About</h3></li>
																		<li><i class="la la-graduation-cap"></i><h3>Education</h3></li>
																		<li><i class="la la-file-text"></i><h3>Work Experience</h3></li>
																		<li><i class="la la-puzzle-piece"></i><h3>Portfolio</h3></li>
																		<li><i class="la la-thumb-tack"></i><h3>Professional Skills</h3></li>
																		<li><i class="la la-line-chart "></i><h3>Awards</h3></li>
																		<li><i class="la la-user "></i><h3>Companies Followed By</h3></li>
													</ul>
													<a href="#" title="" class="save-resume">Save Resume</a>
													<a href="#" title="" class="contct-user">Contact David</a>-->
													</div><!-- Job Overview -->
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
													<a href="#" title=""><img src="http://placehold.it/178x40" alt=""></a>
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
															<a href="#" title="">Privacy &amp; Seurty </a>
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
													<a href="#" title=""><img src="http://placehold.it/230x65" alt=""></a>
													<a href="#" title=""><img src="http://placehold.it/230x65" alt=""></a>
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
					<?php include("local/resources/views/includes/aside_right_administrator.php");?>
					<?php include("local/resources/views/includes/general_footer.php");?>
					<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/modernizr.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/wow.min.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
					<script type="text/javascript">
						$( document ).ready(function() {
						
						});
					</script>
				</body>
			</html>