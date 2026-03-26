<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <nav>
        <a href="../telainicial/menu.php">Menu Principal</a> | 
        <a href="fantasia.php">Listar Fantasias</a>
    </nav>
<h2>Lista de Clientes Cadastrados</h2>
<?php
// Inclui o arquivo de conexão com o banco de dados
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
            </tr>";
    // Loop através dos resultados e exibe cada modelo
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nomeCliente"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["telefone"] . "</td>
                <td>" . $row["cpfCliente"] . "</td>
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
