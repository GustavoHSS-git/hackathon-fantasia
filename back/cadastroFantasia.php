<?php 
include("../conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

$nomeFantasia = $_POST["nomeFantasia"];
$descricaoFantasia = $_POST["descricaoFantasia"];
$categoriaFantasia = $_POST["categoriaFantasia"];
$valorLocacao = $_POST["valorLocacao"];
$quantidadeDisponivel = $_POST["quantidadeDisponivel"];
$imagem = $_POST["imagem"];

$sql = "INSERT INTO fantasia (nomeFantasia, descricaoFantasia, categoriaFantasia, valorLocacao, quantidadeDisponivel, imagem) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssids", $nomeFantasia, $descricaoFantasia, $categoriaFantasia, $valorLocacao, $quantidadeDisponivel, $imagem);
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