<?php
session_start();

if ($_SESSION['email'] !== 'taxiride.login@gmail.com') {
    header('Location: inicio.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administrador</title>
</head>
<body>
    <h1>Painel de Administrador</h1>
    <p>Bem-vindo, <?php echo $_SESSION['username']; ?>!</p>
</body>
</html>