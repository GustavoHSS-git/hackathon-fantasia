<?php
include("../conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = TRIM ($_POST['nomeFuncionario'] ?? '');
    $senhaFuncionario = TRIM ($_POST['senha'] ?? '');
    $cpfFuncionario = TRIM ($_POST['cpf'] ?? '');


if($nome && $senhaFuncionario && $cpfFuncionario) {
    $sql = "INSERT INTO funcionario (nomeFuncionario, senha, cpf) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $nome, $senhaFuncionario, $cpfFuncionario);

    // Executar a query e verificar se ocorreu erro
    if ($stmt->execute()) {
        echo "<p class='sucesso'>Novo Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p class='erro'>Erro ao cadastrar o Usuário</p>";
    }
    } else {
        echo"Preecha os campos obrigátorios";
    }
}
?>