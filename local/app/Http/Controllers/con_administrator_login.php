<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use view;
class con_administrator_login extends Controller
{
    function index()
    {
    	return View("administrator_login");
    }
}
