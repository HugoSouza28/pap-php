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
    <link href="../css/homepage.css" rel="stylesheet" media="screen">
  </head>
  <header>
    <div class="container2">
      <div class="logo">
        <h1><b>TaxiRide</b></h1>
      </div>
      <nav>
        <a href="../login/index.php">Inicio</a>
        <a href="../login/main_login.php">Entrar</a>
        <a href="../login/signup.php">Registar</a>
      </nav>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="welcome">
        <h2>Bem Vindo</h2>
        <p>O TaxiRide é uma plataforma de reservas de táxis online, dedicada a simplificar a forma como os viajantes se deslocam em Portugal. Com uma dedicada rede de motoristas profissionais, estamos comprometidos em oferecer conveniência, segurança e eficiência em todas as suas viagens de táxi.</p>
        <p>Com o TaxiRide, reservar um táxi é fácil e rápido. A nossa plataforma é intuitiva e permite que você reserve um táxi em poucos cliques. Basta inserir os detalhes da sua viagem e nós cuidaremos do resto, conectando-o com um motorista qualificado e confiável.</p>
        <p>Junte-se à comunidade de viajantes inteligentes e escolha o TaxiRide para todas as suas necessidades de transporte em Portugal. Estamos aqui para tornar suas viagens mais simples, seguras e agradáveis.</p>
        <p>Em caso de dúvidas sobre as reservas ou a sua conta contactar via email : <b>taxiride.login@gmail.com</b></p>
      </div>
    </div>
  </main>

  <footer>
    <p>Copyright © 2024 TaxiRide</p>
  </footer>
</body>
</html>