<?php
    include '../PHP/ConsultGanancias.php';

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

  <title>ADMIN REPORTS | CM</title>

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
        <li class="nav-item ">
          <a class="nav-link" href="../UserAdmin/AdminVenta.php">ADMIN Venta Productos</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../UserAdmin/AdminComents.php">ADMIN Coments Pub</a>
        </li>
        <li class="nav-item active font-weight-bold">
          <a class="nav-link" href="../UserAdmin/AdminDashboard.php">ADMIN Dashboard Ganancias</a>
        </li>
      </ul>
      <a class="btn btn-sm  btn-primary btnLogin" href="../PHP/DBCloseConexion.php">Cerrar Sesión</a>
    </div>
  </nav>

  <main role="main" class="col-md-9 m-sm-auto col-lg-10 px-4 py-4">
    <h1 class="h2">Ganancias del año <?php echo $year ?></h1>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
  </main>

<hr>

<h2>Ganacia Totales del año <?php echo $year ?></h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Año</th>
                  <th>Mes</th>
                  <th>Ganacia Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Enero</td>
                  <th><?php echo "$ ".$enero." MX" ?> </th>
                </tr>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Febrero</td>
                  <th><?php echo "$ ".$febrero." MX" ?> </th>
                </tr>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Marzo</td>
                  <th><?php echo "$ ".$marzo." MX"?> </th>
                </tr>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Abril</td>
                  <th><?php echo "$ ".$abril." MX" ?> </th>
                </tr>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Mayo</td>
                  <th><?php echo "$ ".$mayo." MX" ?> </th>
                </tr>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Junio</td>
                  <th><?php echo "$ ".$junio." MX" ?> </th>
                </tr>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Julio</td>
                  <th><?php echo "$ ".$julio." MX"?> </th>
                </tr>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Agosto</td>
                  <th><?php echo "$ ".$agosto." MX" ?> </th>
                </tr>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Septiembre</td>
                  <th><?php echo "$ ".$septiembre." MX" ?> </th>
                </tr>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Octubre</td>
                  <th><?php echo "$ ".$octubre." MX" ?> </th>
                </tr>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Noviembre</td>
                  <th><?php echo "$ ".$noviembre." MX" ?> </th>
                </tr>
                <tr>
                  <th><?php echo $year ?> </th>
                  <td>Diciembre</td>
                  <th><?php echo "$ ".$diciembre." MX" ?> </th>
                </tr>
                
              </tbody>
            </table>
          </div>

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
    var dataArray = [<?php echo join(',',$arrayData); ?>];
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril","Mayo" ,"Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
          data: dataArray,
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