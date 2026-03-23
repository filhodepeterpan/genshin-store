<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: ../index.php');
        exit("Você precisa estar logado para acessar esta página!");
    }

    $usuario = $_SESSION['usuario'];

    function geraMora($i){
        return 500 + ($i * $i) + ($i * 7 + ($i % 3) * 9) - $i/2 + ($i*$i*$i); // só gerando o número menos padrozinado possível pra não ficar tão óbvio
    }

    // GENSHIN.DEV
    $api = "https://genshin.jmp.blue/weapons";

    $resposta = @file_get_contents($api);

    $armas = [];

    if($resposta !== false){
        $armas = json_decode($resposta, true);
    }

    $listaArmas = [];
    $ids = array_column($_SESSION['carrinho'] ?? [], 'id');

    if(is_array($armas)){
        foreach ($armas as $id => $arma) {
            $mora = geraMora($id);

            $listaArmas[] = [
                "id" => $arma,
                "nome" => ucwords(str_replace('-', ' ', $arma)),
                "imagem" => "https://genshin.jmp.blue/weapons/$arma/icon",
                "mora" => $mora,
                "status" => in_array($arma, $ids)
            ];
        }
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $arma = $_POST['arma'];

        $url = "https://genshin.jmp.blue/weapons/$arma";
        $resposta = @file_get_contents($url);

        if ($resposta !== false){
            
            if(!in_array($arma, $ids)){
                $dadosArma = json_decode($resposta, true);

                if(!isset($_SESSION['carrinho'])){
                    $_SESSION['carrinho'] = [];
                }

                $index = array_search($arma, $armas);
                $mora = geraMora($index);

                $_SESSION['carrinho'][] = [
                    "id" => $arma,
                    "nome" => $dadosArma['name'],
                    "imagem" => "https://genshin.jmp.blue/weapons/$arma/icon",
                    "mora" =>  $mora,
                ];
            }

            header('Location: carrinho.php');
            exit();
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
    <title>Genshin Store</title>
</head>
<body id="dashboard">
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
        <h1 id="loja-de-armas">LOJA DE ARMAS</h1>
        <div class="weapons-grid">

        <?php foreach($listaArmas as $index => $arma): ?>

            <div class="weapon-card">
                <div>
                    <img id="img-arma" src="<?= $arma['imagem'] ?>" alt="<?= $arma['nome'] ?>">
                    <p><b>ID:</b> <?= $index + 1 ?></p>
                    <p><?= $arma['nome'] ?></p>
                </div>
                <div>
                    <div class="preco-em-mora">
                        <img src="../assets/icons/mora.ico" alt="Mora" width="25">
                        <span><?= $arma['mora'] ?></span>
                    </div>
                    
                    <br>
                    <form action="#" method="POST">
                        <input type="hidden" name="arma" value="<?= $arma['id'] ?>">

                        <?php if (!$arma['status']): ?>
                            <button type="submit" class="comprar">Comprar</button>

                        <?php else: ?>
                            <button disabled id="adicionado-ao-carrinho">Adicionado ao carrinho</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>

        <?php endforeach; ?>

        </div>
    </main>

    <footer>
        <span id="github">Github: @filhodepeterpan</span>
    </footer>

    <script src="../js/redirect.js"></script>
</body>
</html>