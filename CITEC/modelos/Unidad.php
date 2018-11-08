<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Unidad
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

   
    //Implementar un método para listar los registros y mostrar en el select
    public function select()
    {
        $sql="SELECT * FROM Unidad where condicion=1";
        return ejecutarConsulta($sql);      
    }
}

?>