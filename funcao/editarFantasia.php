<?php

require('../conex.php');

if (!isset($_GET['id'])) {
    die("ID não informado.");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM fantasia WHERE idFantasia = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$fantasia = $result->fetch_assoc();

if (!$fantasia) {
    die("Fantasia não encontrada.");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar Fantasia</title>
</head>
<body>
<h2>Editar Fantasia</h2>

<form method="POST">

    <label for="nomeFantasia">Nome:</label>
    <input type="text" id="nomeFantasia" name="nomeFantasia" value="<?php echo $fantasia['nomeFantasia']; ?>" required><br>

    <label for="imagem">Imagem:</label>
    <input type="file" id="imagem" name="imagem" value="<?php echo $fantasia['imagem']; ?> required"><br>

    <label for="descricaoFantasia">Descrição:</label>
    <input type="text" id="descricaoFantasia" name="descricaoFantasia" value="<?php echo $fantasia['descricaoFantasia']; ?>" required><br>

    <label for="categoriaFantasia">Categoria:</label>
    <input type="text" id="categoriaFantasia" name="categoriaFantasia" value="<?php echo $fantasia['categoriaFantasia']; ?>" required><br>

    <label for="quantidadeDisponivel">Quantidade:</label>
    <input type="number" id="quantidadeDisponivel" name="quantidadeDisponivel" value="<?php echo $fantasia['quantidadeDisponivel']; ?>" required><br>

    <label for="valorLocacao">Valor:</label>
    <input type="number" step="0.01" id="valorLocacao" name="valorLocacao" value="<?php echo $fantasia['valorLocacao']; ?>" required>
    <br>

    <button type="submit" name="salvar">Salvar Alterações</button>

</form>
</body>
</html>

<?php

if (isset($_POST['salvar'])) {
    $nome = $_POST['nomeFantasia'];
    $imagem = $_POST['imagem'];
    $descricao = $_POST['descricaoFantasia'];
    $categoria = $_POST['categoriaFantasia'];
    $quantidade = $_POST['quantidadeDisponivel'];
    $valor = $_POST['valorLocacao'];
    $stmt = $conn->prepare("
    UPDATE fantasia
    SET nomeFantasia = ?,
    imagem = ?,
    descricaoFantasia = ?,
    categoriaFantasia = ?,
    quantidadeDisponivel = ?,
    valorLocacao = ?
    WHERE idFantasia = ?
    ");

    $stmt->bind_param("ssssidi", $nome, $imagem, $descricao, $categoria, $quantidade, $valor, $id);

    $stmt->execute();

    echo "<script>
    alert('Fantasia atualizada com sucesso!');
    window.location.href = '../lista/fantasia.php';
    </script>";

}
?>