<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico do Cliente</title>
    <link rel="stylesheet" href="../telainicial/navbar.css">
    <style>
        .history-container {
            max-width: 1000px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        th {
            background-color: var(--primary-color);
            color: white;
        }
    </style>
</head>
<body>
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

    <div class="history-container">
        <h1>Histórico de Locações do Cliente</h1>
        
        <form method="GET" style="margin-bottom: 30px;">
            <label>Buscar por CPF do Cliente:</label><br>
            <input type="text" name="cpf" placeholder="000.000.000-00" required value="<?php echo $_GET['cpf'] ?? ''; ?>" style="padding: 10px; width: 250px; border-radius: 5px; border: 1px solid #ccc;">
            <button type="submit" style="padding: 10px 20px; background: var(--primary-color); color: white; border: none; border-radius: 5px; cursor: pointer;">Buscar</button>
        </form>

        <?php
        if (isset($_GET['cpf'])) {
            require_once("../conex.php");
            $cpf = $_GET['cpf'];

            $sql = "SELECT l.*, f.nomeFantasia 
                    FROM locacao l 
                    JOIN fantasia f ON l.idFantasia = f.idFantasia 
                    WHERE l.cpfCliente = ? 
                    ORDER BY l.dataLocacao DESC";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>Data Locação</th>
                            <th>Data Devolução</th>
                            <th>Fantasia</th>
                            <th>Valor Total</th>
                            <th>Forma Pagto</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".date('d/m/Y', strtotime($row['dataLocacao']))."</td>
                            <td>".date('d/m/Y', strtotime($row['dataDevolucao']))."</td>
                            <td>".$row['nomeFantasia']."</td>
                            <td>R$ ".number_format($row['valorTotal'], 2, ',', '.')."</td>
                            <td>".$row['formaPagamento']."</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Nenhuma locação encontrada para este CPF.</p>";
            }
        }
        ?>
        <br>
        <a href="../telainicial/menu.php" style="text-decoration: none; color: var(--primary-color); font-weight: bold;">← Voltar ao Menu</a>
    </div>
</body>
</html>
