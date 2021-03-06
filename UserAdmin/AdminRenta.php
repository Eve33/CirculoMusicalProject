<?php
    include '../PHP/ConsultSolicRenta.php';

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

    <title>ADMIN RENTS | CM</title>

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
          <li class="nav-item active font-weight-bold">
            <a class="nav-link" href="../UserAdmin/AdminRenta.php">ADMIN Renta Productos</a>
          </li>
          <li class="nav-item">
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
      <p>Aquí estan las solicitudes de rentas de tus clientes, tomate un tiempo para darles respuesta.</p>
      <div class="row">
        <div class="col-md-2 headerTableA">ID Solicitud</div>
        <div class="col-md-2 headerTableA">Fecha</div>
        <div class="col-md-2 headerTableA">Asunto</div>
        <div class="col-md-2 headerTableA">Descripción</div>
        <div class="col-md-2 headerTableA">Estado</div>
      </div>
      <?php
        while($s = $consultSR->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-md-2">'.$s['idSolicitud'].'</div> <div class="col-md-2">'.$s['fecha'].'</div> <div class="col-md-2">'.$s['asunto'].'</div> <div class="col-md-2">'.$s['descripcion'].'</div> <div class="col-md-2">'.$s['estado'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>


  <form class="form-signin" action="../PHP/InsertRent.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Alta de Renta</h1>
      <h6>ID Solicitud</h6>
      <select name="idSolic" class="form-control" required autofocus>
        <?php
        while($d = $consultSR1->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$d['idSolicitud'].'>'.$d['idSolicitud'] .' </option>';
        } 
      ?>
      </select>
      <h6>Cantidad Días</h6>
      <input type="number" placeholder="0" min="0" name="cantDias" class="form-control" required>   
 
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['insertRent']))
              {
                echo $_SESSION['insertRent'];
                unset($_SESSION['insertRent']);
              }
                  
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Crear Renta</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

    <div class="table-consult">
      <h3>Renta</h3>
      <p>Esta tabla te permitirá administrar a tus rentas.</p>
      <div class="row">
        <div class="col-1 headerTableA">ID Renta</div>
        <div class="col-1 headerTableA">ID Solicitud</div>
        <div class="col-1 headerTableA">Fecha</div>
        <div class="col-1 headerTableA">Hora</div>
        <div class="col-1 headerTableA">Cant. Días</div>
        <div class="col-1 headerTableA">Estado</div>
        <div class="col-1 headerTableA">Total</div>
      </div>
      <?php
        while($v = $consultR->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-1">'.$v['idRenta'].'</div> <div class="col-1">'.$v['idSolicitud'].'</div> <div class="col-1">'.$v['fecha'].'</div> <div class="col-1">'.$v['hora'].'</div> <div class="col-1">'.$v['cantDias'].'</div> <div class="col-1">'.$v['estado'].'</div> <div class="col-1">'.$v['total'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>

    <form class="form-signin" action="../PHP/UpdateRent.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Modificar Renta</h1>
      <h6>ID Renta</h6>
      <select name="idRent" class="form-control" required autofocus>
        <?php
        while($d = $consultR1->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$d['idRenta'].'>'.$d['idRenta'] .' </option>';
        } 
      ?>
      </select>
      <h6>Cantidad Días</h6>
      <input type="number" placeholder="0" min="0" name="cantDias" class="form-control" required>   
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['updateRent']))
              {
                echo $_SESSION['updateRent'];
                unset($_SESSION['updateRent']);
              }            
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Recepción de Renta</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

    <form class="form-signin" action="../PHP/UpdateRentEstado.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Modificar Renta</h1>
      <h6>ID Renta</h6>
      <select name="idRent" class="form-control" required autofocus>
        <?php
        while($d = $consultR0->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$d['idRenta'].'>'.$d['idRenta'] .' </option>';
        } 
      ?>
      </select>
      <h6>Asunto</h6>
      <select name="estadoRent" class="form-control" required autofocus>
        <option value="En Renta">En Renta</option>
        <option value="Entregado">Entregado</option>
      </select>      
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['updateRentE']))
              {
                echo $_SESSION['updateRentE'];
                unset($_SESSION['updateRentE']);
              }            
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Modificar Renta</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>

    <form class="form-signin" action="../PHP/InsertDR.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Agregar Detalle Renta</h1>
      <h6>ID Renta</h6>
      <select name="idRent" class="form-control" required autofocus>
        <?php
        while($r = $consultR3->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$r['idRenta'].'>'.$r['idRenta'] .' </option>';
        } 
      ?>
      </select>
      <h6>ID Producto</h6>
      <select name="idProd" class="form-control" required autofocus>
        <?php
        while($p = $consultIDP->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$p['idProducto'].'>'.$p['idProducto'] .' </option>';
        } 
      ?>
      </select>
      <h6>Cantidad Producto</h6>
      <input type="number" placeholder="0" min="0" name="cantProd" class="form-control" required>   
      <h6>Descuento (%)</h6>
      <input type="number" placeholder="0" min="0" name="cantDesc" class="form-control" required>   
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['insertDR']))
              {    echo $_SESSION['insertDR'];
                  unset($_SESSION['insertDR']);
              }
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Insertar DR</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>


    <div class="table-consult">
      <h3>Detalles de Renta</h3>
      <p>Esta tabla te permitirá ver los detalles de renta de todas tus rentas.</p>
      <div class="row">
        <div class="col-1 headerTableA">ID Detalle Renta</div>
        <div class="col-1 headerTableA">ID Renta</div>
        <div class="col-1 headerTableA">ID Producto</div>
        <div class="col-1 headerTableA">Cantidad</div>
        <div class="col-1 headerTableA">Descuento</div>
        <div class="col-1 headerTableA">Subtotal</div>
      </div>
      <?php
        while($dv = $consultDR->fetch(PDO::FETCH_ASSOC))
        {
          echo '<div class="row"> <div class="col-1">'.$dv['idDetalleRenta'].'</div> <div class="col-1">'.$dv['idRenta'].'</div> <div class="col-1">'.$dv['idProducto'].'</div> <div class="col-1">'.$dv['cantidad'].'</div> <div class="col-1">'.$dv['descuento'].'</div> <div class="col-1">'.$dv['subtotal'].'</div> </div>';
        } 
      ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </div>


    <form class="form-signin" action="../PHP/DeleteDR.php" method="POST">
      <a href="../Cover/Cover.html">
        <img class="mb-4" src="../resources/iconCM.png" alt="" width="72" height="72">
      </a>
      <h1 class="h3 mb-3 font-weight-normal">Elimnar Detalle Venta</h1>
      <h6>ID Renta</h6>
      <select name="idR" class="form-control" required autofocus>
        <?php
        while($r = $consultR2->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$r['idRenta'].'>'.$r['idRenta'] .' </option>';
        } 
      ?>
      </select>
      <h6>ID Detalle Renta</h6>
      <select name="idDR" class="form-control" required autofocus>
        <?php
        while($dv = $consultDR1->fetch(PDO::FETCH_ASSOC))
        {
          echo'<option value='.$dv['idDetalleRenta'].'>'.$dv['idDetalleRenta'] .' </option>';
        } 
      ?>
      </select>   
      <p class="messageAlert">
        <?php
              if(isset($_SESSION['deleteDR']))
              {
                echo $_SESSION['deleteDR'];
                unset($_SESSION['deleteDR']);
              }            
          ?>
      </p>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Eliminar DR</button>
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