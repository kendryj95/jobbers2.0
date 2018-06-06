<?php

namespace App\Http\Controllers; 
use DB;
use View; 
class con_candidato_perfil_publico extends Controller
{
    public function perfilPublico($id)
    {
        $vista=View::make("candidatos_perfil_publico"); 

        $sql_datos_personales="SELECT t1.*,t2.descripcion as identificacion,
        t3.descripcion as edo_civil, 
        t4.descripcion as discapacidad,
        t5.descripcion as genero,
        t6.nacionalidad as nacionalidad
        FROM `tbl_candidato_datos_personales` t1
        LEFT JOIN tbl_tipo_indentificacion t2 ON t2.id = t1.id_tipo_identificacion 
        LEFT JOIN tbl_estados_civiles t3 On t3.id = t1.id_edo_civil
        LEFT JOIN tbl_discapacidad t4 ON t4.id = t1.id_discapacidad
        LEFT JOIN tbl_generos t5 ON t5.id = t1.id_sexo
        LEFT JOIN tbl_paises t6 ON t6.id = t1.id_nacionalidad
        WHERE t1.id_usuario = ".$id."";

        $sql_preferencias_laborales="SELECT t1.*,t2.salario,t3.nombre FROM `tbl_candidato_preferencias_laborales` t1
        LEFT JOIN tbl_rango_salarios t2 ON t2.id = t1.id_remuneracion_pre
        LEFT JOIN tbl_disponibilidad t3 ON t3.id = t1.id_jornada
        WHERE t1.id_usuario = ".$id."";

        $sql_datos_contacto ="SELECT t2.descripcion as pais,
        t1.*,
        t3.provincia,
        t4.localidad
        FROM `tbl_candidato_info_contacto` t1
        LEFT JOIN tbl_paises t2 ON t2.id = t1.id_pais
        LEFT JOIN tbl_provincias t3 ON t3.id = t1.id_provincia
        LEFT JOIN tbl_localidades t4 ON t4.id = t1.id_localidad
        WHERE t1.id_usuario = ".$id."";

        $sql_datos_educacion ="SELECT 
        t2.descripcion as nivel,
        t3.descripcion as pais,
        t4.nombre as area_estudio,
        t1.* FROM `tbl_candidatos_educacion` t1
        LEFT JOIN tbl_nivel_estudio t2 ON t2.id = t1.id_nivel_estudio
        LEFT JOIN tbl_paises t3 ON t3.id = t1.id_pais
        LEFT JOIN tbl_areas_estudio t4 ON t4.id = t1.id_area_estudio
        WHERE t1.id_usuario = ".$id."";
        
        $sql_habilidades ="SELECT 
        t2.descripcion as habilidad, 
        t1.* 
        FROM tbl_candidato_habilidades t1
        LEFT JOIN tbl_habilidades t2 ON t2.id = t1.id_habilidad
        WHERE t1.id_usuario = ".$id."";

        $sql_foto ="SELECT t1.*,t2.nombre_aleatorio as foto FROM tbl_usuarios_foto_perfil t1
        LEFT JOIN tbl_archivos t2 ON t2.id = t1.id_foto
        WHERE t1.id_usuario = ".$id."";

        $sql_idiomas ="SELECT t1.*,t2.descripcion FROM `tbl_candidato_idioma` t1
        LEFT JOIN tbl_idiomas t2 ON t2.id =t1.id_idioma
        WHERE t1.id_usuario =  ".$id."";

        $sql_experiencias ="SELECT t1.*,t2.nombre FROM `tbl_candidato_experiencia_laboral` t1
        LEFT JOIN tbl_areas_sectores t2 ON t2.id = t1.id_sector
        WHERE t1.id_usuario = ".$id."";

        try {
            $datos_experiencias=DB::select($sql_experiencias);
            $datos_idiomas=DB::select($sql_idiomas);
            $datos_foto=DB::select($sql_foto);
            $datos_personales=DB::select($sql_datos_personales);
            $datos_preferencias_lab=DB::select($sql_preferencias_laborales);
            $datos_datos_contacto=DB::select($sql_datos_contacto);
            $datos_educacion=DB::select($sql_datos_educacion);
            $datos_habilidades=DB::select($sql_habilidades);
            $vista->datos_experiencias=$datos_experiencias;
            $vista->datos_idiomas=$datos_idiomas;
            $vista->datos_foto=$datos_foto;
            $vista->datos_habilidades=$datos_habilidades;
            $vista->datos_educacion=$datos_educacion;
            $vista->datos_personales=$datos_personales;
            $vista->datos_datos_contacto=$datos_datos_contacto;
            $vista->datos_preferencias_lab=$datos_preferencias_lab;
            return $vista;
        } catch (Exception $e) {
            
        }

    }

