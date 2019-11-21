<?php
/*Vamos inicializar  (0)*/
$problema=0;
/*Vamos verificar se o campo 1 e o campo 2 estão preenchidos se não forem será enviada uma mensagem o um novo formulário para preenchimento*/
if (($_POST['0']=="") or ($_POST['1']=="")){
$mensagem ="Você deve digitar ao menos 3 caracteres como palavra chave...";
include ("forca.php");
echo "<font color ='#FF0000'> <h2> $mensagem </h2> </font>";
$problema = 1;
/*Vamos perguntar se a dica foi preenchida, se não for dara uma mensagem de erro junto com um novo formulario.*/
}elseif($_POST['dica']== ""){
$mensagem = "Você tem de que dar uma dica ou frase de ajuda!";
include ("forca.php");
echo "<font color ='#FF0000'> <h2> $mensagem </h2> </font>";
$problema = 1;
/* Vamos verificar se o usuario digitou uma letra a ser consultada, se não for dará erro e ele e terá a opcao de voltar */
}elseif($_POST['digitado']==""){
$mensagem ="Você não digitou uma letra!.";
echo "<font color ='#FF0000'> <h2> $mensagem </h2> </font>";
$problema=1;
/* Vou mandar uma mensagem para a tela do navegar do com uma mensaegem e a opcao de OK */
echo "<script language=JavaScript>";
echo "alert(\"Você não digitou nenhuma letra a ser consultada!\");";
echo "</script>";
}
?>