<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Login de usuarios</h3>
		<form action="loguear" method="POST">
			<div class="cfield">
				<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
				<input type="text" placeholder="Correo" name="correo" />
				<i class="la la-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" name="pass" />
				<i class="la la-key"></i>
			</div>
			<p class="remember-label">
			</p>
			<a href="recuperarclave" title="">Olvidé mi clave</a>
			<button type="submit">Entrar</button>
		</form>
		<div class="extra-login">
			<!--<div class="login-social">
					<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
					<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>-->
		</div>
	</div>
	</div><!-- LOGIN POPUP -->
	<div class="account-popup-area signup-popup-box">
		<div class="account-popup">
			<span class="close-popup"><i class="la la-close"></i></span>
			<h3>Registrarme</h3>
			<div class="select-user">
				<span onClick="set_tipo(2)">Candidato</span>
				<span onClick="set_tipo(1)">Empresa</span>
			</div>
			<form action="register" method="POST">
				<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
				<input id="tipo" name="tipo" type="hidden" value="">
				<div class="cfield">
					<input name="correo" type="text" placeholder="Correo" />
					<i class="la la-envelope-o"></i>
				</div>
				<div class="cfield">
					<input name="clave" type="password" placeholder="*****" />
					<i class="la la-key"></i>
				</div>
				<button type="submit">Regitrarme</button>
			</form>
			<div class="extra-login">
				<!--<span>Or</span>
				<div class="login-social">
						<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
						<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
				</div>-->
			</div>
		</div>
		</div><!-- SIGNUP POPUP -->
		<script type="text/javascript">
			function set_tipo(tipo)
			{
				$("#tipo").val(tipo);
			}
		</script>