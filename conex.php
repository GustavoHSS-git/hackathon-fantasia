<?php
//Criação de variáveis para armazenar os dados de conexão
$servidor = "localhost:3308"; //Endereço do seu servidor
$user = "root"; //Usuário do servidor do banco de dados
$senha = "etec123"; //Senha do usuário do banco
$banco = "fantasia";//nome do seu banco de dados ou schema

// Cria a conexão Orientada a Objeto
$conn = new mysqli($servidor, $user, $senha, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error); //Resposta em caso de erro, aborta a conexão para evitar quebra de código e mostra em tela qual erro aconteceu
}
?>