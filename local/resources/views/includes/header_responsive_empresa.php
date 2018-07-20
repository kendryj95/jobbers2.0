<div class="responsive-header">
	<div class="responsive-menubar">
		<div class="res-logo"><a href="../inicio" title=""><img src="../local/resources/views/images/logo_d.png" alt="" /></a></div>
		<div class="menu-resaction">
			<div class="res-openmenu">
				<img src="../local/resources/views/images/icon.png" alt="" /> Menú
			</div>
			<div class="res-closemenu">
				<img src="../local/resources/views/images/icon2.png" alt="" /> Cerrar
			</div>
		</div>
	</div>
	<div class="responsive-opensec">
		<!-- <div class="btn-extars">
			<a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
			<ul class="account-btns">
				<li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
				<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
			</ul>
			</div>Btn Extras
			<form class="res-search">
				<input type="text" placeholder="Job title, keywords or company name" />
				<button type="submit"><i class="la la-search"></i></button>
			</form> -->
			<div class="responsivemenu">
				<ul>
					<li class="">
						<a href="../inicio" title="">Inicio</a>
						<?php $nombre_plan = session()->get("emp_plan")[0]->nombre ?>
						<a href="planes" title="">Plan: <?= strtoupper($nombre_plan); ?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>