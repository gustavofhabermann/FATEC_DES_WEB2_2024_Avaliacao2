<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit();
}

require './classes/cadastro.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $cadastro = new Cadastro();

    if ($cadastro->Remover_Vagas($id)) {
        echo "Vaga removida com sucesso!";
    } else {
        echo "Erro ao remover vaga.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Vaga</title>
    <link rel="stylesheet" href="../css/remover_vaga.css">
</head>
<body>
    

    <form method="POST" action="remover_vaga.php">

        <div class="input">  
            ID da Vaga: <input type="number" name="id" required><br>
        </div>

        <button type="submit">Remover Vaga</button>
        </form>

        <a href="home.php" class="voltar">Voltar</a>

</body>
</html>
