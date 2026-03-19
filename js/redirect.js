botaoSair = document.getElementById('deslogar');
botaoVoltar = document.getElementById('voltar');

botaoSair.addEventListener('click', () => {
    window.location.href = 'logout.php';
})

botaoVoltar.addEventListener('click', () => {
    window.location.href = 'dashboard.php';
})