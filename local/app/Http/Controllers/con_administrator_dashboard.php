<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use View;

class con_administrator_dashboard extends Controller
{

    public function index()
    {
        $vista = View::make('administrator_dashboard'); 
        return $vista;
    }
}
