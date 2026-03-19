botaoSair = document.getElementById('deslogar');
botaoVoltar = document.getElementById('voltar');
botaoInicio = document.getElementById('cabecalho-logo');
botaoCarrinho = document.getElementById('cabecalho-carrinho');

botaoSair.addEventListener('click', () => {
    window.location.href = 'logout.php';
})

botaoVoltar?.addEventListener('click', () => {
    window.location.href = 'dashboard.php';
})

botaoInicio.addEventListener('click', () => {
    window.location.href = 'dashboard.php';
})

botaoCarrinho.addEventListener('click', () => {
    window.location.href = 'carrinho.php';
})