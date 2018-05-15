<!DOCTYPE html>
<html>
<head>
	<?php include('local/resources/views/includes/referencias_top.php');?>

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="local/resources/views/css/icons.css">
	<link rel="stylesheet" href="local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
</head>
<body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)"> 

<div class="theme-layout" id="scrollup">
	
	<!--Header responsive-->
	<?php include('local/resources/views/includes/header_responsive_administrator.php');?>
	<?php include('local/resources/views/includes/header_administrator.php');?>
	<!--fin Header responsive-->
	 

	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('local/resources/views/includes/aside_candidatos.php');?>

				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec addscroll">
					 			<h3>Mis redes sociales</h3> 
					 		</div>
					 	</div>
					 	<div class="profile-form-edit" style="margin: 0px;">
								 			<form action="adminconfigcrear" method="POST" style="margin: 0px;">
								 				<input name="_token" type="hidden" value="vPRFyJZr6mYH9DCcTaV5VEJJQUMUR82fzCrFhXzz" id="my_token">
								 				<div class="row">
								 					<div class="col-lg-12">
								 						<span class="pf-title">Facebook</span>
								 						<div class="pf-field">
								 							<input name="nombre" type="text" placeholder="Correo electrónico">
								 						</div>
								 					</div> 
								 					<div class="col-lg-12">
								 						<span class="pf-title">Twitter</span>
								 						<div class="pf-field">
								 							<input name="nombre" type="text" placeholder="Correo electrónico">
								 						</div>
								 					</div>  
								 					<div class="col-lg-12">
								 						<span class="pf-title">Linkendin</span>
								 						<div class="pf-field">
								 							<input name="nombre" type="text" placeholder="Correo electrónico">
								 						</div>
								 					</div>  
								 					<div class="col-lg-12">
								 						<span class="pf-title">Google +</span>
								 						<div class="pf-field">
								 							<input name="nombre" type="text" placeholder="Correo electrónico">
								 						</div>
								 						<a href="#" class="status" style="font-size: 13px;">¿Cómo puedo colocar mis redes sociales en Jobbers?</a>
								 					</div>  
								 					<div class="col-lg-12" style="margin-bottom: 50px;">
								 						<button type="submit">Guardar</button>
								 					</div>
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

<?php include("local/resources/views/includes/aside_right_administrator.php");?>
 

<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
<script src="local/resources/views/js/script.js" type="text/javascript"></script>
<script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
<script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
<script src="local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$( document ).ready(function() {
    	 
	});
</script>
</body>
</html>

