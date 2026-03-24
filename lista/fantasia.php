<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fantasia</title>
</head>
<body>
<?php 
    include_once('../menu.php');
?>
<h2>Lista de Fantasias Cadastradas</h2>
<?php
// Inclui o arquivo de conexão com o banco de dados
require('../conex.php');

// Consulta SQL para selecionar todos os modelos
$sql = "SELECT idFantasia, nomeFantasia, descricaoFantasia, categoriaFantasia, quantidadeDisponivel, valorLocacao
        FROM fantasia 
        ORDER BY nomeFantasia, descricaoFantasia, categoriaFantasia, quantidadeDisponivel, valorLocacao";
$result = $conn->query($sql);

// Verifica se há modelos cadastrados
if ($result->num_rows > 0) {
    // Exibe os modelos em uma tabela
    echo "<table border='1'>
            <tr>
                <th>Nome da Fantasia</th>
                <th>Descricao da Fantasia</th>
                <th>Categoria da Fantasia</th>
                <th>Quantidade Disponivel</th>
                <th>Valor de Locação</th>
            </tr>";
    // Loop através dos resultados e exibe cada modelo
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nomeFantasia"] . "</td>
                <td>" . $row["descricaoFantasia"] . "</td>
                <td>" . $row["categoriaFantasia"] . "</td>
                <td>" . $row["quantidadeDisponivel"] . "</td>
                <td>" . $row["valorLocacao"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhuma fantasia cadastrada.";
}
// Fecha a conexão com o banco de dados
$conn->close();
?>
</body>
</html>
