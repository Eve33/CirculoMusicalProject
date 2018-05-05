<?php
    include '../PHP/ConsultInvent.php';

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

    <title>ADMIN INVENT| CM</title>

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
          <li class="nav-item active font-weight-bold">
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

    <form class="form-signin" action="../PHP/InsertInvent.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Agregar Producto a Inventario</h1>
      <h6>ID Producto</h6>  
      <select name="idProdInv" class="form-control" required autofocus>
        <?php
        while($d = $consultIDP->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$d['idProducto'].'>'.$d['idProducto'] .' </option>';
        } 
      ?>
      </select>
      <h6>Cantidad</h6>
      <input type="number" placeholder="0" min="0" id="cantInv" name="cantProdInv" class="form-control" required>   
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['insertInvent']))
               {   echo $_SESSION['insertInvent'];
                  unset($_SESSION['insertInvent']);
               }
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sumar producto</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

    <div class="table-consult">
      <h3>Inventario</h3>
      <p>Esta tabla te permitirá administrar a tu inventario.</p>
      <div class="row">
        <div class="col-md-2 headerTableA">ID Producto</div>
        <div class="col-md-2 headerTableA">Cantidad</div>
        <div class="col-md-2 headerTableA">Ultima Fecha Entrada</div>
        <div class="col-md-2 headerTableA">Ultima Hora Entrada</div>
      </div>
      <?php
        while($i = $consultI->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-md-2">'.$i['idProducto'].'</div> <div class="col-md-2">'.$i['cantidadExistencia'].'</div> <div class="col-md-2">'.$i['fechaEntrada'].'</div> <div class="col-md-2">'.$i['horaEntrada'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>

    <div class="table-consult">
      <h3>Productos</h3>
      <p>Esta tabla es para consultar el ID del producto.</p>
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

    <form class="form-signin" action="../PHP/UpdateInvent.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Quitar productos de Inventario </h1>
      <h6>ID Producto</h6>
      <select name="idProdRest" class="form-control" required autofocus>
        <?php
        while($pr = $consultIDPR->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$pr['idProducto'].'>'.$pr['idProducto'] .' </option>';
        } 
      ?>
      </select>
      <h6>Cantidad</h6>
      <input type="number" placeholder="0" min="0" id="cantProdRest" name="cantProdRest" class="form-control" required>       
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['deleteInvent']))
               {   echo $_SESSION['deleteInvent'];
                  unset($_SESSION['deleteInvent']);
               }
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Restar producto</button>
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