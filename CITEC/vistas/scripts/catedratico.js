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
$("#imagenmuestra").hide();

//Función limpiar
function limpiar()
{
	$("#idcatedratico").val("");
	$("#nombreCatedratico").val("");
	$("#apellido").val("");
    $("#correo").val("");
    $("#dni").val("");
    $("#profesion").val("");
    $("#usuario").val("");
    $("#clave").val("");
    $("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#print").hide();
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
					url: '../ajax/catedratico.php?op=listar',
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
		url: "../ajax/catedratico.php?op=guardaryeditar",
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

function mostrar(idcatedratico)
{
	$.post("../ajax/catedratico.php?op=mostrar",{idcatedratico : idcatedratico}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombreCatedratico").val(data.nombreCatedratico);
		$("#apellido").val(data.apellido);
        $("#correo").val(data.correo);
        $("#dni").val(data.dni);
        $("#profesion").val(data.profesion);
        $("#usuario").val(data.usuario);
        $("#clave").val(data.clave);
        $("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/articulos/"+data.imagen);
		$("#imagenactual").val(data.imagen);
 		$("#idcatedratico").val(data.idcatedratico);

 	});
    
}

//Función para desactivar registros
function desactivar(idcatedratico)
{
	bootbox.confirm("¿Está Seguro de desactivar la Catedratico?", function(result){
		if(result)
        {
        	$.post("../ajax/catedratico.php?op=desactivar", {idcatedratico : idcatedratico}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idcatedratico)
{
	bootbox.confirm("¿Está Seguro de activar el Catedratico?", function(result){
		if(result)
        {
        	$.post("../ajax/catedratico.php?op=activar", {idcatedratico : idcatedratico}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();