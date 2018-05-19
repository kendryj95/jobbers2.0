<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use DB;
class con_candidato_redes extends Controller
{
    public function index()
    {
    	$vista=View::make("candidatos_redes");
    	$sql="SELECT *  FROM tbl_redes WHERE id_usuario=".session()->get("cand_id")."
    	AND tipo_usuario=2";
    	$datos=DB::select($sql);
    	$vista->datos=$datos;
    	return $vista; 
    }
    public function crear()
    {
    	if(isset($_POST['facebook']) && $_POST['facebook']!="")
    	{
    		if($this->validar_red(1))
    		{
    			$sql="
	    		INSERT INTO tbl_redes
	    		VALUES(null,".session()->get("cand_id").",1,2,".$_POST['facebook'].",null)";
	    		DB::insert($sql);
    		} 
            else
            {
                $sql="
                UPDATE tbl_redes 
                SET red_social='".$_POST['facebook']."' WHERE id_usuario=".session()->get("cand_id")."
                AND id_red_social=1";
                DB::update($sql);
            }
    	}
    	if(isset($_POST['twitter']) && $_POST['twitter']!="")
    	{
    		if($this->validar_red(2))
    		{
    			$sql="
	    		INSERT INTO tbl_redes
	    		VALUES(null,".session()->get("cand_id").",2,2,".$_POST['twitter'].",null)";
	    		DB::insert($sql);
    		}
            else
            {
                $sql="
                UPDATE tbl_redes 
                SET red_social='".$_POST['twitter']."' WHERE id_usuario=".session()->get("cand_id")."
                AND id_red_social=2";
                DB::update($sql);
            }
    		
    	}
    	if(isset($_POST['linkendin']) && $_POST['linkendin']!="")
    	{
    		if($this->validar_red(5))
    		{
    			$sql="
	    		INSERT INTO tbl_redes
	    		VALUES(null,".session()->get("cand_id").",5,2,".$_POST['linkendin'].",null)";
	    		DB::insert($sql);
    		}
            else
            {
                $sql="
                UPDATE tbl_redes 
                SET red_social='".$_POST['linkendin']."' WHERE id_usuario=".session()->get("cand_id")."
                AND id_red_social=5";
                DB::update($sql);
            }
    		
    	}
    	if(isset($_POST['instagram']) && $_POST['instagram']!="")
    	{
    		if($this->validar_red(3))
    		{
    			$sql="
	    		INSERT INTO tbl_redes
	    		VALUES(null,".session()->get("cand_id").",3,2,".$_POST['instagram'].",null)";
	    		DB::insert($sql);
    		}
            else
            {
                $sql="
                UPDATE tbl_redes 
                SET red_social='".$_POST['instagram']."' WHERE id_usuario=".session()->get("cand_id")."
                AND id_red_social=3";
                DB::update($sql);
            }
    		
    	}

    	return redirect("candiredes");
    }

    public function validar_red($red) //valida si el usuario no ha insertado ya la red social
    {
    	$sql="SELECT count(*) as cantidad FROM tbl_redes WHERE id_usuario=".session()->get("cand_id")."
    	AND id_red_social=".$red." AND tipo_usuario=2";
    	$datos=DB::select($sql);
    	if($datos[0]->cantidad==0)
    	{
    		return 1;
    	}
    	else
    	{
    		return 0;
    	}
    }
}
