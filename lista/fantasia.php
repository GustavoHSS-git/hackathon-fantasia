<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fantasia.css">
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
// ... (seu código de conexão acima)

if ($result->num_rows > 0) {
    // Container principal do Grid
    echo "<div class='grid-fantasias'>";
    
    while($row = $result->fetch_assoc()) {
<<<<<<< HEAD
        echo "
        <div class='card-fantasia'>
            <div class='foto-fantasia'>
                <img type='image/png'src='../img/" . $row["imagem"] . "' alt='" . $row["nomeFantasia"] . "'>
            </div>
            <div class='info-fantasia'>
                <h3>" . $row["nomeFantasia"] . "</h3>
                <p class='categoria'>" . $row["categoriaFantasia"] . "</p>
                <p class='descricao'>" . $row["descricaoFantasia"] . "</p>
                <div class='detalhes-footer'>
                    <span class='estoque'>Qtd: " . $row["quantidadeDisponivel"] . "</span>
                    <span class='preco'>R$ " . number_format($row["valorLocacao"], 2, ',', '.') . "</span>
                </div>
            </div>
        </div>";
=======
        echo "<tr>
                <td>" . $row["nomeFantasia"] . "</td>
                <td>" . $row["descricaoFantasia"] . "</td>
                <td>" . $row["categoriaFantasia"] . "</td>
                <td>" . $row["quantidadeDisponivel"] . "</td>
                <td>" . $row["valorLocacao"] . "</td>
                <td><img src='../{$row['imagem']}' class='foto'></td> 
              </tr>";
>>>>>>> bca0c12b0f36d3a50290da94a1bbdf0f5a642449
    }
    
    echo "</div>"; // Fecha o grid-fantasias
} else {
    echo "Nenhuma fantasia cadastrada.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
</body>
</html>
