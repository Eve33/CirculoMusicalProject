<?php
    include '../PHP/InsertComentPub.php';
?>

  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../resources/iconCM.png">

    <title>Contacto | CM</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="contact.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a href="../Cover/Cover.html">
        <img src="../resources/iconCM.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../Index/Index.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../About/About.html">Acerca</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../Artists/Artists.html">Artistas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Products/Products.html">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Events/Events.html">Eventos</a>
          </li>
          <li class="nav-item active font-weight-bold">
            <a class="nav-link" href="../Contact/Contact.html">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Gallery/Gallery.html">Galeria</a>
          </li>
        </ul>
        <a class="btn btn-sm  btn-primary btnLogin" href="../LogIn/LogIn.php">Inicia Sesión</a>
        <a class="btn btn-sm btn-primary btnSignup" href="../SignUp/SignUp.php">Regístrate</a>
      </div>
    </nav>

    <br>

    <div class="container">
      <div class="well well-sm">
        <h3>
          <strong>Contactanos</strong>
        </h3>
      </div>

      <br>

      <div class="row">
        <div class="col-md-7">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3695.5557418069325!2d-100.9620903!3d22.142908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842aa219c1446f15%3A0xc76617fe1173c14!2sCirculo+Musical+San+Luis+Potosi!5e0!3m2!1ses!2smx!4v1525039538070"
            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="col-md-5">
          <h4>
            <strong>Escribenos en un solo toque</strong>
          </h4>
          <br>
          <form action="../PHP/InsertComentPub.php" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" name="nombreP" value="" placeholder="Nombre" required autofocus>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="emailP" value="" placeholder="E-mail" required>
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" name="telefonoP" value="" placeholder="Teléfono" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="mensajeP" rows="3" placeholder="Message" required></textarea>
            </div>
            <p class="messageAlert">
              <?php
              if(isset($_SESSION['sendMessage']))
                  echo $_SESSION['sendMessage'];
                  unset($_SESSION['sendMessage']);
              ?>
            </p>
            <button class="btn btn-sm btn-primary" type="submit" name="button">
              <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Enviar
            </button>
          </form>
        </div>
      </div>
    </div>

    <main role="main" class="container">
      <div class="row">
        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4>Horarios de Servicio</h4>
            <p class="mb-0">Lunes - Viernes : 9am - 5pm</p>
            <p class="mb-0"> ​​Sábado: 10am - 2pm</p>
            <p class="mb-0">Domingo: No laboral</p>
          </div>
        </aside>
        <!-- /.blog-sidebar -->
      </div>
    </main>

    <main role="main">
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <!-- FOOTER -->
      <footer class="container">
        <p>&copy; 2017-2018 Company, Inc. &middot;
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