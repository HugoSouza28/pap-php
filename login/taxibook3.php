<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("location: main_login.php");
}
$bdlocalhost='localhost';
$bdusername='root';
$bdpassword='';
$bdbasedados='paphugo';

$erro="";
$conn = mysqli_connect($bdlocalhost, $bdusername, $bdpassword, $bdbasedados);
if (isset($_POST['submit'])) {
  $_SESSION['recolha'] = $_POST['recolha'];
  $_SESSION['destino'] = $_POST['destino'];
  if (strlen($_SESSION['recolha']) >= 20 && preg_match("/\b\d{4}-\d{3}\b/", $_SESSION['recolha'])) {
    if (strlen($_SESSION['destino']) >= 20 && preg_match("/\b\d{4}-\d{3}\b/", $_SESSION['destino'])) {
      $sql = "INSERT INTO reserva (id, dataehora, pessoas, bagagem, tmr, recolha, destino, members_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssiissss",  $_SESSION['idreserva'], $_SESSION['dataehora'], $_SESSION['pessoas'], $_SESSION['bagagem'], $_SESSION['tmr'], $_SESSION['recolha'], $_SESSION['destino'],  $_SESSION['id']);
      $stmt->execute();
      header("location: reservas.php");
    }
    else {
      $erro="2";
    }
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
  <link href="../css/registo.css" rel="stylesheet" media="screen">
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
    <h2>Local de recolha :</h2>
      <div class="input-container2">
        <input name="recolha" id="recolha" type="text" class="form-control" placeholder="Exemplo: Rua de casa 314, 4407-302 Porto" required autofocus>
      </div>
    <h2>Local do destino :</h2>
      <div class="input-container2">
        <input name="destino" id="destino" type="text" class="form-control" placeholder="Exemplo: Rua da escola 126, 4408-214 Porto" required autofocus>
      </div>
      <div class="input-container2">
        <button name="submit" id="submit" class="btn2 btn-lg btn-primary btn-block" type="submit">Avançar</button>
      </div>
      <div class="input-container2">
        <?php 
				  if ($erro=="1")  {
              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Não colocou uma rua válida ou um código postal válido na recolha.</div><div id="returnVal" style="display:none;">false</div>';
          } elseif ($erro=="2")  {
              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Não colocou uma rua válida ou um código postal válido no destino.</div><div id="returnVal" style="display:none;">false</div>';
            }
			  ?>
        </div>
  </form>
  </div>

  <form action="" method="post">
    <button id="logout" class="logout" name="logout">Terminar sessão</button>
  </form>

  <footer>
    <p>Copyright © 2024 TaxiRide</p>
  </footer>
</body>
</html>
