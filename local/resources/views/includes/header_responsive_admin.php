<?php 
$back="";
if(isset($atras) && $atras==1)
{
$back="../administrator_candidatos_ver.php";	
}  
?>

<div class="responsive-header">
	<div class="responsive-menubar">
		<div class="res-logo" style="background-color: #fff;padding-left: 25px;padding-right: 25px; border-radius: 10px;"><a href="inicio" title=""><img src="https://www.jobbersargentina.net/img/logo_d.png" alt="Logo Jobbers" /></a></div>		<div class="menu-resaction">
			<div class="res-openmenu">
			<!-- TODO: REVISAR UNA MEJOR MANERA DE HACER ESTO SI LA HAY.
						VALIDAR QUE EDIT LUEGO DEL SLASH LLEVA UN ID  -->
				<?php $url = basename($_SERVER["REQUEST_URI"]); 
				if($url == 'plantillas' || 
				$url == 'ofertas-renovar' || 
				$url == 'cursos-aprobar' ||
				$url == 'nuevo' ||
				$url == 'create' ||
				$url == 'edit/' ||
				$url == 'publicar' ||
				$url == 'categorias' ||
				is_numeric($url)): ?>
					<img src="../../local/resources/views/images/icon.png" alt="" /> Menú
				<?php else: ?>
					<img src="../local/resources/views/images/icon.png" alt="" /> Menú
				<?php endif;?>

			</div>
			<div class="res-closemenu">
			<!-- TODO: REVISAR UNA MEJOR MANERA DE HACER ESTO SI LA HAY.
						VALIDAR QUE EDIT LUEGO DEL SLASH LLEVA UN ID  -->
				<?php $url = "".basename($_SERVER["REQUEST_URI"]); 
				if($url == 'plantillas' || 
				$url == 'ofertas-renovar' || 
				$url == 'cursos-aprobar' ||
				$url == 'nuevo' ||
				$url == 'create' ||
				$url == 'edit/' ||
				$url == 'publicar' ||
				$url == 'categorias' ||
				is_numeric($url)): ?>
					<img src="../../local/resources/views/images/icon2.png" alt="" /> Cerrar
				<?php else: ?>
					<img src="../local/resources/views/images/icon2.png" alt="" /> Cerrar
				<?php endif;?>

			</div>
		</div>
	</div>
	<div class="responsive-opensec">
		<!-- <div class="btn-extars">
			<?php if (session()->get('tipo_usuario')==2 || session()->get('tipo_usuario')== 1): ?>
				<?php if (session()->get('tipo_usuario')==2): ?>
					<a href="<?= $back ?>candidashboard" title="" class="my-panel">Mi panel</a>
				<?php elseif (session()->get('tipo_usuario')==1): ?>
					<a href="#" title="" class="my-panel">Mi panel</a>
				<?php endif; ?>
			<?php endif; ?>
			 </div> -->
			
			<div class="responsivemenu res-menu-cand" style="margin-top: 10px;">
				<div class="widget">
					<div class="tree_widget-sec">
						<ul>
                        <li>
				 						<a href="<?= url('administracion/panel') ?>" title=""><i class="la la-dashboard"></i>Inicio</a> 
				 					</li>
				 					<li>
				 						<a href="<?= url('administracion/empresas') ?>" title=""><i class="la la-industry"></i>Empresas</a> 
				 					</li>
				 					<li>
				 						<a href="<?= url('administracion/empresas/plantillas') ?>" title=""><i class="la la-book"></i>Empresas - Plantillas ofertas</a> 
				 					</li>
				 					<li>
				 						<a href="<?= url('administracion/empresas/ofertas-renovar') ?>" title="Renovar ofertas"><i class="la la-folder"></i>Empresas - Ren. ofertas...</a> 
				 					</li>
									 <li>
				 						<a href="<?= url('administracion/empresas/cursos-aprobar') ?>" title="Aprobar cursos"><i class="la la-university"></i>Empresa - Cursos </a> 
				 					</li>
				 					<li>
				 						<a href="<?= url('administracion/candidatos') ?>" title=""><i class="la la-users"></i>Candidatos</a> 
				 					</li>
				 					<li>
				 						<a href=" <?php echo $back;?>#" title=""><i class="la la-file-text"></i>Facturación</a> 
				 					</li>
				 					<li>
				 						<a href="<?= url('administracion/contacto') ?>" title=""><i class="la la-support"></i>Contacto</a> 
				 					</li>
				 					<li>
				 						<a href=" <?php echo $back;?>contacto" title=""><i class="la la-support"></i>Recomendaciones</a> 
				 					</li>
				 					<li>
				 						<a href="<?= url('administracion/noticias') ?>" title=""><i class="la la-file-text"></i>Noticias</a> 
				 					</li>
				 					<li>
				 						<a href="<?= url('administracion/soportistas') ?>" title=""><i class="la la-user"></i>Soportistas</a> 
				 					</li>
				 					<li>
				 						<a href="<?= url('administracion/redactores') ?>" title=""><i class="la la-user"></i>Redactores</a> 
				 					</li>  
				 					<li>
				 						<a href="<?= url('administracion/configuracion') ?>" title=""><i class="la la-gear"></i>Configuración</a> 
				 					</li>  
				 					<li><a href="<?= url('admsalir') ?>" title=""><i class="la la-arrow-left"></i>Salir</a></li>
						</ul>
					</div>
				</div> 	
			</div>
		</div>
	</div>