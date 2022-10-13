<?php include 'template/barra.php'?>

  
<div class="bg-dark bg-primary">
<div class="container bg-dark bg-primary" >
  <div class="row" >





<?php
// Conexion a la base de datos.
include 'administrador/config/bd.php'; 


?>

<?php $sentenciaSQL= $conexion ->prepare("SELECT id,imagen, nombre, precio, descu, codigo FROM libros INNER JOIN oferta WHERE libros.id = oferta.codigo");
$sentenciaSQL ->execute();
$listalibros =$sentenciaSQL ->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($listalibros as $libro ) {?>

<div class="col-md-2 " style="">
<br>
  <div class="card ">

    <a href="" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <img class="card-img-top" src="./img/<?php echo $libro ['imagen']?>" alt="" >
    </a>
    <div class="card-body d-inline p-2">
<div class="row">
    <h5><strike class="text-muted "><?php echo "$" . number_format($libro['precio']) ?></strike></h5>
    <h5 class=""><?php echo "$" . number_format($libro['precio'] - $libro['descu']) ?></h5>
    </div>
    <!-- Button trigger modal -->

    <!-- <a href="" type="submit" class="btn btn-primary text-center d-grid" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Leer mas
    </a> -->

    </div>
  </div>

  <div class="card d-none" id="" >
      <img class="card-img-top" src="./img/<?php echo $libro ['imagen']?>" alt="" >
      <div class="card-body" id="card-body">

      <h5 class="card-title text-center"><?php echo "$" . number_format($libro['precio'])  ?></h5>
      </div> 
  </div> 
</div>


<!-- Modal -->  

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel"><?php echo $libro['nombre'] . "- Commic" ?></h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">

      <input type="hidden" name="id" value="<?php echo $libro['id']?>">

 
          <h5 class="card-title text-center"><?php echo "$" . number_format($libro['precio']) ?></h5>
          




</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>

</div>


<?php include 'template/footer.php' ?>

<script src="js/main.js"></script>


