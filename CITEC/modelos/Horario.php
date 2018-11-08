<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Horario
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($hora)
    {
        $sql="INSERT INTO horario (hora,condicion)
        VALUES ('$hora','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idhorario,$hora)
    {
        $sql="UPDATE horario SET hora='$hora' WHERE idhorario='$idhorario'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idhorario)
    {
        $sql="UPDATE horario SET condicion='0' WHERE idhorario='$idhorario'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idhorario)
    {
        $sql="UPDATE horario SET condicion='1' WHERE idhorario='$idhorario'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idhorario)
    {
        $sql="SELECT * FROM horario WHERE idhorario='$idhorario'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT * FROM horario";
        return ejecutarConsulta($sql);      
    }
    //Implementar un método para listar los registros y mostrar en el select
    public function select()
    {
        $sql="SELECT * FROM horario where condicion=1";
        return ejecutarConsulta($sql);      
    }
}

?>