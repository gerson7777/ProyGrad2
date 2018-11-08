<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Alumno
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($idanio,$idgrado,$nombreAlumno,$apellido,$sexo,$tel,$direccion,$usuario,$clave,$imagen)
    {
        $sql="INSERT INTO alumno (idanio,idgrado,nombreAlumno,apellido,sexo,tel,direccion,usuario,clave,imagen,condicion)
        VALUES ('$idanio','$idgrado','$nombreAlumno','$apellido','$sexo','$tel','$direccion','$usuario','$clave','$imagen','1')";
        return ejecutarConsulta($sql);
        
    }

    //Implementamos un método para editar registros
    public function editar($idalumno,$idanio,$idgrado,$nombreAlumno,$apellido,$sexo,$tel,$direccion,$usuario,$clave,$imagen)
    {
        $sql="UPDATE alumno SET idanio='$idanio', idgrado='$idgrado',nombreAlumno='$nombreAlumno',apellido='$apellido',sexo = '$sexo', tel='$tel', direccion='$direccion', usuario ='$usuario', clave = '$clave', imagen='$imagen' WHERE idalumno='$idalumno'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idalumno)
    {
        $sql="UPDATE alumno SET condicion='0' WHERE idalumno='$idalumno'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idalumno)
    {
        $sql="UPDATE alumno SET condicion='1' WHERE idalumno='$idalumno'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idalumno)
    {
        $sql="SELECT * FROM alumno WHERE idalumno='$idalumno'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT a.idalumno, a.idanio, an.nombreAnio, a.idgrado, g.nombre, a.nombreAlumno, a.apellido, a.sexo, a.tel, a.direccion, a.usuario, a.clave, a.imagen,a.condicion FROM alumno a inner JOIN grado g on a.idgrado = g.idgrado INNER JOIN anio an on a.idanio= an.idanio;";
        return ejecutarConsulta($sql);      
    }
    //Implementar un método para listar los registros y mostrar en el select
    public function select()
    {
        $sql="SELECT * FROM alumno where condicion=1";
        return ejecutarConsulta($sql);      
    }
}

?>




