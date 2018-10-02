<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use View;
class con_company_planes extends Controller
{
    public function index()
    {
    	$vista=View::make("empresas.planes");
    	return $vista;
    }
}
