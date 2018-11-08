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

$.post("../ajax/asignatura.php?op=selectGrado", function(r){
	$("#idgrado").html(r);
	$("#idgrado").selectpicker('refresh');

});
//$("#imagenmuestra").hide();

//Función limpiar
function limpiar()
{
	$("#clase").val("");
	
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
					url: '../ajax/asignatura.php?op=listar',
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
		url: "../ajax/asignatura.php?op=guardaryeditar",
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

function mostrar(idasignatura)
{
	$.post("../ajax/asignatura.php?op=mostrar",{idasignatura : idasignatura}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
	   
		$("#idgrado").val(data.idgrado);
		$("#idgrado").selectpicker('refresh');
        $("#clase").val(data.clase);
        $("#idasignatura").val(data.idasignatura);

 	})
}

//Función para desactivar registros
function desactivar(idasignatura)
{
	bootbox.confirm("¿Está Seguro de desactivar la Asignatura?", function(result){
		if(result)
        {
        	$.post("../ajax/asignatura.php?op=desactivar", {idasignatura : idasignatura}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idasignatura)
{
	bootbox.confirm("¿Está Seguro de activar la Asignatura?", function(result){
		if(result)
        {
        	$.post("../ajax/asignatura.php?op=activar", {idasignatura : idasignatura}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();