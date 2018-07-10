<?php 
$back="";
if(isset($atras) && $atras==1)
{
$back="../administrator_candidatos_ver.php";	
}  
?>

<div class="responsive-header">
	<div class="responsive-menubar">
		<div class="res-logo" style="background-color: rgba(255,255,255,0.5);padding-left: 25px;padding-right: 25px;"><a href="index.html" title=""><img src="https://www.jobbersargentina.net/img/logo_d.png" alt="Logo Jobbers" /></a></div>		<div class="menu-resaction">
			<div class="res-openmenu">
				<img src="local/resources/views/images/icon.png" alt="" /> Menú
			</div>
			<div class="res-closemenu">
				<img src="local/resources/views/images/icon2.png" alt="" /> Cerrar
			</div>
		</div>
	</div>
	<div class="responsive-opensec">
		<div class="btn-extars">
			<?php if (session()->get('tipo_usuario')==2 || session()->get('tipo_usuario')== 1): ?>
				<?php if (session()->get('tipo_usuario')==2): ?>
					<a href="<?= $back ?>candidashboard" title="" class="post-job-btn"><i class="la la-plus"></i>Mi panel</a>
				<?php elseif (session()->get('tipo_usuario')==1): ?>
					<a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Mi panel</a>
				<?php endif; ?>
			<?php endif; ?>
			 </div>
			
			<div class="responsivemenu">
				<div class="widget">
					<div class="tree_widget-sec">
						<ul>
							<li><a href="candidashboard" title=""><i class="la la-dashboard active"></i>Inicio</a></li>
							<li><a href="candifavoritos" title=""><i class="la la-heart"></i>Mis favoritos</a></li>
							<li  >
								<a href="ofertas" title=""><i class="la la-user-md"></i>Ofertas</a>
							</li>
							<li >
								<a href="empresas" title=""><i class="la la-industry"></i>Empresas</a>
							</li>
							<li >
								<a href="candipostulaciones" title=""><i class="la la-clipboard"></i>Postulaciones</a>
							</li>
							<li >
								<a href="candidato/<?php echo session()->get('cand_id');?>" title=""><i class="la la-user"></i>Perfil público</a>
							</li>
							<li >
								<a href="candiperfil" title=""><i class="la la-user"></i>Mi perfil</a>
							</li>
							<li >
								<a href="candicv" title=""><i class="la la-file-text"></i>Curriculum</a>
							</li>
							<li >
								<a href="candiempseg" title=""><i class="la la-industry"></i>Empresas Seguidas</a>
							</li>
							<li >
								<a href="candireferidos" title=""><i class="la la-users"></i>Referidos</a>
							</li>
							<li >
								<a href="candisoporte" title=""><i class="la la-support"></i>Soporte</a>
							</li>
							<li >
								<a href="canditienda" title=""><i class="la la-cart-arrow-down"></i>Tienda</a>
							</li>
							<li >
								<a href="candirecomendaciones" title=""><i class="la la-check"></i>Recomendaciones</a>
							</li>
							<li >
								<a href="candiredes" title=""><i class="la la-facebook"></i>Mis redes</a>
							</li>
							<li><a href="candimaletin" title=""><i class="fa fa-briefcase"></i>Mi Maletín</a></li>
							<li >
								<a href="noticias" title=""><i class="fa fa-newspaper-o"></i>Noticias</a>
							</li>
							<li><a href="candiconfiguracion" title=""><i class="la la-gear"></i>Configuración</a></li>
							<!--<li><a href="#" title=""><i class="la la-money"></i>Pagos</a></li> -->
							<li><a href="logout" title=""><i class="la la-arrow-left"></i>Salir</a></li>
						</ul>
					</div>
				</div> 	
			</div>
		</div>
	</div>