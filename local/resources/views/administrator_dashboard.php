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
<body> 

<div class="theme-layout" id="scrollup">
	
	<!--Header responsive-->
	<?php include('local/resources/views/includes/header_responsive_administrator.php');?>
	<?php include('local/resources/views/includes/header_administrator.php');?>
	<!--fin Header responsive-->
	

	<section class="overlape" style="padding: 0px;">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax" style="padding: 0px;height: 100px;"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid" >
				<div class="row">
					<div class="col-lg-12" >
						<div class="inner-header" style="height:100px;padding:0px;padding-top: 30px;">
							<h3 style="font-size: 26px;font-weight: 300;"><?php echo session()->get('adm_nombre');?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('local/resources/views/includes/aside_administrator.php');?>

				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		 <div class="manage-jobs-sec addscroll">
					 			<h3>Resumen</h3>
					 			<div class="extra-job-info">
						 			<span><i class="la la-stethoscope"></i><strong>9</strong> Trabajos</span>
						 			<span><i class="la la-file-text"></i><strong>20</strong> Noticias</span>
						 			<span><i class="la la la-support"></i><strong>18</strong> Soporte</span>
						 			<span ><i class="la la-industry"></i><strong>9</strong>Empresas</span>
						 			<span style="color: #095b03;font-weight: 700;"><i class="la la-industry"></i><strong>9</strong>Empresas (+)</span>
						 			<span style="color: #9b001f;font-weight: 700;"><i class="la la-industry"></i><strong>20</strong> Empresas (-)</span>
						 			<span><i class="la la-users"></i><strong>9</strong>Candidatos</span>
						 			<span style="color: #095b03;font-weight: 700;"><i class="la la-users"></i><strong>9</strong>Candidatos (+)</span>
						 			<span style="color: #9b001f;font-weight: 700;"><i class="la la-users"></i><strong>20</strong> Candidatos (-)</span> 
						 		</div>
						 		<!--Top empresa-->
						 		<h3>Top empresas</h3>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Empresa</td>
						 					<td>Publicaciones activas</td>
						 					<td>Publicaciones bloquedas</td>
						 					<td>Reputación</td>
						 					<td>Action</td>
						 				</tr>
						 			</thead>
						 			<tbody> 
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Web Designer / Developer</a></h3>
						 							<span><i class="la la-map-marker"></i>Dirección /</span> 
						 							<span><i class=""></i>Área</span>
						 						</div>
						 					</td>
						 					<td>
						 						<span class="applied-field">+3 Applied</span><br>
						 						
						 					</td>
						 					<td>
						 						<span class="applied-field">-3 Applied</span>
						 					</td>
						 					<td>
						 						<span class="status active">5</span>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Ver empresa</span><a href="#" title=""><i class="la la-eye"></i></a></li>
						 						</ul>
						 					</td>
						 				</tr> 
						 			</tbody>
						 		</table>
						 		<!--Fin Top empresa-->

						 		<!--Top candidatos-->
						 		<h3 style="margin-top:-25px;">Top candidatos</h3>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Nombre</td>
						 					<td>Postulaciones</td>
						 					<td>Reputación</td>
						 					<td>Puntos</td>
						 					<td>Action</td>
						 				</tr>
						 			</thead>
						 			<tbody> 
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Victor Fernandez</a></h3>
						 							<span><i class="la la-map-marker"></i>Dirección /</span> 
						 							<span><i class=""></i>Área estudio</span>
						 						</div>
						 					</td>
						 					<td>
						 						<span class="applied-field">+3 Applied</span><br>
						 						
						 					</td>
						 					<td>
						 						<span class="applied-field">3.5</span>
						 					</td>
						 					<td>
						 						<span class="status active">5</span>
						 					</td>
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Ver Jobbers</span><a href="#" title=""><i class="la la-eye"></i></a></li>
						 						</ul>
						 					</td>
						 				</tr> 
						 			</tbody>
						 		</table>
						 		<!--Fin Top candidatos-->

						 		 
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section> 
</div>

<?php include("local/resources/views/includes/aside_right_administrator.php");?>

<div class="view-resumesec">
	<div class="view-resumes">
		<span class="close-resume-popup"><i class="la la-close"></i></span>
		<h3>13 Times Viewed By 8 Companies.</h3>
		<div class="job-listing wtabs">
			<div class="job-title-sec">
				<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
				<h3><a href="#" title="">Web Designer / Developer</a></h3>
				<span>Massimo Artemisis</span>
				<div class="job-lctn">Sacramento, California</div>
			</div>
			<span class="date-resume">11.02.2017</span>
		</div><!-- Job -->
		<div class="job-listing wtabs">
			<div class="job-title-sec">
				<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
				<h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
				<span>Massimo Artemisis</span>
				<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
			</div>
			<span class="date-resume">11.02.2017</span>
		</div><!-- Job -->
		<div class="job-listing wtabs">
			<div class="job-title-sec">
				<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
				<h3><a href="#" title="">Web Designer / Developer</a></h3>
				<span>Massimo Artemisis</span>
				<div class="job-lctn">Sacramento, California</div>
			</div>
			<span class="date-resume">11.02.2017</span>
		</div><!-- Job -->
		<div class="job-listing wtabs">
			<div class="job-title-sec">
				<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
				<h3><a href="#" title="">Web Designer / Developer</a></h3>
				<span>Massimo Artemisis</span>
				<div class="job-lctn">Sacramento, California</div>
			</div>
			<span class="date-resume">11.02.2017</span>
		</div><!-- Job -->
	</div>
</div>

<div class="follow-companiesec">
	<div class="follow-companies">
		<span class="close-follow-company"><i class="la la-close"></i></span>
		<h3>Follow Companies.</h3>
		<ul id="scrollbar">
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">Web Designer / Developer</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">Tix Dog</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">StarHealth</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">Altes Bank</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">StarHealth</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
			<li>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">Altes Bank</a></h3>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<a href="#" title="" class="go-unfollow">Unfollow</a>
				</div><!-- Job -->	
			</li>
		</ul>		
	</div>
</div>

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

