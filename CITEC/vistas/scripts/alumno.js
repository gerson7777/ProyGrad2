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


//cargar los items al select de categoria

$.post("../ajax/alumno.php?op=selectGrado", function(r){
	$("#idgrado").html(r);
	$("#idgrado").selectpicker('refresh');

});




$.post("../ajax/alumno.php?op=selectAnio", function(r){
	$("#idanio").html(r);
	$("#idanio").selectpicker('refresh');

});

$("#imagenmuestra").hide();
//$("#imagenmuestra").hide();

//Función limpiar
function limpiar()
{
    
	$("#nombreAlumno").val("");
	$("#apellido").val("");
    $("#sexo").val("");
    $("#tel").val("");
    $("#direccion").val("");
    $("#usuario").val("");
    $("#clave").val("");
    $("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#print").hide();
    $("#idalumno").val("");

	
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
					url: '../ajax/alumno.php?op=listar',
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
		url: "../ajax/alumno.php?op=guardaryeditar",
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

function mostrar(idalumno)
{
	$.post("../ajax/alumno.php?op=mostrar",{idalumno : idalumno}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
	    $("#idanio").val(data.idanio);
		$("#idanio").selectpicker('refresh');
		$("#idgrado").val(data.idgrado);
		$("#idgrado").selectpicker('refresh');
        $("#nombreAlumno").val(data.nombreAlumno);
	    $("#apellido").val(data.apellido);
        $("#sexo").val(data.sexo);
        $("#tel").val(data.tel);
        $("#direccion").val(data.direccion);
        $("#usuario").val(data.usuario);
        $("#clave").val(data.clave);
        $("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/articulos/"+data.imagen);
		$("#imagenactual").val(data.imagen);
        $("#idalumno").val(data.idalumno);

 	})
}

//Función para desactivar registros
function desactivar(idalumno)
{
	bootbox.confirm("¿Está Seguro de desactivar la Alumno?", function(result){
		if(result)
        {
        	$.post("../ajax/alumno.php?op=desactivar", {idalumno : idalumno}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idalumno)
{
	bootbox.confirm("¿Está Seguro de activar la Alumno?", function(result){
		if(result)
        {
        	$.post("../ajax/alumno.php?op=activar", {idalumno : idalumno}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();