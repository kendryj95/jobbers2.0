<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use DB;
class con_candidatos extends Controller
{
    public function index()
    {
    	$vista=View::make('candidatos');
    	return $vista;
    }
}
