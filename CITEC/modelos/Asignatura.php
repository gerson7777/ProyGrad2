<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Asignatura
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($idgrado, $clase)
    {
        $sql="INSERT INTO asignatura (idgrado,clase,condicion)
        VALUES ('$idgrado', '$clase','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idasignatura,$idgrado, $clase)
    {
        $sql="UPDATE asignatura SET idgrado='$idgrado', clase='$clase' WHERE idasignatura='$idasignatura'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idasignatura)
    {
        $sql="UPDATE  asignatura SET condicion='0' WHERE idasignatura='$idasignatura'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idasignatura)
    {
        $sql="UPDATE asignatura SET condicion='1' WHERE idasignatura='$idasignatura'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idasignatura)
    {
        $sql="SELECT * FROM asignatura WHERE idasignatura='$idasignatura'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
       
        
         $sql="SELECT a.idasignatura, a.idgrado, g.nombre as grado,a.clase, a.condicion FROM asignatura a INNER JOIN grado g ON a.idgrado = g.idgrado;";
        
        
        return ejecutarConsulta($sql);      
    }
    //Implementar un método para listar los registros y mostrar en el select
    
    public function select()
    {
        $sql="SELECT * FROM Asignatura where condicion=1";
        return ejecutarConsulta($sql);      
    }
 
}

?>