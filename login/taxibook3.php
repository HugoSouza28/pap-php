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
$idreserva = $_SESSION['id'];
$conn = mysqli_connect($bdlocalhost, $bdusername, $bdpassword, $bdbasedados);
if (isset($_POST['submit'])) {
  $recolha = $_POST['recolha'];
  $destino = $_POST['destino'];
  if (strlen($recolha) >= 20 && preg_match("/\b\d{4}-\d{3}\b/", $recolha)) {
    if (strlen($destino) >= 20 && preg_match("/\b\d{4}-\d{3}\b/", $destino)) {
      $sql = "UPDATE reserva SET recolha = '$recolha', destino = '$destino' WHERE id = $idreserva";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
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
  <link href="../css/taxibook3.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src="images/taxi-icon.png" alt="Taxi Icon">
        <h1>TaxiRide</h1>
      </div>
      <nav>
        <a href="/pap/php-login-master/login/inicio.php">Inicio</a>
        <a href="#">Sobre Nós</a>
        <a href="/pap/php-login-master/login/taxibook.php">Reservar TAXI</a>
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
