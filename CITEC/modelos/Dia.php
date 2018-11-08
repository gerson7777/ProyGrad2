<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Dia
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($idasignatura,$idhorario, $nombre)
    {
        $sql="INSERT INTO dia (idasignatura,idhorario,nombre,condicion)
        VALUES ('$idasignatura','$idhorario','$nombre','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($iddia,$idasignatura,$idhorario, $nombre)
    {
        $sql="UPDATE dia SET idasignatura='$idasignatura', idhorario='$idhorario', nombre ='$nombre' WHERE iddia='$iddia'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($iddia)
    {
        $sql="UPDATE  dia SET condicion='0' WHERE iddia='$iddia'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($iddia)
    {
        $sql="UPDATE dia SET condicion='1' WHERE iddia='$iddia'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($iddia)
    {
        $sql="SELECT * FROM dia WHERE iddia='$iddia'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="select d.iddia,d.idasignatura, a.clase, d.idhorario, h.hora as hora, d.nombre, d.condicion from asignatura a INNER JOIN dia d ON  a.idasignatura = d.idasignatura INNER JOIN horario h on d.idhorario = h.idhorario;";
        
        
        
        return ejecutarConsulta($sql);      
    }
    //Implementar un método para listar los registros y mostrar en el select
    
     public function select()
    {
        $sql="SELECT * FROM dia where condicion=1";
        return ejecutarConsulta($sql);      
    }
    
}

?>