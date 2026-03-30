<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="../cadastros/listacliente.css">
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
                        <li><a href="../locar/loginCliente.php">Locação</a></li>
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
    <div class="container">
<h1 class="h1">Lista de Clientes Cadastrados</h1>
<?php

require('../conex.php');

// Consulta SQL para selecionar todos os modelos
$sql = "SELECT idCliente, nomeCliente, email, telefone, cpfCliente
        FROM cliente 
        ORDER BY nomeCliente, email, telefone, cpfCliente";
$result = $conn->query($sql);

// Verifica se há modelos cadastrados
if ($result->num_rows > 0) {
    // Exibe os modelos em uma tabela
    echo "<table border='1'>
            <tr>
                <th>Nome do Cliente</th>
                <th>Email do Cliente</th>
                <th>Telefone do Cliente</th>
                <th>CPF do Cliente</th>
                <th>Ações</th>
            </tr>";
    // Loop através dos resultados e exibe cada modelo
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nomeCliente"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" 
                . $row["telefone"] . "</td>
                <td>" . $row["cpfCliente"] . "</td>
                <td>
                    <a href='../funcao/editarCliente.php?id=" . $row["idCliente"] . "'>
                        <button>Atualizar</button>
                    </a>

                    <a href='../funcao/excluirCliente.php?id=" . $row["idCliente"] . "'>
                        <button>Excluir</button>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum cliente cadastrado.";
}
// Fecha a conexão com o banco de dados
$conn->close();
?>
</body>
</html>
