var tabla;

//Función que se ejecuta al hora
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

//Función limpiar
function limpiar()
{

	$("#nombreAnio").val("");
	
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}






function mostrarforma(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistross").hide();
		$("#formularioregistross").show();
		$("#btnGuardarr").prop("disabled",false);
		$("#btnagregarr").hide();
	}
	else
	{
		$("#listadoregistross").show();
		$("#formularioregistross").hide();
		$("#btnagregarr").show();
	}
}










//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            //'copyHtml5',
		            'excelHtml5',
		            //'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/anio.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 10,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}





//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/anio.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idanio)
{
	$.post("../ajax/anio.php?op=mostrar",{idanio : idanio}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombreAnio").val(data.nombreAnio);
 		$("#idanio").val(data.idanio);

 	})
}

//Función para desactivar registros
function desactivar(idanio)
{
	bootbox.confirm("¿Está Seguro de desactivar el Año?", function(result){
		if(result)
        {
        	$.post("../ajax/anio.php?op=desactivar", {idanio : idanio}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idanio)
{
	bootbox.confirm("¿Está Seguro de activar el Año?", function(result){
		if(result)
        {
        	$.post("../ajax/anio.php?op=activar", {idanio : idanio}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();