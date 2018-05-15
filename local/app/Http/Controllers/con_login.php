<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use DB;
class con_login extends Controller
{
    public function log(Request $request)
    {
    	$sql="SELECT *,count(id) as cantidad FROM tbl_usuarios WHERE correo='".$_POST['correo']."' AND clave='".$_POST['pass']."'";
    	try {
    		$datos=DB::select($sql);
    		if($datos[0]->cantidad)
    		{
    			$prefijo="";
    			$sufijo="";
    			$ruta="";
    			if($datos[0]->tipo_usuario==1)
    			{	
    				$prefijo="empresa";
    				$sufijo="emp_";
    				$ruta="empresa/ofertas";//Ruta del panel de arministracion de empresas
    				 
    			}
    			else if($datos[0]->tipo_usuario==2)
    			{
    				$prefijo="candidato";
    				$sufijo="cand_";
    				$ruta="candidashboard";
    			}
    			$request->session()->set($prefijo, $datos[0]->correo); 
                $request->session()->set($sufijo.'id', $datos[0]->id);
                $request->session()->set('tipo_usuario',$datos[0]->tipo_usuario);
    			return Redirect($ruta);
    		}
    		else
    		{
    			//return Redirect("administrator?error=1");
    		}
    	} catch (Exception $e) {
    		
    	}
    }

    public function salir(Request $request)
	{
		$request->session()->forget('candidato'); 
		$request->session()->forget('empresa'); 
        return redirect('inicio');
	}
}
