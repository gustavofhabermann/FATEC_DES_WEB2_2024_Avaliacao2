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
    <title>Cadastro de Vagas de Estágio</title>
</head>
<body>
    <center>
        <h2>Vagas de Estágio</h2>
    </center>
    
    <br>
    <a href="cadastro_vaga.php">Cadastrar Vaga</a><br>
    <a href="remover_vaga.php">Remover Vaga</a><br>
    <a href="visualizar_vagas.php">Visualizar Vagas</a><br>
    <a href="login.php">Logout</a>
</body>
</html>
