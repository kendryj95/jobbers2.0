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
			<div class="logo" style="background-color: #fff;padding-left: 25px;padding-right: 25px; border-radius: 10px;">
				<a href="<?= url('inicio') ?>" title=""><img style="width: 120px;" class="hidesticky" src="https://www.jobbersargentina.net/img/logo_d.png" alt="" /><img style="width: 120px;" class="showsticky" src="https://www.jobbersargentina.net/img/logo_d.png" alt="" /></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<!-- Btn Extras -->
					 <nav style="float: left">

					 	<?php include("local/resources/views/includes/menus_publicos.php");?>
					 		
					 </nav>
					 
					 <?php if(session()->get('tipo_usuario')==2 || session()->get('tipo_usuario')== 1)
					 {
					 	if(session()->get('tipo_usuario')==2)
					 	{
					 		echo'<a href="<?= Request::root();?>/candidashboard" title="" class="my-panel">Mi panel</a>';
					 	}
					 	if(session()->get('tipo_usuario')==1)
					 	{
					 		echo'<a href="<?= Request::root();?>/empresa/ofertas" title="" class="post-job-btn ">Mi panel</a>';
					 	}
					 	
					 }
					 else
					 {
					 	echo'
					 	<ul class="account-btns">
					 		
					 		<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i>Ingresar</a></li>
					 	</ul>
					 	</div>';
					 }
					 ?>
					</div>
				</div>
			</header>