<?php 
require_once "../modelos/Topveinte.php";

$topVeinte=new Topveinte();





switch ($_GET["op"]){
		
	case 'listar':
		$rspta=$topVeinte->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->alumno,
                "1"=>$reg->promedio
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
?>