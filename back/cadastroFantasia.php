<?php 
include("../conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

$nomeFantasia = $_POST["nomeFantasia"];
$descricaoFantasia = $_POST["descricaoFantasia"];
$categoriaFantasia = $_POST["categoriaFantasia"];
$valorLocacao = $_POST["valorLocacao"];
$quantidadeDisponivel = $_POST["quantidadeDisponivel"];

$sql = "INSERT INTO fantasia (nomeFantasia, descricaoFantasia, categoriaFantasia, valorLocacao, quantidadeDisponivel) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssii", $nomeFantasia, $descricaoFantasia, $categoriaFantasia, $valorLocacao, $quantidadeDisponivel);
$stmt->execute();
header("Location: ../lista/fantasia.php");
exit;

if ($stmt->execute()) {
    echo("Modelo Cadastrado");
    } else { 
    echo("Modelo não cadastrado");
    }
}
?>