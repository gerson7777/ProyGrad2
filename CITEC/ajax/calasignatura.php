<?php 
require_once "../modelos/Calasignatura.php";


$calasignatura=new Calasignatura();

$idcalasignatura=isset($_POST["idcalasignatura"])? limpiarCadena($_POST["idcalasignatura"]):"";
$idasignatura=isset($_POST["idasignatura"])? limpiarCadena($_POST["idasignatura"]):"";
$idalumno=isset($_POST["idalumno"])? limpiarCadena($_POST["idalumno"]):"";
$idunidad=isset($_POST["idunidad"])? limpiarCadena($_POST["idunidad"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$nota=isset($_POST["nota"])? limpiarCadena($_POST["nota"]):"";


switch ($_GET["op"]){
        case 'guardaryeditar':
		if (empty($idcalasignatura)){
			$rspta=$calasignatura->insertar($idasignatura,$idalumno,$idunidad, $fecha_hora,$nota);
			echo $rspta ? "Nota de  alumno registrada" : "Nota de  alumno no se pudo registrar";
		}
		else {
			$rspta=$calasignatura->editar($idcalasignatura,$idasignatura,$idalumno,$idunidad, $fecha_hora,$nota);
			echo $rspta ? "Nota de  alumno actualizada" : "Nota de  alumno no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$calasignatura->desactivar($idcalasignatura);
 		echo $rspta ? "Nota de  alumno Desactivada" : "Nota de  alumno no se puede desactivar";
	break;

	case 'activar':
		$rspta=$calasignatura->activar($idcalasignatura);
 		echo $rspta ? "Nota de  alumno activada" : "Nota de  alumno no se puede activar";
	break;

	case 'mostrar':
		$rspta=$calasignatura->mostrar($idcalasignatura);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$calasignatura->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			    "0"=> ($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcalasignatura.')"><i class="fa fa-edit"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idcalasignatura.')"><i class="fa fa-close"></i></button>':
 			    '<button class="btn btn-warning" onclick="mostrar('.$reg->idcalasignatura.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-primary" onclick="activar('.$reg->idcalasignatura.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->clase,
 				"2"=>$reg->nombreAlumno,
                "3"=>$reg->nombreUnidad,
                "4"=>$reg->fecha_hora,
                "5"=>$reg->nota,
 				"6"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
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

        
    case "selectAsignatura":
        require_once "../modelos/Asignatura.php";
        $asignatura=new Asignatura();

		$rspta = $asignatura->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idasignatura . '>' . $reg->clase . '</option>';
				}
	 break;
        
    case "selectUnidad":
        require_once "../modelos/Unidad.php";
        $unidad=new Unidad();

		$rspta = $unidad->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idunidad . '>' . $reg->nombreUnidad . '</option>';
				}
	 break;
        
 

        
    
                
        

}
?>