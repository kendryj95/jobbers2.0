<!DOCTYPE html>
<?php $ruta='../local/resources/views/empresas/';?>
<html class="loading" data-textdirection="ltr" lang="es">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
        <meta content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" name="viewport"/>
        <meta content="Jobbres Argentina" name="author"/>
        <title>
            Jobbers Argentina
        </title>
        <meta content="yes" name="apple-mobile-web-app-capable"/>
        <meta content="yes" name="apple-touch-fullscreen"/>
        <meta content="default" name="apple-mobile-web-app-status-bar-style"/>
        <link href="<?= $ruta;?>app-assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $ruta;?>app-assets/fonts/icomoon.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $ruta;?>app-assets/fonts/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $ruta;?>app-assets/vendors/css/extensions/pace.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $ruta;?>app-assets/css/bootstrap-extended.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $ruta;?>app-assets/css/app.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $ruta;?>app-assets/css/colors.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $ruta;?>app-assets/css/core/menu/menu-types/vertical-menu.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $ruta;?>app-assets/css/core/menu/menu-types/vertical-overlay-menu.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $ruta;?>assets/css/style.css" rel="stylesheet" type="text/css"/>
        <style type="text/css" media="screen">
            .alert-info-2
            {
                background-color: #ff9600;
            }
            html,body
            {
                overflow-x: hidden;
            }
        </style>
    </head>
</html>
<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-col="2-columns" data-menu="vertical-menu" data-open="click">
    <?php include('includes/nav.php')?>
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <!--Aside-->
        <?php include('includes/aside.php')?>
    </div>
    <!-- / main menu-->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title" style="margin-bottom: 0px;padding-bottom: 0px;">
                        Bienvenido
                    </h2>
                </div>
                 
            </div>
            <?php
            function sugerido($recomendados)
            {
                $cantidad=count($recomendados);
                if($cantidad>0)
                {
                    return $recomendados[rand(0,$cantidad-1)];
                }
            }
            $recomendados= sugerido($recomendados);
     
            ?>
            <p style="font-weight: 600">Candidato sugerido</p>
             <div  class="alert alert-info-2 alert-dismissible fade in mb-2" role="alert" style="padding: 5px;"> 
                                    <img style="border-radius: 50%;height: 50px;width: 50px;border:2px solid #fff;>" src="../uploads/min/<?= $recomendados->nombre_aleatorio;?>">
                                    <strong><span style="color: #fff"><?= $recomendados->nombre;?></span></strong> <a target="_blank" style="float: right;text-decoration: underline;margin-top:12px;" href="../reporte/<?= $recomendados->id;?>" class="alert-link">Dercargar CV</a>.
                   </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <div class="row" style="margin-bottom: 20px;">
                        <div class="col-sm-8">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                       
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item next left">
                                <img src="<?= $ruta;?>app-assets/images/carousel/home.png" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= $ruta;?>app-assets/images/carousel/promo_jobbers.png" alt="Second slide">
                            </div>
                            <div class="carousel-item active left">
                                <img src="<?= $ruta;?>app-assets/images/carousel/anuncio.png" alt="Third slide">
                            </div>
                        </div> 
                    </div>
                        </div>
                       <div class="row">
                            <div class="col-sm-4">
                             <div class="col-xl-12 col-lg-12 col-xs-12">
                                    <div class="card" style="margin-bottom: 6px;">
                                        <div class="card-body">
                                            <div class="card-block"  >
                                                <div class="media" >
                                                    <div class="media-left media-middle">
                                                        <i class="icon-profile pink font-large-2 float-xs-left"></i>
                                                    </div>
                                                    <div class="media-body text-xs-right">
                                                        <h3 class="pink"><?= $oferta_total[0]->cantidad;?></h3>
                                                        <span>Ofertas Jobbers</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             </div>

                              <div class="col-xl-12 col-lg-12 col-xs-12">
                                    <div class="card" style="margin-bottom: 6px;">
                                        <div class="card-body">
                                            <div class="card-block">
                                                <div class="media">
                                                    <div class="media-left media-middle">
                                                        <i class="icon-users teal font-large-2 float-xs-left"></i>
                                                    </div>
                                                    <div class="media-body text-xs-right">
                                                        <h3 class="teal"><?= $candidato_total[0]->cantidad;?></h3>
                                                        <span>Candidatos Jobbers</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             </div>

                              <div class="col-xl-12 col-lg-12 col-xs-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-block">
                                                <div class="media">
                                                    <div class="media-left media-middle">
                                                        <i class="icon-industry deep-orange font-large-2 float-xs-left"></i>
                                                    </div>
                                                    <div class="media-body text-xs-right">
                                                        <h3 class="deep-orange"><?= $empresas[0]->cantidad?></h3>
                                                        <span>Empresas Jobbers</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             </div>
                        </div>
                       </div>
                    </div>
                
                    <div class="alert alert-info alert-dismissible fade in mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Hola Jobbers!</strong> Esperamos que te guste tu nuevo panel. Recuerda completar la información de tu empresa para poder ofrecerte un mejor servicio. <br> <a href="perfil" class="alert-link">Ver mi informacion</a>.
                   </div>
              
             
                 <div class="row">
                     <div class="col-xl-3 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <i class="icon-profile pink font-large-2 float-xs-left"></i>
                                        </div>
                                        <div class="media-body text-xs-right">
                                            <h3 class="pink"><?= $ofertas_empresa[0]->cantidad?></h3>
                                            <span>Mis Ofertas</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>

                     <div class="col-xl-3 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <i class="icon-users teal font-large-2 float-xs-left"></i>
                                        </div>
                                        <div class="media-body text-xs-right">
                                            <h3 class="teal"><?= $postulados_empresa[0]->cantidad?></h3>
                                            <span>Mis Postulados</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>

                     <div class="col-xl-3 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <i class="icon-copy cyan font-large-2 float-xs-left"></i>
                                        </div>
                                        <div class="media-body text-xs-right">
                                            <h3 class="cyan">0</h3>
                                            <span>Mis Plantillas</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>

                     <div class="col-xl-3 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <i style="color: #ffbf00;" class="icon-star-full font-large-2 float-xs-left"></i>
                                        </div>
                                        <div class="media-body text-xs-right">
                                            <h3>Gold</h3>
                                            <span>Plan actual</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
 
                 </div>
            </div> 
        </div>
    </div>
   <?php include('includes/footer.php')?>
</body>
