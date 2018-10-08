<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class con_company_postulados extends Controller
{
    public function get_postulados()
    {
    	$sql="SELECT t1.id_usuario as id,t1.id_oferta, t2.nombres as nombre,t4.archivo,t1.marcador FROM tbl_company_postulados t1
		INNER JOIN tbl_candidato_datos_personales t2 ON t2.id_usuario = t1.id_usuario
		LEFT JOIN tbl_usuarios_foto_perfil t3 ON t3.id_usuario = t1.id_usuario
		INNER JOIN tbl_archivos t4 ON t4.id = t3.id_foto 
		WHERE t1.id_oferta =".$_POST['publicacion']."
		GROUP BY t1.id_usuario
		"; 
		$datos=DB::select($sql);
		echo json_encode($datos);
    }

    public function get_cv()
    {
    	$sql_info_general="
    	SELECT t1.correo,
		concat(t2.nombres,' ',t2.apellidos) as nombres,
		TIMESTAMPDIFF(YEAR,t2.fecha_nac,CURDATE()) AS edad,
		t2.fecha_nac,
		if(t2.id_sexo = 1,'Masculino','Femenino') as sexo,
		t2.cuil,
		t2.sobre_mi,
		t3.nacionalidad,
		t2.n_identificacion,
		t2.hijos,
		t4.descripcion as edo_civil,
		t5.descripcion as discapacidad,
		t6.telefono,
		t7.descripcion as pais,
		t8.provincia,
		t9.localidad,
		t6.direccion,
		t11.archivo as img
		FROM tbl_usuarios t1
		LEFT JOIN tbl_candidato_datos_personales t2 ON t2.id_usuario = t1.id
		LEFT JOIN tbl_candidato_info_contacto t6 ON t6.id_usuario = t1.id
		LEFT JOIN tbl_paises t3 ON t3.id = t2.id_nacionalidad
		LEFT JOIN tbl_estados_civiles t4 ON t4.id = t2.id_edo_civil
		LEFT JOIN tbl_discapacidad t5 ON t5.id = t2.id_discapacidad
		LEFT JOIN tbl_paises t7 ON t7.id = t6.id_pais
		LEFT JOIN tbl_provincias t8 ON t8.id = t6.id_provincia
		LEFT JOIN tbl_localidades t9 ON t9.id = t6.id_localidad 
		LEFT JOIN tbl_usuarios_foto_perfil t10 ON t10.id_usuario = t1.id
        LEFT JOIN tbl_archivos t11 ON t11.id = t10.id_foto
		WHERE t1.id = ".$_POST['candidato']."
		GROUP BY t1.id";

		 
		$sql_habilidades="
		SELECT t2.id,t2.descripcion as habilidad FROM tbl_candidato_habilidades t1
		INNER JOIN tbl_habilidades t2 ON t2.id = t1.id_habilidad
		WHERE t1.id_usuario = ".$_POST['candidato']."";

		$sql_idiomas="
		SELECT t2.id,t2.descripcion as idioma FROM tbl_candidato_idioma t1
		INNER JOIN tbl_idiomas t2 ON t2.id = t1.id_idioma
		WHERE t1.id_usuario = ".$_POST['candidato']."";
		$sql_educacion="
		SELECT upper(t1.nombre_institucion) as institucion,t1.titulo,t2.nombre as area_estudio,t1.desde as edo_estudio,t2.nombre as nivel FROM tbl_candidatos_educacion t1
			LEFT JOIN tbl_areas_estudio t2 ON t2.id = t1.id_area_estudio
			LEFT JOIN tbl_nivel_estudio t3 ON t3.id  = t1.id_nivel_estudio
		WHERE t1.id_usuario = ".$_POST['candidato']."";

		$sql_preferencias="
		SELECT count(t1.id_usuario) as cantidad, t1.id_usuario, t2.salario, t3.nombre as jornada from tbl_candidato_preferencias_laborales t1
		LEFT JOIN tbl_rango_salarios t2 ON t2.id = t1.id_remuneracion_pre
		LEFT JOIN tbl_disponibilidad t3 ON t3.id = t1.id_jornada
		WHERE t1.id_usuario = ".$_POST['candidato']."
		GROUP BY t1.id_usuario";

		$sql_experiencia="
		SELECT 
		desde,
		hasta,
		timestampdiff(month,desde,hasta) as antiguedad,
		lower(descripcion) as descripcion,
		nombre_empresa,
		t2.nombre as actividad_empresa 
		FROM tbl_candidato_experiencia_laboral 
		LEFT JOIN tbl_actividades_empresa t2 ON t2.id = id_actividad_empresa
		WHERE id_usuario = ".$_POST['candidato']."";

		$sql_cargos="
		SELECT t2.descripcion as cargo FROM tbl_candidatos_cargos
		LEFT JOIN tbl_cargos t2 ON t2.id = id_cargo
		WHERE id_usuario = ".$_POST['candidato']."
		";

		$info_general=DB::select($sql_info_general);
		$idiomas=DB::select($sql_idiomas);
		$habilidades=DB::select($sql_habilidades);
		$educacion=DB::select($sql_educacion);
		$experiencia=DB::select($sql_experiencia);
		$preferencias=DB::select($sql_preferencias);
		$cargos=DB::select($sql_cargos);
		$obj = (object) array(
			'general' => $info_general,
			'habilidades' => $habilidades,
			'idiomas' => $idiomas,
			'educacion' => $educacion,
			'experiencia' => $experiencia,
			'preferencias' => $preferencias,
			'cargos' => $cargos, 
			); 
		echo json_encode($obj);
    }
}
