<?php 
include("../conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nomeCliente = trim($_POST["nomeCliente"]);
    $email = trim($_POST["email"]);
    $telefone = trim($_POST["telefone"]);
    $cpfCliente = preg_replace('/\D/', '', $_POST["cpfCliente"]);

    $errors = [];
    if (strlen($cpfCliente) !== 11) $errors[] = "CPF deve ter 11 números.";
    if (!str_contains($email, '@') || !str_contains($email, '.')) $errors[] = "E-mail inválido.";

    if (empty($errors)) {
        $sql = "INSERT INTO cliente (nomeCliente, email, telefone, cpfCliente, dataCadastro) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nomeCliente, $email, $telefone, $cpfCliente);
        if ($stmt->execute()) {
            echo "<script>alert('Cliente cadastrado!'); window.location.href='../lista/cliente.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar: " . $stmt->error . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Erro: " . implode('\n', $errors) . "'); window.history.back();</script>";
    }
    exit;
}

if ($stmt->execute()) {
    echo("Modelo Cadastrado");
    } else { 
    echo("Modelo não cadastrado");
    }
?>