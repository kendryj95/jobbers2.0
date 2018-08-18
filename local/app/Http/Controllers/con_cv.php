<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Http\Requests;
use Fpdf;
use DB;
use DateTime;
class con_cv extends Controller
{
    public function index($id)
    { 
    	$sql_datos_personales="
    	SELECT 
    	count(t1.id) as cantidad, 
    	t1.correo,
    	t2.nombres,
    	t2.apellidos,
    	t2.n_identificacion,
    	t2.fecha_nac,
    	t3.id_foto 
    	FROM tbl_usuarios t1 
		INNER JOIN tbl_candidato_datos_personales t2 ON t2.id_usuario = t1.id
		LEFT JOIN tbl_usuarios_foto_perfil t3 ON t3.id_usuario = t1.id 
		WHERE t1.id =".$id."";

		$sql_inf_general="SELECT t1.telefono,t1.direccion,t2.descripcion,t3.provincia,t4.localidad,t2.nacionalidad FROM `tbl_candidato_info_contacto` t1
			INNER JOIN tbl_paises t2 ON t2.id = t1.id_pais
			INNER JOIN tbl_provincias t3 ON t3.id = t1.id_provincia
			INNER JOIN tbl_localidades t4 ON t4.id = t1.id_localidad
			WHERE t1.id_usuario =".$id."";
		
		$sql_experiencia_lab="SELECT t2.nombre_empresa,t2.cargo,t2.descripcion,t3.nombre as  act_empresa,t2.desde,t2.hasta from  tbl_usuarios t1
			LEFT JOIN tbl_candidato_experiencia_laboral t2 ON t2.id_usuario = t1.id
			LEFT JOIN tbl_actividades_empresa t3 ON t3.id = t2.id_actividad_empresa
			WHERE t1.id =".$id."";

			$sql_idioma="SELECT t3.descripcion from tbl_usuarios t1
			LEFT JOIN tbl_candidato_idioma t2 ON t2.id_usuario=t1.id
			LEFT JOIN tbl_idiomas t3 ON t3.id = t2.id_idioma 
			WHERE t1.id =".$id."";
			$sql_estudios="SELECT t5.descripcion as nivel_estudio,t3.descripcion,t2.nombre_institucion,t4.descripcion as area_estudio,concat(t2.desde,' - ',t2.hasta) as fecha,t2.titulo from tbl_usuarios t1
				LEFT JOIN tbl_candidatos_educacion t2 ON t2.id_usuario=t1.id
				LEFT JOIN tbl_paises t3 ON t3.id = t2.id_pais
				LEFT JOIN tbl_area_estudios t4 ON t4.id = t2.id_area_estudio
				LEFT JOIN tbl_nivel_estudio t5 ON t5.id = t2.id_nivel_estudio
			WHERE t1.id =".$id."";
		$sql_info_extra="SELECT  t2.salario,t3.sobre_mi,t4.nombre  FROM `tbl_candidato_preferencias_laborales` t1
		LEFT JOIN tbl_rango_salarios t2 ON t2.id = t1.id_remuneracion_pre
		LEFT JOIN tbl_disponibilidad t4 ON t4.id = t1.id_jornada
		LEFT JOIN tbl_candidato_datos_personales  t3 ON t3.id_usuario = t1.id_usuario 
			WHERE t1.id_usuario =".$id."";

    	try {
    		$datos_personales=DB::select($sql_datos_personales);
    		$datos_generales=DB::select($sql_inf_general);
    		$datos_experiencia_lab=DB::select($sql_experiencia_lab);
    		$datos_idioma=DB::select($sql_idioma);
    		$datos_estudios=DB::select($sql_estudios);
    		$datos_info_extra=DB::select($sql_info_extra);

    		if($datos_personales[0]->cantidad!=0)
    		{
    			Fpdf::AddPage();
		    	include('local/resources/views/includes/cv_jobbers/footer.php');
		    	$this->validar();
		    	include('local/resources/views/includes/cv_jobbers/header.php');
		    	$this->validar();
				include('local/resources/views/includes/cv_jobbers/inf_general.php'); 
				$this->validar();
				include('local/resources/views/includes/cv_jobbers/experiencia.php');
				$this->validar();  
				include('local/resources/views/includes/cv_jobbers/idiomas.php');
				$this->validar();  
				include('local/resources/views/includes/cv_jobbers/estudios.php');
				$this->validar();  
				include('local/resources/views/includes/cv_jobbers/otros_conocimientos.php');
				$this->validar();  
				include('local/resources/views/includes/cv_jobbers/info_extra.php');
				$this->validar();
				Fpdf::Output('file.pdf','I',true);		
    		}
    		else
    		{
    			return "No hay datos para mostrar";
    		}
    	} catch (Exception $e) {
    		
    	}    	   
    }

    public function validar()
	{
		if(Fpdf::GetY()>220)
		{
			Fpdf::AddPage();
			include('local/resources/views/includes/cv_jobbers/footer.php');
		}
	}
	public function edad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}

	public function calcular_antiguedad($desde,$hasta)
	{
		 if($desde!="")
		 {
		 	if($hasta=="Actualidad")
			{
				$hasta= new DateTime(date('Y-m-d'));
			}
			else
			{
				$hasta= new DateTime($hasta);
			}

			$fechainicial = new DateTime($desde);
			$fechafinal = $hasta;

			$diferencia = $fechainicial->diff($fechafinal);
			$meses = ( $diferencia->y * 12 ) + $diferencia->m;
			if($meses<1)
			{
				return "";
			}
			else
			{
				return "(".$meses." meses)";
			}
		 }
		 else
		 {
		 	return "";
		 }
	}
} 