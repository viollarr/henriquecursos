<?php

session_start();

if ( !isset( $_POST['submit'] ) )
	{
		if(empty($_SESSION["sativo"]))
		{
		echo '<body bgcolor="#FFFF00">';
		echo '<form action="enviar_noticia.php" method="post">';
		echo 'Login: <input type="text" name="login" size="10" maxlength="10"><br>';
		echo 'Senha: <input type="password" name="senha" size="10" maxlength="10"><br><br>';
		echo '<input type="submit" name="submit">';
		echo '</form>';
		echo '</body>';
		}
	}else
	{
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		
		if($login=="hemz1x2c3" && $senha=="henrique")
		{
				session_start();
				$_SESSION["sativo"] = true;
				
				
		}else
		{
		   header("Location:enviar_noticia.php");
		}
	}
	
if($_SESSION["sativo"]){
?> 

<script>
function remove(email){
if(confirm("Tem certeza?")){
location.href='remove.php?email='+email+'';
}
}
</script>
<body bgcolor="#FFFF00">
<form method="POST" action="php/envia_mail.php">
  <table border="0" cellpadding="0" cellspacing="0" height="68" width="424" align="center">
    <tr>
      <td height="25" width="120">
      <p align="left"><font size="2" face="Arial">Para:</font></td>
      <td height="25" width="304"><font size="2" face="Arial">
        <select size="1" name="msg_para" >
    <option value="todos">&lt;&lt;Todos&gt;&gt;</option>
    <?php
	include ("conexao_db.php");
    $sql = mysql_query("SELECT * FROM n_emails WHERE ativo = 's'");
    while($lista = mysql_fetch_array($sql)){
    $email = $lista["email"];
    ?>
    <option value="<?=$email?>"><?=$email?></option>
    <?php } ?>
  </select></font></td>
    </tr>
    <tr>
      <td height="23" width="120">
      <p align="left"><font face="Arial" size="2">Assunto:</font></td>
      <td height="23" width="304"><font size="2" face="Arial">
      <input type="text" name="msg_assunto" size="28" ></font></td>
    </tr>
    <tr>
      <td height="20" width="120">
      <p align="left"><font size="2" face="Arial">Tipo da mensagem:</font></td>
      <td height="20" width="304"><font size="2" face="Arial">
      <input type="text" name="msg_tipo" size="15" value="<?=$formato_msg?>"></font></td>
    </tr>
    <tr>
      <td height="20" colspan="2">
      <p align="center"><font face="Arial" size="2">Mensagem:</font></td>
    </tr>
    <tr>
      <td height="20" colspan="2">
      <p align="center"><font face="Arial"><textarea rows="15" name="mensagem" cols="60"></textarea></font></td>
    </tr>
    <tr>
      <td height="20" colspan="2">
      <p align="left"><font size="2" face="Arial"><input type="submit" value="ENVIAR"></font></td>
    </tr>
  </table>
</form>
<p align="left"><u><font face="Arial">LISTA DE E-MAILS</font></u></p>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<?php
$sql = mysql_query("SELECT * FROM n_emails order by -id");
while($lista2 = mysql_fetch_array($sql)){
$email = $lista2["email"];
$ativo = $lista2["ativo"];
if($ativo=="n"){
$ativo = "<font face='Arial' size='2' color='red'>Não confirmado</font>";
}
else{
$ativo = "<font face='Arial' size='2' color='green'>Confirmado</font>";
}
?>
  <tr>
    <td width="50%">
      <p align="center"><b><font face="Arial" size="2"><?=$email?></font></b></td>
    <td width="25%"><?=$ativo?></td>
    <td width="25%"><a href="javascript:remove('<?=$email?>')"><font face="Arial" size="2">remover</font></a></td>
  </tr><?php } ?>
</table></p>
<a href="sair.php">Sair</a></body>
<?php
}
?>