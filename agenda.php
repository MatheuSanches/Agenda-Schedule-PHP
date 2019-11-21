<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset = "utf-8"/>
        <title>Agenda 2.0</title>
        <meta name="keywords" content="HTML5, form, imput, frontend, agenda, contatos">
        <meta name="author" content="TDS02">
        <meta name="description" content="Agenda 2.0 de contatos">
    </head>
    <body>
        <div align="center"><h1><b>Agenda 2.0</b></h1></div>
        <hr/>
        <table align="center">
            <tr>
                <td><a href='agenda.php' style = 'text-decoration:none; font-weight:bold;'>Home</a> |</td>
                <td><a href='cadcli.php' style = 'text-decoration:none; font-weight:bold;'>Cadastrar Novo Cliente</a> |</td>
                <td>
                    <?php
                        session_start();
                        include ("conecta.php");
                        $user =  $_SESSION["user"];
                        $logado = mysqli_query($conn,"SELECT usuario.*, funcionario.cpf, funcionario.nome FROM usuario, funcionario WHERE login = '$user' AND usuario.cpf = funcionario.cpf") or die("Erro ao selecionar!");
                        $dado = mysqli_fetch_assoc($logado);
                        echo $dado['nome'];
                        echo "&nbsp;|&nbsp;";
                        echo "<a href='sair.php' style = 'text-decoration:none; font-weight:bold;'>&nbsp;&nbsp;Sair&nbsp;</a>";
                    ?>
                </td>
            </tr>
        </table>
        <hr/>
        <br/>
        <div align="center">
        <section>
            <?php
                include ("busca.php");
            ?>
        </section>
        </div>
        <footer>
            <hr/>
            <h4 align="center">TDS02 - SENAI - CTM</h4>
            <h5 align="center">Maringá - 2019</h5>
        </footer>
    </body>
</html>