    public function perfil()
    {
        $vista = View::make("candidatos_perfil");
        $sql        = "SELECT correo FROM tbl_usuarios WHERE id = ".session()->get('cand_id')."";
        $sql_imagen = "SELECT * FROM tbl_archivos WHERE id_usuario = " . session()->get("cand_id") . ""; 
        $sql_identificaion="SELECT * FROM tbl_tipo_indentificacion";
        $sql_edo_civil="SELECT * FROM tbl_estados_civiles";
        $sql_paises="SELECT * FROM tbl_paises ORDER BY nacionalidad asc";
        $sql_pronvincias="SELECT * FROM tbl_provincias";
        $sql_localidades="SELECT * FROM tbl_localidades";
        $sql_generos="SELECT * FROM tbl_generos";
        $sql_discapacidad="SELECT * FROM tbl_discapacidad"; 
        $sql_salarios="SELECT * FROM tbl_rango_salarios";
        $sql_disponibilidad="SELECT * FROM tbl_disponibilidad";
        $sql_niveles="SELECT * FROM tbl_nivel_estudio";
        $sql_area_estudios="SELECT * FROM tbl_areas_estudio";
        $sql_area_sector="SELECT * FROM tbl_areas_sectores"; 
        $sql_cargos="SELECT * FROM tbl_cargos";
        $sql_habilidades="SELECT * FROM tbl_habilidades";  
        $sql_idiomas="SELECT * FROM tbl_idiomas";        
        $sql_cargos_listado="SELECT t1.*,t2.descripcion FROM tbl_candidatos_cargos t1
        LEFT JOIN tbl_cargos t2 ON t1.id_cargo = t2.id
        WHERE t1.id_usuario=" . session()->get("cand_id") . "";
        $sql_pic = "SELECT count(t1.id) as cantidad,t2.nombre_aleatorio FROM tbl_usuarios_foto_perfil t1
        LEFT JOIN tbl_archivos t2 ON t2.id = t1.id_foto WHERE t1.id_usuario=" . session()->get("cand_id") . ""; 
        $sql_redes   = "SELECT *  FROM tbl_redes WHERE id_usuario=" . session()->get("cand_id") . "
        AND tipo_usuario=2";
        $sql_educacion="SELECT t1.id_area_estudio,t1.id_nivel_estudio,t1.id_pais, t1.id,t1.id_usuario, t1.titulo,t1.nombre_institucion,t1.desde,t1.hasta,t1.tmp,t2.descripcion as nivel,t3.nombre as estudios,t4.descripcion FROM tbl_candidatos_educacion t1
            LEFT JOIN tbl_nivel_estudio t2 ON t1.id_nivel_estudio = t2.id
            LEFT JOIN tbl_areas_estudio t3 ON t1.id_area_estudio = t3.id
            LEFT JOIN tbl_paises t4 ON t1.id_pais = t4.id
            WHERE t1.id_usuario=".session()->get("cand_id")."";
        $sql_experiencias="SELECT t1.*,t2.nombre as sector FROM `tbl_candidato_experiencia_laboral` t1
        LEFT JOIN tbl_areas_sectores t2 ON t1.id_sector = t2.id
        WHERE t1.id_usuario=".session()->get("cand_id")."";
        $sql_habilidades_listado="SELECT t1.*,t2.descripcion FROM tbl_candidato_habilidades t1
        LEFT JOIN tbl_habilidades t2 ON t1.id_habilidad = t2.id 
        WHERE t1.id_usuario=".session()->get("cand_id")."";
         $sql_idiomas_listado="SELECT t1.*,t2.descripcion FROM tbl_candidato_idioma t1
        LEFT JOIN tbl_idiomas t2 ON t1.id_idioma = t2.id 
        WHERE t1.id_usuario=".session()->get("cand_id")."";

        $idiomas_listado        = DB::select($sql_idiomas_listado);
        $idiomas        = DB::select($sql_idiomas);
        $educacion        = DB::select($sql_educacion);
        $habilidades_listado        = DB::select($sql_habilidades_listado);
        $area_sectores        = DB::select($sql_area_sector);
        $experiencias        = DB::select($sql_experiencias);
        $habilidades        = DB::select($sql_habilidades);
        $vista->habilidades = $habilidades; 
        $vista->experiencias = $experiencias; 
        $vista->educacion = $educacion; 
        $vista->area_sectores = $area_sectores;
        $vista->habilidades_listado = $habilidades_listado;
        $redes        = DB::select($sql_redes);
        $vista->redes = $redes; 
         $vista->idiomas_listado = $idiomas_listado; 
        $vista->idiomas = $idiomas; 
        $bandera_datos_contacto=0;
        $sql_contactos="
        SELECT *, count(*) as cantidad FROM tbl_candidato_info_contacto WHERE id_usuario=".session()->get('cand_id')."";
        try {
            $datos=DB::select($sql_contactos);
            if($datos[0]->cantidad!=0)
            {
                
                $bandera_datos_personales=1;
                $vista->bandera_datos_contacto=$bandera_datos_personales;
                $vista->infocontacto=$datos;
            }
            else
            {
                $bandera_datos_personales=0;
                $vista->bandera_datos_contacto=  $bandera_datos_personales;
            }
        } catch (Exception $e) {
            
        }


        $bandera_datos_personales=0;
        $sql_datos_personales="
        SELECT *, count(*) as cantidad FROM tbl_candidato_datos_personales WHERE id_usuario=".session()->get('cand_id')."";
        try {
            $datos=DB::select($sql_datos_personales);
            if($datos[0]->cantidad!=0)
            {
                
                $bandera_datos_personales=1;
                $vista->bandera_datos_personales=$bandera_datos_personales;
                $vista->datos_personales_up=$datos;
            }
            else
            {
                $bandera_datos_personales=0;
                $vista->bandera_datos_personales=  $bandera_datos_personales;
            }
        } catch (Exception $e) {
            
        }

        $bandera_preferencias_laborales=0;
        $sql_preferencias_laborales="
        SELECT *, count(*) as cantidad FROM tbl_candidato_preferencias_laborales WHERE id_usuario=".session()->get('cand_id')."";
        try {
            $datos=DB::select($sql_preferencias_laborales);
            if($datos[0]->cantidad!=0)
            {
                
                $bandera_preferencias_laborales=1;
                $vista->bandera_preferencias_laborales=$bandera_preferencias_laborales;
                $vista->preferencias_laborales_up=$datos;
            }
            else
            {
                $bandera_preferencias_laborales=0;
                $vista->bandera_preferencias_laborales=  $bandera_preferencias_laborales;
            }
        } catch (Exception $e) {
            
        } 
        $con_imagen = 0;
        try {
            $datos         = DB::select($sql);
            $imagen        = DB::select($sql_imagen);
            $pic           = DB::select($sql_pic);
            $identificacion= DB::select($sql_identificaion);
            $edo= DB::select($sql_edo_civil);
            $paises= DB::select($sql_paises);
            $provincias= DB::select($sql_pronvincias);
            $localidades= DB::select($sql_localidades);
            $discapacidad= DB::select($sql_discapacidad);
            $infocontacto= DB::select($sql_contactos);
            $generos= DB::select($sql_generos); 
            $salarios= DB::select($sql_salarios);
            $disponibilidad= DB::select($sql_disponibilidad);
            $cargos= DB::select($sql_cargos);
            $cargos_lista= DB::select($sql_cargos_listado);
            $area_estudios= DB::select($sql_area_estudios);
            $nivel_estudio= DB::select($sql_niveles);

            $vista->datos  = $datos;
            $vista->imagen = $imagen; 
            $vista->salarios = $salarios;
            $vista->disponibilidad = $disponibilidad;
            $vista->cargos = $cargos;  

            if ($pic[0]->cantidad == 1) {
                $con_imagen = 1;
            }
            $vista->con_imagen = $con_imagen;
            $vista->pic        = $pic;
            $vista->identificacion= $identificacion;
            $vista->edo= $edo;
            $vista->paises= $paises;
            $vista->localidades= $localidades;
            $vista->provincias= $provincias; 
            $vista->discapacidad= $discapacidad;
            $vista->generos= $generos;  
            $vista->cargos_lista= $cargos_lista;
            $vista->nivel_estudio= $nivel_estudio;  
            $vista->area_estudio= $area_estudios;
            return $vista;
        } catch (Exception $e) {

        }
    }

