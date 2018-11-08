<?php 
require_once "../modelos/Cancelado.php";


$cancelado=new  Cancelado();

$idcancelado=isset($_POST["idcancelado"])? limpiarCadena($_POST["idcancelado"]):"";
$idalumno=isset($_POST["idalumno"])? limpiarCadena($_POST["idalumno"]):"";
$idmes=isset($_POST["idmes"])? limpiarCadena($_POST["idmes"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";

switch ($_GET["op"]){
        case 'guardaryeditar':
		if (empty($idcancelado)){
			$rspta=$cancelado->insertar($idalumno,$idmes, $estado);
			echo $rspta ? "cancelado registrado" : "cancelado no se pudo registrar";
		}
		else {
			$rspta=$cancelado->editar($idcancelado,$idalumno,$idmes, $estado);
			echo $rspta ? "cancelado actualizada" : "cancelado no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$cancelado->desactivar($idcancelado);
 		echo $rspta ? "cancelado Desactivada" : "cancelado no se puede desactivar";
	break;

	case 'activar':
		$rspta=$cancelado->activar($idcancelado);
 		echo $rspta ? "cancelado activada" : "cancelado no se puede activar";
	break;

	case 'mostrar':
		$rspta=$cancelado->mostrar($idcancelado);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$cancelado->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			    "0"=> ($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcancelado.')"><i class="fa fa-edit"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idcancelado.')"><i class="fa fa-close"></i></button>':
 			    '<button class="btn btn-warning" onclick="mostrar('.$reg->idcancelado.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-primary" onclick="activar('.$reg->idcancelado.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombreAlumno,
 				"2"=>$reg->nombreMes,
                "3"=>$reg->estado,
                "4"=>$reg->fecha,
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

        
	 case "selectAlumno":
	    require_once "../modelos/Alumno.php";
		$alumno = new Alumno();

		$rspta = $alumno->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idalumno . '>' . $reg->nombreAlumno . '</option>';
				}
	break;

        
    case "selectMes":
	    require_once "../modelos/Mes.php";
		$mes = new Mes();

		$rspta = $mes->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idmes . '>' . $reg->nombreMes . '</option>';
				}
	break;
                
        

}
?>