<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
class con_administrator_empresas extends Controller
{
    public function index()
    {
    	return view('administrator_empresas_ver');
    }

    public function create()
    {
    	return view('administrator_empresas_crear');
    }

    public function register()
    {
    	$valores="";
    	$valores=$valores."null,";
    	$valores=$valores."'".$_POST['nombre_empresa']."',";
    	$valores=$valores."'".$_POST['nombre_responsable']."',";
    	$valores=$valores."'".$_POST['razon_social']."',";
    	$valores=$valores."'".$_POST['cuit']."',";
    	$valores=$valores."'".$_POST['telefonos']."',";
    	$valores=$valores."'".$_POST['descripcion']."',"; 
    	$valores=$valores."".$_POST['pais'].",";
    	$valores=$valores."".$_POST['provincia'].",";
    	$valores=$valores."".$_POST['localidad'].",";
    	$valores=$valores."".$_POST['sector'].",";
    	$valores=$valores."null"; 
    	$sql="INSERT INTO tbl_empresa VALUES(".$valores.")";

    	try {
    		DB::insert($sql);
    		return redirect('adminempresas');
    	} catch (Exception $e) {
    		return "No";
    	}
    	return view('administrator_empresas_crear');
    }

}