    public function datos_personales()
    {
        $sql_datos_personales="
        SELECT *, count(*) as cantidad FROM tbl_candidato_datos_personales WHERE id_usuario=".session()->get('cand_id')."";
         
            $datos=DB::select($sql_datos_personales);
            if($datos[0]->cantidad!=0)
            {
                
                $sql="UPDATE tbl_candidato_datos_personales SET
                nombres='".$_POST['nombres']."', 
                apellidos='".$_POST['apellidos']."',
                id_tipo_identificacion=".$_POST['t_id'].",
                n_identificacion='".$_POST['id']."',
                id_edo_civil=".$_POST['edo_civil'].",
                id_discapacidad=".$_POST['discapacidad'].",
                id_sexo=".$_POST['sexo'].",
                fecha_nac='".$_POST['fecha_nac']."',
                id_nacionalidad=".$_POST['nacionalidad'].",
                hijos='".$_POST['hijos']."',
                sobre_mi='".$_POST['sobremi']."'
                WHERE id_usuario=".session()->get('cand_id')." 
                ";
                 DB::update($sql);
                return redirect("candiperfil");
            }
            else
            {
                 $sql="INSERT INTO tbl_candidato_datos_personales VALUES
                (
                null,
                ".session()->get('cand_id').",
                '".$_POST['nombres']."', 
                '".$_POST['apellidos']."',
                ".$_POST['t_id'].",
                '".$_POST['id']."',
                ".$_POST['edo_civil'].",
                ".$_POST['discapacidad'].",
                ".$_POST['sexo'].",
                '".$_POST['fecha_nac']."',
                ".$_POST['nacionalidad'].",
                '".$_POST['hijos']."',
                '".$_POST['sobremi']."',
                null 
                )";

             
                    DB::insert($sql);
                    return redirect("candiperfil");
                 
            }
        } 

