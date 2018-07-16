<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Jobbers Argentina
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="CreativeLayers">
    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="local/resources/views/css/icons.css">
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
  </head>
  <body>
    <?php include('local/resources/views/includes/general_header.php');?>
    <?php include('local/resources/views/includes/general_header_responsive.php');?>
    <section class="overlape mt-responsive">
      <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(local/resources/views/images/fondo_candidatos.jpg) repeat scroll 10% 422.28px transparent;" class="parallax scrolly-invisible no-parallax">
        </div>
        <!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="inner-header">
                <h3 style="font-size: 36px;">Jobbers tiene los mejores perfiles
                </h3>
                <h3 style="font-size: 22px;margin-top: -40px;">para los mejores puestos de trabajo.
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="block no-padding">
        <div class="container">
          <div class="row no-gape">
            <aside class="col-lg-3 column border-right">
              <form id="form_filtros" method="POST" action="candidatos">
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
               
                  <div class="widget" >
                    <h3 class="sb-title open">Habilidades</h3>
                    <div class="specialism_widget" style="">
                      <!-- Search Widget -->
                      
                      <div class="simple-checkbox scrollbar ss-container"  >
                        <div class="ss-wrapper">
                          <div class="ss-content"> 
                            <?php
                            $aux=array();
                            ?>
                            <?php foreach ($datos_habilidades as $key): ?>
                            <?php if (in_array($key->descripcion, $aux)!=1): ?>
                            <p>
                              <input onclick="filtros_set()" type="checkbox" name="habilidad[]" id="as_habilidad_<?php echo str_replace(' ','_',$key->descripcion);?>" value="<?php echo $key->descripcion;?>">
                              <label id="label_as_habilidad_<?php echo str_replace(' ','_',$key->descripcion);?>" for="as_habilidad_<?php echo $key->descripcion;?>"><?php echo $key->descripcion;?> (<?php echo $key->cantidad;?>)</label>
                            </p>
                            <?php array_push($aux, $key->descripcion);?>
                            <?php endif ?>
                            <?php endforeach ?>
                          </div>
                        </div>
                        <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                      </div>
                    </div>
                  </div>

                  <div class="widget" >
                    <h3 class="sb-title open">Provincia</h3>
                    <div class="specialism_widget" style="">
                      <div class="simple-checkbox scrollbar ss-container"  >
                        <div class="ss-wrapper">
                          <div class="ss-content">
                            <?php
                            $aux=array();
                            ?>
                            <?php foreach ($datos_provincia as $key): ?>
                            <?php if (in_array($key->provincia, $aux)!=1): ?>
                            <p>
                              <input onclick="filtros_set()" type="checkbox" name="provincias[]" id="as_provincia_<?php echo $key->id_provincia;?>" value="<?php echo $key->id_provincia;?>">
                              <label for="as_provincia_<?php echo $key->id_provincia;?>" id="label_as_provincia_<?php echo $key->id_provincia;?>" ><?php echo $key->provincia;?> (<?php echo $key->cantidad;?>)</label>
                            </p>
                            <?php array_push($aux, $key->provincia);?>
                            <?php endif ?>
                            <?php endforeach ?>
                          </div>
                        </div>
                        <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                      </div>
                    </div>
                  </div>

                  <div class="widget" >
                    <h3 class="sb-title open">Localidades</h3>
                    <div class="specialism_widget" style="">
                      <div class="simple-checkbox scrollbar ss-container"  >
                        <div class="ss-wrapper">
                          <div class="ss-content">
                            <?php
                            $aux=array();
                            ?>
                            <?php foreach ($datos_localidades as $key): ?>
                            <?php if (in_array($key->localidad, $aux)!=1): ?>
                            <p>
                              <input onclick="filtros_set()" type="checkbox" name="localidad[]" id="as_localidad_<?php echo $key->id_localidad;?>" value="<?php echo $key->id_localidad;?>">
                              <label for="as_localidad_<?php echo $key->id_localidad;?>" id="label_as_localidad_<?php echo $key->id_localidad;?>"><?php echo $key->localidad;?> (<?php echo $key->cantidad;?>)</label>
                            </p>
                            <?php array_push($aux, $key->localidad);?>
                            <?php endif ?>
                            <?php endforeach ?>
                          </div>
                        </div>
                        <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                      </div>
                    </div>
                  </div> 

                  <div class="widget" >
                    <h3 class="sb-title open">Disponibilidad</h3>
                    <div class="specialism_widget" style="">
                      <!-- Search Widget -->
                      <div class="simple-checkbox scrollbar ss-container"  >
                        <div class="ss-wrapper">
                          <div class="ss-content">
                            
                            <?php
                            foreach ($datos_disponibilidad as $key):?>
                            <p>
                              <input onclick="filtros_set()" value="<?php echo $key->id_jornada?>" type="checkbox" name="disponibilidad[]" id="disponibilidad_<?php echo $key->id_jornada?>">

                              <label for="disponibilidad_<?php echo $key->id_jornada?>" id="label_disponibilidad_<?php echo $key->id_jornada?>"><?php echo $key->nombre;?> (<?php echo $key->cantidad;?>)</label>
                            </p>
                            <?php endforeach?>
                            
                          </div>
                        </div>
                        <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                      </div>
                    </div>
                  </div>

                  <div class="widget"  >
                    <h3 class="sb-title open">Idiomas</h3>
                    <div class="specialism_widget" style="">
                      <!-- Search Widget -->
                      <div class="simple-checkbox scrollbar ss-container"  >
                        <div class="ss-wrapper">
                          <div class="ss-content">
                            
                            <?php foreach ($datos_idioma as $key): ?>
                            <p>
                              <input onclick="filtros_set()" value="<?php echo $key->descripcion?>" type="checkbox" name="idiomas[]" id="as_idiomas_<?php echo str_replace(' ','_',$key->descripcion);?>">

                              <label for="as_idiomas_<?php echo str_replace(' ','_',$key->descripcion);?>" id="label_as_idiomas_<?php echo str_replace(' ','_',$key->descripcion);?>"><?php echo $key->descripcion;?> (<?php echo $key->cantidad?>)</label>
                            </p>
                            <?php endforeach ?>
                            
                          </div>
                        </div>
                        <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                      </div>
                    </div>
                  </div> 
                  <div class="widget"   >
                    <h3 class="sb-title open">Género</h3>
                    <div class="specialism_widget" style="">
                      <!-- Search Widget -->
                      <div class="simple-checkbox scrollbar ss-container"  >
                        <div class="ss-wrapper">
                          <div class="ss-content"> 
                              <?php foreach ($datos_generos as $key): ?>
                              <p>
                                <input value="<?php echo $key->id_sexo?>" onclick="filtros_set()" type="checkbox" name="sexo[]" id="as_genero_<?php echo $key->id_sexo?>">
                                <label for="as_genero_<?php echo $key->id_sexo?>" id="label_as_genero_<?php echo $key->id_sexo?>"><?php echo $key->descripcion;?>  (<?php echo $key->cantidad?>)</label>
                              </p>
                              <?php endforeach ?> 
                          </div>
                        </div>
                        <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="widget" >
                    <h3 class="sb-title open">Salarios</h3>
                    <div class="specialism_widget" style="">
                      <!-- Search Widget -->
                      <div class="simple-checkbox scrollbar ss-container"  >
                        <div class="ss-wrapper">
                          <div class="ss-content"> 
                              <?php foreach ($datos_salarios as $key): ?>
                              <p>
                                <input value="<?php echo $key->id_remuneracion_pre?>" onclick="filtros_set()" type="checkbox" name="salarios[]" id="as_salarios_<?php echo $key->id_remuneracion_pre?>">
                                <label  for="as_salarios_<?php echo $key->id_remuneracion_pre?>" id="label_as_salarios_<?php echo $key->id_remuneracion_pre?>"><?php echo $key->salario;?>  (<?php echo $key->cantidad?>)</label>
                              </p>
                              <?php endforeach ?> 
                          </div>
                        </div>
                        <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="widget" >
                    <h3 class="sb-title open">Cargos</h3>
                    <div class="specialism_widget" style="">
                      <!-- Search Widget -->
                      <div class="simple-checkbox scrollbar ss-container"  >
                        <div class="ss-wrapper">
                          <div class="ss-content"> 
                              <?php foreach ($datos_cargos as $key): ?>
                              <p>
                                <input value="<?php echo $key->descripcion?>" onclick="filtros_set()" class="control_seleccionado" type="checkbox" name="cargos[]" id="as_cargos_<?php echo str_replace(' ','_',$key->descripcion);?>">
                                <label  for="as_cargos_<?php echo str_replace(' ','_',$key->descripcion);?>" id="label_as_cargos_<?php echo str_replace(' ','_',$key->descripcion);?>"><?php echo $key->descripcion;?> (<?php echo $key->cantidad?>)</label>
                              </p>
                              <?php endforeach ?> 
                          </div>
                        </div>
                        <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                      </div>
                    </div>
                  </div> 
              </form>
               
              <div class="widget">
                <div class="subscribe_widget">
                  <h3>Algún problema?</h3>
                  <p>Escribenos en <a class="status" href="contacto">contacto jobbers</a> y te ayudaremos con lo que necesites.</p>
                </div>
              </div>
            </aside>
            <div class="col-lg-9 column">
              <div class="modrn-joblist">
                <div class="tags-bar" id="filtros">
                  
                  <div class="action-tags">
                    <a title="" onClick="limpiar()"><i class="la la-trash-o"></i> Quitar filtros</a>
                  </div>
                </div>
                <!-- Tags Bar -->
                <div class="filterbar">
                  <h5><?php echo $total_datos_candidatos;?> candidatos</h5>
                </div>
              </div>
             
              
              <!-- MOdern Job LIst -->
              <div class="job-list-modern">
                <div class="job-listings-sec">
                  
                  <?php
                  //Ejemplo
                  ?>
                  <?php
                  foreach ($datos_candidatos as $key):
                  $imagen="uploads/empresa.jpg";
                  $nombre="Sin nombre";
                  $direccion=$key->localidades." / ".$key->direccion;
                  $disponibilidad='<span class="job-is ft">'.$key->disponibilidad.'</span>';
                  if($key->foto!="")
                  {
                  $imagen='uploads/'.$key->foto;
                  }
                  if($key->nombre!="")
                  {
                  $nombre=$key->nombre;
                  }
                  if($key->localidades=="" && $key->direccion=="")
                  {
                  $direccion="Sin dirección";
                  }
                  if($key->disponibilidad=="")
                  {
                  $disponibilidad="";
                  }
                  ?>
                  <div class="job-listing wtabs">
                    <div class="job-title-sec">
                      <div class="c-logo"> <img style="width: 98px;" src="<?php echo $imagen;?>" alt=""> </div>
                      <h3><a href="candidato/<?php echo $key->id;?>" title=""><?php echo $nombre;?></a></h3>
                      <span><i class="la la-map-marker"></i><?php echo $direccion;?></span>
                      <div class="job-lctn"></div>
                    </div>
                    <div class="job-style-bx">
                      <?php echo $disponibilidad;?>
                      <i></i>
                    </div>
                  </div>
                  <?php endforeach ?>

                  <div class="pagination">
                    <ul>
                      <?php  
                        if (isset($_GET['pag'])) {
                          if ($_GET['pag'] != 1) {
                            $previous = intval($_GET['pag']) - 1;
                          } else {
                            $previous = 1;
                          }
                        } else {
                          $previous = 1;
                        }
                      ?>
                      <li class="prev"><a href="candidatos?pag=<?= $previous ?>"><i class="la la-long-arrow-left"></i> Prev</a></li>
                      <!-- <li><a href="">1</a></li>
                      <li class="active"><a href="">2</a></li>
                      <li><a href="">3</a></li>
                      <li><span class="delimeter">...</span></li>
                      <li><a href="">14</a></li> -->
                      <?php for ($i=0;$i<$paginas;$i++): ?>
                        <?php $active = isset($_GET['pag']) ? ($i+1) == $_GET['pag'] ? 'active' : "" : ($i+1) == 1 ? 'active' : "" ?>
                        <li class="<?= $active ?>"><a href="candidatos?pag=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                      <?php endfor; ?>
                      <?php  
                        if (isset($_GET['pag'])) {
                          if ($_GET['pag'] != $paginas) {
                            $next = intval($_GET['pag']) + 1;
                          } else {
                            $next = $paginas;
                          }
                        } else {
                          $next = 2;
                        }
                      ?>
                      <li class="next"><a href="candidatos?pag=<?= $next ?>">Next <i class="la la-long-arrow-right"></i></a></li>
                    </ul>
                  </div> <!-- Pagination -->
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include("local/resources/views/includes/general_footer.php");?>
    <?php include("local/resources/views/includes/login_register_modal.php");?>
    <script src="local/resources/views/js/jquery.min.js" type="text/javascript">
    </script>
    <script src="local/resources/views/js/script.js" type="text/javascript">
    </script>
    <script src="local/resources/views/js/select-chosen.js" type="text/javascript">
    </script>
    <script src="local/resources/views/plugins/notify.js" type="text/javascript"></script>
    <style type="text/css">
    .ss-content
    {
    overflow-x: hidden;
    }
    </style>
    <script type="text/javascript">
      function filtros_set_var(id,descripcion)
      { 
        $("#filtros").append('<span>'+descripcion+'</span>'); 
      }
      function filtros_set()
      {  
        $("#form_filtros").submit()
      }
      function set_check(parametro)
      {
        $("#"+parametro).attr('checked', 'true');
      }
      function limpiar()
      {
         
        $('input[type="checkbox"]').prop('checked' , false);
        $("#form_filtros").submit()
      }
    </script>
     <?php 
              if(isset($variables['habilidad']) && count($variables['habilidad']) > 0)
              {
                foreach ($variables['habilidad'] as $key) { 
                  echo '';
                }
              } 
              ?>
 
      <?php if (isset($variables['habilidad']) && count($variables['habilidad'])>0): ?>
           <?php foreach ($variables['habilidad'] as $key): ?>
           <script>filtros_set_var('as_habilidad_<?php echo str_replace(' ','_',$key);?>',$("#label_as_habilidad_<?php echo str_replace(' ','_',$key);?>").html());</script>
           <script>set_check("as_habilidad_<?php echo str_replace(' ','_',$key);?>");</script>
         <?php endforeach ?>
      <?php endif ?>

      <?php if (isset($variables['provincias']) && count($variables['provincias'])>0): ?>
           <?php foreach ($variables['provincias'] as $key): ?>
           <script>filtros_set_var(<?php echo $key;?>,$("#label_as_provincia_"+<?php echo $key;?>).html());</script>
           <script>set_check("as_provincia_"+<?php echo $key;?>);</script>
         <?php endforeach ?>
      <?php endif ?>

      <?php if (isset($variables['localidad']) && count($variables['localidad'])>0): ?>
           <?php foreach ($variables['localidad'] as $key): ?>
           <script>filtros_set_var(<?php echo $key;?>,$("#label_as_localidad_"+<?php echo $key;?>).html());</script>
           <script>set_check("as_localidad_"+<?php echo $key;?>);</script>
         <?php endforeach ?>
      <?php endif ?>

      <?php if (isset($variables['idiomas']) && count($variables['idiomas'])>0): ?>
           <?php foreach ($variables['idiomas'] as $key): ?>
           <script>filtros_set_var('<?php echo str_replace(' ','_',$key);?>',$("#label_as_idiomas_<?php echo str_replace(' ','_',$key);?>").html());</script>
           <script>set_check("as_idiomas_<?php echo str_replace(' ','_',$key);?>");</script>
         <?php endforeach ?>
      <?php endif ?>

       <?php if (isset($variables['sexo']) && count($variables['sexo'])>0): ?>
           <?php foreach ($variables['sexo'] as $key): ?>
           <script>filtros_set_var(<?php echo $key;?>,$("#label_as_genero_"+<?php echo $key;?>).html());</script>
           <script>set_check("as_genero_"+<?php echo $key;?>);</script>
         <?php endforeach ?>
      <?php endif ?>

      <?php if (isset($variables['cargos']) && count($variables['cargos'])>0): ?>
           <?php foreach ($variables['cargos'] as $key): ?>
           <script>filtros_set_var('<?php echo str_replace(' ','_',$key);?>',$("#label_as_cargos_<?php echo str_replace(' ','_',$key);?>").html());</script>
           <script>set_check("as_cargos_<?php echo str_replace(' ','_',$key);?>");</script>
         <?php endforeach ?>
      <?php endif ?>

      <?php if (isset($variables['salarios']) && count($variables['salarios'])>0): ?>
           <?php foreach ($variables['salarios'] as $key): ?>
           <script>filtros_set_var(<?php echo $key;?>,$("#label_as_salarios_"+<?php echo $key;?>).html());</script>
           <script>set_check("as_salarios_"+<?php echo $key;?>);</script>
         <?php endforeach ?>
      <?php endif ?>

       <?php if (isset($variables['disponibilidad']) && count($variables['disponibilidad'])>0): ?>
           <?php foreach ($variables['disponibilidad'] as $key): ?>
           <script>filtros_set_var(<?php echo $key;?>,$("#label_disponibilidad_"+<?php echo $key;?>).html());</script>
           <script>set_check("disponibilidad_"+<?php echo $key;?>);</script>
         <?php endforeach ?>
      <?php endif ?> 
    <script type="text/javascript">
       function notificacion(mensaje)
        {
            $.notify(mensaje, {
              className:"info",
              globalPosition: "bottom right"
              });
        }
    </script>
    
    <?php if (isset($_GET['result'])): ?>
      <script type="text/javascript">notificacion('<?php echo $_GET['result'];?>');</script>
    <?php endif ?>
    <?php 
?>
  </body>
</html>