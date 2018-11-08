<?php 
require_once "../modelos/Casignatura.php";


$casignatura=new Casignatura();

$idcasignatura=isset($_POST["idcasignatura"])? limpiarCadena($_POST["idcasignatura"]):"";
$idcatedratico=isset($_POST["idcatedratico"])? limpiarCadena($_POST["idcatedratico"]):"";
$idasignatura=isset($_POST["idasignatura"])? limpiarCadena($_POST["idasignatura"]):"";


switch ($_GET["op"]){
        case 'guardaryeditar':
		if (empty($idcasignatura)){
			$rspta=$casignatura->insertar($idcatedratico,$idasignatura);
			echo $rspta ? "Catedratico por Asignatura registrado" : "Catedratico por Asignatura no se pudo registrar";
		}
		else {
			$rspta=$casignatura->editar($idcasignatura,$idcatedratico,$idasignatura);
			echo $rspta ? "Catedratico por Asignatura actualizada" : "Catedratico por Asignatura no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$casignatura->desactivar($idcasignatura);
 		echo $rspta ? "Catedratico por Asignatura Desactivada" : "Catedratico por Asignatura no se puede desactivar";
	break;

	case 'activar':
		$rspta=$casignatura->activar($idcasignatura);
 		echo $rspta ? "Catedratico por Asignatura activada" : "Catedratico por Asignatura no se puede activar";
	break;

	case 'mostrar':
		$rspta=$casignatura->mostrar($idcasignatura);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$casignatura->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			    "0"=> ($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcasignatura.')"><i class="fa fa-edit"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idcasignatura.')"><i class="fa fa-close"></i></button>':
 			    '<button class="btn btn-warning" onclick="mostrar('.$reg->idcasignatura.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-primary" onclick="activar('.$reg->idcasignatura.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombreCatedratico,
 				"2"=>$reg->clase,
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

        
	  case "selectCatedratico":
        require_once "../modelos/Catedratico.php";
        $catedratico=new Catedratico();

		$rspta = $catedratico->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idcatedratico . '>' . $reg->nombreCatedratico . '</option>';
				}
	break;

        
    case "selectAsignatura":
	    require_once "../modelos/Asignatura.php";
		$asignatura = new Asignatura();

		$rspta = $asignatura->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idasignatura . '>' . $reg->clase . '</option>';
				}
	break;
                
        

}
?>