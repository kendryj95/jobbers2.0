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
  	return view('empresa_new_post');
  }

  public function ofertas()
  {
  	return view('empresa_ofertas');
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
}
