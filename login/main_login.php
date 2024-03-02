<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:../login/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/login.css" rel="stylesheet" media="screen">
  </head>
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

  <body>
    <div class="container">

      <h2 class="form-signin-heading">Entrar</h2>
      <form class="form-signin" name="form1" method="post" action="checklogin.php">
        <div class="input-container">
        <input name="myusername" id="myusername" type="text" class="form-control" placeholder="Username" autofocus>
      </div>
      <div class="input-container">
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">
      </div>
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <div class="input-container">
                <p>Ainda não tem conta? <a href="/pap/php-login-master/login/signup.php">Registar</a></p>
        </div>
        <div id="message"></div>
      </form>
    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>
    <footer>
        <p>Copyright © 2024 TaxiRide</p>
    </footer>
  </body>
</html>
