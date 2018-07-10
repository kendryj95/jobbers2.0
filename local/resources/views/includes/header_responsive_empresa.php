<?php  

$dir = '';
if ($_SERVER["SERVER_NAME"] == "localhost") {
	$dir = "/jobbers2";
} else {
	$dir = "/jobbersv2";
}

?>



<div class="responsive-header">
	<div class="responsive-menubar">
		<div class="res-logo"><a href="<?= $dir ?>/inicio" title=""><img src="<?= $dir ?>/local/resources/views/images/logo_d.png" alt="" /></a></div>
		<div class="menu-resaction">
			<div class="res-openmenu">
				<img src="<?= $dir ?>/local/resources/views/images/icon.png" alt="" /> Menú
			</div>
			<div class="res-closemenu">
				<img src="<?= $dir ?>/local/resources/views/images/icon2.png" alt="" /> Cerrar
			</div>
		</div>
	</div>
	<div class="responsive-opensec">
		<div class="btn-extars">
			<a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
			<ul class="account-btns">
				<li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
				<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
			</ul>
			</div><!-- Btn Extras -->
			<form class="res-search">
				<input type="text" placeholder="Job title, keywords or company name" />
				<button type="submit"><i class="la la-search"></i></button>
			</form>
			<div class="responsivemenu">
				<ul>
					<li class="">
						<a href="<?= $dir ?>/inicio" title="">Home</a>
						<?php $nombre_plan = session()->get("emp_plan")[0]->nombre ?>
						<a href="planes" title="">Plan: <?= strtoupper($nombre_plan); ?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>