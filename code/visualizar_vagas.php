<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit();
}

require './classes/cadastro.php';

$cadastro = new Cadastro();
$vagas = $cadastro->Listar_Vagas();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/visualizar.css">
</head>
<body>
    

<?php
if (count($vagas) > 0) {
    echo "<table border='2'>
            <tr>
                <th>ID</th>
                <th>Nome da Empresa</th>
                <th>WhatsApp</th>
                <th>Email</th>
                <th>Descrição</th>
                <th>Curso</th>
            </tr>";
    foreach ($vagas as $vaga) {
        echo "<tr>
                <td>{$vaga['id']}</td>
                <td>{$vaga['nome_empresa']}</td>
                <td>{$vaga['numero_whatsapp']}</td>
                <td>{$vaga['email_contato']}</td>
                <td>{$vaga['descritivo_vaga']}</td>
                <td>" . ($vaga['curso'] == 1 ? "DSM" : "GE") . "</td>
              </tr>";
    }
    echo "</table>";

} else {
    echo "Nenhuma vaga disponível.";
}
?>

<a href="home.php" class="voltar">voltar</a>

</body>
</html>
