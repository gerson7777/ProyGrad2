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


$.post("../ajax/dia.php?op=selectAsignatura", function(r){
	$("#idasignatura").html(r);
	$("#idasignatura").selectpicker('refresh');

});

$.post("../ajax/dia.php?op=selectHorario", function(k){
	$("#idhorario").html(k);
	$("#idhorario").selectpicker('refresh');

});




//$("#imagenmuestra").hide();

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	
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
					url: '../ajax/dia.php?op=listar',
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
		url: "../ajax/dia.php?op=guardaryeditar",
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

function mostrar(iddia)
{
	$.post("../ajax/dia.php?op=mostrar",{iddia : iddia}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
	   
		$("#idasignatura").val(data.idasignatura);
		$("#idasignatura").selectpicker('refresh');
        $("#idhorario").val(data.idhorario);
		$("#idhorario").selectpicker('refresh');
        $("#nombre").val(data.nombre);
        $("#iddia").val(data.iddia);


 	})
}

//Función para desactivar registros
function desactivar(iddia)
{
	bootbox.confirm("¿Está Seguro de desactivar el Día?", function(result){
		if(result)
        {
        	$.post("../ajax/dia.php?op=desactivar", {iddia : iddia}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(iddia)
{
	bootbox.confirm("¿Está Seguro de activar el Día?", function(result){
		if(result)
        {
        	$.post("../ajax/dia.php?op=activar", {iddia : iddia}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();