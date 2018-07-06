<?php  

$dir = '';
if ($_SERVER["SERVER_NAME"] == "localhost") {
	$dir = "/jobbers2.0";
} else {
	$dir = "/jobbersv2";
}

$back="";
if(isset($atras) && $atras==1)
{
$back="../";	
} 

?>


<div class="responsive-header">
	<div class="responsive-menubar">
		<div class="res-logo" style="background-color: rgba(255,255,255,0.5);padding-left: 25px;padding-right: 25px;"><a href="index.html" title=""><img src="https://www.jobbersargentina.net/img/logo_d.png" alt="Logo Jobbers" /></a></div>
		<div class="menu-resaction">
			<div class="res-openmenu">
				<img src="local/resources/views/images/icon.png" alt="" /> Menu
			</div>
			<div class="res-closemenu">
				<img src="local/resources/views/images/icon2.png" alt="" /> Close
			</div>
		</div>
	</div>
	<div class="responsive-opensec">
		<div class="btn-extars">
			<!-- <a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a> -->
			<ul class="account-btns">
				<li class="signup-popup"><a title=""><i class="la la-key"></i> Registrar</a></li>
				<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Entrar</a></li>
			</ul>
			</div><!-- Btn Extras -->
			<!-- <form class="res-search">
				<input type="text" placeholder="Job title, keywords or company name" />
				<button type="submit"><i class="la la-search"></i></button>
			</form> -->
			<div class="responsivemenu">
				<ul>
					<li class="">
						<a href="<?php echo $back;?>inicio" title="">Inicio</a>
					</li>
					<li class="">
						<a href="<?php echo $back;?>ofertas" title="">Empleos</a>
					</li>
					<?php if (session()->get("candidato") == null): ?>
					<li class="">
						<a href="<?php echo $back;?>candidatos" title="">Candidatos</a>
					</li>
					<?php endif ?>
					<li class="">
						<a href="<?php echo $back;?>noticias" title="">Noticias</a>
					</li>
				</ul>
			</div>
		</div>
	</div>