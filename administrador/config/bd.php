<?php 
// Conexion a la base de datos.
$host="bpil1fpdcjy6d0cdccsl-mysql.services.clever-cloud.com";
$bd="bpil1fpdcjy6d0cdccsl";
$usuario="u8opfga0q4ahsh24";
$contrasenia="htwMZONzxJhhMFpSA9AJ";

try {
 $conexion= new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
} catch (Exception $ex) {
 echo $ex ->getMessage();
}



?>