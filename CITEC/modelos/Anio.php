<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Anio
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($nombreAnio)
    {
        $sql="INSERT INTO anio (nombreAnio,condicion)
        VALUES ('$nombreAnio','1')";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idanio,$nombreAnio)
    {
        $sql="UPDATE anio SET nombreAnio='$nombreAnio' WHERE idanio='$idanio'";
            
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idanio)
    {
        $sql="UPDATE anio SET condicion='0' WHERE idanio='$idanio'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idanio)
    {
        $sql="UPDATE anio SET condicion='1' WHERE idanio='$idanio'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idanio)
    {
        $sql="SELECT * FROM anio WHERE idanio='$idanio'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT * FROM anio";
        return ejecutarConsulta($sql);      
    }
    
    
    
     public function listaruno()
    {
        $sql="select d.nombre as dia, h.hora, asig.clase, g.nombre as grado, c.nombreCatedratico from dia d INNER JOIN horario h on d.idhorario = h.idhorario INNER JOIN asignatura asig on asig.idasignatura = d.idasignatura
        INNER JOIN grado g on asig.idgrado = g.idgrado INNER JOIN gprofesor gp on gp.idgrado = g.idgrado INNER JOIN catedratico c on c.idcatedratico = gp.idcatedratico where asig.condicion = '1';";
        return ejecutarConsulta($sql);      
    }
    
    
    //Implementar un método para listar los registros y mostrar en el select
    public function select()
    {
        $sql="SELECT * FROM anio where condicion=1";
        return ejecutarConsulta($sql);      
    }
}

?>