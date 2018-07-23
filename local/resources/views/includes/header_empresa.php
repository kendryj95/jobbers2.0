<header class="stick-top">
	<div class="menu-sec">
		<div class="container">
			<div class="logo" style="background-color: rgba(255,255,255,0.5);padding-left: 25px;padding-right: 25px;">
				<a href="../inicio" title=""><img src="../local/resources/views/images/logo_d.png" style="width: 120px;"></a>
			</div><!-- Logo -->
			<div class="btns-profiles-sec">
				<span><img src="../uploads/<?= session()->get("emp_imagen") ?>" alt="logo_empresa" width="50" height="50" /> <?= session()->get("emp_nombre_empresa") ?> <i class="la la-angle-down"></i></span>
				<ul>
					<li><a href="detalle?e=<?= session()->get("emp_ide") ?>" title=""><i class="la la-user"></i> Mi perfil</a></li>
					<li><a href="perfil?e=<?= session()->get("emp_ide") ?>" title=""><i class="la la-file-text"></i> Editar perfil</a></li>
					<li><a href="ofertas" title=""><i class="la la-folder"></i> Ver ofertas</a></li>
					<li><a href="new_post" title=""><i class="la la-plus"></i> Nueva oferta</a></li>
					<li><a href="planes" title=""><i class="la la-trophy"></i> Manejar planes</a></li>
					<li><a href="../logout" title=""><i class="la la-sign-out"></i> Salir</a></li>
				</ul>
			</div>
			<nav>
				<ul>
					<li class="">
						<a href="../inicio" title="">Inicio</a>
						<?php $nombre_plan = session()->get("emp_plan")[0]->nombre ?>
						<a href="planes" title="">Plan: <?= strtoupper($nombre_plan); ?></a>
					</li>
					
			</nav><!-- Menus -->
		</div>
	</div>
</header>