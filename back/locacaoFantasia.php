<?php 
include("../conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

$dataLocacao = $_POST["dataLocacao"];
$dataDevolucao = $_POST["dataDevolucao"];

$sql = "INSERT INTO locacao (dataLocacao, dataDevolucao) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $dataLocacao, $dataDevolucao);
$stmt->execute();
header("Location: ../locar/pagamento.php");
exit;

if ($stmt->execute()) {
    echo("Modelo Cadastrado");
    } else { 
    echo("Modelo não cadastrado");
    }
}
?>