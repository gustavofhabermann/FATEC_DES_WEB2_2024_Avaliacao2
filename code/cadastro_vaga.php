<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit();
}

require './classes/cadastro.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeEmpresa = $_POST['nome_empresa'];
    $whatsapp = $_POST['numero_whatsapp'];
    $email = $_POST['email_contato'];
    $descricao = $_POST['descritivo_vaga'];
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
    Numero de WhatsApp: <input type="text" name="numero_whatsapp" required><br>
    E-mail para contato: <input type="email" name="email_contato" required><br>
    Descrição: <input type="text" name="descritivo_vaga" required><br>
    Curso: 
    <select name="curso" required>
        <option value="1">DSM</option>
        <option value="2">GE</option>
    </select><br>
    <button type="submit">Cadastrar Vaga</button>
</form>
