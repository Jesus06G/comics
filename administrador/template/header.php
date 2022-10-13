<?php session_start();
if(!isset($_SESSION['usuario'])){
header("location:../index.php/");
}
else{
  if($_SESSION['usuario']=="ok"){
    $nombreUsuario=$_SESSION["nombreUsuario"];
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- DATATABLES -->



<link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

<script src="https://kit.fontawesome.com/634962e990.js" crossorigin="anonymous"></script>




    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
 <nav class="navbar navbar-expand navbar-light bg-light">
     <div class="nav navbar-nav">
         <a class="nav-item nav-link active" href="#">Administrador del sitio web</a>

         <a class="nav-item nav-link" href="inicio.php">Inicio</a>

         <a class="nav-item nav-link" href="/seccion/productos.php">Administar libros</a>

         <a class="nav-item nav-link" href="/seccion/cerrar.php">Cerrar sesion</a>

         <a class="nav-item nav-link" href="https://sitecomics-app.herokuapp.com/">Ver sitio web</a>
     </div>
 </nav>

<div class="container">
  <br>
  <div class="row">