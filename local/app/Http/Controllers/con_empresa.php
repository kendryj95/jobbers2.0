<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use View;

class con_empresa extends Controller
{
    public function login()
    {
        return view('empresa_login');
    }

    public function ver()
    {
        return view('empresas_ver');
    }
    public function index()
    {
        return view('administrator_empresas_ver');
    }

    public function profile()
    {

        $id_empresa = isset($_REQUEST["e"]) ? $_REQUEST["e"] : false;

        if ($id_empresa) {
            if ($id_empresa == session()->get("emp_ide")) {
                $actividades_empresa = DB::select("SELECT * FROM tbl_actividades_empresa ORDER BY nombre");
                $paises              = DB::select("SELECT * FROM tbl_paises ORDER BY descripcion");
                $provincias          = DB::select("SELECT * FROM tbl_provincias");

                $localidades = [];

                $datos_emp = DB::select("SELECT e.*, u.correo FROM tbl_empresa e INNER JOIN tbl_usuarios u ON e.id_usuario=u.id WHERE e.id=?", [$id_empresa]);

                if ($datos_emp[0]->provincia != 0) {
                    $localidades = DB::select("SELECT * FROM tbl_localidades WHERE id_provincia=?", [$datos_emp[0]->provincia]);
                }

                $params = [
                    "actividades" => $actividades_empresa,
                    "paises"      => $paises,
                    "provincias"  => $provincias,
                    "localidades" => $localidades,
                    "empresa"     => $datos_emp,
                ];
                return view('empresa_profile', $params);
            } else {
                return Redirect("empresa/perfil?e=" . session()->get("emp_ide"));
            }
        } else {
            return Redirect("inicio");
        }
    }

    public function registroView()
    {
        return view('empresa_registro_view');
    }

    public function newPost()
    {

        $areas            = DB::select("SELECT id, nombre AS area FROM tbl_areas ORDER BY nombre");
        $provincias       = DB::select("SELECT * FROM tbl_provincias");
        $planes_estado    = DB::select("SELECT * FROM tbl_planes_estado");
        $disponibilidades = DB::select("SELECT * FROM tbl_disponibilidad");
        $salarios         = DB::select("SELECT * FROM tbl_rango_salarios");

        $params = [
            "areas"            => $areas,
            "provincias"       => $provincias,
            "planes"           => $planes_estado,
            "disponibilidades" => $disponibilidades,
            "salarios"         => $salarios,
        ];

        return view('empresa_new_post', $params);
    }

    public function editPost($id_post)
    {
    	$sql   = "SELECT * FROM tbl_publicacion WHERE id=?";
    	$areas            = DB::select("SELECT id, nombre AS area FROM tbl_areas ORDER BY nombre");
        $provincias       = DB::select("SELECT * FROM tbl_provincias");
        $planes_estado    = DB::select("SELECT * FROM tbl_planes_estado");
        $disponibilidades = DB::select("SELECT * FROM tbl_disponibilidad");
        $salarios         = DB::select("SELECT * FROM tbl_rango_salarios");
        $localidades 		  = [];
        $sectores 		  = [];

    	$oferta = DB::select($sql, [$id_post]);

    	if ($oferta) {

    		$localidades = DB::select("SELECT * FROM tbl_localidades WHERE id_provincia=?", [$oferta[0]->id_provincia]);
    		$sectores = DB::select("SELECT * FROM tbl_areas_sectores WHERE id_area=?", [$oferta[0]->id_area]);

    		$params = [
    		    "areas"            => $areas,
    		    "provincias"       => $provincias,
    		    "planes"           => $planes_estado,
    		    "disponibilidades" => $disponibilidades,
    		    "salarios"         => $salarios,
    		    "oferta"		   => $oferta,
    		    "localidades"      => $localidades,
    		    "sectores"         => $sectores
    		];
    		return view("empresa_edit_post", $params);
    	} else {
    		return redirect("empresa/ofertas");
    	}
    }

