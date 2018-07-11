<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $datos[0]->titulo;?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $datos[0]->descripcion;?>">
		<meta name="keywords" content="">

		<meta name="author" content="Jobbers Argentina">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/plugins/botones/assets/css/font-awesome.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/plugins/botones/bootstrap-social.css" />
	</head>
	<body>
		<?php $atras=1;?>
		<?php include('local/resources/views/includes/general_header.php');?>
		<?php include('local/resources/views/includes/general_header_responsive.php');?>
		<section class="overlape mt-responsive">
			<div class="block no-padding">
				<div data-velocity="-.1" style="background: url(../local/resources/views/images/fondo_detalle_oferta.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
				<div class="container fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="inner-header">
								<h3><?php echo $datos[0]->titulo;?></h3>
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
												<div class="job-thumb"> <img src="../uploads/<?php echo $datos[0]->img_empresa;?>" alt=""></div>
												<div class="job-single-info3 text-center">
													<h3><?php echo $datos[0]->empresa;?></h3>
													<!-- <span><i class="la la-map-marker"></i><?php echo $datos[0]->dir_empresa;?></span> -->
													<div class="job-is ft"><?php echo $datos[0]->nombre;?></div>
													<ul class="tags-jobs">
														<li><i class="la la-map-marker"></i><?php echo $datos[0]->dir_empresa;?></li>
														<li><i class="la la-file-text"></i> Postulados <?= $cantidad_postulados ?></li>
														<li><i class="la la-calendar-o"></i> Publicado: <?php echo $datos[0]->tmp;?></li>
														<li><i class="la la-eye"></i> Vistas <?php echo $datos[0]->vistos;?></li>
													</ul>
												</div>
												</div><!-- Job Head -->
											</div>
											<div class="col-lg-2">
												<div class="share-bar">
													<a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
												</div>
												<?php if(session()->get('tipo_usuario')==2): ?>
												<div class="emply-btns">
													<a class="followus" href="../candiseguir/<?php echo $datos[0]->id_empresa;?>" title=""><i class="la la-paper-plane"></i> Seguir</a>
												</div>
												<div class="emply-btns">
													<a class="followus" href="../candipostular/<?php echo $datos[0]->id;?>" title=""><i class="la la-file-text"></i> Postularme</a>
												</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="job-wide-devider">
										<div class="row">
											<div class="col-lg-8 column">
												<div class="job-details">
													<h3><?php echo $datos[0]->titulo;?></h3>
													<?php
														if ($datos[0]->video) {
															echo $datos[0]->video;
														}
													?>
													<br>
													<p><?php echo $datos[0]->descripcion;?> </p> 

								<div class="col-sm-3" style="padding-left: 0px;">
									<a  target="_blank"  href="https://www.facebook.com/sharer/sharer.php?u=http%3A//www.jobbersargentina.net/jobbersv2/detalleoferta/<?php echo $datos[0]->id;?>" class="btn btn-block btn-social btn-facebook"  >
										<span class="fa fa-facebook"></span>Compartir
									</a>
								</div>
								<div class="col-sm-3 mt-social-resp" style="padding-left: 0px;">
									<a  target="_blank"  href="https://twitter.com/home?status=http%3A//www.jobbersargentina.net/jobbersv2/detalleoferta/<?php echo $datos[0]->id;?>" class="btn btn-block btn-social btn-twitter"  >
										<span class="fa fa-twitter"></span>Compartir
									</a>
								</div>
								<div class="col-sm-3 mt-social-resp" style="padding-left: 0px;">
									<a  target="_blank"  href="https://plus.google.com/share?url=http%3A//www.jobbersargentina.net/jobbersv2/detalleoferta/<?php echo $datos[0]->id;?>" class="btn btn-block btn-social btn-google"  >
										<span class="fa fa-google"></span>Compartir
									</a>
								</div>
								<div class="col-sm-3 mt-social-resp" style="padding-left: 0px;">
									<a  target="_blank"  href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A//www.jobbersargentina.net/jobbersv2/detalleoferta/<?php echo $datos[0]->id;?>&title=Jobbers&summary=&source=" class="btn btn-block btn-social btn-linkedin"  >
										<span class="fa fa-linkedin"></span>Compartir
									</a>
								</div>
							 
												</div>

												<!--
														<div class="recent-jobs">
																<h3>Ofertas similares</h3>
																<div class="job-list-modern">
																				<div class="job-listings-sec no-border">
																								<div class="job-listing wtabs noimg">
																												<div class="job-title-sec">
																																<h3><a href="#" title="">Web Designer / Developer</a></h3>
																																<span>Massimo Artemisis</span>
																																<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
																												</div>
																												<div class="job-style-bx">
																																<span class="job-is ft">Full time</span>
																																<span class="fav-job"><i class="la la-heart-o"></i></span>
																																<i>5 months ago</i>
																												</div>
																								</div>
																				</div>
																</div>
												</div>
												-->
											</div>
											<div class="col-lg-4 column">
												<div class="job-overview">
													<h3>Información de empresa</h3>
													<ul>
														<li><i class="la la-eye"></i><h3>Vistas </h3><span> <?= $datos[0]->vistos ?> </span></li>
														<li><i class="la la-file-text"></i><h3>Ofertas</h3><span><?php echo $cantidad_ofertas[0]->cantidad;?></span></li>
														<li><i class="la la-map"></i><h3>Dirección</h3><span><?php echo $datos[0]->direccion;?></span></li>
														<!--
														<li><i class="la la-bars"></i><h3>Categoría</h3><span>Arts, Design, Media</span></li> -->
														<!-- <li><i class="la la-users"></i><h3>Equipo de trabajo</h3><span>0</span></li> -->
														<!-- <li><i class="la la-user"></i><h3>Seguidores</h3><span>15</span></li> -->
													</ul>
													</div><!-- Job Overview -->
													<div class="quick-form-job">
														<h3>¿Cómo evalúas Jobbers?</h3>
														<form>
															<div class="pf-field" style="margin-bottom: 20px;">
																<select data-placeholder="Allow In Search" class="chosen">
																	<option>Excelente</option>
																	<option>Muy bueno</option>
																	<option>Bueno</option>
																	<option>Debe mejorar</option>
																</select>
															</div>
															<textarea placeholder="¿Qué te gustaría que mejoraramos?"></textarea>
															<button class="submit">Enviar</button>
														</form>
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
				<?php include("local/resources/views/includes/general_footer.php");?>
			</div>
			<?php include("local/resources/views/includes/login_register_modal.php");?>
			<script src="../local/resources/views/plugins/botones/assets/js/jquery.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/modernizr.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/wow.min.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
		</body>
	</html>