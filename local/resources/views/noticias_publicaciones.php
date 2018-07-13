<!DOCTYPE html>
<html>
	<head>
		<?php include('local/resources/views/includes/referencias_top.php');?>
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="local/resources/views/css/icons.css">
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
	</head>
	<body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
		<div class="theme-layout" id="scrollup">
			<!--Header responsive-->
			<?php include('local/resources/views/includes/header_responsive_noticias.php');?>
			<?php include('local/resources/views/includes/header_noticias.php');?>
			<!--fin Header responsive-->
			
			<section style="margin-bottom: 20px;">
				<div class="block no-padding">
					<div class="container" style="min-height: 500px;">
						<div class="row no-gape">
							<?php include('local/resources/views/includes/aside_noticias.php');?>
							<div class="col-lg-9 column">
								<div class="padding-left">
									<div class="manage-jobs-sec addscroll">
										<h3>Publicaciones</h3>
										<table>
											<thead>
												<tr>
													<td>Publicación</td>
													<td>Visualizar</td>
													<td>Opciones</td>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($datos as $key): 
												$estado=0;
												$texto="Ocultar";
												if($key->estado==0)
												{
													$estado=1;
													$texto="Visualizar";
												}
												?>
												<tr >
													<td style="width: 60%;">
														<div class="table-list-title">
															<h3><a href="detalleoferta/2" title=""><?php echo $key->titulo;?></a></h3>
															<span><?php echo $key->tags;?></span><br>
														</div>
													</td>
													 <td style="width: 20%;">
													 	 <form class="text-center">
													 	 	<a href="noticiaestado/<?php echo $key->id;?>/<?php echo $estado;?>" style="float: left;padding: 0px;padding: 3px;font-size: 10px;padding-right: 5px;padding-left: 5px;" class="btn btn-xs btn-primary"><?php echo $texto;?></a>
													 	 </form>
													 </td>
														<td style="text-align:right;width: 20%;"><ul class="action_job"><li><span>Ver</span><a href="noticias/<?php echo $key->id;?>" title=""><i class="la la-eye"></i><!-- a--></a></li><li></li><li><span>Editar</span><a data-toggle="modal" data-target="#modal_alias" href="panelnoticias/<?php echo $key->id;?>" title=""><i class="la la-pencil" onclick="set_id(36)"></i></a></li> <li><span>Eliminar</span><a href="noticiadel/<?php echo $key->id;?>" title=""><i class="la la-trash-o"></i></a></li></ul></td>
													 
												</tr>
												<?php endforeach ?>
											</tbody>
										</table> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include("local/resources/views/includes/aside_right_administrator.php");?>
		<?php include("local/resources/views/includes/general_footer.php");?>
		<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
		<script src="local/resources/views/js/script.js" type="text/javascript"></script>
		<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
		<script type="text/javascript">
			$( document ).ready(function() {
			
			});
		</script>
	</body>
</html>