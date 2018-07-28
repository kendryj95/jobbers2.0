<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use View;

class con_administrator_configuracion extends Controller
{
    public function index()
    {
    	$vista=View::make("administrator_configuracion");
    	$sql="SELECT * FROM tbl_administrador";
        try {
          $datos=DB::select($sql);
          $vista->datos=$datos;
          return $vista;
        } catch (Exception $e) {
        	
        }
        
    }

     public function actualizar()
    {
        $sql="UPDATE tbl_administrador SET correo='".$_POST['correo']."', clave='".$_POST['clave']."'";
        try {
        	DB::update($sql);
        	return Redirect("administracion/configuracion?result=Datos actualizados con éxito.");
        } catch (Exception $e) {
        	
        }
        
    } 
}
