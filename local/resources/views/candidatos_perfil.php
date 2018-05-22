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
            <!--fin Header responsive-->
            <!--Modal imagenes-->
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
            <div style="overflow: hidden;" class="modal fade" id="modal_imagenes" tabindex="-1" role="dialog" aria-labelledby="modal_imagenesLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="min-height: 65px;">
                            <h5 class="modal-title" id="modal_imagenesLabel">Mis imagenes
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body " style="padding: 0px;overflow-y: scroll;overflow-x: hidden;">
                            <div class="row">
                                <?php
                                foreach ($imagen as $key) {
                                $imagen = "0.jpg";
                                if (!$key->nombre_aleatorio == "") {
                                $imagen = $key->nombre_aleatorio;
                                }
                                echo ' <div class="col-sm-3 text-center" style="padding-top: 25px;">
                                    <a href="#"> <img onClick="set_imagen(' . $key->id . ',' . "'$key->nombre_aleatorio'" . ')" src="uploads/' . $imagen . '" data-dismiss="modal" style="max-width: 200px;max-height: 200px;"> </a>
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
            <script type="text/javascript">
            function set_imagen(id,parametro)
            {
            $("#input_imagen").val(id);
            set_imagen_val(id);
            $('#imagen_de_perfil').attr('src', 'uploads/'+parametro);
            }
            </script>
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
                                    $imagen = "seleccionar.jpg";
                                    if ($con_imagen == 1) {
                                    $imagen = $pic[0]->nombre_aleatorio;
                                    }
                                    ?>
                                    <span class="round"><a href="#" data-toggle="modal" data-target="#modal_imagenes"><img id="imagen_de_perfil" class="img-circle" src="uploads/<?php echo $imagen; ?>" style="border-radius: 50%;margin-top: 30px;height: 140px; width: 140px;"></a></span>
                                    <br>
                                    <a class="status" href="candimaletin" style="margin-top: 20px; font-size: 14px;text-decoration: none;">Subir imagen</a>
                                </div>
                                <div class="padding-left">
                                    <div class="manage-jobs-sec addscroll">
                                        <h3>Datos personales</h3>
                                    </div>
                                </div>
                                <?php
                                //Datos personales
                                $up_nombres="";
                                $up_apellidos="";
                                $up_edo_civil="";
                                $up_discapacidad="";
                                $up_sexo="";
                                $up_hijos="";
                                $up_nacionalidad="";
                                $up_t_id="";
                                $up_id="";
                                $up_fecha="";
                                $up_desc="";
                                if($bandera_datos_personales==1)
                                {
                                $up_nombres=$datos_personales_up[0]->nombres;
                                $up_apellidos=$datos_personales_up[0]->apellidos;
                                $up_edo_civil=$datos_personales_up[0]->id_edo_civil;
                                $up_discapacidad=$datos_personales_up[0]->id_discapacidad;
                                $up_sexo=$datos_personales_up[0]->id_sexo;
                                $up_hijos=$datos_personales_up[0]->hijos;
                                $up_nacionalidad=$datos_personales_up[0]->id_nacionalidad;
                                $up_t_id=$datos_personales_up[0]->id_tipo_identificacion;
                                $up_id=$datos_personales_up[0]->n_identificacion;
                                $up_fecha=$datos_personales_up[0]->fecha_nac;
                                $up_desc=$datos_personales_up[0]->sobre_mi;
                                
                                }
                                ?>
                                <div class="profile-form-edit">
                                    <form action="candidatosper" method="POST">
                                        <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Nombres</span>
                                                <div class="pf-field">
                                                    <input value="<?php echo $up_nombres;?>" name="nombres" type="text" placeholder="Victor" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Apellidos</span>
                                                <div class="pf-field">
                                                    <input value="<?php echo $up_apellidos;?>" name="apellidos" type="text" placeholder="Fernández" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Identificación</span>
                                                <div class="pf-field">
                                                    <select id="tipo_id" name="t_id" name="sexo" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <?php foreach ($identificacion as $key ) {
                                                        echo'<option id="tipo_id_'.$key->id.'" value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Nº de identificación</span>
                                                <div class="pf-field">
                                                    <input value="<?php echo $up_id;?>" name="id" type="text" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Estado civil</span>
                                                <div class="pf-field">
                                                    <select id="edo_civil" name="edo_civil" name="sexo" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Soltero</option>
                                                        <?php foreach ($edo as $key) {
                                                        echo '<option id="edo_civil_'.$key->id.'" value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <span class="pf-title">Discapacidad</span>
                                                <div class="pf-field">
                                                    <select id="discapacidad" name="discapacidad" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <?php foreach ($discapacidad as $key) {
                                                        echo '<option id="discapacidad_'.$key->id.'" value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Sexo</span>
                                                <div class="pf-field">
                                                    <select id="sexo" name="sexo" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <?php foreach ($generos as $key) {
                                                        echo '<option id="sexo_'.$key->id.'" value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Fecha de nacimiento</span>
                                                <div class="pf-field">
                                                    <input value="<?php echo $up_fecha;?>" name="fecha_nac" type="date" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Hijos</span>
                                                <div class="pf-field">
                                                    <select id="hijos" name="hijos" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <option id="hijos_0" value="0">Sin hijos</option>
                                                        <option id="hijos_1" value="1">1</option>
                                                        <option id="hijos_2" value="2">2</option>
                                                        <option id="hijos_3" value="3">3</option>
                                                        <option id="hijos_4" value="4">4</option>
                                                        <option id="hijos_5" value="5">5</option>
                                                        <option id="hijos_6" value="6">+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Nacionalidad</span>
                                                <div class="pf-field">
                                                    <select id="nacionalidad" name="nacionalidad" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <?php foreach ($paises as $key) {
                                                        echo '<option id="nacionalidad_'.$key->id.'" value="'.$key->id.'">'.$key->nacionalidad.'</option> ';
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <span class="pf-title">¿Cómo te describes?</span>
                                                <div class="pf-field">

                                                    <textarea name="sobremi"><?php echo trim($up_desc);?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <button type="submit">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="social-edit">
                                        <h3>Preferencias laborales</h3>
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <span class="pf-title">Remuneración Pretendida</span>
                                                    <div class="pf-field">
                                                        <select name="sexo" data-placeholder="Allow In Search" class="chosen">
                                                            <option value="">Seleccionar</option>
                                                            <option value="">Masculino</option>
                                                            <option value="">Femenino</option>
                                                            <option value="">Otros</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="pf-title">Jornada</span>
                                                    <div class="pf-field">
                                                        <select name="sexo" data-placeholder="Allow In Search" class="chosen">
                                                            <option value="">Seleccionar</option>
                                                            <option value="">Diurna</option>
                                                            <option value="">Nocturna</option>
                                                            <option value="">Mixta</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="pf-title">Cargo</span>
                                                    <div class="pf-field">
                                                        <select name="sexo" data-placeholder="Allow In Search" class="chosen">
                                                            <option value="">Seleccionar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="social-edit">
                                    <h3>Redes sociales</h3>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Facebook</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="www.facebook.com/TeraPlaner" />
                                                    <i class="fa fa-facebook"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Twitter</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="www.twitter.com/TeraPlaner" />
                                                    <i class="fa fa-twitter"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Google</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="www.google-plus.com/TeraPlaner" />
                                                    <i class="la la-google"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Linkedin</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="www.Linkedin.com/TeraPlaner" />
                                                    <i class="la la-linkedin"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="contact-edit">
                                    <h3>Información de contácto</h3>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <span class="pf-title">Teléfono</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="+90 538 963 58 96" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Correo</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="demo@jobhunt.com" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Sitio Web</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="www.jobhun.com" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">País</span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Please Select Specialism" class="chosen">
                                                        <option>Web Development</option>
                                                        <option>Web Designing</option>
                                                        <option>Art & Culture</option>
                                                        <option>Reading & Writing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Provincia</span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Please Select Specialism" class="chosen">
                                                        <option>Web Development</option>
                                                        <option>Web Designing</option>
                                                        <option>Art & Culture</option>
                                                        <option>Reading & Writing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Localidad</span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Please Select Specialism" class="chosen">
                                                        <option>Web Development</option>
                                                        <option>Web Designing</option>
                                                        <option>Art & Culture</option>
                                                        <option>Reading & Writing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6" style="margin-top: 15px;">
                                                <span class="pf-title">Pocisión geográfica</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="Collins Street West, Victoria 8007, Australia." />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="pf-title">Latitud</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="41.1589654" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="pf-title">Longitud</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="21.1589654" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="padding-left" style="margin-bottom: 100px;margin-top: -50px;">
                                    <div class="manage-jobs-sec">
                                        <div class="border-title"><h3>Educación</h3><a href="#" title=""><i class="la la-plus"></i> Agregar estudios</a></div>
                                        <div class="edu-history-sec">
                                            <div class="edu-history">
                                                <i class="la la-graduation-cap"></i>
                                                <div class="edu-hisinfo">
                                                    <h3>University</h3>
                                                    <i>2008 - 2012</i>
                                                    <span>Middle East Technical University <i>Computer Science</i></span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                </div>
                                                <ul class="action_job">
                                                    <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                    <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="border-title"><h3>Exprriencia laboral</h3><a href="#" title=""><i class="la la-plus"></i> Agregar experiencia</a></div>
                                        <div class="edu-history-sec">
                                            <div class="edu-history style2">
                                                <i></i>
                                                <div class="edu-hisinfo">
                                                    <h3>Web Designer <span>Inwave Studio</span></h3>
                                                    <i>2008 - 2012</i>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                </div>
                                                <ul class="action_job">
                                                    <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                    <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="border-title"><h3>Portafolio</h3><a href="#" title=""><i class="la la-plus"></i> Agregar a portafolio</a></div>
                                        <div class="mini-portfolio">
                                            <div class="mp-row">
                                                <div class="mp-col">
                                                    <div class="mportolio"><img src="http://placehold.it/165x115" alt=""><a href="#" title=""><i class="la la-search"></i></a></div>
                                                    <ul class="action_job">
                                                        <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                        <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="mp-col">
                                                    <div class="mportolio"><img src="http://placehold.it/165x115" alt=""><a href="#" title=""><i class="la la-search"></i></a></div>
                                                    <ul class="action_job">
                                                        <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                        <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="mp-col">
                                                    <div class="mportolio"><img src="http://placehold.it/165x115" alt=""><a href="#" title=""><i class="la la-search"></i></a></div>
                                                    <ul class="action_job">
                                                        <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                        <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="mp-col">
                                                    <div class="mportolio"><img src="http://placehold.it/165x115" alt=""><a href="#" title=""><i class="la la-search"></i></a></div>
                                                    <ul class="action_job">
                                                        <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                        <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-title"><h3>Habilidades</h3><a href="#" title=""><i class="la la-plus"></i> Agregar habilidad</a></div>
                                        <div class="social-edit" style="margin-bottom: 0px;">
                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        
                                                        <div class="pf-field no-margin" style="margin-top: 10px;">
                                                            <ul class="tags">
                                                                <li class="addedTag">Photoshop<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Photoshop"></li>
                                                                <li class="addedTag">Digital & Creative<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Digital"></li>
                                                                <li class="addedTag">Agency<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Agency"></li>
                                                                <li class="tagAdd taglist">
                                                                    <input type="text" id="search-field">
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="progress-sec" style="margin-bottom: 0px;">
                                            <div class="progress-sec with-edit">
                                                <span>Adobe Photoshop</span>
                                                <div class="progressbar"> <div class="progress" style="width: 80%;"><span>80%</span></div> </div>
                                                <ul class="action_job">
                                                    <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="progress-sec with-edit">
                                                <span>Production In Html</span>
                                                <div class="progressbar"> <div class="progress" style="width: 60%;"><span>60%</span></div> </div>
                                                <ul class="action_job">
                                                    <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="progress-sec with-edit">
                                                <span>Graphic Design</span>
                                                <div class="progressbar"> <div class="progress" style="width: 75%;"><span>75%</span></div> </div>
                                                <ul class="action_job">
                                                    <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="social-edit">
                                                    <form>
                                                        <button type="submit">Guardar</button>
                                                    </form></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-title" style="margin: 0px;margin-top: -50px;"><h3>Idiomas</h3><a href="#" title=""><i class="la la-plus"></i> Agregar idioma</a></div>
                                    <div class="social-edit">
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-12" style="margin-top: 20px;">
                                                    
                                                    <div class="pf-field no-margin" style="margin-top: 10px;">
                                                        <ul class="tags">
                                                            <li class="addedTag">Ingles<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Photoshop"></li>
                                                            <li class="addedTag">Francés<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="tags[]" value="Digital"></li>
                                                            <li class="tagAdd taglist">
                                                                <input type="text" id="search-field">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="progress-sec" style="margin-bottom:100px;">
                                        <div class="progress-sec with-edit">
                                            <span>Inglés</span>
                                            <div class="progressbar"> <div class="progress" style="width: 80%;"><span>80%</span></div> </div>
                                            <ul class="action_job">
                                                <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="progress-sec with-edit">
                                            <span>Francés</span>
                                            <div class="progressbar"> <div class="progress" style="width: 60%;"><span>60%</span></div> </div>
                                            <ul class="action_job">
                                                <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="social-edit">
                                                <form>
                                                    <button type="submit">Guardar</button>
                                                </form></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include "local/resources/views/includes/aside_right_administrator.php";?>
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
    function set_imagen_val(id) {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
    url: 'candisetprofilepic',
    type: 'post',
    data:{id_imagen:id},
    success: function(data) {
    }
    })
    }
    function set_select(id,valor)
    {
    $("#"+id).val(valor);   
    $('#'+id+'_chosen > a > span').html($("#"+id+"_"+valor).html());
    }
    </script>

   <script type="text/javascript"> 
      <?php echo "set_select('tipo_id',".$up_t_id.");";?>
      <?php echo "set_select('sexo',".$up_sexo.");";?>
      <?php echo "set_select('discapacidad',".$up_discapacidad.");";?>
      <?php echo "set_select('hijos',".$up_hijos.");";?>
      <?php echo "set_select('nacionalidad',".$up_nacionalidad.");";?>
      <?php echo "set_select('edo_civil',".$up_edo_civil.");";?>
   </script>
</body>
</html>