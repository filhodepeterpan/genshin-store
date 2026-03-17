<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: ../index.php');
    }

    $usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icons/genshin.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Genshin Store | Login</title>
</head>
<body>
    <header>
    </header>

    <main>
        <div id="login">
            <h1 id="logo">Dashboard</h1>
            <h2>Bem-vindo, <?php echo $usuario; ?>!</h2>
            <button id="deslogar">Sair</button>
        </div>
    </main>

    <footer>
        <span id="github">Github: @filhodepeterpan</span>
    </footer>

    <script src="../js/redirect.js"></script>
</body>
</html>