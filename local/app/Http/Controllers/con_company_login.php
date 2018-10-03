<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
class con_company_login extends Controller
{
    public function login(Request $request)
    {
    	if($_POST['correo']!="" && $_POST['clave']!="")
    	{ 
    		try {
    			$sql="SELECT *,count(id) as cantidad  FROM tbl_company 
	    		WHERE correo='".$this->injection($_POST['correo'])."' 
	    		AND clave ='".md5($this->injection($_POST['clave']))."'";
	    		 $datos=DB::select($sql);
                
                if($datos[0]->cantidad==1)
	    		{
	    			$request->session()->set('company_id',$datos[0]->id);
	    			$request->session()->set('company_img',$datos[0]->img_profile);
	    			$request->session()->set('company_nombre',$datos[0]->nombre); 
	    			$request->session()->set('company_plan',$datos[0]->plan);

	    			echo "1";
	    		}
	    		else{echo "0";} 
    		}catch (\Illuminate\Database\QueryException $ex) {     			 
    			$this->auditar('login',str_replace("'", "",$ex->getMessage()),''); 
    			abort(500);
    		}
    	}
    	
    }

    public function logout(Request $request)
    {
    	$request->session()->forget('company_id');
    	$request->session()->forget('company_img');
    	$request->session()->forget('company_nombre');
    	$request->session()->forget('company_plan');
    	return Redirect('empresas/entrar'); 
    }
}
