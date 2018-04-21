<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
class con_pagos extends Controller
{
    public function index()
    {
    	return view("administrator_pagos");
    }
}
