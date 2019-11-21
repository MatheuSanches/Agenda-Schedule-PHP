<?php
    session_start();
    include ("conecta.php");
    $user =  $_SESSION["user"];
    $logado = mysqli_query($conn,"SELECT usuario.*, funcionario.cpf, funcionario.nome FROM usuario, funcionario WHERE login = '$user' AND usuario.cpf = funcionario.cpf") or die("Erro ao selecionar!");
    $dado = mysqli_fetch_assoc($logado);
    $usuario = $dado['nome'];
    $id = $_GET['id'];
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $telefone1 = $_POST['telefone1'];
    $telefone2 = $_POST['telefone2'];
    $email = $_POST['email'];
    $contato = $_POST['contato'];
    $ramo = $_POST['ramo'];
    date_default_timezone_set('America/Sao_Paulo');
    $data = Date('Y-m-d h:i:s');
    $sql = "UPDATE cliente SET tipo = '$tipo',nome = '$nome',endereco = '$endereco',cidade = '$cidade',telefone1 = '$telefone1',telefone2 = '$telefone2',email = '$email',contato = '$contato',ramo = '$ramo',usuario = '$usuario',data = '$data' WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Cliente atualizado com sucesso!');
        window.location.href = 'visucli.php?id=$id';
        </script>";
    } else {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Não foi possível atualizar o cliente!');
        window.location.href = 'agenda.php';
        </script>";
    }
    mysqli_close($conn);
?>