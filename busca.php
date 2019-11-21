<!DOCTYPE html>
<html lan="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="TDS02"/>
    </head>
<body>
    <section>
        <form method="POST" autocomplete="on" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <legend><b>Busca</b></legend>
                <table>
                    <tr>
                        <td>
                            <label>Nome</label>
                            <input type="text" name="nome" placeholder="Digite um nome"/>
                        </td>
                        <td>
                            <label>Pessoa</label>
                            <select name="tipo">
                                <option value="">Faça sua opção</option>
                                <option value="fisica">Física</option>
                                <option value="juridica">Jurídica</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit">Buscar</button>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <div align="center">
            <?php
                include("conecta.php");
                $letra = mysqli_query($conn, "SELECT DISTINCT LEFT(nome,1) AS letra FROM cliente ORDER BY letra");
                while ($letras = mysqli_fetch_array($letra)){
                    $teste= strtoupper($letras['letra']);
                    echo '<button type="submit" value="'.$teste.'" name="letra">'.$teste.'</button> |';
                }
            ?>
        </div>
        </form>
        <br/>
        <?php
            if(!isset($_POST['nome']) && !isset($_POST['tipo']) && !isset($_POST['letra'])){
                echo "Faça a sua pesquisa!";
            } else {
                if(isset($_POST['letra']))
                {
                    $busca3 = trim($_POST['letra']);
                }else{
                    $busca3= "";
                }
                $busca = trim($_POST['nome']);
                $busca2 = trim($_POST['tipo']);
                $cases = array($busca, $busca2, $busca3);
                switch($cases){
                    case ($cases[0] !="" && $cases[1] == "" && $cases[2]==""):
                    $sql = mysqli_query($conn,"SELECT * FROM cliente WHERE nome LIKE '".$busca."%' ORDER BY nome") or die (mysqli_error($conn));
                    break;
                    case ($cases[0] =="" && $cases[1] != "" && $cases[2]==""):
                    $sql = mysqli_query($conn,"SELECT * FROM cliente WHERE tipo = '".$busca2."' ORDER BY nome") or die (mysqli_error($conn));
                    break;
                    case ($cases[0] !="" && $cases[1] != "" && $cases[2]==""):
                    $sql = mysqli_query($conn,"SELECT * FROM cliente WHERE nome = '".$busca."' AND tipo='".$busca2."' ORDER BY nome") or die (mysqli_error($conn));
                    break;
                    case ($cases[0] =="" && $cases[1] == "" && $cases[2]==""):
                    $sql = mysqli_query($conn,"SELECT * FROM cliente ORDER BY nome") or die (mysqli_error($conn));
                    break;
                    case ($cases[0] =="" && $cases[1] == "" && $cases[2]!=""):
                    $sql = mysqli_query($conn,"SELECT * FROM cliente WHERE nome LIKE '".$busca3."%' ORDER BY nome") or die (mysqli_error($conn));
                    break;
                }
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Pessoa</th>";
                echo "<th>Nome</th>";
                echo "<th>Cidade</th>";
                echo "<th>Telefone</th>";
                echo "<th>Contato</th>";
                echo "<th>Visualizar</th>";
                echo "</tr>";
                while ($cliente = mysqli_fetch_array($sql)){
                    $id = $cliente['id'];
                    echo "<tr>";
                    echo "<td>".$cliente['tipo']."</td>";
                    echo "<td>".$cliente['nome']."</td>";
                    echo "<td>".$cliente['cidade']."</td>";
                    echo "<td>".$cliente['telefone1']."</td>";
                    echo "<td>".$cliente['contato']."</td>";
                    echo '<td><a href="visucli.php?id='.$id.'"><button type="submit">Visualizar</button></a></td>';
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($conn);
            }
            ?>
    </section>
</body>
</html>