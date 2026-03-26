<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="fantasia.css">
</head>
<body>
<<<<<<< HEAD
    <nav>
        <a href="../telainicial/menu.php">Menu Principal</a> | 
        <a href="cliente.php">Listar Clientes</a>
    </nav>
=======
<main>

<?php 
include_once('../menu.php');
?>
>>>>>>> 7bc7033e23dc1384a35936213573b540982fa568
<h2>Lista de Fantasias Cadastradas</h2>
<?php

require('../conex.php');

<<<<<<< HEAD
// Consulta SQL para selecionar todos os modelos
=======
>>>>>>> 7bc7033e23dc1384a35936213573b540982fa568
$sql = "SELECT idFantasia, nomeFantasia, descricaoFantasia, categoriaFantasia, quantidadeDisponivel, valorLocacao, imagem
        FROM fantasia 
        ORDER BY nomeFantasia";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='grid-fantasias'>";

    while($row = $result->fetch_assoc()) {

        echo "
        <div class='card-fantasia'>
            <div class='foto-fantasia'>
                <img src='../img/" . $row["imagem"] . "' alt='" . $row["nomeFantasia"] . "'>
            </div>
            <div class='info-fantasia'>
                <h3>" . $row["nomeFantasia"] . "</h3>
                <p class='categoria'>
                    " . $row["categoriaFantasia"] . "
                </p>
                <p class='descricao'>
                    " . $row["descricaoFantasia"] . "
                </p>
                <p class='id'>
                    ID: " . $row["idFantasia"] . "
                    <button onclick='copiarId(" . $row["idFantasia"] . ")'>
                        Copiar
                    </button>
                </p>
                <div class='detalhes-footer'>
                    <span class='estoque'>
                        Qtd: " . $row["quantidadeDisponivel"] . "
                    </span>
                    <span class='preco'>
                        R$ " . number_format($row["valorLocacao"], 2, ',', '.') . "
                    </span>
                </div>
                <div class='botoes'>
                    <a href='../funcao/editarFantasia.php?id=" . $row["idFantasia"] . "'>
                        <button>Editar</button>
                    </a>

                    <a href='../funcao/excluirFantasia.php?id=" . $row["idFantasia"] . "' onclick='return confirm(\"Deseja excluir esta fantasia?\")'>
                        <button>Excluir</button>
                    </a>
                </div>
            </div>
        </div>";
    }
    echo "</div>";
} else {
    echo "Nenhuma fantasia cadastrada.";
}
$conn->close();
?>
</main>
</body>
</html>