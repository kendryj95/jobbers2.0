<?php

namespace App\Http\Controllers;

use DB;
use View;

class con_administrator_empresas extends Controller
{
    public function index()
    {
        $vista = View::make("administrator_empresas_ver");
        $sql   = "
        SELECT t1.id,t1.nombre,t2.provincia,t3.localidad,t4.nombre,t1.descripcion,t5.nombre_aleatorio FROM tbl_empresa t1
        INNER JOIN tbl_provincias t2 ON t1.provincia = t2.id
        INNER JOIN tbl_localidades t3 ON t1.localidad = t3.id
        INNER JOIN tbl_actividades_empresa t4 ON t1.sector = t4.id
        LEFT JOIN tbl_archivos t5 ON t1.id_imagen = t5.id";

        try {
            $datos        = DB::select($sql);
            $vista->datos = $datos;
            return $vista;
        } catch (Exception $e) {

        }
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
