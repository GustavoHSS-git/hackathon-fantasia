<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Buscar Cliente</title>
    <link rel="stylesheet" href="locacao.css">
    <link rel="stylesheet" href="../telainicial/navbar.css">
</head>
<body style="padding-top: 80px;">
     <header class="page-top">
        <nav class="navbar">
            <div class="container">
                <div class="nav-left">
                    <ul class="nav-links">
                        <li><a href="../telainicial/menu.php" class="active">Home</a></li>
                        <li><a href="../lista/cliente.php">Clientes</a></li>
                        <li><a href="../lista/fantasia.php">Fantasias</a></li>
                        <li><a href="../locar/loginCliente.php">Locação</a></li>
                    </ul>
                </div>
                <div class="nav-right">
                    <button class="logout-btn" onclick="window.location.href='../teladelogin/login.php'">
                        <span>Sair</span>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
    <h1>Buscar Cliente</h1>

<?php

$clienteEncontrado = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once("../conex.php");
    if (!$conn) {
        die("Erro na conexão com o banco.");
    }
    $cpf = $_POST['cpfCliente'];
    $sql = "SELECT nomeCliente, email, telefone, cpfCliente
            FROM cliente
            WHERE cpfCliente = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro na consulta: " . $conn->error);
    }
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
        $clienteEncontrado = true;
    } else {
        echo "<h3>Cliente não encontrado.</h3>";
    }
}

?>
    <?php if (!$clienteEncontrado): ?>
        <h1>Buscar cliente pelo CPF</h1>
        <form method="POST">
        <label>CPF:</label><br>
        <input type="text" name="cpfCliente" required><br><br>
        <button type="submit">Buscar</button>
    </form>
    <?php else: ?>
        <h2>Cliente encontrado:</h2>
        <p>
            <strong>Nome:</strong>
            <?php echo $cliente['nomeCliente']; ?>
        </p>
        <p>
            <strong>Email:</strong>
            <?php echo $cliente['email']; ?>
        </p>
        <p>
            <strong>Telefone:</strong>
            <?php echo $cliente['telefone']; ?>
        </p>
        <p>
            <strong>CPF:</strong>
            <?php echo $cliente['cpfCliente']; ?>
        </p>

    <form action="locacao.php" method="POST">
    <input type="hidden" name="cpfCliente" value="<?php echo $cliente['cpfCliente']; ?>">

    <button type="submit">Ir para a escolha de fantasia</button>
</form>
<?php endif; ?>
    </div>
</body>
</html>