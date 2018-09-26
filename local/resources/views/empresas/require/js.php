<script>
	function validar_r(par)
	{
		if($("#"+par).val()=="")
		{
			$.notify("Debe completar el campo", "info");
			$("#"+par).focus();
			return false;
		}
		else
			{return true;}
	} 
	function validar_correo(par)
	{
		 var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/; 
	    if (regex.test($('#'+par).val().trim())) {
	    	return true;
	    } else {
	        $.notify("El correo no es válido", "error");
	        $("#"+par).focus();
	        return false;
	    }
	} 

	function validar_clave(par)
	{
		 clave = $("#"+par).val()
		 if(clave.length < 8)
		 { 
		 	 $.notify("La clave debe contener 8 caracteres como mínimo.", "info");
		 	 $("#"+par).focus();
		 	 return false;
		 }
		 else {return true};
	} 

	
</script>

