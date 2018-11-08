var tabla;
function init(){
	mostrarTodo(true);
	listar();
}

function mostrarTodo(flag)
{
	
    $("#formularioregistros").show();

}

function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,
	    "aServerSide": true,
	    dom: 'Bfrtip',
	    buttons: [		          
		            'excelHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/consultaUno.php?op=listar',
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
init();