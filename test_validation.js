// Teste de lógica de validação
function validarCPF(cpf) {
    const limpo = cpf.replace(/\D/g, '');
    return limpo.length === 11;
}

function validarEmail(email) {
    return email.includes('@') && email.includes('.');
}

function validarSenha(senha) {
    return senha.length >= 6;
}

// Casos de teste
const tests = [
    { name: 'CPF Correto', fn: () => validarCPF('123.456.789-01'), expected: true },
    { name: 'CPF Curto', fn: () => validarCPF('123'), expected: false },
    { name: 'CPF Longo', fn: () => validarCPF('123456789012'), expected: false },
    { name: 'Email Correto', fn: () => validarEmail('teste@exemplo.com'), expected: true },
    { name: 'Email sem @', fn: () => validarEmail('teste.com'), expected: false },
    { name: 'Email sem ponto', fn: () => validarEmail('teste@com'), expected: false },
    { name: 'Senha Curta', fn: () => validarSenha('12345'), expected: false },
    { name: 'Senha Média', fn: () => validarSenha('123456'), expected: true }
];

let failed = 0;
tests.forEach(test => {
    const result = test.fn();
    if (result === test.expected) {
        console.log(`✅ [PASS] ${test.name}`);
    } else {
        console.log(`❌ [FAIL] ${test.name} - Esperado: ${test.expected}, Recebido: ${result}`);
        failed++;
    }
});

if (failed === 0) {
    console.log('\n🌟 TODOS OS TESTES PASSARAM COM SUCESSO! 🌟');
} else {
    console.log(`\n❌ ${failed} TESTES FALHARAM. ❌`);
    process.exit(1);
}
