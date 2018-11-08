<?php 

require "../config/Conexion.php";

Class ConsultaUno
{
    public function __construct()
    {

    }

    public function listar()
    {
        $sql="SELECT d.nombre as dia, h.hora, asig.clase, g.nombre as grado , cat.nombreCatedratico from dia d INNER JOIN horario h on d.idhorario = h.idhorario INNER JOIN asignatura asig on asig.idasignatura = d.idasignatura INNER JOIN grado g on asig.idgrado = g.idgrado INNER JOIN casignatura cas on asig.idasignatura = cas.idasignatura INNER JOIN catedratico cat on cat.idcatedratico = cas.idcatedratico
 WHERE d.condicion=1 AND h.condicion =1 AND asig.condicion=1 AND g.condicion=1 AND cat.condicion=1
 ORDER BY cat.idcatedratico;";
        return ejecutarConsulta($sql);      
    }
  
}

?>