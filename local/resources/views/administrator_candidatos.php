<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" /> 
	
</head>
<body  style="background-image: url('https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg');"> 
	<!--Header responsive-->
	<div class="theme-layout" id="scrollup">
		
			<?php include('local/resources/views/includes/header_administrator.php');?> 
 <section>


		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	 <div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec addscroll">
					 			<h3>Candidatos 
					 			</h3>
					 			<div class="extra-job-info" style="margin-bottom: 30px;background-color: #f0f0f0;"> 
						 			<span style=""><span style="font-size: 24px;">86</span><strong></strong></span>
						 			<span><i class="la la-venus"></i><strong>20</strong><a href="noticias/categorias" title="">Hombres</a></span>
						 			<span><i class="la la-mars"></i><strong>25</strong><a href="noticias/categorias" title="">Mujeres</a></span>
						 		</div>
						 	 	
						 	 <form> 
						 	 	<a href="nuevo" title="" style=""><span style="padding-left: 30px;text-decoration: underline; color: #009804;font-size: 16px;margin-top: -50px;">Nuevo candidato</span></a>
						 	 <div class="pf-field" style="padding-left: 30px;margin-top: 25px;">
													<input style="margin-bottom: 0px;" id="noticia_titulo" value="" name="noticia_titulo" type="text" placeholder="Buscador...">
													<span style="color: #009804;font-size: 12px;margin-top: -50px;">*El buscador funciona por nombre, apellido o correo.</span>
												</div>	 
						 	 </form>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Nombre</td>   
						 					<td style="width:200px;">Opciones</td>
						 				</tr>
						 			</thead>
						 			
						 			<tbody>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Victor Fernandez</a></h3>
						 							<span>Velezuela / Zulia / Maracaibo</span>
						 						</div>
						 					</td>  
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Ver</span><a href="#" title=""><i class="la la-eye"></i></a></li>
						 							<li><span>Editar</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
						 							<li><span>Descargar CV</span><a href="#" title=""><i class="la la-download"></i></a></li>
						 							<li><span>Resumen</span><a href="#" title=""><i class="la la-file-text"></i></a></li>
						 							<li><span>Enviar correo</span><a href="#" title=""><i class="la la-envelope"></i></a></li>
						 							<li><span>Eliminar</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 					</td>
						 				</tr> 
						 			</tbody>
						 		</table>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
</div>
<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script> 

</body>
</html>