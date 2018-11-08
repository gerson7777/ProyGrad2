<?php
session_start();
if(!isset($_SESSION["usuario"])){
  header("location:login.php");
}


require 'header.php';
?>



<div class="embed-responsive embed-responsive-4by3">>
    <embed class="embed-responsive-item" src="../public/img/Fase1.pdf" width="700" height="500">
    
</div>







<?php
require 'footer.php';
?>