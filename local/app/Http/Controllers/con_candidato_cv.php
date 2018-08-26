<?php
namespace App\Http\Controllers;
use View;
use DB;
use Illuminate\Support\Facades\Input;
use File;
class con_candidato_cv extends Controller
{
public function index()
{
	
	
	$vista=View::make('candidatos_cv'); 
	$sql="SELECT * FROM tbl_candidato_cv_fisico WHERE id_usuario =".session()->get('cand_id')."";
	try {
		$datos=DB::select($sql);
		$vista->datos=$datos;
		return $vista;
	} catch (Exception $e) {
		
	} 
	
}
public function addcv()
{
	$token=$this->token(15);
	$file            =Input::file('documento');
	if($file=="")
	{
	return Redirect('candicv?result=Debe seleccionar un documento.');	
	}
	else
	{
		$original        = $file->getClientOriginalName();
	    $extension       = $file->getClientOriginalExtension();
	    $upload_success = Input::file('documento')->move("uploads/curriculums", $token.$original);
	    if($upload_success)
		{
			$sql="INSERT INTO tbl_candidato_cv_fisico values(null, ".session()->get('cand_id').",0,'".$token.$original ."','".$extension."',null)";
			try {
				DB::insert($sql);
				return Redirect('candicv?result=Curriculum agregado correctamente');
			} catch (Exception $e) {
				
			}
		}

		
	}
   
}
function descargar($archivo) {  
    $enlace = 'uploads/curriculums/'.$archivo;
	header ("Content-Disposition: attachment; filename=".$archivo."");
	header ("Content-Type: application/octet-stream");
	header ("Content-Length: ".filesize($enlace));
	readfile($enlace); 
} 
function token($length) { 
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
} 
public function del_cv($id)
{
	 
	$sql="DELETE FROM tbl_candidato_cv_fisico WHERE id=".$id." AND id_usuario=".session()->get('cand_id').""; 
	try {
		DB::delete($sql);   
		return Redirect('candicv?result=Curriculum eliminado con exito.');
	} catch (Exception $e) {
		
	}
	
}
public function select_cv()
{
	 
	$sql="UPDATE tbl_candidato_cv_fisico SET mostrar=0 WHERE id_usuario =".session()->get('cand_id')."";
	
	$sql_update="UPDATE tbl_candidato_cv_fisico SET mostrar=1 WHERE id_usuario =".session()->get('cand_id')."
	AND id=".$_POST['cv']."
	 "; 
	try {
		DB::update($sql); 
		DB::update($sql_update); 
		return Redirect('candicv?result=Curriculum seleccionado con exito.');
	} catch (Exception $e) {
		
	}
	
} 

public function seleccionar_cv_jobbers()
{
	 
	$sql="UPDATE tbl_candidato_cv_fisico SET mostrar=0 WHERE id_usuario =".session()->get('cand_id').""; 
	try {
		DB::update($sql);  
		return Redirect('candicv?result=Curriculum seleccionado con exito.');
	} catch (Exception $e) {
		
	} 
}  
}