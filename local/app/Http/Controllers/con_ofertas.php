<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use DB;
class con_ofertas extends Controller
{
    public function index()
    {
    	$vista=View::make("ofertas");
    	//$sql_antiguedad="";
    	$sql="SELECT t1.direccion, t1.id, t2.nombre_aleatorio as imagen,t3.nombre,t4.nombre as sectores,t1.titulo,t5.nombre as areas,t6.nombre as disponibilidad,t7.provincia,t8.localidad,t1.discapacidad,t1.descripcion,t1.estatus,t1.fecha_venc,t1.vistos,t1.tmp  FROM tbl_publicacion t1
			LEFT JOIN tbl_archivos t2 ON t1.id_imagen = t2.id
			LEFT JOIN tbl_empresa t3 ON t1.id_empresa = t3.id
			LEFT JOIN tbl_areas_sectores t4 ON t1.id_sector = t4.id
			LEFT JOIN tbl_areas t5 ON t1.id_area = t5.id 
			LEFT JOIN tbl_disponibilidad t6 ON t1.id_disponibilidad = t6.id
			LEFT JOIN tbl_provincias t7 ON t1.id_provincia = t7.id
			LEFT JOIN tbl_localidades t8 ON t1.id_localidad = t8.id
			GROUP BY t1.id
			";
    	$sql_disponibilidad="SELECT * FROM tbl_disponibilidad";
    	$sql_sector="SELECT * FROM tbl_areas_sectores";
    	$sql_area="SELECT * FROM tbl_areas";
    	$sql_salario="SELECT * FROM tbl_rango_salarios";
    	$sql_genero="SELECT * FROM tbl_generos";
    	$sql_provincias="SELECT * FROM tbl_provincias";
    	$sql_localidades="SELECT * FROM tbl_localidades";
    	$sql_experiencia="SELECT * FROM tbl_experiencia";


    	try {
    		//$antiguedad=DB::select($sql_antiguedad);
    		$disponibilidad=DB::select($sql_disponibilidad);
    		$sector=DB::select($sql_sector);
    		$area=DB::select($sql_area);
    		$salario=DB::select($sql_salario);
    		$genero=DB::select($sql_genero);
    		$provincia=DB::select($sql_provincias);
    		$localidad=DB::select($sql_localidades); 
    		$experiencia=DB::select($sql_experiencia); 

    		$publicaciones=DB::select($sql); 

    		//$vista->antiguedad=$antiguedad;
    		$vista->disponibilidad=$disponibilidad;
    		$vista->sector=$sector; 
    		$vista->experiencia=$experiencia; 
    		$vista->area=$area;
    		$vista->salario=$salario;
    		$vista->genero=$genero;
    		$vista->provincia=$provincia;
    		$vista->localidad=$localidad; 
    		$vista->publicaciones=$publicaciones; 
    		return $vista;
    	} catch (Exception $e) {
    		
    	}
    }

    public function detailOferta()
    {
        return view("detail_oferta");
    }
}
