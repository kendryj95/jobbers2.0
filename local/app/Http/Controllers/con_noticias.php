<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use View;
class con_noticias extends Controller
{
    public function index()
    {
    	$vista=View::make("noticias");
    	$condiciones="";
    	if(isset($_POST['categoria']) && $_POST['categoria']!="")
    	{
    		$condiciones=$condiciones." AND id_categoria =".$_POST['categoria']."";
    	}
    	$sql="SELECT * FROM tbl_noticias WHERE estado='1' " .$condiciones;
       
    	$sql_categorias="SELECT * FROM tbl_categorias_noticias ";
    	try {
    		$datos=DB::select($sql);
    		$datos_categorias=DB::select($sql_categorias);
    		$vista->datos=$datos;
    		$vista->datos_categorias=$datos_categorias;
    		return $vista;
    	} catch (Exception $e) {
    		
    	}
    }

    public function noticia($id)
    {
    	$vista=View::make("noticias_detalle"); 
    	$sql="SELECT *,count(id) as cantidad FROM tbl_noticias WHERE id =".$id." ";
    	$sql_datos="SELECT * FROM tbl_noticias WHERE estado = '1' LIMIT 0,5";
    	$sql_categorias="SELECT * FROM tbl_categorias_noticias";
    	try {
    		$datos=DB::select($sql);
    		$datos_limitadas=DB::select($sql_datos);
    		$datos_categorias=DB::select($sql_categorias);
    		$vista->datos=$datos;
    		$vista->datos_limitadas=$datos_limitadas;
    		$vista->datos_categorias=$datos_categorias;
    		if($datos[0]->cantidad==1)
    		{
    			return $vista;
    		}
    		else
    		{
    			return Redirect('noticias');
    		}
    		
    	} catch (Exception $e) {
    		
    	}
    } 
}
