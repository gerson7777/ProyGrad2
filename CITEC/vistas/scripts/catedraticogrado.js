var tabla;

//Función que se ejecuta al inicio
function init(){
	listar();
	//Cargamos los items al select cliente
$.post("../ajax/casignatura.php?op=selectCatedratico", function(r){
	$("#idcatedratico").html(r);
	$("#idcatedratico").selectpicker('refresh');

});
    
$.post("../ajax/asignatura.php?op=selectGrado", function(r){
	$("#idgrado").html(r);
	$("#idgrado").selectpicker('refresh');

});
    
    
}


//Función Listar
function listar()
{
	
	var idcatedratico = $("#idcatedratico").val();
    var idgrado = $("#idgrado").val();

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
					url: '../ajax/consultaDos.php?op=maestrogrados',
					data:{idcatedratico: idcatedratico,idgrado: idgrado},
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