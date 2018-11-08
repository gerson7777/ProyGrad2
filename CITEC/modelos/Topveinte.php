<?php 

require "../config/Conexion.php";

Class Topveinte
{
    public function __construct()
    {

    }

    public function listar()
    {
        $sql="select a.nombreAlumno as alumno, sum(cal.nota)/COUNT(cal.nota) as promedio from calasignatura cal INNER JOIN alumno a on a.idalumno= cal.idalumno WHERE a.condicion=1 AND cal.condicion=1 GROUP BY a.idalumno ORDER BY `promedio` DESC LIMIT 20;";
        return ejecutarConsulta($sql);      
    }
  
}

?>