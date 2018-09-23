<?php
$mi_tokken=csrf_token();
?>
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
  <meta name="csrf-token" content="<?php echo $mi_tokken;?>">
  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="local/resources/views/css/icons.css">
  <link rel="stylesheet" href="local/resources/views/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
  <link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
  <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
  <link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
  <?php include('local/resources/views/includes/google_analitycs.php');?>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-1968505410020323",
      enable_page_level_ads: true
    });
  </script>
  <?php include("local/resources/views/includes/chat_soporte.php");?>
</head>

<body>
  <?php include('local/resources/views/includes/general_header.php');?>
  <?php include('local/resources/views/includes/general_header_responsive.php');?>
  <section class="section-offers">
    <div class="block no-padding back-offers">
      <div class="container">
        <div class="row no-gape">
          <div class="btn-showfilter">
            <button class="btn btn-primary" id="showFilters">Mostrar filtros <i class="fa fa-filter"></i></button>
          </div>


          <aside class="col-lg-3 column border-right" id="side-offers">
            <form action="ofertas" method="POST" id="form_filter">
              <input type="hidden" name="_token" value="<?php echo csrf_token();?>">


              <div class="widget filter-offer">
                <h3 class="sb-title open">Antiguedad
                </h3>
                <div class="type_widget" style="">
                  <p class="flchek">
                    <input type="radio" onclick="filter()" name="antiguedad" id="ant_1" value="1">
                    <label id="label_ant_1" for="ant_1">Todo
                    </label> (<?= $antiguedad[0]->cantidad_todo ?>)</p>
                  <br>
                  <p class="flchek">
                    <input type="radio" onclick="filter()" name="antiguedad" id="ant_2" value="2">
                    <label id="label_ant_2" for="ant_2">Hoy
                    </label> (<?= $antiguedad[0]->cantidad_hoy ?>)</p>
                  <br>
                  <p class="flchek">
                    <input type="radio" onclick="filter()" name="antiguedad" id="ant_3" value="3">
                    <label id="label_ant_3" for="ant_3">Última semana
                    </label> (<?= $antiguedad[0]->cantidad_last_week ?>)</p>
                  <br>
                  <p class="flchek">
                    <input type="radio" onclick="filter()" name="antiguedad" id="ant_4" value="4">
                    <label id="label_ant_4" for="ant_4">Últimos 30 días
                    </label> (<?= $antiguedad[0]->cantidad_last_thirty_days ?>)</p>
                  <br>
                </div>
              </div>
              <div class="widget filter-offer">
                <h3 class="sb-title open">Provincia
                </h3>
                <div class="type_widget" style="">
                  <?php $contador = 0 ?>
                  <?php foreach ($provincia as $key): ?>

                  <p class="flchek">
                    <input type="checkbox" onclick="filter()" name="provincias[]" id="prov_<?= $key->id_provincia ?>" value="<?= $key->id_provincia ?>">
                    <label id="label_prov_<?= $key->id_provincia ?>" for="prov_<?= $key->id_provincia ?>">
                      <?= $key->provincia ?>
                    </label> (<?= $key->cantidad ?>)
                  </p>
                  <?php  
                      if ($contador>10){break;}
                      $contador++;
                    ?>
                  <?php endforeach ?>
                </div>
              </div>
              <div class="widget filter-offer" style="height: 300px;overflow-y: scroll;">
                <h3 class="sb-title open">Localidad
                </h3>
                <div class="type_widget" 
                  <?php function buscar_localidad($parametro,$bandera,$arreglo)
                  {
                      if($bandera==1)
                      {
                         foreach ($arreglo as $key) {
                          if($parametro==$key->localidad){return true;die();}
                        }
                      }
                      return false; 
                  }?>
                  
                  <?php $contador=0 ?>
                    <?php foreach ($localidad as $key): ?> 
                      <?php if (buscar_localidad($key->localidad,1,$total_provincias)==true): ?>
                            <p class="flchek">
                              <input type="checkbox" onclick="filter()" name="localidades[]" id="loc_<?= $key->id_localidad ?>" value="<?= $key->id_localidad ?>">
                              <label id="label_loc_<?= $key->id_localidad ?>" for="loc_<?= $key->id_localidad ?>">
                                  <?=$key->localidad ?>
                              </label> (
                              <?=$key->cantidad ?>)
                          </p>
                        <?php endif ?> 
                    <?php endforeach ?>
                   

                   <?php foreach ($localidad as $key): ?> 
                      <?php if (buscar_localidad($key->localidad,1,$total_provincias)==false): ?>
                            <p class="flchek">
                              <input type="checkbox" onclick="filter()" name="localidades[]" id="loc_<?= $key->id_localidad ?>" value="<?= $key->id_localidad ?>">
                              <label id="label_loc_<?= $key->id_localidad ?>" for="loc_<?= $key->id_localidad ?>">
                                  <?=$key->localidad ?>
                              </label> (
                              <?=$key->cantidad ?>)
                          </p>
                        <?php endif ?> 
                    <?php endforeach ?>
                </div>
              </div>
              <?php if ($planes_estado): ?>
              <div class="widget filter-offer" style="height: 300px;overflow-y: scroll;">
                <h3 class="sb-title open">Planes de Estado
                </h3>
                <div class="type_widget">
                  <?php foreach ($planes_estado as $plan): ?>
                      <p class="flchek">
                        <input type="checkbox" onclick="filter()" name="planes_estado[]" id="plan_<?= $plan->id_plan_estado ?>" value="<?= $plan->id_plan_estado ?>">
                        <label id="label_plan_<?= $plan->id_plan_estado ?>" for="plan_<?= $plan->id_plan_estado ?>">
                            <?=$plan->plan ?>
                        </label> (
                        <?=$plan->cantidad ?>)
                    </p>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php endif; ?>
              <div class="widget filter-offer">
                <h3 class="sb-title open">Disponibilidad
                </h3>
                <div class="type_widget" style="">
                  <?php foreach ($disponibilidad as $key): ?>
                  <p class="flchek">
                    <input type="checkbox" onclick="filter()" name="disponibilidades[]" id="disp_<?= $key->id_disponibilidad ?>" value="<?= $key->id_disponibilidad ?>">
                    <label id="label_disp_<?= $key->id_disponibilidad ?>" for="disp_<?= $key->id_disponibilidad ?>">
                      <?= $key->nombre ?>
                    </label> (<?= $key->cantidad ?>)
                  </p>
                  <?php endforeach ?>
                </div>
              </div>

              <div class="widget filter-offer" style="height: 300px;overflow-y: scroll;">
                <h3 class="sb-title active">Área
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                    <?php  
                        $contador=0;
                        foreach($area as $key):
                      ?>
                    <p class="flchek" style="overflow-wrap: break-word">
                      <input type="checkbox" onclick="filter()" name="areas[]" id="area_<?= $key->id_area ?>" value="<?= $key->id_area ?>">
                      <label id="label_area_<?= $key->id_area ?>" for="area_<?= $key->id_area ?>">
                        <?= $key->nombre ?> (<?= $key->cantidad ?>)
                      </label>
                    </p> 
                     <?php endforeach ?>
                  </div>
                </div>
              </div>

              <div class="widget filter-offer" style="height: 300px;overflow-y: scroll;">
                <h3 class="sb-title active">Sector
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                    <?php  
                        $contador=0;
                        foreach($sector as $key):
                      ?>
                    <p class="flchek">
                      <input type="checkbox" onclick="filter()" name="sectores[]" id="sect_<?= $key->id_sector ?>" value="<?= $key->id_sector ?>">
                      <label id="label_sect_<?= $key->id_sector ?>" for="sect_<?= $key->id_sector ?>">
                        <?= $key->nombre ?> (<?= $key->cantidad ?>)
                      </label> 
                    </p> 
                      <?php endforeach ?>
                  </div>
                </div>
              </div>

              <div class="widget filter-offer" style="display: none">
                <h3 class="sb-title active">Oferta salarial
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                    <?php
                        $contador=0;
                        foreach($salario as $key):
                      ?>
                      <p class="flchek">
                        <input type="checkbox" onclick="filter()" name="salarios[]" id="sal_<?= $key->id_salario ?>" value="<?= $key->id_salario ?>">
                        <label id="label_sal_<?= $key->id_salario ?>" for="sal_<?= $key->id_salario ?>">
                          <?= $key->salario ?>
                        </label> (<?= $key->cantidad ?>)
                      </p>
                      <?php
                        if($contador>10){break;}
                        $contador++;
                        endforeach;
                      ?>
                  </div>
                </div>
              </div>

              <div class="widget filter-offer" style="display: none">
                <h3 class="sb-title active">Experiencia
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                    <?php 
                        foreach($experiencia as $key): 
                        $datos="Sin experiencia";
                        if($key->descripcion!="Sin experiencia"){$datos=$key->descripcion." Años";}
                      ?>
                    <p class="flchek">
                      <input type="checkbox" onclick="filter()" name="experiencias[]" id="exp_<?= $key->id_experiencia ?>" value="<?= $key->id_experiencia ?>">
                      <label id="label_exp_<?= $key->id_experiencia ?>" for="exp_<?= $key->id_experiencia ?>">
                        <?= $datos ?>
                      </label> (<?= $key->cantidad ?>)
                    </p>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>
              <div class="widget filter-offer" style="display: none">
                <h3 class="sb-title active">Género
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                    <?php foreach($genero as $key): ?>

                    <p class="flchek">
                      <input type="checkbox" onclick="filter()" name="generos[]" id="gen_<?= $key->id_genero ?>" value="<?= $key->id_genero ?>">
                      <label id="label_gen_<?= $key->id_genero ?>" for="gen_<?= $key->id_genero ?>">
                        <?= $key->descripcion ?>
                      </label> (<?= $key->cantidad ?>)
                    </p>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>
            </form>
          </aside>
          <div class="col-lg-9 column" id="offers">
          <!-- Carousel de publicidad -->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="display: none;">

              <!-- Wrapper for slides -->
              <div class="carousel-inner carousel-height" role="listbox">

                <div class="item active">
                  <img src="https://via.placeholder.com/900x350" alt="..." class="carousel-height" style="width: 100%;">
                  <div class="carousel-caption">
                    <h3>Jobbers Argentina</h3>
                    <p>Publicidad</p>
                  </div>
                </div>

                <div class="item">
                  <img src="https://via.placeholder.com/900x350" alt="..." class="carousel-height" style="width: 100%;">
                  <div class="carousel-caption">
                    <h3>Jobbers Argentina</h3>
                    <p>Publicidad</p>
                  </div>
                </div>
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <div class="modrn-joblist">

              <!-- Tags Bar -->
              <div class="filterbar">
                <!-- <div class="sortby-sec">
                    <span>Filtrar
                    </span>
                    <select data-placeholder="Most Recent" class="chosen" style="display: none;">
                      <option>Sin filtro
                      </option>
                      <option>Recientes
                      </option>
                      <option>Populares
                      </option>
                      <option>Mis Favoritas
                      </option>
                    </select>
                    
                  </div> -->

                <div class="tags-bar" id="filtros">

                  <div class="action-tags">
                    <a title="" onClick="limpiar()">
                      <i class="la la-trash-o"></i> Quitar filtros</a>
                  </div>
                </div>

                <h5>
                  <?= $totalPublicaciones ?> Ofertas de trabajo
                </h5>
              </div>
            </div>
            <?php 
          $bandera_favorito=0;
          if(session()->get('tipo_usuario')>0)
              {
                $bandera_favorito=1;
              }
              ?>
            <div class="job-list-modern">
              <div class="job-listings-sec">
                <span id="url_'.$key->id.'" style="display:none;">detalleoferta/'.$key->id.'</span>

                

                <?php foreach ($publicaciones as $pub): ?>

                  <?php if ($pub->id_plan == 2): ?>

                        <?php if ($pub->modalidad == 1): ?>

                            <!-- Oferta recomendada -->
                            <a href="detalleoferta/<?= $pub->id ?>"><div class="job-listing wtabs borde-recomend" style="background: url(local/resources/views/images/back-ofertas.jpg); background-size: cover">
                              <div class="recomend"><span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> Oferta destacada</span></div>
                                <div class="job-title-sec container-desc-oferta">
                                <div class="row">
                                  <div class="col-6">
                                    <h5 class="title-recom"><?= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->nombre : 'Confidencial' ?></h5>
                                    <p class="time-pub" style="margin-left: 20px;">Publicaciones: <?= $pub->q_ofertas ?></p>
                                    <?php if ($pub->facebook || $pub->linkedin || $pub->twitter): ?>
                                    <p class="time-pub" style="margin-left: 20px; margin-bottom: 20px">
                                      Redes:
                                          <?php if ($pub->facebook): ?> 
                                          <a href="<?= $pub->facebook ?>"><span class="container-fb" style="float: inherit"><i class="fa fa-facebook" style="padding:6px; margin-left: 0px;"></i></span></a>
                                          <?php endif; ?>
                                          <?php if ($pub->linkedin): ?>
                                          <a href="<?= $pub->linkedin ?>"><span class="container-in" style="float: inherit"><i class="fa fa-linkedin mr-0" style="padding:4px; margin-left: 0px; font-size: 13px;"></i></span></a>
                                          <?php endif; ?>
                                          <?php if ($pub->twitter): ?>
                                          <a href="<?= $pub->twitter ?>"><span class="container-tw" style="float: inherit"><i class="fa fa-twitter mr-0" style="padding:3px; margin-left: 0px;"></i></span></a><a href="#" class="jump mobile-inline"><br></a>
                                          <?php endif; ?>
                                    </p>
                                    <?php endif; ?>
                                  </div>
                                  <div class="col-6">
                                    <img src="<?= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->imagen == null ? asset('local/resources/views/images/company-avatar.png') : asset('uploads/'.$pub->imagen) : asset('local/resources/views/images/company-avatar.png') ?>" class="img-fluid" width="80" alt="">
                                    <img src="<?= asset('local/resources/views/images/programas') ?>/<?= $pub->plan_estado ?>.png" alt="" class="img-fluid img-oferta">
                                    
                                  </div>
                                  <?php if ($pub->plan_estado): ?>
                                  <!-- <div class="col-12">
                                    <img src="<?= asset('local/resources/views/images/programas') ?>/<?= $pub->plan_estado ?>.png" alt="" class="img-fluid img-oferta">
                                  </div> -->
                                  <?php endif; ?>
                                </div>
                              
                                <h5 class="title-recom"><?= $pub->titulo ?> <!-- <a href="#"><span style="float: right; color: #bbbbbb; font-size: 15px; font-weight: 400;"><sup>Denunciar</sup> <i class="fa fa-exclamation-circle exclamation-icon"></i></span></a> --></h5>
                                  <p class="time-pub"><i class="fa fa-calendar" ></i> Publicada <?= $pub->fecha_pub ?> a las <?= $pub->hora_pub ?> - Termina: <?= $pub->fecha_venc ?></p>
                                  <p class="desc-oferta"><?= strlen($pub->descripcion) > 350 ? substr(strip_tags($pub->descripcion), 0, 350) . "..." : strip_tags($pub->descripcion) ?> </p>
                                  <br>
                                  <div class="job-lctn">
                                    <?= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->nombre : 'Confidencial' ?>
                                    <!--
                                    &nbsp;
                                    <i class="fa fa-star gold"></i>
                                    <i class="fa fa-star gold"></i>
                                    <i class="fa fa-star gold"></i>
                                    <i class="fa fa-star gold"></i>
                                    <i class="fa fa-star gold"></i>
                                    &nbsp;-->
                                    <i class="fa fa-eye"></i><?= $pub->vistos ?>&nbsp;
                                    <!-- <i class="fa fa-heart red"></i>3&nbsp; -->
                                    <i class="fa fa-clock-o mr-0"></i>
                                    <span class="disponibilidad"><?= $pub->disponibilidad ?></span>&nbsp;
                                    <?php if ($pub->discapacidad == 'SI'): ?>
                                    <i class="fa fa-wheelchair blue"></i>
                                    <?php endif; ?>
                              
                                    <?php if ($pub->facebook || $pub->linkedin || $pub->twitter): ?>
                                    <div class="desk" style="float: right">
                                      <?php if ($pub->facebook): ?> 
                                      <a href="<?= $pub->facebook ?>"><span class="container-fb"><i class="fa fa-facebook"></i></span></a>
                                      <?php endif; ?>
                                      <?php if ($pub->linkedin): ?>
                                      <a href="<?= $pub->linkedin ?>"><span class="container-in"><i class="fa fa-linkedin mr-0"></i></span></a>
                                      <?php endif; ?>
                                      <?php if ($pub->twitter): ?>
                                      <a href="<?= $pub->twitter ?>"><span class="container-tw"><i class="fa fa-twitter mr-0"></i></span></a>
                                      <?php endif; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if ($pub->facebook || $pub->linkedin || $pub->twitter): ?>
                                    <p class="container-media mobile" style="margin-bottom: 0;">
                                      <?php if ($pub->facebook): ?> 
                                      <a href="<?= $pub->facebook ?>"><span class="container-fb" style="float: inherit"><i class="fa fa-facebook" style="vertical-align: text-top"></i></span></a>
                                      <?php endif; ?>
                                      <?php if ($pub->linkedin): ?>
                                      <a href="<?= $pub->linkedin ?>"><span class="container-in" style="float: inherit"><i class="fa fa-linkedin mr-0" style="padding:4px; margin-left: 0px; font-size: 13px; vertical-align: super;"></i></span></a>
                                      <?php endif; ?>
                                      <?php if ($pub->twitter): ?>
                                      <a href="<?= $pub->twitter ?>"><span class="container-tw" style="float: inherit"><i class="fa fa-twitter mr-0" style="padding:3px; margin-left: 0px; vertical-align: text-bottom;"></i></span></a>
                                      <?php endif; ?>
                                    </p>
                                    <?php endif; ?>
                                  </div>
                                </div>
                                <div class="job-style-bx container-img-oferta desk">
                                  <img src="local/resources/views/images/award.png" class="img-fluid img-oferta" alt="">
                                </div>
                              </div></a>
                        <?php else: ?>

                          <!-- CURSO GRATIS -->
                          <span id="url_'.$key->id.'" style="display:none;">detalleoferta/'.$key->id.'</span>
                          <div class="job-listing wtabs borde-urgente">
                          <div class="urgente"><span>Cursos</span></div>
                            <div class="job-title-sec container-desc-curso" ;>
                              <h3>
                                <a href="<?= url('detalle_curso', $pub->id) ?>" title="">
                                  <div style="font-size:22px; color: #494949" id="descripcion_'.$key->id.'"><?= $pub->titulo ?> <span class="link-urgente"><?= $pub->nombre ?></span></div>
                                </a>
                              </h3>
                              <p><span style="color: #555555; line-height: 18px; color: #494949">
                                <?= strlen($pub->descripcion) > 350 ? substr(strip_tags($pub->descripcion), 0, 350) . "..." : strip_tags($pub->descripcion) ?>
                                </span></p>
                              <br>
                            </div>
                          </div>
                          <a href=""></a>



                        <?php endif; ?>

                  <?php else: ?>

                <!-- Oferta normal -->
                <a href="detalleoferta/<?= $pub->id ?>"><div class="job-listing wtabs">
                  <div class="mobile">
                      <img src="<?= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->imagen == null ? asset('local/resources/views/images/company-avatar.png') : asset('uploads/'.$pub->imagen) : asset('local/resources/views/images/company-avatar.png') ?>" class="img-fluid img-oferta" alt="">
                      <?php if ($pub->plan_estado): ?>
                      <img src="<?= asset('local/resources/views/images/programas') ?>/<?= $pub->plan_estado ?>.png" alt="" class="img-fluid img-oferta">
                      <?php endif; ?>
                        <p class="nombre-img"><?php //= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->nombre : 'Confidencial' ?></p>
                      </div>
                    <div class="job-title-sec container-desc-oferta">
                    <h5 class="title-recom"><?= $pub->titulo ?> <!-- <a href="#"><span style="float: right; color: #bbbbbb; font-size: 15px; font-weight: 400;"><sup>Denunciar</sup> <i class="fa fa-exclamation-circle exclamation-icon"></i></span></a> --></h5>
                      <p class="time-pub"><i class="fa fa-calendar"></i> Publicada <?= $pub->fecha_pub ?> a las <?= $pub->hora_pub ?> - Termina: <?= $pub->fecha_venc ?></p>
                      <p class="desc-oferta"><?= strlen($pub->descripcion) > 350 ? substr(strip_tags($pub->descripcion), 0, 350) . "..." : strip_tags($pub->descripcion) ?> </p>
                      <br>
                      <div class="job-lctn">
                        <?= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->nombre : 'Confidencial' ?>

                      <!--   &nbsp;
                        <i class="fa fa-star gold"></i>
                        <i class="fa fa-star gold"></i>
                        <i class="fa fa-star gold"></i>
                        <i class="fa fa-star gold"></i>
                        <i class="fa fa-star gold"></i>
                        &nbsp;--->

                        <i class="fa fa-eye"></i><?= $pub->vistos ?>&nbsp; 
                        <i class="fa fa-clock-o mr-0"></i>
                        <span class="disponibilidad"><?= $pub->disponibilidad ?></span>&nbsp;
                        <?php if ($pub->discapacidad == 'SI'): ?>
                        <i class="fa fa-wheelchair blue"></i>
                        <?php endif; ?>
                  
                        <?php if ($pub->facebook || $pub->linkedin || $pub->twitter): ?>
                        <div class="desk" style="float: right">
                          <?php if ($pub->facebook): ?> 
                          <a href="<?= $pub->facebook ?>"><span class="container-fb"><i class="fa fa-facebook"></i></span></a>
                          <?php endif; ?>
                          <?php if ($pub->linkedin): ?>
                          <a href="<?= $pub->linkedin ?>"><span class="container-in"><i class="fa fa-linkedin mr-0"></i></span></a>
                          <?php endif; ?>
                          <?php if ($pub->twitter): ?>
                          <a href="<?= $pub->twitter ?>"><span class="container-tw"><i class="fa fa-twitter mr-0"></i></span></a>
                          <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($pub->facebook || $pub->linkedin || $pub->twitter): ?>
                        <p class="container-media mobile" style="margin-bottom: 0;">
                          <?php if ($pub->facebook): ?> 
                          <a href="<?= $pub->facebook ?>"><span class="container-fb" style="float: inherit"><i class="fa fa-facebook" style="vertical-align: text-top"></i></span></a>
                          <?php endif; ?>
                          <?php if ($pub->linkedin): ?>
                          <a href="<?= $pub->linkedin ?>"><span class="container-in" style="float: inherit"><i class="fa fa-linkedin mr-0" style="padding:4px; margin-left: 0px; font-size: 13px; vertical-align: super;"></i></span></a>
                          <?php endif; ?>
                          <?php if ($pub->twitter): ?>
                          <a href="<?= $pub->twitter ?>"><span class="container-tw" style="float: inherit"><i class="fa fa-twitter mr-0" style="padding:3px; margin-left: 0px; vertical-align: text-bottom;"></i></span></a>
                          <?php endif; ?>
                        </p>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="job-style-bx container-img-oferta desk">
                      <img src="<?= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->imagen == null ? asset('local/resources/views/images/company-avatar.png') : asset('uploads/'.$pub->imagen) : asset('local/resources/views/images/company-avatar.png') ?>" class="img-fluid img-oferta" alt="">
                      <!-- <img src="local/resources/views/images/ppp-aprendiz.png" alt="" class="img-fluid img-oferta"> -->
                      <!-- <img src="local/resources/views/images/banner_pippng.png" alt="" class="img-fluid img-oferta"> -->
                      <!-- <img src="local/resources/views/images/Logo-PILApng.png" alt="" class="img-fluid img-oferta"> -->
                      <!-- <img src="local/resources/views/images/jovenes.png" alt="" class="img-fluid img-oferta"> -->
                      <!-- <img src="local/resources/views/images/xmi.png" alt="" class="img-fluid img-oferta"> -->
                      <?php if ($pub->plan_estado): ?>
                      <img src="<?= asset('local/resources/views/images/programas') ?>/<?= $pub->plan_estado ?>.png" alt="" class="img-fluid img-oferta">
                      <?php endif; ?>
                      <p class="nombre-img"><?php //= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->nombre : 'Confidencial' ?></p>
                    </div>
                  </div></a>
                  <?php endif; ?>

                <?php endforeach; ?>

                

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
                      <li class="prev"><a href="ofertas?pag=<?= $previous ?>"><i class="la la-long-arrow-left"></i> Atrás</a></li>
                      <!-- <li><a href="">1</a></li>
                      <li class="active"><a href="">2</a></li>
                      <li><a href="">3</a></li>
                      <li><span class="delimeter">...</span></li>
                      <li><a href="">14</a></li> -->
                      <?php if ($paginas >= 1 && $paginas <= 5): ?>
                        <?php for ($i=0;$i<$paginas;$i++): ?>
                          <?php $active = isset($_GET['pag']) ? ($i+1) == $_GET['pag'] ? 'active' : "" : ($i+1) == 1 ? 'active' : "" ?>
                          <li class=" d-none <?= $active ?>"><a href="ofertas?pag=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor; ?>
                      <?php else: ?>
                        <?php if (($paginaAct+4) <= $paginas): ?>
                          <?php for ($i=$paginaAct;$i<=($paginaAct+4);$i++): ?>
                            <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                            <li class=" d-none <?= $active ?>"><a href="ofertas?pag=<?= $i ?>"><?= $i ?></a></li>
                          <?php endfor; ?>
                        <?php elseif ($paginaAct == $paginas): ?>
                          <?php for ($i=($paginaAct-4);$i<=$paginas;$i++): ?>
                            <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                            <li class=" d-none <?= $active ?>"><a href="ofertas?pag=<?= $i ?>"><?= $i ?></a></li>
                          <?php endfor; ?>
                        <?php else: ?>
                          <?php for ($i=$paginaAct;$i<=$paginas;$i++): ?>
                            <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                            <li class=" d-none <?= $active ?>"><a href="ofertas?pag=<?= $i ?>"><?= $i ?></a></li>
                          <?php endfor; ?>
                        <?php endif; ?>
                        <?php if (($paginaAct+4) < $paginas): ?>
                        <li class="d-none"><span class="delimeter">...</span></li>
                        <li class="d-none"><a href="ofertas?pag=<?= $paginas ?>"><?= $paginas ?></a></li>
                        <?php endif ?>
                      <?php endif; ?>
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
                      <li class="next"><a href="ofertas?pag=<?= $next ?>">Siguiente <i class="la la-long-arrow-right"></i></a></li>
                    </ul>
                  </div> <!-- Pagination -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <?php include("local/resources/views/includes/general_footer.php");?>
  </div>
  <?php include("local/resources/views/includes/login_register_modal.php");?>
  <script src="local/resources/views/js/jquery.min.js" type="text/javascript">
  </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>
  <script src="local/resources/views/js/modernizr.js" type="text/javascript">
  </script>
  <script src="local/resources/views/js/script.js" type="text/javascript">
  </script>
  <script src="local/resources/views/js/wow.min.js" type="text/javascript">
  </script>
  <script src="local/resources/views/js/slick.min.js" type="text/javascript">
  </script>
  <script src="local/resources/views/js/parallax.js" type="text/javascript">
  </script>
  <script src="local/resources/views/js/select-chosen.js" type="text/javascript">
  </script>
  <script src="local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript">
  </script>
  <script type="text/javascript">
   var clicks = 1;
    $('#showFilters').click(function(e) {

      // Show or hide filters
      if (clicks % 2 == 1) {
        $('#side-offers').fadeIn();
        $('#showFilters').html('Ocultar filtros <i class="fa fa-ban"></i>');
        // Scroll Up
        e.preventDefault();
        $('html, body').animate({
            scrollTop : $('html, body').offset().top
        }, 500);
      } else {
        $('#side-offers').fadeOut();
        $('#showFilters').html('Mostrar filtros <i class="fa fa-filter"></i>');
      }
      clicks++;
    });

    <?php foreach ($favoritos as $key): ?>
    <?php
