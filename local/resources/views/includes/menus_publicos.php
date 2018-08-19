
<ul>
	<li class="">
		<a href="<?php echo $back;?>inicio" title="">Inicio</a>
	</li>
	<li class="">
		<a href="<?php echo $back;?>ofertas" title="">Empleos</a>
	</li>
	<li class="">
		<a href="<?php echo $back;?>empresas" title="">Empresas</a>
	</li>
	<?php if (session()->get("candidato") == null): ?>
	 
	<?php endif ?>
	<li class="">
		<a href="<?php echo $back;?>noticias" title="">Noticias</a>
	</li>
</ul>



