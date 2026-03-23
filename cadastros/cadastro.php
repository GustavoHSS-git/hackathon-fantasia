<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <form action="back/cadastroFuncionario.php" method="post">
        <div class="titulo">
            <h1 class="titulo">Cadastre-se</h1>
        </div>
            
            <label for="nome">Nome: </label><br>
            <input type="text" name="nomeFuncionario" required><br>

            <label for="senha">Senha: </label><br>
            <input type="password" name="senha" required><br>

            <label for="cpf">CPF: </label><br>
            <input type="cpf" name="cpf" required><br>

            <input type="submit" value="Cadastrar" class="botaoCadastro"><br>
        </form>
    </div>
</body>
</html>