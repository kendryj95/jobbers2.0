<?php
namespace App\Http\Controllers;
use View;
use DB;
class con_candidato_cv extends Controller
{
public function index()
{
	$vista=View::make('candidatos_cv');
	$sql_cvs="SELECT * FROM tbl_archivos WHERE
	id_usuario=".session()->get('cand_id')."
	AND (extencion = 'pdf'
	OR extencion = 'doc'
	OR extencion = 'docx')
	";

	$sql_mi_cvs="SELECT t1.*,t2.alias,t2.extencion,t2.nombre_aleatorio,t2.id as id_cv FROM tbl_candidato_cv_fisico t1
	LEFT JOIN tbl_archivos t2 ON t2.id = t1.id_cv
	WHERE t1.id_usuario =".session()->get('cand_id')."";

	try {
		$datos_cv=DB::select($sql_cvs);
		$datos_mi_cv=DB::select($sql_mi_cvs);
		$vista->datos_cv=$datos_cv;
		$vista->datos_mi_cv=$datos_mi_cv;
		return $vista;
	} catch (Exception $e) {
		
	}
	
}
public function del_cv($id)
{
	 
	$sql="DELETE FROM tbl_candidato_cv_fisico WHERE id=".$id." AND id_usuario=".session()->get('cand_id').""; 
	try {
		DB::delete($sql);   
		return Redirect('candicv');
	} catch (Exception $e) {
		
	}
	
}
public function select_cv()
{
	 
	$sql="UPDATE tbl_candidato_cv_fisico SET mostrar=0 WHERE id_usuario =".session()->get('cand_id')."";
	$sql_update="UPDATE tbl_candidato_cv_fisico SET mostrar=1 WHERE id_usuario =".session()->get('cand_id')."
	AND id_cv=".$_POST['cv']."
	 "; 
	try {
		DB::update($sql); 
		DB::update($sql_update); 
		return Redirect('candicv');
	} catch (Exception $e) {
		
	}
	
}
public function add_cv()
{
	 
	$sql="INSERT INTO tbl_candidato_cv_fisico VALUES(null,".session()->get('cand_id').",
	".$_POST['cv'].",
	0,
	null
	)";
	try {
		$datos_cv=DB::insert($sql); 
		return Redirect('candicv');
	} catch (Exception $e) {
		
	}
	
}

}