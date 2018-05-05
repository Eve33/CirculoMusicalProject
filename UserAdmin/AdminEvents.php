<?php
    include '../PHP/ConsultSolicEvent.php';

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

    <title>ADMIN EVENTS | CM</title>

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
          <li class="nav-item active font-weight-bold">
            <a class="nav-link" href="../UserAdmin/AdminEvents.php">ADMIN Eventos</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../UserAdmin/AdminRenta.php">ADMIN Renta Productos</a>
          </li>
          <li class="nav-item ">
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
        while($s = $consultSE->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-md-2">'.$s['idSolicitud'].'</div> <div class="col-md-2">'.$s['fecha'].'</div> <div class="col-md-2">'.$s['asunto'].'</div> <div class="col-md-2">'.$s['descripcion'].'</div> <div class="col-md-2">'.$s['estado'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>


    <form class="form-signin" action="../PHP/InsertEvent.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Alta de Eventos</h1>
      <h6>ID Solicitud</h6>
      <select name="idSolic" class="form-control" required autofocus>
        <?php
        while($d = $consultSE1->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$d['idSolicitud'].'>'.$d['idSolicitud'] .' </option>';
        } 
      ?>
      </select>
      <h6>Nombre de Evento</h6>
      <input type="text" name="nombreEve" class="form-control" placeholder="Nombre de evento" required autofocus>
      <h6>Fecha de Evento</h6>
      <input type="date" class="form-control" name="fechaEve" value="" placeholder="Fecha Evento" required>
      <h6>Lugar/Locación</h6>
      <input type="text" name="locacionEve" class="form-control" placeholder="Locación" required autofocus>
      <h6>ID Artista</h6>
      <select name="idArt" class="form-control" required autofocus>
        <?php
        while($d = $consultIDA->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$d['idArtista'].'>'.$d['idArtista'] .' </option>';
        } 
      ?>
      </select>
      <h6>Numero de entradas</h6>
      <input type="number" placeholder="0" min="0" name="numEntradas" class="form-control" required>
      <h6>Precio Entrada</h6>
      <input type="number" placeholder="0.0" step="0.01" min="0" id="precioEntrada" name="precioEntrada" class="form-control" required>
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['insertEve']))
                  echo $_SESSION['insertEve'];
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Dar Alta</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

    <div class="table-consult">
      <h3>Eventos</h3>
      <p>Esta tabla te permitirá administrar a tus eventos.</p>
      <div class="row">
        <div class="col-1 headerTableA">ID Eventos</div>
        <div class="col-1 headerTableA">ID Solicitud</div>
        <div class="col-1 headerTableA">Nombre</div>
        <div class="col-1 headerTableA">Fecha</div>
        <div class="col-1 headerTableA">Locación</div>
        <div class="col-1 headerTableA"># Entradas</div>
        <div class="col-1 headerTableA">Precio Entrada</div>
        <div class="col-1 headerTableA">ID Artista</div>
      </div>
      <?php
        while($e = $consultE->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-1">'.$e['idEvento'].'</div> <div class="col-1">'.$e['idSolicitud'].'</div> <div class="col-1">'.$e['nombre'].'</div> <div class="col-1">'.$e['fecha'].'</div> <div class="col-1">'.$e['locacion'].'</div> <div class="col-1">'.$e['numeroEntradas'].'</div> <div class="col-1">'.$e['precioEntrada'].'</div> <div class="col-1">'.$e['idArtista'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>

    <div class="table-consult">
      <h3>ID Artista</h3>
      <p>Esta tabla es para consultar el ID Artista para tu alta de evento.</p>
      <div class="row">
        <div class="col-1 headerTableA">ID Artista</div>
        <div class="col-1 headerTableA">Nombre</div>
      </div>
      <?php
        while($a = $consultA->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-1">'.$a['idArtista'].'</div> <div class="col-1">'.$a['nombre'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>

    <form class="form-signin" action="../PHP/DeleteEvent.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Baja de Eventos</h1>
      <h6>ID Evento </h6>
        <select name="idEve" class="form-control" required autofocus>
          <?php
        while($d = $consultIDE->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$d['idEvento'].'>'.$d['idEvento'] .' </option>';
        } 
      ?>
        </select>
        <h6>Estado de Evento</h6>
        <select name="estadoBaja" class="form-control" required autofocus>
          <option value="En Espera">En Espera</option>
          <option value="Cancelado">Cancelado</option>
        </select>
        <p class="messageAlert">
          <?php
              if(isset($_SESSION['deleteEve']))
                  echo $_SESSION['deleteEve'];
          ?>
        </p>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Dar Baja</button>
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