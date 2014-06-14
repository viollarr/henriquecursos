<?
$id=$_GET['id'];
?>

<html>

<head>

<title>Henrique Cursos</title>

<link href="../../site/estilo.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {
	color: #FF0000;
	font-weight: bold;
}
.style4 {font-size: 12px}
.style5 {
	color: #0000CC;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>

              
</head>

<body>

<form action="envianews.php" method="post">
<table width="495" height="447"  border="0" cellpadding="0" cellspacing="4" align="center">
  <tr>
    <td width="487" align="center"><p><img src="../../site/images/logo_final.jpg" alt="" width="100" height="100"></p>
    </td>
  </tr>
 
  <tr>
 
    <td class="t_texto_popup"><p>&nbsp;</p>
      <p align="center" class="style5">Gostaria de ser avisado quando a pr&oacute;xima turma estiver agendada </p>
      <p>&nbsp;</p>
      <table width="313" cellspacing="0" cellpadding="0" align="center" style="margin:5px 0px;">
      <tr>
        <td colspan="2" height="5">		</td>
      </tr>
      <tr>
        <td width="46" align="center">&nbsp;</td>
        <td width="155" class="txt_painel"><div align="center">Envie seu e-mnail </div></td>
      </tr>
	  <tr>
        <td width="46" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" height="4"></td>
      </tr>
      <tr>
        <td class="txt_painel">&nbsp;Nome </td>
        <td>&nbsp;
         <input type="text" size="30" name="nome" id="nome" /></td>
      </tr>
	  <tr>
        <td width="46" align="center">&nbsp;</td>
        <td width="155" class="txt_painel"> </td>
      </tr>
      <tr>
        <td class="txt_painel">&nbsp;E-mail</td>
        <td>&nbsp;
          <input type="text" size=30 name="email" id="email"></td>
      </tr>
	  <tr>
        <td width="46" align="center">&nbsp;</td>
        <td width="155" class="txt_painel"> </td>
      </tr>	  
	  <td width="46" align="center"><label>
	    <input name="ativar" type="checkbox" id="ativar" value="ativar" checked>
	    </label></td>
        <td width="155" class="txt_painel"> Quero saber novidades de quando houver no calendário novos cursos de.</td>
      <tr>
        <td height="4" colspan="2"><label><input type="hidden" name="id" value="<?=$id?>"></label></td>
      </tr>	
      <tr>
        <td colspan="2" height="5">&nbsp;</td>
      </tr>
      <tr align="center">
        <td colspan="2"><input type="submit" value="enviar"></td>
	  </tr>
      <tr>
        <td colspan="2" height="5"></td>
      </tr>
    </table>
      <p>&nbsp;</p>
      <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>    </td>
  </tr>
</table>
</form>

</body>

</html>