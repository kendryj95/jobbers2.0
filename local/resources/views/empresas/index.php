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
                    <h2 class="content-header-title">
                        Basic Forms
                    </h2>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">
                                    Form Layouts
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="#">
                                    Basic Forms
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">
                                        Project Info
                                    </h4>
                                    <a class="heading-elements-toggle">
                                        <i class="icon-ellipsis font-medium-3">
                                        </i>
                                    </a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a data-action="collapse">
                                                    <i class="icon-minus4">
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-action="reload">
                                                    <i class="icon-reload">
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-action="expand">
                                                    <i class="icon-expand2">
                                                    </i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-action="close">
                                                    <i class="icon-cross2">
                                                    </i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                        <div class="card-text">
                                            <p>
                                                This is the most basic and default form having form sections. To add form section use
                                                <code>
                                                    .form-section
                                                </code>
                                                class with any heading tags. This form has the buttons on the bottom left corner which is the default position.
                                            </p>
                                        </div>
                                        <form class="form">
                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="icon-head">
                                                    </i>
                                                    Personal Info
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                First Name
                                                            </label>
                                                            <input class="form-control" id="projectinput1" name="fname" placeholder="First Name" type="text">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">
                                                                Last Name
                                                            </label>
                                                            <input class="form-control" id="projectinput2" name="lname" placeholder="Last Name" type="text">
                                                            </input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput3">
                                                                E-mail
                                                            </label>
                                                            <input class="form-control" id="projectinput3" name="email" placeholder="E-mail" type="text">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Contact Number
                                                            </label>
                                                            <input class="form-control" id="projectinput4" name="phone" placeholder="Phone" type="text">
                                                            </input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button class="btn btn-warning mr-1" type="button">
                                                    <i class="icon-cross2">
                                                    </i>
                                                    Cancel
                                                </button>
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="icon-check2">
                                                    </i>
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
   <?php include('includes/footer.php')?>
</body>
