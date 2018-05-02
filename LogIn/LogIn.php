<?php
session_start();
    if(isset($_SESSION['loginuser'])){
        header('Location: ../Cover/Cover.html');
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

    <title>LogIn | CM</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">
  </head>

  <body class="text-center" background="../resources/loginBackground.jpg">
    <form class="form-signin" action="../PHP/LogIn.php" method="POST">
      <a href="../Cover/Cover.html"><img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72"></a>
      <h1 class="h3 mb-3 font-weight-normal">Ingresa a CM</h1>
      <label for="inputUser" class="sr-only">Usuario</label>
      <input type="text" id="inputUser" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <p class="messageAlert">
        <?php
            if(isset($_SESSION['loginuser']))
            echo $_SESSION['loginuser']; 
        ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
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
