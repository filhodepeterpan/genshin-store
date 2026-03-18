<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: ../index.php');
    }

    $usuario = $_SESSION['usuario'];
    $carrinhoComItens = isset($_SESSION['carrinho']);

    if (isset($_POST['arma'])) {
        $carrinho[] = $_POST['arma'];
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
        <h1 id="loja-de-armas">Carrinho</h1>
        <div class="carrinho">

        </div>
    </main>

    <footer>
        <span id="github">Github: @filhodepeterpan</span>
    </footer>

    <script src="../js/redirect.js"></script>
</body>
</html>