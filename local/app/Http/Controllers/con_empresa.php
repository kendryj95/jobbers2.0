<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
class con_empresa extends Controller
{
    public function login()
    {
    	return view('empresa_login');
    }

  public function index()
  {
  	return view('administrator_empresas_ver');
  }

  public function registro_view()
  {
  	return view('empresa_registro_view');
  }

  public function newPost()
  {
  	return view('empresa_new_post');
  }

  public function ofertas()
  {
  	return view('empresa_ofertas');
  }
}
