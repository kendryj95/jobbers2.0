<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;

class con_candidato_dashboard extends Controller
{
    public function dashboard(Request $request)
    {
    	$id_usuario = session()->get("cand_id");

        $vista = View::make('candidatos_dashboard');

        try {
        	$postulaciones = DB::select("SELECT COUNT(*) AS count FROM tbl_postulaciones WHERE id_usuario=$id_usuario");
        	$empresas_seguidas = DB::select("SELECT COUNT(*) AS count FROM tbl_candidato_empresas_seguidas WHERE id_usuario=$id_usuario ");
        	$favoritos = DB::select("SELECT COUNT(*) AS count FROM tbl_favoritos WHERE id_usuario=$id_usuario ");
        	$recomendaciones = DB::select("SELECT COUNT(*) AS count FROM tbl_recomendaciones WHERE id_usuario=$id_usuario ");

        	$vista->postulaciones = $postulaciones[0]->count;
        	$vista->empresas_seguidas = $empresas_seguidas[0]->count;
        	$vista->favoritos = $favoritos[0]->count;
        	$vista->recomendaciones = $recomendaciones[0]->count;
            return $vista;
        } catch (Exception $e) {

        }

    }
}
