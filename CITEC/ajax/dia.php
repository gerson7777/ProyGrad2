<?php 
require_once "../modelos/Dia.php";


$dia=new Dia();

$iddia=isset($_POST["iddia"])? limpiarCadena($_POST["iddia"]):"";
$idasignatura=isset($_POST["idasignatura"])? limpiarCadena($_POST["idasignatura"]):"";
$idhorario=isset($_POST["idhorario"])? limpiarCadena($_POST["idhorario"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

switch ($_GET["op"]){
        case 'guardaryeditar':
		if (empty($iddia)){
			$rspta=$dia->insertar($idasignatura,$idhorario, $nombre);
			echo $rspta ? "Dia registrado" : "Dia no se pudo registrar";
		}
		else {
			$rspta=$dia->editar($iddia,$idasignatura,$idhorario, $nombre);
			echo $rspta ? "Dia actualizada" : "Dia no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$dia->desactivar($iddia);
 		echo $rspta ? "Dia Desactivada" : "Dia no se puede desactivar";
	break;

	case 'activar':
		$rspta=$dia->activar($iddia);
 		echo $rspta ? "Dia activada" : "Dia no se puede activar";
	break;

	case 'mostrar':
		$rspta=$dia->mostrar($iddia);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$dia->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			    "0"=> ($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->iddia.')"><i class="fa fa-edit"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->iddia.')"><i class="fa fa-close"></i></button>':
 			    '<button class="btn btn-warning" onclick="mostrar('.$reg->iddia.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-primary" onclick="activar('.$reg->iddia.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->clase,
 				"2"=>$reg->hora,
                "3"=>$reg->nombre,
 				"4"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

        
	  case "selectAsignatura":
        require_once "../modelos/Asignatura.php";
        $asignatura=new Asignatura();

		$rspta = $asignatura->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idasignatura . '>' . $reg->clase . '</option>';
				}
	break;

        
    case "selectHorario":
	    require_once "../modelos/Horario.php";
		$horario = new Horario();

		$rspta = $horario->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idhorario . '>' . $reg->hora . '</option>';
				}
	break;
                
        

}
?>