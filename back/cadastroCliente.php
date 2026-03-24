<?php 
include("../conex.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

$nomeCliente = $_POST["nomeCliente"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$cpfCliente = $_POST["cpfCliente"];

$sql = "INSERT INTO cliente (nomeCliente, email, telefone, cpfCliente) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $nomeCliente, $email, $telefone, $cpfCliente);
$stmt->execute();
header("Location: ../lista/cliente.php");
exit;

if ($stmt->execute()) {
    echo("Modelo Cadastrado");
    } else { 
    echo("Modelo não cadastrado");
    }
}
?>