<?php
require "../config/Conexion.php";

$usuario=$_REQUEST['usuario'];
$clave=$_REQUEST['clave'];

$conexion = new PDO(NEXION,DB_USERNAME,DB_PASSWORD);
$res=$conexion->query("select idalumno,nombreAlumno,usuario,clave from alumno where usuario = '$usuario' and clave='$clave'");


$datos=array();

foreach($res as $row){
    $datos[]=$row;
}


echo json_encode($datos);

?>