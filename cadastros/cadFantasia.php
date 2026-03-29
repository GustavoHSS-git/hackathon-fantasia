<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasia</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <nav>
        <a href="../telainicial/menu.php">Menu Principal</a> | 
        <a href="cadCliente.php">Cadastrar Cliente</a> | 
        <a href="cadFuncionario.php">Cadastrar Funcionário</a>
    </nav>

    <div class="container">

        <h1 class="h1fantasia">Cadastro de Fantasia</h1>
    <form action="../back/cadastroFantasia.php" method="post">
        <div>
            <label for="nome">Nome: </label>
            <input type="text" id="nomeFantasia" name="nomeFantasia" required><br>

            <label for="imagem">Foto: </label>
            <input type="file" id="imagem" name="imagem" required><br>

            <label for="descricao">Descrição: </label>
            <input type="text" id="descricaoFantasia" name="descricaoFantasia" required><br>

            <select for="categoria">Categoria:
                <option value="anime">Anime</option>
                <option value="princesa">Princesa</option>
                <option value="Heroí">Herói</option>
                <option value="Animal">Animal</option>
                <option value="Séries">Séries</option>
                <option value="Desenho">Desenho</option> 
                <option value="JOGO">jogo</option>
            </select>
            <input type="text" id="categoriaFantasia" name="categoriaFantasia" required><br>

            <label for="quantidade">Estoque</label>
            <input type="number" id="quantidadeDisponivel" name="quantidadeDisponivel" required><br>

            <label for="valorLocacao">Valor: </label>
            <input type="number" id="valorLocacao" name="valorLocacao" required>

            <button type="submit">Enviar</button>
            <a href="../telainicial/menu.php" class="botaoVoltar" style="display: block; text-align: center; margin-top: 10px; text-decoration: none; color: #666;">Voltar</a><br>
        </div>
    </form>
    </div>
</body>
</html>