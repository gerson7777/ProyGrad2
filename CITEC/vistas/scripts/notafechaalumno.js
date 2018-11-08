var tabla;

//Función que se ejecuta al inicio
function init(){
	listar();
	//Cargamos los items al select cliente
	$.post("../ajax/calasignatura.php?op=selectAlumno", function(k){
	$("#idalumno").html(k);
	$("#idalumno").selectpicker('refresh');

});
}


//Función Listar
function listar()
{
	var fecha_inicio = $("#fecha_inicio").val();
	var fecha_fin = $("#fecha_fin").val();
	var idalumno = $("#idalumno").val();

	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'excelHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/consultaDos.php?op=notasfechaalumno',
					data:{fecha_inicio: fecha_inicio,fecha_fin: fecha_fin, idalumno: idalumno},
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 25,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}


init();


