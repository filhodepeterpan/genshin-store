<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: ../index.php');
        exit("Você precisa estar logado para acessar esta página!");
    }

    $usuario = $_SESSION['usuario'];
    $carrinho = $_SESSION['carrinho'] ?? [];
    $totalMora = 0;
    $carrinhoVazio = empty($carrinho);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(isset($_POST['remover'])){
            $index = $_POST['remover'];

            unset($_SESSION['carrinho'][$index]); // removendo item
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); // reorganizando os indices pra evitar conflito

            header('Location: carrinho.php');
            exit();
        }

        if(isset($_POST['pagar'])){
            header('Location: compra-realizada.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icons/genshin.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Genshin Store | Carrinho</title>
</head>
<body id="carrinho">
    <header>

        <nav class="cabecalho">
            <div class="cabecalho-logo" id="cabecalho-logo">
                <img src="../assets/icons/genshin.ico" alt="logo" width="50">
                <h1 class="logo">Genshin Store</h1>
            </div>
            <div class="cabecalho-carrinho" id="cabecalho-carrinho">
                <img src="../assets/img/carrinho.ico" alt="icone de carrinho" width="20">
                <span id="cabecalho-carrinho-texto">Carrinho</span>
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
                <?php foreach($_SESSION['carrinho'] as $index => $item): ?>
                    <div class="linha">
                        <div class="item">
                            <img src="<?= $item['imagem'] ?>" alt="<?= $item['nome'] ?>" width="50">
                            <span><?= $item['nome'] ?></span>
                        </div>
                        
                        <div class="gerenciar-item">
                            <div class="preco-em-mora">
                                <img src="../assets/icons/mora.ico" alt="Mora" width="25">
                                <span><?= $item['mora'] ?></span>
                                <?php $totalMora += $item['mora']; ?>
                            </div>

                            <form action="#" method="POST">
                                <input type="hidden" name="remover" value="<?= $index ?>">
                                <button type="submit">X</button>
                            </form>
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
                        <form action="#" method="POST">
                            <input type="hidden" name="pagar" id="pagar">
                            <button type="submit" id="finalizar">Finalizar compra</button>
                        </form>
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