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
    <section class="overlape mt-responsive">
      <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(local/resources/views/images/empresas_header.jpg) repeat scroll 10% 422.28px transparent;" class="parallax scrolly-invisible no-parallax">
        </div>
        <!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="inner-header">
                <h3 style="font-size: 36px;">Las mejores empresas
                </h3>
                <h3 style="font-size: 22px;margin-top: -40px;">Y las mejores ofertas
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
            <aside class="col-lg-3 column border-right" id="side-offers" style="padding-left: 0px; border-color: transparent">
              
              <form action="empresas" method="POST" id="form_filter">
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <div class="widget filter-offer">
                  <h3 class="sb-title open">Cargo</h3>
                  <div class="search_widget_job">
                    <div class="field_w_search">
                      <input type="text" name="cargo" id="cargo" value="<?= isset($_POST["cargo"]) ? $_POST["cargo"] : "" ?>" placeholder="Ej: Operador">
                      <i class="la la-search">
                      </i>
                    </div>
                  </div>
                </div>
                <div class="widget filter-offer">
                  <h3 class="sb-title open">Industrias</h3>
                  <div class="specialism_widget">
                    <div class="simple-checkbox">
                      <?php foreach ($sectores as $sect): ?>
                      <p><input type="checkbox" onclick="filter()" name="sectores[]" value="<?= $sect->id_sector ?>" id="sect_<?= $sect->id_sector ?>"><label for="sect_<?= $sect->id_sector ?>" id="label_sect_<?= $sect->id_sector ?>"><?= $sect->sector ?> (<?= $sect->cantidad ?>)</label></p>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                <div class="widget filter-offer">
                  <h3 class="sb-title open">Provincia</h3>
                  <div class="specialism_widget">
                    <div class="simple-checkbox">
                      <?php foreach ($provincias as $prov): ?>
                      <p><input type="checkbox" onclick="filter()" name="provincias[]" value="<?= $prov->id_provincia ?>" id="prov_<?= $prov->id_provincia ?>"><label for="prov_<?= $prov->id_provincia ?>" id="label_prov_<?= $prov->id_provincia ?>"><?= $prov->provincia ?> (<?= $prov->cantidad ?>)</label></p>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                <div class="widget filter-offer">
                  <h3 class="sb-title open">Localidad</h3>
                  <div class="specialism_widget">
                    <div class="simple-checkbox">
                      <?php foreach ($localidades as $loc): ?>
                      <p><input type="checkbox" onclick="filter()" name="localidades[]" value="<?= $loc->id_localidad ?>" id="loc_<?= $loc->id_localidad ?>"><label for="loc_<?= $loc->id_localidad ?>" id="label_loc_<?= $loc->id_localidad ?>"><?= $loc->localidad ?> (<?= $loc->cantidad ?>)</label></p>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </form>
            </aside>
            <div class="col-lg-9 column">
              <div class="modrn-joblist">
                <div class="tags-bar" id="filtros">
                  
                  <div class="action-tags">
                    <a title="" onclick="limpiar()"><i class="la la-trash-o"></i> Quitar filtros</a>
                  </div>
                </div>
                <!-- Tags Bar -->
                <div class="filterbar">
                  <h5><?php echo $totalEmpresas;?> Empresas</h5>
                </div>
              </div>
              <div class="job-listings-sec">
                <div class="job-listing wtabs">
										<div class="mobile">
											<img src="http://urbancomunicacion.com/wp-content/uploads/2017/08/Historia-del-logotipo-de-Coca-Cola-Urban-comunicacion.png" class="img-fluid img-oferta" alt="">
											<p class="nombre-img">Coca Cola</p>
										</div>
										<div class="job-title-sec container-desc-oferta">
											<h5 class="title-recom">Titulo de la Empresa <a href="#"><span style="float: right; color: #bbbbbb; font-size: 15px; font-weight: 400;"><sup>Denunciar</sup> <i class="fa fa-exclamation-circle exclamation-icon"></i></span></a></h5>
											<p class="time-pub"><i class="fa fa-calendar"></i> Publicada Hoy a las 10:58 Am - Termina: 08/12/2018</p>
											<p class="desc-oferta">Mauris pulvinar efficitur quam nec consequat. Vestibulum eu luctus eros. Praesent non erat ullamcorper, ultrices tellus sed, egestas massa. Nunc mollis ipsum non nunc aliquet blandit. Praesent ullamcorper, libero id maximus mollis, leo neque hendrerit ligula, a egestas augue ipsum at lectus. Donec a ligula porta, vulputate mauris quis, sodales elit. </p>
											<br>
											<div class="job-lctn">
												Cocacola&nbsp;
												<i class="fa fa-star gold"></i>
												<i class="fa fa-star gold"></i>
												<i class="fa fa-star gold"></i>
												<i class="fa fa-star gold"></i>
												<i class="fa fa-star gold"></i>
												&nbsp;
												<i class="fa fa-eye"></i>11&nbsp;
												<i class="fa fa-heart red"></i>3&nbsp;
												<i class="fa fa-clock-o mr-0"></i>
												<span class="disponibilidad">FullTime</span>&nbsp;
												<i class="fa fa-wheelchair blue"></i>
												<div class="desk" style="float: right">
													<a href="#"><span class="container-fb"><i class="fa fa-facebook mr-0"></i></span></a>
													<a href="#"><span class="container-in"><i class="fa fa-linkedin mr-0"></i></span></a>
													<a href="#"><span class="container-tw"><i class="fa fa-twitter mr-0"></i></span></a>
													<a href="#"><span class="container-ig"><i class="fa fa-instagram mr-0"></i></span></a>
													<a href="#"><span class="container-web"><i class="fa fa-globe mr-0"></i></span></a>
												</div>
												<p class="container-media mobile" style="margin-bottom: 0;">
													<a href="#"><span class="container-fb" style="float: inherit"><i class="fa fa-facebook" style="margin-left: 4px; vertical-align: text-top"></i></span></a>
													<a href="#"><span class="container-in" style="float: inherit"><i class="fa fa-linkedin mr-0" style="padding:4px; margin-left: 0px; font-size: 13px; vertical-align: super;"></i></span></a>
													<a href="#"><span class="container-tw" style="float: inherit"><i class="fa fa-twitter mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
													<a href="#"><span class="container-ig" style="float: inherit"><i class="fa fa-instagram mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
													<a href="#"><span class="container-web" style="float: inherit"><i class="fa fa-globe mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
												</p>
											</div>
										</div>
										<div class="job-style-bx container-img-oferta-i desk">
											<img src="http://urbancomunicacion.com/wp-content/uploads/2017/08/Historia-del-logotipo-de-Coca-Cola-Urban-comunicacion.png" class="img-fluid img-oferta" alt="">
											<p class="nombre-img">Coca Cola</p>
										</div>
									</div>
              </div>
              <div class="emply-list-sec">
                <?php foreach ($empresas as $empresa): ?>
                  <?php $imagen = $empresa->imagen == null ? 'uploads/0.jpg' : 'uploads/'.$empresa->imagen ?>
                <div class="emply-list">
                    <div class="emply-list-thumb">
                      <a href="empresa/detalle?e=<?= $empresa->id_empresa ?>" title=""><img src="<?= $imagen ?>" alt="logo de la empresa"></a>
                    </div>
                    <div class="emply-list-info">
                      <!-- <div class="emply-pstn">4 Open Position</div> -->
                      <h3><a href="empresa/detalle?e=<?= $empresa->id_empresa ?>" title=""><?= $empresa->nombre_empresa ?></a></h3>
                      <span><i class="fa fa-cubes"></i> <?= $empresa->sector ?></span>
                      <?php if ($empresa->direccion != ""): ?>
                      <h6><i class="la la-map-marker"></i> <?= $empresa->direccion ?></h6>
                      <?php endif ?>
                      <?php $description = strlen($empresa->descripcion) > 180 ? substr($empresa->descripcion, 0, 180) . '...' : $empresa->descripcion ?>
                      <p><?= $description ?></p>
                    </div>
                </div><!-- Employe List -->
                <?php endforeach; ?>
                              <?php if ($paginas > 0): ?>
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
                                    <li class="prev"><a href="empresas?pag=<?= $previous ?>"><i class="la la-long-arrow-left"></i> Atrás</a></li>
                                    <!-- <li><a href="">1</a></li>
                                    <li class="active"><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><span class="delimeter">...</span></li>
                                    <li><a href="">14</a></li> -->
                                    <?php if ($paginas >= 1 && $paginas <= 5): ?>
                                      <?php for ($i=0;$i<$paginas;$i++): ?>
                                        <?php $active = isset($_GET['pag']) ? ($i+1) == $_GET['pag'] ? 'active' : "" : ($i+1) == 1 ? 'active' : "" ?>
                                        <li class="d-none <?= $active ?>"><a href="empresas?pag=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                                      <?php endfor; ?>
                                    <?php else: ?>
                                      <?php if (($paginaAct+4) <= $paginas): ?>
                                        <?php for ($i=$paginaAct;$i<=($paginaAct+4);$i++): ?>
                                          <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                                          <li class="d-none <?= $active ?>"><a href="empresas?pag=<?= $i ?>"><?= $i ?></a></li>
                                        <?php endfor; ?>
                                      <?php elseif ($paginaAct == $paginas): ?>
                                        <?php for ($i=($paginaAct-4);$i<=$paginas;$i++): ?>
                                          <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                                          <li class="d-none <?= $active ?>"><a href="empresas?pag=<?= $i ?>"><?= $i ?></a></li>
                                        <?php endfor; ?>
                                      <?php else: ?>
                                        <?php for ($i=$paginaAct;$i<=$paginas;$i++): ?>
                                          <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                                          <li class="d-none <?= $active ?>"><a href="empresas?pag=<?= $i ?>"><?= $i ?></a></li>
                                        <?php endfor; ?>
                                      <?php endif; ?>
                                      <?php if (($paginaAct+4) < $paginas): ?>
                                      <li class="d-none"><span class="delimeter">...</span></li>
                                      <li class="d-none"><a href="empresas?pag=<?= $paginas ?>"><?= $paginas ?></a></li>
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
                                    <li class="next"><a href="empresas?pag=<?= $next ?>">Siguiente <i class="la la-long-arrow-right"></i></a></li>
                                  </ul>
                                </div> <!-- Pagination -->
                              <?php endif; ?>
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

                  <script>
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
                    
                    function filter()
                    {
                      $('#form_filter').submit();
                    }

                    function limpiar()
                    {
                       
                      $('input[type="checkbox"]').prop('checked' , false);
                      $('#cargo').val("");
                      $("#form_filter").submit();
                    }

                    function filtros_set_var(descripcion)
                    { 
                      $("#filtros").append('<span>'+descripcion+'</span>'); 
                    }

                    function set_check(parametro)
                    {
                      $("#"+parametro).attr('checked', 'true');
                    }

                    <?php if (isset($variables['cargo']) && $variables['cargo'] != ""): ?>
                         filtros_set_var("<?= $variables['cargo'] ?>");
                    <?php endif ?>

                    <?php if (isset($variables['provincias']) && count($variables['provincias'])>0): ?>
                         <?php foreach ($variables['provincias'] as $key): ?>
                         filtros_set_var($("#label_prov_<?= $key ?>").text());
                         set_check("prov_<?= $key ?>");
                       <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (isset($variables['sectores']) && count($variables['sectores'])>0): ?>
                         <?php foreach ($variables['sectores'] as $key): ?>
                         filtros_set_var($("#label_sect_<?= $key ?>").text());
                         set_check("sect_<?= $key ?>");
                       <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (isset($variables['localidades']) && count($variables['localidades'])>0): ?>
                         <?php foreach ($variables['localidades'] as $key): ?>
                         filtros_set_var($("#label_loc_<?= $key ?>").text());
                         set_check("loc_<?= $key ?>");
                       <?php endforeach; ?>
                    <?php endif; ?>
                  </script>
                </body>
              </html>