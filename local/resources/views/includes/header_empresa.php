<?php
$back="";
if(isset($atras) && $atras==1)
{
$back="../";	
}



?>
<header class="stick-top forsticky">
	<div class="menu-sec">
		<div class="container">
			<div class="logo" style="background-color: rgba(255,255,255,0.5);padding-left: 25px;padding-right: 25px;">
			<a href="<?= $back ?>../inicio" title=""><img style="width: 120px;" class="hidesticky" src="https://www.jobbersargentina.net/img/logo_d.png" alt="" /><img style="width: 120px;" class="showsticky" src="https://www.jobbersargentina.net/img/logo_d.png" alt="" /></a>
			</div><!-- Logo -->
			<div class="btns-profiles-sec">
				<?php $imagen_perfil = session()->get("emp_imagen") == null || session()->get("emp_imagen") == '' ? asset('local/resources/views/images/company-avatar.png') : asset('uploads/'.session()->get("emp_imagen")) ?>
				<span><img src="<?= $imagen_perfil ?>" alt="logo_empresa" width="50" height="50" /> <?= session()->get("emp_nombre_empresa") ?> <i class="la la-angle-down"></i></span>
				<ul>
					<li><a href="<?= $back ?>detalle?e=<?= session()->get("emp_ide") ?>" title=""><i class="la la-user"></i> Mi perfil</a></li>
					<li><a href="<?= $back ?>perfil?e=<?= session()->get("emp_ide") ?>" title=""><i class="la la-file-text"></i> Editar perfil</a></li>
					<li><a href="<?= $back ?>ofertas" title=""><i class="la la-folder"></i> Ver ofertas</a></li>
					<li><a href="<?= $back ?>new_post" title=""><i class="la la-plus"></i> Nueva oferta</a></li>
					<li><a href="<?= $back ?>planes" title=""><i class="la la-trophy"></i> Manejar planes</a></li>
					<li><a href="<?= $back ?>../candidatos" title=""><i class="la la-users"></i> Candidatos</a></li>
					<li><a href="<?= $back ?>../logout" title=""><i class="la la-sign-out"></i> Salir</a></li>
				</ul>
			</div>
			<nav style="margin-top: 4px;">
				<ul>
					<li class="">
						<a href="<?= $back ?>../inicio" title="">Inicio</a>
						<?php $nombre_plan = session()->get("emp_plan")[0]->nombre ?>
						<a href="planes" title="">Plan: <?= strtoupper($nombre_plan); ?></a>
					</li>
					
			</nav><!-- Menus -->
		</div>
	</div>
</header>