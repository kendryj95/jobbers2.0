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
			<a href="#" title="">Olvidé mi clave</a>
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
			<span>Candidato</span>
			<span>Empresa</span>
		</div>
		<form>
			<div class="cfield">
				<input type="text" placeholder="Usuario" />
				<i class="la la-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" />
				<i class="la la-key"></i>
			</div>
			<div class="cfield">
				<input type="text" placeholder="Correo" />
				<i class="la la-envelope-o"></i>
			</div> 
			<button type="submit">Regitrarme</button>
		</form>
		<div class="extra-login">
			<span>Or</span>
			<!--<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>-->
		</div>
	</div>
</div><!-- SIGNUP POPUP -->