<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form id="loginForm" class="login-form" method="POST">
            <div class="titulo">
            <div class="login-right">
            <div class="login-box">
        
                <h2 id="login-title">Bem-avindo</h2>
                <p class="login-subtitle">Faça login para continuar</p>

                    <!-- Campo CPF -->
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input 
                            type="text" 
                            id="cpf" 
                            name="cpf" 
                            placeholder="000.000.000-00"
                            required
                            aria-label="CPF"
                        >
                        <!-- Mensagem de erro (mostrada via JS ao validar) -->
                        <span class="error-message" id="cpfError"></span>
                    </div>

                    <!-- Campo Senha -->
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <div class="password-wrapper">
                            <input 
                                type="password" 
                                id="senha" 
                                name="senha" 
                                placeholder="••••••••"
                                required
                                aria-label="Senha"
                            >
                            <!-- Botão para mostrar/esconder senha (👁️) -->
                            <button type="button" class="toggle-password" id="togglePassword">
                                👁️
                            </button>
                        </div>
                        <!-- Mensagem de erro (mostrada via JS ao validar) -->
                        <span class="error-message" id="senhaError"></span>
                    </div>

                    <!-- Opções: Lembrar-me e Esqueci a Senha -->
                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Lembrar-me</label>
                        </div>
                        <!-- Link para recuperação de senha -->
                        <a href="#" class="forgot-password">Esqueci a senha</a>
                    </div>

                    <!-- Botão de Entrar (Submit) -->
                    <button type="submit" class="btn-login">
                        <span>Entrar</span>
                    </button>
                </form>
    </div>

    <!-- ============================
                     LINK DE CADASTRO
                     ============================ -->
                <p class="signup-text">
                    Não tem uma conta? 
                    <a href="../cadastros/cadFuncionario.php" class="signup-link">Cadastre-se</a>
                </p>
            </div>
        </div>
    </div>
    
    <script src="login.js"></script>
<?php

// Reportar erros para ajudar a descobrir se o banco falhar
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        require_once("../conex.php");

        // Pegamos o 'email' pois é o que definimos no formulário
        $cpf = $_POST['cpf'] ?? '';
        $senha = $_POST['senha'] ?? '';

        // Prepara a consulta para evitar invasões (SQL Injection)
        $sql = "SELECT * FROM funcionario WHERE cpf = ? AND senha = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $cpf, $senha);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['usuario_logado'] = true;
            $_SESSION['cpf'] = $cpf;
            // Tente este caminho. Se não funcionar, verifique se a pasta se chama 'telainicial'
            header("Location: ../telainicial/menu.php");
            exit();
        }
        else {
            echo "<script>alert('CPF ou senha incorretos!'); window.location.href='login.php';</script>";
        }
    }
    catch (Exception $e) {
        // Se der erro 500 de novo, esta linha dirá o porquê:
        die("Erro Crítico no Servidor: " . $e->getMessage());
    }
}
?>
    <script src="login.js"></script>

</body>
</html>