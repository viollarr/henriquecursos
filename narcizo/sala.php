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
<title>Bate-Papo dos Madeiras</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<frameset rows="*" cols="*,137" framespacing="0" frameborder="NO" border="0">
  <frameset rows="*,80" frameborder="NO" border="0" framespacing="0">
    <frameset rows="80,*" frameborder="NO" border="0" framespacing="0">
      <frame src="cima.php" name="cima" scrolling="NO" noresize>
      <frame src="texto.php" name="texto" scrolling="yes">
    </frameset>
    <frame src="menu.php" name="menu" scrolling="NO" noresize>
  </frameset>
  <frame src="usuarios.php" name="usuarios" scrolling="yes" noresize>
</frameset>
<noframes><body>
</body></noframes>
</html>
