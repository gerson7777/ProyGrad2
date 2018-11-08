
<?php 
require_once "../modelos/Catedratico.php";

$catedratico=new Catedratico();

$idcatedratico=isset($_POST["idcatedratico"])? limpiarCadena($_POST["idcatedratico"]):"";
$nombreCatedratico=isset($_POST["nombreCatedratico"])? limpiarCadena($_POST["nombreCatedratico"]):"";
$apellido=isset($_POST["apellido"])? limpiarCadena($_POST["apellido"]):"";
$correo=isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";
$dni=isset($_POST["dni"])? limpiarCadena($_POST["dni"]):"";
$profesion=isset($_POST["profesion"])? limpiarCadena($_POST["profesion"]):"";
$usuario=isset($_POST["usuario"])? limpiarCadena($_POST["usuario"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

switch ($_GET["op"]){
		case 'guardaryeditar':
        
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
        
		if (empty($idcatedratico)){
			$rspta=$catedratico->insertar($nombreCatedratico,$apellido,$correo,$dni,$profesion,$usuario,$clave,$imagen);
			echo $rspta ? "Catedrático registrado" : "No se pudieron registrar todos los campos";
		}
		else {
			$rspta=$catedratico->editar($idcatedratico,$nombreCatedratico,$apellido,$correo,$dni,$profesion,$usuario,$clave,$imagen);
			echo $rspta ? "Catedrático actualizado" : "Catedrático no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$catedratico->desactivar($idcatedratico);
 		echo $rspta ? "Catedrático Desactivado" : "Catedrático no se puede desactivar";
	break;

	case 'activar':
		$rspta=$catedratico->activar($idcatedratico);
 		echo $rspta ? "Catedrático activado" : "Catedrático no se puede activar";
	break;

	case 'mostrar':
		$rspta=$catedratico->mostrar($idcatedratico);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$catedratico->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 			    "0"=> ($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcatedratico.')"><i class="fa fa-edit"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idcatedratico.')"><i class="fa fa-close"></i></button>':
 			    '<button class="btn btn-warning" onclick="mostrar('.$reg->idcatedratico.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-primary" onclick="activar('.$reg->idcatedratico.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombreCatedratico,
 				"2"=>$reg->apellido,
                "3"=>$reg->correo,
                "4"=>$reg->dni,
                "5"=>$reg->profesion,
                "6"=>$reg->usuario,
                "7"=>"<img src='../files/articulos/".$reg->imagen."' height='30px' width='30px' >",
 				"8"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
    

    case 'verificar':
		$logina=$_POST['logina'];
	    $clavea=$_POST['clavea'];

	    //Hash SHA256 en la contraseña
		$clavehash=hash("SHA256",$clavea);

		$rspta=$catedratico->verificar($logina, $clavehash);

		$fetch=$rspta->fetch_object();

		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	        $_SESSION['idcatedratico']=$fetch->idcatedratico;
	        $_SESSION['nombreCatedratico']=$fetch->nombreCatedratico;
	        $_SESSION['usuario']=$fetch->usuario;


	    }
	    echo json_encode($fetch);
	break;

        
        
        
}
?>