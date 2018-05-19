<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests;
use View;
use Illuminate\Support\Facades\Input;
use Validator;
use Response; 
use File;
use DB;
class con_maletin extends Controller
{
     
    var $ruta="";
    public function index()
    {
    	return view("administrator_maletin");
    }

    public function indexcandidato()
    {
        return view("candidatos_maletin");
    }
    
    public function listar_arch()
    {

        $identificador=$this->validar_user();
    	$sql="SELECT * FROM tbl_archivos WHERE id_usuario =".session()->get($identificador).""; 
    	$datos=DB::select($sql);
    	echo json_encode($datos); 

    }

	public function descargar($file)
    {
    	 $pathtoFile = 'uploads/'.$file;
         return response()->download($pathtoFile); 
    }
	public function eliminar($id)
    {
         $identificador=$this->validar_user();
    	$sql="DELETE FROM tbl_archivos WHERE id=".$id." AND id_usuario =".session()->get($identificador).""; 
    	try {
    		DB::delete($sql);
    		return  Redirect("".$this->ruta."?info=del");
    	} catch (Exception $e) {
    		
    	}
    }

    public function alias()
    {
         $identificador=$this->validar_user();
    	$sql="UPDATE tbl_archivos SET alias='".$_POST['alias']."' WHERE id=".$_POST['id_alias']." AND id_usuario =".session()->get($identificador).""; 
    	try {
    		DB::update($sql);
    		return  Redirect("".$this->ruta."?info=up");
    	} catch (Exception $e) {
    		
    	}
    }

    public function post_upload(){

            $identificador=$this->validar_user();
			$file = Input::file('file');
			$destinationPath = 'uploads'; 
			$original = $file->getClientOriginalName();
			$extension =$file->getClientOriginalExtension(); 
			$filename ="admin_". str_random(12).".".strtolower($extension);


    		$tipo_documento="";

    		if($extension=="jpeg" || $extension=="jpg" || $extension=="gif" || $extension=="png" || $extension=="raw" || $extension=="bmp")
    		{
    			$tipo_documento="Imagen";
    		}
    		else if($extension=="exe")
    		{
    			$tipo_documento="Aplicación";
    		}
    		else if($extension=="sql")
    		{
    			$tipo_documento="Scripts";
    		}

    		else if($extension=="html" || $extension=="php" || $extension=="css" || $extension=="js" || $extension=="jar")
    		{
    			$tipo_documento="Código fuente";
    		}
    		else if($extension=="zip" || $extension=="rar" )
    		{
    			$tipo_documento="Comprimido";
    		}
    		else
    		{
    			$tipo_documento="Documento";
    		}

			$upload_success = Input::file('file')->move($destinationPath, $filename);
			$sql="INSERT INTO tbl_archivos VALUES (null,".session()->get($identificador).",'".$original."','".$extension."','','".$filename."','".$tipo_documento."',null);";

			if( $upload_success ) {
				try {
					DB::insert($sql);
					return Response::json('success', 200);
				} catch (Exception $e) {					
				}			   
			} else {
			   return Response::json('error', 400);
			}
	}

    public function validar_user()
    {
        $identificador="";
        if(session()->get('tipo_usuario')==3)
        {
            $this->ruta="adminmalerinver";
            $identificador="admin_id"; 
        }
        else if(session()->get('tipo_usuario')==1)
        {
                $identificador="emp_id";
        }

        else if(session()->get('tipo_usuario')==2)
        {       
                $this->ruta="candimaletin";
                $identificador="cand_id";
        } 
        return $identificador;
    }

}
