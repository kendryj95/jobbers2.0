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
  <link rel="stylesheet" href="local/resources/views/css/icons.css">
  <link rel="stylesheet" href="local/resources/views/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
  <link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
  <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
  <link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-1968505410020323",
      enable_page_level_ads: true
    });
  </script>
</head>

<body>
  <?php include('local/resources/views/includes/general_header.php');?>
  <?php include('local/resources/views/includes/general_header_responsive.php');?>
  <section class="overlape mt-responsive">
    <div class="block no-padding">
      <div data-velocity="-.1" style="background: url(local/resources/views/images/fondo_publiacaciones.jpg) repeat scroll 10% 422.28px transparent;"
        class="parallax scrolly-invisible no-parallax">
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
    <div class="block no-padding back-offers">
      <div class="container">
        <div class="row no-gape">
          <div class="btn-showfilter">
            <button class="btn btn-primary" id="showFilters">Mostrar filtros <i class="fa fa-filter"></i></button>
          </div>
          <aside class="col-lg-3 column border-right" id="side-offers">
            <form action="ofertas" method="POST" id="form_filter">
              <input type="hidden" name="_token" value="<?php echo csrf_token();?>">


              <div class="widget">
                <h3 class="sb-title open">Antiguedad
                </h3>
                <div class="type_widget" style="">
                  <p class="flchek">
                    <input type="radio" onclick="filter()" name="antiguedad" id="ant_1" value="1">
                    <label id="label_ant_1" for="ant_1">Todo
                    </label> (
                    <?= $antiguedad[0]->cantidad_todo ?>)</p>
                  <br>
                  <p class="flchek">
                    <input type="radio" onclick="filter()" name="antiguedad" id="ant_2" value="2">
                    <label id="label_ant_2" for="ant_2">Hoy
                    </label> (
                    <?= $antiguedad[0]->cantidad_hoy ?>)</p>
                  <br>
                  <p class="flchek">
                    <input type="radio" onclick="filter()" name="antiguedad" id="ant_3" value="3">
                    <label id="label_ant_3" for="ant_3">Última semana
                    </label> (
                    <?= $antiguedad[0]->cantidad_last_week ?>)</p>
                  <br>
                  <p class="flchek">
                    <input type="radio" onclick="filter()" name="antiguedad" id="ant_4" value="4">
                    <label id="label_ant_4" for="ant_4">Últimos 30 días
                    </label> (
                    <?= $antiguedad[0]->cantidad_last_thirty_days ?>)</p>
                  <br>
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title open">Provincia
                </h3>
                <div class="type_widget" style="">
                  <?php $contador = 0 ?>
                  <?php foreach ($provincia as $key): ?>

                  <p class="flchek">
                    <input type="checkbox" onclick="filter()" name="provincias[]" id="prov_<?= $key->id_provincia ?>" value="<?= $key->id_provincia ?>">
                    <label id="label_prov_<?= $key->id_provincia ?>" for="prov_<?= $key->id_provincia ?>">
                      <?= $key->provincia ?>
                    </label> (
                    <?= $key->cantidad ?>)
                  </p>
                  <?php  
                      if ($contador>10){break;}
                      $contador++;
                    ?>
                  <?php endforeach ?>
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title open">Localidad
                </h3>
                <div class="type_widget" style="">

                  <?php $contador=0 ?>
                  <?php foreach ($localidad as $key): ?>
                  <p class="flchek">
                    <input type="checkbox" onclick="filter()" name="localidades[]" id="loc_<?= $key->id_localidad ?>" value="<?= $key->id_localidad ?>">
                    <label id="label_loc_<?= $key->id_localidad ?>" for="loc_<?= $key->id_localidad ?>">
                      <?= $key->localidad ?>
                    </label> (
                    <?= $key->cantidad ?>)
                  </p>
                  <?php  
                      if ($contador>10){break;}
                      $contador++;
                    ?>
                  <?php endforeach ?>
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title open">Disponibilidad
                </h3>
                <div class="type_widget" style="">
                  <?php foreach ($disponibilidad as $key): ?>
                  <p class="flchek">
                    <input type="checkbox" onclick="filter()" name="disponibilidades[]" id="disp_<?= $key->id_disponibilidad ?>" value="<?= $key->id_disponibilidad ?>">
                    <label id="label_disp_<?= $key->id_disponibilidad ?>" for="disp_<?= $key->id_disponibilidad ?>">
                      <?= $key->nombre ?>
                    </label> (
                    <?= $key->cantidad ?>)
                  </p>
                  <?php endforeach ?>
                </div>
              </div>

              <div class="widget">
                <h3 class="sb-title active">Área
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                    <?php  
                        $contador=0;
                        foreach($area as $key):
                      ?>
                    <p class="flchek">
                      <input type="checkbox" onclick="filter()" name="areas[]" id="area_<?= $key->id_area ?>" value="<?= $key->id_area ?>">
                      <label id="label_area_<?= $key->id_area ?>" for="area_<?= $key->id_area ?>">
                        <?= $key->nombre ?>
                      </label> (
                      <?= $key->cantidad ?>)
                    </p>
                    <?php  
                        if($contador>10){break;}
                        $contador++;
                        endforeach; 
                      ?>
                  </div>
                </div>
              </div>

              <div class="widget">
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
                        <?= $key->nombre ?>
                      </label> (
                      <?= $key->cantidad ?>)
                    </p>
                    <?php  
                        if($contador>10){break;}
                        $contador++;
                        endforeach;
                      ?>
                  </div>
                </div>
              </div>

              <div class="widget">
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
                        </label> (
                        <?= $key->cantidad ?>)
                      </p>
                      <?php
                        if($contador>10){break;}
                        $contador++;
                        endforeach;
                      ?>
                  </div>
                </div>
              </div>

              <div class="widget">
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
                      </label> (
                      <?= $key->cantidad ?>)
                    </p>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title active">Género
                </h3>
                <div class="specialism_widget" style="display: block;">
                  <div class="simple-checkbox">
                    <?php foreach($genero as $key): ?>

                    <p class="flchek">
                      <input type="checkbox" onclick="filter()" name="generos[]" id="gen_<?= $key->id_genero ?>" value="<?= $key->id_genero ?>">
                      <label id="label_gen_<?= $key->id_genero ?>" for="gen_<?= $key->id_genero ?>">
                        <?= $key->descripcion ?>
                      </label> (
                      <?= $key->cantidad ?>)
                    </p>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>
            </form>
          </aside>
          <div class="col-lg-9 column" id="offers">
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
                <div class="job-listing wtabs" style="border-left: 3px solid #00aeef">
                  <div class="job-title-sec" ;>
                  <h5 class="title-recom">Empleo Recomendado</h5>
                    <h3>
                      <a href="detalleoferta/'.$key->id.'" title="">
                        <span style="font-size:18px;" id="descripcion_'.$key->id.'">Titulo del empleo</span>
                      </a>
                    </h3>
                    <a href="empresa/detalle?e=15001"><span id="titulo_477">Nombre de la empresa
                      </span></a>
                    <br>
                    <div class="job-lctn">
                      <i class="la la-map-marker">
                      </i>Ubicacion de la empresa, ubicacion
                    </div>
                  </div>
                  <div class="job-style-bx">

                    <span class="job-is ft">FULL TIME</span>
                    <i>Visitas 0 / 2018-07-27 21:32:11
                    </i>
                  </div>
                </div>

                <span id="url_'.$key->id.'" style="display:none;">detalleoferta/'.$key->id.'</span>
                <div class="job-listing wtabs borde-urgente">
                <div class="urgente"><span>Oferta Destacada</span></div>
                  <div class="job-title-sec" ;>
                    <h3>
                      <a href="detalleoferta/'.$key->id.'" title="">
                        <span style="font-size:18px; color: #ef7300" id="descripcion_'.$key->id.'">Titulo del empleo</span>
                      </a>
                    </h3>
                    <a href="#"><span style="color: #555555">Nombre de la empresa
                      </span></a>
                    <br>
                    <div class="job-lctn">
                      <i class="la la-map-marker">
                      </i>Ubicacion de la empresa, ubicacion
                    </div>
                  </div>
                  <div class="job-style-bx">

                    <span class="job-is ft">FULL TIME</span>
                    <i>Visitas 0 / 2018-07-27 21:32:11
                    </i>
                  </div>
                </div>
                <a href=""></a>
                <?php foreach($publicaciones as $key)
                  {

                  $confidencial = $key->confidencial == "NO" || $key->confidencial == null ? '<a href="empresa/detalle?e='.$key->id_empresa.'"><span id="titulo_'.$key->id.'">'.$key->nombre.'
                      </span></a>' : '<a href="javascript:void(0)"><span id="titulo_'.$key->id.'">Confidencial</span></a>';
                  $estado="Activa";
                  $imagen="";
                  if(!$estado==1){$estado="Inactiva";}
                  if($key->imagen!="")
                  {
                    $imagen='<div class="c-logo">
                        <img src="uploads/'.$key->imagen.'" alt="" style="max-width: 98px;">
                      </div>';
                  }
                  $corazon='';
                  if($bandera_favorito==1)
                  {
                    $corazon='<span id="fav_'.$key->id.'" class="fav-job">
                      <i onClick="set_favoritos('.$key->id.')" class="la la-heart-o">
                      </i>
                    </span>';
                  }
                  $disponibilidad='';
                  if($key->disponibilidad == 'FULL TIME'){
                    $disponibilidad = '<span class="job-is ft">'.$key->disponibilidad.'</span>';
                  }
                  else if($key->disponibilidad == 'PART TIME'){
                    $disponibilidad = '<span class="job-is pt">'.$key->disponibilidad.'</span>';
                  }
                  else if($key->disponibilidad == 'POR HORAS'){
                    $disponibilidad = '<span class="job-is fl">'.$key->disponibilidad.'</span>';
                  }
                  else{
                    $disponibilidad = '<span class="job-is tp">'.$key->disponibilidad.'</span>';
                  }
                  echo'
                  <span id="url_'.$key->id.'" style="display:none;">detalleoferta/'.$key->id.'</span>
                  <div class="job-listing wtabs">
                    <div class="job-title-sec";>
                      '.$imagen.'
                      <h3>
                      <a href="detalleoferta/'.$key->id.'" title=""><span style="font-size:18px;" id="descripcion_'.$key->id.'">'.$key->titulo.'</span>
                    </a>
                    </h3>
                      '.$confidencial.'
                      <br>
                    <div class="job-lctn">
                      <i class="la la-map-marker">
                      </i>'.$key->provincia.', '.$key->localidad.'
                    </div>
                  </div>
                  <div class="job-style-bx">
                    
                    '.$disponibilidad.$corazon.'
                    <i>Visitas '.$key->vistos.' / '.$key->tmp.'
                    </i>
                  </div></div>';
                  }?>

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