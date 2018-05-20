<?php

namespace App\Http\Controllers;

use View;

class con_pagos extends Controller
{
    public function index()
    {
        return view("administrator_pagos");
    }
}
