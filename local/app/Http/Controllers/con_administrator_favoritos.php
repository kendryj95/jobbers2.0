<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
class con_administrator_favoritos extends Controller
{
	public function index()
	{
		return View("administrator_favoritos");
	}
}
