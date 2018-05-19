<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use view;
use DB;
use Redirect;
class con_administrator_login extends Controller
{
    public function index()
    {
    	return View("administrator_login");
    }

     public function login(Request $request)
    {
    	$sql="SELECT count(*) as cantidad,correo,id,nombre FROM tbl_administrador WHERE correo='".$_POST['correo']."' and clave='".$_POST['clave']."' AND tipo_usuario=3";
    	try {
    		$datos=DB::select($sql);
    		if($datos[0]->cantidad)
    		{
                $this->limpiar_variables_session($request);
    			$request->session()->set('admin', $datos[0]->correo);
                $request->session()->set('adm_nombre', $datos[0]->nombre);
                $request->session()->set('adm_id', $datos[0]->id);
                $request->session()->set('tipo_usuario', 2);
    			return Redirect("admindashboard");
    		}
    		else
    		{
    			return Redirect("administrator?error=1");
    		}
    	} catch (Exception $e) {
    		
    	}
    	
    }
    public function salir(Request $request)
	{
		$request->session()->forget('admin'); 
        return redirect('administrator');
	}


    public function limpiar_variables_session(Request $request)
    {
        $request->session()->forget('candidato'); 
        $request->session()->forget('empresa');
        $request->session()->forget('cand_id'); 
        $request->session()->forget('emp_id');
        $request->session()->forget('admin');
        $request->session()->forget('adm_id'); 
        $request->session()->forget('adm_nombre'); 
        $request->session()->forget('tipo_usuario'); 
        $request->session()->flush();
    }

}
