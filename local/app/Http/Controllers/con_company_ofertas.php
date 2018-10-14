<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use App\Http\Requests;

class con_company_ofertas extends Controller
{
    public function index()
    {
    	$vista=View::make("empresas.ofertas");
    	$sql_provincias="SELECT * FROM tbl_provincias";
    	$sql_disponibilidad="SELECT * FROM tbl_disponibilidad";
    	$sql_area="SELECT * FROM tbl_areas_sectores";
    	$sql_nivel_estudio="SELECT * FROM tbl_nivel_estudio";
    	$sql_idiomas="SELECT * FROM tbl_idiomas ORDER BY descripcion ASC";
    	$sql_habilidades="SELECT * FROM tbl_habilidades ORDER BY descripcion ASC";
    	$sql_plan_estado="SELECT * FROM tbl_planes_estado";
    	$sql_genero="SELECT * FROM tbl_generos";
    	$sql_turno="SELECT * FROM tbl_turnos";
        $sql_salarios="SELECT * FROM tbl_rango_salarios";
    	
        $vista->salarios=DB::select($sql_salarios);
        $vista->provincias=DB::select($sql_provincias);
    	$vista->disponibilidad=DB::select($sql_disponibilidad);
    	$vista->area=DB::select($sql_area);
    	$vista->nivel_estudio=DB::select($sql_nivel_estudio);
    	$vista->idiomas=DB::select($sql_idiomas);
    	$vista->plan_estado=DB::select($sql_plan_estado);
    	$vista->genero=DB::select($sql_genero); 
    	$vista->habilidades=DB::select($sql_habilidades);
    	$vista->habilidades_json= json_encode(DB::select('SELECT descripcion as text, descripcion FROM tbl_habilidades ORDER BY descripcion ASC'));
    	$vista->idiomas_json= json_encode(DB::select('SELECT descripcion as text, descripcion FROM tbl_idiomas ORDER BY descripcion ASC'));  
    	$vista->turnos=DB::select($sql_turno);  
    	return $vista;
    }

    public function get_ofertas()
    {
    	$sql="
        SELECT t1.*,COUNT(t2.id) as cantidad FROM tbl_company_ofertas t1
        LEFT JOIN tbl_company_postulados t2 ON t2.id_oferta  = t1.id       
        WHERE  t1.id_empresa= ".session()->get('company_id')."
        GROUP BY t2.id_oferta
        ORDER BY COUNT(t2.id) DESC
        ";
    	try {
    		$datos=DB::select($sql); 
    		echo json_encode($datos);
    	} catch (\Illuminate\Database\QueryException $ex) {
    		 $this->auditar('con_company_ofertas - get_ofertas',str_replace("'", "",$ex->getMessage()),'');
    		 abort(500); 
    	}
    }

    public function get_oferta()
    {
    	if($_POST['id']!=""){
    	$sql="SELECT * FROM tbl_company_ofertas WHERE id_empresa = ".session()->get('company_id')." AND id =".$_POST['id']."";

    	try {
    		$datos=DB::select($sql);
    		$sql="SELECT t1.localidad,t2.provincia FROM tbl_localidades t1
			INNER JOIN tbl_provincias t2 ON t2.id = t1.id_provincia
			WHERE provincia = '".$datos[0]->provincia."'";
    		$localidades=DB::select($sql);
    		$obj = (object) array('valores' => $datos,'localidades' => $localidades); 
    		echo json_encode($obj);
    	} catch (\Illuminate\Database\QueryException $ex) {
    		 $this->auditar('con_company_ofertas - get_oferta',str_replace("'", "",$ex->getMessage()),'');
    		 abort(500); 
    	}} 
    }

    public function update_estatus()
    {
    	if($_POST['estatus'] !="" && $_POST['id'] !="")
    	{ 
    		$valor=0;
	    	if($_POST['estatus']==1)
	    	{
	    		$valor=1;
	    	}
	    	else if($_POST['estatus']==0)
	    	{
	    		 $valor=0;
	    	}
	    	try {
	    			DB::update('UPDATE tbl_company_ofertas SET estatus = '.$valor.' WHERE id_empresa = '.session()->get("company_id").' AND id ='.$_POST['id'].'');
	    			echo 'Oferta actualizada con éxito.';
	    		} catch (\Illuminate\Database\QueryException $ex) {
		    		 $this->auditar('con_company_ofertas -  update_estatus',str_replace("'", "",$ex->getMessage()),'');
		    		 abort(500);
	    		}
    	} 
    }

