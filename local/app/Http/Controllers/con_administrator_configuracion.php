<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use view;
use DB;
use Redirect;
class con_administrator_configuracion extends Controller
{
    public function index()
    {
    	return view("administrator_configuracion");
    } 

     public function actualizar()
    {
    	$sql="UPDATE tbl_administrador SET correo='".$_POST['correo']."',clave='".$_POST['clave']."',nombre='".$_POST['nombre']."' WHERE id=1" ;
    	try {
    		DB::update($sql);
    		return Redirect('configuracion');
    	} catch (Exception $e) {
    		
    	}
    	return view("administrator_configuracion");
    } 
}
