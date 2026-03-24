<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasia</title>
</head>
<body>
    <?php 
    include("../back/cadastroFantasia.php");
    ?>

    <h1>Fantasia</h1>

    <form action="../back/cadastroFantasia.php" method="post">
        <div>
            <label for="nome">Nome: </label>
            <input type="text" id="nomeFantasia" name="nomeFantasia" required><br>

            <label for="imagem">Foto: </label>
            <input type="file" id="imagem" name="imagem" required><br>

            <label for="descricao">Descrição: </label>
            <input type="text" id="descricaoFantasia" name="descricaoFantasia" required><br>

            <label for="categoria">Categoria: </label>
            <input type="text" id="categoriaFantasia" name="categoriaFantasia" required><br>

            <label for="quantidade">Estoque</label>
            <input type="number" id="quantidadeDisponivel" name="quantidadeDisponivel" required><br>

            <label for="valorLocacao">Valor: </label>
            <input type="number" id="valorLocacao" name="valorLocacao" required>

            <button type="submit">Enviar</button>
        </div>
    </form>
</body>
</html>