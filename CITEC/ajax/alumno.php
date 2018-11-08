<?php 
require_once "../modelos/Alumno.php";

$alumno=new Alumno();

$idalumno=isset($_POST["idalumno"])? limpiarCadena($_POST["idalumno"]):"";
$idanio=isset($_POST["idanio"])? limpiarCadena($_POST["idanio"]):"";
$idgrado=isset($_POST["idgrado"])? limpiarCadena($_POST["idgrado"]):"";
$nombreAlumno=isset($_POST["nombreAlumno"])? limpiarCadena($_POST["nombreAlumno"]):"";
$apellido=isset($_POST["apellido"])? limpiarCadena($_POST["apellido"]):"";
$sexo=isset($_POST["sexo"])? limpiarCadena($_POST["sexo"]):"";
$tel=isset($_POST["tel"])? limpiarCadena($_POST["tel"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$usuario=isset($_POST["usuario"])? limpiarCadena($_POST["usuario"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";


switch ($_GET["op"]){
		case 'guardaryeditar':
        
        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else 
		{
			$ext = explode(".", $_FILES["imagen"]["name"]);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
			{
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/articulos/" . $imagen);
			}
		}
        
		if (empty($idalumno)){
			$rspta=$alumno->insertar($idanio,$idgrado,$nombreAlumno,$apellido,$sexo,$tel,$direccion,$usuario,$clave,$imagen);
			echo $rspta ? "Alumno registrado" : "Alumno no se pudo registrar";
		}
		else {
			$rspta=$alumno->editar($idalumno,$idanio,$idgrado,$nombreAlumno,$apellido,$sexo,$tel,$direccion,$usuario,$clave,$imagen);
			echo $rspta ? "Alumno actualizado" : "Alumno no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$alumno->desactivar($idalumno);
 		echo $rspta ? "Alumno Desactivado" : "Alumno no se puede desactivar";
	break;

	case 'activar':
		$rspta=$alumno->activar($idalumno);
 		echo $rspta ? "Alumno activado" : "Alumno no se puede activar";
	break;

	case 'mostrar':
		$rspta=$alumno->mostrar($idalumno);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$alumno->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			     "0"=> ($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idalumno.')"><i class="	fa fa-edit"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idalumno.')"><i class="fa fa-close"></i></button>':
 			    '<button class="btn btn-warning" onclick="mostrar('.$reg->idalumno.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-primary" onclick="activar('.$reg->idalumno.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombreAnio,
                "2"=>$reg->nombre,
 				"3"=>$reg->nombreAlumno,
                "4"=>$reg->apellido,
                "5"=>$reg->sexo,
                "6"=>$reg->tel,
                "7"=>$reg->direccion,
                "8"=>$reg->usuario,
                "9"=>$reg->clave,
                "10"=>"<img src='../files/articulos/".$reg->imagen."' height='30px' width='30px' >",
 				"11"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
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
        
        
         case "selectAnio":
		require_once "../modelos/Anio.php";
		$anio = new Anio();

		$rspta = $anio->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idanio . '>' . $reg->nombreAnio . '</option>';
				}
	   break;     
        
        
        
    
}
?>