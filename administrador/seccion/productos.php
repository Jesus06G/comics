<?php include '../template/header.php'?>



<?php 
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtFile=(isset($_FILES['txtFile']['name']))?$_FILES['txtFile']['name']:"";
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

// Conexion a la base de datos.
include '../config/bd.php';


switch ($accion) {
  case 'añadir':


          $sentenciaSQL= $conexion ->prepare("INSERT INTO libros (nombre, imagen,precio) VALUES (:nombre,:imagen,:precio);");
          $sentenciaSQL ->bindParam(':nombre', $txtNombre);
          $sentenciaSQL ->bindParam(':precio', $txtPrecio);


          $fecha= new Datetime();
          $nombreArchivo=($txtFile!="")?$fecha->getTimestamp()."_".$_FILES['txtFile']['name']:"imagen.jpg";
          $tmpimagen=$_FILES['txtFile']['tmp_name'];
          if($tmpimagen!= ""){
            move_uploaded_file($tmpimagen, "../../img/" . $nombreArchivo);
          }
          $sentenciaSQL ->bindParam(':imagen', $nombreArchivo);
          $sentenciaSQL ->execute();
          header("location:productos.php");

          break;

  
case 'modificar':


          $sentenciaSQL= $conexion ->prepare("UPDATE libros SET nombre=:nombre,precio=:precio WHERE id=:id");
          $sentenciaSQL ->bindParam(':nombre', $txtNombre);
          $sentenciaSQL ->bindParam(':id', $txtID);
          $sentenciaSQL ->bindParam(':precio', $txtPrecio);

          $sentenciaSQL ->execute();

          if($txtFile != ""){
          $fecha= new Datetime();
          $nombreArchivo=($txtFile!="")?$fecha->getTimestamp()."_".$_FILES['txtFile']['name']:"imagen.jpg";
          $tmpimagen=$_FILES['txtFile']['tmp_name'];
          move_uploaded_file($tmpimagen, "../../img/" . $nombreArchivo);

          $sentenciaSQL= $conexion ->prepare("SELECT imagen FROM libros WHERE id=:id");
          $sentenciaSQL ->bindParam(':id', $txtID);
          $sentenciaSQL ->execute();
          $libro =$sentenciaSQL ->fetch(PDO::FETCH_LAZY);

          if(isset($libro["imagen"]) &&($libro["imagen"]!="imagen.jpg")){

          if(file_exists("../../img/". $libro["imagen"])){

          unlink("../../img/".$libro["imagen"]);}
          }

          $sentenciaSQL= $conexion ->prepare("UPDATE libros SET imagen=:imagen,precio=:precio WHERE id=:id");
          $sentenciaSQL ->bindParam(':imagen', $nombreArchivo);
          $sentenciaSQL ->bindParam(':id', $txtID);
          $sentenciaSQL ->bindParam(':precio', $txtPrecio);
          $sentenciaSQL ->execute();
          header("location:productos.php");

          }
          break;



  case 'cancelar':
    header("location:productos.php");
  break;



case 'seleccionar':


          $sentenciaSQL= $conexion ->prepare("SELECT * FROM libros WHERE id=:id");
          $sentenciaSQL ->bindParam(':id', $txtID);
          $sentenciaSQL ->execute();
          $libro =$sentenciaSQL ->fetch(PDO::FETCH_LAZY);
          $txtNombre=$libro['nombre'];
          $txtFile=$libro['imagen'];
          $txtPrecio=$libro['precio'];

          break;

          case 'ofertar':



case 'borrar':


          $sentenciaSQL= $conexion ->prepare("SELECT imagen FROM libros WHERE id=:id");
          $sentenciaSQL ->bindParam(':id', $txtID);
          $sentenciaSQL ->execute();
          $libro =$sentenciaSQL ->fetch(PDO::FETCH_LAZY);


          if(isset($libro["imagen"]) &&($libro["imagen"]!="imagen.jpg")){
          if(file_exists("../../img/". $libro["imagen"])){
          unlink("../../img/".$libro["imagen"]);}
          }

          $sentenciaSQL= $conexion ->prepare("DELETE FROM libros WHERE id=:id");
          $sentenciaSQL ->bindParam(':id', $txtID);
          $sentenciaSQL ->execute();
          header("location:productos.php");

          break;
          }





$sentenciaSQL= $conexion ->prepare("SELECT * FROM libros");
$sentenciaSQL ->execute();
$listalibros =$sentenciaSQL ->fetchAll(PDO::FETCH_ASSOC);
?>

            <div class="col-md-4">
            <div class="card">

            <div class="card-header">
                Datos de libro
            </div>

            <div class="card-body">
            <form method="post" enctype="multipart/form-data">


            <div class = "form-group">
            <label for="txtID"><h5>ID</h5></label>
            <input type="text" readonly required class="form-control" value="<?php echo $txtID;?>" name="txtID" id="txtID" placeholder="ID del libro">
            </div>

            <div class = "form-group">
            <label for="txtNombre"><h5>Nombre</h5></label>
            <input required type="text" class="form-control" value="<?php echo $txtNombre;?>" name="txtNombre" id="txtNombre" placeholder="Nombre del libro">
            </div>

            <div class="form-group">
            <label for="txtFile"><h5>Imagen:</h5></label>
            <br>

            <?php if($txtFile!=""){?>
            <img src="../../img/<?php echo $txtFile; ?>" width="100" alt="" class="img-thumbnail rounded">
            <?php }?>
            <br>
            <?php echo $txtFile;?>
            <input type="file"   class="form-control-file" name="txtFile" id="txtFile" placeholder="Imagen">
            </div>

            <div class = "form-group">
            <label for="txtNombre"><h5>Precio</h5></label>
            <input required type="text" class="form-control" value="<?php echo $txtPrecio;?>" name="txtPrecio" id="txtNombre" placeholder="Precio del libro">
            </div>
 
          <div class="btn-group" role="group" aria-label="">
            <button type="submit" name="accion" <?php echo ($accion=="seleccionar")?"disabled":"";?>  value="añadir" class="btn btn-success">Añadir</button>

            <button type="submit" name="accion" <?php echo ($accion!="seleccionar")?"disabled":"";?> value="modificar" class="btn btn-warning">Modificar</button>

            <button type="submit" name= "accion" <?php echo ($accion!="seleccionar")?"disabled":"";?> value="cancelar" class="btn btn-danger">Cancelar</button>
          </div>
          </form>


          </div>
          </div>


          </div>

 <!-- Tabla -->

              <div class="col-md-8">
              
              <a class="btn btn-danger " target="_blank" href="reportes.php"><i class="fa-solid fa-share-from-square"></i>PDF</a>
              

              <table class="table table-bordered" id="tabla">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach( $listalibros as $libro) { ?>

                
                  <tr>
                    <td><?php echo $libro['id']; ?></td>
                    <td><?php echo $libro['nombre']; ?></td>
                    <td><img src="../../img/<?php echo $libro['imagen']; ?>" width="100" alt="" class="img-thumbnail rounded"></td>
                    <td><?php echo $libro['precio']; ?></td>


                    <td>
                
                      
                    <form method="post">

                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $libro['id']; ?>">

                    <input type="submit" name="accion" value="seleccionar" class="btn btn-primary"> 

                    <input type="submit" name="accion" value="borrar" class="btn btn-danger"> 

                  </form>
                  
                  
                  </td>
                



                  </tr>
                <?php } ?>
                </tbody>
              </table>
              </div>

            <script>
              var tabla=document.querySelector("#tabla");
              var dataTable = new DataTable(tabla);
            </script>
              <?php include '../template/footer.php'?>