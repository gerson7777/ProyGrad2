<?php 
require_once "../modelos/Gprofesor.php";


$gprofesor=new Gprofesor();

$idgprofesor=isset($_POST["idgprofesor"])? limpiarCadena($_POST["idgprofesor"]):"";
$idgrado=isset($_POST["idgrado"])? limpiarCadena($_POST["idgrado"]):"";
$idcatedratico=isset($_POST["idcatedratico"])? limpiarCadena($_POST["idcatedratico"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";


switch ($_GET["op"]){
        case 'guardaryeditar':
		if (empty($idgprofesor)){
			$rspta=$gprofesor->insertar($idgrado,$idcatedratico,$descripcion);
			echo $rspta ? "Grados & Profesores registrado" : "Grados & Profesores no se pudo registrar";
		}
		else {
			$rspta=$gprofesor->editar($idgprofesor,$idgrado,$idcatedratico,$descripcion);
			echo $rspta ? "Grados & Profesores actualizada" : "Grados & Profesores no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$gprofesor->desactivar($idgprofesor);
 		echo $rspta ? "Grados & Profesores Desactivada" : "Grados & Profesores no se puede desactivar";
	break;

	case 'activar':
		$rspta=$gprofesor->activar($idgprofesor);
 		echo $rspta ? "Grados & Profesores activada" : "Grados & Profesores no se puede activar";
	break;

	case 'mostrar':
		$rspta=$gprofesor->mostrar($idgprofesor);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$gprofesor->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			    "0"=> ($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idgprofesor.')"><i class="fa fa-edit"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idgprofesor.')"><i class="fa fa-close"></i></button>':
 			    '<button class="btn btn-warning" onclick="mostrar('.$reg->idgprofesor.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-primary" onclick="activar('.$reg->idgprofesor.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->nombreCatedratico,
                "3"=>$reg->descripcion,
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

        
	    case "selectGrado":
		require_once "../modelos/Grado.php";
		$grado = new Grado();

		$rspta = $grado->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idgrado . '>' . $reg->nombre . '</option>';
				}
	   break;

        
    case "selectCatedratico":
	    require_once "../modelos/Catedratico.php";
		$catedratico = new Catedratico();

		$rspta = $catedratico->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idcatedratico . '>' . $reg->nombreCatedratico . '</option>';
				}
	break;
        

}
?>