<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("location: main_login.php");
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/homepage.css" rel="stylesheet" media="screen">
</head>
<body>
  <header>
    <div class="container2">
      <div class="logo">
        <img src="images/taxi-icon.png" alt="Taxi Icon">
        <h1>TaxiRide</h1>
      </div>
      <nav>
        <a href="/pap/php-login-master/login/inicio.php">Inicio</a>
        <a href="#">Sobre Nós</a>
        <a href="/pap/php-login-master/login/taxibook.php">Reservar TAXI</a>
        <a href="/pap/php-login-master/login/reservas.php">As suas reservas</a>
      </nav>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="welcome">
        <h2>Bem Vindo <?php echo $_SESSION['username']; ?> !</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
      </div>
    </div>
  </main>
  <form action="" method="post">
    <button id="logout" class="logout" name="logout">Terminar sessão</button>
  </form>
  <footer>
    <p>Copyright © 2024 TaxiRide</p>
  </footer>

</body>
</html>