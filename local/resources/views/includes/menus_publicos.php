
<ul class="desk-1024">
	<!-- <li class="li-nav"> -->
	<li class="">
		<a href="<?php echo $back;?>inicio" title="">Inicio&nbsp;&nbsp;&nbsp;|</a>
		<!-- <a href="<?php echo $back;?>inicio" class="a-nav" title="">Inicio</a> -->
	</li>
	<li class="">
		<a href="<?php echo $back;?>ofertas" title="">&nbsp;&nbsp;&nbsp;Empleos&nbsp;&nbsp;&nbsp;|</a>
	</li>
	<li class="">
		<a href="<?php echo $back;?>empresas" title="">&nbsp;&nbsp;&nbsp;Empresas&nbsp;&nbsp;&nbsp;|</a>
	</li>
	<?php if (session()->get("candidato") == null): ?>
	 
	<?php endif ?>
	<li class="">
		<a href="<?php echo $back;?>noticias" title="">&nbsp;&nbsp;&nbsp;Noticias</a>
	</li>
</ul>
<ul class="mobile-1024 mobile">
	<!-- <li class="li-nav"> -->
	<li class="">
		<a href="<?php echo $back;?>inicio" title="">Inicio</a>
		<!-- <a href="<?php echo $back;?>inicio" class="a-nav" title="">Inicio</a> -->
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



