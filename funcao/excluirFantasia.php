<?php
require('../conex.php');

    if (!isset($_GET['id'])) {
        die("ID não informado.");
    }
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Excluir Fantasia</title>
<link rel="stylesheet" href="../cadastros/cadastro.css">

</head>
<body>
<h2>Excluir Fantasia</h2>

    <form method="POST">

        <label>Tem certeza que deseja excluir esta fantasia?</label><br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">

    <button type="submit" name="excluir">Excluir</button>

    <button class="voltar"  href="#" onclick="history.back()">Cancelar</button>
</form>

</body>
</html>

<?php

if (isset($_POST['excluir'])) {

$id = $_POST['id'];

$stmt = $conn->prepare("
DELETE FROM fantasia
WHERE idFantasia = ?
");

$stmt->bind_param("i", $id);

$stmt->execute();

echo "<script>
alert('Fantasia excluída com sucesso!');
window.location.href = '../lista/fantasia.php';
</script>";

}

$conn->close();

?>