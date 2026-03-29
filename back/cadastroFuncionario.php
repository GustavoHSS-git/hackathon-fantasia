<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../cadastros/cadastro.css">
</head>
<body>
    

<?php
include("../conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nomeFuncionario'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senhaFuncionario = trim($_POST['senha'] ?? '');
    $cpfFuncionario = trim($_POST['cpf'] ?? '');


if($nome && $email && $senhaFuncionario && $cpfFuncionario) {
    $sql = "INSERT INTO funcionario (nomeFuncionario, email, senha, cpf) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $nome, $email, $senhaFuncionario, $cpfFuncionario);

    // Executar a query e verificar se ocorreu erro
    if ($stmt->execute()) {
        echo "<script>alert('Funcionário cadastrado com sucesso!'); window.location.href='../telainicial/menu.php';</script>";
    } else {
        echo "<p class='erro'>Erro ao cadastrar o Funcionário: " . $stmt->error . "</p>";
    }
    } else {
        echo "Preencha todos os campos obrigatórios!";
    }
}
?>