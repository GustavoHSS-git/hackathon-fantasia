<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="login-right">
            <div class="login-box">
                <h2>Recuperar Senha</h2>
                <p>Insira seu e-mail cadastrado para receber as instruções.</p>
                
                <form action="processa_recuperacao.php" method="POST">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="seu-email@exemplo.com" required>
                    </div>
                    
                    <button type="submit" class="btn-login">
                        <span>Enviar Link de Recuperação</span>
                    </button>
                    
                    <p class="signup-text">
                        <a href="login.php" class="signup-link">Voltar para o Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
