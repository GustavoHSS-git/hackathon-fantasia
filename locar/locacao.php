<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Locação de Fantasia</title>
    <link rel="stylesheet" href="locacao.css">
    <link rel="stylesheet" href="../telainicial/navbar.css">
</head>
<body style="padding-top: 80px;">
     <header class="page-top">
        <nav class="navbar">
            <div class="container">
                <div class="nav-left">
                    <ul class="nav-links">
                        <li><a href="../telainicial/menu.php" class="active">Home</a></li>
                        <li><a href="../lista/cliente.php">Clientes</a></li>
                        <li><a href="../lista/fantasia.php">Fantasias</a></li>
                        <li><a href="../locar/locacao.php">Locação</a></li>
                    </ul>
                </div>
                <div class="nav-right">
                    <button class="logout-btn" onclick="window.location.href='../teladelogin/login.php'">
                        <span>Sair</span>
                    </button>
                </div>
            </div>
        </nav>
    </header>
     <h1 class="h1loc">Locação de Fantasia</h1>
    <div class="container">


<?php
require_once("../conex.php");
$fantasiaEncontrada = false;
$calculoRealizado = false;
$cpfCliente = "";

if (isset($_POST['cpfCliente'])) {
    $cpfCliente = $_POST['cpfCliente'];
}
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
    $valorLocacao = $_POST['valorLocacao'];
    $dataLocacao = new DateTime($_POST['dataLocacao']);
    $dataDevolucao = new DateTime($_POST['dataDevolucao']);
    $diferenca = $dataLocacao->diff($dataDevolucao);
    $dias = $diferenca->days;
    if ($dias == 0) {
        $dias = 1;
    }
    $valorTotal = $dias * $valorLocacao;
    $calculoRealizado = true;
}

?>

<?php if (!$fantasiaEncontrada && !$calculoRealizado): ?>

<h2>Buscar fantasia pelo ID</h2>

<form method="POST">

    <input type="hidden" name="cpfCliente" value="<?php echo $cpfCliente; ?>">ID da Fantasia:<br>
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

<?php echo $fantasia['valorLocacao']; ?><br><br>

<form method="POST">

    <input type="hidden" name="cpfCliente" value="<?php echo $cpfCliente; ?>">
    <input type="hidden" name="idFantasia" value="<?php echo $fantasia['idFantasia']; ?>">
    <input type="hidden" name="nomeFantasia" value="<?php echo $fantasia['nomeFantasia']; ?>">
    <input type="hidden" name="valorTotal" value="<?php echo $fantasia['valorTotal']; ?>">

    Data de locação:<br>

    <input type="date" name="dataLocacao" required><br><br>

    Data de devolução:<br>

    <input type="date" name="dataDevolucao" required><br><br>
    <button type="submit" name="calcular">Calcular valor</button>

</form>

<?php endif; ?>

<?php if ($calculoRealizado): ?>
    <h2>Resumo da locação</h2>

    Dias alugados:

    <?php echo $dias; ?><br><br>

    Valor da diária:

    R$

    <?php echo $valorLocacao; ?><br><br>

    Valor total:

    R$

    <?php echo $valorTotal; ?><br><br>

<form action="pagamento.php" method="POST">

    <input type="hidden" name="cpfCliente" value="<?php echo $cpfCliente; ?>">
    <input type="hidden" name="idFantasia" value="<?php echo $idFantasia; ?>">
    <input type="hidden" name="dataLocacao" value="<?php echo $_POST['dataLocacao']; ?>">
    <input type="hidden" name="dataDevolucao" value="<?php echo $_POST['dataDevolucao']; ?>">
    <input type="hidden" name="dias" value="<?php echo $dias; ?>">
    <input type="hidden" name="valorTotal" value="<?php echo $valorTotal; ?>">

    <button type="submit">Ir para pagamento</button>

</form>

<?php endif; ?>

 </div>

</body>
</html>