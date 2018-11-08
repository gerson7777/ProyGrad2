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


$.post("../ajax/calasignatura.php?op=selectAsignatura", function(r){
	$("#idasignatura").html(r);
	$("#idasignatura").selectpicker('refresh');

});

$.post("../ajax/calasignatura.php?op=selectAlumno", function(k){
	$("#idalumno").html(k);
	$("#idalumno").selectpicker('refresh');

});

$.post("../ajax/calasignatura.php?op=selectUnidad", function(m){
	$("#idunidad").html(m);
	$("#idunidad").selectpicker('refresh');

});








//$("#imagenmuestra").hide();

//Función limpiar
function limpiar()
{
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_hora').val(today);
    $('#nota').val("");
	
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
					url: '../ajax/calasignatura.php?op=listar',
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
		url: "../ajax/calasignatura.php?op=guardaryeditar",
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

function mostrar(idcalasignatura)
{
	$.post("../ajax/calasignatura.php?op=mostrar",{idcalasignatura : idcalasignatura}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
        $("#idasignatura").val(data.idasignatura);
		$("#idasignatura").selectpicker('refresh');
	    $("#idalumno").val(data.idalumno);
		$("#idalumno").selectpicker('refresh');
        
        $("#idunidad").val(data.idunidad);
		$("#idunidad").selectpicker('refresh');
        
        $("#fecha_hora").val(data.fecha);
        $("#nota").val(data.nota);
        $("#idcalasignatura").val(data.idcalasignatura);


 	})
}

//Función para desactivar registros
function desactivar(idcalasignatura)
{
	bootbox.confirm("¿Está Seguro de desactivar el está nota?", function(result){
		if(result)
        {
        	$.post("../ajax/calasignatura.php?op=desactivar", {idcalasignatura : idcalasignatura}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idcalasignatura)
{
	bootbox.confirm("¿Está Seguro de activar el está nota?", function(result){
		if(result)
        {
        	$.post("../ajax/calasignatura.php?op=activar", {idcalasignatura : idcalasignatura}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();