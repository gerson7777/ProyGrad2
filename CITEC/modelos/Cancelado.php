<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Cancelado
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($idalumno,$idmes, $estado)
    {
        $sql="INSERT INTO cancelado (idalumno,idmes,estado,condicion)
        VALUES ('$idalumno','$idmes','$estado','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idcancelado,$idalumno,$idmes, $estado)
    {
        $sql="UPDATE cancelado SET idalumno='$idalumno', idmes='$idmes', estado ='$estado' WHERE idcancelado='$idcancelado'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idcancelado)
    {
        $sql="UPDATE  cancelado SET condicion='0' WHERE idcancelado='$idcancelado'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idcancelado)
    {
        $sql="UPDATE cancelado SET condicion='1' WHERE idcancelado='$idcancelado'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idcancelado)
    {
        $sql="SELECT * FROM cancelado WHERE idcancelado='$idcancelado'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT c.idcancelado, c.idalumno, a.nombreAlumno, c.idmes,m.nombreMes, c.estado,c.fecha, c.condicion FROM mes m INNER JOIN cancelado c on m.idmes= c.idmes INNER JOIN alumno a on a.idalumno = c.idalumno where c.condicion=1;";
        
        
        
        return ejecutarConsulta($sql);      
    }
    //Implementar un método para listar los registros y mostrar en el select
    
     public function select()
    {
        $sql="SELECT * FROM cancelado where condicion=1";
        return ejecutarConsulta($sql);      
    }
    
}

?>