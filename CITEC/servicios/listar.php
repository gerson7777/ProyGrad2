<?php
$usuario = filter_input(INPUT_POST, "usuario");
$clave = filter_input(INPUT_POST, "clave");



$mysqli = new mysqli("localhost","root","","citec");
$result = mysqli_query($mysqli, "select * from alumno where usuario = '".$usuario."' and
clave = '".$clave."'");
if($data = mysqli_fetch_array($result)){
     echo '1';

}

?>