function init(){
	mostrarforma(true);
	$("#btnGuardarr").prop("enable",true);

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

function limpiar()
{
  

	$("#descripcion").val("");
	
}



function mostrarforma(flag)
{
	limpiar();
	
		$("#formularioregistross").show();
		
	
}
//Función Listar



//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/queja.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	     
             bootbox.alert(datos);	          
	        
	    }

	});
	limpiar();
}


init();