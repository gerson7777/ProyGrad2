<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Queja
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($descripcion)
    {
        $sql="INSERT INTO queja (descripcion)
        VALUES ('$descripcion')";
        return ejecutarConsulta($sql);
    }

   

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idqueja)
    {
        $sql="SELECT * FROM queja WHERE idqueja='$idqueja'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT * FROM queja";
        return ejecutarConsulta($sql);      
    }
    
      
    
    //Implementar un método para listar los registros y mostrar en el select
    public function select()
    {
        $sql="SELECT * FROM queja where condicion=1";
        return ejecutarConsulta($sql);      
    }
}

?>