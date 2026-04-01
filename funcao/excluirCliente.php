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
<title>Excluir cliente</title>
<link rel="stylesheet" href="../cadastros/cadastro.css">

</head>
<body>
<h2>Excluir cliente</h2>

    <form method="POST">

        <label>Tem certeza que deseja excluir este cliente?</label><br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">

    <button type="submit" name="excluir">Excluir</button>


    <button type="button"  class="voltar" onclick="history.back();">Cancelar</button>

</form>

</body>
</html>

<?php

if (isset($_POST['excluir'])) {

$id = $_POST['id'];

$stmt = $conn->prepare("
DELETE FROM cliente
WHERE idCliente = ?
");

$stmt->bind_param("i", $id);

$stmt->execute();

echo "<script>
alert('Cliente excluído com sucesso!');
window.location.href = '../lista/cliente.php';
</script>";

}

$conn->close();

?>