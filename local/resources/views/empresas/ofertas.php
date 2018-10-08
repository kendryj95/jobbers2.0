<?php
function select_options($habilidades_json){
    $selected = array();
    $output = '';
    foreach(json_decode($habilidades_json) as $item){
        $output.= '<option value="' . $item->descripcion . '"' . (in_array($item->descripcion, $selected) ? ' selected' : '') . '>' . $item->text . '</option>';
    }
    return $output;
}
?> 
<!DOCTYPE html>
<?php $ruta='../local/resources/views/empresas/';?>
<html class="loading" data-textdirection="ltr" lang="es">
    <head>
       <?php include('includes/referencias-top.php');?>
        <link rel="stylesheet" href="<?= $ruta?>plugins/summernote-master/dist/summernote-lite.css">
       <style type="text/css" media="screen">
           .sp{
            padding: 0px;
           }
           a{
            color: #00009b;
            font-weight: 600; 
           }
           .label-info {
                background-color: #00af37
            }
            .badge-success
            {
                background-color: #00b758;
                color: #fff;
                padding-left: 5px;
                padding-right: 5px;
                border-radius: 5px; 
            }.tokens-container > li
            {
                background-color: #fff;
            }
             .listado-postulados
            {
               border-right: 1px solid #ddd;
               border-bottom: 1px solid #ddd;
               padding: 4px;
            }
             .listado-postulados span
            {
               padding-left: 10px;
            }
            .listado-postulados:hover
            {
                background-color: #e9ebee;
                cursor: pointer; 
            }
            #informacion_general ul li{margin-bottom:-8px;}
            {

            }

            html,body{
                overflow-x: hidden;  
                height:100%; 
                width:101%; 
                margin: 0px; 
                padding: 0px; 
            }

            ::-webkit-scrollbar {
                width: 3px;
                height: 30px; 
            }
            ::-webkit-scrollbar-button {
                background: #ccc
            }
            ::-webkit-scrollbar-track-piece {
                background: #ededed
            }
            ::-webkit-scrollbar-thumb {
                background: #bababa
            }​
       </style>
      <link href="<?= $ruta?>plugins/tag/tokenize2.css" rel="stylesheet" /> 
    </head>
