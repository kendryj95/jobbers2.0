<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class con_candidatos_configuracion extends Controller
{
    public function index()
    {
    	return view("candidatos_configuracion");
    } 

     public function actualizar()
    {
    	/*$sql="UPDATE tbl_administrador SET correo='".$_POST['correo']."',clave='".$_POST['clave']."',nombre='".$_POST['nombre']."' WHERE id=1" ;
    	try {
    		DB::update($sql);
    		return Redirect('configuracion');
    	} catch (Exception $e) {
    		
    	}
    	return view("administrator_configuracion");*/
    } 
}
