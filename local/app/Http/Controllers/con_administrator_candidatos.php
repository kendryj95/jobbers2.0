<?php

namespace App\Http\Controllers;

use View;

class con_administrator_candidatos extends Controller
{
    public function index()
    {
        return view('administrator_candidatos');
    }

     public function editar()
    {
        return view('administrator_candidatos_nuevo');
    }

     public function nuevo()
    {
        return view('administrator_candidatos_nuevo');
    }

     public function resumen()
    {
        return view('administrator_candidatos_resumen');
    }

     public function recomendaciones()
    {
        return view('administrator_candidatos_recomendaciones');
    }

     public function postulaciones()
    {
        return view('administrator_candidatos_postulaciones');
    }
}