if($key!==null)
{
echo'$("#fav_'.$key->id_referencia.'").addClass("active");';
}
?>
    <?php endforeach ?>
  </script>
  <script type="text/javascript">
    function filter() {
      $('#form_filter').submit();
    }

    function limpiar() {

      $('input[type="checkbox"], input[type="radio"]').prop('checked', false);
      $("#form_filter").submit()
    }


    function set_favoritos(vid) {
      vtipo = 3;
      vtitulo = $("#titulo_" + vid).html();
      vurl = $("#url_" + vid).html();
      vdescripcion = $("#descripcion_" + vid).html();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        data: {
          id: vid,
          tipo: vtipo,
          url: vurl,
          titulo: vtitulo,
          descripcion: vdescripcion
        },
        url: 'candisetfavorite',
        type: 'post',
        success: function (data) {

          if (data == 2) {
            alert("Ya le ha dado favorito");
          } else if (data == 0) {
            alert("Ha ocurrido un error");
          }
        }
      })
    }

    function filtros_set_var(descripcion) {
      $("#filtros").append('<span>' + descripcion + '</span>');
    }

    function set_check(parametro) {
      $("#" + parametro).attr('checked', 'true');
    }

    <?php if (isset($variables['title']) && $variables['title'] != ""): ?>
    filtros_set_var("<?= $variables['title'] ?>");
    <?php endif ?>

    <?php if (isset($variables['provincia_index']) && $variables['provincia_index'] != ""): ?>
    filtros_set_var($("#label_prov_<?= $variables['provincia_index'] ?>").text());
    set_check("prov_<?= $variables['provincia_index'] ?>");
    <?php endif ?>

    <?php if (isset($variables['antiguedad'])): ?>
    filtros_set_var($("#label_ant_<?= $variables['antiguedad'] ?>").text());
    set_check("ant_<?= $variables['antiguedad'] ?>");
    <?php endif ?>

    <?php if (isset($variables['provincias']) && count($variables['provincias'])>0): ?>
    <?php foreach ($variables['provincias'] as $key): ?>
    filtros_set_var($("#label_prov_<?= $key ?>").text());
    set_check("prov_<?= $key ?>");
    <?php endforeach ?>
    <?php endif ?>

    <?php if (isset($variables['localidades']) && count($variables['localidades'])>0): ?>
    <?php foreach ($variables['localidades'] as $key): ?>
    filtros_set_var($("#label_loc_<?= $key ?>").text());
    set_check("loc_<?= $key ?>");
    <?php endforeach ?>
    <?php endif ?>

    <?php if (isset($variables['disponibilidades']) && count($variables['disponibilidades'])>0): ?>
    <?php foreach ($variables['disponibilidades'] as $key): ?>
    filtros_set_var($("#label_disp_<?= $key ?>").text());
    set_check("disp_<?= $key ?>");
    <?php endforeach ?>
    <?php endif ?>

    <?php if (isset($variables['planes_estado']) && count($variables['planes_estado'])>0): ?>
    <?php foreach ($variables['planes_estado'] as $key): ?>
    filtros_set_var($("#label_plan_<?= $key ?>").text());
    set_check("plan_<?= $key ?>");
    <?php endforeach ?>
    <?php endif ?>

    <?php if (isset($variables['areas']) && count($variables['areas'])>0): ?>
    <?php foreach ($variables['areas'] as $key): ?>
    filtros_set_var($("#label_area_<?= $key ?>").text());
    set_check("area_<?= $key ?>");
    <?php endforeach ?>
    <?php endif ?>

    <?php if (isset($variables['sectores']) && count($variables['sectores'])>0): ?>
    <?php foreach ($variables['sectores'] as $key): ?>
    filtros_set_var($("#label_sect_<?= $key ?>").text());
    set_check("sect_<?= $key ?>");
    <?php endforeach ?>
    <?php endif ?>

    <?php if (isset($variables['salarios']) && count($variables['salarios'])>0): ?>
    <?php foreach ($variables['salarios'] as $key): ?>
    filtros_set_var($("#label_sal_<?= $key ?>").text());
    set_check("sal_<?= $key ?>");
    <?php endforeach ?>
    <?php endif ?>

    <?php if (isset($variables['experiencias']) && count($variables['experiencias'])>0): ?>
    <?php foreach ($variables['experiencias'] as $key): ?>
    filtros_set_var($("#label_exp_<?= $key ?>").text());
    set_check("exp_<?= $key ?>");
    <?php endforeach ?>
    <?php endif ?>

    <?php if (isset($variables['generos']) && count($variables['generos'])>0): ?>
    <?php foreach ($variables['generos'] as $key): ?>
    filtros_set_var($("#label_gen_<?= $key ?>").text());
    set_check("gen_<?= $key ?>");
    <?php endforeach ?>
    <?php endif ?>
  </script>
</body>

</html>