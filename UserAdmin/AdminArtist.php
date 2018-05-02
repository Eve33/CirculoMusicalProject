<?php
    include '../PHP/ConsultArtist.php';

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

    <title>ADMIN ARTIST | CM</title>

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
          <li class="nav-item active font-weight-bold">
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

    <form class="form-signin" action="../PHP/InsertArtist.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Alta de Artistas</h1>
      <label for="inputUser" class="sr-only">Nombre Artista</label>
      <input type="text" id="nombreArt" name="nombreArt" class="form-control" placeholder="Nombre Artista" required autofocus>
      <label for="inputUser" class="sr-only">Genero</label>
      <input type="text" id="generoArt" name="generoArt" class="form-control" placeholder="Género Artista" required>
      <label for="inputUser" class="sr-only">Precio</label>
      <input type="number" placeholder="0.0" step="0.01" min="0" id="precioArt" name="precioArt" class="form-control" required>
      <label for="inputUser" class="sr-only">Biografia</label>
      <textarea class="form-control" name="bioArt" rows="3" placeholder="Biografía Artista" required></textarea>
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['insertArtist']))
                  echo $_SESSION['insertArtist'];
                  unset($_SESSION['insertArtist']);

          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Dar Alta</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

    <div class="table-consult">
      <h3>Artistas</h3>
      <p>Esta tabla te permitirá administrar a tus artistas.</p>
      <div class="row">
        <div class="col-md-2 headerTableA">ID Artista</div>
        <div class="col-md-2 headerTableA">Nombre</div>
        <div class="col-md-2 headerTableA">Genero</div>
        <div class="col-md-2 headerTableA">Biografía</div>
        <div class="col-md-2 headerTableA">Precio Contratación</div>
      </div>
      <?php
        while($a = $consultA->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-md-2">'.$a['idArtista'].'</div> <div class="col-md-2">'.$a['nombre'].'</div> <div class="col-md-2">'.$a['genero'].'</div> <div class="col-md-2">'.$a['biografia'].'</div> <div class="col-md-2">'.$a['precioContratacion'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>


    <form class="form-signin" action="../PHP/DeleteArtist.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Baja de Artistas</h1>
      <label for="inputUser" class="sr-only">ID Artista</label>
      <select id="inputUser" name="idArt" class="form-control" required autofocus>
        <?php
        while($d = $consultIDA->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$d['idArtista'].'>'.$d['idArtista'] .' </option>';
        } 
      ?>
      </select>
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['deleteArtist']))
                  echo $_SESSION['deleteArtist'];
                  unset($_SESSION['deleteArtist']);
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