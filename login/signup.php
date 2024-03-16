<?php
session_start();
if(isset($_SESSION['id'])){
  header("location: inicio.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
    <link href="../css/registo.css" rel="stylesheet" media="screen">
  </head>
  <header>
    <div class="container2">
      <div class="logo">
        <img src="images/taxi-icon.png" alt="Taxi Icon">
        <h1><b>TaxiRide</b></h1>
      </div>
      <nav>
        <a href="/pap/php-login-master/login/index.php">Inicio</a>
        <a href="#">Sobre Nós</a>
        <a href="/pap/php-login-master/login/main_login.php">Entrar</a>
        <a href="/pap/php-login-master/login/signup.php">Registar</a>
      </nav>
    </div>
  </header>

  <body>
    <div class="container">
      <h2 class="form-signup-heading"><b>Registar</b></h2>
      <form class="form-signup" id="usersignup" name="usersignup" method="post" action="createuser.php">
        <div class="input-container2">
          <input name="newuser" id="newuser" type="text" class="form-control" placeholder="Username" required autofocus>
        </div>
        <div class="input-container2">
          <input name="email" id="email" type="text" class="form-control" placeholder="Email" required>
        </div>
        <div class="input-container2">
          <input name="password1" id="password1" type="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="input-container2">
          <input name="password2" id="password2" type="password" class="form-control" placeholder="Confirmar Password" required>
        </div>
        <div class="input-container2">
          <button name="Submit" id="submit" class="btn2 btn-lg btn-primary btn-block" type="submit">Registar</button>
        </div>
        <div class="input-container2">
                <p>Já tem conta? <a href="/pap/php-login-master/login/main_login.php">Login</a></p>
        </div>
        <div class="input-container2" id="message"></div>
      </form>
    </div>
    
    <script src="//code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/signup.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

    <script>
      $( "#usersignup" ).validate({
        rules: {
	      email: {
		    email: true,
		    required: true
	      },
        password1: {
        required: true,
        minlength: 6
	      },
        password2: {
        equalTo: "#password1"
        }
      }
    });
    </script>

  </body>
</html>