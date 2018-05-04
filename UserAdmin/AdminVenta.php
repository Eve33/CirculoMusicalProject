<?php
    include '../PHP/ConsultSolicVenta.php';

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

    <title>ADMIN VENTA | CM</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="adminStyle.css" rel="stylesheet">
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
          <li class="nav-item ">
            <a class="nav-link" href="../UserAdmin/AdminArtist.php">ADMIN Artistas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../UserAdmin/AdminProducts.php">ADMIN Productos</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../UserAdmin/AdminInvent.php">ADMIN Inventario</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../UserAdmin/AdminEvents.php">ADMIN Eventos</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../UserAdmin/AdminRenta.php">ADMIN Renta Productos</a>
          </li>
          <li class="nav-item active font-weight-bold">
            <a class="nav-link" href="../UserAdmin/AdminVenta.php">ADMIN Venta Productos</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../UserAdmin/AdminComents.php">ADMIN Coments Pub</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../UserAdmin/AdminDashboard.php">ADMIN Dashboard Ganancias</a>
          </li>
        </ul>
        <a class="btn btn-sm  btn-primary btnLogin" href="../PHP/DBCloseConexion.php">Cerrar Sesión</a>
      </div>
    </nav>

    <div class="table-consult">
      <h3>Solicitudes Clientes</h3>
      <p>Aquí estan las solicitudes de eventos de tus clientes, tomate un tiempo para darles respuesta.</p>
      <div class="row">
        <div class="col-md-2 headerTableA">ID Solicitud</div>
        <div class="col-md-2 headerTableA">Fecha</div>
        <div class="col-md-2 headerTableA">Asunto</div>
        <div class="col-md-2 headerTableA">Descripción</div>
        <div class="col-md-2 headerTableA">Estado</div>
      </div>
      <?php
        while($s = $consultSV->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-md-2">'.$s['idSolicitud'].'</div> <div class="col-md-2">'.$s['fecha'].'</div> <div class="col-md-2">'.$s['asunto'].'</div> <div class="col-md-2">'.$s['descripcion'].'</div> <div class="col-md-2">'.$s['estado'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>


  <form class="form-signin" action="../PHP/InsertVent.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Alta de Venta</h1>
      <label for="inputUser" class="sr-only">ID Solicitud</label>
      <select id="inputUser" name="idSolic" class="form-control" required autofocus>
        <?php
        while($d = $consultSV1->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$d['idSolicitud'].'>'.$d['idSolicitud'] .' </option>';
        } 
      ?>
      </select>
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['insertVent']))
                  echo $_SESSION['insertVent'];
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Crear Venta</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

    <div class="table-consult">
      <h3>Ventas</h3>
      <p>Esta tabla te permitirá administrar a tus ventas.</p>
      <div class="row">
        <div class="col-1 headerTableA">ID Venta</div>
        <div class="col-1 headerTableA">ID Solicitud</div>
        <div class="col-1 headerTableA">Fecha</div>
        <div class="col-1 headerTableA">Hora</div>
        <div class="col-1 headerTableA">Total</div>
      </div>
      <?php
        while($v = $consultV->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-1">'.$v['idVenta'].'</div> <div class="col-1">'.$v['idSolicitud'].'</div> <div class="col-1">'.$v['fecha'].'</div> <div class="col-1">'.$v['hora'].'</div> <div class="col-1">'.$v['total'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>

    <form class="form-signin" action="../PHP/DeleteVent.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Baja de Venta</h1>
      <label for="inputUser" class="sr-only">ID Venta</label>
      <select id="inputUser" name="idVent" class="form-control" required autofocus>
        <?php
        while($d = $consultV1->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$d['idVenta'].'>'.$d['idVenta'] .' </option>';
        } 
      ?>
      </select>
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['deleteVent']))
                  echo $_SESSION['deleteVent'];
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Eliminar Venta</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

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