    //Informacion de contacto

    public function datos_contacto()
    {
        $sql_datos_contacto="
        SELECT *, count(*) as cantidad FROM tbl_candidato_info_contacto WHERE id_usuario=".session()->get('cand_id')."";
         
            $datos=DB::select($sql_datos_contacto);
            if($datos[0]->cantidad!=0)
            {
                
                $sql="UPDATE tbl_candidato_info_contacto SET
            
                correo='".$_POST['correo']."',
                telefono='".$_POST['telefono']."',
                id_pais=".$_POST['pais'].",
                id_provincia=".$_POST['provincia'].",
                id_localidad=".$_POST['localidad'].",
                direccion='".$_POST['direccion']."',
                web='".$_POST['web']."',
                latitud='".$_POST['latitud']."',
                logitud='".$_POST['longitud']."'
                WHERE id_usuario=".session()->get('cand_id')." 
                ";
                 DB::update($sql);
                return redirect("candiperfil");
            }
            else
            {
                 $sql="INSERT INTO tbl_candidato_info_contacto VALUES
                (
                null,
                ".session()->get('cand_id').",
                '".$_POST['correo']."', 
                '".$_POST['telefono']."',
                ".$_POST['pais'].",
                ".$_POST['provincia'].",
                ".$_POST['localidad'].",
                '".$_POST['direccion']."',
                '".$_POST['web']."',
                '".$_POST['latitud']."',
                '".$_POST['longitud']."', 
                null 
                )"; 
                    DB::insert($sql);
                    return redirect("candiperfil"); 
            }
        } 
            
        public function datos_preferencias_laborales()
    {
        
        $sql_preferencias_laborales="
        SELECT *, count(*) as cantidad FROM tbl_candidato_preferencias_laborales WHERE id_usuario=".session()->get('cand_id')."";
         
            $datos=DB::select($sql_preferencias_laborales);
            if($datos[0]->cantidad!=0)
            {
                
                $sql="UPDATE tbl_candidato_preferencias_laborales SET
                id_remuneracion_pre=".$_POST['remuneracion'].", 
                id_jornada=".$_POST['jornada']." 
                WHERE id_usuario=".session()->get('cand_id')." 
                ";
                 DB::update($sql);
                 if(isset($_POST['cand_cargos']) && $_POST['cand_cargos']!="")
                 {
                    $this->agregar_arr($_POST['cand_cargos'],"tbl_candidatos_cargos");
                 }
                 else
                 {
                    $this->del_arr("tbl_candidatos_cargos");
                 }
                return redirect("candiperfil");
            }
            else
            {
                 $sql="INSERT INTO tbl_candidato_preferencias_laborales VALUES
                (
                null,
                ".session()->get('cand_id').",
                ".$_POST['remuneracion'].", 
                ".$_POST['jornada'].", 
                null 
                )"; 
                if(isset($_POST['cand_cargos']) && $_POST['cand_cargos']!="")
                {
                    $this->agregar_arr($_POST['cand_cargos'],"tbl_candidatos_cargos");
                }
                else
                 {
                    $this->del_arr("tbl_candidatos_cargos");
                 }
               $this->agregar_arr($_POST['cand_cargos'],"tbl_candidatos_cargos");
               DB::insert($sql);
                return redirect("candiperfil"); 
            }
        }