</html>
<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-col="2-columns" data-menu="vertical-menu" data-open="click">
    <?php include('includes/nav.php')?>
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <!--Aside-->
        <?php include('includes/aside.php')?>
    </div>
    <!-- / main menu-->

    <div id="modal_loader" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" > 
          <div class="modal-content" > 
            <div class="modal-body" style="text-align: center;">
               <img src="<?=$ruta?>app-assets/images/icons/load.gif">
               <h3>Por favor espere...</h3>
            </div> 
          </div> 
        </div>
      </div>


    <div class="app-content content container-fluid">
        <div class="content-wrapper" style="margin-right: 20px;">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">
                        Ofertas
                    </h2>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo Request::root()?>/empresas/panel">
                                    Inicio
                                </a>
                            </li> 
                            <li class="breadcrumb-item active">
                                <a href="#">
                                    Ofertas
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
                                     <h4 class="card-title" id="basic-layout-form">  <i class="icon-profile">
                                        </i>Postulados

                                     </h4>
                                     <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                     <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                           <li><a data-action="expand" id="expand"><i class="icon-expand2"></i></a></li>
                                           <li><a id="btn-postulados" data-action="collapse"><i class="icon-minus4"></i></a></li>
                                        </ul>
                                     </div>
                                  </div>
                                  <div class="card-body collapse" id="contenedor_postulados">
                                     <div class="card-block sp"  style="padding-top: 0px;">
                                        <form class="form" id="form-imagen" enctype="multipart/form-data" method="POST">
                                           <div class="form-body">
                                              <div class="row">
                                                 <div class="col-md-12">
                                                    <div class="card-body">
                                                       <div class="col-sm-3 sp" style="" >
                                                        <div class="row">
                                                          <div class="col-sm-12">
                                                          <ul class="nav navbar-nav" style="text-align: right;">
                                                           <li class=""><a style="" href="#" data-toggle="dropdown" class="nav-link dropdown-user-link" aria-expanded="true"></i><img src="<?= $ruta?>app-assets/images/icons/sort.png" alt=""></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                              <a href="#" class="dropdown-item"><i class="icon-check"></i> Marcador 1</a>
                                                              <a href="#" class="dropdown-item"><i class="icon-check"></i> Marcador 2</a>
                                                              <a href="#" class="dropdown-item"><i class="icon-check"></i> Marcador 3</a>
                                                              <div class="dropdown-divider"></div>
                                                              <a href="#" class="dropdown-item"><i class="icon-file-text"></i> No leidos</a>
                                                            </div>
                                                          </li>
                                                         </ul>
                                                        </div>
                                                          <div class="col-sm-12">
                                                          <select style="margin-bottom: 15px;" onChange="get_postulados(this.value)" id="select_ofertas" class="form-control"> 
                                                          </select>
                                                        </div>
                                                        
                                                        </div> 
                                                          <ul id="candidatos_list" style="list-style: none;margin: 0px;padding: 0px;height: 500px;overflow-x:hidden;">
                                                             
                                                          </ul>
                                                       </div>
                                                       <div id="cv_list_home" class="col-sm-9 sp" style="background-image: url(<?= $ruta;?>app-assets/images/logo/bg-3.png);overflow-x: hidden;padding-bottom: 50px;padding-top: 100px;text-align: center;">
                                                        <img src="<?= $ruta;?>app-assets/images/logo/postulados.png" alt="">
                                                       </div>
                                                       <div id="cv_list" class="col-sm-9 sp" style="background-image: url(<?= $ruta;?>app-assets/images/logo/bg-3.png);overflow-x: hidden;padding-bottom: 50px;display: none;">
                                                          <div class="col-sm-12 sp" style="text-align: center;padding: 15px;overflow-wrap: break-word">
                                                             <img class="info-cv-imagen" style="width: 100px;height: 100px;border-radius: 50%;" src="https://www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png">
                                                             <br><br>
                                                             <span class="info-cv info-cv-nombre" style="margin-top: 10px;color: #fff;background-color: #306bff;border-radius: 5px;padding-right: 5px;padding-left: 5px;">Victor Fernández</span>
                                                             <br>
                                                             <p class="info-cv info-cv-sobre-mi" style="padding: 10px;background-color: #fff;border:1px solid #e4e4e4;  border-radius: 10px;margin-top: 10px;">Soy una persona dinámicay pro activa con muchas ganas de salir adelante. Soy perfeccionista soy de los que cree firmemente que porque hacer las cosas bien cuando se pueden hacer excelentes.</p>
                                                             <div class="col-sm-12" style="text-align: center;">
                                                                <h5 style="">Marcadores</h5>
                                                                <button class="btn btn-sm btn-warning">Marcador 1</button>
                                                                <button class="btn btn-sm btn-warning">Marcador 2</button>
                                                                <button class="btn btn-sm btn-warning">Marcador 3</button>
                                                                <button class="btn btn-sm btn-danger">Descartar</button>
                                                             </div>
                                                          </div>
                                                          <div class="col-sm-12" id="informacion_general">
                                                             <h5>Información General</h5>
                                                             <div class="col-sm-12 sp" style="background-color: #fff; border:1px solid #e4e4e4;  border-radius: 10px;">
                                                                <div class="col-sm-6 sp">
                                                                   <ul style="list-style: none;padding-left: 10px;">
                                                                      <li><strong>Nombre:</strong> <span class="info-cv info-cv-nombre"></span></li>
                                                                      <li><strong>Correo:</strong> <span class="info-cv info-cv-correo"></span></li>
                                                                      <li><strong>Teléfono:</strong> <span class="info-cv info-cv-telefono"></span></li>
                                                                      <li><strong>DNI:</strong> <span class="info-cv info-cv-dni"></span></li>
                                                                      <li><strong>Cuil:</strong> <span class="info-cv info-cv-cuil"></span></li>
                                                                      <li><strong>Nacionalidad:</strong> <span class="info-cv info-cv-nacionalidad"></span></li>
                                                                      <li><strong>Direccion:</strong><span class="info-cv info-cv-direccion"></span></li>
                                                                      <li>&nbsp;</li>
                                                                   </ul>
                                                                </div>
                                                                <div class="col-sm-6 sp">
                                                                   <ul style="list-style: none;padding-left: 10px;">
                                                                      <li><strong>Fecha de nacimiento:</strong><span class="info-cv info-cv-fecha-nacimiento"></span></li>
                                                                      <li><strong>Edad:</strong><span class="info-cv info-cv-edad"></span></li>
                                                                      <li><strong>Sexo: </strong> <span class="info-cv info-cv-sexo"></span></li>
                                                                      <li><strong>Discapacidad:</strong> <span class="info-cv info-cv-discapacidad"></span></li>
                                                                      <li><strong>Estado civil:</strong> <span class="info-cv info-cv-edo-civil"></span></li>
                                                                      <li><strong>Hijos:</strong> <span class="info-cv info-cv-hijos"></span></li>
                                                                      <li>&nbsp;</li>
                                                                   </ul>
                                                                </div>
                                                             </div>
                                                          </div>
                                                          <div class="col-sm-12" style="margin-top: 20px;">
                                                             <h5>Experiencia Laboral</h5>
                                                             <div class="col-sm-12 sp info-cv info-cv-experiencia" style="background-color: #ebeef2;border: 1px solid #c7d1de; border-radius: 10px;">
                                                                
                                                             </div>
                                                          </div> 
                                                          <div class="col-sm-12" style="margin-top: 20px;">
                                                             <h5>Educación</h5>
                                                             <div class="col-sm-12 sp info-cv info-cv-educacion" style="background-color: #ebeef2;border: 1px solid #c7d1de; border-radius: 10px;"> 
                                                             </div>
                                                          </div> 


                                                          <div class="col-sm-12" style="margin-top: 20px;">
                                                             <h5>Preferencias laborales</h5>
                                                             <div class="col-sm-12 sp" style="background-color: #ebeef2;border: 1px solid #c7d1de; border-radius: 10px;">
                                                                <div class="col-sm-2 sp" style="text-align: center;padding-top: 15px;padding-bottom: 15px;">
                                                                    <img style="height: 80px;" src="<?=$ruta?>app-assets/images/icons/postulados/questions.png" alt="">
                                                                </div>

                                                                <div class="col-sm-3" style="padding-top: 15px; text-align: center;">
                                                                   <h5>Salario Pretendido: 
                                                                    <span class="info-cv info-cv-salario"></span>

                                                                    <span class="tag tag-info" style="margin-top: 5px;"></span></h5>
                                                               </div>
                                                               <div class="col-sm-3" style="padding-top: 15px; text-align: center;">
                                                                   <h5>Tipo de Jornada: <br>
                                                                    <span class="info-cv info-cv-jornada"></span>
                                                                   </h5>
                                                                </div>
                                                                <div class="col-sm-3" style="padding-top: 15px; text-align: center;">
                                                                   <h5>Cargos pretendidos: <br>
                                                                    <span class="info-cv info-cv-cargos"></span>
                                                                    </h5> 
                                                                </div>
                                                             </div>
                                                          </div> 

                                                          <div class="col-sm-12" style="margin-top: 20px;">
                                                             <h5>Habilidades</h5>
                                                             <div   class="col-sm-12 sp info-cv info-cv-habilidades" style="background-color: #fff;">
                                                                  
                                                              </div>
                                                          </div> 

                                                           <div class="col-sm-12" style="margin-top: 20px;">
                                                             <h5>Idiomas</h5>
                                                             <div class="col-sm-12 sp info-cv info-cv-idiomas" style="background-color: #fff;">
                                                                 
                                                              </div>
                                                          </div> 


                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                           </div>
                                        </form>
                                     </div>
                                  </div>
                               </div>
                            </div> 
                       <div class="col-md-12">
                            <div class="card"> 
                                <div class="card-body collapse in">
                                    <div class="card-block"  style="padding-top: 0px;"> 
                                        <form class="form" id="form-imagen" enctype="multipart/form-data" method="POST">
                                            <div class="form-body">
                                                <h4 class="form-section">
                                                  
                                                    Mis ofertas
                                                    <span id="total" style="float: right;">0</span>
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-12" >    
                                                       <div class="card-body">
                                                        <!--Inicio de tabla-->
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                <thead>
                                                                    <tr style="background-color: #eff4f6;">
                                                                        <th style="padding: 0px;border-bottom: 0px;font-weight: 600;">Alias</th> 
                                                                        <th style="padding: 0px;width: 100px;border: 0px;font-weight: 600;border-bottom: 0px;font-weight: 600;">Postulados</th>
                                                                        <th style="padding: 0px;width: 100px;border: 0px;font-weight: 600;">Vistas</th>
                                                                        <th style="padding: 0px;width: 100px;border: 0px;font-weight: 600;">Estatus</th>
                                                                        <th style="padding: 0px;width: 100px;border: 0px;font-weight: 600;">Opciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tabla-resumen"> 
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--Fin de tabla-->
                                                    </div>
                                                    </div> 
                                                </div> 
                                            </div> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                         <div class="col-md-12">
                            <div class="card"> 
                                <div class="card-body collapse in">
                                    <div class="card-block"  style="padding-top: 0px;"> 
                                        <form class="form" id="form-imagen" enctype="multipart/form-data" method="POST">
                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="icon-plus">
                                                    </i>
                                                   <span id="titulo_oferta"> Nueva Oferta </span>
                                                   <span class="btn btn-xs btn-danger" style="float: right;height: 20px;padding: 0px;margin-top: 10px;display: none;" onClick="nueva()" id="btn_nueva">Ya no quiero editar</span>
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-4" > 
                                                        <div class="form-group">
                                                            <label>Alias</label>
                                                            <textarea id="tipo_oferta" name="" style="height: 35px;resize: none;overflow-y: hidden;display: none;" class="form-control">1</textarea>
                                                            <textarea id="publicacion" name="" style="height: 35px;resize: none;overflow-y: hidden;display: none;" class="form-control">0</textarea>
                                                       
                                                            <textarea id="alias" placeholder="Ejemplo: Secretaria para Daniel" name="" style="height: 35px;resize: none;overflow-y: hidden;" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4" > 
                                                        <div class="form-group">
                                                            <label>Título</label>
                                                            <textarea id="titulo"  placeholder="Ejemplo: Se solicita secretaria" name="" style="height: 35px;resize: none;overflow-y: hidden;" class="form-control"></textarea>
                                                         </div>
                                                    </div>
                                                        </div> 
                                                     <div class="col-md-12" style="padding: 0px;"> 
                                                        <div class="form-group">   
                                                            <label>Descripción</label>
                                                            <div id="descripcion"  class="summernote"></div>
                                                        </div> 
                                                </div> 

                                                <div class="row">
                                                    <div class="col-md-2">    
                                                        <div class="form-group">
                                                            <label>País</label>
                                                            <select  id="pais"  class="form-control">
                                                                <option value="Argentina">Argentina</option>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3">    
                                                        <div class="form-group">
                                                            <label>Provincia</label>

                                                            <select  id="provincia"  class="form-control">

                                                                <option value="">Seleccionar</option>
                                                                <?php foreach ($provincias as $key): ?>
                                                                    <option value="<?= $key->provincia?>"><?= $key->provincia?></option>
                                                                <?php endforeach ?> 
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3">    
                                                        <div class="form-group">
                                                            <label>Localidad</label>
                                                            <select id="localidad"  class="form-control">
                                                                <option value="">Seleccionar</option>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-4">    
                                                        <div class="form-group">
                                                            <label>Dirección</label>
                                                              <textarea id="direccion"  placeholder="Ejemplo: Calle 12 con AV 3" name="" style="height: 33px;resize: none;overflow-y: hidden;" class="form-control"></textarea>
                                                        </div>
                                                    </div>  
                                                </div> 
                                                

                                                <div class="row">
                                                    <div class="col-md-2">    
                                                        <div class="form-group">
                                                            <label>Modalidad</label>
                                                            <select id="disponibilidad"  class="form-control">
                                                               <option value="">Seleccionar</option>
                                                                <?php foreach ($disponibilidad as $key): ?>
                                                                    <option value="<?= $key->nombre?>"><?= $key->nombre?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3">    
                                                        <div class="form-group">
                                                            <label>Área</label>
                                                            <select  id="sector"  class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                <?php foreach ($area as $key): ?>
                                                                    <option value="<?= $key->nombre?>"><?= $key->nombre?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    
                                                    <div class="col-md-3">    
                                                        <div class="form-group">
                                                            <label>Nivel de estudio</label>
                                                            <select id="nivel_estudio" class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                <option value="Cualquiera">Cualquiera</option>
                                                                <?php foreach ($nivel_estudio as $key): ?>
                                                                    <option value="<?= $key->descripcion?>"><?= $key->descripcion?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                     <div class="col-md-2">    
                                                        <div class="form-group">
                                                            <label>Nº de vancantes</label>
                                                              <textarea id="vacantes"  placeholder="Ejemplo: 5" name="" style="height: 33px;resize: none;overflow-y: hidden;" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-2">    
                                                        <div class="form-group">
                                                            <label>Plan estado</label>
                                                            <select id="plan_estado"  class="form-control">
                                                                   <option value="">Seleccionar</option>
                                                                   <option value="No aplica">No aplica</option>
                                                                <?php foreach ($plan_estado as $key): ?>
                                                                    <option value="<?= $key->plan?>"><?= $key->plan?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>  
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-2">    
                                                        <div class="form-group">
                                                            <label>Oferta confidencial</label>
                                                            <select id="confidencial"  class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                <option value="1">SI</option>
                                                                <option value="0">NO</option>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3">    
                                                        <div class="form-group">
                                                            <label>Apta para discapacitados</label>
                                                            <select id="discapacidad" class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                <option value="1">SI</option>
                                                                <option value="0">NO</option>
                                                            </select>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-3">    
                                                        <div class="form-group">
                                                            <label>Turno</label>
                                                            <select id="turno"  class="form-control">
                                                                  <option value="">Seleccionar</option>
                                                                  <option value="Sin Defini">Sin Definir</option>
                                                                <?php foreach ($turnos as $key): ?>
                                                                    <option value="<?= $key->turno?>"><?= $key->turno?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-2">    
                                                        <div class="form-group">
                                                            <label>Genero</label>
                                                            <select id="genero"  class="form-control">
                                                                   <option value="">Seleccionar</option>
                                                                   <option value="Cualquiera">Cualquiera</option>
                                                                <?php foreach ($genero as $key): ?>
                                                                    <option value="<?= $key->descripcion?>"><?= $key->descripcion?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">    
                                                        <div class="form-group">
                                                            <label>Edad</label>
                                                            <select  id="edad" class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                <option value="Cualquiera">Cualquiera</option>
                                                                <option value="15 - 25">15 - 25</option>
                                                                <option value="25 - 35">25 - 35</option>
                                                                <option value="35 - 45">35 - 45</option>
                                                                <option value="Mayor a 45">Mayor a 45</option>
                                                            </select>
                                                        </div>
                                                    </div>   
                                                </div>  
                                                <div class="row">
                                                     <div class="col-md-6">
                                                         <div class="form-group">
                                                         <label>Habilidades</label>
                                                         <div class="panel-body">
                                                           <select id="habilidades" class="tokenize-sample-demo1" multiple>
                                                                <?php echo select_options($habilidades_json)?>
                                                            </select>
                                                        </div></div>
                                                    </div>

                                                     <div class="col-md-6">
                                                         <div class="form-group">
                                                         <label>Idiomas</label>
                                                         <div class="panel-body">
                                                           <select id="idiomas" class="tokenize-sample-demo2" multiple>
                                                                <?php echo select_options($idiomas_json)?>
                                                            </select>
                                                        </div></div>
                                                    </div> 
                                                    </div>   
                                                 </div> 
                                                <div class="row">
                                                    <div class="col-sm-12" style="text-align: right;">
                                                         <button id="titulo_boton" type="button" onclick="publicar()" class="btn btn-primary">Publicar</button>
                                                    </div>
                                                </div>
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
      
      <script src="<?= $ruta?>plugins/tag/tokenize2.js"></script>

      <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
      <script src="<?= $ruta?>plugins/tag/tokenize2.js"></script>

      <script type="text/javascript" src="<?= $ruta?>plugins/summernote-master/dist/summernote-lite.js"></script> 
      <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
      <script type="text/javascript">
      

        $(document).ready(function() { 
          

          $('.summernote').summernote({
            height: 300,
            tabsize: 2, 
          });
          $('.tokenize-sample-demo1').tokenize2({ 
                 placeholder: 'Habilidad',
                 tokensMaxItems: 5
          });
           $('.tokenize-sample-demo2').tokenize2({ 
                 placeholder: 'Habilidad',
                 tokensMaxItems: 5
          }); 
           texto_ejemplo();
           altura =($(window).height()-150)+'px';
           altura_home =($(window).height()-55)+'px';  
           $("#candidatos_list").css({'height':altura});  
           $("#cv_list_home").css({'height':altura_home});
           $("#cv_list").css({'height':altura_home});
        });

        function loading()
        {
          $("#modal_loader").modal("show");
        }
        //Funciones auxiliares
        function texto_ejemplo()
        {
            $(".note-editable").html(' <p style=""><font face="Work Sans, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol"><b>Descripción</b></font><b style="font-family: &quot;Work Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;">&nbsp;de empleo</b></p><p style=""><font face="Work Sans, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol"><font color="#111111"> Ejemplo:</font><br><font color="#111111">Empresa </font>líder<font color="#111111">&nbsp;en el ramo de [tecnología, medicina, lo que sea tu empresa] solicita [Programador, médico, mecánico. Lo que necesite tu empresa] para ayudar la la empresa a cumplir tarea de desarrollo interno y facilitar las tareas de nuestros clientes.</font></font></p><p style="font-family: &quot;Work Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;"><b>Responsabilidades</b></p><ul><li style="font-family: &quot;Work Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;">Ejemplo: Atender a los clientes, completar el inventario</li></ul><p style="font-family: &quot;Work Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;"><b>Ofrecemos</b></p><ul><li style="font-family: &quot;Work Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;">Ejemplo: Excelente Ambiente Laboral, Becas</li></ul><p style="display: table-row;"></p> ');
        }
        function limpiar_todo()
        {
             $("select, input, textarea").val('');
             $("#pais").val('Argentina');
             $(".token").remove();
             texto_ejemplo();
        }

        function nueva()
        {
           
            $('#titulo_oferta').text('Nueva Oferta');
            $('#tipo_oferta').html('1');
            $('#titulo_boton').text('Publicar');
            $('#publicacion').html('0');
            $('#btn_nueva').hide();
            limpiar_todo();
        }
        function editar(publicacion)
        {
            $('#titulo_oferta').text('Estas editando...');
            $('#tipo_oferta').html('2');
            $('#publicacion').html(publicacion);
            $('#titulo_boton').text('Listo');
            $('#btn_nueva').show();
        }

         function upper(string)
         {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

         function oferta(publicacion) {
            editar(publicacion);
            loading();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'oferta',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: publicacion
                },
                success: function(response, localidades) {
                  $('.tokenize-sample-demo1').trigger('tokenize:clear'); 
                  $('.tokenize-sample-demo2').trigger('tokenize:clear'); 
                    var JSONArray = jQuery.parseJSON(JSON.stringify(response.valores));
                    var JSONArray_dos = jQuery.parseJSON(JSON.stringify(response.localidades));
                    jQuery.each(JSONArray, function(index, dato) {
                        $('#alias').val(dato.alias);
                        $('#titulo').val(dato.titulo);
                        $('#pais').val(dato.pais);
                        $('#provincia').val(dato.provincia);
                        var mi_localidad = dato.localidad;
                        jQuery.each(JSONArray_dos, function(index, item) {
                            if (mi_localidad == item.localidad) {
                                $("#localidad").append('<option selected="true" value="' + item.localidad + '">' + item.localidad + '</option>');
                            } else {
                                $("#localidad").append('<option value="' + item.localidad + '">' + item.localidad + '</option>');
                            }
                        });
                        $('.note-editable').html(dato.descripcion);
                        $('#disponibilidad').val(dato.disponibilidad);
                        $('#sector').val(dato.sector);
                        $('#nivel_estudio').val(dato.nivel_estudio);
                        $('#vacantes').val(dato.n_vacantes);
                        $('#plan_estado').val(dato.plan_estado);
                        $('#confidencial').val(dato.confidencial);
                        $('#discapacidad').val(dato.discapacidad);
                        $('#turno').val(dato.turno);
                        $('#genero').val(dato.genero);
                        $('#direccion').val(dato.direccion);
                        $('#edad').val(dato.edad); 
                        if( dato.habilidades!=""){
                        cadena = dato.habilidades;  
                        $('.tokenize-sample-demo1').trigger('tokenize:clear');  
                        valores=cadena.split(",");
                        $.each(valores, function( index, value ) {
                        $('.tokenize-sample-demo1').trigger('tokenize:tokens:add', [value, $('#tokenize option[value=' + value + ']').html()]);  
                        }); 
                        }
                        if(dato.idiomas!=""){
                        cadena_dos = dato.idiomas;
                        valores_dos=cadena_dos.split(",");
                        $.each(valores_dos, function( index, valur ) {
                        $('.tokenize-sample-demo2').trigger('tokenize:tokens:add', [valur, $('#tokenize option[value=' + valur + ']').html()]);   
                        }); 
                        }
                        $("#publicacion").html(dato.id); 
                    });
                },
                error: function(error) {
                    $.notify("Ocurrió un error al procesar la solicitud.");
                }
            });
        }

        //Obtener los postulados
        function get_postulados(identificador) {
          loading();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'postulados',
                type: 'POST',
                data:{publicacion:identificador}, 
                dataType:'json',
                success: function(response) {
                   $("#candidatos_list").html("");
                   
                  var JSONArray = jQuery.parseJSON(JSON.stringify(response));
                  var candidato=""; 
                  jQuery.each(JSONArray, function(index, dato) { 
                      candidato=candidato+'<li onClick="get_cv('+dato.id+','+dato.id_oferta+')" class="listado-postulados"><img style="width: 35px;height: 35px;border-radius:50%;" src="../uploads/min/'+dato.archivo+'" alt=""/><span>'+dato.nombre+'</span></li>';
                      
                   });
                  $("#candidatos_list").append(candidato);
                  $("#contenedor_postulados").removeClass(' in');
                  $("#contenedor_postulados").addClass(' in');
                },
                error: function(error) {
                    $.notify("Ocurrió un error al procesar la solicitud.");
                }
            });
        }

        //Obtener CV 
        function get_cv(identificador,publicacion) {
            loading();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'cv',
                type: 'POST',
                data:{candidato:identificador,oferta:publicacion}, 
                dataType:'json',
                success: function(response) {  
                  $(".info-cv").html(""); 
                  $(".info-cv-imagen").attr('src','https://www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png');
                    var JSONArray = jQuery.parseJSON(JSON.stringify(response)); 
                    jQuery.each(JSONArray.general, function(index, dato) { 
                        $(".info-cv-nombre").html(dato.nombres);
                        $(".info-cv-correo").html(dato.correo);
                        $(".info-cv-telefono").html(dato.telefono);
                        $(".info-cv-edad").html(dato.edad+' Años');
                        $(".info-cv-sexo").html(dato.sexo);
                        $(".info-cv-dni").html(dato.n_identificacion);
                        $(".info-cv-cuil").html(dato.cuil);
                        $(".info-cv-nacionalidad").html(dato.nacionalidad);
                        $(".info-cv-discapacidad").html(dato.discapacidad);
                        $(".info-cv-edo-civil").html(dato.edo_civil);
                        $(".info-cv-hijos").html(dato.hijos);
                        $(".info-cv-direccion").html(dato.pais+' '+dato.provincia+' '+dato.localidad+' '+dato.direccion); 
                        $(".info-cv-fecha-nacimiento").html(dato.fecha_nac);
                        $(".info-cv-sobre-mi").html(dato.sobre_mi);
                        $(".info-cv-imagen").attr('src','../uploads/min/'+dato.img);
                      
                   });

                    jQuery.each(JSONArray.habilidades, function(index, dato) {
                      $('.info-cv-habilidades').append('<span class="tag tag-warning" style="margin-top: 5px;margin-left:5px;">'+dato.habilidad+'</span>');
                   });

                    jQuery.each(JSONArray.idiomas, function(index, dato) {
                      $('.info-cv-idiomas').append('<span class="tag tag-warning" style="margin-top: 5px;margin-left:5px;">'+dato.idioma+'</span>');
                     });


                     var imagen_experiencia='<div class="col-sm-2 sp" style="text-align: center;padding-top: 15px;"> <img style="height: 80px;" src="../local/resources/views/empresas/app-assets/images/icons/postulados/experiencia.png" alt=""> </div>';
                     bandera_magen_experiencia=0;
                    
                     jQuery.each(JSONArray.experiencia, function(index, dato) {
                      var hasta_experiencia='';
                      var desde_experiencia='';
                      var meses_experiencia=''; 
                      if(dato.antiguedad!=null )
                      {
                        meses_experiencia='<span class="tag tag-info">'+dato.antiguedad+' Meses</span>';
                      } 
                      if(dato.hasta!=''){hasta_experiencia=' - '+dato.hasta;}
                      if(dato.desde!=''){desde_experiencia=dato.desde;}
                      $('.info-cv-experiencia').append(imagen_experiencia+'<div class="col-sm-10" style="padding-top: 10px;"> <h5>'+dato.nombre_empresa+' <span style="float: right;font-weight: 500;font-size: 14px;padding-top: 5px;">Área: '+dato.actividad_empresa+'</span> </h5> <h5>'+meses_experiencia+' '+desde_experiencia+' '+hasta_experiencia+' </h5> <p>'+upper(dato.descripcion)+'</p></div>');
                        if(bandera_magen_experiencia==0){bandera_magen_experiencia=1;
                        imagen_experiencia='<div class="col-sm-2 sp" style="text-align: center;padding-top: 15px;"></div>';}
                    });
                     
                     var imagen='<div class="col-sm-2 sp" style="text-align: center;padding-top: 15px;"> <img style="height: 80px;" src="../local/resources/views/empresas/app-assets/images/icons/postulados/graduation.png" alt=""> </div>';
                     bandera_magen=0;
                     jQuery.each(JSONArray.educacion, function(index, dato) { 
                      $('.info-cv-educacion').append(imagen+'<div class="col-sm-10" style="padding-top: 10px;"> <h5>'+dato.institucion+' <span style="float: right;font-weight: 500;font-size: 14px;padding-top: 5px;">Área: '+dato.area_estudio+'</span> </h5> <h5><span class="tag tag-info">'+dato.nivel+'</span> '+dato.edo_estudio+' </h5> <p>Título: '+dato.titulo+'</p></div>');
                        if(bandera_magen==0){bandera_magen=1;
                        imagen='<div class="col-sm-2 sp" style="text-align: center;padding-top: 15px;"></div>';}
                   });

                       jQuery.each(JSONArray.preferencias, function(index, dato) { 
                       $('.info-cv-salario').append('<span class="tag tag-info" style="margin-top: 5px;">'+dato.salario+'</span>');
                       $('.info-cv-jornada').append('<span class="tag tag-info" style="margin-top: 5px;">'+dato.jornada+'</span>');
                   });

                         jQuery.each(JSONArray.cargos, function(index, dato) {  
                  $('.info-cv-cargos').append('<span class="tag tag-info" style="margin-top: 5px;margin-left: 5px;">'+dato.cargo+'</span>');
                   });

                   $("#cv_list_home").hide();
                   $("#cv_list").show(); 
                },
                error: function(error) {
                    $.notify("Ocurrió un error al procesar la solicitud.");
                }
            });
        }        
        //Listar las ofertas
        function listar() {
          loading();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'ofertas',
                type: 'POST', 
                dataType:'json',
                success: function(response) {
                    var contenido='';
                     $("#total").text('0');
                     $("#tabla-resumen").html('');
                     $("#select_ofertas").html('');
                     $("#select_ofertas").append('<option value="">Seleccionar oferta</option>'); 
                    var JSONArray = jQuery.parseJSON(JSON.stringify(response));
                    var contador=0;
                    var activa='<span>Activa</span>';
                    var pausada='<span class="tag tag-success" style="background-color:#00b1ff;">Pausada</span>';
                    var boton="";
                    var alias="Ésta publicación no posee alias"; 
                     jQuery.each(JSONArray, function(index, dato) { 
                        contador++;
                        if(dato.alias!="")
                        {
                          alias= dato.alias;
                        }
                        else
                        {
                          alias="Ésta publicación no posee alias"; 
                        }
                        if(dato.estatus==1)
                        {
                            estatus=activa;
                            boton='<a title="Pausar" onclick="status('+dato.id+',0)" style="margin-left: 5px;" href="#"><img style="height: 20px;" src="<?=$ruta?>/app-assets/images/icons/ofertas/pausar.png" alt=""></a>';
                        }else{estatus=pausada;
                            boton='<a title="Reanudar" onclick="status('+dato.id+',1)" style="margin-left: 5px;" href="#"><img style="height: 20px;" src="<?=$ruta?>/app-assets/images/icons/ofertas/reanudar.png" alt=""></a>';}
                        
                         $("#select_ofertas").append('<option value="'+dato.id+'">'+alias+'</option>');

                        contenido=contenido+'<tr class="sp"> <td class="text-truncate sp" style="padding:2px;"><a href="#" style="color:#282828;">'+alias+'</a></td><td class="text-truncate sp" style="padding:2px;"><span onclick="get_postulados('+dato.id+')" style="cursor:pointer;">'+dato.cantidad+'</span> </td><td class="valign-middle" style="padding:2px;"> '+dato.vistas+' </td><td class="text-truncate sp" style="padding:2px;">'+estatus+'</td><td class="text-truncate sp" style="padding:2px;"> <a title="Ver" style="margin-left: 5px;" href="#"><img style="height: 20px;" src="<?=$ruta?>/app-assets/images/icons/ofertas/ver.png" alt="">'+boton+' <span onclick="oferta('+dato.id+')" title="Editar" style="margin-left: 5px;" ><img style="height: 20px;cursor:pointer;" src="<?=$ruta?>/app-assets/images/icons/ofertas/editar.png" alt=""></span> <a onclick="eliminar('+dato.id+')" title="Eliminar" style="margin-left: 5px;" href="#"><img style="height: 20px;" src="<?=$ruta?>/app-assets/images/icons/ofertas/eliminar.png" alt=""></a> </td></tr>';
                    });
                     $("#total").text(contador);
                     $("#tabla-resumen").append(contenido);
                },
                error: function(error) {
                    $.notify("Ocurrió un error al procesar la solicitud.");
                }
            });
        }
        function eliminar(publicacion)
        {   
          loading();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url: 'eliminar',
                type: 'POST',
                data: {id:publicacion},
                success: function(response) {
                $.notify(response,"success");
                listar();
                },
                error: function(error) {
                    $.notify("Ocurrió un error al procesar la solicitud.");
                }
            });
        }
        function status(publicacion,valor)
        {   
          loading();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url: 'updatestatus',
                type: 'POST',
                data: {id:publicacion,estatus:valor},
                success: function(response) {
                $.notify(response,"success");
                listar();
                },
                error: function(error) {
                    $.notify("Ocurrió un error al procesar la solicitud.");
                }
            });
        }
        listar();       
      </script> 
   <?php include('local/resources/views/empresas/require/js.php');?>

   <script> 
       
       
      function publicar() 
       {
        
           if(!validar_r('alias')){}
           else if(!validar_r('titulo')){} 
           else if(!validar_r('pais')){}
            else if(!validar_r('provincia')){}
           else if(!validar_r('localidad')){}
           else if(!validar_r('direccion')){}
            else if(!validar_r('disponibilidad')){}
           else if(!validar_r('sector')){}
           else if(!validar_r('nivel_estudio')){} 
            else if(!validar_r('vacantes')){}
           else if(!validar_r('plan_estado')){}
           else if(!validar_r('confidencial')){}
            else if(!validar_r('discapacidad')){}
           else if(!validar_r('turno')){}
           else if(!validar_r('genero')){}
            else if(!validar_r('edad')){}
           else if(!validar_r('habilidades')){}
           else if(!validar_r('idiomas')){} 
           else{    
                loading();        
                datos={ 
                alias:$('#alias').val(),
                titulo:$('#titulo').val(),
                pais:$('#pais').val(),
                provincia:$('#provincia').val(),
                localidad:$('#localidad').val(),
                direccion:$('#direccion').val(),
                descripcion:$('.note-editable').html(),  
                disponibilidad:$('#disponibilidad').val(),
                sector:$('#sector').val(),
                nivel_estudio:$('#nivel_estudio').val(),
                vacantes:$('#vacantes').val(),
                plan_estado:$('#plan_estado').val(),
                confidencial:$('#confidencial').val(),
                discapacidad:$('#discapacidad').val(),
                turno:$('#turno').val(),
                genero:$('#genero').val(),
                edad:$('#edad').val(),
                habilidades:$('#habilidades').val(),
                idiomas:$('#idiomas').val(),
                tipo_oferta:$('#tipo_oferta').val(),
                publicacion:$('#publicacion').html(),

                    }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: 'publicar',
                            type: 'POST',
                            data:datos,  
                            success: function(response) { 
                                    if(response=='0')
                                    {
                                        $.notify('Debe arregar alguna habilidad',"info");
                                        return 0;
                                    }
                                    
                                     $.notify(response,"success");
                                     $("select, input, textarea").val('');
                                     $("#pais").val('Argentina');
                                     $(".token").remove();
                                     texto_ejemplo();
                                     listar();
                                     nueva();
                            },
                            error: function(error) {
                                $.notify("Ocurrió un error al procesar la solicitud.");
                            }
                        }); 
                }
            } 
      $( document ).ajaxComplete(function() {
            $("#modal_loader").modal("hide");
      });
   </script>
  <style type="text/css">
       .note-view,.note-insert,.note-table,.note-color,.note-fontname,.note-style,.note-fontsize,.note-para > .note-btn-group
       {
        display: none;
       }
   </style> 
</body>
