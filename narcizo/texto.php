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
<script language=JavaScript>
function rolar() {
    scrollTo(0,100000);
  setTimeout("rolar()", 100);
}
</SCRIPT>
<meta http-equiv="refresh" content="3">
<body onLoad="rolar();" bgcolor="#ffffff">
<?php
$sala = date("dmY");
$banco = "mensagens/$sala.txt";
if(file_exists($banco))
{
$arquivo = fopen($banco,"r");
$while = fread($arquivo,filesize($banco));
if($while == "0"){}else{echo"$while";}
fclose($arquivo);
}
else
{
echo"Não foi possível localizar o banco de dados!";
}
?>
</body>
