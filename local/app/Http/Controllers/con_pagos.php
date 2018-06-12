<?php

namespace App\Http\Controllers;

use View;

require("../Middleware/mercadopago.php");

class con_pagos extends Controller
{
    public function index()
    {
        return view("administrator_pagos");
    }

    public function requestMP()
    {

    	$mp = new MP("4579409850187892", "o8xeJmZi960OlaXUrb3Yo8ylOujVdU2W");
    	
    	$iva = 0;
    	$total = 0;
    	$servicios = array();
    	$plan = DB::select("SELECT descripcion AS nombre_plan, valor AS precio FROM tbl_planes WHERE id=$_REQUEST[plan]");
    	$total += floatval($plan[0]->precio);
    	
    	$suttotal = $total * floatval($iva);
    	try {
    		$ex = "succesfull";
    		$st = 1;
    		$preference_data = array(
    			"items" => array(
    				array(
    					"title" => "Pago servicios",
    					"currency_id" => "ARS",
    					"quantity" => 1,
    					"unit_price" => ($total + $suttotal)
    				)
    			)
    		);
    		$preference = $mp->create_preference($preference_data);
    	}
    	catch(Exception $e) {
    		$st = 2;
    		$ex = $e->getMessage();
    	}
    	echo json_encode(array("status" => $st, "data" => $preference, "servicios" => $plan, "msg" => $ex, "iva" => $iva));
    }
}
