<?php 
session_start();

if ($_POST){
  if(($_POST['usuario']=="Jesus G")&&($_POST['contraseña']=="123456")){
    $_SESSION['usuario']="ok";
    $_SESSION['nombreUsuario']='JesusG';
  
    header('location:inicio.php');
  }
  else{
    $mensaje= "Error!" ."<br>". "Los datos ingresados son incorrectos.";
  }


}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
<div class="container">
  <div class="row">

  <div class="col-md-4">
  </div>
  
    <div class="col-md-4">
    <br>
      <div class="card">
        <div class="card-header">
          <h4>Login</h4>
        </div>
        <div class="card-body">

        <?php if(isset($mensaje)){?>
<div class="alert alert-danger" role="alert">
  <?php echo $mensaje;?>
  </div>
  <?php }?>


          <form method="post"  >
          <div class = "form-group">
          <label>Usuario</label>
          <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Ingresar usuario">
          </div>


          <div class="form-group">
          <label>Contraseña</label>
          <input type="password" class="form-control" name="contraseña" placeholder="Ingresar contraseña">
          </div>

          <button type="submit" class="btn btn-primary">Ingresar</button>
          </form>
          
          
        </div>
      </div>
      
    </div>
    
  </div>
</div>

    
  </body>
</html>