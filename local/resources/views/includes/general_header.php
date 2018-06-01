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
				<a href="<?php echo $back;?>inicio" title=""><img style="width: 120px;" class="hidesticky" src="https://www.jobbersargentina.net/img/logo_d.png" alt="" /><img style="width: 120px;" class="showsticky" src="https://www.jobbersargentina.net/img/logo_d.png" alt="" /></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<!-- Btn Extras -->
					 <?php include("local/resources/views/includes/menus_publicos.php");?>
					</div>
				</div>
			</header>