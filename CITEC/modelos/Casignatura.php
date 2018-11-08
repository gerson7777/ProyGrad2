<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Casignatura
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($idcatedratico,$idasignatura)
    {
        $sql="INSERT INTO casignatura (idcatedratico,idasignatura,condicion)
        VALUES ('$idcatedratico','$idasignatura','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idcasignatura,$idcatedratico,$idasignatura)
    {
        $sql="UPDATE casignatura SET idcatedratico='$idcatedratico', idasignatura='$idasignatura' WHERE idcasignatura='$idcasignatura'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idcasignatura)
    {
        $sql="UPDATE  casignatura SET condicion='0' WHERE idcasignatura='$idcasignatura'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idcasignatura)
    {
        $sql="UPDATE casignatura SET condicion='1' WHERE idcasignatura='$idcasignatura'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idcasignatura)
    {
        $sql="SELECT * FROM casignatura WHERE idcasignatura='$idcasignatura'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT ca.idcasignatura, ca.idcatedratico, c.nombreCatedratico, ca.idasignatura, a.clase, ca.condicion from casignatura ca inner JOIN catedratico c on ca.idcatedratico = c.idcatedratico INNER JOIN asignatura a ON 
ca.idasignatura = a.idasignatura;";
        
        
        
        return ejecutarConsulta($sql);      
    }
    //Implementar un método para listar los registros y mostrar en el select
    
     public function select()
    {
        $sql="SELECT * FROM casignatura where condicion=1";
        return ejecutarConsulta($sql);      
    }
    
}

?>