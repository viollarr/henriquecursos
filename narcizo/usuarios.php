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
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<STYLE TYPE="TEXT/CSS">
body {
margin-left: 0px;
margin-top: 0px;
margin-bottom: 0px;
margin-right: 0px;
}
A:link { text-decoration: none;font-family: Verdana;font-size: 14px;color: #000000;}
A:visited { text-decoration: none;font-family: Verdana;font-size: 14px;color: #000000;}
A:hover { text-decoration: none;font-family: Verdana;font-size: 14px;color: #000000;}
</STYLE>
</head>
<body>
<div style="padding: 2px;font-family: Verdana;font-size: 15px;color: #000000;">
<center><img src="img/todos.gif"> Usuários</center>
<?php
if($_GET['acao'] == "inserir")
{
$nick = $_SESSION["vc"];
$abrir = fopen("usuarios/$nick.txt","w");
fwrite($abrir,"$_GET[nome]");
fclose($abrir);
echo"<script>top.menu.window.location='menu.php';</script>";
}
if ($handle = opendir('usuarios')) {
echo "<a href=usuarios.php?nome=Todos&acao=inserir><div style=background:#ffffff;><img src=img/voce.gif border=0>Todos</div></a>";
while (false !== ($file = readdir($handle))) {
if ($file != "." && $file != "..") {
echo "<a href=usuarios.php?nome=".basename("$file",".txt")."&acao=inserir><div style=background:#ffffff;><img src=img/voce.gif border=0>".basename("$file",".txt")."</div></a>";
}
       }
   }
   closedir($handle);
?>
</div>
</body>
</html>
