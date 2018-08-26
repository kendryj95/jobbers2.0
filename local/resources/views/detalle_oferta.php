<!DOCTYPE html>
<html>
	<head>
		 
		<meta property='og:image' content='http://jobbersargentina.net/jobbersv2/uploads/min/<?php echo $datos[0]->imagen;?>'/>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		 
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		
		<!-- <link href="../local/resources/views/plugins/btn_social/assets/css/bootstrap.css" rel="stylesheet"> -->
    	<link href="../local/resources/views/plugins/btn_social/assets/css/font-awesome.css" rel="stylesheet">
     
		<link rel="stylesheet" type="text/css" href="../local/resources/views/plugins/btn_social/bootstrap-social.css" />

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
	  <?php $atras=1;?>
	  <?php include('local/resources/views/includes/general_header.php');?>
      <?php include('local/resources/views/includes/general_header_responsive.php');?>
		<section class="overlape">
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
												<?php  
													$imagen = $datos[0]->confidencial == 'NO' || $datos[0]->confidencial == null ? "../uploads/min/".$datos[0]->imagen : "../uploads/min/empresa.jpg";
													$empresa = $datos[0]->confidencial == 'NO' || $datos[0]->confidencial == null ? '<a href="../empresa/detalle?e='.$datos[0]->id_empresa.'">'.$datos[0]->empresa.'</a>' : '<a href="javascript:void(0)">Confidencial</a>';
												?>
												<div class="job-thumb"> <img src="<?= $imagen ?>" alt="Logo de empresa"></div>
												<div class="job-single-info3">

													<h3><?= $empresa ?></h3>
													<span><i class="la la-map-marker d-none"></i><?php echo $datos[0]->dir_empresa;?></span>
													<ul class="tags-jobs">
														<li><i class="la la-file-text d-none"></i> Postulados <?= $cantidad_postulados ?></li>
														<li><i class="la la-calendar-o d-none"></i> Publicado: <?php echo $datos[0]->tmp;?></li>
														<li><i class="la la-eye d-none"></i> Vistas <?php echo $datos[0]->vistos;?></li>
													</ul>
												</div>
												</div><!-- Job Head -->
											</div>
											 
										</div>
									</div>
									<div class="job-wide-devider">
										<div class="row">
											<div class="col-lg-8 column">
												<div class="job-details">
													<h3><?php echo $datos[0]->titulo;?></h3>

													<?php if ($datos[0]->video): ?>
														<?php if (strstr($datos[0]->video, 'iframe')): ?>

															<?php echo $datos[0]->video ?> 
														<?php 

															 else:

																$url = "";
																if (strstr($datos[0]->video, '.be/')) {
																	$explode = explode(".be/", $datos[0]->video);
																	$url = $explode[1];
																} elseif (strstr($datos[0]->video, '?v=')) {
																	$explode = explode("?v=", $datos[0]->video);
																	$url = $explode[1];
																} 

														?>

															<iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $url ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> 
														<?php endif; ?>
													 <?php endif; ?> 
													<br>
													<p><?php echo $datos[0]->descripcion;?> </p> 
													<div class="col-xs-12">
														<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-facebook" href="https://www.facebook.com/sharer.php?s=100&p[url]=http%3A%2F%2Fjobbersargentina.net%2Fjobbersv2%2Fdetalleoferta%2F<?php echo $datos[0]->id;?>" target="_blank">
										           	 <span class="fa fa-facebook"></span> Compartir
										          	</a></p>
													</div>
													<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-linkedin" href="http://www.linkedin.com/shareArticle?url=http%3A%2F%2Fjobbersargentina.net%2Fjobbersv2%2Fdetalleoferta%2F<?php echo $datos[0]->id;?>"  target="_blank">
										           	 <span class="fa fa-linkedin"></span> Compartir
										          	</a></p>
													</div>
													<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-twitter"  href="https://twitter.com/share?url=http%3A%2F%2Fjobbersargentina.net%2Fjobbersv2%2Fdetalleoferta%2F<?php echo $datos[0]->id;?>" target="_blank">
										           	 <span class="fa fa-twitter"></span> Compartir
										          	</a></p>
													</div>
													<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-google" href="https://plus.google.com/share?url=http%3A%2F%2Fjobbersargentina.net%2Fjobbersv2%2Fdetalleoferta%2F470">
										           	 <span class="fa fa-google"></span> Compartir
										          	</a></p>
													</div>
													</div>
												</div> 
											</div>
											<div class="col-lg-4 column">
												<div class="job-overview">
													<h3>Información de empresa</h3>
													<ul>
														<li><i class="la la-file-text"></i><h3>Ofertas</h3><span><?php echo $cantidad_ofertas[0]->cantidad;?></span></li>
														<li><i class="la la-map"></i><h3>Dirección</h3><span><?php echo $datos[0]->direccion;?></span></li>
														<li><i class="la la-money"></i><h3>Salario</h3><span><?php echo $datos[0]->salario;?></span></li>
														<li><i class="la la-medkit "></i><h3>Discapacitados</h3><span><?php echo $datos[0]->discapacidad;?></span></li>
														<li><i class="la la-bullhorn "></i>
															<h3>Redes Sociales</h3>
															<div class="share-bar">
																<a href="#" title="" class="share-fb"><i class="fa fa-facebook" style="position: initial; font-size: initial; color: inherit;"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter" style="position: initial; font-size: initial; color: inherit;"></i></a>
															</div>
														</li>

																 
																 
															<?php if(session()->get('tipo_usuario')==2): ?>

																<div class="emply-btns">
																	<a class="followus" href="#" title=""><i class="la la-paper-plane"></i> Seguir</a>
																</div>
															<?php if ($nivel_user==1): ?>
																
															
																<?php if (!$postulado): ?>

																	<?php if ($datos[0]->salario_usuario == 'NO'): ?>

																		<form action="<?= url('candipostular') ?>" method="post">
																			<?= csrf_field() ?>
																			<input type="hidden" name="id_pub" value="<?= $datos[0]->id  ?>">
																			<div class="emply-btns">
																				<button type="submit" class="follows postular">Postularme</button>
																			</div>
																		</form>
																	<?php else: ?>

																		<div class="emply-btns">
																			<a class="followus" href="javascript:void(0)" title="" data-toggle="modal" data-target="#modalSalario"><i class="la la-file-text"></i> Postularme</a>
																		</div>

																	<?php endif; ?>

																<?php else: ?>

																	<div class="emply-btns">
																		<a class="followus" href="javascript:void(0)" title="" style="background-color: #33cc00; border-color:#33cc00; color: #fff"><i class="la la-check"></i> POSTULADO</a>
																	</div>


																<?php endif; ?>
															<?php elseif (session()->get('candidato') == null && session()->get('empresa') == null): ?>
																<div class="emply-btns">
																	<a class="followus" href="<?= url('login') ?>?returnUrl=<?= url()->current() ?>&p=1&id_pub=<?= $datos[0]->id ?>" title=""><i class="la la-file-text"></i> Postularme</a>
																</div>
															<?php endif; ?>
															<?php endif ?>
															<?php if ($nivel_user==2): ?>
																<p style="text-align: center;font-size: 12px;color: #ff0010;">*Complete sus datos para poder postularse.</p>
															<?php endif ?>
													</ul>
													</div><!-- Job Overview -->
													<div class="quick-form-job">
														<h3>¿Cómo evalúas Jobbers?</h3>
														<form method="post" action="<?= url('evaluacion') ?>" id="form_evaluacion">
															
															<?= csrf_field() ?>

															<input type="hidden" name="id_pub" value="<?= $datos[0]->id ?>">
															<div class="pf-field" style="margin-bottom: 20px;">
																<select data-placeholder="Allow In Search" class="chosen" name="evaluacion" id="evaluacion">
																	<option value="">Selecciona evaluación</option>
																	<option value="Excelente">Excelente</option>
																	<option value="Muy bueno">Muy bueno</option>
																	<option value="Bueno">Bueno</option>
																	<option value="Debe mejorar">Debe mejorar</option>
																</select>
															</div>
															<textarea placeholder="¿Qué te gustaría que mejoraramos?" name="descripcion" id="descripcion"></textarea>
															<button class="submit" id="submit_evaluacion">Enviar</button>
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
			<!-- Modal -->
			<div class="modal fade" id="modalSalario" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			  <div class="modal-dialog modal-sm" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			              <h4 class="modal-title" id="myModalLabel">Salario pretendido</h4>
			            </div>
			            <form action="<?= url('candipostular') ?>" method="post">
			            	<div class="modal-body">
			            		<input type="hidden" name="id_pub" value="<?= $datos[0]->id ?>">
			            		<?= csrf_field() ?>
			            	  <div class="cfield">
			            	  	<select name="salario" id="" class="form-control">
			            	  		<option value="">Seleccionar</option>
			            	  		<?php foreach ($salarios as $salario): ?>
									
									<option value="<?= $salario->id ?>"><?= $salario->salario ?></option>
			            	  		<?php endforeach; ?>
			            	  	</select>
			            	  	<i class="la la-cash"></i>
			            	  </div>
			            	  <div class="simple-checkbox">
			            	    <p><input type="checkbox" name="actualizar_salario" id="actualizar_salario" value="1"><label for="actualizar_salario">Actualizar mi salario pretendido.</label></p>
			            	  </div>
			            	
			            	</div>
			            	<div class="modal-footer" style="margin-top: 20px !important">
			            	  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			            	  <button type="submit" class="btn btn-primary" id="postular" style="margin-right: 5px !important">Postular</button>
			            	</div>
			            </form>
			    </div>
			  </div>
			</div>
			<?php include("local/resources/views/includes/login_register_modal.php");?>
			<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
			<script src="../local/resources/views/js/modernizr.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/wow.min.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script> 
			<script src="../local/resources/views/plugins/notify.js" type="text/javascript"></script>
			<script src="../local/resources/views/plugins/btn_social/assets/js/docs.js"></script>
			<script>
				<?php if (isset($_REQUEST['info']) && $_REQUEST['info'] != ""): ?>

					$.notify("<?= $_REQUEST['info'] ?>", {
						className:"error",
						globalPosition: "bottom center"
					});

				<?php endif; ?>

				<?php if (isset($_REQUEST['r']) && $_REQUEST['r'] == 1): ?>

					$.notify("Se ha enviado su evaluacion, gracias por aportar.", {
						className:"success",
						globalPosition: "bottom center"
					});

				<?php elseif (isset($_REQUEST['r']) && $_REQUEST['r'] == 2): ?>

					$.notify("Ha ocurrido un error inesperado.", {
						className:"error",
						globalPosition: "bottom center"
					});

				<?php endif; ?>

				<?php if (count($errors)>0): ?> // mostrar errores si existen.

					<?php foreach ($errors->all() as $error): ?>

						$.notify("<?= $error ?>", {
							className:"error",
							globalPosition: "bottom center"
						});

					<?php endforeach; ?>

				<?php endif; ?>

				$('#submit_evaluacion').on('click', function(e){
					e.preventDefault();
					if ($('#evaluacion').val() != "" && $('#descripcion').val() != "") {
						$('#form_evaluacion').submit();
					} else {
						$.notify("Campos obligatorios vacios.", {
							className:"error",
							globalPosition: "bottom center"
						});
					}
				});
			</script>
		</body>
	</html>