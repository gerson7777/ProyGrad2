<?php 
require_once "../modelos/ConsultaDos.php";

$consultaDos=new ConsultaDos();


switch ($_GET["op"]){
		
	case 'listar':
		$rspta=$consultaDos->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->clase,
                "1"=>$reg->nombre,
                "2"=>$reg->unidad,
                "3"=>$reg->fecha,
                "4"=>$reg->nota
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
       
    case 'notasfechaalumno':
		$fecha_inicio=$_REQUEST["fecha_inicio"];
		$fecha_fin=$_REQUEST["fecha_fin"];
		$idalumno=$_REQUEST["idalumno"];

		$rspta=$consultaDos->notasfechaalumno($fecha_inicio,$fecha_fin,$idalumno);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->clase,
 				"1"=>$reg->nombre,
 				"2"=>$reg->unidad,
 				"3"=>$reg->fecha,
 				"4"=>$reg->nota
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

        
        
  case 'maestrogrados':
		$idcatedratico=$_REQUEST["idcatedratico"];
		$idgrado=$_REQUEST["idgrado"];
		

		$rspta=$consultaDos->maestrogrados($idcatedratico,$idgrado);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->nombreCatedratico,
 				"1"=>$reg->grado,
 				"2"=>$reg->clase,
 				"3"=>$reg->dia,
 				"4"=>$reg->hora
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
        
            
  case 'notasunidad':
		$usuario=$_REQUEST["usuario"];
		$idunidad=$_REQUEST["idunidad"];
		

		$rspta=$consultaDos->notasunidad($usuario,$idunidad);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->alumno,
 				"1"=>$reg->unidad,
 				"2"=>$reg->clase,
 				"3"=>$reg->nota
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
      case 'clasesdia':
		$nombre=$_REQUEST["nombre"];
		$idgrado=$_REQUEST["idgrado"];
		

		$rspta=$consultaDos->clasesdia($nombre,$idgrado);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->nombreCatedratico,
 				"1"=>$reg->grado,
 				"2"=>$reg->clase,
 				"3"=>$reg->nombre,
                "4"=>$reg->hora
                
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
        
        case 'horariosxgrado':
		$idgrado=$_REQUEST["idgrado"];
		

		$rspta=$consultaDos->horariosxgrado($idgrado);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->dia,
                "1"=>$reg->hora,
                "2"=>$reg->clase,
                "3"=>$reg->grado,
                "4"=>$reg->nombreCatedratico
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
        
        
               case 'pagos':
		$usuario=$_REQUEST["usuario"];
		

		$rspta=$consultaDos->pagos($usuario);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->nombreAlumno,
                "1"=>$reg->nombreMes,
                "2"=>$reg->estado
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