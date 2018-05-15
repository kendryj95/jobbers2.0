 <!DOCTYPE html>
<html>

<head>
    <?php include('local/resources/views/includes/referencias_top.php');?>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
        <link rel="stylesheet" href="local/resources/views/css/icons.css">
        <link rel="stylesheet" href="local/resources/views/css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)"> 
 
    <div class="theme-layout" id="scrollup">

        <!--Header responsive-->
        <?php include('local/resources/views/includes/header_responsive_candidatos.php');?>
        <?php include('local/resources/views/includes/header_candidatos.php');?>
                <!--fin Header responsive-->

                

                <section>
                    <div class="block no-padding">
                        <div class="container">
                            <div class="row no-gape">
                                <?php include("includes/aside_candidatos.php");?>
                                    <div class="col-lg-9 column">
                                        <div class="">
                                            <div class="profile-title">
                                                <h3>Soporte</h3>
                                            </div> 
                                            <div class="profile-form-edit">
                                                <form action="publiacionescreg" method="POST">
                                                   
                                                    <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                                                    <div class="row"> 
                                                         
                                                        <div class="col-lg-12">
                                                            <span class="pf-title">Título</span>
                                                            <div class="pf-field">
                                                                <input name="direccion" type="text" placeholder="¿Con qué tiene problemas?">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12" style="margin-top: -20px;">
                                                            <span class="pf-title">Expliquenos cuál es su problema.</span>
                                                            <div class="pf-field">
                                                                <textarea placeholder="Detalle..." name="descripcion" style="resize: none;min-height: 75px;padding: 10px;"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12" style="margin-bottom: 50px;">
                                                            <button type="submit">Agregar</button>
                                                        </div> 
                                                    </div>
                                                </form>
                                                 <!--Desde aqui-->
                                                        <div class="manage-jobs-sec addscroll"> 
                                                            <!--Top candidatos-->
                                                            <h3 style="margin-top:-25px;">Seguimiento</h3>
                                                            <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <td>#</td>
                                                                            <td>Tikect</td>
                                                                            <td>Estatus</td>
                                                                            <td>Mensajes</td> 
                                                                            <td>Action</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody> 
                                                                        <tr>
                                                                            <td>
                                                                                <span class="applied-field">1.</span><br> 
                                                                            </td>
                                                                            <td>
                                                                                <span class="status">A48S9569</span><br> 
                                                                            </td>
                                                                            <td>
                                                                                <span class="applied-field">Pendiente...</span><br>
                                                                                
                                                                            </td> 
                                                                            <td>
                                                                                <span class="status active">+5</span>
                                                                            </td>
                                                                            <td>
                                                                                <ul class="action_job">
                                                                                    <li><span>Ver estado</span><a href="#" title=""><i class="la la-eye"></i></a></li>
                                                                                </ul>
                                                                            </td>
                                                                        </tr> 
                                                                    </tbody>
                                                                </table>
                                <!--Fin Top candidatos-->

                                 
                            </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
        <?php include("local/resources/views/includes/general_footer.php");?>

        <script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
        <script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
        <script src="local/resources/views/js/script.js" type="text/javascript"></script>
        <script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
        <script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
        <script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
        <script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
        <script src="local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
        <?php include("local/resources/views/includes/referencias_down.php");?>
            
</body>

</html>