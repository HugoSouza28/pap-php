<?php
session_start();
$bdlocalhost='localhost';
$bdusername='root';
$bdpassword='';
$bdbasedados='paphugo';

$conn = mysqli_connect($bdlocalhost, $bdusername, $bdpassword, $bdbasedados);
$erro="";
if (isset($_POST['submit'])) {
  $idreserva = uniqid(rand(), false);
  $data = $_POST['datetimepicker'];
  if ($data != "") {
    $data .= ":00";
    $sql = "INSERT INTO reserva (id, dataehora, members_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $idreserva, $data, $_SESSION['id']);
    $stmt->execute();
    $_SESSION['idreserva'] = $idreserva;
    header("location: taxibook2.php");
  } else {
      $erro="1";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>TaxiRide</title>
  <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
  <link href="../css/main.css" rel="stylesheet" media="screen">
  <link href="../css/registo.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
      </nav>
    </div>
  </header>

  <div class="container">
    <form class="form-signin" method="post" action = "">
      <div class="input-container2">
        <h2>Selecione a data e hora:</h2>
      </div>
      <div class="input-container2">
      </div>
      <div class="input-container2">
        <input type="text" id="datetimepicker" name="datetimepicker" placeholder="Clique para selecionar a data e hora" required>
      </div>
      <div class="input-container2">
        <button name="submit" id="submit" class="btn2 btn-lg btn-primary btn-block" type="submit">Avançar</button>
      </div>
      <div class="input-container">
        <?php 
				  if ($erro =="1")  {
					  echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Selecione uma data.</div><div id="returnVal" style="display:none;">false</div>';
			    } elseif ($erro=="2")  {
					    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ocorreu um erro a selecionar a data, selecione novamente.</div><div id="returnVal" style="display:none;">false</div>';
			    }
			  ?>
        </div>
    </form>
  </div>

  <!-- Adicione os arquivos JavaScript necessários para o flatpickr -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    // Obtém a data atual
    var today = new Date();

    // Adiciona 2 dias à data atual
    var minDate = new Date(today);
    minDate.setDate(minDate.getDate() + 2);

    // Subtrai 2 meses da data atual
    var maxDate = new Date(today);
    maxDate.setMonth(maxDate.getMonth() + 2);

    // Inicialize o flatpickr
    flatpickr("#datetimepicker", {
      enableTime: true, // Habilita a seleção de hora
      dateFormat: "Y-m-d H:i", // Formato da data e hora
      minDate: minDate, // Define a data mínima como 2 dias após o dia atual
      maxDate: maxDate, // Define a data máxima como 2 meses antes do dia atual
      time_24hr: true // Usa formato de 24 horas
    });
  </script>

  <footer>
    <p>Copyright © 2024 TaxiRide</p>
  </footer>
</body>
</html>