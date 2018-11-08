<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Mes
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
     public function select()
    {
        $sql="SELECT * FROM MES";
        return ejecutarConsulta($sql);      
    }
    
}

?>
   

   
  