<?php
$mi_tokken = csrf_token();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'local/resources/views/includes/referencias_top.php';?>
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
        <link rel="stylesheet" href="local/resources/views/css/icons.css">
        <link rel="stylesheet" href="local/resources/views/css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
        <meta name="csrf-token" content="<?php echo $mi_tokken; ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
        <div class="theme-layout" id="scrollup">
            <!--Header responsive-->
            <?php include 'local/resources/views/includes/header_responsive_candidatos.php';?>
            <?php include 'local/resources/views/includes/header_candidatos.php';?>
            <style type="text/css">
            @media (min-width: 576px) {
            .modal-dialog {
            max-width: none;
            }
            }
            .modal-dialog {
            width: 99%;
            margin-right: 0px;
            height: 95%;
            }
            .modal-content {
            height: 95%;
            }
            </style>
            <!-- Modal -->
            <form id="form_cv" action="agregarcv" method="POST">
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <input id="cvindentificador"  type="hidden" name="cv">
            </form>
            <form id="form_cv_update" action="candiselectsv" method="POST">
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <input id="cvupiden"  type="hidden" name="cv">
            </form>
            <div style="overflow: hidden;" class="modal fade" id="modal_imagenes" tabindex="-1" role="dialog" aria-labelledby="modal_imagenesLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="min-height: 65px;">
                            <h5 class="modal-title" id="modal_imagenesLabel">Mis archivos
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body " style="padding: 0px;overflow-y: scroll;overflow-x: hidden;">
                            <div class="row">
                                <?php
                                foreach ($datos_cv as $key) {
                                $datos_cv = "0.jpg";
                                if (!$key->nombre_aleatorio == "") {
                                $datos_cv = $key->nombre_aleatorio;
                                }
                                echo ' <div class="col-sm-3 text-center" style="padding-top: 25px;">
                                    <a href="#"> <img src="local/resources/views/images/files/' . $key->extencion . '.png" data-dismiss="modal" style="max-width: 100px;max-height: 100px;"> </a><br>
                                    <a>'.$key->alias.'</a><br>
                                    <a onClick="set_cv('.$key->id.')" style="color:#fff;" class="btn btn-xs btn-primary">Agregar curriculum</a> <br>
                                </div> ';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Fin modal imagenes-->
            
            <section>
                <div class="block no-padding">
                    <div class="container">
                        <div class="row no-gape">
                            <?php include 'local/resources/views/includes/aside_candidatos.php';?>
                            <div class="col-lg-9 column">
                                <div class="padding-left">
                                    <div class="manage-jobs-sec addscroll">
                                        <h3>Mi perfil</h3>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <?php
                                    $datos_cv = "local/resources/views/images/cv.png";
                                    ?>
                                    <span class="round"><a href="#" data-toggle="modal" data-target="#modal_imagenes">
                                    <img id="imagen_de_perfil" class="img-circle" src="<?php echo $datos_cv;?>" style="border-radius: 10%;margin-top: 30px;height: 140px; width: 140px;"></a></span>
                                    <br>
                                    <a class="status" href="candimaletin" style="margin-top: 20px; font-size: 14px;text-decoration: none;">Subir curriculums</a>
                                </div>
                                <div class="padding-left">
                                    <div class="manage-jobs-sec addscroll">
                                        <h3>Mis curriculums</h3>
                                    </div>
                                </div>
                                <div class="manage-jobs-sec addscroll">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td style="width: 60%;">Alias</td>
                                                <td style="width: 10%;"">Formato</td>
                                                <td  style="width: 10%;">Mostrar</td> 
                                                <td  style="width: 10%;">Eliminar</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php foreach  ($datos_mi_cv as $key): ?>
                                            <?php
                                            $alias="<i style='font-size:15px;'>*Sin alias</i>";
                                            $mostrar="";
                                            if($key->alias!="")
                                            {
                                                $alias=$key->alias;
                                            }
                                             if($key->mostrar!="0")
                                            {
                                                $mostrar="checked";
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $alias;?></td>
                                                <td><?php echo $key->extencion;?></td>
                                                <td><div class="form-check">
                                                    <input <?php echo $mostrar;?> onClick="set_cv_up(<?php echo $key->id_cv;?>)" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1_<?php echo $key->id;?>" value="option1">
                                                    <label class="form-check-label" for="exampleRadios1_<?php echo $key->id;?>">
                                                    </label>
                                                </div></td>
                                                <td class="text-center"><a href="candidelcv/<?php echo $key->id;?>"><i class="la la-trash"></i></a></td>
                                            </tr>
                                            <?php endforeach ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include "local/resources/views/includes/general_footer.php";?>
    <script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
    <script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
    <script src="local/resources/views/js/script.js" type="text/javascript"></script>
    <script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
    <script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
    <script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
    <script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
    <script src="local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
    <?php include "local/resources/views/includes/referencias_down.php";?>
    
    <script type="text/javascript">
    function set_cv(id)
    { 
    $("#cvindentificador").val(id);
    $("#form_cv").submit();
    }
    function set_cv_up(id)
    { 
    $("#cvupiden").val(id);
    $("#form_cv_update").submit();
    }

    </script>
</body>
</html>