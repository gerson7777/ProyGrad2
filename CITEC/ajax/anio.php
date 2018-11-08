<?php 
require_once "../modelos/Anio.php";

$anio=new Anio();

$idanio=isset($_POST["idanio"])? limpiarCadena($_POST["idanio"]):"";
$nombreAnio=isset($_POST["nombreAnio"])? limpiarCadena($_POST["nombreAnio"]):"";


switch ($_GET["op"]){
		case 'guardaryeditar':
		if (empty($idanio)){
			$rspta=$anio->insertar($nombreAnio);
			echo $rspta ? "Año registrado" : "Año no se pudo registrar";
		}
		else {
			$rspta=$anio->editar($idanio,$nombreAnio);
			echo $rspta ? "Año actualizado" : "Año no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$anio->desactivar($idanio);
 		echo $rspta ? "Año Desactivado" : "Año no se puede desactivar";
	break;

	case 'activar':
		$rspta=$anio->activar($idanio);
 		echo $rspta ? "Año activado" : "Año no se puede activar";
	break;

	case 'mostrar':
		$rspta=$anio->mostrar($idanio);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$anio->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			    "0"=> ($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idanio.')"><i class="	fa fa-edit"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idanio.')"><i class="fa fa-close"></i></button>':
 			    '<button class="btn btn-warning" onclick="mostrar('.$reg->idanio.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-primary" onclick="activar('.$reg->idanio.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombreAnio,
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
        
        
    	case 'listaruno':
		$rspta=$anio->listaruno();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
                "0"=>$reg->dia,
                "1"=>$reg->hora,
                "2"=>$reg->clase,
 				"3"=>$reg->grado,
                "4"=>$reg->nombreCatedratico,
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