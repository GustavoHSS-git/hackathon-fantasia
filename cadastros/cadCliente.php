<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
</head>
<body>
    <nav>
        <a href="../telainicial/menu.php">Menu Principal</a> | 
        <a href="cadFantasia.php">Cadastrar Fantasia</a> | 
        <a href="cadFuncionario.php">Cadastrar Funcionário</a>
    </nav>
    <div class="container">
        <form action="../back/cadastroCliente.php" method="post">
        <div class="titulo">
            <h1 class="titulo">Cadastro de Clientes</h1>
        </div>
            
            <label for="nomeCliente" id="Nome">Nome do Cliente: </label><br>
            <input type="text" name="nomeCliente" required><br>

            <label for="email">Email do Cliente: </label><br>
            <input type="text" name="email" required><br>

            <label for="telefone">Telefone do Cliente: </label><br>
            <input type="text" name="telefone" required><br>

            <label for="cpfCliente">CPF: </label><br>
            <input type="cpf" name="cpfCliente" required><br>

            <input type="submit" value="Cadastrar" class="botaoCadastro"><br>
        </form>
    </div>
</body>
</html>