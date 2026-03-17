<?php 
session_start();

    if(!isset($_SESSION['usuario'])){
        header('../index.php');
        exit();
    }

?>