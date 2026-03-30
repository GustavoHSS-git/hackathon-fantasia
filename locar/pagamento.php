<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pagamento</title>
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
    <h1 class="h1pag">Pagamento</h1>

    <div class="container">
<?php

require_once("../conex.php");

$pagamentoRealizado = false;


if (isset($_POST['confirmarPagamento'])) {
    $dataLocacao    = $_POST['dataLocacao'];
    $dataDevolucao  = $_POST['dataDevolucao'];
    $dias           = $_POST['dias'];
    $valorTotal     = $_POST['valorTotal'];
    $formaPagamento = $_POST['formaPagamento'];
    $idFantasia     = $_POST['idFantasia'];
    $cpfCliente     = $_POST['cpfCliente'];

    $sql = "INSERT INTO locacao (cpfCliente, idFantasia, dataLocacao, dataDevolucao, dias, formaPagamento, valorTotal) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissisd", $cpfCliente, $idFantasia, $dataLocacao, $dataDevolucao, $dias, $formaPagamento, $valorTotal);
    $stmt->execute();
    $pagamentoRealizado = true;
}

?>
<?php if (!$pagamentoRealizado): ?>

    <h2>Pagamento</h2>

    Valor total:

    R$

    <?php echo $_POST['valorTotal']; ?><br><br>

    Escolha a forma de pagamento:

    <form method="POST">

        <!-- Enviando os dados escondidos para o PHP -->

        <input type="hidden" name="dataLocacao" value="<?php echo $_POST['dataLocacao']; ?>">
        <input type="hidden" name="dataDevolucao" value="<?php echo $_POST['dataDevolucao']; ?>">
        <input type="hidden" name="dias" value="<?php echo $_POST['dias']; ?>">
        <input type="hidden" name="valorTotal" value="<?php echo $_POST['valorTotal']; ?>">
        <input type="hidden" name="idFantasia" value="<?php echo $_POST['idFantasia']; ?>">
        <input type="hidden" name="cpfCliente" value="<?php echo $_POST['cpfCliente']; ?>">
        <input type="hidden" name="cpfCliente" value="<?php echo $_POST['quantidadeDisponivel']; ?>">
    <br>
        <div class="form-group">
            <h3>Pix <input type="radio" name="formaPagamento" value="Pix" required></h3>
        </div>

        
        <div class="form-group">
            <h3>Dinheiro <input type="radio" name="formaPagamento" value="Dinheiro" required></h3>
        </div>

        <br><br>

        <button type="submit" name="confirmarPagamento">Confirmar pagamento</button>

    </form>

<?php else: ?>

    <h2>Locação registrada com sucesso!</h2>

    Data de locação:

    <?php echo $dataLocacao; ?>

    <br><br>

    Data de devolução:

    <?php echo $dataDevolucao; ?>

    <br><br>

    Dias:

    <?php echo $dias; ?>

    <br><br>

    Forma de pagamento:

    <?php echo $formaPagamento; ?>

    <br><br>

    Valor pago:

    R$

    <?php echo $valorTotal; ?>

    <br><br>

    Estoque:

    <?php echo $quantidadeDisponivel; ?>

    <br><br>

<?php endif; ?>

    <a class="nva"href="loginCliente.php">Nova locação</a>
    </div>

</body>
</html>