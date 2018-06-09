<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class con_postulados extends Controller
{
    public function filtrar(Request $request)
    {
    	$data = $request->all();
    	$criterio = "";
    	$criterio_id_publicacion = "";

    	if ($data["sexo"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE cdp.id_sexo = $data[sexo]";
    		} else {
    			$criterio .= " AND cdp.id_sexo = $data[sexo]";
    		}
    	}

    	if ($data["salario"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE cpl.id_remuneracion_pre = $data[salario]";
    		} else {
    			$criterio .= " AND cpl.id_remuneracion_pre = $data[salario]";
    		}
    	}

    	if ($data["edad"] != "") {
    		$explode = explode(",", $data["edad"]);
    		$edad = [];

    		if ($criterio == "") {

    			if (count($explode) > 1) {
    				$edad[0] = $explode[0];
    				$edad[1] = $explode[1];

    				$criterio .= " WHERE TIMESTAMPDIFF(YEAR,cdp.fecha_nac,CURDATE()) BETWEEN $edad[0] AND $edad[1]";
    			} else {
    				$edad[0] = $explode[0];
    				$criterio .= " WHERE TIMESTAMPDIFF(YEAR,cdp.fecha_nac,CURDATE()) > $edad[0]";
    			}

    		} else {

    			if (count($explode) > 1) {
    				$edad[0] = $explode[0];
    				$edad[1] = $explode[1];

    				$criterio .= " AND TIMESTAMPDIFF(YEAR,cdp.fecha_nac,CURDATE()) BETWEEN $edad[0] AND $edad[1]";
    			} else {
    				$edad[0] = $explode[0];
    				$criterio .= " AND TIMESTAMPDIFF(YEAR,cdp.fecha_nac,CURDATE()) > $edad[0]";
    			}
    		}
    	}

    	if ($data["area"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE ce.id_area_estudio=$data[area]";
    		} else {
    			$criterio .= " AND ce.id_area_estudio=$data[area]";
    		}
    	}

    	if ($data["provincia"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE cic.id_provincia=$data[provincia]";
    		} else {
    			$criterio .= " AND cic.id_provincia=$data[provincia]";
    		}
    	}

    	if ($data["idioma"] != 0) {
    		if ($criterio == "") {
    			$criterio .= " WHERE ci.id_idioma=$data[idioma]";
    		} else {
    			$criterio .= " AND ci.id_idioma=$data[idioma]";
    		}
    	}

    	if ($criterio != "") {
    		$criterio_id_publicacion = " AND p.id_publicacion=?";
    	} else {
    		$criterio_id_publicacion = " WHERE p.id_publicacion=?";
    	}

    	$sql = "
    	SELECT 
		p.id_usuario,
		pb.id AS id_publicacion, 
		p.tmp AS fecha_postulacion, 
		pb.titulo AS titulo_oferta, 
		CONCAT(cdp.nombres,' ',cdp.apellidos) AS nombre_candidato, 
		TIMESTAMPDIFF(YEAR,cdp.fecha_nac,CURDATE()) AS edad_candidato,
		g.descripcion AS sexo_candidato,
		ce.titulo AS profesion_candidato 
		FROM tbl_postulaciones p 
		INNER JOIN tbl_publicacion pb ON p.id_publicacion=pb.id 
		LEFT JOIN tbl_candidato_datos_personales cdp ON p.id_usuario= cdp.id_usuario
		LEFT JOIN tbl_generos g ON cdp.id_sexo=g.id
		LEFT JOIN tbl_candidatos_educacion ce ON p.id_usuario=ce.id_usuario
		LEFT JOIN tbl_candidato_preferencias_laborales cpl ON p.id_usuario=cpl.id_usuario
		LEFT JOIN tbl_area_estudios ae ON ce.id_area_estudio=ae.id
		LEFT JOIN tbl_candidato_info_contacto cic ON p.id_usuario=cic.id_usuario
		LEFT JOIN tbl_candidato_idioma ci ON p.id_usuario=ci.id_usuario
		$criterio
		$criterio_id_publicacion
		ORDER BY fecha_postulacion DESC";

		$postulados = DB::select($sql, [$data["id_publicacion"]]);

    	echo json_encode([
    		"postulados" => $postulados
    	]);
    }
}
