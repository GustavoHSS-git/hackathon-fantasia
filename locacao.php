<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locação das fantasias</title>
</head>
<body>
    <div class="container">
        <form action="back/cadastroFuncionario.php" method="post">
        <div class="titulo">
            <h1 class="titulo">Locacão</h1>
        </div>
            
            <label for="nome" id="Nome">Nome: </label><br>
            <input type="text" name="nomeFuncionario" required><br>

            <label for="dataEntrega">Data de entrega da fantasia: </label><br>
            <input type="date" name="dataEntrega" required><br>
            
            <label for="dataDevolucao">Data de devolução da fantasia: </label><br>
            <input type="date" name="dataDevolucao" required><br>

            <input type="submit" value="Cadastrar" class="botaoCadastro"><br>
        </form>
    </div>
</body>
</html>