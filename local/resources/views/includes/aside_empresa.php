<aside class="col-lg-3 column border-right d-none d-xl-block">
	<div class="widget">
		<div class="tree_widget-sec">
			<ul>
				<li class="inner-child">
					<a href="#" title="Mi empresa"><i class="la la-file-text"></i>Mi empresa</a>
					<ul>
						<li onclick="location.href='detalle?e=<?= session()->get("emp_ide") ?>'"><a href="detalle?e=<?= session()->get("emp_ide") ?>" title="Mi Perfil">Mi perfil</a></li>
						<li onclick="location.href='perfil?e=<?= session()->get("emp_ide") ?>'"><a href="perfil?e=<?= session()->get("emp_ide") ?>" title="Editar Perfil">Editar perfil</a></li>
					</ul>
				</li>
				<li class="inner-child">
					<a href="#" title="Ofertas de Trabajo"><i class="la la-briefcase"></i>Oferta de Trabajo</a>
					<ul>
						<li onclick="location.href='ofertas'"><a href="ofertas" title="Ver Ofertas de Trab.">Ver ofertas</a></li>
						<li onclick="location.href='new_post'"><a href="new_post" title="Nueva Oferta de Trab.">Nueva oferta</a></li>
					</ul>
				</li>
				<li class="inner-child">
					<a href="#" title="Planes"><i class="la la-trophy"></i>Planes</a>
					<ul>
						<li onclick="location.href='planes'"><a href="planes" title="Manejar Planes">Manejar planes</a></li>
					</ul>
				</li>
				<li onclick="location.href='../logout'"><a href="../logout" title=""><i class="la la-unlink"></i>Salir</a></li>
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