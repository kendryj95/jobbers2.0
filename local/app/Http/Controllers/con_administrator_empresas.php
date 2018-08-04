<?php

namespace App\Http\Controllers;

use DB;
use View;

class con_administrator_empresas extends Controller
{
    public function index()
    {

        $condicion = "";
        $params_cond = [];

        if (isset($_GET['buscador']) && $_GET['buscador'] != "") {
            $condicion .= " AND e.nombre LIKE ? OR e.razon_social LIKE ? OR u.correo=?";
            $params_cond = [
                $_GET['buscador'].'%',
                $_GET['buscador'].'%',
                $_GET['buscador']
            ];
        }

        $sql = " 
        SELECT
        u.id AS id_usuario,
        e.id AS id_empresa,
        IF(e.nombre IS NULL OR e.nombre='', 'Sin nombre', e.nombre) AS nombre_empresa,
        IF(e.provincia=0,'Sin ubicación',CONCAT(l.localidad,', ',pv.provincia)) AS ubicacion,
        DATE_FORMAT(e.tmp, '%d/%m/%Y') AS fecha_registro,
        p.descripcion AS plan,
        u.correo
        FROM tbl_usuarios u
        INNER JOIN tbl_empresa e ON u.id=e.id_usuario
        INNER JOIN tbl_empresas_planes ep ON e.id=ep.id_empresa
        INNER JOIN tbl_planes p ON ep.id_plan=p.id
        LEFT JOIN tbl_provincias pv ON e.provincia=pv.id
        LEFT JOIN tbl_localidades l ON e.localidad=l.id
        WHERE u.tipo_usuario=1 $condicion ORDER BY id_empresa DESC;
        ";

        $empresas = DB::select($sql, $params_cond);

        $total_empresas = count($empresas);

        $params = [
            "empresas" => $empresas,
            "total_empresas" => $total_empresas
        ];

        return view('administrator_empresas', $params);
    }

    public function create()
    {
        $vista = View::make("administrator_empresas_crear");
        $sql   = "SELECT * FROM tbl_archivos WHERE id_usuario=1 AND tipo_documento='Imagen'";
        try {
            $datos           = DB::select($sql);
            $sql_paises      = "SELECT * FROM tbl_paises";
            $sql_provincias  = "SELECT * FROM tbl_provincias";
            $provincias      = DB::select($sql_provincias);
            $sql_localidades = "SELECT * FROM tbl_localidades";
            $localidades     = DB::select($sql_localidades);

            $sql_sectores = "SELECT * FROM tbl_actividades_empresa ORDER BY nombre asc";
            $sectores     = DB::select($sql_sectores);

            $vista->datos       = $datos;
            $paises             = DB::select($sql_paises);
            $vista->paises      = $paises;
            $vista->provincias  = $provincias;
            $vista->localidades = $localidades;
            $vista->sectores    = $sectores;
            return $vista;
        } catch (Exception $e) {

        }

        return view('administrator_empresas_crear');
    }

    public function register()
    {
        $imagen = "";
        if ($_POST['input_imagen'] == "") {$imagen = 0;}
        $valores = "";
        $valores = $valores . "null,";
        $valores = $valores . "'" . $_POST['nombre_empresa'] . "',";
        $valores = $valores . "'" . $_POST['nombre_responsable'] . "',";
        $valores = $valores . "'" . $_POST['razon_social'] . "',";
        $valores = $valores . "'" . $_POST['cuit'] . "',";
        $valores = $valores . "'" . $_POST['telefonos'] . "',";
        $valores = $valores . "'" . $_POST['descripcion'] . "',";
        $valores = $valores . "" . $_POST['pais'] . ",";
        $valores = $valores . "" . $_POST['provincia'] . ",";
        $valores = $valores . "" . $_POST['localidad'] . ",";
        $valores = $valores . "" . $_POST['sector'] . ",";
        $valores = $valores . "" . $imagen . ",";
        $valores = $valores . "'" . $_POST['direccion'] . "',";
        $valores = $valores . "null";
        $sql     = "INSERT INTO tbl_empresa VALUES(" . $valores . ")";

        try {
            DB::insert($sql);
            return redirect('adminempresas');
        } catch (Exception $e) {
            return "No";
        }
        return view('administrator_empresas_crear');
    }

}
