<!DOCTYPE html>
<html>
	<head>
		<meta property='og:image' content='https://jobbersargentina.net/jobbersv2/imagenes_noticias/<?php echo $datos[0]->foto;?>'/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers"> 
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../local/resources/views/css/icons.css"> 
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" /> 
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" /> 
			<link href="../local/resources/views/plugins/btn_social/assets/css/bootstrap.css" rel="stylesheet">
    	<link href="../local/resources/views/plugins/btn_social/assets/css/font-awesome.css" rel="stylesheet">
     
		<link rel="stylesheet" type="text/css" href="../local/resources/views/plugins/btn_social/bootstrap-social.css" />
	</head>
	<body>
		<?php $atras=1;?>
		<?php include('local/resources/views/includes/general_header.php');?>
		<?php include('local/resources/views/includes/general_header_responsive.php');?>
		<section class="overlape mt-responsive">
			<div class="block no-padding d-none">
			<div data-velocity="-.1" style="background: url(../local/resources/views/images/fondo_noticias.jpg) repeat scroll 50% -6vh transparent;" class="parallax scrolly-invisible"></div><!-- PARALLAX BACKGROUND IMAGE -->
				<div class="container fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="inner-header img-header-news">
								<h3></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<div class="block" style="padding-bottom: 0px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 column">
						<div class="blog-single">
							<div class="bs-thumb"> 
								<?php if ($datos[0]->foto!=""): ?>
									<img style="max-width: 834px;border:1px dashed #e0e0e0;" src="../imagenes_noticias/<?php echo $datos[0]->foto;?>" alt="">
								<?php endif ?>  
							</div>
							<ul class="post-metas"> <li><a href="#" title=""><i class="la la-calendar-o"></i><?php echo $datos[0]->tmp;?></a></li></ul>
							<h2><?php echo $datos[0]->titulo;?></h2>
							 <?php echo $datos[0]->descripcion?>
							 
						</div>
						<div class="col-xs-12">
														<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-facebook" href="https://www.facebook.com/sharer.php?s=100&p[url]=http://jobbersargentina.net/jobbersv2/noticias/<?php echo $datos[0]->id;?>" target="_blank">
										           	 <span class="fa fa-facebook"></span> Compartir
										          	</a></p>
													</div>
													<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-linkedin" href="http://www.linkedin.com/shareArticle?url=http://jobbersargentina.net/jobbersv2/noticias/<?php echo $datos[0]->id;?>"  target="_blank">
										           	 <span class="fa fa-linkedin"></span> Compartir
										          	</a></p>
													</div>
													<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-twitter"  href="https://twitter.com/share?url=http://jobbersargentina.net/jobbersv2/noticias/<?php echo $datos[0]->id;?>" target="_blank">
										           	 <span class="fa fa-twitter"></span> Compartir
										          	</a></p>
													</div>
													<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-google" href="https://plus.google.com/share?url=http://jobbersargentina.net/jobbersv2/noticias/470">
										           	 <span class="fa fa-google"></span> Compartir
										          	</a></p>
													</div>
													</div>
					</div>
					<aside class="col-lg-3 column">
									<div class="widget">
										
										<div class="widget">
											<h3>Categorias</h3>
											<div class="sidebar-links">
												<?php foreach ($datos_categorias as $key): ?>
													<form id="form_id_<?php echo $key->id;?>" action="../noticias" method="POST">
														<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
														<input type="hidden" name="categoria" value="<?php echo $key->id;?>">
													</form>
													<a onClick="$('#form_id_<?php echo $key->id;?>').submit()" href="#" title=""><i class="la la-angle-right"></i><?php echo $key->descripcion;?></a> 
												<?php endforeach ?> 
											</div>
										</div>
										<div class="widget">
											<h3>Últimas noticias</h3>
											<div class="post_widget">
												<?php
												$contador=0;
												 foreach ($datos_limitadas as $key): 
												 	$contador++;
												 	?>
												 	<?php if ($contador<=5): ?>
													<div class="mini-blog">
													<span><a href="../noticias/<?php echo $key->id;?>" title=""><img  style="width: 54px;height:44px;" src="../imagenes_noticias/<?php echo $key->foto;?>" alt="" /></a></span>
													<div class="mb-info">
														<h3><a href="../noticias/<?php echo $key->id;?>" title=""><?php echo $key->titulo;?></a></h3>
														<span><?php echo $key->tmp;?></span>
													</div>
												 	<?php endif ?> 
												</div> 
												<?php endforeach ?>
												
											</div>
										</div> 
									</aside>
				</div>
			</div>
			<?php include("local/resources/views/includes/general_footer.php");?>
		</div>
		<?php include("local/resources/views/includes/login_register_modal.php");?>
		<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
		<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
		 <script src="../local/resources/views/plugins/btn_social/assets/js/docs.js"> 
	</body>
</html>