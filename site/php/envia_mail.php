<?php


include("../conexao_db.php");
$msg_para    = $_POST["msg_para"];
$msg_assunto = $_POST["msg_assunto"];
$msg_tipo    = $_POST["msg_tipo"];
$mensagem 	= $_POST['descricao']; 

$query = mysql_query("INSERT INTO mensagens (descricao) 
VALUES ('$mensagem')");


if($msg_para == "todos"){
$sql = mysql_query("SELECT * FROM n_emails WHERE ativo = 's'");
$total = mysql_num_rows($sql);
$mailok = 0;
$falha  = 0;
while($lista = mysql_fetch_array($sql)){
$email = $lista["email"];
$cabecalho  = "From: $a_nome <$a_email>";
$cabecalho .= "\nReply-To: $a_nome <$a_email>";
$cabecalho .= "\nMIME-Version: 1.0";
$cabecalho .= "\nContent-Type: $msg_tipo ; charset=iso-8859-1";
 if(@mail($email,$msg_assunto,$mensagem,$cabecalho)){
 $mailok = $mailok + 1;
 $msg = "<font color=green>SUCESSO!</font>";
 }
 else{
 $falha = $falha + 1;
 $msg = "<font color=red>FALHA!</font>";
 }
 ?>
 <font face="Arial" size="2">Enviando para <b><?=$email?></b>...
 <b><?=$msg?></b></font><br>
 <?php } ?>
 <script>alert("<?=$total?> e-mails deveriam ser enviados...\n<?=$mailok?> foram mandados corretamente,\n<?=$falha?> falharam!\n")</script>
 <?php
 }
else{
$cabecalho  = "From: $a_nome <$a_email>";
$cabecalho .= "\nReply-To: $a_nome <$a_email>";
$cabecalho .= "\nContent-Type: $msg_tipo";
if(@mail($msg_para,$msg_assunto,$mensagem,$cabecalho)){
 $msg = "<font color=green>SUCESSO!</font>";
 }
 else{
 $msg = "<font color=red>FALHA!</font>";
 }
 ?>
 <font face="Arial" size="2">Enviando para <b><?=$msg_para?></b>...
 <b><?=$msg?></b></font><br><?php
}
?>
<p><font face="Arial" size="2"><a href="../enviar_noticia.php">Voltar</a></font></p>

