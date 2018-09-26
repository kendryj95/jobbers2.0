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
        <link href="<?= $ruta;?>app-assets/css/core/menu/menu-types/vertical-menu.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $ruta;?>app-assets/css/core/menu/menu-types/vertical-overlay-menu.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $ruta;?>assets/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="vertical-layout vertical-menu 1-column blank-page blank-page" data-col="1-column" data-menu="vertical-menu" data-open="click">
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header no-border">
                                    <div class="card-title text-xs-center">
                                        <div class="p-1">
                                            <img alt="branding logo" src="<?= $ruta;?>app-assets/images/logo/jobbers_logo.png" style="height: 75px;"/>
                                        </div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                                        <span>
                                            Bienvenido
                                        </span>
                                    </h6>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                        <form action="index.html" class="form-horizontal form-simple" novalidate="">
                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                <input class="form-control form-control-lg input-lg" id="user-name" placeholder="Correo" required="" type="text">
                                                    <div class="form-control-position">
                                                        <i class="icon-email">
                                                        </i>
                                                    </div>
                                                </input>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input class="form-control form-control-lg input-lg" id="user-password" placeholder="Clave" required="" type="password">
                                                    <div class="form-control-position">
                                                        <i class="icon-key3">
                                                        </i>
                                                    </div>
                                                </input>
                                            </fieldset>
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">
                                                Ingresar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="">
                                        <p class="float-sm-left text-xs-center m-0">
                                            <a class="card-link" href="recuperacion">
                                                Recuperar clave
                                            </a>
                                        </p>
                                        <p class="float-sm-right text-xs-center m-0">
                                            Eres nuevo en jobbers?
                                            <a class="card-link" href="registro">
                                                Registrate
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <!-- BEGIN VENDOR JS-->
        <script src="<?= $ruta;?>app-assets/js/core/libraries/jquery.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/tether.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/unison.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/extensions/pace.min.js" type="text/javascript">
        </script>
        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN ROBUST JS-->
        <script src="<?= $ruta;?>app-assets/js/core/app-menu.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/js/core/app.js" type="text/javascript">
        </script>
        <!-- END ROBUST JS-->
        <!-- BEGIN PAGE LEVEL JS-->
        <!-- END PAGE LEVEL JS-->
    </body>
</html>
