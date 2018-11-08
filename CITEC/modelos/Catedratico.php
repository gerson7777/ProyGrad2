<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Catedratico
{
    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($nombreCatedratico,$apellido,$correo,$dni,$profesion,$usuario,$clave,$imagen)
    {
        $sql="INSERT INTO catedratico (nombreCatedratico,apellido,correo,dni,profesion,usuario,clave,imagen,condicion)
        VALUES ('$nombreCatedratico','$apellido','$correo','$dni','$profesion','$usuario','$clave',$imagen,'1')";
        
          return ejecutarConsulta($sql);
    }

    //Implementamos un método para editar registros
    public function editar($idcatedratico,$nombreCatedratico,$apellido,$correo,$dni,$profesion,$usuario,$clave,$imagen)
    {
        $sql="UPDATE catedratico SET nombreCatedratico='$nombreCatedratico',apellido='$apellido',correo = '$correo', dni='$dni', profesion='$profesion', usuario='$usuario', clave='$clave' , imagen='$imagen' WHERE idcatedratico='$idcatedratico'";
     
        return ejecutarConsulta($sql);
        
    }

    //Implementamos un método para desactivar categorías
    public function desactivar($idcatedratico)
    {
        $sql="UPDATE catedratico SET condicion='0' WHERE idcatedratico='$idcatedratico'";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar categorías
    public function activar($idcatedratico)
    {
        $sql="UPDATE catedratico SET condicion='1' WHERE idcatedratico='$idcatedratico'";
        return ejecutarConsulta($sql);
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar($idcatedratico)
    {
        $sql="SELECT * FROM catedratico WHERE idcatedratico='$idcatedratico'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listar()
    {
        $sql="SELECT * FROM catedratico";
        return ejecutarConsulta($sql);      
    }
    //Implementar un método para listar los registros y mostrar en el select
    public function select()
    {
        $sql="SELECT * FROM catedratico where condicion=1";
        return ejecutarConsulta($sql);      
    }
    
    // acceso al sistema
    
   
    public function verificar($login,$clave)
    {
    	$sql="SELECT idcatedratico, nombreCatedratico,usuario from catedratico where usuario='$login' AND clave='$clave' AND condicion='1'"; 
    	return ejecutarConsulta($sql);  
    }
    
    
}

?>