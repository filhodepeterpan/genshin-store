<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: ../index.php');
        exit;
    }

    $usuario = $_SESSION['usuario'];
    $carrinho = $_SESSION['carrinho'] ?? [];
    $totalMora = 0;
    $carrinhoVazio = empty($carrinho);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icons/genshin.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Genshin Store</title>
</head>
<body id="dashboard">
    <header>

        <nav class="cabecalho">
            <div class="cabecalho-logo">
                <img src="../assets/icons/genshin.ico" alt="logo" width="50">
                <h1 id="logo">Genshin Store</h1>
            </div>
            <div id="conta">
                <span id="usuario"><?php echo $usuario; ?></span>
                <button id="deslogar">Sair</button>
            </div>       
        </nav>

    </header>

    <main>
        <div class="area-carrinho">
            <h1>Carrinho</h1>
            <?php if($carrinhoVazio): ?>
                <p id="mensagem-carrinho-vazio"><i>Você ainda não adicionou nenhuma arma ao carrinho</i></p>
                <br><br>
                <div class="botoes">
                    <button id="voltar">Explorar loja</button>
                </div>

            <?php else: ?>
                <?php foreach($_SESSION['carrinho'] as $item): ?>
                    <div class="linha">
                        <div class="item">
                            <img src="<?= $item['imagem'] ?>" alt="<?= $item['nome'] ?>" width="50">
                            <span><?= $item['nome'] ?></span>
                        </div>

                        <div class="preco-em-mora">
                            <img src="../assets/icons/mora.ico" alt="Mora" width="25">
                            <span><?= $item['mora'] ?></span>
                            <?php $totalMora += $item['mora']; ?>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="footer-carrinho">
                    <div class="preco-em-mora">
                        <span>Total:</span>
                        <img src="../assets/icons/mora.ico" alt="Mora" width="25">
                        <span><?= $totalMora ?></span>
                    </div>
                    <div class="botoes">
                        <button id="voltar">Continuar comprando</button>
                        <button id="finalizar">Finalizar compra</button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <span id="github">Github: @filhodepeterpan</span>
    </footer>

    <script src="../js/redirect.js"></script>
</body>
</html>