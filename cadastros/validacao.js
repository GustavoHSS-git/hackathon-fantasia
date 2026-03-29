/**
 * Sistema de validação "Anti-Usuário Burro"
 * Verifica CPF, E-mail e Senha antes de enviar o formulário
 */

function validarCPF(cpf) {
    // Remove tudo que não for número
    const limpo = cpf.replace(/\D/g, '');
    return limpo.length === 11;
}

function validarEmail(email) {
    return email.includes('@') && email.includes('.');
}

function validarSenha(senha) {
    return senha.length >= 6;
}

document.addEventListener('DOMContentLoaded', () => {
    const formsWithValidation = document.querySelectorAll('form');

    formsWithValidation.forEach(form => {
        form.addEventListener('submit', (e) => {
            let errors = [];

            // Validação de CPF
            const cpfInputs = form.querySelectorAll('input[name*="cpf"], input[id*="cpf"]');
            cpfInputs.forEach(input => {
                if (!validarCPF(input.value)) {
                    errors.push('O CPF deve conter exatamente 11 dígitos numéricos.');
                    input.style.borderColor = 'red';
                } else {
                    input.style.borderColor = 'initial';
                }
            });

            // Validação de E-mail
            const emailInputs = form.querySelectorAll('input[type="email"], input[name*="email"]');
            emailInputs.forEach(input => {
                if (!validarEmail(input.value)) {
                    errors.push('Insira um e-mail válido (exemplo@email.com).');
                    input.style.borderColor = 'red';
                } else {
                    input.style.borderColor = 'initial';
                }
            });

            // Validação de Senha
            const passwordInputs = form.querySelectorAll('input[type="password"], input[name*="senha"]');
            passwordInputs.forEach(input => {
                if (!validarSenha(input.value)) {
                    errors.push('A senha deve ter pelo menos 6 caracteres.');
                    input.style.borderColor = 'red';
                } else {
                    input.style.borderColor = 'initial';
                }
            });

            if (errors.length > 0) {
                e.preventDefault();
                alert('OPS! Verifique os campos abaixo:\n\n- ' + errors.join('\n- '));
            }
        });
    });
});
