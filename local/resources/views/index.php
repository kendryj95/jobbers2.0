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
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<link rel="stylesheet" href="local/resources/views/css/icons.css"> 
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" /> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		<style>
			.job-listing .job-is{
				margin: 0 auto;
				display: inline-block;
			}
		</style>
		<?php include("local/resources/views/includes/chat_soporte.php");?>
	</head>
	<body>
		
		<div class="theme-layout" id="scrollup">
			
			<!-- Modal -->
			<?php include('local/resources/views/includes/general_header_responsive.php');?>
			<?php include('local/resources/views/includes/general_header.php');?>
			
			<section class="mt-responsive">
				
				<div class="block no-padding">
					<div class="container fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="overflow d-mobile"></div>
								<div class="main-featured-sec">
									<!-- Para efecto de slider agregar mas elementos a la lista. -->
									<ul class="main-slider-sec text-arrows">
										<li class="slideHome"><img src="local/resources/views/images/fondo_inicio.jpg" alt="" /></li>
									</ul>
									<div class="job-search-sec">
										<div class="job-search">
											<h3>En Jobbers encuentra lo que necesitas</h3>
											<span>Programadores, contadores, médicos</span>
											<form action="ofertas" method="post">
												<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
												<div class="row">
													<div class="col-lg-7 col-md-5 col-sm-5 col-xs-12">
														<div class="job-field">
															<input type="text" placeholder="Palabra clave..." name="title" />
															<i class="la la-keyboard-o"></i>
														</div>
													</div>
													<div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
														<div class="job-field">
															<select data-placeholder="City, province or region" class="chosen-city" name="provincia_index">
																<option value="">Lugar</option>
																<?php foreach ($provincias as $prov): ?>
																<option value="<?= $prov->id ?>"><?= $prov->provincia ?></option>
																<?php endforeach ?>
															</select>
															<i class="la la-map-marker"></i>
														</div>
													</div>
													<div class="col-lg-1 col-md-2 col-sm-2 col-xs-12">
														<button type="submit" style="margin-top: 2px;"><i class="la la-search"></i></button>
													</div>
												</div>
											</form>
											<div class="or-browser">
												
											</div>
											<h4>Hoy somos <?= $count_jobbers ?> Jobbers</h4> 
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
				<div class="modal fade" id="modal_redes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-body">
								<div class="row">
									<div class="text-center" style="padding-top: 20px;padding-bottom: 20px;"> 
									<img style="margin: 0 auto;width: 40%;" src="https://www.mktv.mx/wp-content/uploads/2017/07/source.gif">
								<h3>Hola Jobbers!</h3>
								<h5>Ya somos <strong><?= $count_jobbers ?></strong> Jobbers, y vamos por más!</h5>
								</div>
								<div class="col-sm-6" style="margin-bottom: 10px;">
									<a  target="_blank"  href="https://www.facebook.com/sharer/sharer.php?u=http%3A//www.jobbersargentina.net" class="btn btn-block btn-social btn-facebook"  >
									<span class="fa fa-facebook"></span>Compartir
								</a> 
								</div>
								<div class="col-sm-6" style="margin-bottom: 10px;">
								<a  target="_blank"  href="https://twitter.com/home?status=http%3A//www.jobbersargentina.net" class="btn btn-block btn-social btn-twitter"  >
									<span class="fa fa-twitter"></span>Compartir
								</a></div>
								<div class="col-sm-6" style="margin-bottom: 10px;">
								<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A//www.jobbersargentina.net&title=Jobbers&summary=&source=" class="btn btn-block btn-social btn-linkedin" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-bitbucket']);">
									<span class="fa fa-linkedin"></span>Compartir
								</a></div>
								<div class="col-sm-6" style="margin-bottom: 10px;">
								<a  target="_blank"  href="https://plus.google.com/share?url=http%3A//www.jobbersargentina.net" class="btn btn-block btn-social btn-google"  >
									<span class="fa fa-google"></span>Compartir
								</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="block">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="" data-href="http://www.jobbersargentina.net" data-layout="button" data-size="small" data-mobile-iframe="true"></div>
								<!-- Button trigger modal -->
								<div class="heading">
									<h2>Últimas ofertas</h2>
									<span>Las mejores empresas buscan los mejores talentos.</span>
								</div>
								<div class="job-listings-sec">

									<!-- Oferta recomendada -->
									<div class="job-listing wtabs borde-recomend" style="background: url(local/resources/views/images/back-ofertas.jpg); background-size: cover">
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
													<img src="http://urbancomunicacion.com/wp-content/uploads/2017/08/Historia-del-logotipo-de-Coca-Cola-Urban-comunicacion.png" class="img-fluid logo-recommend" width="80" alt="">
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
											<img src="local/resources/views/images/award.png" class="img-fluid img-oferta" alt="">
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
										<div class="job-style-bx container-img-oferta-i desk">
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


								<?php foreach ($ultimas_publicaciones as $key ) {
										$imagen="";
										
										if($key->nombre_aleatorio!="")
										{
											$imagen='<div class="c-logo"> <img src="uploads/'.$key->nombre_aleatorio.'" alt="" style="width:98px;" /> </div>';
										}
										else{
											$imagen='<div class="c-logo"> <img src="uploads/'.$key->nombre_aleatorio.'" alt="" /> </div>';
										}

										echo
										'
										<div class="job-listing">
										<div class="job-title-sec">
										'.$imagen.'
										<h3><a href="detalleoferta/'.$key->id.'" title="">'.$key->titulo.'</a></h3>
										<a href="empresa/detalle?e='.$key->id_empresa.'" target="_blank"><span>'.$key->empresa.'</span></a>
										</div>
										<span class="job-lctn"><i class="la la-map-marker"></i>'.$key->direccion.'</span>
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
				
				<section>
					<div class="block double-gap-top double-gap-bottom">
						<div data-velocity="-.1" style="background: url(local/resources/views/images/fondo_inicio_2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div>
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="simple-text-block">
										<h3>Con Jobbers llegas a cientos de empresas</h3>
										<span>Publica tu CV en Jobbers y encuentra el empleo que necesitas.</span>
										<?php $url_cv = session()->get('candidato')==null ? "login" : "candicv" ?>
										<a href="<?= $url_cv ?>" title="Adjuntar CV">Cargar mi CV</a>
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
										<h2>Tips Jobbers</h2>
										<span>Sigue nuestros consejos y encontrarás el empleo que buscas.</span>
									</div>
									<div class="blog-sec">
										<div class="row">
											<?php foreach ($tips as $i => $key) {
												$cadena=explode("?", $key->descripcion);
												echo '<div class="col-lg-4">
											    <div class="my-blog">
											        <div class="blog-thumb">
											            <a href="#" title=""><img src="local/resources/views/images/tips_'.($i+1).'.jpg" alt="" style="min-height:300px;"/></a>
											            <div class="blog-metas">
											                <a href="#" title="">'.$cadena[0].'</a>
											                <!--<a href="#" title="">0 Comments</a>-->
											            </div>
											        </div>
											        <div class="blog-details" style="min-height:230px;">
											            <h3>
											                <a href="#" title="">
											                    <p>'.$cadena[1].'</p>
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
										<span>Escríbenos a <a href="contacto" style="text-decoration: underline;"><strong>Contacto Jobbers</strong></a> será una placer ayudarte</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php include("local/resources/views/includes/general_footer.php");?>
			</div>
			<?php include("local/resources/views/includes/login_register_modal.php");?>
			
			<script src="local/resources/views/plugins/botones/assets/js/jquery.js" type="text/javascript"></script> 
			<script src="local/resources/views/js/script.js" type="text/javascript"></script> 
			<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script> 
			<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script> 
			<script type="text/javascript">
				var calendario = new Date(); 
				fecha = parseInt(calendario.getDate()); 
				console.log(fecha); 
				if (fecha === 5 || fecha === 10 || fecha === 15 || fecha === 20 || fecha === 25 || fecha === 30) { 
					$("#modal_redes").modal("show");
				}
			</script>
		</body>
	</html>