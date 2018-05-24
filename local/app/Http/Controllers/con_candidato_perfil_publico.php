<?php

namespace App\Http\Controllers;

use DB;
use View;

class con_candidato_perfil_publico extends Controller
{
    public function perfilPublico()
    {
        return view("candidatos_perfil_publico");
    }

    public function perfil()
    {
        $vista = View::make("candidatos_perfil");
        $sql        = "SELECT correo FROM tbl_usuarios WHERE id = " . session()->get('cand_id') . "";
        $sql_imagen = "SELECT * FROM tbl_archivos
        WHERE id_usuario = " . session()->get("cand_id") . "";
        $sql_pic = "SELECT count(t1.id) as cantidad,t2.nombre_aleatorio FROM tbl_usuarios_foto_perfil t1
        LEFT JOIN tbl_archivos t2 ON t2.id = t1.id_foto WHERE t1.id_usuario=" . session()->get("cand_id") . "";

        $sql_identificaion="SELECT * FROM tbl_tipo_indentificacion";
        $sql_edo_civil="SELECT * FROM tbl_estados_civiles";
        $sql_paises="SELECT * FROM tbl_paises ORDER BY nacionalidad asc";
        $sql_generos="SELECT * FROM tbl_generos";
        $sql_discapacidad="SELECT * FROM tbl_discapacidad";

        $sql_salarios="SELECT * FROM tbl_rango_salarios";
        $sql_disponibilidad="SELECT * FROM tbl_disponibilidad";
        $sql_cargos="SELECT * FROM tbl_cargos";



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
        $con_imagen = 0;
        try {
            $datos         = DB::select($sql);
            $imagen        = DB::select($sql_imagen);
            $pic           = DB::select($sql_pic);
            $identificacion= DB::select($sql_identificaion);
            $edo= DB::select($sql_edo_civil);
            $paises= DB::select($sql_paises);
            $discapacidad= DB::select($sql_discapacidad);
            $generos= DB::select($sql_generos);

            $salarios= DB::select($sql_salarios);
            $disponibilidad= DB::select($sql_disponibilidad);
            $cargos= DB::select($sql_cargos);

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
            $vista->discapacidad= $discapacidad;
            $vista->generos= $generos;
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

        public function datos_preferencias_laborales()
    {
        $sql_preferencias_laborales="
        SELECT *, count(*) as cantidad FROM tbl_candidato_preferencias_laborales WHERE id_usuario=".session()->get('cand_id')."";
         
            $datos=DB::select($sql_preferencias_laborales);
            if($datos[0]->cantidad!=0)
            {
                
                $sql="UPDATE tbl_candidato_preferencias_laborales SET
                id_remuneracion_pre=".$_POST['remuneracion'].", 
                id_jornada=".$_POST['jornada'].", 
                WHERE id_usuario=".session()->get('cand_id')." 
                ";
                 DB::update($sql);
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
                    DB::insert($sql);
                    return redirect("candiperfil");
                 
            }
        } 
}
