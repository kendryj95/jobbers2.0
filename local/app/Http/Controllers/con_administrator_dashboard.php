<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use View;

class con_administrator_dashboard extends Controller
{

    public function dashboard(Request $request)
    {
        $vista = View::make('administrator_dashboard');
        $sql   = "SELECT * FROM tbl_administrador WHERE correo='" . $request->session()->get('admin') . "'";
        //Devuelve la cantidad de empresas y candidatos
        $sql_cantidad_registros = "SELECT t2.descripcion, count(t1.tipo_usuario) as cantidad FROM tbl_usuarios t1
        LEFT JOIN tbl_tipo_usuario t2 ON t2.id = t1.tipo_usuario
        GROUP BY t1.tipo_usuario";
        //Devuelve la cantidad de empresas y candidatos de la ultima semana
        $sql_cantidad_nuevos_registros = "SELECT t1.tipo_usuario,count(t1.tipo_usuario) as cantidad FROM tbl_usuarios t1
        WHERE t1.tmp >= DATE_SUB(NOW(), INTERVAL 1 WEEK)
        GROUP by t1.tipo_usuario";

        //Regresa la cantidad de usuarios y empresas activas e inactivas
        $sql_estado_de_usuarios = "SELECT t2.descripcion, count(t1.id_estatus) as cantidad FROM tbl_usuarios t1
        RIGHT JOIN tbl_estatus_usuario t2 ON t2.id = t1.id_estatus
        GROUP BY t1.id_estatus
        ORDER BY t2.descripcion asc";

        try {
            $datos                          = DB::select($sql);
            $vista->perfil                  = $datos;
            $datos_canidad_registros        = DB::select($sql_cantidad_registros);
            $vista->datos_canidad_registros = $datos_canidad_registros;

            $datos_canidad_nuevos_registros        = DB::select($sql_cantidad_nuevos_registros);
            $vista->datos_canidad_nuevos_registros = $datos_canidad_nuevos_registros;

            $datos_estados_usuarios        = DB::select($sql_estado_de_usuarios);
            $vista->datos_estados_usuarios = $datos_estados_usuarios;

            return $vista;
        } catch (Exception $e) {

        }

    }
}
