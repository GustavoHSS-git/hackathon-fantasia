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
    $senha = trim($_POST['senha'] ?? '');
    $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? '');

    $errors = [];
    if (strlen($cpf) !== 11) $errors[] = "O CPF deve conter exatamente 11 números.";
    if (!str_contains($email, '@') || !str_contains($email, '.')) $errors[] = "Insira um e-mail válido.";
    if (strlen($senha) < 6) $errors[] = "A senha deve ter no mínimo 6 caracteres.";

    if (empty($errors)) {
        $sql = "INSERT INTO funcionario (nomeFuncionario, email, senha, cpf) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $nome, $email, $senha, $cpf);

        if ($stmt->execute()) {
            echo "<script>alert('Funcionário cadastrado com sucesso!'); window.location.href='../telainicial/menu.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar: " . $stmt->error . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('OPS! Algo está errado:\\n- " . implode('\\n- ', $errors) . "'); window.history.back();</script>";
    }
}
?>