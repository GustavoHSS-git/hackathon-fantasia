<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="fantasia.css">
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
    <h2 class="h1fan">Lista de Fantasias Cadastradas</h2>
    <div class="container">
<?php

require('../conex.php');

// Consulta SQL para selecionar todos os modelos
$sql = "SELECT idFantasia, nomeFantasia, descricaoFantasia, categoriaFantasia, quantidadeDisponivel, valorLocacao, imagem
        FROM fantasia 
        ORDER BY nomeFantasia";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='grid-fantasias'>";
    $id_novo = $_GET['id_novo'] ?? 0;

    while($row = $result->fetch_assoc()) {
        $extra_class = ($row['idFantasia'] == $id_novo) ? 'highlight' : '';
        $extra_id = ($row['idFantasia'] == $id_novo) ? 'id="novo-item"' : '';

        echo "
        <div class='card-fantasia $extra_class' $extra_id>
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
    if ($id_novo > 0) {
        echo "<script>document.getElementById('novo-item').scrollIntoView({behavior: 'smooth'});</script>";
    }
} else {
    echo "Nenhuma fantasia cadastrada.";
}
$conn->close();
?>
</main>
</body>
</html>