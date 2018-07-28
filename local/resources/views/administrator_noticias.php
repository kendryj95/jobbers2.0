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
					 			<h3>Noticias 
					 			</h3>
					 			<div class="extra-job-info"> 
						 			<span><i class="la la-plus"></i><strong>&nbsp;</strong><a href="noticias/publicar" title="">Publicar</a></span>
						 			<span><i class="la la-plus"></i><strong>&nbsp;</strong><a href="noticias/categorias" title="">Categorias</a></span>
						 		</div>
						 	 
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Noticia</td>  
						 					<td>Redactor</td>  
						 					<td style="width:120px;">Opciones</td>
						 				</tr>
						 			</thead>
						 			<tbody>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Esta es la noticia.</a></h3>
						 							<span>26-07-2018</span>
						 						</div>
						 					</td> 
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Victor Fernandez</a></h3>
						 							<span>(5) Redaciones</span>
						 						</div>
						 					</td> 
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Ver</span><a href="#" title=""><i class="la la-eye"></i></a></li>
						 							<li><span>Editar</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
						 							<li><span>Pausar</span><a href="#" title=""><i class="la la-pause"></i></a></li>
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