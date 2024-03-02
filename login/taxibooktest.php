<?php
// Inicie a sessão
session_start();

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se a data e hora foram enviadas
    if (isset($_POST['datetimepicker'])) {
        // Conecte-se ao banco de dados
        $servername = "localhost"; // Nome do servidor MySQL
        $username = "root"; // Nome de usuário MySQL
        $password = ""; // Senha do usuário MySQL
        $dbname = "paphugo"; // Nome do banco de dados

        // Crie uma conexão com o banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifique a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Prepare e execute a consulta SQL para inserir a data e hora na tabela reserva
        $dataehora = $_POST['datetimepicker'];
        $sql = "INSERT INTO reserva (dataehora) VALUES ('$dataehora')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro inserido com sucesso!";
        } else {
            echo "Erro ao inserir registro: " . $conn->error;
        }

        // Feche a conexão com o banco de dados
        $conn->close();
    }
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
    <!-- Container centralizado -->
    <div id="content" style="text-align: center;">
        <h2>Selecione a data e hora:</h2>
        <!-- Formulário para seleção de data e hora -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" id="datetimepicker" name="datetimepicker" placeholder="Clique para selecionar a data e hora">
            <div class="input-container">
              <a href="/pap/php-login-master/login/taxibook2.php"><button type="submit">Avançar</button></a>
            </div>
        </form>
    </div>
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
