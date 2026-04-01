document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const cpfInput = document.getElementById('cpf');
    const passwordInput = document.getElementById('senha');
    const togglePasswordBtn = document.getElementById('togglePassword');
    const cpfError = document.getElementById('cpfError');
    const senhaError = document.getElementById('senhaError');

    

    if (togglePasswordBtn && passwordInput) {
        togglePasswordBtn.addEventListener('click', function() {
            // Verifica o tipo atual do input
            const isPassword = passwordInput.type === 'password';
            
            // Troca entre 'password' e 'text'
            passwordInput.type = isPassword ? 'text' : 'password';
            
            // Troca o ícone (opcional: você pode usar classes do FontAwesome aqui)
            this.textContent = isPassword ? '👁️‍🗨️' : '👁️'; 
        });
    }
});

    // 2. Validação visual de CPF (ao sair do campo)
    if (cpfInput) {
        cpfInput.addEventListener('blur', () => {
            const cleanCPF = cpfInput.value.replace(/\D/g, '');
            if (cleanCPF.length !== 11) {
                cpfError.textContent = 'O CPF deve ter 11 dígitos';
                cpfError.style.display = 'block';
                cpfInput.style.borderColor = '#ff6b6b';
            } else {
                cpfError.style.display = 'none';
                cpfInput.style.borderColor = '#e0e0e0';
            }
        });
    }

    // 3. Validação visual de senha (ao sair do campo)
    if (passwordInput) {
        passwordInput.addEventListener('blur', () => {
            if (passwordInput.value.length < 6) {
                senhaError.textContent = 'A senha deve ter pelo menos 6 caracteres';
                senhaError.style.display = 'block';
                passwordInput.style.borderColor = '#ff6b6b';
            } else {
                senhaError.style.display = 'none';
                passwordInput.style.borderColor = '#e0e0e0';
            }
        });
    }

    // 4. Validação final no envio do formulário
    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            const cleanCPF = cpfInput.value.replace(/\D/g, '');
            const password = passwordInput.value;

            if (cleanCPF.length !== 11 || password.length < 6) { 
                e.preventDefault(); 
                showNotification('Preencha os campos corretamente! CPF deve ter 11 dígitos e senha no mínimo 6.', 'error');
            }
        });
    };


function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed; top: 20px; right: 20px; padding: 16px 24px;
        border-radius: 8px; font-weight: 500; z-index: 9999;
        animation: slideIn 0.3s ease; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    `;
    notification.style.background = type === 'success' ? '#4caf50' : (type === 'error' ? '#ff6b6b' : '#2196f3');
    notification.style.color = 'white';
    notification.textContent = message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.opacity = '0';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}