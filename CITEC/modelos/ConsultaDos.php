<?php 

require "../config/Conexion.php";

Class ConsultaDos
{
    public function __construct()
    {

    }

    public function listar()
    {
        $sql="select asig.clase , CONCAT(a.nombreAlumno, ' ', a.apellido)as nombre,cal.idunidad as unidad,(SELECT CONVERT(cal.fecha_hora, DATE)) as fecha ,cal.nota from alumno a INNER JOIN calasignatura cal on a.idalumno = cal.idalumno INNER JOIN asignatura asig ON
asig.idasignatura = cal.idasignatura INNER JOIN unidad u on cal.idunidad= u.idunidad WHERE  cal.condicion = 1;";
        return ejecutarConsulta($sql);      
    }
    
    
   
    public function notasfechaalumno($fecha_inicio,$fecha_fin,$idalumno)
	{
		$sql="select asig.clase , CONCAT(a.nombreAlumno, ' ', a.apellido)as nombre,u.nombreUnidad as unidad,(SELECT CONVERT(cal.fecha_hora, DATE)) as fecha ,cal.nota from alumno a INNER JOIN calasignatura cal on a.idalumno = cal.idalumno INNER JOIN asignatura asig ON
asig.idasignatura = cal.idasignatura INNER JOIN unidad u on cal.idunidad= u.idunidad WHERE DATE(cal.fecha_hora)>='$fecha_inicio' and DATE(cal.fecha_hora)<='$fecha_fin' AND cal.idalumno = '$idalumno'";
		return ejecutarConsulta($sql);		
	}
    
    
     public function maestrogrados($idcatedratico,$idgrado)
	{
		$sql="select cat.nombreCatedratico, g.nombre as grado, asg.clase, d.nombre as dia, h.hora from catedratico cat inner JOIN casignatura casg on cat.idcatedratico = casg.idcatedratico 
INNER JOIN asignatura asg on casg.idasignatura = asg.idasignatura INNER JOIN grado g on g.idgrado = asg.idgrado
INNER JOIN dia d on asg.idasignatura = d.idasignatura INNER JOIN horario h on h.idhorario = d.idhorario 
WHERE cat.idcatedratico= '$idcatedratico' and  g.idgrado = '$idgrado' and cat.condicion=1 AND casg.condicion=1 
AND asg.condicion=1 AND g.condicion=1 AND d.condicion=1 AND d.condicion=1 AND h.condicion=1";
		return ejecutarConsulta($sql);		
	}
    
     public function notasunidad($usuario,$idunidad)
	{
		$sql="SELECT a.nombreAlumno as alumno, u.idunidad as unidad, asg.clase, cal.nota  from alumno a INNER JOIN calasignatura cal on a.idalumno = cal.idalumno INNER JOIN unidad u on cal.idunidad= u.idunidad INNER JOIN asignatura asg on cal.idasignatura = asg.idasignatura WHERE a.usuario='$usuario' and u.idunidad='$idunidad' and a.condicion=1 AND cal.condicion=1 AND u.condicion=1 AND asg.condicion=1;";
		return ejecutarConsulta($sql);		
	}
    
    
     public function clasesdia($nombre,$idgrado)
	{
		$sql=" SELECT  cat.nombreCatedratico,g.nombre as grado ,asg.clase, d.nombre, h.hora FROM  asignatura asg 
INNER JOIN dia d on asg.idasignatura = d.idasignatura 
INNER JOIN horario h on h.idhorario = d.idhorario 
INNER JOIN grado g on g.idgrado= asg.idgrado 
INNER JOIN gprofesor gp on g.idgrado = gp.idgrado 
INNER JOIN catedratico cat on cat.idcatedratico = gp.idcatedratico 

WHERE asg.condicion=1 AND d.condicion=1 and h.condicion=1 AND g.condicion=1 AND gp.condicion=1 AND cat.condicion=1 AND d.nombre= '$nombre' AND g.idgrado= '$idgrado';";
		return ejecutarConsulta($sql);		
	}
    
       public function horariosxgrado($idgrado)
	{
		$sql="SELECT d.nombre as dia, h.hora, asig.clase, g.nombre as grado , cat.nombreCatedratico from dia d INNER JOIN horario h on d.idhorario = h.idhorario INNER JOIN asignatura asig on asig.idasignatura = d.idasignatura INNER JOIN grado g on asig.idgrado = g.idgrado INNER JOIN casignatura cas on asig.idasignatura = cas.idasignatura INNER JOIN catedratico cat on cat.idcatedratico = cas.idcatedratico
 WHERE d.condicion=1 AND h.condicion =1 AND asig.condicion=1 AND g.condicion=1 AND cat.condicion=1 AND g.idgrado ='$idgrado'
 ORDER BY cat.idcatedratico;";
		return ejecutarConsulta($sql);		
	}
    
     public function pagos($usuario)
	{
		$sql="SELECT a.nombreAlumno,m.nombreMes, c.estado FROM alumno a INNER JOIN cancelado c on a.idalumno = c.idalumno INNER JOIN mes m on m.idmes = c.idmes
WHERE a.usuario='$usuario' AND  a.condicion=1 AND  c.condicion=1;";
		return ejecutarConsulta($sql);		
	}
    
    
   

    
    
    
    

  
}

?>







