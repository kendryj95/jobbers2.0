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
$back="../administrator_candidatos_ver.php";	
} 

?>


<div class="responsive-header">
	<div class="responsive-menubar">
		<div class="res-logo" style="background-color: rgba(255,255,255,0.5);padding-left: 25px;padding-right: 25px;"><a href="index.html" title=""><img src="https://www.jobbersargentina.net/img/logo_d.png" alt="Logo Jobbers" /></a></div>
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
			<?php if (session()->get('tipo_usuario')==2 || session()->get('tipo_usuario')== 1): ?>
				<?php if (session()->get('tipo_usuario')==2): ?>
					<a href="<?= $back ?>candidashboard" title="" class="post-job-btn"><i class="la la-plus"></i>Mi panel</a>
				<?php elseif (session()->get('tipo_usuario')==1): ?>
					<a href="empresa/ofertas" title="" class="post-job-btn"><i class="la la-plus"></i>Mi panel</a>
				<?php endif; ?>
			<?php else: ?>
				<ul class="account-btns">
					<li class="signup-popup"><a title=""><i class="la la-key"></i> Registrar</a></li>
					<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Entrar</a></li>
				</ul>
			<?php endif; ?>
			 </div><!--Btn Extras -->
			
			<div class="responsivemenu">
				 <?php include("local/resources/views/includes/menus_publicos.php");?> 
					
			</div>
		</div>
	</div>