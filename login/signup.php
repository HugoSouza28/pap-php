<?php
  session_start();

  if (isset($_SESSION['username'])) {
      session_start();
      session_destroy();
  }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/registo.css" rel="stylesheet" media="screen">
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
    <h2 class="form-signup-heading">Registar</h2>
      <form class="form-signup" id="usersignup" name="usersignup" method="post" action="createuser.php">
      <div class="input-container">
        <input name="newuser" id="newuser" type="text" class="form-control" placeholder="Username" autofocus>
      </div>
      <div class="input-container">
        <input name="email" id="email" type="text" class="form-control" placeholder="Email">
      </div>
      <div class="input-container">
        <input name="password1" id="password1" type="password" class="form-control" placeholder="Password">
      </div>
      <div class="input-container">
        <input name="password2" id="password2" type="password" class="form-control" placeholder="Confirmar Password">
      </div>
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Registar</button>
        <div class="input-container">
                <p>Já tem conta? <a href="/pap/php-login-master/login/main_login.php">Login</a></p>
        </div>
      </form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
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
      minlength: 4
	},
    password2: {
      equalTo: "#password1"
    }
  },
  submitHandler: function(form) {
    var redirectUrl = $(form).data('/pap/php-login-master/login/main_login.php');
    window.location.href = redirectUrl;
  }
});
</script>
<footer>
        <p>Copyright © 2024 TaxiRide</p>
    </footer>
  </body>
</html>
