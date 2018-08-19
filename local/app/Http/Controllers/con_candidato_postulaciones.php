<?php

namespace App\Http\Controllers;

use DB;
use View;

class con_candidato_postulaciones extends Controller
{
    public function index()
    {
        $vista = View::make("candidatos_postulaciones");
        $sql   = "SELECT t2.id,t2.titulo,t2.descripcion,t3.nombre,CONCAT(t4.provincia,' / ',t5.localidad)as dir FROM tbl_postulaciones t1
            LEFT JOIN tbl_publicacion t2 ON t2.id=t1.id_publicacion
            LEFT JOIN tbl_empresa t3 ON t3.id=t2.id_empresa
            LEFT JOIN tbl_provincias t4 ON t4.id = t2.id_provincia
            LEFT JOIN tbl_localidades t5 ON t5.id = t2.id_localidad
            WHERE t1.id_usuario=" . session()->get("cand_id") . "";
        $sql_postulados = "
        SELECT id_publicacion,count(id_usuario) AS postulador FROM tbl_postulaciones
GROUP BY id_publicacion";

        try {
            $datos             = DB::select($sql);
            $postulados        = DB::select($sql_postulados);
            $vista->postulados = $postulados;
            $vista->datos      = $datos;
            return $vista;
        } catch (Exception $e) {

        }
    }

    public function postular($id)
    {
        $bandera = 0;
        $sql     = "
        SELECT count(*) as cantidad
        FROM tbl_postulaciones
        WHERE id_usuario=" . session()->get("cand_id") . " AND id_publicacion=" . $id . "";
        try {
            $datos = DB::select($sql);
            if ($datos[0]->cantidad == 0) {
                $bandera = 1;
            }
        } catch (Exception $e) {

        }

        if ($bandera) {
            $sql = "INSERT INTO tbl_postulaciones
            VALUES(null," . session()->get("cand_id") . "," . $id . ",null)";
            try {
                DB::insert($sql);
                return redirect("candipostulaciones");
            } catch (Exception $e) {

            }
        } else {
            return redirect("detalleoferta/" . $id . "?info=Ya te encuentras postulado a esta oferta.");
        }
    }
}
