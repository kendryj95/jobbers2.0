<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers">
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="local/resources/views/css/icons.css">
		<link rel="stylesheet" href="local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/local/resources/views/css/font-awesome.min.css" />
		<?php include('local/resources/views/includes/chat_soporte.php');?>
		
	</head>
	<body style="background-image: url('local/resources/views/images/administrator_fondo_login.jpg');background-repeat: no-repeat;background-position: center; background-size: cover;">
		<div class="theme-layout" id="scrollup">
			
			<section>
				<div class="block remove-bottom" style="padding: 5px;">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="account-popup-area signin-popup-box static" style="padding: 5px;">
									<div class="account-popup">
										<div class="text-center">
											<img src="https://www.jobbersargentina.net/img/logo_d.png" style="width: 200px;">
										</div>

										<div class="extra-login" style="margin-bottom: 10px">
											<span>Entrar con</span>
										 	<div class="login-social">
													<a class="fb-login" href="<?= url('redes/facebook') ?>" title=""><i class="fa fa-facebook"></i></a>
													<a class="tw-login" href="<?= url('redes/linkedin') ?>" title=""><i class="fa fa-linkedin"></i></a>
													<a class="go-login" href="<?= url('redes/google') ?>" title=""><i class="fa fa-google"></i></a>
											</div>
										</div>

										<span>Bienvenido a Jobbers</span>
											
										<form style="padding: 10px;" action="loguear" method="post">
											<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
											<?php if ((isset($_REQUEST['returnUrl']) && $_REQUEST['returnUrl'] != "") && (isset($_REQUEST['p']) && $_REQUEST['p'] == 1) && (isset($_REQUEST['id_pub']) && $_REQUEST['id_pub'] != "")): ?>
											<input type="hidden" name="return_url" value="<?= $_REQUEST['returnUrl'] ?>">
											<input type="hidden" name="postular" value="true">
											<input type="hidden" name="id_pub" value="<?= $_REQUEST['id_pub'] ?>">
											<?php endif; ?>
											<div class="cfield">
												<input name="correo" type="text" placeholder="Correo electrónico" />
												<i class="la la-user"></i>
											</div>
											<div class="cfield">
												<input name="pass" type="password" placeholder="********" />
												<i class="la la-eye" style="cursor: pointer;" onclick="show_hide(this)" title="Mostrar"></i>
											</div>
											<?php if (isset($_REQUEST["error"])): ?>
											<p style="color: red"><?= $_REQUEST["error"] ?></p>
											<?php elseif (isset($_REQUEST["success"])): ?>
											<p style="color: green"><?= $_REQUEST["success"] ?></p>
											<?php elseif (isset($_REQUEST["info"])): ?>
											<p style="color: red"><?= $_REQUEST["info"] ?></p>
											<?php endif ?>
											<p class="remember-label">
											</p>
											<a href="recuperarclave" title="">Olvidé mi clave</a>
											<button type="submit">Entrar</button>
										</form>
									</div>
									</div><!-- LOGIN POPUP -->
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php include('local/resources/views/includes/footer_single.php');?>
			</div>
			<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
			<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
			<script src="local/resources/views/js/script.js" type="text/javascript"></script>
			<script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
			<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
			<script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
			<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
			<script src="local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
			<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
			<script src="local/resources/views/js/maps2.js" type="text/javascript"></script>
			<link rel="stylesheet" type="text/css" href="local/resources/views/plugins/notify.js" />
			<script>
				function show_hide(btn)
				{
					var $btn = $(btn);

					if ($btn.hasClass('la-eye')) {
						$btn.removeClass('la-eye')
							.addClass('la-eye-slash')
							.attr('title', 'Mostrar');
						$('input[name="pass"]').attr('type', 'text');
					} else {
						$btn.removeClass('la-eye-slash')
							.addClass('la-eye')
							.attr('title', 'Ocultar');
						$('input[name="pass"]').attr('type', 'password');
					}
				}
			</script>
			
			<!--Validaciones-->
			<?php
			if(isset($_GET['error']))
			{
			echo'<script>$.notify("Warning: Self-destruct in 3.. 2..", "warn");</script>';
			}
			?>
			<!--Fin d validaciones-->
		</body>
	</html>