<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <title>
            Jobbers Argentina
        </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="keywords"/>
        <meta content="CreativeLayers" name="author"/>
        <!-- Styles -->
        <link href="../local/resources/views/css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
        <link href="../local/resources/views/css/icons.css" rel="stylesheet"/>
        <link href="../local/resources/views/css/animate.min.css" rel="stylesheet"/>
        <link href="../local/resources/views/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../local/resources/views/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="../local/resources/views/css/chosen.css" rel="stylesheet" type="text/css"/>
        <link href="../local/resources/views/css/colors/colors.css" rel="stylesheet" type="text/css"/>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
        <style type="text/css">
            .job-details ul > li 
         	{
         		margin-bottom: 0px;
         		font-weight: 700;
         	}
         	.job-details ul > li >span
         	{
         		 
         		font-weight: 400;
         	}
         	.degradado
         	{
         		background: rgba(255,255,255,1);
				background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(246,246,246,1)), color-stop(100%, rgba(237,237,237,1)));
				background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=0 );
         	}
         	.tag
         	{
         		background-color: #ffb203;
         		color: #fff;
         		border-radius: 3px;
         		 
         		padding-right: 4px;
         		padding-left: 4px;
         		margin-left: 5px;
         	}
            .postulado
            {
                background-color: #ffb203;
            }
        </style>
    </head>
</html>
<body>
    <?php include('local/resources/views/includes/general_header.php');?>
    <?php include('local/resources/views/includes/general_header_responsive.php');?>

