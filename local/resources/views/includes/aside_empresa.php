
<?php  
	$back="";
	if(isset($atras) && $atras==1)
	{
	$back="../";	
	}

?>

<aside class="col-lg-3 column border-right d-none d-xl-block">
	<div class="widget">
		<div class="tree_widget-sec">
			<ul>
				<li class="inner-child">
					<a href="#" title="Mi empresa"><i class="la la-file-text"></i>Mi empresa</a>
					<ul>
						<li onclick="location.href='<?= $back ?>detalle?e=<?= session()->get("emp_ide") ?>'"><a href="<?= $back ?>detalle?e=<?= session()->get("emp_ide") ?>" title="Mi Perfil">Mi perfil</a></li>
						<li onclick="location.href='<?= $back ?>perfil?e=<?= session()->get("emp_ide") ?>'"><a href="<?= $back ?>perfil?e=<?= session()->get("emp_ide") ?>" title="Editar Perfil">Editar perfil</a></li>
					</ul>
				</li>
				<li class="inner-child">
					<a href="#" title="Ofertas de Trabajo"><i class="la la-briefcase"></i>Oferta de trabajo</a>
					<ul>
						<li onclick="location.href='<?= $back ?>ofertas'"><a href="<?= $back ?>ofertas" title="Ver Ofertas de Trab.">Ver ofertas</a></li>
						<li onclick="location.href='<?= $back ?>new_post'"><a href="<?= $back ?>new_post" title="Nueva Oferta de Trab.">Nueva oferta</a></li>
					</ul>
				</li>
				<li class="inner-child">
					<a href="#" title="Planes"><i class="la la-trophy"></i>Planes</a>
					<ul>
						<li onclick="location.href='<?= $back ?>planes'"><a href="<?= $back ?>planes" title="Manejar Planes">Manejar planes</a></li>
					</ul>
				</li>
				<li >
					<a href="<?= $back ?>../candidatos" title=""><i class="la la-users"></i>Candidatos</a>
				</li>
				<li onclick="location.href='<?= $back ?>../logout'"><a href="<?= $back ?>../logout" title=""><i class="la la-unlink"></i>Salir</a></li>
				<!-- <li class="inner-child">
						<a href="#" title=""><i class="la la-paper-plane"></i>Resumes</a>
						<ul>
								<li><a href="#" title="">My Profile</a></li>
								<li><a href="#" title="">Social Network</a></li>
								<li><a href="#" title="">Contact Information</a></li>
						</ul>
				</li>
				<li class="inner-child">
						<a href="#" title=""><i class="la la-user"></i>Packages</a>
						<ul>
								<li><a href="#" title="">My Profile</a></li>
								<li><a href="#" title="">Social Network</a></li>
								<li><a href="#" title="">Contact Information</a></li>
						</ul>
				</li>
				<li class="inner-child">
						<a href="#" title=""><i class="la la-file-text"></i>Post a New Job</a>
						<ul>
								<li><a href="#" title="">My Profile</a></li>
								<li><a href="#" title="">Social Network</a></li>
								<li><a href="#" title="">Contact Information</a></li>
						</ul>
				</li>
				<li class="inner-child">
						<a href="#" title=""><i class="la la-flash"></i>Job Alerts</a>
						<ul>
								<li><a href="#" title="">My Profile</a></li>
								<li><a href="#" title="">Social Network</a></li>
								<li><a href="#" title="">Contact Information</a></li>
						</ul>
				</li>
				<li class="inner-child">
						<a href="#" title=""><i class="la la-lock"></i>Change Password</a>
						<ul>
								<li><a href="#" title="">My Profile</a></li>
								<li><a href="#" title="">Social Network</a></li>
								<li><a href="#" title="">Contact Information</a></li>
						</ul>
				</li>
				<li><a href="#" title=""><i class="la la-unlink"></i>Logout</a></li> -->
			</ul>
		</div>
	</div>
</aside>