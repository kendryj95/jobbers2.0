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
			<?php include('local/resources/views/includes/header_responsive_candidatos.php');?>
			<?php include('local/resources/views/includes/header_candidatos.php');?>
			<!--fin Header responsive-->
			
			<section style="margin-bottom: 20px;">
				<div class="block no-padding">
					<div class="container">
						<div class="row no-gape">
							<?php include('local/resources/views/includes/aside_candidatos.php');?>
							<div class="col-lg-9 column" >
								<div class="padding-left">
									<div class="manage-jobs-sec">
										<h3>Mi panel</h3>
										<div class="cat-sec">
											<div class="row no-gape">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="candipostulaciones" title="">
															<i class="la la-briefcase"></i>
															<span>Postulaciones</span>
															<p><?= $postulaciones ?> Postulaciones</p>
														</a>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category view-resume-list">
														<a href="candidato/<?= session()->get('cand_id') ?>" title="">
															<i class="la la-eye"></i>
															<span>Perfil público</span>
															<!-- <p>22 Vistos</p> -->
														</a>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="candicv" title="">
															<i class="la la-file-text "></i>
															<span>Mi CV</span>
															<p>&nbsp;</p>
														</a>
													</div>
												</div>
											</div>
										</div>
										<div class="cat-sec">
											<div class="row no-gape">
												
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category follow-companies-popup">
														<a href="candiempseg" title="">
															<i class="la la-user"></i>
															<span>Empresa Seguidas</span>
															<p><?= $empresas_seguidas ?> Empresas</p>
														</a>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="candiperfil" title="">
															<i class="la la-file"></i>
															<span>Mi perfil</span>
															<p>Ver Perfil</p>
														</a>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="candifavoritos" title="">
															<i class="la la-heart"></i>
															<span>Favoritos</span>
															<p><?= $favoritos ?> Favoritos</p>
														</a>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="candisoporte" title="">
															<i class="la la-support"></i>
															<span>Soporte</span>
															<p>&nbsp;</p>
														</a>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="canditienda" title="">
															<i class="la la-cart-arrow-down"></i>
															<span>Tienda Jobbers</span>
															<p>&nbsp;</p>
														</a>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="candirecomendaciones" title="">
															<i class="la la-check"></i>
															<span>Recomendaciones</span>
															<p><?= $recomendaciones ?> Recomendaciones</p>
														</a>
													</div>
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
												<?php include("local/resources/views/includes/general_footer.php");?>
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