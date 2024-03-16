<?php
session_start();
if(isset($_SESSION['id'])){
  header("location: inicio.php");
  }
include('dbinfo.php');
$erro='';
if (isset($_POST['submit'])) {
	$email=$_POST['email'];
  $password=$_POST['password'];
  $resultado = QueryDB("select * from members where email='$email'");
  $row = mysqli_fetch_assoc($resultado);
	$nr_linhas = mysqli_num_rows($resultado);
	if ($nr_linhas == 1) {
    if ($row['verified'] == 1){
      $hashpassword = $row['password'];
      $vpassword= password_verify($password , $hashpassword);
      if ($vpassword == $row['password']){
        $_SESSION['email']=$email; 
        $_SESSION['mod_timestamp']= $row['mod_timestamp'];
        $_SESSION['username']= $row['username'];
        $_SESSION['id']= $row['id'];
        $_SESSION['verified'] = $row['verified'];
        if ($email == "taxiride.login@gmail.com") {
          header("location: admin.php"); 
        } else {
            header("location: inicio.php"); 
          }
      } else {
          $erro="3";
        }
    } else {
        $erro="2";
      }
	} else {
      $erro="1";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
    <link href="../css/registo.css" rel="stylesheet" media="screen">
  </head>
  <header>
        <div class="container2">
          <div class="logo">
            <h1><b>TaxiRide</b></h1>
          </div>
          <nav>
            <a href="/pap/php-login-master/login/index.php">Inicio</a>
            <a href="/pap/php-login-master/login/main_login.php">Entrar</a>
            <a href="/pap/php-login-master/login/signup.php">Registar</a>
          </nav>
        </div>
    </header>

  <body>
    <div class="container">
      <h2 class="form-signin-heading"><b>Entrar</b></h2>
      <form class="form-signin" method="post" action = "">
        <div class="input-container2">
          <input name="email" id="email" type="text" class="form-control" placeholder="Email" required autofocus>
        </div>
        <div class="input-container2">
          <input name="password" id="password" type="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="input-container2">
          <button name="submit" id="submit" class="btn2 btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </div>
        <div class="input-container2">
          <p>Ainda não tem conta? <a href="/pap/php-login-master/login/signup.php">Registar</a></p>
        </div>
        <div class="input-container2">
        <?php 
				  if ($erro=="1")  {
              echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Utilizador não encontrado.</div><div id="returnVal" style="display:none;">false</div>';
          } elseif ($erro=="2")  {
					    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Utilizador não verificado.</div><div id="returnVal" style="display:none;">false</div>';
			    } elseif ($erro=="3")  {
					    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password incorreta.</div><div id="returnVal" style="display:none;">false</div>';
			      }
			  ?>
        </div>
      </form>
    </div>

    <footer>
        <p>Copyright © 2024 TaxiRide</p>
    </footer>
  </body>
</html>