    function agregar_arr($datos,$tabla)
    {    
       if(isset($datos) && $datos!="")
       {
          $sql="DELETE FROM ".$tabla." WHERE id_usuario = ".session()->get('cand_id')."";
            DB::delete($sql);
            foreach ($datos as $key) {
                $sql="INSERT INTO ".$tabla." VALUES(null,".session()->get('cand_id').",".$key.",null)";
                DB::insert($sql);
            } 
       }       
    }  

    function set_habilidad()
    { 
        //return "Hola";
        try {
            $this->agregar_arr($_POST['cand_cargos'],"tbl_candidato_habilidades");
            return redirect("candiperfil"); 
        } catch (Exception $e) {
            
        }
    }
    function set_idioma()
    { 
        //return "Hola";
        try {
            $this->agregar_arr($_POST['cand_cargos'],"tbl_candidato_idioma");
            return redirect("candiperfil"); 
        } catch (Exception $e) {
            
        }
    }

    function del_arr($tabla)
    {   
          $sql="DELETE FROM ".$tabla." WHERE id_usuario = ".session()->get('cand_id')."";
          DB::delete($sql);        
    }

    function estudios()
    {   

       $sql="SELECT count(*) as cantidad FROM tbl_candidatos_educacion WHERE id_usuario=".session()->get('cand_id')."";
       $datos=DB::select($sql);
       if($_POST['tipo']==2)
       {
        $sql="UPDATE tbl_candidatos_educacion SET
        id_nivel_estudio=".$_POST['nivel'].",
        titulo='".$_POST['titulo_obtener']."',
        id_area_estudio=".$_POST['nivel'].",
        nombre_institucion='".$_POST['universidad']."',
        id_pais=".$_POST['uni_pais'].",
        desde='".$_POST['desde']."',
        hasta='".$_POST['hasta']."'
        WHERE id=".$_POST['identificador']." AND id_usuario=".session()->get('cand_id')."
         ";
         DB::update($sql);
         return redirect("candiperfil");
       }
       else
       {
         $sql="INSERT INTO tbl_candidatos_educacion VALUES(
           null,
           ".session()->get('cand_id').",
           ".$_POST['nivel'].", 
           '".$_POST['titulo_obtener']."',
           ".$_POST['area_estudio'].",
           '".$_POST['universidad']."',
           ".$_POST['uni_pais'].",
           '".$_POST['desde']."',
           '".$_POST['hasta']."',
           null 
           )";

           try {
                  DB::insert($sql);
                  return redirect("candiperfil");
              } catch (Exception $e) {
                 
              }   
        }  
       } 

       function del_education($id)
       {
        $sql="DELETE FROM  tbl_candidatos_educacion
        WHERE id=".$id." and id_usuario=".session()->get('cand_id')."";

        try {
            DB::delete($sql);
            return redirect("candiperfil");
        } catch (Exception $e) {
            
        }
       }

       public function expe_lab()
       {
            $sql="SELECT count(*) as cantidad FROM tbl_candidato_experiencia_laboral WHERE id_usuario=".session()->get('cand_id')."";
           $datos=DB::select($sql);
           if($_POST['tipo']==2)
           {
            $sql="UPDATE tbl_candidato_experiencia_laboral SET 
            nombre_empresa='".$_POST['empresa']."',
            cargo='".$_POST['cargo']."',
            id_sector=".$_POST['sector'].",
            descripcion='".$_POST['descripcion']."', 
            desde='".$_POST['desde']."',
            hasta='".$_POST['hasta']."'
            WHERE id=".$_POST['identificador']." AND id_usuario=".session()->get('cand_id')."
             ";
             DB::update($sql);
             return redirect("candiperfil");
           }
           else
           {
             $sql="INSERT INTO tbl_candidato_experiencia_laboral VALUES(
               null,
               ".session()->get('cand_id').",
               '".$_POST['empresa']."', 
               '".$_POST['cargo']."',
               '".$_POST['desde']."',
               '".$_POST['hasta']."',
               ".$_POST['sector'].",
               '".$_POST['descripcion']."', 
               null 
               )";

               try {
                      DB::insert($sql);
                      return redirect("candiperfil");
                  } catch (Exception $e) {
                     
                  }   
            }  
       }

       function del_expe($id)
       {
        $sql="DELETE FROM  tbl_candidato_experiencia_laboral
        WHERE id=".$id." and id_usuario=".session()->get('cand_id')."";

        try {
            DB::delete($sql);
            return redirect("candiperfil");
        } catch (Exception $e) {
            
        }
       }
}
