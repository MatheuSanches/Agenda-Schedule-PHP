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
                    ?>
                </td>
            </tr>
        </table>
        <hr/>
        <br/>
        <section>
        <form method="POST" action="cadastracli.php" target="_self" autocomplete="on"> 
            <fieldset>
                <legend>Cadastro de Clientes</legend>
                <label>Pessoa</label>
                <select name="tipo">
                    <option value="fisica">Física</option>
                    <option value="juridica">Jurídica</option>
                </select><br/><br/>
                <label>Nome</label>
                <input type="text" name="nome" required placeholder="Digite um nome"/><br/><br/>
                <label>Endereço</label>
                <input type="text" name="endereco" required placeholder="Digite o endereço"/><br/><br/>
                <label>Cidade</label>
                <input type="text" name="cidade" required placeholder="Digite a cidade"/><br/><br/>
                <label>Telefopne 1</label>
                <input type="tel" name="telefone1" required placeholder="Digite, um telefone ou celular"/><br/><br/>
                <label>Telefone 2</label>
                <input type="tel" name="telefone2" placeholder="Digite, um telefone ou celular"/><br/><br/>
                <label>e-mail</label>
                <input type="email" name="email" required placeholder="Digite o e-mail"/><br/><br/>
                <label>Contato</label>
                <input type="text" name="contato" placeholder="Digite o contato"/><br/><br/>
                <label>Ramo da Empresa</label>
                <input type="text" name="ramo" placeholder="Digite o ramo da empresa"/><br/><br/>
                <button type="submit">Cadastrar</button>
            </fieldset>
        </form>
            <hr/>
            <h4 align="center">TDS02 - SENAI - CTM</h4>
            <h5 align="center">Maringá - 2019</h5>
        </footer>
    </body>
</html>