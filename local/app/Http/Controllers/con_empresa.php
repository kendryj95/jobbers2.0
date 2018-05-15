<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use DB;
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

  public function registro_view()
  {
  	return view('empresa_registro_view');
  }

  public function newPost()
  {

  	$areas = DB::select("SELECT id, nombre AS area FROM tbl_areas ORDER BY nombre");
  	$provincias = DB::select("SELECT * FROM tbl_provincias");
  	$planes_estado = DB::select("SELECT * FROM tbl_planes_estado");
  	$disponibilidades = DB::select("SELECT * FROM tbl_disponibilidad");
  	$salarios = DB::select("SELECT * FROM tbl_rango_salarios");

  	$params = [
  		"areas" => $areas,
  		"provincias" => $provincias,
  		"planes" => $planes_estado,
  		"disponibilidades" => $disponibilidades,
  		"salarios" => $salarios
  	];

  	return view('empresa_new_post', $params);
  }

  public function ofertas()
  {
  	$sql1 = DB::select("SELECT COUNT(*) AS total_ofertas FROM tbl_publicacion");
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
							INNER JOIN tbl_localidades l ON pub.id_localidad=l.id;"
						);

  	$params = [
  		"total_ofertas" => $total_ofertas,
  		"ofertas" => $ofertas
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

  public function exist_empresa()
  {
  	$response = '';

  	$exist = DB::select("SELECT id FROM tbl_usuarios WHERE correo=? AND tipo_usuario=1", [$_REQUEST['email']]);

  	if ($exist) {
  		$response = 2;
  	} else {
  		$response = 1;
  	}

  	echo json_encode([
  		"status" => $response
  	]);
  }

  public function registro()
  {

  	$response = '';

  	$user = $_REQUEST['user'];
  	$email = $_REQUEST['email'];
  	$password = $_REQUEST['password'];
  	$nombre_responsable = $_REQUEST['nombre_responsable'];
  	$nombre_empresa = $_REQUEST['nombre_empresa'];
  	$razon_social  = $_REQUEST['razon_social'];
  	$cuit = $_REQUEST['cuit'];
  	$telefono = $_REQUEST['telefono'];
  	$plan = $_REQUEST['plan'];

  	$sql1 = "INSERT INTO tbl_empresa(id_usuario,nombre,responsable,razon_social,cuit,telefono) VALUES(?,?,?,?,?,?)";
  	

  	$sql2 = "INSERT INTO tbl_empresas_planes(id_empresa,id_plan) VALUES (?,?)";

  	$sql3 = "INSERT INTO tbl_usuarios(usuario,correo,clave,tipo_usuario) VALUES(?,?,?,?)";
  	$params3 = [$user,$email,md5($password),1];

  	DB::beginTransaction();

  	try {

  		DB::insert($sql3, $params3); // tbl_usuarios

  		$id_usuario = DB::getPdo()->lastInsertId();
  		$params1 = [$id_usuario, $nombre_empresa, $nombre_responsable, $razon_social, $cuit, $telefono];

  		DB::insert($sql1, $params1); //tbl_empresa

  		$id_empresa = DB::getPdo()->lastInsertId();
  		$params2 = [$id_empresa, $plan];

  		DB::insert($sql2, $params2); //tbl_empresas_planes


  		DB::commit();
  		$response = 1;

  	} catch (Exception $e) {
  		DB::rollback();
  		$response = 2;
  	}

  	echo json_encode([
  		"status" => $response
  	]);
  }

  public function registerPost()
  {

  	$response = '';

  	$titulo = $_REQUEST["titulo"];
  	$descripcion = $_REQUEST["descripcion"];
  	$area = $_REQUEST["area"];
  	$sector = $_REQUEST["sector"];
  	$provincia = $_REQUEST["provincia"];
  	$localidad = $_REQUEST["localidad"];
  	$salario = $_REQUEST["salario"];
  	$direccion = $_REQUEST["direccion"];
  	$plan = $_REQUEST["plan"];
  	$disp = $_REQUEST["disp"];
  	$discapacidad = isset($_REQUEST["disp"]) ? 1 : 0;
  	$video = $_REQUEST["video"];

  	$query = DB::select("SELECT id FROM tbl_empresa WHERE id_usuario=?",[session()->get("emp_id")]);
  	$id_empresa = $query[0]->id;

  	$sql = "INSERT INTO tbl_publicacion(id_imagen,id_empresa,titulo,id_sector,id_area,id_disponibilidad,id_provincia,id_localidad,discapacidad,descripcion,direccion,estatus,fecha_venc,id_salario,id_plan_estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  	$params = [1, $id_empresa, $titulo, $sector, $area, $disp, $provincia, $localidad, $discapacidad, $descripcion, $direccion, 1, null, $salario, $plan];

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
  		"status" => $response
  	]);

  }
}
