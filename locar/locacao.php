<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locação das fantasias</title>
</head>
<body>
    <div class="container">
        <form action="../back/locacaoFantasia.php" method="post">
        <div class="titulo">
            <h1 class="titulo">Locacão</h1>
        </div>
            
            <label for="nome" id="Nome">Nome: </label><br>
            <input type="text" name="nomeFuncionario"><br>

            <label for="dataLocacao">Data de entrega da fantasia: </label><br>
            <input type="date" name="dataLocacao"><br>
            
            <label for="dataDevolucao">Data de devolução da fantasia: </label><br>
            <input type="date" name="dataDevolucao"><br>

            <button type="submit">Ir para pagamento</button>
        </form>
    </div>
</body>
</html>