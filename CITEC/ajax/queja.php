<?php 
require_once "../modelos/Queja.php";

$queja=new Queja();

$idqueja=isset($_POST["idqueja"])? limpiarCadena($_POST["idqueja"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";



switch ($_GET["op"]){
		case 'guardaryeditar':
		if (empty($idqueja)){
			$rspta=$queja->insertar($descripcion);
			echo $rspta ? "Queja registrado" : "Queja no se pudo registrar";
		}
		else {
			$rspta=$queja->editar($idqueja,$fecha);
			echo $rspta ? "Queja actualizado" : "Queja no se pudo actualizar";
		}
	break;


	case 'mostrar':
		$rspta=$queja->mostrar($idqueja);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$queja->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->descripcion,
                "1"=>$reg->fecha
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