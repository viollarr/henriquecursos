<?php
session_start("chat");
?>
<?php
/*
======================================
     phillippimenta@gmail.com        =
                                     ==========================================================
      Sistema de Bate-Papo           = DESENVOLVIDO POR: PHILLIP PIMENTA                      =
                                     ==========================================================
      http://www.phpedia.net         =
======================================

Instalação

- Da a permissão 777 nas pastas mensagens e usuarios.
- Depois é só rodar no servidor
*/
?>
<html>
<head>
<title>Bate-Papo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
$mensagem = $_POST['mensagem'];
$nick = $_SESSION["vc"];
$cor = $_SESSION["cor"];
$sala = date("dmY");
$hora = date("H:i:s");
if($_POST['acao'] == "Enviar")
{
$abrir = fopen("mensagens/$sala.txt","a+");
$salvar = "<font face=verdana size=1>($hora)</font> <font face=verdana size=2 color=$cor>$nick</font> <font face=verdana size=2>fala para $_POST[falar]: $mensagem</font><br>";
fwrite($abrir,"$salvar");
fclose($abrir);
echo"<script>top.texto.window.location='texto.php';</script>";
}
if($_POST['acao'] == "Sair")
{
unlink("usuarios/$nick.txt");
session_start("chat");
session_destroy();
$abrir = fopen("mensagens/$sala.txt","a+");
$salvar = "<font face=verdana size=1>($hora)</font> <font face=verdana size=2 color=$cor>$nick</font> <font face=verdana size=2>sai da sala...</font><br>";
fwrite($abrir,"$salvar");
fclose($abrir);
echo"<script>top.window.location='index.php';</script>";
}
?>
<table border="0" cellpadding="0" cellspacing="2">
<form name="form" method="post">
  <tr> 
    <td>
<script>
var navegador = navigator.appName;
if(navegador == "Netscape")
{
document.write("<textarea rows=2 name=mensagem cols=48></textarea>");
}
else
{
document.write("<textarea rows=3 name=mensagem cols=48></textarea>");
}
</script>
    </td>
    <td valign="top">
    <div style="padding: 2px;"><input type="submit" value="Enviar" name="acao" style="width:80;"></div>
    <div style="padding: 2px;"><input type="submit" value="Sair" name="acao" style="width:80;"></div>
    </td>
    <td valign="top" style="font-size: 12px;font-family: Verdana;">
<?php
$arquivo = fopen("usuarios/$nick.txt","r");
$falar = fread($arquivo,filesize("usuarios/$nick.txt"));
if($falar == "0"){}else{echo"De $nick para $falar";}
fclose($arquivo);
?>
<input type="hidden" value="<?php echo"$falar";?>" name="falar">
    </td>
  </tr>
</form>
</table>
</body>
</html>

