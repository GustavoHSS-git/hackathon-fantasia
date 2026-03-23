<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title> 
</head>
<body>
    <div class="container">
            <form  method="POST">
            <div class="titulo">
                <h1>Login</h1>
            </div>
            <label for="cpf">CPF: </label> <br>
            <input type="text" name="cpf" required><br>

            <label for="senha">Senha: </label><br>
            <input type="password" name="senha" required>

            <button class="botao" type="submit">Enviar</button><br>

            <a href="cadastro.php" class="link-login">Cadastrar-se</a>
            
        </form>
    </div>
    <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once("conex.php");

    $funcionario = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM funcionario WHERE cpf='$funcionario' AND senha='$senha'";
    $result = mysqli_query($conn, $sql);
}

 if(mysqli_num_rows($result) > 0){
        header("Location: menu.php");
    }else{
        echo "Usuário ou senha inválido";
    }
?>