<div class="theme-layout" id="scrollup">
    <section style="background-color: #eeeeee;margin-top: -25px;">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 column" style="background-color: #fff;padding-top: 15px;border: 1px solid #ddd;">
                        <div class="job-single-sec">
                            <div class="job-single-head degradado" style="border: 1px dashed #b2b2b2;padding: 4px;">
                                <div class="job-thumb" style="padding-top: 35px;">
                                	<?php if ($datos[0]->img_profile!=""): ?>
                                		<img style="height: 101px;width: 107px;" alt="" src="../uploads/min/<?= $datos[0]->img_profile?>"/>
                                		<?php else: ?>
                                	 <img alt="" src="http://placehold.it/107x101"/>
                                	<?php endif ?>
                                    
                                </div>
                                <div class="job-head-info">
                                    <h4 style="margin-top: 15px;">
                                        <?= ucfirst(mb_strtolower($datos[0]->nombre_empresa));?>
                                    </h4>
                                    
                                     <p style="margin-top: -5px; line-height: 20px; text-align: justify;padding: 5px;background-color: #fff;border: 1px solid #ddd;border-radius: 5px;margin-bottom: 5px;width: 100%;">
                                         <?php if ($datos[0]->emp_descripcion!=""): ?>
                                        	<?= $datos[0]->emp_descripcion;?>
                                        	<?php else: ?>
                                        	 "La empresa no ha cargado descripción" 
                                        <?php endif ?>
                                    </p> 
                                    <div class="col-xs-12"> 
                                    <?php if ($datos[0]->emp_direccion!=""): ?>
                                     		<span class="tag" style="padding-top: 3px;padding-bottom: 3px; width: auto;color: #fff;"><?= $datos[0]->emp_direccion;?></span> 
                                     <?php endif ?> 
                                      <?php if ($datos[0]->sector!=""): ?>
                                     		<span class="tag" style="padding-top: 3px;padding-bottom: 3px;width: auto;color: #fff;">Empresa de <?= $datos[0]->sector;?></span> 
                                     <?php endif ?> 
                                      <?php if ($datos[0]->ofertas!=0): ?>
                                     		<span class="tag" style="padding-top: 3px;padding-bottom: 3px;width: auto;color: #fff;"><?= $datos[0]->ofertas;?> Ofertas</span> 
                                     <?php endif ?> 
                                     </div> 
                                </div> 
                            </div>
                            <!-- Job Head -->
                            <div class="job-details" style="text-align: justify;">
                            	 <h3>
                                    Título
                                </h3>
                                 <div>
                                 	<p style="font-weight: 600;"><?php echo ucfirst(mb_strtolower($datos[0]->titulo));?></p>
                                 </div>
                                <h3>
                                    Descripción
                                </h3>
                                 <div>
                                 	<?= $datos[0]->descripcion;?>
                                 </div>
                                <ul>
                                    <li>
                                        Salario: <span><?php if($datos[0]->salario!=""){echo '$ '.$datos[0]->salario." ARS";}else{echo "Sin Definir";} ?></span>
                                    </li>
                                     <li>
                                        Con experiencia: <span><?php if($datos[0]->experiencia!=""){echo $datos[0]->experiencia;}else{echo "Sin Definir";} ?></span></span>
                                    </li>
                                    <li>
                                        Dirección: <span><?= $datos[0]->pais;?> - <?= $datos[0]->provincia;?> - <?= $datos[0]->localidad;?></span>
                                    </li>
                                    <li>
                                        Disponibilidad: <span><?= $datos[0]->disponibilidad;?></span>
                                    </li>
                                    <li>
                                        Sector: <span><?= $datos[0]->sector;?></span>
                                    </li>
                                    <li>
                                        Nivel estudio:  <span><?= $datos[0]->nivel_estudio;?></span>
                                    </li>

                                    <li>
                                        Vacantes: <span><?= $datos[0]->n_vacantes;?></span>
                                    </li>
                                    <li>
                                        Plan estado:  <span><?= $datos[0]->plan_estado;?></span>
                                    </li>
                                    <li>
                                        Turno:  
                                        <span>
                                        	<?php 
                                        	if($datos[0]->turno=='Sin Defini'){echo "Sin Definir";}
                                        	else{echo $datos[0]->turno;}
                                        	?> 
                                        </span>
                                    </li>
                                    <li>
                                        Género:  <span><?= $datos[0]->genero;?></span>
                                    </li>
                                    <li>
                                        Edad: <span><?= $datos[0]->edad;?></span>
                                    </li>
                                    <li>
                                    	Habilidades:
                                    	<?php
                                    	
	                                    	if($datos[0]->habilidades!="")
	                                    	{$habilidades = explode(',',$datos[0]->habilidades);
	                                    		foreach ($habilidades as $key ) 
	                                    		{
	                                    	    echo '<span class="tag">'.$key.'</span>';
	                                    		} 
                                    		}
                                    		else
		                                    {
		                                    	 echo '<span>Sin habilidades</span>';
		                                    }
                                    	?>
                                        
                                    </li>
                                     <li>
                                    	Idiomas:
                                    	<?php
                                    	
	                                    	if($datos[0]->idiomas!="")
	                                    	{$idiomas = explode(',',$datos[0]->idiomas);
	                                    		foreach ($idiomas as $key ) 
	                                    		{
	                                    	    echo '<span class="tag">'.$key.'</span>';
	                                    		} 
                                    		}
                                    		else
		                                    {
		                                    	 echo '<span>Español</span>';
		                                    }
                                    	?>
                                        
                                    </li>
                                </ul>
                            </div>
                            <div class="share-bar">
                                <span>
                                    Compartir
                                </span>
                                <a class="share-fb" href="https://www.facebook.com/sharer.php?s=100&p[url]=http%3A%2F%2Fjobbersargentina.net%2Fjobbersv2%2Fdetalleoferta%2F<?php echo $datos[0]->id;?>" title=""  target="_blank">
                                    <i class="fa fa-facebook">
                                    </i>
                                </a>
                                <a class="share-linkedin" href="http://www.linkedin.com/shareArticle?url=http%3A%2F%2Fjobbersargentina.net%2Fjobbersv2%2Fdetalleoferta%2F<?php echo $datos[0]->id;?>" title=""  target="_blank">
                                    <i class="fa fa-linkedin">
                                    </i>
                                </a>
                                <a class="share-twitter" href="https://twitter.com/share?url=http%3A%2F%2Fjobbersargentina.net%2Fjobbersv2%2Fdetalleoferta%2F<?php echo $datos[0]->id;?>" title="" target="_blank">
                                    <i class="fa fa-twitter">
                                    </i>
                                </a>
                            </div>
                              <div class="recent-jobs">
                                <h3>
                                    Ofertas similares
                                </h3>
                                <div class="job-list-modern">
                                    <div class="job-listings-sec no-border" >
                                        <?php foreach ($ofertas_similares as $key): ?> 
                                        <div class="job-listing wtabs" style="padding-top: 5px;padding-bottom: 5px;">
                                            <div class="job-title-sec">
                                                <?php if ($key->img_profile!=""): ?>
                                                <div class="c-logo">
                                                    <img style="width: 100px;height: 100px;margin-right: 15px;" alt="" src="../uploads/min/<?= $key->img_profile;?>"/>
                                                </div>
                                                <?php else: ?>
                                                <div class="c-logo">
                                                    <img style="margin-right: 15px;" alt="" src="http://placehold.it/98x51"/>
                                                </div>  
                                                <?php endif ?> 
                                                <h3>
                                                    <a href="#" title="">
                                                       <?= ucfirst(mb_strtolower($key->titulo));?>
                                                    </a>
                                                </h3>
                                                <span>
                                                    <?= $key->sector;?> 
                                                </span><br>
                                                <span>
                                                     <?php echo $key->provincia.' '.$key->localidad;?>
                                                </span>
                                            </div>
                                            <div class="job-style-bx">
                                                <span class="job-is ft">
                                                   <?= $key->disponibilidad;?>
                                                </span> 
                                                <i>
                                                    <?php if ($key->dias==0): ?>
                                                        Hoy
                                                    <?php endif ?>
                                                    <?php if($key->dias==1): ?>
                                                        Ayer
                                                    <?php endif ?>
                                                   <?php if($key->dias>1): ?>
                                                        Publicado el día <?= fecha($key->fecha_creacion);?>
                                                    <?php endif ?>
                                                </i>
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>

                            <div class="recent-jobs">
                                <h3>
                                    Ofertas recientes
                                </h3>
                                <div class="job-list-modern">
                                    <div class="job-listings-sec no-border">
                                    	<?php foreach ($ofertas_recientes as $key): ?> 
                                        <div class="job-listing wtabs" style="padding-top: 5px;padding-bottom: 5px;">
                                            <div class="job-title-sec">
                                            	<?php if ($key->img_profile!=""): ?>
                                            	<div class="c-logo">
                                                    <img style="width: 100px;height: 100px;margin-right: 15px;" alt="" src="../uploads/min/<?= $key->img_profile;?>"/>
                                                </div>
                                            	<?php else: ?>
                                            	<div class="c-logo">
                                                    <img style="margin-right: 15px;" alt="" src="http://placehold.it/98x51"/>
                                                </div>	
                                            	<?php endif ?> 
                                                <h3>
                                                    <a href="#" title="">
                                                       <?= ucfirst(mb_strtolower($key->titulo));?>
                                                    </a>
                                                </h3>
                                                <span>
                                                    <?= $key->sector;?> 
                                                </span><br>
                                                <span>
                                                     <?php echo $key->provincia.' '.$key->localidad;?>
                                                </span>
                                            </div>
                                            <div class="job-style-bx">
                                                <span class="job-is ft">
                                                   <?= $key->disponibilidad;?>
                                                </span> 
                                                <i>
                                                    <?php if ($key->dias==0): ?>
                                                    	Hoy
                                                    <?php endif ?>
                                                    <?php if($key->dias==1): ?>
                                                    	Ayer
                                                    <?php endif ?>
                                                   <?php if($key->dias>1): ?>
                                                    	Publicado el día <?= fecha($key->fecha_creacion);?>
                                                    <?php endif ?>
                                                </i>
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 column" style="padding-top: 25px;background-image: url('../local/resources/views/empresas/app-assets/images/logo/bg-1.png')">

                        <?php 

                        if(session()->get('cand_id')!=""): ?> 
                                <?php if ($postulado[0]->cantidad==1): ?>
                                      <button onclick="postulado()" class="postulado btn-postular btn-postulado" class="btn btn-danger form-control" style="width: 100%;height:50px;">
                                        <i class="la la-check"></i>
                                        Postulado
                                    </button>
                                <?php else: ?>
                                     <button onclick="aplicar('<?= $datos[0]->id;?>')" class="btn-postular btn-postulado" class="btn btn-danger form-control" style="width: 100%;height:50px;">  
                                        Postularme
                                    </button>
                                <?php endif ?> 
                        <?php else: ?>
                         <button  onclick="session()" class="btn btn-danger form-control" style="width: 100%;height:50px;"> 
                            Postularme
                        </button>
                        <?php endif ?>
                        
                        <div class="recent-jobs" style="margin-top: 12px;">  
                        	<?php 
                        	$contador=0;
                        	if (count($ofertas)!=0): ?> 
                                <div class="job-list-modern">  
                                    <div class="job-listings-sec no-border">  
                                        <div class="job-listing wtabs"> 
                                        	<?php if ($contador==0): ?>
                                        		 <div class="col-xs-12 " style="text-align: center;"> 
	                                            	<?php if ($datos[0]->img_profile!=""): ?>
				                                		<img  style=" border: 2px solid #ddd;border-radius: 8px; height: 101px;width: 107px;" alt="" src="../uploads/min/<?= $datos[0]->img_profile?>"/><br>
				                                		<?php else: ?>
				                                	 <img alt="" src="http://placehold.it/107x101"/><br>
				                                	<?php endif ?>
	                                                <span>
	                                                    Ofertas de la empresa
	                                                </span> 
	                                            </div>
	                                         <?php $contador++?>
                                        	<?php endif ?>
                                            <div class="col-xs-12" style="text-align: justify;padding: 8px;"> 
                                            <?php foreach ($ofertas as $key): ?> 
                                                <p style="padding: 0px;margin: 0px;font-size: 13px;color: #0645AD;" >
                                                 <a style="padding: 0px;margin: 0px;font-size: 13px;" href="<?= $key->id;?>">
                                                 	<?php
                                                 		$new_titulo = explode("-", $key->titulo); 
                                                 	?>
                                                 	<?= ucfirst(mb_strtolower($new_titulo[0]));?></a>
                                                </p> 
                                                <span> 
                                                </span> 
                                             <?php endforeach ?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="../local/resources/views/js/jquery.min.js" type="text/javascript">
