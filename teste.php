<?php
    include ("conecta.php");
    $letra = $_GET['nome'];
    $sql = mysqli_query($conn,"SELECT * FROM cliente WHERE nome LIKE '".$letra."%' ORDER BY nome") or die (mysqli_error($conn));
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
?>