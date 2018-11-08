<?php 
require_once "../modelos/Asignatura.php";

$asignatura=new Asignatura();

$idasignatura=isset($_POST["idasignatura"])? limpiarCadena($_POST["idasignatura"]):"";
$idgrado=isset($_POST["idgrado"])? limpiarCadena($_POST["idgrado"]):"";
$clase=isset($_POST["clase"])? limpiarCadena($_POST["clase"]):"";

switch ($_GET["op"]){
        case 'guardaryeditar':
		if (empty($idasignatura)){
			$rspta=$asignatura->insertar($idgrado, $clase);
			echo $rspta ? "Asignatura registrada" : "No se ha podido registrar, Verifique si ya existe";
		}
		else {
			$rspta=$asignatura->editar($idasignatura,$idgrado, $clase);
			echo $rspta ? "Asignatura actualizada" : "Asignatura no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$asignatura->desactivar($idasignatura);
 		echo $rspta ? "asignatura Desactivada" : "asignatura no se puede desactivar";
	break;

	case 'activar':
		$rspta=$asignatura->activar($idasignatura);
 		echo $rspta ? "asignatura activada" : "asignatura no se puede activar";
	break;

	case 'mostrar':
		$rspta=$asignatura->mostrar($idasignatura);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$asignatura->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			    "0"=> ($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idasignatura.')"><i class="fa fa-edit"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idasignatura.')"><i class="fa fa-close"></i></button>':
 			    '<button class="btn btn-warning" onclick="mostrar('.$reg->idasignatura.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-primary" onclick="activar('.$reg->idasignatura.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->clase,
 				"2"=>$reg->grado,
 				"3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case "selectGrado":
		require_once "../modelos/Grado.php";
		$grado = new Grado();

		$rspta = $grado->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idgrado . '>' . $reg->nombre . '</option>';
				}
	break;

}
?>