    public function eliminar()
    {
    	if($_POST['id'] !="")
    	{     		 
	    	try {
	    			DB::delete('DELETE FROM tbl_company_ofertas WHERE id_empresa = '.session()->get("company_id").' AND id ='.$_POST['id'].'');
	    			echo 'Oferta eliminada con éxito.';
	    		} catch (\Illuminate\Database\QueryException $ex) {
		    		 $this->auditar('con_company_ofertas -  update_estatus',str_replace("'", "",$ex->getMessage()),'');
		    		 abort(500);
	    		}
    	} 
    }
    public function publicar()
    {
 	//	 
     
 	     if($_POST['habilidades']=="")
 	     {
 	     	echo '0';
 	     	die();
 	     }
 	      if($_POST['idiomas']=="")
 	     {
 	     	$_POST['idiomas']=array('0'=>'Español'); 
 	     }
    	 $campos_editar='    	 
    	 alias ="'.$_POST['alias'].'",
         experiencia ="'.$_POST['experiencia'].'",
         salario ="'.$_POST['salarios'].'",
    	 titulo ="'.$_POST['titulo'].'",
    	
    	 pais ="'.$_POST['pais'].'",
    	 provincia ="'.$_POST['provincia'].'",
    	 localidad ="'.$_POST['localidad'].'",
    	 direccion ="'.$_POST['direccion'].'",
    	 disponibilidad ="'.$_POST['disponibilidad'].'",
    	 sector ="'.$_POST['sector'].'",
    	 nivel_estudio ="'.$_POST['nivel_estudio'].'",
    	 n_vacantes ='.$_POST['vacantes'].',
    	 plan_estado ="'.$_POST['plan_estado'].'",
    	 confidencial ='.$_POST['confidencial'].',
    	 discapacidad ='.$_POST['discapacidad'].',
    	 turno ="'.$_POST['turno'].'",
    	 genero ="'.$_POST['genero'].'",
    	 edad ="'.$_POST['edad'].'",
    	 habilidades ="'.$this->arreglos($_POST['habilidades']).'",
    	 idiomas ="'.$this->arreglos($_POST['idiomas']).'"';
    	 $campos='
    	 (
          experiencia,
         salario,
    	 id_empresa,
    	 alias,
    	 titulo,
    	 descripcion,
    	 pais,
    	 provincia,
    	 localidad,
    	 direccion,
    	 disponibilidad, 
    	 sector,
    	 nivel_estudio,
    	 n_vacantes,
    	 plan_estado,
    	 confidencial,
    	 discapacidad, 
    	 turno,
    	 genero,
    	 edad,
    	 habilidades,
    	 idiomas,
    	 estatus,
    	 destacar,
    	 plantilla,
    	 plantilla_titulo,
    	 plantilla_descripcion,
    	 fecha_creacion  
    	 )';

    	  $valores="
    	 (
    	 ".session()->get('company_id').",
          '".$_POST['experiencia']."',
         '".$_POST['salarios']."',
    	 '".$_POST['alias']."',
    	 '".$_POST['titulo']."',
    	 '".$_POST['descripcion']."',
    	 '".$_POST['pais']."',
    	 '".$_POST['provincia']."',
    	 '".$_POST['localidad']."',
    	 '".$_POST['direccion']."',
    	 '".$_POST['disponibilidad']."', 
    	 '".$_POST['sector']."',
    	 '".$_POST['nivel_estudio']."',
    	 ".$_POST['vacantes'].",
    	 '".$_POST['plan_estado']."',
    	 '".$_POST['confidencial']."',
    	 '".$_POST['discapacidad']."', 
    	 '".$_POST['turno']."',
    	 '".$_POST['genero']."',
    	 '".$_POST['edad']."',
    	 '".$this->arreglos($_POST['habilidades'])."',
    	 '".$this->arreglos($_POST['idiomas'])."',
    	 1,
    	 0,
    	 'NO',
    	 '',
    	 '',
    	 '".Date('Y-m-d')."' 
    	 )";

    	 $sql_editar="";
    	 try {
	    	 	if($_POST['tipo_oferta']=='1')
	    	 	{
	    	 		 $sql="INSERT INTO tbl_company_ofertas ".$campos." VALUES ".$valores."";
	    	 		 DB::insert($sql);
    	 			 echo 'Oferta publicada con éxito.'; 
	    	 	}
	    	 	else
	    	 	{
	    	 		 $sql="UPDATE tbl_company_ofertas SET ".$campos_editar." WHERE id_empresa =".session()->get('company_id')." AND id =".$_POST['publicacion']."";
                    
	    	 		 DB::update($sql);
    	 			   $sql="UPDATE tbl_company_ofertas SET descripcion = '".$_POST['descripcion']."' WHERE id_empresa =".session()->get('company_id')." AND id =".$_POST['publicacion']."";
    	 			   DB::update($sql);
    	 			 echo 'Oferta actualizada con éxito.'; 
	    	 	} 
    	 	 
    	 } catch (\Illuminate\Database\QueryException $ex) {
    		 $this->auditar('con_company_ofertas -  publicar',str_replace("'", "",$ex->getMessage()),'');
    		 abort(500);
    	 }
    	
    }

    public function arreglos($arreglo)
    {
    	if(count($arreglo)==0){return '';}
    	$result="";
    	$bandera=0;
    	if(count($arreglo)>1)
    	{
    		foreach ($arreglo as $key) {
    			if($bandera==0)
	    		{
	    			$result=$key;
	    			$bandera++;
	    		}
	    		else
	    		{
	    			$result=$result.','.$key;
	    		}
    		} 
    		return $result;
    	}
    	else {return $arreglo[0];} 
    }
}
