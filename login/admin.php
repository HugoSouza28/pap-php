<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logado'])) {
    header('Location: main_login.php');
    exit;
}

// Verifica se o email do usuário é o correto
if ($_SESSION['email'] !== 'taxiride.login@gmail.com') {
    header('Location: index.php');
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
    <p>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</p>
    <a href="logout.php">Sair</a>
</body>
</html>