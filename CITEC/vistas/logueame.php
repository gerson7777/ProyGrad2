<?php

session_start();
$connect = mysqli_connect("localhost","root","","citec");

if(isset($_POST["usuario"]) && isset($_POST["clave"])){
   
  $usuario = mysqli_real_escape_string($connect, $_POST["usuario"]);
  $clave= mysqli_real_escape_string($connect, $_POST["clave"]);
 
  $sql = "SELECT usuario FROM catedratico WHERE (usuario='$usuario' OR correo='$usuario') AND clave='$clave';";
  $result = mysqli_query($connect, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $_SESSION["usuario"] = $data["usuario"];
    echo "1";
  } else {
    echo "error";
  }
} else {
  echo "error";
}

?>
