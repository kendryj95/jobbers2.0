<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use DB;

class con_administrator_dashboard extends Controller
{
    
    public function dashboard(Request $request)
    {
    	$vista = View::make('administrator_dashboard');
    	$sql="SELECT * FROM tbl_administrador WHERE correo='".$request->session()->get('admin')."'";
    	try {
    		$datos=DB::select($sql);
    		$vista->perfil=$datos;
    		return $vista;
    	} catch (Exception $e) {
    		
    	}
    	
    }
}
