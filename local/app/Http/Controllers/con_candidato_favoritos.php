<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
class con_candidato_favoritos extends Controller
{
    public function index()
    {
    	return view("candidatos_favoritos");
    }
}
