<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina - Empresa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers">
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		
	</head>
	<body>
		<div class="theme-layout" id="scrollup">
			
			<?php include("includes/header_responsive_empresa.php") ?>
			
			<?php include "includes/header_empresa.php" ?>
			<section class="overlape">
				<div class="block no-padding">
					<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="inner-header">
									<h3>Bienvenido <?= session()->get("emp_nombre_empresa") ?> </h3>
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
							
							<?php include("includes/aside_empresa.php") ?>
							<div class="col-lg-9 column">
								<div class="padding-left">
									<div class="manage-jobs-sec">
										<h3>Listado de ofertas de trabajo</h3>
										<div class="extra-job-info">
											<span><i class="la la-clock-o"></i><strong><?= $total_ofertas ?></strong> Ofertas publicadas</span>
											<span><i class="la la-file-text"></i><strong>0</strong> Postulados en total</span>
											<span><i class="la la-users"></i><strong>0</strong> Jobbers Activos</span>
										</div>
										<table>
											<thead>
												<tr>
													<td>Titulo</td>
													<td>Postulados</td>
													<td>Creado y Vencido</td>
													<td>Status</td>
													<td>Acciones</td>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($ofertas as $oferta): ?>
												<tr>
													<td>
														<div class="table-list-title">
															<h3><a href="#" title=""><?= $oferta->titulo ?></a></h3>
															<span><i class="la la-map-marker"></i><?= $oferta->ubicacion ?></span>
														</div>
													</td>
													<td>
														<a href="candidatos-postulados"><span class="applied-field">0 Postulado(s)</span></a>
													</td>
													<td>
														<span><?= $oferta->fcrea_fvenc ?></span>
													</td>
													<td>
														<span class="status active"><?= $oferta->estatus ?></span>
													</td>
													<td>
														<ul class="action_job">
															<li><span>Ver Oferta</span><a href="../detalleoferta/<?= $oferta->id ?>" title=""><i class="la la-eye"></i></a></li>
															<li><span>Editar</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
															<li><span>Pausar</span><a href="#" title=""><i class="la la-pause"></i></a></li>
															<li><span>Eliminar</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
														</ul>
													</td>
												</tr>
												<?php endforeach ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<br>
			<?php include("includes/general_footer.php") ?>
		</div>
		<div class="account-popup-area signin-popup-box">
			<div class="account-popup">
				<span class="close-popup"><i class="la la-close"></i></span>
				<h3>User Login</h3>
				<span>Click To Login With Demo User</span>
				<div class="select-user">
					<span>Candidate</span>
					<span>Employer</span>
				</div>
				<form>
					<div class="cfield">
						<input type="text" placeholder="Username" />
						<i class="la la-user"></i>
					</div>
					<div class="cfield">
						<input type="password" placeholder="********" />
						<i class="la la-key"></i>
					</div>
					<p class="remember-label">
						<input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
					</p>
					<a href="#" title="">Forgot Password?</a>
					<button type="submit">Login</button>
				</form>
				<div class="extra-login">
					<span>Or</span>
					<div class="login-social">
						<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
						<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
					</div>
				</div>
			</div>
			</div><!-- LOGIN POPUP -->
			<div class="account-popup-area signup-popup-box">
				<div class="account-popup">
					<span class="close-popup"><i class="la la-close"></i></span>
					<h3>Sign Up</h3>
					<div class="select-user">
						<span>Candidate</span>
						<span>Employer</span>
					</div>
					<form>
						<div class="cfield">
							<input type="text" placeholder="Username" />
							<i class="la la-user"></i>
						</div>
						<div class="cfield">
							<input type="password" placeholder="********" />
							<i class="la la-key"></i>
						</div>
						<div class="cfield">
							<input type="text" placeholder="Email" />
							<i class="la la-envelope-o"></i>
						</div>
						<div class="dropdown-field">
							<select data-placeholder="Please Select Specialism" class="chosen">
								<option>Web Development</option>
								<option>Web Designing</option>
								<option>Art & Culture</option>
								<option>Reading & Writing</option>
							</select>
						</div>
						<div class="cfield">
							<input type="text" placeholder="Phone Number" />
							<i class="la la-phone"></i>
						</div>
						<button type="submit">Signup</button>
					</form>
					<div class="extra-login">
						<span>Or</span>
						<div class="login-social">
							<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
							<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
						</div>
					</div>
				</div>
				</div><!-- SIGNUP POPUP -->
				<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/modernizr.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/wow.min.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
				<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
				<script src="../local/resources/views/js/maps2.js" type="text/javascript"></script>
				<script src="../local/resources/views/plugins/notify.js" type="text/javascript"></script>
				<script>
					$(document).ready(function() {
						$('#post').on('click', function(){
							$.notify("Oferta publicada satisfactoriamente.", {
				className:"success",
				globalPosition: "bottom center"
				});
				$('#step1').removeClass('active');
				$('#step2').addClass('active');
						});
					});
				</script>
			</body>
		</html>