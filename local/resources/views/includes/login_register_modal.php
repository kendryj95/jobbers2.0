<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Login de usuarios</h3>
		<form action="<?php echo $back;?>loguear" method="POST">
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
			<form action="<?php echo $back;?>register" method="POST" id="form_register">
				<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
				<input id="tipo" name="tipo" type="hidden" value="">
				<div class="cfield">
					<input name="correo" id="correo" type="email" placeholder="Correo" />
					<i class="la la-envelope-o"></i>
				</div>
				<div class="cfield">
					<input name="clave" id="clave" type="password" placeholder="*****" />
					<i class="la la-key"></i>
				</div>
				<div class="simple-checkbox">
				  <p><input type="checkbox" name="condiciones" id="condiciones"><label for="condiciones">Acepto <a href="terminos" style="color: #10c9e5">términos, condiciones y políticas de privacidad</a>.</label></p>
				</div>
				<p id="error" style="color: red; display: none"></p>
				<button type="button" onclick="registrar()">Registrarme</button>
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

			function registrar()
			{
				var correo = isEmail($('#correo').val());
				$('#error').hide();

				if ($('#correo').val() != "" && $('#clave').val() != "") {
					if (correo) {
						if ($('#clave').val().length >= 8 && $('#clave').val().length <= 12) {

							if ($('#condiciones').is(':checked')) {

								$('#form_register').submit();
							} else {
								$('#error').html('<i class="la la-close"></i> Debes aceptar los términos, políticas y condiciones para continuar con el registro').show();
							}

						} else {
							$('#error').html('<i class="la la-close"></i> La contraseña debe contener entre 8 y 12 caracteres').show();
						}
					} else {
						$('#error').html('<i class="la la-close"></i> Correo Electronico no valido').show();
					}
				} else {
					$('#error').html('<i class="la la-close"></i> Has dejado campos vacios').show();
				}

				
			}

			function isEmail(email) {
			  var regex = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
			  return regex.test(email);
			}

		</script>