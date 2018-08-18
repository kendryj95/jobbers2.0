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
	$file            =Input::file('documento');
	if($file=="")
	{
	return Redirect('candicv?result=Debe seleccionar un documento.');	
	}
	else
	{
		$original        = $file->getClientOriginalName();
	    $extension       = $file->getClientOriginalExtension();
		$sql="INSERT INTO tbl_candidato_cv_fisico values(null, ".session()->get('cand_id').",0,'".$original ."','".$extension."',null)";
		try {
			DB::insert($sql);
			return Redirect('candicv?result=Curriculum agregado correctamente');
		} catch (Exception $e) {
			
		}
	}
   
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