<?php include 'template/barra.php'?>
<?php include 'administrador/config/bd.php';?>

<?php $sentenciaSQL= $conexion ->prepare("SELECT * FROM `libros`");
$sentenciaSQL ->execute();
$listalibros =$sentenciaSQL ->fetchAll(PDO::FETCH_ASSOC);
?>
  
<div class="bg-dark bg-primary">
  <div class="container bg-dark bg-primary" >
    <div class="row">  
      <div class="p-1"></div>
    <?php foreach ($listalibros as $libro) { ?>

      <div class="col-md-2"  onclick="añadirLibro(<?php echo $libro['id'] ?>)" >
      <br>
        <div class="card " style="cursor: pointer;" id="contenedor" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img class="img-fluid card-img-top" src="img/<?php echo $libro['imagen'] ?>" alt="">
          <div class="card-body d-inline ">
            <div class="row">

            <h5 class="card-title text-center">$<?php echo number_format($libro['precio']) ?></h5>

          </div>
          </div>
        </div>

      </div>
      
      <div class="card d-none" id="<?php echo $libro['id'] ?>">
        <img class="img-fluid w-50 m-auto p-1 rounded" src="img/<?php echo $libro['imagen'] ?>" alt="">
        <h5 class="text-start p-1 d-none" id="nombre<?php echo $libro['id'] ?>"><?php echo $libro['nombre']  ?></h5>
        <h5 class="text-center p-1">$<?php echo number_format($libro['precio'])  ?></h5>
      </div>


      <div class="modal" style="cursor: pointer;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" onclick="borrarLibro(<?php echo $libro['id'] ?>)">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tittle"></h5>
              <button onclick="borrarLibro(<?php echo $libro['id'] ?>)" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">
            
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
  </div>
</div>
<?php include 'template/footer.php' ?>
<script src="js/main.js"></script>


