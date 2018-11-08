<?php 
require_once "../modelos/Grado.php";

$grado=new Grado();

$idgrado=isset($_POST["idgrado"])? limpiarCadena($_POST["idgrado"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$seccion=isset($_POST["seccion"])? limpiarCadena($_POST["seccion"]):"";
$modalidad=isset($_POST["modalidad"])? limpiarCadena($_POST["modalidad"]):"";
$jornada=isset($_POST["jornada"])? limpiarCadena($_POST["jornada"]):"";

switch ($_GET["op"]){
		case 'guardaryeditar':
		if (empty($idgrado)){
			$rspta=$grado->insertar($nombre,$seccion,$modalidad,$jornada);
			echo $rspta ? "Grado registrado" : "Grado no se pudo registrar";
		}
		else {
			$rspta=$grado->editar($idgrado,$nombre,$seccion,$modalidad,$jornada);
			echo $rspta ? "Grado actualizado" : "Grado no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$grado->desactivar($idgrado);
 		echo $rspta ? "Grado Desactivada" : "Grado no se puede desactivar";
	break;

	case 'activar':
		$rspta=$grado->activar($idgrado);
 		echo $rspta ? "Grado activada" : "Grado no se puede activar";
	break;

	case 'mostrar':
		$rspta=$grado->mostrar($idgrado);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$grado->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			    "0"=> ($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idgrado.')"><i class="fa fa-edit"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idgrado.')"><i class="fa fa-close"></i></button>':
 			    '<button class="btn btn-warning" onclick="mostrar('.$reg->idgrado.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-primary" onclick="activar('.$reg->idgrado.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->seccion,
                "3"=>$reg->modalidad,
                "4"=>$reg->jornada,
 				"5"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
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