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
   <?php include('local/resources/views/includes/general_header.php');?>
   <?php include('local/resources/views/includes/general_header_responsive.php');?>
    <section class="overlape">
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
      <div class="block no-padding">
        <div class="container">
          <div class="row no-gape">
            <aside class="col-lg-3 column border-right" style="padding-left: 0px;
              ">
              
              <div class="widget">
                <h3 class="sb-title open">Área</h3>
                <div class="specialism_widget" style="">
                  <div class="simple-checkbox">
                    <p><input type="checkbox" name="spealism" id="as"><label for="as">Accountancy (2)</label></p>
                    <p><input type="checkbox" name="spealism" id="asd"><label for="asd">Banking (2)</label></p>
                    <p><input type="checkbox" name="spealism" id="errwe"><label for="errwe">Charity &amp; Voluntary (3)</label></p>
                    <p><input type="checkbox" name="spealism" id="fdg"><label for="fdg">Digital &amp; Creative (4)</label></p>
                    <p><input type="checkbox" name="spealism" id="sc"><label for="sc">Estate Agency (3)</label></p>
                    <p><input type="checkbox" name="spealism" id="aw"><label for="aw">Graduate (2)</label></p>
                    <p><input type="checkbox" name="spealism" id="ui"><label for="ui">IT Contractor (7)</label></p>
                  </div>
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title open">Provincia</h3>
                <div class="specialism_widget" style="">
                  <div class="simple-checkbox">
                    <p><input type="checkbox" name="spealism" id="t1"><label for="t1">1 - 10</label></p>
                    <p><input type="checkbox" name="spealism" id="t2"><label for="t2">100 - 200</label></p>
                    <p><input type="checkbox" name="spealism" id="t3"><label for="t3">201 - 301</label></p>
                    <p><input type="checkbox" name="spealism" id="t4"><label for="t4">301 - 401</label></p>
                    <p><input type="checkbox" name="spealism" id="t5"><label for="t5">401 - 501</label></p>
                    <p><input type="checkbox" name="spealism" id="t6"><label for="t6">501 - 601</label></p>
                    <p><input type="checkbox" name="spealism" id="t7"><label for="t7">601 - 701</label></p>
                  </div>
                </div>
              </div>
              <div class="widget">
                <h3 class="sb-title open">Localidad</h3>
                <div class="specialism_widget" style="">
                  <div class="simple-checkbox">
                    <p><input type="checkbox" name="spealism" id="t1"><label for="t1">1 - 10</label></p>
                    <p><input type="checkbox" name="spealism" id="t2"><label for="t2">100 - 200</label></p>
                    <p><input type="checkbox" name="spealism" id="t3"><label for="t3">201 - 301</label></p>
                    <p><input type="checkbox" name="spealism" id="t4"><label for="t4">301 - 401</label></p>
                    <p><input type="checkbox" name="spealism" id="t5"><label for="t5">401 - 501</label></p>
                    <p><input type="checkbox" name="spealism" id="t6"><label for="t6">501 - 601</label></p>
                    <p><input type="checkbox" name="spealism" id="t7"><label for="t7">601 - 701</label></p>
                  </div>
                </div>
              </div>
            </aside>
            <div class="col-lg-9 column">
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
                      <span><?= $empresa->sector ?></span>
                      <h6><i class="la la-map-marker"></i> <?= $empresa->direccion ?></h6>
                      <?php $description = strlen($empresa->descripcion) > 180 ? substr($empresa->descripcion, 0, 180) . '...' : $empresa->descripcion ?>
                      <p><?= $description ?></p>
                    </div>
                </div><!-- Employe List -->
                <?php endforeach; ?>
                        
                              <!-- <div class="pagination">
                                <ul>
                                  <li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Prev</a></li>
                                  <li><a href="">1</a></li>
                                  <li class="active"><a href="">2</a></li>
                                  <li><a href="">3</a></li>
                                  <li><span class="delimeter">...</span></li>
                                  <li><a href="">14</a></li>
                                  <li class="next"><a href="">Next <i class="la la-long-arrow-right"></i></a></li>
                                </ul>
                                </div> --><!-- Pagination -->
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