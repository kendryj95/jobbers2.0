<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Input;
use Response;
use Image;

class con_empresa extends Controller
{
    public function login()
    {
        return view('empresa_login');
    }

    public function ver()
    {

        $condiciones = "";

        if(isset($_POST['cargo']) && $_POST['cargo'] != "")
        {
            
            $condiciones .= " WHERE e.nombre LIKE '%$_POST[cargo]%'";
        }

        if(isset($_POST['sectores']) && count($_POST['sectores']))
        {
            $temp= []; 
            foreach ($_POST['sectores'] as $key) {
                $temp[] = $key;
            }

            if ($condiciones != "") {
                $condiciones .= " AND e.sector IN (".implode(",", $temp).")";
            } else {

                $condiciones .= " WHERE e.sector IN (".implode(",", $temp).")";
            }

        }

        if(isset($_POST['provincias']) && count($_POST['provincias']))
        {
            $temp= []; 
            foreach ($_POST['provincias'] as $key) {
                $temp[] = $key;
            }

            if ($condiciones != "") {
                $condiciones .= " AND e.provincia IN (".implode(",", $temp).")";
            } else {
                $condiciones .= " WHERE e.provincia IN (".implode(",", $temp).")";
            }
        }

        if(isset($_POST['localidades']) && count($_POST['localidades']))
        {
            $temp= []; 
            foreach ($_POST['localidades'] as $key) {
                $temp[] = $key;
            }

            if ($condiciones != "") {
                $condiciones .= " AND e.localidad IN (".implode(",", $temp).")";
            } else {
                $condiciones .= " WHERE e.localidad IN (".implode(",", $temp).")";
            }
        }

        if ($condiciones != "") {
            $condiciones .= " AND e.nombre <> '' AND a.nombre_aleatorio IS NOT NULL";
        } else {
            $condiciones .= " WHERE e.nombre <> '' AND a.nombre_aleatorio IS NOT NULL";
        }



        $peticion = "
        SELECT 
        e.id AS id_empresa, 
        e.nombre AS nombre_empresa, 
        e.descripcion, 
        CONCAT(l.localidad,', ',p.provincia) AS direccion, 
        l.localidad, 
        p.provincia, 
        a.nombre_aleatorio AS imagen, 
        asec.nombre AS sector";

        $consulta_gral = "
        FROM tbl_empresa e 
        LEFT JOIN tbl_provincias p ON e.provincia=p.id 
        LEFT JOIN tbl_localidades l ON e.localidad=l.id
        LEFT JOIN tbl_usuarios_foto_perfil t1 ON t1.id_usuario = e.id_usuario
        LEFT JOIN tbl_archivos a ON t1.id_foto = a.id  
        LEFT JOIN tbl_areas_sectores asec ON e.sector=asec.id
        $condiciones GROUP BY e.id";

        $empresas = DB::select($peticion . " " . $consulta_gral);
        $totalEmpresas = DB::select("SELECT COUNT(*) AS count FROM tbl_empresa e LEFT JOIN tbl_provincias p ON e.provincia=p.id 
        LEFT JOIN tbl_localidades l ON e.localidad=l.id
        LEFT JOIN tbl_usuarios_foto_perfil t1 ON t1.id_usuario = e.id_usuario
        LEFT JOIN tbl_archivos a ON t1.id_foto = a.id  
        LEFT JOIN tbl_areas_sectores asec ON e.sector=asec.id $condiciones");

        /**
        * PAGINACIÓN
        */

        $tamPag = 20;
        $numReg = count($empresas);
        $paginas = ceil($numReg/$tamPag);
        $limit = "";
        $paginaAct = "";
        if (!isset($_GET['pag'])) {
            $paginaAct = 1;
            $limit = 0;
        } else {
            $paginaAct = $_GET['pag'];
            $limit = ($paginaAct-1) * $tamPag;
        }

        $empresas = DB::select($peticion . " " . $this->consultaGral($condiciones, $limit, $tamPag));

        ####################

        $sql_provincias = "SELECT p.provincia, e.provincia AS id_provincia, COUNT(e.provincia) AS cantidad FROM tbl_empresa e LEFT JOIN tbl_provincias p ON e.provincia=p.id WHERE p.id IN (SELECT e.provincia $consulta_gral) GROUP BY id_provincia";

        $sql_sectores = "SELECT asec.nombre AS sector, e.sector AS id_sector, COUNT(e.sector) AS cantidad FROM tbl_empresa e LEFT JOIN tbl_areas_sectores asec ON e.sector=asec.id WHERE asec.id IN (SELECT e.sector $consulta_gral) GROUP BY id_sector";

        $sql_localidades = "SELECT l.localidad, e.localidad AS id_localidad, COUNT(e.localidad) AS cantidad FROM tbl_empresa e LEFT JOIN tbl_localidades l ON e.localidad=l.id WHERE l.id IN (SELECT e.localidad $consulta_gral) GROUP BY id_localidad";

        $sectores = DB::select($sql_sectores);
        $provincias = DB::select($sql_provincias);
        $localidades = DB::select($sql_localidades);

        $params = [
            "empresas" => $empresas,
            "totalEmpresas" => $totalEmpresas[0]->count,
            "provincias" => $provincias,
            "sectores" => $sectores,
            "localidades" => $localidades,
            "variables" => $_POST,
            "paginas" => $paginas,
            "paginaAct" => $paginaAct
        ];
        return view('empresas_ver', $params);
    }


    private function consultaGral($condiciones, $limit, $tamPag)
    {
        
        $consulta_gral = "
        FROM tbl_empresa e 
        LEFT JOIN tbl_provincias p ON e.provincia=p.id 
        LEFT JOIN tbl_localidades l ON e.localidad=l.id
        LEFT JOIN tbl_usuarios_foto_perfil t1 ON t1.id_usuario = e.id_usuario
        LEFT JOIN tbl_archivos a ON t1.id_foto = a.id  
        LEFT JOIN tbl_areas_sectores asec ON e.sector=asec.id
        $condiciones GROUP BY e.id LIMIT $limit, $tamPag";

        return $consulta_gral;
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
    	$sql   = "SELECT *, DATE_FORMAT(fecha_venc, '%d/%m/%Y') AS fecha_exp FROM tbl_publicacion WHERE id=?";
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
        $sql2 = DB::select("SELECT COUNT(*) AS total_postulados FROM tbl_postulaciones p INNER JOIN tbl_publicacion pb ON p.id_publicacion=pb.id WHERE pb.id_empresa=?", [session()->get("emp_ide")]);
        $total_postulados = $sql2[0]->total_postulados;

        $total_jobbers = DB::select("SELECT COUNT(*) AS count FROM tbl_usuarios WHERE tipo_usuario=2");

        $ofertas = DB::select("
        		SELECT
				r.*
				FROM
				(
				  SELECT
	              pub.id,
	              pub.titulo,
	              CONCAT(prov.provincia,', ',l.localidad) AS ubicacion,
	              CONCAT(DATE_FORMAT(pub.tmp,'%d/%m/%Y'),',<br>',DATE_FORMAT(pub.fecha_venc,'%d/%m/%Y')) AS fcrea_fvenc,
	              IF(pub.estatus=1,'Activo','Inactivo') AS estatus,
				  (SELECT COUNT(*) FROM tbl_postulaciones WHERE id_publicacion=pub.id) AS postulados,
				  (SELECT MAX(tmp) FROM tbl_postulaciones) AS ultima_fecha_postulacion,
                  pub.fecha_venc,
                  pub.estatus AS id_estatus
	              FROM
	              tbl_publicacion pub
	              INNER JOIN tbl_provincias prov ON pub.id_provincia=prov.id
	              INNER JOIN tbl_localidades l ON pub.id_localidad=l.id
	              WHERE pub.id_empresa=?
				) r
				ORDER BY postulados, ultima_fecha_postulacion DESC", [session()->get("emp_ide")]);

        $plan = DB::select("SELECT tbl_empresas_planes.*, tbl_planes.descripcion AS nombre FROM tbl_empresas_planes INNER JOIN tbl_planes ON tbl_planes.id=tbl_empresas_planes.id_plan WHERE tbl_empresas_planes.id_empresa=?", [session()->get("emp_ide")]);

        if ($ofertas) {
            foreach ($ofertas as $oferta) {
                switch ($plan[0]->id_plan) {
                    case 1:
                        $timestamp_final = strtotime($oferta->fecha_venc);

                        $timestamp_today = strtotime(date('Y-m-d'));

                        if ($timestamp_today >= $timestamp_final) { // ¿Caducó?
                            if ($oferta->id_estatus == 1) { // Si la publicacion caducó pero sigue estando activa, desactivarla.
                                DB::update("UPDATE tbl_publicacion SET estatus=0 WHERE id=?",[$oferta->id]);
                            }
                        } 
                        break;
                    
                    case 2:
                        $timestamp_final = strtotime($oferta->fecha_venc);

                        $timestamp_today = strtotime(date('Y-m-d'));

                        if ($timestamp_today >= $timestamp_final) { // ¿Caducó?
                            if ($oferta->id_estatus == 1) { // Si la publicacion caducó pero sigue estando activa, desactivarla.
                                DB::update("UPDATE tbl_publicacion SET estatus=0 WHERE id=?",[$oferta->id]);
                            }
                        }
                        break;
                }
            }

            $ofertas = DB::select("
                SELECT
                r.*
                FROM
                (
                  SELECT
                  pub.id,
                  pub.titulo,
                  CONCAT(prov.provincia,', ',l.localidad) AS ubicacion,
                  CONCAT(DATE_FORMAT(pub.tmp,'%d/%m/%Y'),',<br>',DATE_FORMAT(pub.fecha_venc,'%d/%m/%Y')) AS fcrea_fvenc,
                  IF(pub.estatus=1,'Activo','Inactivo') AS estatus,
                  (SELECT COUNT(*) FROM tbl_postulaciones WHERE id_publicacion=pub.id) AS postulados,
                  (SELECT MAX(tmp) FROM tbl_postulaciones) AS ultima_fecha_postulacion,
                  pub.estatus AS id_estatus,
                  DATEDIFF(NOW(), pub.fecha_venc) AS dias_venc
                  FROM
                  tbl_publicacion pub
                  INNER JOIN tbl_provincias prov ON pub.id_provincia=prov.id
                  INNER JOIN tbl_localidades l ON pub.id_localidad=l.id
                  WHERE pub.id_empresa=?
                ) r
                ORDER BY postulados, ultima_fecha_postulacion DESC", [session()->get("emp_ide")]);
        }

        $params = [
            "total_ofertas" => $total_ofertas,
            "ofertas"       => array_reverse($ofertas),
            "total_postulados" => $total_postulados,
            "total_jobbers" => $total_jobbers[0]->count
        ];
        return view('empresa_ofertas', $params);
    }

    public function planes()
    {
    	$plan = DB::select("SELECT * FROM tbl_planes WHERE id <> 1");
    	$beneficios_planes = DB::select("SELECT pb.alias_gratis, pb.alias_premium, GROUP_CONCAT(id_plan ORDER BY id_plan ASC SEPARATOR ',') AS planes_asignados FROM tbl_planes_beneficios pb INNER JOIN tbl_beneficios_per_plan bpp ON pb.id=bpp.id_beneficio GROUP BY id_beneficio");

    	$params = [
    		"plan" => $plan,
    		"beneficios_planes" => $beneficios_planes
    	];
        return view('empresa_planes', $params);
    }

    public function postulados($id_publicacion)
    {
    	$sql = "
    	SELECT 
		p.id_usuario,
		pb.id AS id_publicacion, 
		p.tmp AS fecha_postulacion, 
		pb.titulo AS titulo_oferta, 
		CONCAT(cdp.nombres,' ',cdp.apellidos) AS nombre_candidato, 
		TIMESTAMPDIFF(YEAR,cdp.fecha_nac,CURDATE()) AS edad_candidato,
		g.descripcion AS sexo_candidato,
		GROUP_CONCAT(ce.titulo SEPARATOR ', ') AS profesion_candidato,
		(
		CASE cc.calificacion
		WHEN 1 THEN '★'
		WHEN 2 THEN '★★'
		WHEN 3 THEN '★★★'
		WHEN 4 THEN '★★★★'
		WHEN 5 THEN '★★★★★'
		END
		) AS calificacion,
		m.nombre AS marcador
		FROM tbl_postulaciones p 
		INNER JOIN tbl_publicacion pb ON p.id_publicacion=pb.id 
		LEFT JOIN tbl_candidato_datos_personales cdp ON p.id_usuario= cdp.id_usuario
		LEFT JOIN tbl_generos g ON cdp.id_sexo=g.id
		LEFT JOIN tbl_candidatos_educacion ce ON p.id_usuario=ce.id_usuario
		LEFT JOIN tbl_candidato_calificaciones cc ON p.id_usuario=cc.id_usuario
		LEFT JOIN tbl_candidato_marcadores cm ON p.id_usuario=cm.id_usuario
		LEFT JOIN tbl_marcadores m ON cm.id_marcador=m.id
		WHERE p.id_publicacion=?
        GROUP BY p.id_usuario
		ORDER BY fecha_postulacion DESC";

		$filtro_experiencia_laboral = DB::select("SELECT * FROM tbl_actividades_empresa ORDER BY nombre");
		$filtro_salario = DB::select("SELECT * FROM tbl_rango_salarios");
		$filtro_provincia = DB::select("SELECT * FROM tbl_provincias");
		$filtro_idioma = DB::select("SELECT * FROM tbl_idiomas");
		$filtro_area_estudios = DB::select("SELECT * FROM tbl_area_estudios ORDER BY descripcion");

    	$oferta_postulado = DB::select($sql, [$id_publicacion]);

    	if ($oferta_postulado) {
    		$params = [
    			"postulados" => $oferta_postulado,
    			"filtro_experiencia_laboral" => $filtro_experiencia_laboral,
    			"filtro_salario" => $filtro_salario,
    			"filtro_provincia" => $filtro_provincia,
    			"filtro_idioma" => $filtro_idioma,
    			"filtro_area_estudios" => $filtro_area_estudios,
    			"id_publicacion" => $id_publicacion
    		];

        	return view('empresa_postulados', $params);
    	} else {
    		return redirect("empresa/ofertas");
    	}
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
        $descripcion  = $_REQUEST["description"];
        $area         = $_REQUEST["area"];
        $sector       = $_REQUEST["sector"];
        $provincia    = $_REQUEST["provincia"];
        $localidad    = $_REQUEST["localidad"];
        $salario      = $_REQUEST["salario"];
        $direccion    = $_REQUEST["direccion"];
        $plan         = $_REQUEST["plan"];
        $disp         = $_REQUEST["disp"];
        $discapacidad = $_REQUEST["discapacidad"];
        $confidencial = $_REQUEST["confidencial"];
        $video        = $_REQUEST["video"];

        $descripcion = preg_replace("/[\r\n|\n|\r]+/", " ", $descripcion);

        $id_empresa = session()->get("emp_ide");

        $sql    = "INSERT INTO tbl_publicacion(id_imagen,id_empresa,titulo,id_sector,id_area,id_disponibilidad,id_provincia,id_localidad,discapacidad,descripcion,direccion,video_youtube,estatus,fecha_venc,id_salario,id_plan_estado,confidencial) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $explode = explode('/', $_REQUEST['fecha_exp']);
        $fecha_venc = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
        $fecha_venc = strtotime($fecha_venc);
        $fecha_venc = date('Y-m-d H:i:s', $fecha_venc);

        $params = [1, $id_empresa, $titulo, $sector, $area, $disp, $provincia, $localidad, $discapacidad, $descripcion, $direccion, $video, 1, $fecha_venc, $salario, $plan, $confidencial];

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
        $descripcion  = $_REQUEST["description"];
        $area         = $_REQUEST["area"];
        $sector       = $_REQUEST["sector"];
        $provincia    = $_REQUEST["provincia"];
        $localidad    = $_REQUEST["localidad"];
        $salario      = $_REQUEST["salario"];
        $direccion    = $_REQUEST["direccion"];
        $plan         = $_REQUEST["plan"];
        $disp         = $_REQUEST["disp"];
        $discapacidad = $_REQUEST["discapacidad"];
        $confidencial = $_REQUEST["confidencial"];
        $video        = $_REQUEST["video"];

        $descripcion = preg_replace("/[\r\n|\n|\r]+/", " ", $descripcion);

        $id_empresa = session()->get("emp_ide");

        $explode = explode('/', $_REQUEST['fecha_exp']);
        $fecha_venc = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
        $fecha_venc = strtotime($fecha_venc);
        $fecha_venc = date('Y-m-d H:i:s', $fecha_venc);

        $sql = "UPDATE tbl_publicacion SET titulo=?, id_sector=?, id_area=?, id_disponibilidad=?, id_provincia=?, id_localidad=?, discapacidad=?, descripcion=?, direccion=?, video_youtube=?, fecha_venc=?, id_salario=?, id_plan_estado=?, confidencial=?, estatus=1 WHERE id=? AND id_empresa=?";

        $params = [$titulo, $sector, $area, $disp, $provincia, $localidad, $discapacidad, $descripcion, $direccion, $video, $fecha_venc, $salario, $plan, $confidencial, $id_post, $id_empresa];

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
                    $request->session()->set("emp_nombre_empresa", $nombre_empresa);

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
        LEFT JOIN tbl_usuarios_foto_perfil t1 ON e.id_usuario = t1.id_usuario
        LEFT JOIN tbl_archivos a ON t1.id_foto=a.id
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

            case 4: // Renovar Publicación

    			DB::beginTransaction();
    			try {

                    $fecha_venc = '';
                    if (session()->get('emp_plan')[0]->id_plan == 1) {
                        $fecha_venc = strtotime('+15 day', strtotime(date('Y-m-d')));
                        $fecha_venc = date('Y-m-d H:i:s', $fecha_venc);
                    } else {
                        $fecha_venc = strtotime('+35 day', strtotime(date('Y-m-d')));
                        $fecha_venc = date('Y-m-d H:i:s', $fecha_venc);
                    }
    				
    				DB::update("UPDATE tbl_publicacion SET estatus=1, tmp=NOW(), fecha_venc='$fecha_venc' WHERE id=?", [$id_post]);
    				DB::commit();

    				return redirect("empresa/ofertas?response=5");
    			} catch (Exception $e) {
    				DB::rollback();
    				return redirect("empresa/ofertas?response=6");
    			}

    			break;
    	}
    }

    public function uploadImage(Request $request)
    {
        $identificador   = "emp_id";
        $file            = Input::file('file');
        $destinationPath = 'uploads';
        $original        = $file->getClientOriginalName();
        $extension       = $file->getClientOriginalExtension();
        $filename        = $identificador . str_random(12) . "." . strtolower($extension);
        
        $tipo_documento = "";

        if ($extension == "jpeg" || $extension == "jpg" || $extension == "gif" || $extension == "png" || $extension == "raw" || $extension == "bmp") {
            $tipo_documento = "Imagen";
        } else if ($extension == "exe") {
            $tipo_documento = "Aplicación";
        } else if ($extension == "sql") {
            $tipo_documento = "Scripts";
        } else if ($extension == "html" || $extension == "php" || $extension == "css" || $extension == "js" || $extension == "jar") {
            $tipo_documento = "Código fuente";
        } else if ($extension == "zip" || $extension == "rar") {
            $tipo_documento = "Comprimido";
        } else {
            $tipo_documento = "Documento";
        }

        $upload_success = Input::file('file')->move($destinationPath, $filename);


        $sql_contador="SELECT count(*) as cantidad FROM `tbl_archivos` WHERE id_usuario=".session()->get('emp_id')."";
        
        try {
            $datos=DB::select($sql_contador);
           
            if($datos[0]->cantidad >= 5)
            {
               return Response::json('Sin espacio', 500);
            }
        } catch (Exception $e) {
            
        } 

        $sql = "INSERT INTO tbl_archivos VALUES (null," . session()->get($identificador) . ",'" . $original . "','" . $extension . "','','" . $filename . "','" . $tipo_documento . "',null)";

        if ($upload_success) {
            try {
                if($tipo_documento=="Imagen")
                {  
                    Image::make("uploads/".$filename)->resize(80, 80)->save("uploads/min/".$filename); 
                    Image::make("uploads/".$filename)->resize(200, 200)->save("uploads/md/".$filename); 
                }
                DB::insert($sql);
                $id_foto = DB::getPdo()->lastInsertId();

                DB::update("UPDATE tbl_usuarios_foto_perfil SET id_foto=? WHERE id_usuario=?", [$id_foto ,session()->get('emp_id')]);

                return Response::json('success', 200);
            } catch (Exception $e) {
            }
        } else {
            return Response::json('error', 400);
        }
    }
}
