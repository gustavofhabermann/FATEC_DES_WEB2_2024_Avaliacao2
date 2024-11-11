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

<form method="POST" action="remover_vaga.php">
    ID da Vaga: <input type="number" name="id" required><br>
    <button type="submit">Remover Vaga</button>
</form>
