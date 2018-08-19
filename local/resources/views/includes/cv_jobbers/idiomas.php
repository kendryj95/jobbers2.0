<?php
//Experiencia laboral
Fpdf::SetFont('Arial','',10); 
Fpdf::SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco) 
Fpdf::SetFillColor(232, 232, 232);  
Fpdf::Cell(190,5,''.utf8_decode("IDIOMAS").'',0,1,'C','true');

if(count($datos_idioma)>0)
{

	$total=count($datos_idioma);
	for ($i=0; $i < $total ; $i++) {  
	Fpdf::SetFont('Arial','B',10); 
	Fpdf::SetTextColor(46, 49, 146);
	Fpdf::Cell(190,5,''.utf8_decode("".$datos_idioma[$i]->descripcion."").'',0,1,'0'); 	 
	}
} 
else
{
	Fpdf::Cell(190,5,''.utf8_decode("Sin información").'',0,1,'0'); 
}
//
function nivel($parametro)
{
	if($parametro==1){return "Básico";}
	if($parametro==2){return "Medio";}
	if($parametro==3){return "Avanzado";}
	if($parametro==4){return "Nativo";}
}
 
?>