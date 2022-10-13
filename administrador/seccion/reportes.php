<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  


<?php // Conexion a la base de datos.
include '../config/bd.php';

$sentenciaSQL= $conexion ->prepare("SELECT * FROM libros");
$sentenciaSQL ->execute();
$listalibros =$sentenciaSQL ->fetchAll(PDO::FETCH_ASSOC);
?>


<table class="table table-bordered" id="tabla">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach( $listalibros as $libro) { ?>

                
                  <tr>
                    <td><?php echo $libro['id']; ?></td>
                    <td><?php echo $libro['nombre']; ?></td>
                    <td><img src="../../img/<?php echo $libro['imagen']; ?>" width="300" alt="" class="img-thumbnail rounded"></td>


                



                  </tr>
                <?php } ?>
                </tbody>
              </table>

              </body>
</html>
<?php 
$html=ob_get_clean();

require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf= new Dompdf();

$options= $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
// $dompdf->setPaper("A4", "landscape");

$dompdf->render();
$dompdf->stream("", array("Attachment" =>false));


?>