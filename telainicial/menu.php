<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <header class="page-top">
        <nav class="navbar">
            <div class="container">
                <div class="nav-left">
                    <ul class="nav-links">
                        <li><a href="menu.php" class="active">Home</a></li>
                        <li><a href="../lista/cliente.php">Clientes</a></li>
                        <li><a href="../lista/fantasia.php">Fantasias</a></li>
                        <li><a href="../locar/locacao.php">Locação</a></li>
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

    <div class="main-content" style="margin-top: 100px; padding: 20px;">
        <h1 style="text-align: center; color: #ffffff; margin-bottom: 40px;">Sistema de Locação de Fantasias</h1>

        <div class="menu-container">
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
                    <li><a href="../lista/historico_cliente.php">Histórico de Locações</a></li>
                </ul>
            </div>

            <div class="section">
                <h2>Locação</h2>
                <ul>
                    <li><a href="../locar/locacao.php">Realizar Locação</a></li>
                </ul>
            </div>
        </div> 
    </div>
</body>
</html>
