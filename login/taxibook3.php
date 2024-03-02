<?php
  session_start();

  if (isset($_SESSION['username'])) {
      session_destroy();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>TaxiRide</title>
  <link href="../css/taxibook.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src="taxi-icon.png" alt="Taxi Icon">
        <h1>TaxiRide</h1>
      </div>
      <nav>
        <a href="/pap/php-login-master/login/index.php">Inicio</a>
        <a href="#">Sobre Nós</a>
        <a href="/pap/php-login-master/login/taxibook.php">Reservar TAXI</a>
        <a href="/pap/php-login-master/login/main_login.php">Entrar</a>
        <a href="/pap/php-login-master/login/signup.php">Registar</a>
      </nav>
    </div>
  </header>

  <div class="container">

  </div>


  <footer>
    <p>Copyright © 2024 TaxiRide</p>
  </footer>
</body>
</html>
