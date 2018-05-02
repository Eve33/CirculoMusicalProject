<?php
    include '../PHP/ConsultSolic.php';

    if(!isset($_SESSION['loginuser'])){
        header('Location: ../LogIn/LogIn.php');
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

    <title>CLIENT REQUEST | CM</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="clientStyle.css" rel="stylesheet">
    <link href="grid.css" rel="stylesheet">

  </head>

  <body class="text-center">
  <nav class="navbar navbar-expand-md navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li>
            <img src="../resources/userImage.jpg">
          </li>
          <li class="nav-item">
            <p class="nav-link nameUser">
              <?php
                      echo "Bienvenido ". "<b>{$_SESSION['loginuser']}</b>";
                  ?>
            </p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../UserClient/ClientSolic.php">CLIENT Solicitudes</a>
          </li>
        </ul>
        <a class="btn btn-sm  btn-primary btnLogin" href="../PHP/DBCloseConexion.php">Cerrar Sesión</a>
      </div>
    </nav>

    <form class="form-signin" action="../PHP/InsertSolic.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Crear Solicitud</h1>
      <select id="inputUser" name="asuntoSolic" class="form-control" required autofocus>
        <option value="Evento">Evento</option>
        <option value="Renta">Renta</option>
        <option value="Compra">Compra</option>
      </select>
      <label for="inputUser" class="sr-only">Descripción</label>
      <textarea class="form-control" name="descSolic" rows="3" placeholder="Descripción Producto" required></textarea>
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['insertSolic']))
                  echo $_SESSION['insertSolic'];
                  unset($_SESSION['insertSolic']);
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar Solicitud</button>
      <p class="mt-5 mb-3 text-muted">El tiempo de respuesta de nuestra empresa para validar tu solicitud es de maximo 36hrs. Si no has recibido un correo o una llamada para confirmar tu solicitud, <a href="../Contact/Contact.html">Contáctanos</a> &copy; 2018-2019</p>
    </form>

    <div class="table-consult">
      <h3>Historial Solicitudes </h3>
      <p>Esta tabla te permitirá contar con un historial de solicitudes que respalde tu contrato en linea como físico.</p>
      <div class="row">
        <div class="col-md-2 headerTableA">ID Solicitud</div>   
        <div class="col-md-2 headerTableA">Fecha</div>   
        <div class="col-md-2 headerTableA">Asunto</div>
        <div class="col-md-2 headerTableA">Descripción</div>
        <div class="col-md-2 headerTableA">Estado</div>
      </div>
      <?php
        while($s = $consultS->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-md-2">'.$s['idSolicitud'].'</div> <div class="col-md-2">'.$s['fecha'].'</div> <div class="col-md-2">'.$s['asunto'].'</div> <div class="col-md-2">'.$s['descripcion'].'</div> <div class="col-md-2">'.$s['estado'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>

    <main role="main">
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <!-- FOOTER -->
      <footer class="container">
        <p>&copy; 2018-2019 Company, Inc. &middot;
          <a href="#">Privacy</a> &middot;
          <a href="#">Terms</a>
        </p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap/assets/js/vendor/holder.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../bootstrap/assets/js/vendor/holder.min.js"></script>
  </body>

  </html>