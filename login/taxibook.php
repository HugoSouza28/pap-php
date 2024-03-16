<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("location: main_login.php");
}
$erro="";
if (isset($_POST['submit'])) {
  $idreserva = uniqid(rand(), false);
  $data = $_POST['datetimepicker'];
  if ($data != "") {
    $data .= ":00";
    $_SESSION['dataehora'] = $data;
    $_SESSION['idreserva'] = $idreserva;
    header("location: taxibook2.php");
  } else {
      $erro="1";
    }
}
if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>TaxiRide</title>
  <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
  <link href="../css/main.css" rel="stylesheet" media="screen">
  <link href="../css/registo.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
  <header>
    <div class="container2">
      <div class="logo">
        <h1><b>TaxiRide</b></h1>
      </div>
      <nav>
        <a href="/pap/php-login-master/login/inicio.php">Inicio</a>
        <a href="/pap/php-login-master/login/taxibook.php">Reservar TAXI</a>
        <a href="/pap/php-login-master/login/reservas.php">As suas reservas</a>
      </nav>
    </div>
  </header>

  <div class="container">
    <form class="form-signin" method="post" action = "">
      <div class="input-container2">
        <h2>Selecione a data e hora:</h2>
      </div>
      <div class="input-container2">
      </div>
      <div class="input-container2">
        <input type="text" id="datetimepicker" name="datetimepicker" placeholder="Clique para selecionar a data e hora" required>
      </div>
      <div class="input-container2">
        <button name="submit" id="submit" class="btn2 btn-lg btn-primary btn-block" type="submit">Avançar</button>
      </div>
      <div class="input-container">
        <?php 
				  if ($erro =="1")  {
					  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Selecione uma data.</div><div id="returnVal" style="display:none;">false</div>';
			    } elseif ($erro=="2")  {
					    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ocorreu um erro a selecionar a data, selecione novamente.</div><div id="returnVal" style="display:none;">false</div>';
			    }
			  ?>
        </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    var today = new Date();
    var minDate = new Date(today);
    minDate.setDate(minDate.getDate() + 2);
    var maxDate = new Date(today);
    maxDate.setMonth(maxDate.getMonth() + 2);

    flatpickr("#datetimepicker", {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
      minDate: minDate,
      maxDate: maxDate,
      time_24hr: true
    });
  </script>

  <form action="" method="post">
    <button id="logout" class="logout" name="logout">Terminar sessão</button>
  </form>

  <footer>
    <p>Copyright © 2024 TaxiRide</p>
  </footer>
</body>
</html>