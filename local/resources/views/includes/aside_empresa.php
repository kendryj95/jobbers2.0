
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
						<li onclick="location.href='<?= url('empresa/detalle') ?>?e=<?= session()->get("emp_ide") ?>'"><a href="<?= url('empresa/detalle') ?>?e=<?= session()->get("emp_ide") ?>" title="Mi Perfil">Mi perfil</a></li>
						<li onclick="location.href='<?= url('empresa/perfil') ?>?e=<?= session()->get("emp_ide") ?>'"><a href="<?= url('empresa/perfil') ?>?e=<?= session()->get("emp_ide") ?>" title="Editar Perfil">Editar perfil</a></li>
					</ul>
				</li>
				<li class="inner-child">
					<a href="#" title="Ofertas de Trabajo"><i class="la la-briefcase"></i>Oferta de trabajo</a>
					<ul>
						<li onclick="location.href='<?= url('empresa/ofertas') ?>'"><a href="<?= url('empresa/ofertas') ?>" title="Ver Ofertas de Trab.">Ver mis ofertas</a></li>
						<li onclick="location.href='<?= url('empresa/new_post') ?>'"><a href="<?= url('empresa/new_post') ?>" title="Nueva Oferta de Trab.">Nueva oferta</a></li>
						<li onclick="location.href='<?= url('empresa/plantillas') ?>'"><a href="<?= url('empresa/plantillas') ?>" title="Nueva Oferta de Trab.">Mis plantillas</a></li>
					</ul>
				</li>
				<li class="inner-child">
					<a href="#" title="Cursos"><i class="la la-university"></i>Cursos</a>
					<ul>
						<li onclick="location.href='<?= url('empresa/cursos') ?>'"><a href="<?= url('empresa/cursos') ?>" title="Mis cursos">Mis cursos</a></li>
						<li onclick="location.href='<?= url('empresa/new_curso') ?>'"><a href="<?= url('empresa/new_curso') ?>" title="Nuevo curso">Nuevo curso</a></li>
					</ul>
				</li>
				<li class="inner-child">
					<a href="#" title="Planes"><i class="la la-trophy"></i>Planes</a>
					<ul>
						<li onclick="location.href='<?= url('empresa/planes') ?>'"><a href="<?= url('empresa/planes') ?>" title="Manejar Planes">Manejar planes</a></li>
					</ul>
				</li>
				<li >
					<a href="<?= url('candidatos') ?>" title=""><i class="la la-users"></i>Candidatos</a>
				</li>
				<li onclick="location.href='<?= url('logout') ?>'"><a href="<?= url('logout') ?>" title=""><i class="la la-unlink"></i>Salir</a></li>
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