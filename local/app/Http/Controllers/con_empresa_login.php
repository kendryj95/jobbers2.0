<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class con_empresa_login extends Controller
{
    public function index()
    {
    	return view('empresa_login');
    }
}
