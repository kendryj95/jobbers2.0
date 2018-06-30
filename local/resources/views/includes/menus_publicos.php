
<nav style="float: left;">
<ul>
	<li class="">
		<a href="<?php echo $back;?>inicio" title="">Inicio</a>
	</li>
	<li class="">
		<a href="<?php echo $back;?>ofertas" title="">Empleos</a>
	</li>
	<?php if (session()->get("candidato") == null): ?>
	<li class="">
		<a href="<?php echo $back;?>candidatos" title="">Candidatos</a>
	</li>
	<?php endif ?>
	<li class="">
		<a href="<?php echo $back;?>noticias" title="">Noticias</a>
	</li>
</ul>
</nav>

<?php if(session()->get('tipo_usuario')==2 || session()->get('tipo_usuario')== 1)
{
	if(session()->get('tipo_usuario')==2)
	{
		echo'<a href="'.$back.'candidashboard" title="" class="post-job-btn"><i class="la la-plus"></i>Mi panel</a>';
	}
	if(session()->get('tipo_usuario')==1)
	{
		echo'<a href="#" title="" class="post-job-btn "><i class="la la-plus"></i>Mi panel</a>';
	}
	
}
else
{
	echo'
	<ul class="account-btns" style="margin-top:5px;">
		<li class="signup-popup"><a title=""><i class="la la-key"></i>Registrar</a></li>
		<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i>Entrar</a></li>
	</ul>
	</div>';
}
?>

