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
                                <div class="profile-form-edit">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Full Name</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="Ali TUFAN" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Job Title</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="UX / UI Designer" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Allow In Search</span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Allow In Search" class="chosen">
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Minimum Salary</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="$4250" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Experience</span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Allow In Search" class="chosen">
                                                        <option>2-6 Years</option>
                                                        <option>6-12 Years</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Age</span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Allow In Search" class="chosen">
                                                        <option>22-30 Years</option>
                                                        <option>30-40 Years</option>
                                                        <option>40-50 Years</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="pf-title">Current Salary($) min</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="20K" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="pf-title">Max</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="30K" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="pf-title">Expected Salary($) min</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="30k" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="pf-title">Max</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="40K" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Education Levels</span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Please Select Specialism" class="chosen">
                                                        <option>Diploma</option>
                                                        <option>Inter</option>
                                                        <option>Bachelor</option>
                                                        <option>Graduate</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Languages</span>
                                                <div class="pf-field">
                                                    <div class="pf-field">
                                                        <select data-placeholder="Please Select Specialism" class="chosen">
                                                            <option>English</option>
                                                            <option>German</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <span class="pf-title">Categories</span>
                                                <div class="pf-field no-margin">
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
                                            <div class="col-lg-12">
                                                <span class="pf-title">Description</span>
                                                <div class="pf-field">
                                                    <textarea>Spent several years working on sheep on Wall Street. Had moderate success investing in Yugos on Wall Street. Managed a small team buying and selling pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed severalnew methods for working with banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer ollaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="social-edit">
                                    <h3>Social Edit</h3>
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
                                        </div>
                                    </form>
                                </div>
                                <div class="contact-edit">
                                    <h3>Contact</h3>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <span class="pf-title">Phone Number</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="+90 538 963 58 96" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Email</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="demo@jobhunt.com" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Website</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="www.jobhun.com" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Country</span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Please Select Specialism" class="chosen">
                                                        <option>Web Development</option>
                                                        <option>Web Designing</option>
                                                        <option>Art & Culture</option>
                                                        <option>Reading & Writing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">City</span>
                                                <div class="pf-field">
                                                    <select data-placeholder="Please Select Specialism" class="chosen">
                                                        <option>Web Development</option>
                                                        <option>Web Designing</option>
                                                        <option>Art & Culture</option>
                                                        <option>Reading & Writing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Find On Map</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="Collins Street West, Victoria 8007, Australia." />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="pf-title">Latitude</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="41.1589654" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <span class="pf-title">Longitude</span>
                                                <div class="pf-field">
                                                    <input type="text" placeholder="21.1589654" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="padding-left" style="margin-bottom: 100px;">
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
                                        <div class="border-title"><h3>Expriencia laboral</h3><a href="#" title=""><i class="la la-plus"></i> Agregar experiencia</a></div>
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
                                        <div class="progress-sec">
                                            <div class="progress-sec with-edit">
                                                <span>Adobe Photoshop</span>
                                                <div class="progressbar"> <div class="progress" style="width: 80%;"><span>80%</span></div> </div>
                                                <ul class="action_job">
                                                    <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                    <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="progress-sec with-edit">
                                                <span>Production In Html</span>
                                                <div class="progressbar"> <div class="progress" style="width: 60%;"><span>60%</span></div> </div>
                                                <ul class="action_job">
                                                    <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                    <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="progress-sec with-edit">
                                                <span>Graphic Design</span>
                                                <div class="progressbar"> <div class="progress" style="width: 75%;"><span>75%</span></div> </div>
                                                <ul class="action_job">
                                                    <li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
                                                    <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
                                                </ul>
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
    </script>
</body>
</html>