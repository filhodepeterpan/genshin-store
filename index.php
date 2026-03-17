<?php
    session_start();

    $usuario = "";

    if(isset($_SESSION['usuario'])){
        header('Location: pages/dashboard.php');
    }
    
    if(isset($_COOKIE['usuario'])){
        $usuario = $_COOKIE['usuario'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(isset($_POST['email']) && isset($_POST['senha'])){
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if(isset($_POST['lembre'])){
                setcookie('usuario', $email, (time() + (60*60*24*30)));
            }

            if($email === "admin@admin" && $senha == "123"){
                $_SESSION['usuario'] = $email;
                header('Location: pages/dashboard.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/icons/genshin.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>Genshin Store | Login</title>
</head>
<body>
    <video autoplay muted loop id="bg-login">
        <source src="assets/video/background.mp4" type="video/mp4">
    </video>

    <main>
        <div id="login">
            
            <form action="#" method="POST">
                <h1 id="logo">Genshin Store</h1>
                <div class="form-campo">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="usuario@dominio.com" value="<?php echo $usuario; ?>" required>
                </div>
                <br>

                <div class="form-campo">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" placeholder="••••••••" required>
                </div>
                <br>
                
                <div class="form-campo" id="campo-lembre">
                    <input type="checkbox" name="lembre" id="lembre">
                    <label for="lembre" id="lembre">Lembre-me</label>
                </div>
                <br>

                <div id="logar">
                    <button type="submit" id="entrar">Entrar</button>
                </div>
                
            </form>
        </div>
    </main>

    <footer>
        <span id="github">Github: @filhodepeterpan</span>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>