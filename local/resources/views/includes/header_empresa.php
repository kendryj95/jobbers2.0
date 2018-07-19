<header class="stick-top">
	<div class="menu-sec">
		<div class="container">
			<div class="logo">
				<a href="../inicio" title=""><img src="../local/resources/views/images/logo_d.png" style="width: 120px;"></a>
			</div><!-- Logo -->
			<div class="btns-profiles-sec">
				<span><img src="../uploads/<?= session()->get("emp_imagen") ?>" alt="logo_empresa" width="50" height="50" /> <?= session()->get("emp_nombre_empresa") ?> <i class="la la-angle-down"></i></span>
				<ul>
					<li><a href="../logout" title=""><i class="la la-history"></i> Salir</a></li>
				</ul>
			</div>
			<nav>
				<ul>
					<li class="">
						<a href="../inicio" title="">Home</a>
						<?php $nombre_plan = session()->get("emp_plan")[0]->nombre ?>
						<a href="planes" title="">Plan: <?= strtoupper($nombre_plan); ?></a>
					</li>
					
			</nav><!-- Menus -->
		</div>
	</div>
</header>