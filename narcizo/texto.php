<?php
/*
======================================
     phillippimenta@gmail.com        =
                                     ==========================================================
      Sistema de Bate-Papo           = DESENVOLVIDO POR: PHILLIP PIMENTA                      =
                                     ==========================================================
      http://www.phpedia.net         =
======================================

Instala��o

- Da a permiss�o 777 nas pastas mensagens e usuarios.
- Depois � s� rodar no servidor
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
echo"N�o foi poss�vel localizar o banco de dados!";
}
?>
</body>
