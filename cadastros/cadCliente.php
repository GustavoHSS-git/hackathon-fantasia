<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="../telainicial/navbar.css">
</head>
<body>
    <header class="page-top">
        <nav class="navbar">
            <div class="container">
                <div class="nav-left">
                    <img src="../logo/logo.png" alt="Logo" class="brand-img" onclick="window.location.href='../telainicial/menu.php'">
                    <ul class="nav-links">
                        <li><a href="../telainicial/menu.php">Home</a></li>
                        <li><a href="cadCliente.php" class="active">Clientes</a></li>
                        <li><a href="cadFantasia.php">Fantasias</a></li>
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
    <div class="titulo">

    
    <div class="container">
        <h1 class="titulo">Cadastro de Clientes</h1>
        <div class="titulo">
        </div>

        <form action="../back/cadastroCliente.php" method="post">
            
            <label for="nomeCliente" id="Nome">Nome do Cliente: </label><br>
            <input type="text" name="nomeCliente" required><br>

            <label for="email">Email do Cliente: </label><br>
            <input type="text" name="email" required><br>

            <label for="telefone">Telefone do Cliente: </label><br>
            <input type="text" name="telefone" required><br>

            <label for="cpfCliente">CPF: </label><br>
            <input type="cpf" name="cpfCliente" required><br>

            <input type="submit" value="Cadastrar" class="botaoCadastro"><br>
            <a href="../telainicial/menu.php" class="botaoVoltar" style="display: block; text-align: center; margin-top: 10px; text-decoration: none; color: #666;">Voltar</a><br>
        </form>
    </div>
</body>
</html>