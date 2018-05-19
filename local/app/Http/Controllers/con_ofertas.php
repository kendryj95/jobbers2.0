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
    	 
    	$sql="SELECT t1.direccion, t1.id, t2.nombre_aleatorio as imagen,t3.nombre,t4.nombre as sectores,t1.titulo,t5.nombre as areas,t6.nombre as disponibilidad,t7.provincia,t8.localidad,t1.discapacidad,t1.descripcion,t1.estatus,t1.fecha_venc,t1.vistos,t1.tmp  FROM tbl_publicacion t1
			LEFT JOIN tbl_archivos t2 ON t1.id_imagen = t2.id
			LEFT JOIN tbl_empresa t3 ON t1.id_empresa = t3.id
			LEFT JOIN tbl_areas_sectores t4 ON t1.id_sector = t4.id
			LEFT JOIN tbl_areas t5 ON t1.id_area = t5.id 
			LEFT JOIN tbl_disponibilidad t6 ON t1.id_disponibilidad = t6.id
			LEFT JOIN tbl_provincias t7 ON t1.id_provincia = t7.id
			LEFT JOIN tbl_localidades t8 ON t1.id_localidad = t8.id
            WHERE t1.estatus = 1
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
        $sql_favoritos="SELECT t1.id,t2.id_referencia FROM tbl_publicacion t1
        LEFT JOIN tbl_favoritos t2 ON t2.id_referencia =t1.id AND t2.id_tipo = 3 AND t2.id_usuario=".session()->get("cand_id")."";

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
            $favoritos=DB::select($sql_favoritos); 

    		$publicaciones=DB::select($sql); 

    		//$vista->antiguedad=$antiguedad;
            $vista->favoritos=$favoritos; 
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

    public function detalle($id)
    {
        $vista=View::make('detalle_oferta');
        $sql="SELECT t2.id as id_empresa, t1.tmp,t1.id, t1.titulo,t1.discapacidad,t1.vistos,t1.descripcion,t1.id_experiencia,t1.id_genero,t1.fecha_venc,t1.direccion,t1.estatus, t9.nombre ,t7.nombre as sector, t8.nombre as area, t2.nombre as empresa,IF(t5.nombre_aleatorio is null,'empresa.jpg',t5.nombre_aleatorio) as img_empresa,IF(t6.nombre_aleatorio is null,'0.jpg',t6.nombre_aleatorio) as img_publicacion,concat(t3.provincia,' / ',t4.localidad) as dir_empresa FROM tbl_publicacion t1
            LEFT JOIN tbl_empresa t2 ON t2.id = t1.id_empresa
            LEFT JOIN tbl_provincias t3 ON t3.id = t2.provincia
            LEFT JOIN tbl_localidades t4 ON t4.id = t2.localidad
            LEFT JOIN tbl_archivos t5 ON t5.id = t2.id_imagen
            LEFT JOIN tbl_archivos t6 ON t6.id = t1.id_imagen
            LEFT JOIN tbl_areas_sectores t7 ON t7.id = t1.id_sector
            LEFT JOIN tbl_areas t8 ON t8.id = t1.id_area
            LEFT JOIN tbl_disponibilidad t9 ON t9.id = t1.id_disponibilidad  
            WHERE t1.id = ".$id." AND t1.estatus = 1";

            try {
                $datos=DB::select($sql);
                $vista->datos=$datos;
                $sql_cantidad_ofertas="
                SELECT count(*) as cantidad 
                FROM tbl_publicacion 
                WHERE id_empresa= ".$datos[0]->id_empresa." and estatus = 1 GROUP by id_empresa"; 

                /*$sql_vistas="
                SELECT count(*) as cantidad FROM tbl_vistos WHERE id_usuario = ".$datos[0]->id_empresa." AND id_tipo_visto = 1
                GROUP by id_usuario";  
                $vistas=DB::select($sql_vistas); 
                
                $vista->vistas=$vistas;*/
                $sql_cantidad_ofertas="
                SELECT count(*) as cantidad 
                FROM tbl_publicacion 
                WHERE id_empresa= ".$datos[0]->id_empresa." and estatus = 1 GROUP by id_empresa";  
                $cantidad_ofertas=DB::select($sql_cantidad_ofertas);
                $vista->cantidad_ofertas=$cantidad_ofertas;
                return $vista;
            } catch (Exception $e) {
                
            }
            
    } 
}
