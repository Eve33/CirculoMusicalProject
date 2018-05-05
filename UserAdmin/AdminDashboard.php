<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Dashboard Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="adminStyle.css" rel="stylesheet">
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

  <main role="main" class="col-md-9 m-sm-auto col-lg-10 px-4 py-4">
    <h1 class="h2">Ganancias del Año</h1>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
  </main>

  <form class="form-signin" action="../PHP/ConsultGanancias.php" method="POST">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Dar Baja</button>
</form>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../../Bootstrap/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="../Bootstrap/assets/js/vendor/popper.min.js"></script>
  <script src="../Bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Graphs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
  <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
          data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 3,
          pointBackgroundColor: '#007bff'
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false,
        }
      }
    });
  </script>
</body>

</html>