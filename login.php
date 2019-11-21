<?php
    session_start();
    include("conecta.php");
    $login = $_POST['login'];
    $senha = base64_encode($_POST["senha"]);
    if($login == "" || $senha == ""){
        echo ("<script>alert('Login ou senha em branco!');</script>");
        echo ("<script>location.href='index.html';</script>");
    }
    $logar = mysqli_query($conn, "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'") or die("Erro ao selecionar");
    if (mysqli_num_rows($logar) > 0){
        $_SESSION["user"] = $_POST['login'];
        echo ("<script>location.href='agenda.php';</script>");
    } else {
        echo ("<script>alert('Login ou senha incorretos! Tente novamente.');</script>");
        echo ("<script>location.href='index.html';</script>");
    }
    mysqli_close($conn);
?>