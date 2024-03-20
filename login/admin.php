<?php
session_start();

if ($_SESSION['email'] !== 'taxiride.login@gmail.com') {
    header('Location: inicio.php');
    exit;
}
include('dbinfo.php');
$reservasinvalidas = QueryDB("select * from reserva where verificada = '0'");
$reservasvalidas = QueryDB("select * from reserva where verificada = '1'");
$taxi = QueryDB("select * from taxi");
$condutor = QueryDB("select * from condutor");
$userinvalido = QueryDB("select * from members where verified = '0'");
$uservalido = QueryDB("select * from members where verified = '1'");

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
}

$bdlocalhost='localhost';
$bdusername='root';
$bdpassword='';
$bdbasedados='paphugo';

$conn = mysqli_connect($bdlocalhost, $bdusername, $bdpassword, $bdbasedados);
if(isset($_POST['verificarmembro'])){

    $memberId = $_POST['idmembro'];
    $sql = "UPDATE members SET verified = '1' WHERE id = '$memberId'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('Location: admin.php#utilizadoresvalidos');
}

if(isset($_POST['verificarreserva'])){

    $idreserva = $_POST['idreserva'];
    $sql = "UPDATE reserva SET verificada = '1' WHERE id = '$idreserva'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('Location: admin.php#reservasvalidas');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/admin.css" rel="stylesheet" media="screen">
    <title>Administração</title>
</head>
<body>
    <header>
        <h1>Administrador <?php echo $_SESSION['username']; ?></h1>
    </header>

    <nav>
        <a href="#condutores">Condutores</a>
        <a href="#taxis">Táxis</a>
        <a href="#utilizadoresinvalidos">Utilizadores por validar</a>
        <a href="#utilizadoresvalidos">Utilizadores validados</a>
        <a href="#reservasinvalidas">Reservas por validar</a>
        <a href="#reservasvalidas">Reservas validadas</a>
    </nav>

  <div class="container">
    <section id="condutores">
        <h2>Condutores</h2>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>ID Taxi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rowcondutor = mysqli_fetch_assoc($condutor)) {
                        echo "<tr>";
                        echo "<td>".$rowcondutor['id']."</td>";
                        echo "<td>".$rowcondutor['nome']."</td>";
                        echo "<td>".$rowcondutor['taxi_id']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>

    <section id="taxis">
        <h2>Táxis</h2>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Lugares</th>
                <th>Bagagens</th>
                <th>TMR</th>
                <th>Modelo</th>
                <th>ID Empresa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rowtaxi = mysqli_fetch_assoc($taxi)) {
                        echo "<tr>";
                        echo "<td>".$rowtaxi['id']."</td>";
                        echo "<td>".$rowtaxi['lugares']."</td>";
                        echo "<td>".$rowtaxi['bagagem']."</td>";
                        echo "<td>".$rowtaxi['tmr']."</td>";
                        echo "<td>".$rowtaxi['modelo']."</td>";
                        echo "<td>".$rowtaxi['empresa_id']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>

    <section id="utilizadoresinvalidos">
        <h2>Utilizadores por validar</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Verificação</th>
                    <th>Data do registo</th>
                    <th>Verificar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rowuserinvalido = mysqli_fetch_assoc($userinvalido)) {
                        echo "<tr>";
                        echo "<td>".$rowuserinvalido['id']."</td>";
                        echo "<td>".$rowuserinvalido['username']."</td>";
                        echo "<td>".$rowuserinvalido['email']."</td>";
                        echo "<td>".$rowuserinvalido['verified']."</td>";
                        echo "<td>".$rowuserinvalido['mod_timestamp']."</td>";
                        echo "<td>    
                                <form action='' method='post'>
                                    <input type='hidden' name='idmembro' value=".$rowuserinvalido['id'].">
                                    <button id='verificarmembro' class='verificarmembro' name='verificarmembro'>Verificar</button>
                                </form>
                             </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>

    <section id="utilizadoresvalidos">
        <h2>Utilizadores Válidos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Verificação</th>
                    <th>Data do registo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rowuservalido = mysqli_fetch_assoc($uservalido)) {
                        echo "<tr>";
                        echo "<td>".$rowuservalido['id']."</td>";
                        echo "<td>".$rowuservalido['username']."</td>";
                        echo "<td>".$rowuservalido['email']."</td>";
                        echo "<td>".$rowuservalido['verified']."</td>";
                        echo "<td>".$rowuservalido['mod_timestamp']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>

    <section id="reservasinvlidas">
        <h2>Reservas por confirmar</h2>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Pessoas</th>
                <th>Bagagens</th>
                <th>TMR</th>
                <th>Recolha</th>
                <th>Destino</th>
                <th>Confirmação</th>
                <th>Confirmar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($rowreservasinvalidas = mysqli_fetch_assoc($reservasinvalidas)) {
                        echo "<tr>";
                        echo "<td>".$rowreservasinvalidas['id']."</td>";
                        echo "<td>".$rowreservasinvalidas['dataehora']."</td>";
                        echo "<td>".$rowreservasinvalidas['pessoas']."</td>";
                        echo "<td>".$rowreservasinvalidas['bagagem']."</td>";
                        echo "<td>".$rowreservasinvalidas['tmr']."</td>";
                        echo "<td>".$rowreservasinvalidas['recolha']."</td>";
                        echo "<td>".$rowreservasinvalidas['destino']."</td>";
                        echo "<td>".$rowreservasinvalidas['verificada']."</td>";
                        echo "<td>    
                                <form action='' method='post'>
                                    <input type='hidden' name='idreserva' value=".$rowreservasinvalidas['id'].">
                                    <button id='verificarreserva' class='verificarreserva' name='verificarreserva'>Confirmar</button>
                                </form>
                             </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
    </table>
    </section>

    <section id="reservasvalidas">
        <h2>Reservas Válidas</h2>
        <table>
            <thead>
                <tr>
                <th>ID</th>
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
                    while ($rowreservasvalidas = mysqli_fetch_assoc($reservasvalidas)) {
                        echo "<tr>";
                        echo "<td>".$rowreservasvalidas['id']."</td>";
                        echo "<td>".$rowreservasvalidas['dataehora']."</td>";
                        echo "<td>".$rowreservasvalidas['pessoas']."</td>";
                        echo "<td>".$rowreservasvalidas['bagagem']."</td>";
                        echo "<td>".$rowreservasvalidas['tmr']."</td>";
                        echo "<td>".$rowreservasvalidas['recolha']."</td>";
                        echo "<td>".$rowreservasvalidas['destino']."</td>";
                        echo "<td>".$rowreservasvalidas['verificada']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
    </table>
    </section>

  </div>
    <div class="espaçamento"></div>

    <form action="" method="post">
        <button id="logout" class="logout" name="logout">Terminar sessão</button>
    </form>

    <footer>
        <p>Copyright © 2024 TaxiRide</p>
    </footer>

</body>
</html>