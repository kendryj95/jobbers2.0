<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
class con_empresa_login extends Controller
{
    public function login()
    {
    	return view('empresa_login');
    }

  public function index()
  {
  	return view('administrator_empresas_ver');
  }
}