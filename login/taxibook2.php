<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("location: main_login.php");
}
$bdlocalhost='localhost';
$bdusername='root';
$bdpassword='';
$bdbasedados='paphugo';

$conn = mysqli_connect($bdlocalhost, $bdusername, $bdpassword, $bdbasedados);
if (isset($_POST['submit'])) {
  $idreserva = $_SESSION['idreserva'];
  $pessoas = $_POST['people'];
  $bagagem = $_POST['luggagenumber'];
  $tmr = isset($_POST['tmr']) ? $_POST['tmr'] : 0;
  $sql = "UPDATE reserva SET pessoas = $pessoas, bagagem = $bagagem, tmr = $tmr WHERE id = '$idreserva'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  header("location: taxibook3.php");
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
  <link href="../css/taxibook2.css" rel="stylesheet" media="screen">
</head>
<body onload="setTMR()">
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

  <div class="container" id="passengerInfoContainer">
    <form class="form-signin" method="post" action="" onsubmit="submitForm()">
      <h2>Informações do passageiro</h2>
      <div class="question">
        <div class="parallel-questions">
          <div class="parallel-question">
            <label for="people">Quantas pessoas são?</label>
            <div class="numeric-input">
              <input type="number" id="people" name="people" min="1" max="8" required>
              <div class="arrow-buttons">
                <button type="button" class="arrow-up" onclick="increaseValue('people')">▲</button>
                <button type="button" class="arrow-down" onclick="decreaseValue('people')">▼</button>
              </div>
            </div>
          </div>
          <div class="parallel-question">
            <label for="tmr">É necessário TMR (Transporte de Mobilidade Reduzida)?</label>
            <select id="tmr" name="tmr" required onchange="setTMR()">
              <option value="" disabled selected hidden>Selecione...</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
        </div>
      </div>
      <div class="question" id="baggageQuestion">
        <div class="parallel-questions">
          <div class="parallel-question">
            <label for="luggage">Vai trazer bagagem?</label>
            <select id="luggage" name="luggage" required onchange="toggleMalaQuestion()">
              <option value="" disabled selected hidden>Selecione...</option>
              <option value="sim">Sim</option>
              <option value="nao">Não</option>
            </select>
          </div>
          <div class="parallel-question" id="malaQuestion" style="display: none;">
            <div class="centered-container">
              <label for="luggagenumber">Quantas malas?</label>
              <div class="numeric-input">
                <input type="number" id="luggagenumber" name="luggagenumber" min="1" max="4" default="0"required>
                <div class="arrow-buttons">
                  <button type="button" class="arrow-up" onclick="increaseValue('luggagenumber')">▲</button>
                  <button type="button" class="arrow-down" onclick="decreaseValue('luggagenumber')">▼</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="input-container">
        <button name="submit" id="submit" class="btn2 btn-lg btn-primary btn-block" type="submit">Avançar</button>
      </div>
      <div class="input-container">
        <a href="/pap/php-login-master/login/taxibook.php" class="backward-button">Retroceder</a>
      </div>
    </form>
  </div>

  <form action="" method="post">
    <button id="logout" class="logout" name="logout">Terminar sessão</button>
  </form>

  <footer>
    <p>Copyright © 2024 TaxiRide</p>
  </footer>

<script>
  function toggleMalaQuestion() {
    var luggageSelect = document.getElementById("luggage");
    var malaQuestion = document.getElementById("malaQuestion");
    var malaInput = document.getElementById("luggagenumber");

    if (luggageSelect.value === "sim") {
      malaQuestion.style.display = "block";
    } else {
      malaQuestion.style.display = "none";
      malaInput.value = '';
    }
  }

  function increaseValue(id) {
    var input = document.getElementById(id);
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.value = value > parseInt(input.getAttribute('max')) ? input.getAttribute('max') : value;
  }

  function decreaseValue(id) {
    var input = document.getElementById(id);
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value < parseInt(input.getAttribute('min')) ? input.getAttribute('min') : value;
  }

  function setTMR() {
    var tmrSelect = document.getElementById("tmr");
    var tmrValue = tmrSelect.value;
    document.getElementById("tmr_input").value = tmrValue;
  }

  function submitForm() {
    var luggageSelect = document.getElementById("luggage");
    var luggageNumberInput = document.getElementById("luggagenumber");

    if (luggageSelect.value === "nao") {
      luggageNumberInput.value = 0;
    }
  }
</script>
  <footer>
    <p>Copyright © 2024 TaxiRide</p>
  </footer>
</body>
</html>