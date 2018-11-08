<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class GProfesor
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($idgrado,$idcatedratico,$descripcion)
    {
        $sql="INSERT INTO gprofesor (idgrado,idcatedratico,descripcion,condicion)
        VALUES ('$idgrado','$idcatedratico','$descripcion','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idgprofesor,$idgrado,$idcatedratico,$descripcion)
    {
        $sql="UPDATE gprofesor SET idgrado='$idgrado', idcatedratico='$idcatedratico', descripcion='$descripcion' WHERE idgprofesor='$idgprofesor'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idgprofesor)
    {
        $sql="UPDATE  gprofesor SET condicion='0' WHERE idgprofesor='$idgprofesor'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idgprofesor)
    {
        $sql="UPDATE gprofesor SET condicion='1' WHERE idgprofesor='$idgprofesor'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idgprofesor)
    {
        $sql="SELECT * FROM gprofesor WHERE idgprofesor='$idgprofesor'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="select gp.idgprofesor, gp.idgrado, g.nombre, gp.idcatedratico, c.nombreCatedratico , gp.descripcion, gp.condicion from grado g inner JOIN gprofesor gp on g.idgrado = gp.idgrado INNER JOIN catedratico c on gp.idcatedratico = c.idcatedratico;";
        
        return ejecutarConsulta($sql);      
    }
    //Implementar un método para listar los registros y mostrar en el select
    
     public function select()
    {
        $sql="SELECT * FROM gprofesor where condicion=1";
        return ejecutarConsulta($sql);      
    }
    
}

?>