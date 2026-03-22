<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: ../index.php');
        exit("Você precisa estar logado para acessar esta página!");
    }

    if(!isset($_SESSION['pagar'])){
        header('Location: carrinho.php');
        exit("Você não confirmou sua compra ainda!");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Genshin Store | Compra realizada</title>
</head>
<body>
    <video autoplay muted id="bg-compra-realizada">
        <source src="../assets/video/five_star_pull.mp4" type="video/mp4">
    </video>
    <main>
        <div id="container-compra-realizada">
            <h1 class="mensagem-compra-realizada">Compra realizada!</h1>
            <button id="voltar-compra-realizada">Voltar</button>
        </div>
    </main>

    <script src="../js/animation.js"></script>
    <script src="../js/redirect.js"></script>
</body>
</html>