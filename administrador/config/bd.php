<?php 
// Conexion a la base de datos.
$host="localhost";
$bd="libros";
$usuario="root";
$contrasenia="";

try {
 $conexion= new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
} catch (Exception $ex) {
 echo $ex ->getMessage();
}



?>