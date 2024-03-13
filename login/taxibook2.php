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
  <link href="../css/taxibook2.css" rel="stylesheet" media="screen">
</head>
<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src="images/taxi-icon.png" alt="Taxi Icon">
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

  <div class="container" id="passengerInfoContainer">
  <h2>Informações do passageiro</h2>
  <div class="question">
    <div class="parallel-questions">
      <div class="parallel-question">
        <label for="people">Quantas pessoas são?</label>
        <div class="numeric-input">
          <input type="number" id="people" name="people" min="0" max="8" required>
          <div class="arrow-buttons">
            <button type="button" class="arrow-up" onclick="increaseValue('people')">▲</button>
            <button type="button" class="arrow-down" onclick="decreaseValue('people')">▼</button>
          </div>
        </div>
      </div>
      <div class="parallel-question">
        <label for="tmr">É necessário TMR (Transporte de Mobilidade Reduzida)?</label>
        <select id="tmr" name="tmr" required>
          <option value="" disabled selected hidden>Selecione...</option>
          <option value="sim">Sim</option>
          <option value="nao">Não</option>
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
            <input type="number" id="luggagenumber" name="luggagenumber" min="0" max="6" required>
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
  <a href="/pap/php-login-master/login/taxibook.php" class="backward-button">Retroceder</a>
</div>
  <div class="input-container">
  <a href="/pap/php-login-master/login/taxibook3.php"><button type="submit" class="foward-button">Avançar</button>
  </div>
</div>

<script>
  // Função para controlar a visibilidade da pergunta "Quantas malas?"
  function toggleMalaQuestion() {
    var luggageSelect = document.getElementById("luggage");
    var malaQuestion = document.getElementById("malaQuestion");
    var malaInput = document.getElementById("luggagenumber");

    // Verifica se a opção selecionada é "Sim"
    if (luggageSelect.value === "sim") {
      malaQuestion.style.display = "block"; // Mostra a pergunta
    } else {
      malaQuestion.style.display = "none"; // Esconde a pergunta
      malaInput.value = ''; // Reseta o valor do campo de entrada
    }
  }

  // Funções para incrementar e decrementar valores numéricos
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
</script>

  <footer>
    <p>Copyright © 2024 TaxiRide</p>
  </footer>
</body>
</html>
