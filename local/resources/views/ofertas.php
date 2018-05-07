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
    <link rel="stylesheet" href="local/resources/views/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
  </head>
  <body>
    <?php include("local/resources/views/includes/menu_top_responsive.php");?>
    <?php include("local/resources/views/includes/header_con_imagen.php");?>
    <section class="overlape">
      <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(local/resources/views/images/fondo_publiacaciones.jpg) repeat scroll 10% 422.28px transparent;" class="parallax scrolly-invisible no-parallax">
        </div>
        <!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="inner-header">
                <h3 style="font-size: 36px;">Ofertas de trabajo
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
              <div class="widget">
                <div class="search_widget_job">
                  <div class="field_w_search">
                    <input type="text" placeholder="Buscar">
                    <i class="la la-search">
                    </i>
                  </div> 
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title open">Antiguedad
                </h3>
                <div class="posted_widget" style="">
                  <input type="radio" name="choose" id="232">
                  <label for="232">Todo
                  </label>
                  <br>
                  <input type="radio" name="choose" id="ww">
                  <label for="ww">Hoy
                  </label>
                  <br>
                  <input type="radio" name="choose" id="wwqe">
                  <label for="wwqe">Última semana
                  </label>
                  <br>
                  <input type="radio" name="choose" id="erewr">
                  <label for="erewr">Últimos 30 días
                  </label>
                  <br> 
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title open">Provincia
                </h3>
                <div class="type_widget" style="">
                  <?php
                    $contador=0;
                    foreach($provincia as $key)
                  {
                    echo'<p class="flchek">
                    <input type="checkbox" name="choosetype" id="'.$key->id.'">
                    <label for="'.$key->id.'">'.$key->provincia.'
                    </label>
                  </p>';
                  if($contador>10){break;}
                  $contador++;
                  }?> 
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title open">Localidad
                </h3>
                <div class="type_widget" style="">
                   <?php
                    $contador=0;
                    foreach($localidad as $key)
                  {
                    echo'<p class="flchek">
                    <input type="checkbox" name="choosetype" id="'.$key->id.'">
                    <label for="'.$key->id.'">'.$key->localidad.'
                    </label>
                  </p>';
                  if($contador>10){break;}
                  $contador++;
                  }?> 
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title open">Disponibilidad
                </h3>
                <div class="type_widget" style="">
                   <?php 
                    foreach($disponibilidad as $key)
                  {
                    echo'<p class="flchek">
                    <input type="checkbox" name="choosetype" id="'.$key->id.'">
                    <label for="'.$key->id.'">'.$key->nombre.'
                    </label>
                  </p>'; 
                  }?> 
                </div>
              </div>
               
                <div class="widget">
                <h3 class="sb-title active">Sector
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                   <?php
                    $contador=0;
                    foreach($sector as $key)
                  {
                    echo'<p class="flchek">
                    <input type="checkbox" name="choosetype" id="'.$key->id.'">
                    <label for="'.$key->id.'">'.$key->nombre.'
                    </label>
                  </p>';
                  if($contador>10){break;}
                  $contador++;
                  }?> 
                  </div>
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title active">Area
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                    <?php
                    $contador=0;
                    foreach($area as $key)
                  {
                    echo'<p class="flchek">
                    <input type="checkbox" name="choosetype" id="'.$key->id.'">
                    <label for="'.$key->id.'">'.$key->nombre.'
                    </label>
                  </p>';
                  if($contador>10){break;}
                  $contador++;
                  }?> 
                  </div>
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title active">Oferta Salarial
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                    <?php
                    $contador=0;
                    foreach($salario as $key)
                  {
                    echo'<p class="flchek">
                    <input type="checkbox" name="choosetype" id="'.$key->id.'">
                    <label for="'.$key->id.'">'.$key->salario.'
                    </label>
                  </p>';
                  if($contador>10){break;}
                  $contador++;
                  }?> 
                  </div>
                </div>
              </div>
               
              <div class="widget">
                <h3 class="sb-title active">Experiencia
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                   <?php 
                    foreach($experiencia as $key)
                  {
                    $datos="Sin experiencia";
                    if($key->descripcion!="Sin experiencia"){$datos=$key->descripcion." Años";}
                    echo'<p class="flchek">
                    <input type="checkbox" name="choosetype" id="'.$key->id.'">
                    <label for="'.$key->id.'">'.$datos.'
                    </label>
                  </p>'; 
                  }?>  
                  </div>
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title active">Genero
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                    <?php 
                    foreach($genero as $key)
                  { 
                    echo'<p class="flchek">
                    <input type="checkbox" name="choosetype" id="'.$key->id.'">
                    <label for="'.$key->id.'">'.$key->descripcion.'
                    </label>
                  </p>'; 
                  }?>  
                  </div>
                </div>
              </div> 
            </aside>
            <div class="col-lg-9 column">
              <div class="modrn-joblist">
                 
                <!-- Tags Bar -->
                <div class="filterbar"> 
                  <div class="sortby-sec">
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
                     
                  </div>
                  <h5>Ofertas de trabajo
                  </h5>
                </div>
              </div>
              <!-- MOdern Job LIst -->
              <div class="job-list-modern">
                <div class="job-listings-sec">

                  <?php foreach($publicaciones as $key)
                  {
                    $estado="Activa";
                    if(!$estado==1){$estado="Inactiva";}
                    echo'<div class="job-listing wtabs">
                        <div class="job-title-sec">
                          <div class="c-logo"> 
                            <img src="uploads/'.$key->imagen.'" alt="" style="max-width: 98px;"> 
                          </div>
                          <h3>
                            <a href="#" title="">'.$key->titulo.'
                            </a>
                          </h3>
                          <span>'.$key->nombre.'
                          </span>
                          <div class="job-lctn">
                            <i class="la la-map-marker">
                            </i>'.$key->provincia.', '.$key->localidad.'
                          </div>
                        </div>
                        <div class="job-style-bx">
                          <span class="job-is ft">'.$key->disponibilidad.'
                          </span>
                          <span class="fav-job">
                            <i class="la la-heart-o">
                            </i>
                          </span>
                          <i>Vistas '.$key->vistos.' / <span class="status">'.$estado.'</span> / '.$key->tmp.'
                          </i>
                        </div></div>';
                  }?>
                  
                  </div> 
                </div>
                <!--
                  <div class="viewmore">
                  <span>
                    <i>
                    </i>
                    <i>
                    </i>
                    <i>
                    </i>View More
                  </span>
                </div>
                -->
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
  </body>
</html>
