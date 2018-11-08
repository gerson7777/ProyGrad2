var tabla;

//Función que se ejecuta al inicio
function init(){
	listar();
	//Cargamos los items al select cliente
	$.post("../ajax/calasignatura.php?op=selectUnidad", function(k){
	$("#idunidad").html(k);
	$("#idunidad").selectpicker('refresh');

});
}


//Función Listar
function listar()
{
	var usuario = $("#usuario").val();
	var idunidad = $("#idunidad").val();

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
					url: '../ajax/consultaDos.php?op=notasunidad',
					data:{usuario: usuario,idunidad: idunidad},
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


