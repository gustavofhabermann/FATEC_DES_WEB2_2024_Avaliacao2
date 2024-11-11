<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit();
}

require './classes/cadastro.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeEmpresa = $_POST['nome_empresa'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $descricao = $_POST['descricao'];
    $curso = $_POST['curso'];

    $cadastro = new Cadastro();
    if ($cadastro->Cadastrar_Vagas($nomeEmpresa, $whatsapp, $email, $descricao, $curso)) {
        echo "Vaga cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar vaga.";
    }
}
?>

<form method="POST" action="cadastro_vaga.php">
    Nome da Empresa: <input type="text" name="nome_empresa" required><br>
    WhatsApp: <input type="text" name="whatsapp" required><br>
    E-mail: <input type="email" name="email" required><br>
    Descrição: <input type="text" name="descricao" required><br>
    Curso: 
    <select name="curso" required>
        <option value="1">DSM</option>
        <option value="2">GE</option>
    </select><br>
    <button type="submit">Cadastrar Vaga</button>
</form>
