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


$.post("../ajax/casignatura.php?op=selectCatedratico", function(r){
	$("#idcatedratico").html(r);
	$("#idcatedratico").selectpicker('refresh');

});

$.post("../ajax/casignatura.php?op=selectAsignatura", function(k){
	$("#idasignatura").html(k);
	$("#idasignatura").selectpicker('refresh');

});




//$("#imagenmuestra").hide();

//Función limpiar
function limpiar()
{
	//$("#nombre").val("");
	
}

//Función mostrar formulario
function mostrarform(flag)
{
	//limpiar();
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
					url: '../ajax/casignatura.php?op=listar',
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
		url: "../ajax/casignatura.php?op=guardaryeditar",
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

function mostrar(idcasignatura)
{
	$.post("../ajax/casignatura.php?op=mostrar",{idcasignatura : idcasignatura}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
	   
		$("#idcatedratico").val(data.idcatedratico);
		$("#idcatedratico").selectpicker('refresh');
        $("#idasignatura").val(data.idasignatura);
		$("#idasignatura").selectpicker('refresh');
        $("#idcasignatura").val(data.idcasignatura);


 	})
}

//Función para desactivar registros
function desactivar(idcasignatura)
{
	bootbox.confirm("¿Está Seguro de desactivar este Campo?", function(result){
		if(result)
        {
        	$.post("../ajax/casignatura.php?op=desactivar", {idcasignatura : idcasignatura}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idcasignatura)
{
	bootbox.confirm("¿Está Seguro de activar este Campo?", function(result){
		if(result)
        {
        	$.post("../ajax/casignatura.php?op=activar", {idcasignatura : idcasignatura}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();