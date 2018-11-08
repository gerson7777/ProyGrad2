<?php
require "../config/Conexion.php";

$usuario=$_REQUEST['usuario'];


$conexion = new PDO(NEXION,DB_USERNAME,DB_PASSWORD);
$res=$conexion->query("select a.usuario, u.idunidad, u.nombreUnidad from alumno a INNER JOIN calasignatura cal on a.idalumno = cal.idalumno INNER join unidad u 
on cal.idunidad = u.idunidad
WHERE usuario ='$usuario' 
GROUP by u.idunidad");


$datos=array();

foreach($res as $row){
    $datos[]=$row;
}


echo json_encode($datos);

?>