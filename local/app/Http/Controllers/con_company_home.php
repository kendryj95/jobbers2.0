<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use DB;

class con_company_home extends Controller
{
    public function index()
    {
    	$vista=View::make('empresas.index');
    	$sql_ofertas_jobbers="SELECT count(*) as cantidad FROM tbl_company_ofertas WHERE estatus =1";
    	$sql_candidatos_jobbers="SELECT count(*) as cantidad FROM tbl_usuarios WHERE tipo_usuario=2";
    	$sql_company="SELECT count(*) as cantidad FROM tbl_company WHERE estatus=1";

    	$sql_ofertas_empresa="SELECT count(*) as cantidad FROM tbl_company_ofertas 
    	WHERE id_empresa=".session()->get('company_id')." GROUP BY id_empresa";
    	$sql_postulados_empresa="
    	SELECT count(t1.id_empresa) as cantidad FROM tbl_company_ofertas t1
		INNER JOIN tbl_company_postulados t2 ON t2.id_oferta = t1.id
		WHERE id_empresa=".session()->get('company_id')."";
    	

    	$vista->oferta_total = DB::select($sql_ofertas_jobbers);
    	$vista->candidato_total = DB::select($sql_candidatos_jobbers);
    	$vista->empresas = DB::select($sql_company);
    	$vista->ofertas_empresa = DB::select($sql_ofertas_empresa);
    	$vista->postulados_empresa = DB::select($sql_postulados_empresa); 
    	return $vista;
    }

}
