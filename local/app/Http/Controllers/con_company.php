<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
use Redirect;
class con_company extends Controller
{
	public function index_register()
	{
		$vista=View::make("empresas.register");
		try {
			$sql="SELECT * FROM tbl_provincias";
			$provincias=DB::select($sql);
			$vista->provincias=$provincias;
			return $vista;
		} catch (Exception $e) {
			
		}
		

	}
    public function registrar()
    { 	
    	date_default_timezone_set('America/Argentina/Cordoba');
    	$fecha=date('Y-m-d'); 
    	if($_POST['representante']=='' || 
    	 $_POST['correo']=='' || 
    	 $_POST['clave']=='' || 
    	 $_POST['provincia']=='' || 
    	 $_POST['localidad']=='' || 
    	 $_POST['direccion']=='' || 
    	 $_POST['empresa']=='' || 
    	 $_POST['direccion']=='' )
    	{
    		abort(500);
    	}
    	else
    	{
    		$sql="SELECT count(id) as cantidad FROM tbl_company WHERE correo='".$_POST['correo']."'";
    		$datos=DB::select($sql);
    		if($datos[0]->cantidad==1)
    		{
    			echo "correo_existe";
    			die();
    		}

    	}
        $sql="INSERT INTO tbl_company (representante,correo,clave,provincia,localidad,direccion,nombre,fecha_registro) 
    	VALUES(
    	'".$_POST['representante']."',
    	'".$_POST['correo']."',
    	'".md5($_POST['clave'])."',
    	'".$_POST['provincia']."',
    	'".$_POST['localidad']."',
    	'".$_POST['direccion']."',
    	'".$_POST['empresa']."',
    	'".$fecha."'
    	)";
    	try {
    		DB::insert($sql); 
    	} catch (\Illuminate\Database\QueryException $ex) {
    		 $this->auditar('registrar',str_replace("'", "",$ex->getMessage()),'');
    		 abort(500); 
    	} 
    }

    public function login()
    {
    	$sql="SELECT * FROM tbl_company WHERE ";
    }

    public function get_provincias()
    {
    	
    	try {
    		$sql="SELECT * FROM tbl_provincias";
    		$provincias=DB::select($sql);
    		return $provincias;
    	} catch (Exception $e) {
    		
    	}
    }
    public function get_localidades()
    {
    	$id=$_POST['provincia'];

    	if($id!=0 || $id!="")
    	{ 
    		try {
    			$sql="SELECT t1.id_provincia,t2.provincia,t1.localidad FROM tbl_localidades t1
				INNER JOIN tbl_provincias t2 ON t2.id = t1.id_provincia
				WHERE t2.provincia  = '".$id."'";
    			$localidades=DB::select($sql); 
    			echo json_encode($localidades); 
    		} catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('get_localidades',str_replace("'", "",$ex->getMessage()),''); 
    			abort(500);
    		} 
    	}
    	else
    	{
    		try {
    			$sql="SELECT * FROM tbl_localidades";
    			$localidades=DB::select($sql); 
    			return $localidades;
    		} catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('get_localidades',str_replace("'", "",$ex->getMessage()),'');
    			dd("Ha ocurrido un error al procesar la solicitud. Ya fue reportado al equipo de soporte"); 
    		} 
    	}
    }

    public function auditar($funcion,$codigo,$empresa)
    {
    	$sql="INSERT INTO tbl_aud_company (empresa,codigo,funcion) VALUES
    	(
    		'".$empresa."',
    		'".$codigo."',
    		'".$funcion."'
    	)"; 
    	DB::insert($sql);
    }

    function injection($valor)
	{
		$valor = str_ireplace("SELECT","",$valor);
		$valor = str_ireplace("COPY","",$valor);
		$valor = str_ireplace("DELETE","",$valor);
		$valor = str_ireplace("DROP","",$valor);
		$valor = str_ireplace("DUMP","",$valor);
		$valor = str_ireplace(" OR ","",$valor);
		$valor = str_ireplace("%","",$valor);
		$valor = str_ireplace("LIKE","",$valor);
		$valor = str_ireplace("--","",$valor);
		$valor = str_ireplace("^","",$valor);
		$valor = str_ireplace("[","",$valor);
		$valor = str_ireplace("]","",$valor); 
		$valor = str_ireplace("!","",$valor);
		$valor = str_ireplace("¡","",$valor);
		$valor = str_ireplace("?","",$valor);
		$valor = str_ireplace("=","",$valor);
		$valor = str_ireplace("&","",$valor);
		return $valor;
	}
}
