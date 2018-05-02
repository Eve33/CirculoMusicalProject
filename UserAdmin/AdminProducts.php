<?php
    include '../PHP/ConsultProducts.php';

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
          <li class="nav-item">
            <a class="nav-link" href="../UserAdmin/AdminArtist.php">ADMIN Artistas</a>
          </li>
          <li class="nav-item  active font-weight-bold">
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

    <form class="form-signin" action="../PHP/InsertProd.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Alta de Productos</h1>
      <label for="inputUser" class="sr-only">Nombre Producto</label>
      <input type="text" id="nombreArt" name="nombreProd" class="form-control" placeholder="Nombre Producto" required autofocus>
      <label for="inputUser" class="sr-only">Descripción</label>
      <textarea class="form-control" name="descProd" rows="3" placeholder="Descripción Producto" required></textarea>
      <label for="inputUser" class="sr-only">Categoria</label>
      <select id="inputUser" name="categoria" class="form-control" required autofocus>
        <option value="Estructuras">Estructuras</option>
        <option value="Iluminacion">Iluminación</option>
        <option value="Maquinas">Máquinas</option>
        <option value="PantallasLed">Pantallas Led</option>
        <option value="Audio">Audio</option>
        <option value="Audio">Otras Estructuras</option>
      </select>
      <label for="inputUser" class="sr-only">Precio Unitario</label>
      <input type="number" placeholder="0.0" step="0.01" min="0" id="precioUni" name="precioUni" class="form-control" required>
      <label for="inputUser" class="sr-only">Precio Venta</label>
      <input type="number" placeholder="0.0" step="0.01" min="0" id="precioVen" name="precioVen" class="form-control" required>
      <label for="inputUser" class="sr-only">Precio Renta</label>
      <input type="number" placeholder="0.0" step="0.01" min="0" id="precioRen" name="precioRen" class="form-control" required>

      <p class="messageAlert">
        <?php
              if(isset($_SESSION['insertProd']))
                  echo $_SESSION['insertProd'];
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Dar Alta</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

    <div class="table-consult">
      <h3>Productos</h3>
      <p>Esta tabla te permitirá administrar a tus productos.</p>
      <div class="row">
        <div class="col-1 headerTableA">ID Producto</div>
        <div class="col-1 headerTableA">Nombre</div>
        <div class="col-1 headerTableA">Descripción</div>
        <div class="col-1 headerTableA">ID Categoria</div>
        <div class="col-1 headerTableA">Precio Unitario</div>
        <div class="col-1 headerTableA">Precio Venta</div>
        <div class="col-1 headerTableA">Precio Renta</div>
      </div>
      <?php
        while($p = $consultP->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-1">'.$p['idProducto'].'</div> <div class="col-1">'.$p['nombre'].'</div> <div class="col-1">'.$p['descripcion'].'</div> <div class="col-1">'.$p['categoria'].'</div> <div class="col-1">'.$p['precioUnitario'].'</div> <div class="col-1">'.$p['precioVenta'].'</div> <div class="col-1">'.$p['precioRenta'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>

    <form class="form-signin" action="../PHP/DeleteProd.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Baja de Productos</h1>
      <label for="inputUser" class="sr-only">ID Productos</label>
      <select id="inputUser" name="idProd" class="form-control" required autofocus>
        <?php
        while($d = $consultIDP->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$d['idProducto'].'>'.$d['idProducto'] .' </option>';
        } 
      ?>
      </select>
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['deleteProd']))
                  echo $_SESSION['deleteProd'];
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