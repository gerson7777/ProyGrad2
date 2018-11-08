<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Grado
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($nombre,$seccion,$modalidad,$jornada)
    {
        $sql="INSERT INTO grado (nombre,seccion,modalidad,jornada,condicion)
        VALUES ('$nombre','$seccion','$modalidad','$jornada','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idgrado,$nombre,$seccion,$modalidad,$jornada)
    {
        $sql="UPDATE grado SET nombre='$nombre',seccion='$seccion', modalidad = '$modalidad', jornada='$jornada' WHERE idgrado='$idgrado'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idgrado)
    {
        $sql="UPDATE grado SET condicion='0' WHERE idgrado='$idgrado'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idgrado)
    {
        $sql="UPDATE grado SET condicion='1' WHERE idgrado='$idgrado'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idgrado)
    {
        $sql="SELECT * FROM grado WHERE idgrado='$idgrado'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT * FROM grado";
        return ejecutarConsulta($sql);      
    }
    //Implementar un método para listar los registros y mostrar en el select
    public function select()
    {
        $sql="SELECT * FROM grado where condicion=1";
        return ejecutarConsulta($sql);      
    }
}

?>