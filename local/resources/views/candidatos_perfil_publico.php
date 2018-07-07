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

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
		    google_ad_client: "ca-pub-1968505410020323",
		    enable_page_level_ads: true
		  });
		</script>
	</head>
	<body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
		
	<?php $atras=1;?>
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
													<?php
													//datos_redes_sociales
													 
													foreach ($datos_redes_sociales as $key) {
														if ($key->descripcion=="Facebook" && $key->red_social!="") {
													 
														echo '<a target="_blank" href="'.$key->red_social.'" title=""><i class="fa fa-facebook"></i></a>';
															}

															if ($key->descripcion=="Twitter" && $key->red_social!="") {
														echo '<a target="_blank" href="'.$key->red_social.'" title=""><i class="fa fa-twitter"></i></a>';
															}

															if ($key->descripcion=="Instagram" && $key->red_social!="") {
														echo '<a target="_blank" href="'.$key->red_social.'" title=""><i class="fa fa-instagram"></i></a>';
															}

															if ($key->descripcion=="Youtube" && $key->red_social!="") {
														echo '<a target="_blank" href="'.$key->red_social.'" title=""><i class="fa fa-youtube"></i></a>';
															}

															if ($key->descripcion=="Linkedin" && $key->red_social!="") {
														echo '<a target="_blank" href="'.$key->red_social.'" title=""><i class="fa fa-linkedin"></i></a>';
															}
													
													}
													?>  
												</div>
											</div>
											 
										
											<div class="col-lg-6">
												<div class="action-inner style2">
													<?php if($datos_cv_descargable[0]->cantidad!=0): ?>
													<div class="download-cv">
														<a target="_blank" href="../descargar/<?php echo $datos_cv_descargable[0]->nombre_aleatorio;?>" title="">Descargar CV <i class="la la-download"></i></a>
													</div>
													<?php endif ?> 
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
										<?php
										$imagen="";
										if(isset($datos_foto[0]->foto))
										{
											$imagen=$datos_foto[0]->foto;
										}
										?>
										<div class="cst"><img style="width: 144px;height: 144px;" src="../uploads/<?php echo $imagen;?>" alt=""></div>
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
														<li><i class="la la-wheelchair"></i><h3>Discapacidad</h3><span><?php echo $datos_personales[0]->discapacidad;?></span></li>
														<li><i class="la la-child"></i><h3>Hijos</h3><span><?php echo $datos_personales[0]->hijos == 0 ? 'Sin hijos' : $datos_personales[0]->hijos . ' hijos' ?></span></li>
														<li><i class="la la-diamond"></i><h3>Estado civil</h3><span><?php echo $datos_personales[0]->edo_civil;?></span></li>
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
															<div class="cmp-follow"><div class="row">
														<?php
														$contador=0;
														foreach ($datos_empresas_seguidas as $key): 

															$foto="../uploads/0.jpg";
															if($key->nombre_aleatorio!="")
															{
																$foto="../uploads/".$key->nombre_aleatorio;
															}
														?>
														<?php if ($contador<5): ?>
														 	<div class="col-sm-2">
																	<a href="#" title=""><img style="width: 80px;height: 80px;" src="<?php echo $foto;?>" alt=""><span><?php echo $key->nombre?></span></a>
																</div>
														 <?php $contador++; endif ?>  
														<?php endforeach ?>
															</div>
														</div> 
														</div>
													</div> 
												</div>
											</div>
											<div class="col-lg-3 column">
												<div class="job-overview style3">
													Publicidad
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
					 <?php include("local/resources/views/includes/general_footer.php");?>
					</div>
				 
					
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