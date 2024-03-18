<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("location: main_login.php");
}
include('dbinfo.php');
$id = $_SESSION['id'];
$resultado = QueryDB("select * from reserva where members_id = '$id'");

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
  <link href="../css/homepage.css" rel="stylesheet" media="screen">
</head>
<body>
  <header>
    <div class="container2">
      <div class="logo">
        <h1><b>TaxiRide</b></h1>
      </div>
      <nav>
        <a href="../login/inicio.php">Inicio</a>
        <a href="../login/taxibook.php">Reservar TAXI</a>
        <a href="../login/reservas.php">As suas reservas</a>
      </nav>
    </div>
  </header>


  <div class="container">
    <h2>As suas reservas</h2>
    <table>
      <thead>
        <tr>
          <th>Data</th>
          <th>Pessoas</th>
          <th>Bagagens</th>
          <th>TMR</th>
          <th>Recolha</th>
          <th>Destino</th>
          <th>Confirmação</th>
        </tr>
      </thead>
      <tbody>
        <?php
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>".$row['dataehora']."</td>";
                echo "<td>".$row['pessoas']."</td>";
                echo "<td>".$row['bagagem']."</td>";
                echo "<td>".$row['tmr']."</td>";
                echo "<td>".$row['recolha']."</td>";
                echo "<td>".$row['destino']."</td>";
                echo "<td>".$row['verificada']."</td>";
                echo "</tr>";
            }
        ?>
      </tbody>
    </table>
  </div>

    <form action="" method="post">
        <button id="logout" class="logout" name="logout">Terminar sessão</button>
    </form>

    <footer>
        <p>Copyright © 2024 TaxiRide</p>
    </footer>
</body>
</html>