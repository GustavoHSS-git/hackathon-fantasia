<?php

require('../conex.php');

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM cliente WHERE idCliente = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$cliente = $result->fetch_assoc();

if (!$cliente) {
    die("Cliente não encontrado.");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar cliente</title>
<link rel="stylesheet" href="../cadastros/cadastro.css">
</head>
<body>

<h2>Editar cliente</h2>

<form method="POST">

<label>Nome:</label>
<input type="text" name="nomeCliente"
value="<?php echo $cliente['nomeCliente']; ?>" required><br>

<label>Email:</label>
<input type="text" name="email"
value="<?php echo $cliente['email']; ?>" required><br>

<label>Telefone:</label>
<input type="number" name="telefone"
value="<?php echo $cliente['telefone']; ?>" required><br>

<label>CPF:</label>
<input type="number" name="cpfCliente"
value="<?php echo $cliente['cpfCliente']; ?>" required><br>

<button type="submit" name="salvar">
Salvar Alterações
</button>

</form>

</body>
</html>

<?php

if (isset($_POST['salvar'])) {

    $nome = $_POST['nomeCliente'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpfCliente = $_POST['cpfCliente'];

    $stmt = $conn->prepare("
        UPDATE cliente
        SET nomeCliente = ?,
            email = ?,
            telefone = ?,
            cpfCliente = ?
        WHERE idCliente = ?
    ");

    $stmt->bind_param(
        "ssisi",
        $nome,
        $email,
        $telefone,
        $cpfCliente,
        $id
    );

    $stmt->execute();

    echo "<script>
        alert('Cliente atualizado com sucesso!');
        window.location.href = '../lista/cliente.php';
    </script>";
}
?>