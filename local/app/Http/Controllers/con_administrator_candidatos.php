<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
class con_administrator_candidatos extends Controller
{
    public function index()
    {
    	return view('administrator_candidatos_ver');
    }
}
