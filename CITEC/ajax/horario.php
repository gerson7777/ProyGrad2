<?php 
require_once "../modelos/Horario.php";

$horario=new Horario();

$idhorario=isset($_POST["idhorario"])? limpiarCadena($_POST["idhorario"]):"";
$hora=isset($_POST["hora"])? limpiarCadena($_POST["hora"]):"";


switch ($_GET["op"]){
		case 'guardaryeditar':
		if (empty($idhorario)){
			$rspta=$horario->insertar($hora);
			echo $rspta ? "Horario registrado" : "Horario no se pudo registrar, Consulte si ya existe";
		}
		else {
			$rspta=$horario->editar($idhorario,$hora);
			echo $rspta ? "Horario actualizado" : "Horario no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$horario->desactivar($idhorario);
 		echo $rspta ? "Horario Desactivado" : "Horario no se puede desactivar";
	break;

	case 'activar':
		$rspta=$horario->activar($idhorario);
 		echo $rspta ? "Horario activado" : "Horario no se puede activar";
	break;

	case 'mostrar':
		$rspta=$horario->mostrar($idhorario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$horario->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			    "0"=> ($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idhorario.')"><i class="fa fa-edit"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idhorario.')"><i class="fa fa-close"></i></button>':
 			    '<button class="btn btn-warning" onclick="mostrar('.$reg->idhorario.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-primary" onclick="activar('.$reg->idhorario.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->hora,
 				"2"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
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