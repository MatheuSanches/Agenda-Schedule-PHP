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
        <table>
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
                        $id = $_GET['id'];
                        $cliente = mysqli_query($conn, "SELECT * FROM cliente WHERE id = '".$id."'");
                        while ($pessoa = $cliente->fetch_array()) {
                    ?>
                </td>
            </tr>
        </table>
        <hr/>
        <br/>
        <section>
        <!--<form>-->
            <fieldset>
                <legend>Visualizar Clientes</legend>
                <label>Pessoa: </label><?php echo $pessoa['tipo']; ?><br/><br/>
                <label>Nome: </label><?php echo $pessoa['nome']; ?><br/><br/>
                <label>Endereço: </label><?php echo $pessoa['endereco']; ?><br/><br/>
                <label>Cidade: </label><?php echo $pessoa['cidade']; ?><br/><br/>
                <label>Telefopne 1: </label><?php echo $pessoa['telefone1']; ?><br/><br/>
                <label>Telefone 2: </label><?php echo $pessoa['telefone2']; ?><br/><br/>
                <label>e-mail:</label><?php echo $pessoa['email']; ?><br/><br/>
                <label>Contato: </label><?php echo $pessoa['contato']; ?><br/><br/>
                <label>Ramo da Empresa: </label><?php echo $pessoa['ramo']; 
                }
                mysqli_close($conn);
                ?><br/><br/>
                <a href="editacli.php?id=<?php echo $id; ?>"><button type="submit">Editar</button></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="apagacli.php?id=<?php echo $id; ?>"><button type="submit">Apagar</button></a>
            </fieldset>
        <!--</form>-->
            <hr/>
            <h4 align="center">TDS02 - SENAI - CTM</h4>
            <h5 align="center">Maringá - 2019</h5>
        </footer>
    </body>
</html>