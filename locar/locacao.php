<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Locação de Fantasia</title>
    <link rel="stylesheet" href=">
</head>
<body>
    <nav>
        <a href="../telainicial/menu.php">Menu Principal</a> | 
        <a href="loginCliente.php">Buscar Cliente</a> | 
        <a href="pagamento.php">Pagamentos</a>
    </nav>
    <h1>Locação de Fantasia</h1>

<?php
require_once("../conex.php");

$fantasiaEncontrada = false;
$calculoRealizado = false;

if (isset($_POST['buscar'])) {
    $id = $_POST['idFantasia'];
    $sql = "SELECT idFantasia, nomeFantasia, valorLocacao
            FROM fantasia
            WHERE idFantasia = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fantasia = $result->fetch_assoc();
        $fantasiaEncontrada = true;
    } else {
        echo "<h3>Fantasia não encontrada.</h3>";
    }

}

if (isset($_POST['calcular'])) {
    $idFantasia = $_POST['idFantasia'];
    $nomeFantasia = $_POST['nomeFantasia'];
    $valorDiaria = $_POST['valorLocacao'];
    $dataLocacao = new DateTime($_POST['dataLocacao']);
    $dataDevolucao = new DateTime($_POST['dataDevolucao']);
    $diferenca = $dataLocacao->diff($dataDevolucao);
    $dias = $diferenca->days;
    if ($dias == 0) {
        $dias = 1;
    }
    $valorTotal = $dias * $valorDiaria;
    $calculoRealizado = true;
}

?>

<?php if (!$fantasiaEncontrada && !$calculoRealizado): ?>
<h2>Buscar fantasia pelo ID</h2>
    <form method="POST">ID da Fantasia:<br>
    <input type="number" name="idFantasia" required><br><br>
    <button type="submit" name="buscar">Buscar Fantasia</button>
    </form>
<?php endif; ?>

<?php if ($fantasiaEncontrada): ?>

<h2>Fantasia encontrada</h2>

Nome:

<?php echo $fantasia['nomeFantasia']; ?><br><br>

Valor da diária:

R$

<?php echo $fantasia['valorDiaria']; ?>

<br><br>
<form method="POST">
    <input type="hidden" name="idFantasia" value="<?php echo $fantasia['idFantasia']; ?>">
    <input type="hidden" name="nomeFantasia" value="<?php echo $fantasia['nomeFantasia']; ?>">
    <input type="hidden"name="valorDiaria"value="<?php echo $fantasia['valorDiaria']; ?>">

Data de locação:<br>

    <input type="date" name="dataLocacao" required><br><br>

Data de devolução:<br>

    <input type="date" name="dataDevolucao" required><br><br>
    <button type="submit" name="calcular">Calcular valor</button>

</form>

<?php endif; ?>

<?php if ($calculoRealizado): ?>

<h2>Resumo da locação</h2>

Fantasia:

<?php echo $nomeFantasia; ?><br><br>

Dias alugados:

<?php echo $dias; ?><br><br>

Valor da diária:

R$

<?php echo $valorDiaria; ?><br><br>

Valor total:

R$

<?php echo $valorTotal; ?><br><br>

    <form action="pagamento.php" method="POST">
        <input type="hidden" name="idFantasia" value="<?php echo $idFantasia; ?>">
        <input type="hidden" name="dias" value="<?php echo $dias; ?>">
        <input type="hidden" name="valorTotal" value="<?php echo $valorTotal; ?>">
        <button type="submit">Ir para pagamento</button>
    </form>

<?php endif; ?>

</body>
</html>