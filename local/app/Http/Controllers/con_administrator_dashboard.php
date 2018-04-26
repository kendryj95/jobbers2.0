<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
class con_administrator_dashboard extends Controller
{
    
    public function dashboard()
    {
    	return View("administrator_dashboard");
    }
}
