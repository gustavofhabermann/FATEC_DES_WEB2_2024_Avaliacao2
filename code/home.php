<?php
require('classes/login.php');
$validador = new Login();
$validador->verificar_logado();

require_once './classes/cadastro.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <h2>Vagas de Estágio</h2>
    </header>
    
    <br>
    
    <div class="container">
        <a href="cadastro_vaga.php" class="button">Cadastrar Vaga</a>
        <a href="remover_vaga.php" class="button">Remover Vaga</a>
        <a href="visualizar_vagas.php" class="button">Visualizar Vagas</a>
        <a href="login.php" class="logout">Logout</a>
    <div>
</body>
</html>
