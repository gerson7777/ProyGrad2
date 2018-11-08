<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Calasignatura
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($idasignatura,$idalumno,$idunidad, $fecha_hora,$nota)
    {
        $sql="INSERT INTO calasignatura (idasignatura,idalumno,idunidad,fecha_hora,nota,condicion)
        VALUES ('$idasignatura','$idalumno','$idunidad','$fecha_hora','$nota','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idcalasignatura,$idasignatura,$idalumno,$idunidad, $fecha_hora,$nota)
    {
        $sql="UPDATE calasignatura SET  idcalasignatura='$idcalasignatura',idasignatura='$idasignatura', idalumno='$idalumno',idunidad='$idunidad', fecha_hora ='$fecha_hora',nota='$nota' WHERE idcalasignatura='$idcalasignatura'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idcalasignatura)
    {
        $sql="UPDATE  calasignatura SET condicion='0' WHERE idcalasignatura='$idcalasignatura'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idcalasignatura)
    {
        $sql="UPDATE calasignatura SET condicion='1' WHERE idcalasignatura='$idcalasignatura'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idcalasignatura)
    {
        $sql="SELECT * FROM calasignatura WHERE idcalasignatura='$idcalasignatura'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="select cal.idcalasignatura,  cal.idasignatura, asig.clase ,cal.idalumno, a.nombreAlumno,cal.idunidad, u.nombreUnidad, cal.fecha_hora,cal.nota, cal.condicion from alumno a INNER JOIN calasignatura cal on a.idalumno = cal.idalumno INNER JOIN asignatura asig ON
asig.idasignatura = cal.idasignatura INNER JOIN unidad u on cal.idunidad= u.idunidad;";
        
        
        
        return ejecutarConsulta($sql);      
    }
    //Implementar un método para listar los registros y mostrar en el select
    
     public function select()
    {
        $sql="SELECT * FROM calasignatura where condicion=1";
        return ejecutarConsulta($sql);      
    }
    
}

?>