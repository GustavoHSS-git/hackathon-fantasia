<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
</head>
<body>
    <nav>
        <a href="../telainicial/menu.php">Menu Principal</a> | 
        <a href="locacao.php">Locação</a> | 
        <a href="loginCliente.php">Buscar Cliente</a>
    </nav>
    <h1>Formas de Pagamento</h1>
    <p>Selecione a forma de pagamento:</p>
    <form method="POST">
        <input type="radio" name="pagamento" value="dinheiro"> Dinheiro<br>
        <input type="radio" name="pagamento" value="cartao"> Cartão<br>
        <input type="radio" name="pagamento" value="pix"> PIX<br>
        <button type="submit">Confirmar Pagamento</button>
    </form>
</body>
</html>