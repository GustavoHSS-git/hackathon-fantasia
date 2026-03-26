<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <?php
session_start();
if (!isset($_SESSION['usuario_logado'])) {
    // Se não estiver logado, volta para o login
    header("Location: ../teladelogin/login.php");
    exit();
}
?>
    <h1>Menu Principal - Sistema de Locação de Fantasias</h1>
    
    <div class="section">
        <h2>Cadastros</h2>
        <ul>
            <li><a href="../cadastros/cadCliente.php">Cadastrar Cliente</a></li>
            <li><a href="../cadastros/cadFantasia.php">Cadastrar Fantasia</a></li>
            <li><a href="../cadastros/cadFuncionario.php">Cadastrar Funcionário</a></li>
        </ul>
    </div>
    
    <div class="section">
        <h2>Listas</h2>
        <ul>
            <li><a href="../lista/cliente.php">Listar Clientes</a></li>
            <li><a href="../lista/fantasia.php">Listar Fantasias</a></li>
        </ul>
    </div>
    
    <div class="section">
        <h2>Locação</h2>
        <ul>
            <li><a href="../locar/locacao.php">Realizar Locação</a></li>
            <li><a href="../locar/loginCliente.php">Buscar Cliente</a></li>
            <li><a href="../locar/pagamento.php">Pagamentos</a></li>
        </ul>
    </div>
    
    <div class="section">
        <h2>Outros</h2>
        <ul>
            <li><a href="index.html">Tela Inicial</a></li>
            <li><a href="../teladelogin/login.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