    public function ofertas()
    {
        $sql1          = DB::select("SELECT COUNT(*) AS total_ofertas FROM tbl_publicacion WHERE id_empresa=?", [session()->get("emp_ide")]);
        $total_ofertas = $sql1[0]->total_ofertas;

        $ofertas = DB::select("SELECT
              pub.id,
              pub.titulo,
              CONCAT(prov.provincia,', ',l.localidad) AS ubicacion,
              CONCAT(pub.tmp,',<br>',pub.fecha_venc) AS fcrea_fvenc,
              IF(pub.estatus=1,'Activo','Inactivo') AS estatus
              FROM
              tbl_publicacion pub
              INNER JOIN tbl_provincias prov ON pub.id_provincia=prov.id
              INNER JOIN tbl_localidades l ON pub.id_localidad=l.id
              WHERE pub.id_empresa=?", [session()->get("emp_ide")]);

        $params = [
            "total_ofertas" => $total_ofertas,
            "ofertas"       => $ofertas,
        ];
        return view('empresa_ofertas', $params);
    }

    public function planes()
    {
        return view('empresa_planes');
    }

    public function postulados()
    {
        return view('empresa_postulados');
    }

    public function existEmpresa()
    {
        $response = '';

        $exist = DB::select("SELECT id FROM tbl_usuarios WHERE correo=? AND tipo_usuario=1", [$_REQUEST['email']]);

        if ($exist) {
            $response = 2;
        } else {
            $response = 1;
        }

        echo json_encode([
            "status" => $response,
        ]);
    }

    public function registro()
    {

        $response = '';

        $user               = $_REQUEST['user'];
        $email              = $_REQUEST['email'];
        $password           = $_REQUEST['password'];
        $nombre_responsable = $_REQUEST['nombre_responsable'];
        $nombre_empresa     = $_REQUEST['nombre_empresa'];
        $razon_social       = $_REQUEST['razon_social'];
        $cuit               = $_REQUEST['cuit'];
        $telefono           = $_REQUEST['telefono'];
        $plan               = $_REQUEST['plan'];

        $sql1 = "INSERT INTO tbl_empresa(id_usuario,nombre,responsable,razon_social,cuit,telefono,id_imagen) VALUES(?,?,?,?,?,?,?)";

        $sql2 = "INSERT INTO tbl_empresas_planes(id_empresa,id_plan) VALUES (?,?)";

        $sql3    = "INSERT INTO tbl_usuarios(usuario,correo,clave,tipo_usuario) VALUES(?,?,?,?)";
        $params3 = [$user, $email, md5($password), 1];

        DB::beginTransaction();

        try {

            DB::insert($sql3, $params3); // tbl_usuarios

            $id_usuario = DB::getPdo()->lastInsertId();
            $params1    = [$id_usuario, $nombre_empresa, $nombre_responsable, $razon_social, $cuit, $telefono, 1];

            DB::insert($sql1, $params1); //tbl_empresa

            $id_empresa = DB::getPdo()->lastInsertId();
            $params2    = [$id_empresa, $plan];

            DB::insert($sql2, $params2); //tbl_empresas_planes

            DB::commit();
            $response = 1;

        } catch (Exception $e) {
            DB::rollback();
            $response = 2;
        }

        echo json_encode([
            "status" => $response,
        ]);
    }

    public function registerPost()
    {

        $response = '';

        $titulo       = $_REQUEST["titulo"];
        $descripcion  = $_REQUEST["descripcion"];
        $area         = $_REQUEST["area"];
        $sector       = $_REQUEST["sector"];
        $provincia    = $_REQUEST["provincia"];
        $localidad    = $_REQUEST["localidad"];
        $salario      = $_REQUEST["salario"];
        $direccion    = $_REQUEST["direccion"];
        $plan         = $_REQUEST["plan"];
        $disp         = $_REQUEST["disp"];
        $discapacidad = isset($_REQUEST["discapacidad"]) ? 1 : 0;
        $video        = $_REQUEST["video"];

        $id_empresa = session()->get("emp_ide");

        $sql    = "INSERT INTO tbl_publicacion(id_imagen,id_empresa,titulo,id_sector,id_area,id_disponibilidad,id_provincia,id_localidad,discapacidad,descripcion,direccion,video_youtube,estatus,fecha_venc,id_salario,id_plan_estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $fecha_venc = strtotime("+15 day", strtotime(date('Y-m-d H:i:s')));
        $fecha_venc = date('Y-m-d H:i:s', $fecha_venc);

        $params = [1, $id_empresa, $titulo, $sector, $area, $disp, $provincia, $localidad, $discapacidad, $descripcion, $direccion, $video, 1, $fecha_venc, $salario, $plan];

        DB::beginTransaction();

        try {
            DB::insert($sql, $params);

            DB::commit();
            $response = 1;
        } catch (Exception $e) {
            DB::rollback();
            $response = 2;
        }

        echo json_encode([
            "status" => $response,
        ]);

    }

    public function updatePost()
    {

        $response = '';

        $id_post       = $_REQUEST["id_post"];
        $titulo       = $_REQUEST["titulo"];
        $descripcion  = $_REQUEST["descripcion"];
        $area         = $_REQUEST["area"];
        $sector       = $_REQUEST["sector"];
        $provincia    = $_REQUEST["provincia"];
        $localidad    = $_REQUEST["localidad"];
        $salario      = $_REQUEST["salario"];
        $direccion    = $_REQUEST["direccion"];
        $plan         = $_REQUEST["plan"];
        $disp         = $_REQUEST["disp"];
        $discapacidad = isset($_REQUEST["discapacidad"]) ? 1 : 0;
        $video        = $_REQUEST["video"];

        $id_empresa = session()->get("emp_ide");

        $sql = "UPDATE tbl_publicacion SET titulo=?, id_sector=?, id_area=?, id_disponibilidad=?, id_provincia=?, id_localidad=?, discapacidad=?, descripcion=?, direccion=?, video_youtube=?, id_salario=?, id_plan_estado=? WHERE id=? AND id_empresa=?";

        $params = [$titulo, $sector, $area, $disp, $provincia, $localidad, $discapacidad, $descripcion, $direccion, $video, $salario, $plan, $id_post, $id_empresa];

        DB::beginTransaction();

        try {
            DB::update($sql, $params);

            DB::commit();
            $response = 1;
        } catch (Exception $e) {
            DB::rollback();
            $response = 2;
        }

        echo json_encode([
            "status" => $response,
        ]);

    }

    public function actualizarProfile(Request $request)
    {

        switch ($_REQUEST["op"]) {
            case 1:

                $nombre_empresa  = $_REQUEST["nombre_empresa"];
                $act_emp         = $_REQUEST["act_emp"];
                $nombre_resp     = $_REQUEST["nombre_resp"];
                $correo          = $_REQUEST["correo"];
                $razon_social    = $_REQUEST["razon_social"];
                $cuit            = $_REQUEST["cuit"];
                $telefono        = $_REQUEST["telefono"];
                $pais            = $_REQUEST["pais"];
                $provincia       = $_REQUEST["provincia"];
                $localidad       = $_REQUEST["localidad"];
                $direccion       = $_REQUEST["direccion"];
                $descripcion_emp = $_REQUEST["descripcion_emp"];

                $response = '';

                DB::beginTransaction();

                try {
                    DB::update("UPDATE tbl_empresa SET nombre=?, responsable=?, razon_social=?, cuit=?, telefono=?, descripcion=?, pais=?, provincia=?, localidad=?, sector=?, direccion=? WHERE id=?", [$nombre_empresa, $nombre_resp, $razon_social, $cuit, $telefono, $descripcion_emp, $pais, $provincia, $localidad, $act_emp, $direccion, session()->get('emp_ide')]);

                    DB::update("UPDATE tbl_usuarios SET correo=? WHERE id=?", [$correo, session()->get("emp_id")]);

                    $request->session()->set("empresa", $correo);

                    DB::commit();
                    $response = 1;

                } catch (Exception $e) {
                    DB::rollback();
                    $response = 2;
                }

                echo json_encode([
                    "status" => $response,
                ]);

                break;

            case 2:

                $web = $_REQUEST["web"];
                $fb  = $_REQUEST["fb"];
                $tw  = $_REQUEST["tw"];
                $ig  = $_REQUEST["ig"];
                $lnd = $_REQUEST["lnd"];

                $response = '';

                DB::beginTransaction();

                try {

                    DB::update("UPDATE tbl_empresa SET web=?, facebook=?, twitter=?, instagram=?, linkedin=? WHERE id=?", [$web, $fb, $tw, $ig, $lnd, session()->get("emp_ide")]);

                    DB::commit();

                    $response = 1;

                } catch (Exception $e) {
                    DB::rollback();
                    $response = 2;
                }

                echo json_encode([
                    "status" => $response,
                ]);
                break;
            case 3:

            	$response = '';

            	DB::beginTransaction();

            	try {

            	    DB::update("UPDATE tbl_empresa SET id_imagen=? WHERE id=?", [$_REQUEST['id_imagen'], session()->get("emp_ide")]);

            	    $data = DB::select("SELECT nombre_aleatorio AS imagen FROM tbl_archivos WHERE id=?",[$_REQUEST['id_imagen']]);

            	    $request->session()->set("emp_imagen", $data[0]->imagen);

            	    DB::commit();

            	    $response = 1;

            	} catch (Exception $e) {
            	    DB::rollback();
            	    $response = 2;
            	}

            	echo json_encode([
            	    "status" => $response,
            	]);

            	break;
            case 4:

            	$response = '';

            	$pass_act = md5($_REQUEST['pass_act']);
            	$pass_new = md5($_REQUEST['pass_new']);

            	$pass_coincide = DB::select("SELECT id FROM tbl_usuarios WHERE clave=? AND id=?",[$pass_act, session()->get("emp_id")]);

            	if ($pass_coincide) {
            		DB::beginTransaction();

            		try {

            		    DB::update("UPDATE tbl_usuarios SET clave=? WHERE id=?", [$pass_new, session()->get("emp_id")]);

            		    DB::commit();

            		    $response = 1;

            		} catch (Exception $e) {
            		    DB::rollback();
            		    $response = 3;
            		}
            	} else {
            		$response = 2;
            	}

            	echo json_encode([
            	    "status" => $response,
            	]);

            	break;
        }
    }

    public function detail()
    {

        $id_empresa = isset($_REQUEST["e"]) ? $_REQUEST["e"] : false;

        if ($id_empresa) {

            $sql = "SELECT
        a.nombre_aleatorio AS imagen,
        e.nombre AS nombre_empresa,
        e.descripcion,
        e.facebook,
        e.web,
        e.twitter,
        e.instagram,
        e.linkedin,
        CONCAT(p.provincia, ', ', l.localidad) AS provincia_localidad,
        (SELECT COUNT(*) FROM tbl_publicacion WHERE id_empresa=e.id) AS total_ofertas,
        (SELECT MAX(tmp) FROM tbl_publicacion WHERE id_empresa=e.id) AS last_date_oferta,
        ae.nombre AS actividad_empresa
        FROM tbl_empresa e
        INNER JOIN tbl_archivos a ON e.id_imagen=a.id
        LEFT JOIN tbl_provincias p ON e.provincia=p.id
        LEFT JOIN tbl_localidades l ON e.localidad=l.id
        LEFT JOIN tbl_actividades_empresa ae ON e.sector=ae.id
        WHERE e.id=?";

            $datos_emp = DB::select($sql, [$id_empresa]);

            $ofertas = DB::select("SELECT
              pub.id,
              pub.titulo,
              CONCAT(prov.provincia,', ',l.localidad) AS ubicacion,
              pub.tmp AS fecha_creacion,
              (SELECT nombre FROM tbl_disponibilidad WHERE id=pub.id_disponibilidad) AS disponibilidad
              FROM
              tbl_publicacion pub
              INNER JOIN tbl_provincias prov ON pub.id_provincia=prov.id
              INNER JOIN tbl_localidades l ON pub.id_localidad=l.id
              WHERE pub.id_empresa=?", [$id_empresa]);

            $params = [
                "empresa" => $datos_emp,
                "ofertas" => $ofertas,
            ];

            return view('empresa_detalle', $params);
        } else {
            return Redirect("inicio");
        }

    }

    public function accionPost($accion, $id_post)
    {
    	switch ($accion) {
    		case 1: // Pausar Publicación
    			
    			DB::beginTransaction();
    			try {
    				
    				DB::update("UPDATE tbl_publicacion SET estatus=0 WHERE id=?", [$id_post]);
    				DB::commit();

    				return redirect("empresa/ofertas?response=1");
    			} catch (Exception $e) {
    				DB::rollback();
    				return redirect("empresa/ofertas?response=2");
    			}
    			break;
    		
    		case 2: // Habilitar Publicación
    			
    			DB::beginTransaction();
    			try {
    				
    				DB::update("UPDATE tbl_publicacion SET estatus=1 WHERE id=?", [$id_post]);
    				DB::commit();

    				return redirect("empresa/ofertas?response=1");
    			} catch (Exception $e) {
    				DB::rollback();
    				return redirect("empresa/ofertas?response=2");
    			}

    			break;
    		case 3: // Eliminar Publicación

    			DB::beginTransaction();
    			try {
    				
    				DB::delete("DELETE FROM tbl_publicacion WHERE id=?", [$id_post]);
    				DB::commit();

    				return redirect("empresa/ofertas?response=3");
    			} catch (Exception $e) {
    				DB::rollback();
    				return redirect("empresa/ofertas?response=4");
    			}

    			break;
    	}
    }
}
