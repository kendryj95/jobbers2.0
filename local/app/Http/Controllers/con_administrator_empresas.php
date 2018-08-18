<?php

namespace App\Http\Controllers;

use DB;
use View;
use Illuminate\Http\Request;

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
        u.correo,
        e.estatus
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

        $actividades_empresa = DB::select("SELECT * FROM tbl_actividades_empresa ORDER BY nombre");
        $paises              = DB::select("SELECT * FROM tbl_paises ORDER BY descripcion");
        $provincias          = DB::select("SELECT * FROM tbl_provincias");

        $params = [
            "actividades" => $actividades_empresa,
            "paises"      => $paises,
            "provincias"  => $provincias,
        ];

        return view('administrator_empresa_create', $params);
    }

    public function register(Request $request)
    {
        $correo = $request->correo;
        $pass = md5($request->pass);
        $nombre_empresa = $request->nombre_empresa;
        $actividad = $request->act_emp;
        $responsable = $request->nombre_resp;
        $razon_social = $request->razon_social;
        $cuit = $request->cuit;
        $telefono = $request->telefono;
        $pais = $request->pais;
        $provincia = $request->provincia;
        $localidad = $request->localidad;
        $direccion = $request->direccion;
        $descripcion = $request->descripcion_emp;

        $exist = DB::select("SELECT * FROM tbl_usuarios WHERE correo=?", [$correo]);

        if (!$exist) {
            DB::beginTransaction();

            try {
                
                DB::insert("INSERT INTO tbl_usuarios VALUES (null,?,'',?,1,?,1,'',null)", [$correo, $pass, $this->aleatorio(45)]);
                $id_usuario = DB::getPdo()->lastInsertId();
                DB::insert("INSERT INTO tbl_empresa VALUES (null,?,?,?,?,?,?,?,?,?,?,?,1,?,null,null,null,null,null,null)", [$id_usuario, $nombre_empresa, $responsable, $razon_social, $cuit, $telefono, $descripcion, $pais, $provincia, $localidad, $actividad, $direccion]);
                $id_empresa = DB::getPdo()->lastInsertId();

                DB::insert("INSERT INTO tbl_empresas_planes VALUES (null,?,1,null)", [$id_empresa]);

                DB::commit();

                return redirect('administracion/empresas?r=1');

            } catch (Exception $e) {
                DB::rollback();
                return redirect('administracion/empresas/create?r=2');

            }
        } else {
            return redirect('administracion/empresas/create?r=3');
        }
    }

    public function suspender_habilitar($accion, $id)
    {
        $exist = DB::select("SELECT id FROM tbl_empresa WHERE id=?", [$id]);

        if ($exist) {
            DB::update("UPDATE tbl_empresa SET estatus=? WHERE id=?", [$accion, $id]);
            return redirect("administracion/empresas");
        } else {
            return redirect("administracion/empresas");
        }
        
    }

    private function aleatorio($length)
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
