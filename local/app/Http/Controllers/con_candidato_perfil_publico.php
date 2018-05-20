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
        $con_imagen = 0;
        try {
            $datos         = DB::select($sql);
            $imagen        = DB::select($sql_imagen);
            $pic           = DB::select($sql_pic);
            $vista->datos  = $datos;
            $vista->imagen = $imagen;

            if ($pic[0]->cantidad == 1) {
                $con_imagen = 1;
            }
            $vista->con_imagen = $con_imagen;
            $vista->pic        = $pic;
            return $vista;
        } catch (Exception $e) {

        }
    }

}
