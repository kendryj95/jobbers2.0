<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/colors/colors.css" /> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/chosen.css" />
	<script src="../../local/resources/views/plugins/editor/ckeditor.js"></script>
	<script src="../../local/resources/views/plugins/editor/samples/js/sample.js"></script>
</head>
<body  style="background-image: url('https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg');"> 
	<!--Header responsive-->
	<div class="theme-layout" id="scrollup">
		<?php $atras=1;?>
			<?php include('local/resources/views/includes/header_administrator.php');?> 
 <section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	 <div class="col-xl-9 column"> 
								<div class="padding-left">
									<div class="manage-jobs-sec">
										<h3><?php echo $titulo;?></h3> 
										<form  id="formulario" style="padding: 10px;" method="POST" action="addpublicacion" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
											<div class="col-lg-12">
												<p style="margin-bottom: 0px;">Imagen</p>
												<div class="pf-field" style="height: 55px;"> 
											  <input name="imagen_noticia" id="imagen_noticia" type="file" placeholder="" accept="image/*">
											</div> 
											</div>
											<p style="margin-bottom: 0px;margin-left: 20px;">Titulo</p>
											<div class="col-lg-12"> 
												<div class="pf-field" style="height: 55px;">
													<input id="noticia_titulo" value="" name="noticia_titulo" type="text" placeholder="">
												</div>
											</div>
											
											<p style="margin-bottom: 0px;margin-left: 20px;">Categoria</p>
											<div class="col-lg-12"> 
												<div class="pf-field" style="height: 55px;">
													<select id="noticias_categoria" name="noticias_categoria" class="chosen"> 
															<option value="">HOla</option> 
													</select>
												</div>
											</div>
											<p style="margin-bottom: 0px;margin-left: 20px;"">Etiquetas<span style="color: #4286f4;font-size: 14px;"> (Ejemplo: Trabajo,trabajar,RRHH,cordoba)</span></p>
											<div class="col-lg-12"><p style="margin-bottom: 0px;"></p></div>
											<div class="col-lg-12" style=""> 
												<div class="pf-field" style="height: 65px;">
													<input id="noticias_tags" value="" name="noticias_tags" type="text" placeholder="Etiqueta 1, Etiqueta 2, Etiqueta 3">
												</div>
											</div> 
										<p style="margin-bottom: 0px;margin-left: 20px;"">Descripción</p>
										<div class="col-lg-12"> 
											<div id="main">
												<textarea  name="noticias_descripcion" id="editor">
											    </textarea> 
												<script>
													initSample();
												</script>
											</div>
										</div> 
											<div class="col-lg-12" style="padding-top: 25px;">
												<button onClick="validar_form()"  class="btn btn-primary" type="button">Publicar</button> 
											</div>
										</form>
									</div>
								</div>
							</div>
				 </div>
			</div>
		</div>
	</section>
</div>
<script src="../../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/slick.min.js" type="text/javascript"></script>
<script src="../../local/resources/views/js/select-chosen.js" type="text/javascript"></script> 
<script type="text/javascript">
	var descripcion = CKEDITOR.instances['editor'].getData();
	initSample();
</script>
</body>
</html>