</script>
<script src="../local/resources/views/js/modernizr.js" type="text/javascript">
</script>
<script src="../local/resources/views/js/script.js" type="text/javascript">
</script>
<script src="../local/resources/views/js/wow.min.js" type="text/javascript">
</script>
<script src="../local/resources/views/js/slick.min.js" type="text/javascript">
</script>
<script src="../local/resources/views/js/parallax.js" type="text/javascript">
</script>
<script src="../local/resources/views/js/select-chosen.js" type="text/javascript">
</script>
<script src="../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript">
</script>
<script src="../local/resources/views/empresas/assets/js/notify.min.js" type="text/javascript"></script>
<script type="text/javascript">
      function aplicar(publicacion)
        {    
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url: '../candipostular',
                type: 'POST',
                dataType:'json',
                data: {id:publicacion},
                success: function(response) { 
                if(response=="session")
                {
                    $.notify("Debe iniciar sessión","info");
                }
                else if(response=='1')
                {
                    $(".btn-postular").addClass(' postulado');
                    $(".btn-postular").html('<i class="la la-check"></i> Postulado');
                     
                }               
                },
                error: function(error) {
                    $.notify("Ocurrió un error al procesar la solicitud.");
                }
            });
        }

        function postulado(){$.notify("Ya se encuentra postulado","info");}
        function session(){$.notify("Debe iniciar sesión","info");}
</script>
<?php
	function fecha($fecha)
	{
		$old = explode('-',$fecha);
		return $old[2]."-".$old[1]."-".$old[0];
	}
?>
</body>