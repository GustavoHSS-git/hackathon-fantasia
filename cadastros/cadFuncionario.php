<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="../telainicial/navbar.css">
    <link rel="stylesheet" href="../cadastros/listacliente.css">
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
        <form action="../back/cadastroFuncionario.php" method="post">
        <div class="titulo">
            <h1 class="titulo">Cadastre-se</h1>
        </div>
            
            <label for="nome" id="Nome">Nome: </label><br>
            <input type="text" name="nomeFuncionario" required><br>
<?php
include("../conex.php"); ?>

            <label for="email">E-mail: </label><br>
            <input type="email" name="email" required><br>
            <label for="senha">Senha: </label><br>
            <input type="password" name="senha" required><br>
            
            <label for="cpf">CPF: </label><br>
            <input type="text" name="cpf" required><br>

            <input type="submit" value="Cadastrar" class="botaoCadastro"><br>
            <a href="../telainicial/menu.php" class="botaoVoltar" style="display: block; text-align: center; margin-top: 10px; text-decoration: none; color: #666;">Voltar</a><br>
        </form>
    </div>
    <script src="validacao.js" defer></script>
</body>
</html>