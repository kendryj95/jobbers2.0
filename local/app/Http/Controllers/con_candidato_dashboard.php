<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
class con_candidato_dashboard extends Controller
{
    public function dashboard(Request $request)
    {
    	$vista = View::make('candidatos_dashboard');
    	 
    	try { 
            return $vista;
    	} catch (Exception $e) {
    		
    	}
    	
    }
}
