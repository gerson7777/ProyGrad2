var tabla;

//Función que se ejecuta al inicio
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
	$("#idgrado").val("");
	$("#nombre").val("");
	$("#seccion").val("");
    $("#modalidad").val("");
    $("#jornada").val("");
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
					url: '../ajax/grado.php?op=listar',
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
		url: "../ajax/grado.php?op=guardaryeditar",
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

function mostrar(idgrado)
{
	$.post("../ajax/grado.php?op=mostrar",{idgrado : idgrado}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombre").val(data.nombre);
		$("#seccion").val(data.seccion);
        $("#modalidad").val(data.modalidad);
        $("#jornada").val(data.jornada);
 		$("#idgrado").val(data.idgrado);

 	})
}

//Función para desactivar registros
function desactivar(idgrado)
{
	bootbox.confirm("¿Está Seguro de desactivar la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/grado.php?op=desactivar", {idgrado : idgrado}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idgrado)
{
	bootbox.confirm("¿Está Seguro de activar la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/grado.php?op=activar", {idgrado : idgrado}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();