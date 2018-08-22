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
                DB::insert("INSERT INTO tbl_empresa VALUES (null,?,?,?,?,?,?,?,?,?,?,?,1,?,null,null,null,null,null,null,1)", [$id_usuario, $nombre_empresa, $responsable, $razon_social, $cuit, $telefono, $descripcion, $pais, $provincia, $localidad, $actividad, $direccion]);
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

    public function edit($id)
    {
        $actividades_empresa = DB::select("SELECT * FROM tbl_actividades_empresa ORDER BY nombre");
        $paises              = DB::select("SELECT * FROM tbl_paises ORDER BY descripcion");
        $provincias          = DB::select("SELECT * FROM tbl_provincias");

        $empresa = DB::select("SELECT e.*, u.correo FROM tbl_empresa e LEFT JOIN tbl_usuarios u ON e.id_usuario=u.id WHERE e.id=?", [$id]);

        if ($empresa) {

            $localidades = [];

            if ($empresa[0]->provincia != 0) {
                $localidades = DB::select("SELECT * FROM tbl_localidades WHERE id_provincia=?", [$empresa[0]->provincia]);
            }

            $params = [
                "actividades" => $actividades_empresa,
                "paises"      => $paises,
                "provincias"  => $provincias,
                "localidades" => $localidades,
                "empresa" => $empresa
            ];
            return view('administrator_empresa_edit', $params);
        }

        return view('administrator/empresas');

        
    }

    public function editStore(Request $request)
    {

        $this->validate($request, [
            'correo' => 'required|email',
            'nombre_empresa' => 'required',
            'nombre_resp' => 'required',
            'razon_social' => 'required',
            'telefono' => 'required|numeric',
            'descripcion_emp' => 'required',
            'pais' => 'required',
            'provincia' => 'required',
            'localidad' => 'required',
            'act_emp' => 'required',
            'direccion' => 'required',
        ],
        [
            'correo.required' => 'Correo es un campo obligatorio, no puede quedar vacío.',
            'correo.email' => 'Correo no valido.',
            'nombre_empresa.required' => 'Nombre de la empresa es un campo obligatorio, no puede quedar vacío.',
            'nombre_resp.required' => 'Nombre del responsable es un campo obligatorio, no puede quedar vacío.',
            'razon_social.required' => 'Razon social es un campo obligatorio, no puede quedar vacío.',
            'telefono.required' => 'Telefono es un campo obligatorio, no puede quedar vacío.',
            'telefono.numeric' => 'Telefono no valido.',
            'descripcion_emp.required' => 'Descripción de la empresa es un campo obligatorio, no puede quedar vacío.',
            'pais.required' => 'País es un campo obligatorio, no puede quedar vacío.',
            'provincia.required' => 'Provincia es un campo obligatorio, no puede quedar vacío.',
            'localidad.required' => 'Localidad es un campo obligatorio, no puede quedar vacío.',
            'act_emp.required' => 'Actividad de la empresa es un campo obligatorio, no puede quedar vacío.',
            'direccion.required' => 'Dirección es un campo obligatorio, no puede quedar vacío.',
        ]);

        $verificarEmail = DB::select("SELECT u.id FROM tbl_usuarios u INNER JOIN tbl_empresa e ON u.id=e.id_usuario WHERE u.correo=? AND e.id <> ?", [$request->correo, $request->id_empresa]);

        if ($verificarEmail) {
            return redirect('administracion/empresas');
        } else {
            DB::beginTransaction();

            try {
                
                if ($request->pass == "") {
                    DB::update("UPDATE tbl_usuarios SET correo=? WHERE id=?", [$request->correo, $request->id_usuario]);
                } else {
                    DB::update("UPDATE tbl_usuarios SET correo=?, clave=? WHERE id=?", [$request->correo, $request->pass, $request->id_usuario]);
                }

                DB::update("UPDATE tbl_empresa SET nombre=?, responsable=?, razon_social=?, cuit=?, telefono=?, descripcion=?, pais=?, provincia=?, localidad=?, sector=?, direccion=? WHERE id=?", [$request->nombre_empresa, $request->nombre_resp, $request->razon_social, $request->cuit, $request->telefono, $request->descripcion_emp, $request->pais, $request->provincia, $request->localidad, $request->act_emp, $request->direccion, $request->id_empresa]);

                DB::commit();
                return redirect('administracion/empresas?r=2');
            } catch (Exception $e) {
                DB::rollback();
                return redirect('administracion/empresas/edit/'.$request->id_empresa.'?r=3');
            }
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            DB::delete("DELETE FROM tbl_usuarios WHERE id=?", [$id]);
            DB::commit();
            return redirect('administracion/empresas?r=3');
        } catch (Exception $e) {
            DB::rollback();
            return redirect('administracion/empresas?r=4');
        }
    }

    public function plantillas()
    {
        $plantillas = DB::select("SELECT * FROM tbl_plantillas_ofertas");

        return view('administrator_empresa_plantillas', compact('plantillas'));
    }

    public function plantillaStore(Request $request)
    {
        $this->validate($request,
        [
            "nombre_plantilla" => "required|unique:tbl_plantillas_ofertas",
            "titulo" => "required",
            "descripcion" => "required",
        ],
        [
            "nombre_plantilla.required" => "Nombre de plantilla es un campo obligatorio.",
            "nombre_plantilla.unique" => "Ya existe una plantilla con ese nombre.",
            "titulo.required" => "Titulo de oferta es un campo obligatorio.",
            "descripcion.required" => "Descripción de oferta es un campo obligatorio."
        ]);

        $id_empresa = isset($request->id_empresa) ? $request->id_empresa : null;
        $descripcion = preg_replace("/[\r\n|\n|\r]+/", " ", $request->descripcion);

        DB::beginTransaction();

        switch ($request->accion) {
            case 1: // accion para insertar
                try {
                    DB::insert("INSERT INTO tbl_plantillas_ofertas (id_empresa,nombre_plantilla,titulo_oferta,descripcion_oferta) VALUES (?,?,?,?)", [$id_empresa, $request->nombre_plantilla, $request->titulo, $descripcion]);
                    DB::commit();

                    return redirect('administracion/empresas/plantillas?r=1');
                } catch (Exception $e) {
                    DB::rollback();
                    return redirect()->back()->withErrors(['Ha ocurrido un error inesperado. Intentelo de nuevo.']);
                }
                break;
            
            case 2:
                try {
                    DB::update("UPDATE tbl_plantillas_ofertas SET nombre_plantilla=?, titulo_oferta=?, descripcion_oferta=? WHERE id=?", [$request->nombre_plantilla, $request->titulo, $descripcion, $request->id_plantilla]);
                    DB::commit();

                    return redirect('administracion/empresas/plantillas?r=2');
                } catch (Exception $e) {
                    DB::rollback();
                    return redirect()->back()->withErrors(['Ha ocurrido un error inesperado. Intentelo de nuevo.']);
                }
                break;
        }
    }

    public function getInfoPlantilla($id)
    {
        $plantilla = DB::select("SELECT * FROM tbl_plantillas_ofertas WHERE id=?", [$id]);

        echo json_encode([
            "plantilla" => $plantilla[0]
        ]);
    }

}
