<?php
//Experiencia laboral
Fpdf::SetFont('Arial','',10); 
Fpdf::SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco) 
Fpdf::SetFillColor(232, 232, 232);  
Fpdf::Cell(190,5,''.utf8_decode("EXPERIENCIA LABORAL").'',0,1,'C','true');
if(count($datos_experiencia_lab) > 0)
{ 	$total=count($datos_experiencia_lab);
	for ($i=0; $i < $total ; $i++) 
	{ 
	Fpdf::SetFont('Arial','B',10); 
	Fpdf::SetTextColor(46, 49, 146);
	Fpdf::Cell(190,5,utf8_decode($datos_experiencia_lab[$i]->nombre_empresa),0,1,'0');
	Fpdf::SetFont('Arial','',9); 
	Fpdf::SetTextColor(0,0,0);
	$textotrabajar=""; 


	if($datos_experiencia_lab[$i]->hasta=="")
	{
		$datos_experiencia_lab[$i]->hasta="Actualidad";
	}
	Fpdf::Cell(190,5,''.utf8_decode(
		"Cargo: ".utf8_decode($datos_experiencia_lab[$i]->cargo).
		" - Act. Empresa: ".utf8_decode($datos_experiencia_lab[$i]->act_empresa).
		" - Periodo: ".$datos_experiencia_lab[$i]->desde.
		" a ".$datos_experiencia_lab[$i]->hasta." ".$this->calcular_antiguedad($datos_experiencia_lab[$i]->desde,$datos_experiencia_lab[$i]->hasta)."" ).'',0,1,'0'); 
	 

 
	$cadena_experiencia=explode(" ", $datos_experiencia_lab[$i]->descripcion);
	$datos_experiencia="";
	$bandera_experiencia=0;
	$bandera=0;
	$contador=0;
	foreach ($cadena_experiencia as $key ) 
		{ 
		 	$datos_experiencia=$datos_experiencia." ".$key;
			if(strlen($datos_experiencia)<80)
			{
				
				$bandera_experiencia=0;
			}
			else
			{
				if($contador==0)
				{
					$bandera_experiencia=1;
					Fpdf::Cell(190,5,''.utf8_decode("Descripción de tareas:".$datos_experiencia."").'',0,1,'0');
					$datos_experiencia="";
					$contador++;
				}
				else
				{
					$bandera_experiencia=1;
					Fpdf::Cell(190,5,''.utf8_decode("".$datos_experiencia."").'',0,1,'0');
					$datos_experiencia="";
				} 
				}
		
		}
			if($bandera==0)
			{
				if($contador==0)
				{
					$bandera_experiencia=1;
					Fpdf::Cell(190,5,''.utf8_decode("Descripción de tareas:".$datos_experiencia."").'',0,1,'0'); 
					$contador++;
				}
				else
				{
					$bandera_experiencia=1;
					Fpdf::Cell(190,5,''.utf8_decode("".$datos_experiencia."").'',0,1,'0'); 
				} 
			} 
		}

	} 
else
{
	Fpdf::Cell(190,5,''.utf8_decode("Sin experiencia pero con ganas de aprender mucho.").'',0,1,'0'); 
}
 

?>