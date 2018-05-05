<?php
 session_start();
  if(isset($_SESSION['loginuser']))
  {
      if($_SESSION['logintype']=='Admin')
      {
          header('Location: ../UserAdmin/AdminArtist.php');
      }
      else{
        header('Location: ../UserClient/ClientSolic.php');
      }
  }
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../resources/iconCM.png">

    <title>Sign Up | CM</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signup.css" rel="stylesheet">
  </head>

  <body class="text-center" background="../resources/signupBackground.jpg">
    <form class="form-signin" action="../PHP/SignUp.php" method="POST">
      <a href="../Cover/Cover.html"><img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72"></a>
      <h1 class="h3 mb-3 font-weight-normal">Regístrate en CM</h1>   
      <h6>Nombre</h6>
      <input type="text" class="form-control" name="nombre" value="" placeholder="Nombre"required autofocus>
      <h6>Apelido Paterno</h6>
      <input type="text" class="form-control" name="apellidoPat" value="" placeholder="Apellido Paterno"required>
      <h6>Apelido Materno</h6>
      <input type="text" class="form-control" name="apellidoMat" value="" placeholder="Apellido Materno"required>
      <h6>Dirección</h6>
      <input type="text" class="form-control" name="direccion" value="" placeholder="Dirección"required>
      <h6>Teléfono</h6>
      <input type="text" class="form-control" name="telefono" value="" placeholder="Teléfono"required>
      <h6>Fecha Nacimiento</h6>
      <input type="date" class="form-control" name="fechaN" value="" placeholder="Fecha Nacimiento" required>
      <h6>Email</h6>
      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required>
      <h6>Usuario</h6>
      <input type="text" id="inputUser" class="form-control" name="usuario" placeholder="Usuario" required>
      <h6>Password</h6>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" required value="temrs-conditions"> Aceptar terminos y condiciones.
        </label>
      </div>
      <p class="messageAlert">
          <?php
              if(isset($_SESSION['signinuser'])){
                  echo $_SESSION['signinuser'];
                  unset($_SESSION['signinuser']);
              }            
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap/assets/js/vendor/holder.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>
